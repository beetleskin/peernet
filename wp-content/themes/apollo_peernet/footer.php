<?php
/**
 * Footer.php outputs the code for footer hooks and closing body/html tags
 * @package WordPress Theme
 * @since 1.0
 * @author Authentic Themes : http://www.authenticthemes.com (TM)
 * @link http://www.authenticthemes.com
 */
?>
	
        </div><!-- #main-content -->
    </div><!-- #box-wrap -->
    
    
        
    <div id="footer-wrap">
        <footer id="footer" class="span_12 container row clr">
            <div id="footer-widgets" class="row clr">
                <div class="footer-box col span_4 clr">
                    <?php dynamic_sidebar('footer-one'); ?>
                </div><!-- /footer-box -->
                <div class="footer-box col span_4 clr">
                    <?php dynamic_sidebar('footer-two'); ?>
                </div><!-- /footer-box -->
                <div class="footer-box col span_4 clr">
                    <?php dynamic_sidebar('footer-three'); ?>
                </div><!-- /footer-box -->
            </div><!-- /footer-widgets -->
        </footer><!-- /footer -->
    </div><!-- /footer-wrap -->	
    
    
    <div id="footerbottom-wrap">
        <div id="footerbottom" class="container row clr">   
            <div id="footer-menu" class="col span_6 clr">
                <?php
                // Main navigation location
                wp_nav_menu( array( 'theme_location' => 'footer_menu', 'fallback_cb' => false ) ); ?>
            </div><!-- #footer-menu -->               
        </div><!-- #footerbottom -->
    </div><!-- #footerbottom-wrap -->

<?php att_hook_site_after(); ?>

<?php wp_footer(); ?>
</body>

<script type="text/javascript">//<![CDATA[
jQuery(function($) {
	
	$(document).ready(function(){
		
		var bg_color_default = $('body').css("background-color");
		var hue_min = 0;
		var hue_max = 360;
		var hue = hue_min;
		var value = 91;
		var value_target = 40;
		var saturation = 0;
		var saturation_target = 70;
		var colorBlinder = null;
		var idle = 0;
		
		function counter() {
			idle++;
			if(colorBlinder == null && idle > 10) {
				console.log("init");
				colorBlinder = window.setInterval(colorblind, 500);
			}
		}
		
		function resetIdle() {
			idle = 0;
			if(colorBlinder != null) {
				clearInterval(colorBlinder);
				colorBlinder = null;
				$('body').css("background-color", bg_color_default);
				hue = hue_min;
				value = 91;
				value_target = 40;
				saturation = 0;
				saturation_target = 70;
				colorBlinder = null;
			}
		}
		
		function colorblind() {
			hue = hue+1%hue_max;
			value = (value <= value_target)? value_target : value-1;
			saturation = (saturation >= saturation_target)? saturation_target : saturation+1;
			$('body').css("background-color","hsl(" + hue + ", " + saturation + "%, " + value + "%)");
		}
		
		
		setInterval(counter, 1000);
		$(this).click(resetIdle).mousemove(resetIdle).keypress(resetIdle);
		
	});
});
//]]></script>
            
            
            
</html>