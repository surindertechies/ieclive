<?php
/**
Template Name: Press Release
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
<section class="press-release press-int">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h2>Press Release</h2>
				<p>Dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident</p>
				<ul>
					<?php query_posts('post_type=pressrelease&paged=$paged&posts_per_page=-1'); ?>
					<?php if (have_posts()) { ?>
					<?php while (have_posts()) { the_post(); ?>
					<li>
						<?php the_post_thumbnail('medium', ['class' => 'img-fluid', 'title' => '']); ?>
						<a rel="image_group" href="<?php echo get_the_post_thumbnail_url();?>">&nbsp;</a>
					</li>
					<?php }}?>
				</ul>
			</div>
		</div>
	</div>
</section>
<?php get_footer(); ?>