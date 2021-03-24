<?php
/**
Template Name: Learn More
**/
get_header(); ?>

<section id="breadcrumb">
	<div class="container">
		<div class="row align-items-center breadcrumb-height">
			<div class="col-md-12 text-center">
				<h1><?php the_title();?></h1>
			</div>
		</div>
	</div>
</section>
<?php
// Start the loop.
while ( have_posts() ) : the_post();
	the_content();
	// Include the page content template.
	//get_template_part( 'template-parts/content', 'page' );

	// If comments are open or we have at least one comment, load up the comment template.
	if ( comments_open() || get_comments_number() ) {
		comments_template();
	}
	// End of the loop.
endwhile;
wp_reset_query();
?>
<section class="bio-cont">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="slider-cont">
					<?php query_posts('post_type=chairbio&paged=$paged&posts_per_page=10'); ?>
					<?php if (have_posts()) { ?>
					<?php while (have_posts()) { the_post(); ?>
					<div class="bio-slide clearfix">
						<div class="bio-img">
							<?php the_post_thumbnail('full', ['class' => 'img-fluid', 'title' => '']);?>
							<a class="various iframe" href="<?php echo the_field('video'); ?>"><img src="<?php bloginfo('template_directory'); ?>/images/youtube-icon.png" alt="Play" /></a>
						</div>
						<div class="bio-txt">
							<h2>Chair Bio</h2>
							<h3><?php the_title();?> <span>(<?php the_field('designation'); ?>)</span></h3>
							<?php the_content();?>
						</div>
					</div>
					<?php }}?>
					
				</div>
				<div id="nav" class="nav"></div>
			</div>
		</div>
	</div>
</section>
<section class="leadership ldr-int">
	<div class="container">
		<div class="row text-center">
			<div class="col-md-6 offset-md-3">
				<h2>Members of <span class="color-red">EC</span></h2>
				<p>Dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident lorem ipsum dolor sit amet, consectetur adipisicing elit</p>
			</div>
			<div class="col-md-12">
				<div class="jcarousel-wrapper">
					<div class="jcarousel">
						<ul>
							<?php query_posts('post_type=pillars&paged=$paged&posts_per_page=100'); ?>
							<?php if (have_posts()) { ?>
							<?php while (have_posts()) { the_post(); ?>
							<li>
								<?php the_post_thumbnail('medium', ['class' => 'img-fluid rounded-circle', 'title' => '']); ?>
								<h3><?php the_title();?></h3>
								<?php the_content();?>
							</li>
							<?php }}?>
						</ul>
					</div>
					<div class="nxt-prv">
						<a href="#" class="jcarousel-control-prev">&lsaquo;</a>
						<a href="#" class="jcarousel-control-next">&rsaquo;</a>
					</div>
					<div class="jcarousel-pagination"></div>
				</div>
			</div>
		</div>
	</div>
</section>
<section class="press-release">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h2>Press <span class="color-red">Release</span></h2>
				<p>Dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident</p>
				<ul>
					<?php query_posts('post_type=pressrelease&paged=$paged&posts_per_page=5'); ?>
					<?php if (have_posts()) { ?>
					<?php while (have_posts()) { the_post(); ?>
					<li>
						<?php the_post_thumbnail('full', ['class' => 'img-fluid', 'title' => '']); ?>
						<a rel="image_group" href="<?php echo get_the_post_thumbnail_url();?>">&nbsp;</a>
					</li>
					<?php }}?>
				</ul>
			</div>
			<div class="col-md-12 text-center mT50"><a href="<?php echo get_option("siteurl"); ?>/press-release" class="button red-bg text-white">View More</a></div>
		</div>
	</div>
</section>
<?php get_footer(); ?>