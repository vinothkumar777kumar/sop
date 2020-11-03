<?php
/*
  Plugin Name: Whook content slider
  Description: Whook content slider is a Post, Page and Specific Category's Posts Slider
  Version: 1.0
  Author: D'arteweb
  Author URI: http://darteweb.com
*/


add_image_size( 'wrcis-home-thumb', 500, 300, true );

function wrcis_wpdocs_slider_css() {
	
   wp_register_style('wrcis-owl-carousel-min-css',plugins_url('css/owl.carousel.min.css',__FILE__));
   wp_enqueue_style('wrcis-owl-carousel-min-css');
   wp_register_style('wrcis-slider-style',plugins_url('css/slider-style.css',__FILE__));
   wp_enqueue_style('wrcis-slider-style');
}
add_action('wp_enqueue_scripts','wrcis_wpdocs_slider_css');


function wrcis_wpdocs_slider_scripts() {
   wp_register_script('wrcis-owl-carousel-min-js',plugins_url('js/owl.carousel.min.js',__FILE__));
   wp_enqueue_script('wrcis-owl-carousel-min-js');
   wp_register_script('wrcis-slider-js',plugins_url('js/wrcis-slider-js.js',__FILE__));
   wp_enqueue_script('wrcis-slider-js');

}
add_action('wp_footer','wrcis_wpdocs_slider_scripts');


class DtSliderClass {
	
	public $attsr;
	
	public static function wrcis_slider_show_func( $atts, $content = "" ) {

		$atts = shortcode_atts( array(
		'title' => '',
		'category_id' => '',
		'post_id' => '',
		'page_id' => '',
		'order_by' => 'ID',
		'order' => 'DESC',
		'limit' => '4'
     	), $atts, 'wrcis_slider' );
		
		global $wpdb;
		$prefix = $wpdb->prefix;
		
		if(isset($atts['category_id']) && !empty($atts['category_id']))
		{
			$sql = "SELECT $wpdb->posts.ID,$wpdb->posts.post_content,$wpdb->posts.post_title FROM $wpdb->posts
						LEFT JOIN $wpdb->term_relationships ON ($wpdb->posts.ID = $wpdb->term_relationships.object_id)
						LEFT JOIN $wpdb->term_taxonomy ON ($wpdb->term_relationships.term_taxonomy_id = $wpdb->term_taxonomy.term_taxonomy_id)
						WHERE $wpdb->posts.post_status = 'publish' AND $wpdb->term_taxonomy.term_id IN(".$atts['category_id'].")
						ORDER BY $wpdb->posts.".$atts['order_by']." ".$atts['order']." LIMIT ".$atts['limit']; 
		}elseif(isset($atts['post_id']) && !empty($atts['post_id']))
		{
			$sql = "SELECT $wpdb->posts.ID,$wpdb->posts.post_content,$wpdb->posts.post_title FROM $wpdb->posts
						WHERE $wpdb->posts.post_status = 'publish' AND $wpdb->posts.ID IN(".$atts['post_id'].") AND $wpdb->posts.post_type = 'post' 
						ORDER BY $wpdb->posts.".$atts['order_by']." ".$atts['order']; 
		}elseif(isset($atts['page_id']) && !empty($atts['page_id']))
		{
			$sql = "SELECT $wpdb->posts.ID,$wpdb->posts.post_content,$wpdb->posts.post_title FROM $wpdb->posts
						WHERE $wpdb->posts.post_status = 'publish' AND $wpdb->posts.ID IN(".$atts['page_id'].") AND $wpdb->posts.post_type = 'page'
						ORDER BY $wpdb->posts.".$atts['order_by']." ".$atts['order']; 
		}
        
		if(isset($sql) && !empty($sql))
		{
		   $result = $wpdb->get_results($sql, OBJECT);
		}
		ob_start();
		?>
        
        <div class="main-slider-area">
        
           <?php if(isset($atts['title']) && !empty($atts['title'])) { ?>
           <div class="slider-title-area">
             <center><h3><?php echo $atts['title'];?></h3></center>
           </div><!--slider-title-area-->
           <?php } ?>
        
        <?php
		//$result = '';
		if(isset($result) && !empty($result))
		{
		   ?>
           <div class="bg-area">
           <div class="banner-slider owl-carousel" >
           <?php
		   foreach($result as $val)
		   {
			 $image = wp_get_attachment_image_src( get_post_thumbnail_id( $val->ID ),'full'); 
			 
			 ?>
                  <div class="item"><img  src="<?php echo $image[0]; ?>"></div>
             <?php  
		   }
		   ?>
           </div><!--banner-slider-->
           <div class="bg-cover"></div>
           </div>
           
           <div class="inner-slider">
           <div class="top-slider owl-carousel">
           <?php
		   $is_mobile = wp_is_mobile();
		   foreach($result as $val)
		   {
			 $image = wp_get_attachment_image_src(get_post_thumbnail_id($val->ID),'wrcis-home-thumb' ); 
			 ?>
                  <?php if($is_mobile) { ?>
                  <div class="item">
                  <div class="slider-image">
                       <img src="<?php echo $image[0]; ?>">
                  </div><!--slider-image-->

                  <div class="slider-content">
                      <div class="slider-content-area">
                      <h4 class="slide-title"><?php echo $val->post_title; ?></h4>
                      <p><?php echo wp_trim_words( $val->post_content, $num_words = 25, $more = null ); ?></p>
                      <p><a href="<?php echo get_permalink($val->ID);?>" class="read_more" title="<?php echo $val->post_title; ?>">Read More...</a></p>
                  </div>
                  </div><!--slider-content-->
                  </div>

                  <?php }else{ ?>
                  <div class="item" >
                  <div class="slider-content">
                      <div class="slider-content-area">
                      <h4 class="slide-title"><?php echo $val->post_title; ?></h4>
                      <p><?php echo wp_trim_words( $val->post_content, $num_words = 25, $more = null ); ?></p>
                      <p><a href="<?php echo get_permalink($val->ID);?>" class="read_more" title="<?php echo $val->post_title; ?>">Read More...</a></p>
                      </div>
                  </div><!--slider-content-->

                  <div class="slider-image">
                     <img src="<?php echo $image[0]; ?>">
                  </div><!--slider-image-->
                  </div>

                  <?php } ?>
             <?php  
		   }
		   ?>
           </div><!--banner-slider-->
           </div>
          <div class="control-area"> 
          <div class="owl-controls">
                <div class="owl-nav">
                    <div class="owl-prev"><img src="<?php echo plugins_url('images/left.png',__FILE__);?>" class="left-icon" ></div>
                    <div class="owl-next"><img src="<?php echo plugins_url('images/right.png',__FILE__);?>" class="right-icon" ></div>
                </div>
            </div>
          </div><!--control-area-->     
          </div> <!--main-slider-area-->  
           <?php
		}else
		{
		   echo "<h6>Sorry! No Slider Found</h6>";
		}
		 return ob_get_clean();
	}
 }
add_shortcode('dt_slider',array('DtSliderClass','wrcis_slider_show_func'));
