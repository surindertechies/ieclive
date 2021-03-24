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
				<h1><?php the_title(); ?></h1>
			</div>
		</div>
	</div>
</section>
<section class="int-container">
	<div class="container">
		<div class="row">
			<?php if (have_posts()) { 
			while (have_posts()) { the_post(); ?>
			<div class="col-md-8 blog-main-dtl">
				<?php the_post_thumbnail('large', ['class' => 'img-fluid b-r-10', 'title' => '']); ?>
				<h3><?php the_title(); ?></h3>
				<span class="admn-date">
					<i class="fa fa-map-marker"></i> <?php echo get_post_meta(get_the_ID(),'event_location', true) ?>
					<i class="fa fa-calendar m-l-20"></i> 
					<?php 
						$event_date = get_post_meta(get_the_ID(),'event_date', true); 
						echo date("d", strtotime($event_date)).', '.date("F", strtotime($event_date)).', '.date("Y", strtotime($event_date));
					?>
					<i class="fa fa-clock-o m-l-20"></i> <?php echo get_post_meta(get_the_ID(),'event_time', true) ?>
				</span>
				<?php the_content();?>
				<div class="mt-5 event-gallery">
					
					<?php  $gallery_data = get_post_meta( $post->ID, 'gallery_data', true );
						   if ( isset( $gallery_data['image_url'] ) ) 
						{ echo '<h3>Event <span class="color-red">Gallery</span></h3><ul class="pgwSlideshow">';
							for( $i = 0; $i < count( $gallery_data['image_url'] ); $i++ ) 
							{ 
							$image_url =  $gallery_data['image_url'][$i] ;
							$attachment_id = attachment_url_to_postid($image_url );
						?>
							<li class="slide"><a data-fancybox="gallery" href="<?php esc_html_e( $gallery_data['image_url'][$i] ); ?>"><?php echo wp_get_attachment_image($attachment_id,'thumbnail');?></a></li>
					<?php } echo "</ul>"; } ?>
				</div>
			</div>
			<?php }}?>
			<div class="col-md-4 blog-rel">
				<h2>Upcoming <span>Events</span></h2>
				<?php $today= date('m/d/Y');
				query_posts(array('post_type'=>'event', 'meta_key' => 'event_date', 'posts_per_page' => 4,
				'orderby' => 'meta_value',
				'order'=>'ASC' ));
				if(have_posts()) {
					$has_upcoming_event = false;
					while(have_posts()) : the_post();
					$event_date = get_post_meta(get_the_ID(),'event_date', true);
					if(strtotime($event_date) >= strtotime($today)){ ?>
					<div class="event-box">
						<div class="row align-items-center">
							<div class="col-md-12 ">
								<a href="<?php echo get_permalink();?>"><?php the_title();?></a>
								<span class="admn-date">
									<p><i class="fa fa-map-marker"></i> <?php echo get_post_meta(get_the_ID(),'event_location', true) ?></p>
									<p>
										<i class="fa fa-calendar"></i> 
										<?php 
											$event_date = get_post_meta(get_the_ID(),'event_date', true); 
											echo date("d", strtotime($event_date)).', '.date("F", strtotime($event_date)).', '.date("Y", strtotime($event_date));
										?>
									</p>
									<p><i class="fa fa-clock-o"></i> <?php echo get_post_meta(get_the_ID(),'event_time', true) ?></p>
								</span>
								<?php the_excerpt(150);?>
							</div>
						</div>
					</div>
					<?php $has_upcoming_event = true;
					}
					endwhile; wp_reset_query();
					if (!$has_upcoming_event){?>
				<div class="event-box"><div class="date text-center"><h3>No Upcoming Event</h3></div></div>
				<?php }
				} else {?>
					<div class="event-box"><div class="date text-center"><h3>No Upcoming Event</h3></div></div>
				<?php }?>
			</div>
		</div>
	</div>
</section>
<?php get_footer(); ?>