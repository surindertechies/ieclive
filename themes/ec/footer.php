<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 *
 * @package WordPress
 * @subpackage EC
 * @since 1.0
 * @version 1.1
 */
?>
<footer>
        <div class="container">
            <div class="row">
                <div class="col-md-4 ">
                    <a href="<?php echo get_option("siteurl"); ?>"><img src="<?php bloginfo('template_directory'); ?>/images/logo-footer.png" alt="EC" class="img-fluid" /></a>
                    <p>We are a community of like-minded entrepreneurs, working with a mission to help members grow. The realm of growth envelopes organized, productive and building meaningful relationships with valuable business professionals.</p>
                    <ul class="social">
                        <li><a href="https://www.facebook.com/IndianEntrepreneursCollective/" title="Facebook" target="_blank"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="https://www.linkedin.com/company/indianentrepreneurscollective/" title="Linkedin" target="_blank"><i class="fa fa-linkedin"></i></a></li>
                        <li><a href="https://www.instagram.com/indianentrepreneurscollective/" title="Instagram" target="_blank"><i class="fa fa-instagram"></i></a></li>
                    </ul>
                </div>
                <div class="col-md-2 footer-link">
                    <h3>Menu</h3>
                    <?php wp_nav_menu(array('menu' => 'Menu Footer')); ?>
                </div>
                <div class="col-md-3 address">
                    <h3>Contact</h3>
                    <p>SCF 12 C, Level 2, Sivia Complex, B - Block, Sarabha Nagar, Ludhiana, Punjab 141001<br /> <a href="tel:+911614630079">+91 161 463 0079</a>, <a href="tel:+911614412222">+91 161 441 2222</a> <br /></p>
                </div>
                <div class="col-md-3 subscribe">
                    <h3>Subscribe to Newsletter</h3>
                    <?php echo do_shortcode('[contact-form-7 id="182" title="Newsletter"]');?>
                </div>
            </div>
        </div>
    </footer>
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.9.0.min.js"></script>
    <script src="<?php bloginfo('template_directory'); ?>/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/fancybox/jquery.mousewheel-3.0.4.pack.js"></script>
    <script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/fancybox/jquery.fancybox-1.3.4.pack.js"></script>
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
        jQuery(document).ready(function() {
            jQuery(".various").fancybox({
                'autoScale': false,
                'transitionIn': 'none',
                'transitionOut': 'none',
                'type': 'iframe'
            });
			$("a[rel=image_group]").fancybox({
				'transitionIn'		: 'none',
				'transitionOut'		: 'none',
				'titlePosition' 	: 'over',
				//'titleFormat'       : function(title, currentArray, currentIndex, currentOpts) {
					//return '<span id="fancybox-title-over">Image ' +  (currentIndex + 1) + ' / ' + currentArray.length + ' ' + title + '</span>';
				//}
			});
			$(function(){
				$("#datepicker").datepicker();
			});
        });
    </script>
    <script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/jcarousel.responsive.js"></script>
    <script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/jquery.jcarousel.min.js"></script>
	<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/jcarousel.responsive1.js"></script>
	<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/jquery.cycle.all.js"></script>
	<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/jquery.typer.js"></script>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css" />
	<script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>
    <script>
        jQuery(document).ready(function() {
            jQuery('.slider-cont')
			.before('<div id="nav">')
			.cycle({
				speed: 1000,
				timeout: 8000,
				slideResize: true,
				width: '100%',
				fit: 1,
				pager: '#nav'
			});
			jQuery("#datepicker").datepicker({
			  changeYear: true,
			  yearRange: "1970:2019",
			  showButtonPanel: true
			});
			//jQuery("#datepicker").datepicker("option", "showMonthAfterYear", true);
			jQuery('.your-name .wpcf7-validates-as-required, .first-name .wpcf7-validates-as-required, .last-name .wpcf7-validates-as-required').keypress(function (e) {
				var regex = new RegExp("^[a-zA-Z]+$");
				var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
				if (regex.test(str)) {
					return true;
				}
				else
				{
				e.preventDefault();
				alert('Please Enter Alphabate');
				return false;
				}
			});
        });
    </script>
	<script>
		jQuery(function () {
        jQuery('[data-typer-targets]').typer();
		jQuery.typer.options.initialDelay = 20;
        jQuery.typer.options.typerOrder = 'sequential';
        jQuery.typer.options.typeSpeed = 100;
        jQuery.typer.options.highlightColour = null;
        jQuery.typer.options.highlightSpeed = null;
        jQuery.typer.options.typerInterval = 800;
        jQuery.typer.options.highlight = null;
		jQuery.typer.options.textColor  = 'rgba(255, 255, 255,0)';
     });
</script>
	<?php wp_footer(); ?>
</body>
</html>