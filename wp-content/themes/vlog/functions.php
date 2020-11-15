<?php
/**
 * vlog functions and definitions
 *
**/

		
		add_theme_support( 'title-tag' );

	add_theme_support( 'menus' );
	add_theme_support( 'post-thumbnails' );

	// Set post thumbnail size.
	set_post_thumbnail_size( 1200, 9999 );

	// Add custom image size used in Cover Template.
	add_image_size( 'twentytwenty-fullscreen', 1980, 9999 );

	// Custom logo.
	$logo_width  = 120;
	$logo_height = 90;

	


function vlog_menus(){

	$locations = array(
		'primary'  => __('Header Menu'),
		
		'footer'   => __('Footer Menu')
		
	);

	register_nav_menus( $locations );
}

add_action( 'init', 'vlog_menus' );

	add_theme_support(
		'custom-logo',
		array(
			'height'      => $logo_height,
			'width'       => $logo_width,
			'flex-height' => true,
			'flex-width'  => true,
		)
	);


function register_custom_menu_page() {
    add_menu_page('Theme Options', 'Theme Options', 'manage_options', 'themeoptions', '_custom_menu_page', null, 6); 
}
add_action('admin_menu', 'register_custom_menu_page');

function _custom_menu_page(){
   echo "<h1>Theme Options</h1>";  
   echo $post->ID;
   echo get_post_type();
   
   
}

add_action('add_meta_boxes', 'custom_meta_box');
function custom_meta_box() {
    global $post;
   
		add_meta_box('header-options', 'Header Options', 'header_options_cb', 'themeoptions');
		add_meta_box('post-banner', 'Banner Slide', 'post_banner_cb', 'post');
    }
	
	function header_options_cb(){
    global $post;
    $logo_img = get_post_meta($post->ID, 'logo_img', true);
    $product_btn = get_post_meta($post->ID, 'product_btn', true);
	
   
?>
<table class="input_fields_wrap_sponsor_section">
    
   
	
   <tr class="form-table">
        <th><label for="logo_img">Upload Image</label></th>
        <td><input name="logo_img" type="text" id="logo_img" value="<?php echo stripcslashes($logo_img);?>"  class="regular-text">
            <button type="button" class="upload_logo_image">Upload Header Logo</button>
            <?php if(stripcslashes($logo_img) != ""){?>
            <p><img src="<?php echo stripcslashes($logo_img);?>" width="200"></p>
            <?php } ?></td>
    </tr>
  </table>
<script type="text/javascript">
    jQuery(document).ready(function(){
        jQuery(document).on("click",".upload_logo_image",function(e){
            e.preventDefault();
            var input_filed = jQuery(this).parents("td").children("input");
            var meta_image_frame;
            var thisVal=jQuery(this).val();
            if( meta_image_frame ){
                    wp.media.editor.open();
                    return;
                }
                meta_image_frame = wp.media.frames.file_frame = wp.media({
                    title: 'Upload Image Window',
                    button: {text: 'Add Image'},
                    library: { type: 'image'}
                });
                meta_image_frame.on('select', function(){
                    var media_attachment = meta_image_frame.state().get('selection').first().toJSON();
                    console.log(media_attachment);
                    var url = '';
                    jQuery(input_filed).val(media_attachment.url);
                });
                meta_image_frame.open();
        });
    });
</script>
<?php
}

function post_banner_cb(){
	 global $post;
	$featured_item= get_post_meta($post->ID, 'featured_item', true);
	$include_post_to_whats_hot= get_post_meta($post->ID, 'include_post_to_whats_hot', true);
	
    //$slider_content = get_post_meta($post->ID, 'slider_content', true);
    
	?>
	<table class="input_fields_wrap_sponsor_section">
	<tr class="form-table">
        <th><label>Add to Slider</label></th>
        <td><input type="checkbox" name="featured_item" id="featured_item" value="<?php if ( $featured_item!=""){ echo "yes"; }?>" <?php if ( $featured_item!="" ) echo 'checked="checked"';  ?>></td>
		
         
    </tr>
	<tr class="form-table">
        <th><label>Include Post to What's Hot section</label></th>
        <td><input type="radio" name="include_post_to_whats_hot" value="yes" <?php if ( $include_post_to_whats_hot =="yes" ) echo 'checked="checked"';  ?>>Yes</td>
		<td><input type="radio" name="include_post_to_whats_hot" value="no" <?php if ( $include_post_to_whats_hot =="") echo 'checked="checked"';?><?php if ( $include_post_to_whats_hot =="no" ) echo 'checked="checked"';  ?>>No</td>
		
         
    </tr>
   
  </table>
  
<?php 	
}
add_action('save_post', 'custommeta_save');
function custommeta_save($post_id) {
    global $post;
	


		 $featured_item = $_POST['featured_item'];
		 update_post_meta($post_id, 'featured_item', $featured_item);
		  $include_post_to_whats_hot = $_POST['include_post_to_whats_hot'];
		 update_post_meta($post_id, 'include_post_to_whats_hot', $include_post_to_whats_hot);
		 
}

add_filter('nav_menu_css_class' , 'special_nav_class' , 10 , 2);

function special_nav_class ($classes, $item) {
  if (in_array('current-menu-item', $classes) ){
    $classes[] = 'active ';
  }
  return $classes;
}