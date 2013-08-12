jQuery(document).ready(function() {
    var html = '';
    var MM_PREFIX = 'tf_megamenu_';
    var interval = setInterval(refreshNavElements, 1000);

    // helper function that is executed once every second, it deals with
    // hiding/showing the .tf_megamenu_optcointaner div
    function refreshNavElements() {
        jQuery('.menu-item-depth-0').find('.tf_megamenu_optcontainer').show();

        // for each nav element of depth 1 we check if their parent node
        // has the is_megamenu switch checked and hide/show the megamenu options
        // depending on that
        jQuery('.menu-item-depth-1').each(function(index, element) {
            var parentId = jQuery(element).find(':input[name^="menu-item-parent-id"]').val();
            var show = jQuery('#menu-item-' + parentId).find('.tf_megamenu_nav_parent_switch')
                            .attr('checked') == 'checked';

            if (show)
                jQuery(element).find('.tf_megamenu_optcontainer').show();
            else
                jQuery(element).find('.tf_megamenu_optcontainer').hide();
        });
    }

    // variable that holds the default html for depths 0 & 1
    var dropToDefaults = new Object();
    jQuery.ajax({
        url: ajaxurl,
        type: 'post',
        dataType: 'json',
        data: 'action=tfuse_ajax_megamenu&tf_action=ajax_optcontainer_defaults',
        beforeSend: function() {},
        success: function(data) {
            dropToDefaults = data;
        }
    });

    // hiding nav children
    jQuery('.' + MM_PREFIX + 'child_node').hide().removeClass(MM_PREFIX + 'child_node');

    // when a parent menu node megamenu options switch is changed
    jQuery('.' + MM_PREFIX + 'nav_parent_switch').live('change', function() {
        var show = jQuery(this).attr('checked') == 'checked';

        jQuery(this).parents('.menu-item').nextAll().each(function(index, element) {
            // if we've hit a depth 0 nav element break the loop
            if (jQuery(element).attr('class').indexOf('menu-item-depth-0') != -1)
                return false;

            // if we've hit a depth 1 nav element we take care
            // of the megamenu options' display
            if (jQuery(element).attr('class').indexOf('menu-item-depth-1') != -1)
                if (show)
                    jQuery(element).find('.tf_megamenu_optcontainer').show();
                else
                    jQuery(element).find('.tf_megamenu_optcontainer').hide();
        });
    });

    // when a menu template select is changed
    jQuery('.' + MM_PREFIX + 'template_select').live('change', function() {
        var holder = jQuery(this).parents('.tf_megamenu_optcontainer').find('.tf_megamenu_uncommun_opts');
        var template = jQuery(this).val();
        var name = jQuery(this).attr('name');
        var navId = name.substring(name.indexOf('[') + 1, name.indexOf(']'));

        jQuery.ajax({
            url: ajaxurl,
            type: 'post',
            dataType: 'html',
            data: 'action=tfuse_ajax_megamenu&tf_action=ajax_template_chooser&tf_megamenu_template='
                    + template
                    + '&tf_megamenu_nav_id='
                    + navId,
            beforeSend : function() {},
            success : function(data) {
                holder.find('.tf_megamenu_template_options').remove();
                holder.prepend(data);
            }
        });
    });

    // when a population select is modified for some menu template
    jQuery('.' + MM_PREFIX + 'population_select').live('change', function() {
        var holder = jQuery(this).parents('.tf_megamenu_optcontainer').find('.tf_megamenu_uncommun_opts');
        var category = jQuery(this).val();
        var name = jQuery(this).attr('name');
        var navId = name.substring(name.indexOf('[') + 1, name.indexOf(']'));

        jQuery.ajax({
            url : ajaxurl,
            type : 'post',
            dataType : 'html',
            data : 'action=tfuse_ajax_megamenu&tf_action=ajax_population_chooser&tf_megamenu_cat_id='
                    + category
                    + '&tf_megamenu_nav_id='
                    + navId,
            beforeSend : function() {},
            success : function(data) {
                holder.find('.tf_megamenu_population_options').remove();
                holder.append(data);
            }
        });
    });

    // triggers events at page load
    function triggerStuff() {
        // unhide child nav item's megamenu options whose parents'
        // are active megamenu nav items
        jQuery.each(jQuery('.' + MM_PREFIX + 'nav_parent_switch'), function(index, element) {
            if (jQuery(element).attr('checked') == 'checked')
                jQuery(element).trigger('change');
        });

        jQuery.each(jQuery('.' + MM_PREFIX + 'template_select'), function(index, element) {
            jQuery(element).trigger('change');
        });

        jQuery('.' + MM_PREFIX + 'population_select').each(function(index, element) {
            jQuery(element).trigger('change');
        });
    }

    // unhide stuff at document ready
    triggerStuff();

    // ====================================
    // wordpress js overrides
    // ====================================
    if (typeof wpNavMenu != 'undefined') {
        wpNavMenu.addItemToMenu = function(menuItem, processMethod, callback) {
            var menu = jQuery('#menu').val(), nonce = jQuery('#menu-settings-column-nonce').val();

            processMethod = processMethod || function() {
            };
            callback = callback || function() {
            };

            params = {
                'action' : 'tfuse_ajax_megamenu',
                'tf_action' : 'ajax_add_menu_item',

                // wp stuff
                'menu' : menu,
                'menu-settings-column-nonce' : nonce,
                'menu-item' : menuItem
            };

            jQuery.post(ajaxurl, params, function(menuMarkup) {
                var ins = jQuery('#menu-instructions');
                processMethod(menuMarkup, params);
                if (!ins.hasClass('menu-instructions-inactive')
                        && ins.siblings().length)
                    ins.addClass('menu-instructions-inactive');
                callback();
            });
        };

        wpNavMenu.eventOnClickMenuSave = function(clickedEl) {
            
            // ================================
            // Added for MegaMenu
            // ================================
            jQuery('.menu-item').each(function(index, element) {
                var elementId = jQuery(element).attr('id');
                var navId = elementId.substring(elementId.lastIndexOf('-') + 1);
                var megamenuOptContainer = jQuery(element).find('.tf_megamenu_optcontainer');

                megamenuOptContainer.find(':input').attr('name', function(index, oldName) {
                    return oldName != undefined 
                                    ? oldName.replace(/%%NAV_ID%%/, navId)
                                    : oldName;
                });
            });
            // ================================

            var locs = '', menuName = jQuery('#menu-name'), menuNameVal = menuName
                    .val();
            // Cancel and warn if invalid menu name
            if (!menuNameVal
                    || menuNameVal == menuName.attr('title')
                    || !menuNameVal.replace(/\s+/, '')) {
                menuName.parent().addClass('form-invalid');
                return false;
            }
            // Copy menu theme locations
            jQuery('#nav-menu-theme-locations select').each(
                    function() {
                        locs += '<input type="hidden" name="'
                                + this.name + '" value="'
                                + jQuery(this).val() + '" />';
                    });
            jQuery('#update-nav-menu').append(locs);
            // Update menu item position data

            this.menuList.find('.menu-item-data-position').val(
                    function(index) {
                        return index + 1;
                    });
            window.onbeforeunload = null;

            return true;
        };

    }

    // function that changes the html of the megamenu options when a nav item is dragged
    function modifyMegamenuOpts(element, depth) {
        html = depth > 1 ? '' : dropToDefaults['depth_' + depth];
        jQuery(element).find('.tf_megamenu_optcontainer').html(html);
    }

    // alter the jQuery extension from the nav-menu wordpress js file
    jQuery.fn.extend({
        updateDepthClass : function(current, prev) {
            return this.each(function() {
                var t = jQuery(this);
                prev = prev || t.menuItemDepth();
                jQuery(this).removeClass('menu-item-depth-' + prev)
                        .addClass('menu-item-depth-' + current);

                // for megamenu purposes
                modifyMegamenuOpts(jQuery(this), current);
            });
        },
        shiftDepthClass : function(change) {
            return this.each(function(index, element) {
                var t = jQuery(this), depth = t.menuItemDepth();
                jQuery(this).removeClass('menu-item-depth-' + depth)
                        .addClass('menu-item-depth-' + (depth + change));

                // for megamenu purposes
                modifyMegamenuOpts(this, depth + change);
            });
        }
    });

});