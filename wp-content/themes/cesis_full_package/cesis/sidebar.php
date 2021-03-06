<?php
/**
 * The sidebar containing the main widget area.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Cesis
 */


global $cesis_data;


$custom_sidebar = redux_post_meta( 'cesis_data', get_the_ID(), 'cesis_meta_custom_sidebar');
$sidebar_select = redux_post_meta( 'cesis_data', get_the_ID(), 'cesis_meta_sidebar_select');

if(is_archive() && get_post_type() == 'post'){
$sidebar_select = $cesis_data['cesis_blog_archive_sidebar_select'];
$sidebar_style = $cesis_data["cesis_sidebar_style"] ;
}elseif(is_archive() && get_post_type() == 'portfolio'){
$sidebar_select = $cesis_data['cesis_portfolio_archive_sidebar_select'];
$sidebar_style = $cesis_data["cesis_sidebar_style"] ;
}elseif(is_archive() && get_post_type() == 'staff'){
$sidebar_select = $cesis_data['cesis_staff_archive_sidebar_select'];
$sidebar_style = $cesis_data["cesis_sidebar_style"] ;
}elseif(is_archive() && get_post_type() == 'careers'){
$sidebar_select = $cesis_data['cesis_career_archive_sidebar_select'];
$sidebar_style = $cesis_data["cesis_sidebar_style"] ;
}elseif(cesis_check_woo_status() == true && is_shop() || cesis_check_woo_status() == true && is_product_category() || cesis_check_woo_status() == true && is_product_tag() ){
$sidebar_select = $cesis_data['cesis_product_archive_sidebar_select'];
$sidebar_style = $cesis_data["cesis_sidebar_style"] ;
}elseif($custom_sidebar == 'yes'){
	$sidebar_style = redux_post_meta( 'cesis_data', get_the_ID(), 'cesis_meta_sidebar_style');
}else{
	$sidebar_style = $cesis_data["cesis_sidebar_style"] ;
}
if(isset($sidebar_select) && $sidebar_select !== '' && $sidebar_select !== 'None'){
$page_sidebar = $sidebar_select;
}
else {
$page_sidebar = 'cesis_mc_sidebar';
}
?>
<aside class="main-sidebar <?php echo esc_attr($sidebar_style); ?>" role="complementary">

  <?php dynamic_sidebar($page_sidebar); ?>
</aside>
<!-- aside -->
