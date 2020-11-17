<?php
/**
 * vlog functions and definitions
 *
 **/

add_theme_support('title-tag');

add_theme_support('menus');
add_theme_support('post-thumbnails');

// Set post thumbnail size.
set_post_thumbnail_size(1200, 9999);

function vlog_child_menus()
{
    $locations = [
        'primary' => __('Header Menu'),

        'footer' => __('Footer Menu'),
    ];

    register_nav_menus($locations);
}

add_action('init', 'vlog_child_menus');

/* Theme Customizer Panel */

function vlog_child_customize_register($wp_customize)
{
    $wp_customize->add_section('vlog_header_section', [
        'title' => "Vlog Header Section",
        'description' => '',
        'priority' => 120,
    ]);

    /* Logo Upload   */
    $wp_customize->add_setting('vlog_logo_uploader', [
        'default' => get_bloginfo('template_url') . '/images/logo.png',
        'capability' => 'edit_theme_options',
        'type' => 'option',
    ]);

    $wp_customize->add_control(
        new WP_Customize_Image_Control($wp_customize, 'logo_image_upload', [
            'label' => "Choose Logo Image",
            'section' => 'vlog_header_section',
            'settings' => 'vlog_logo_uploader',
        ])
    );
}
add_action('customize_register', 'vlog_child_customize_register');


add_action('add_meta_boxes', 'custom_meta_boxes');
function custom_meta_boxes() {
    global $post;
   
		
		add_meta_box('post-banner', 'Banner Slide', 'post_banner_cbs', 'post');
    }
	
function post_banner_cbs()
{
    global $post;
    $featured_item = get_post_meta($post->ID, 'featured_item', true);
    $include_post_to_whats_hot = get_post_meta(
        $post->ID,
        'include_post_to_whats_hot',
        true
    );
    //$slider_content = get_post_meta($post->ID, 'slider_content', true);
    ?>
	<table class="input_fields_wrap_sponsor_section">
	<tr class="form-table">
        <th><label>Add to Slider</label></th>
        <td><input type="checkbox" name="featured_item" id="featured_item" value="yes" <?php if (
            $featured_item == "yes"
        ) {
            echo 'checked="checked"';
        } ?> checked></td>
		
         
    </tr>
	<tr class="form-table">
        <th><label>Include Post to What's Hot section</label></th>
        <td><input type="radio" name="include_post_to_whats_hot" value="yes" <?php
        if ($include_post_to_whats_hot == "") {
            echo 'checked="checked"';
        }
        if ($include_post_to_whats_hot == "yes") {
            echo 'checked="checked"';
        }
        ?>>Yes</td>
		<td><input type="radio" name="include_post_to_whats_hot" value="no" <?php if (
      $include_post_to_whats_hot == "no"
  ) {
      echo 'checked="checked"';
  } ?>>No</td>
		
         
    </tr>
   
  </table>
  
<?php
}
add_action('save_post', 'custommeta_saves');
function custommeta_saves()
{
    global $post;

    $featured_item = $_POST['featured_item'];
    update_post_meta($post->ID, 'featured_item', $featured_item);
    $include_post_to_whats_hot = $_POST['include_post_to_whats_hot'];
    update_post_meta(
        $post->ID,
        'include_post_to_whats_hot',
        $include_post_to_whats_hot
    );
}

add_filter('nav_menu_css_class', 'special_nav_class_child', 10, 2);

function special_nav_class_child($classes, $item)
{
    if (in_array('current-menu-item', $classes)) {
        $classes[] = 'active ';
    }
    return $classes;
}
