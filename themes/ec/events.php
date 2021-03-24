<?php
/**
Template Name: Events
**/
get_header(); ?>
<section id="breadcrumb">
	<div class="container">
		<div class="row align-items-center breadcrumb-height">
			<div class="col-md-12 text-center">
				<h1><?php the_title(); ?></h1>
			</div>
		</div>
	</div>
</section>
<section class="int-container">
	<div class="container">
		<div class="row">
			<div class="col-md-12 col-xl-8 offset-xl-2">
				<h2>Upcoming <span class="color-red">Events</span></h2>
				<?php echo do_shortcode('[upcoming_event_list]');?>
				
				<h2 class="mt-5">Past <span class="color-red">Events</span></h2>
				<?php echo do_shortcode('[past_event_list]');?>
			</div>
		</div>
	</div>
</section>
<?php get_footer(); ?>