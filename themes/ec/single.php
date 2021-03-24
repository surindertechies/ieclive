<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>
<section id="breadcrumb">
	<div class="container">
		<div class="row align-items-center breadcrumb-height">
			<div class="col-md-12 text-center">
				<h1>Blog</h1>
			</div>
		</div>
	</div>
</section>
<section class="int-container">
	<div class="container">
		<div class="row">
			<?php //query_posts("cat=1&paged=$paged&posts_per_page=3"); ?>
			<?php if (have_posts()) { ?>
			<?php while (have_posts()) { the_post(); ?>
			<div class="col-md-8 blog-main-dtl">
				<?php the_post_thumbnail('large', ['class' => 'img-fluid b-r-10', 'title' => '']); ?>
				<h3><?php the_title(); ?></h3>
				<span class="admn-date"><i class="fa fa-user"></i> <?php echo get_author_name();?> <i class="fa fa-clock-o m-l-20"></i> <?php echo get_the_date('F j, Y');?></span>
				<?php the_content();?>
			</div>
			<?php }}?>
			<div class="col-md-4 blog-rel">
				<h2>Related <span>Blog</span></h2>
				<?php query_posts("cat=1&paged=$paged&posts_per_page=3"); ?>
				<?php if (have_posts()) { ?>
				<?php while (have_posts()) { the_post(); ?>
				<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('large', ['class' => 'img-fluid b-r-10', 'title' => '']); ?>
				<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
				<?php }}?>
			</div>
		</div>
	</div>
</section>
<?php get_footer(); ?>