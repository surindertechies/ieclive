<?php
/**
Template Name: Blog
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
<section class="int-container">
	<div class="container">
		<div class="blog-main">
			<div class="row">
				<?php query_posts("cat=1&paged=$paged&posts_per_page=6"); ?>
				<?php if (have_posts()) { ?>
				<?php while (have_posts()) { the_post(); ?>
				<div class="col-md-4">
					<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('full', ['class' => 'img-fluid b-r-10', 'title' => '']); ?></a>
					<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
					<?php content(40);?>
				</div>
				<?php } ?>
				<div class="page-navi"><?php wp_pagenavi(); }?></div>
			</div>
		</div>
	</div>
	</div>
</section>
<?php get_footer(); ?>