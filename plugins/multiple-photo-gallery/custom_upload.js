jQuery(document).ready(function() {
	var formfield;
		jQuery('.upload_image_button').click(function() {
			jQuery('html').addClass('Image');
			var num = jQuery(this).attr('data-num');
			formfield = jQuery('.id_img[data-num='+num+']').attr('name');
			//alert(formfield);
			tb_show('', 'media-upload.php?type=image&TB_iframe=true');
			return false;
		});
		
	window.send_to_editor = function(html){
	if (formfield) {
		fileurl = jQuery('img',html).attr('src');
		var n = jQuery('.image-entry').size();
		alert(fileurl);
		jQuery('#upload_img'+n).val(fileurl);
		jQuery('.img-preview img').attr('src', fileurl);
		jQuery('.upload_image_button').remove();
		tb_remove();
		
		var n = n+1;
		jQuery('html').removeClass('Image');
		jQuery('#droppable').append('<div class="image-entry" draggable="true"><a href="javascript:void(0);" class="upload_image_button" data-num="'+n+'">upload Image</a><input type="hidden" name="upload_img['+n+']" id="upload_img'+n+'" class="id_img" data-num="'+n+'" value=""><div class="img-preview" data-num=""></div></div>');
		} else {
			window.original_send_to_editor(html);
		}
	};
	
	var isImg = jQuery('.img-preview img').attr('src');
	if(isImg){
		
	}
	
});