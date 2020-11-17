<?php get_header(); ?>
      <!-- end header -->
      <section >
	  
         <div id="main_slider" class="carousel slide banner-main" data-ride="carousel">
		 
		 <?php 
  global $post;
  
 
   $blogbanner_arr = array('post_type' => 'post', 'posts_per_page' => -1, 'order' => 'DESC',
  
  'meta_query' => array
( 
    array(
     'key'     => 'featured_item',
    'value'   => 'yes',
    'compare' => '='
  )
)
); 
   $blogbanner_details= new WP_Query($blogbanner_arr);
 //print_r($blogbanner_details); ?>
            
            <ol class="carousel-indicators">
			
			<?php if ($blogbanner_details->have_posts()) { 

while ($blogbanner_details->have_posts()) {
	$i=0;+
 $blogbanner_details->the_post(); 	?>
               <li data-target="#main_slider" data-slide-to="<?php echo $i;?>" class="<?php if($i==0){echo "active";}  ?>"></li>
               <?php 
  $i++;
}
}
?>
            </ol>
		
            <div class="carousel-inner">
			<?php if ($blogbanner_details->have_posts()) {?>

	<?php   $i=0;
	while ($blogbanner_details->have_posts()) :
 $blogbanner_details->the_post(); 	
?>

               <div class="carousel-item <?php if($i==0){echo "active";}?>">
			   <img src="<?php the_post_thumbnail_url('full');?>" alt="" width="100%">
                  <div class="carousel-caption ">
                 <div class="container">
                    <div class="row marginii">
                       <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12">
                         
                             <h4><?php $category_detail=get_the_category(get_the_Id());foreach($category_detail as $cd){echo $cd->cat_name; }?></h4>
                             <h1><strong class="color">Tinci dunt vitae sem dor</strong></h1>
                             <p><span class="author_name">By <?php the_author();?></span><span class="date"><?php echo get_the_date('F d, Y');?></span><span>2 views</span></p>
                         
                       </div>
                   
                    
                     
                 
                  
						 <?php 
  global $post;
  
 
   $whats_hot_arr = array('post_type' => 'post', 'posts_per_page' => -1, 'order' => 'DESC',
  
  'meta_query' => array
( 
    array(
     'key'     => 'include_post_to_whats_hot',
    'value'   => 'yes',
    'compare' => '='
  )
)
); 
   $whats_hot_query= new WP_Query($whats_hot_arr);
   if ($whats_hot_query->have_posts()) {
 //print_r($blogbanner_details); ?>
                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
                           <div class="img-box">
                               <h2>What's hot!</h2>
							<?php    while ($whats_hot_query->have_posts()) {
 $whats_hot_query->the_post(); 	?>
                              <div class="row">
                                  <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
                                      <figure><img src="<?php the_post_thumbnail_url('full'); ?>" alt="img" class="img-responsive right-blog-img" /></figure>
                                  </div>
                                  <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12">
                                      <p style="margin-bottom:0px;"><?php the_title(); ?></p>
                                      <p class="date-style"><?php echo get_the_date('F d, Y');?></p>
                                  </div>
                               </div>  
							<?php }?>
							
                           </div>
                        </div>
   <?php }?>
                     </div>
                  </div>
               </div>
        </div>
             
			   
			   <?php $i++;  
 
   endwhile; ?>
   
		  
   
   <?php wp_reset_postdata(); ?> 
   
   <?php  }?>
            
         </div>
		 </div>
		 
      </section>
      <!-- Javascript files-->
      <script src="<?php  echo get_stylesheet_directory_uri()?>/js/jquery.min.js"></script>
      <script src="<?php  echo get_stylesheet_directory_uri()?>/js/bootstrap.bundle.min.js"></script>
      
      <!-- javascript --> 
   </body>
</html>