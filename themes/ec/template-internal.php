<?php
/**
Template Name: internal Page
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
		<div class="row">
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
		</div>
	</div>
</section>
<?php get_footer(); ?>