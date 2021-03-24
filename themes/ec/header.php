<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @package WordPress
 * @subpackage IEC
 * @since 1.0
 * @version 1.0
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="shortcut icon" type="image/x-icon" href="<?php bloginfo('template_directory'); ?>/images/favicon.ico">
    <meta name="description" content="IEC">
    <?php
		if ( ! function_exists( '_wp_render_title_tag' ) ) {
			function theme_slug_render_title() {
		?>
		<title><?php wp_title( '|', true, 'right' ); ?></title>
		<?php
			}
			add_action( 'wp_head', 'theme_slug_render_title' );
		}
	?>
	<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php endif; ?>
	<?php wp_head(); ?>
    <link href="<?php bloginfo('template_directory'); ?>/css/bootstrap.min.css" type="text/css" rel="stylesheet" />
	<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/fancybox/jquery.fancybox-1.3.4.css" media="screen" />
    <link href="<?php bloginfo('template_directory'); ?>/css/jcarousel.responsive.css" rel="stylesheet" />
    <link href="<?php bloginfo('template_directory'); ?>/style.css" type="text/css" rel="stylesheet" />
	<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link href="<?php bloginfo('template_directory'); ?>/css/responsive.css" type="text/css" rel="stylesheet" />
    <link href="<?php bloginfo('template_directory'); ?>/css/font-awesome.min.css" rel="stylesheet" />
    <link href="<?php bloginfo('template_directory'); ?>/css/responsive.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-141370459-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());
 
  gtag('config', 'UA-141370459-1');
</script>
</head>
<body <?php body_class(); ?>>
<header>
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-md-12 col-lg-5">
				<a href="<?php echo get_option("siteurl"); ?>"><img src="<?php bloginfo('template_directory'); ?>/images/logo.png" alt="IEC" class="img-fluid"></a>
			</div>
			<div class="col-xs-12 col-md-12 col-lg-7">
				<nav class="navbar navbar-expand-lg navbar-light">
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor03" aria-controls="navbarColor03" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
					</button>
					<div class="main-nav collapse navbar-collapse flex-row-reverse" id="navbarColor03">
						<?php wp_nav_menu(array('menu' => 'Menu', 'container' => 'ul', 'menu_class'=> 'navbar-nav')); ?>
						<!--<ul class="navbar-nav">
							<li class="nav-item">
								<a class="nav-link" href="index.html">Home</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="learn-more.html">Learn More</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="#">Join IEC</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="contact-us.html">Contact Us</a>
							</li>
						</ul>-->
					</div>
				</nav>
			</div>
		</div>
	</div>
</header>