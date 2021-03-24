<?php
/*
* Plugin Name: Multiple Photo Gallery
* Description: This is custom meta field for add multiple photos in any posts.
* Version: 1.0
* Author: Vikas Sansoa
*/
add_action( 'admin_init', 'add_photo_gallery' );
add_action( 'admin_head', 'print_scripts' );
add_action( 'save_post', 'update_photo_gallery', 10, 2 );

/**
 * Add custom Meta Box to Posts post type
 */
function add_photo_gallery() 
{
	$screens = array( 'event' );
    foreach($screens as $screen){add_meta_box(
        'photo_gallery',
        'Photo Gallery',
        'photo_gallery_options',
        $screen,// here you can set post type name
        'normal',
        'core'
    );
	}
}

/**
 * Print the Meta Box content
 */
function photo_gallery_options() 
{
    global $post;
    $gallery_data = get_post_meta( $post->ID, 'gallery_data', true );
wp_enqueue_style('wl-font-awesome-4', plugins_url('font-awesome/css/font-awesome.min.css',__FILE__));
    // Use nonce for verification
    wp_nonce_field( plugin_basename( __FILE__ ), 'noncename' );
?>

<div id="dynamic_form">

    <div id="field_wrap">
    <?php 
    if ( isset( $gallery_data['image_url'] ) ) 
    {
        for( $i = 0; $i < count( $gallery_data['image_url'] ); $i++ ) 
        {
        ?>

        <div class="image_row">
			<input type="hidden"  class="meta_image_url"  name="gallery[image_url][]"  value="<?php esc_html_e( $gallery_data['image_url'][$i] ); ?>"  />
            <div class="image_wrap">
				<img src="<?php esc_html_e( $gallery_data['image_url'][$i] ); ?>" height="150" width="150" />
			</div>

          <div class="icons">
			<a href="javascript:void(0);" onclick="add_image(this)"><i class="fa fa-pencil"></i></a>
			<a href="javascript:void(0);" onclick="remove_field(this)"><i class="fa fa-times"></i></a>
          </div>

		</div>
        <?php
        } // endif
    } // endforeach
    ?>
    </div>

    <div style="display:none" id="add-image">
		<div class="image_row">
			<input type="hidden"  class="meta_image_url"  name="gallery[image_url][]"  value=""  />
            <div class="image_wrap add_new">
				<a href="javascript:void(0);" onclick="add_image(this)"><i class="fa fa-plus"></i></a>
			</div>

          <div class="icons">
			<a href="javascript:void(0);" onclick="remove_field(this)"><i class="fa fa-times"></i></a>
          </div>

		</div>
    </div>

    <div id="add_field_row">
	<p>Please upload image size 290X290 only.</p>
      <input class="button" type="button" value="Add Field" onclick="add_row()" />
    </div>

</div>

  <?php
}

/**
 * Print styles and scripts
 */
function print_scripts()
{
    // Check for correct post_type
    global $post;
    ?>  
    <style type="text/css">
	.image_row{
		display: inline-block;
		position: relative;margin:10px 25px 10px 0;vertical-align: middle;
	}
	.image_wrap{border: 1px solid #E7E7E7;}
	.icons{
		position: absolute;
		  top: 0;
		  right: -14px;
	}
	.icons a{background-color: #f7f7f7;border: 1px solid #E7E7E7;
  color: #333;
  border-radius: 50%;
  width: 30px;
  height: 30px;
  display: block;
  text-align: center;
  line-height: 30px;
}
.image_wrap.add_new a{width: 150px;
  height: 150px;display:block;
  line-height: 150px;background-color:#f7f7f7;
  text-align: center;font-size: 50px;
  color: #E7E7E7;}
         .clear {
        clear:both;
      }


      #dynamic_form .field_row {
        border:1px solid #999;
        margin-bottom:10px;
        padding:10px;
      }

      #dynamic_form label {
        padding:0 6px;
      }
    </style>

    <script type="text/javascript">
        function add_image(obj) {
            var parent=jQuery(obj).parent().parent();
			console.log(parent)
            var inputField = jQuery(parent).find("input.meta_image_url");

            tb_show('', 'media-upload.php?TB_iframe=true');

            window.send_to_editor = function(html) {
                var url = jQuery(html).find('img').attr('src');
                inputField.val(url);
                jQuery(parent)
                .find("div.image_wrap")
                .html('<img src="'+url+'" height="150" width="150" />');
                tb_remove();
            };

            return false;  
        }

        function remove_field(obj) {
            var parent=jQuery(obj).parent().parent();
            //console.log(parent)
            parent.remove();
        }

        function add_row() {
            var row = jQuery('#add-image').html();
            jQuery(row).appendTo('#field_wrap');
        }
    </script>
    <?php
}

/**
 * Save post action, process fields
 */
function update_photo_gallery( $post_id, $post_object ) 
{
    // Doing revision, exit earlier **can be removed**
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )  
        return;

    // Doing revision, exit earlier
    if ( 'revision' == $post_object->post_type )
        return;

    // Verify authenticity
    if ( !wp_verify_nonce( $_POST['noncename'], plugin_basename( __FILE__ ) ) )
        return;

    

    if ( $_POST['gallery'] ) 
    {
        // Build array for saving post meta
        $gallery_data = array();
        for ($i = 0; $i < count( $_POST['gallery']['image_url'] ); $i++ ) 
        {
            if ( '' != $_POST['gallery']['image_url'][ $i ] ) 
            {
                $gallery_data['image_url'][]  = $_POST['gallery']['image_url'][ $i ];
            }
        }

        if ( $gallery_data ) 
            update_post_meta( $post_id, 'gallery_data', $gallery_data );
        else 
            delete_post_meta( $post_id, 'gallery_data' );
    } 
    // Nothing received, all fields are empty, delete option
    else 
    {
        delete_post_meta( $post_id, 'gallery_data' );
    }
}
