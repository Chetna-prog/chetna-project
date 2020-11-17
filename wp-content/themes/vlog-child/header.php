<?php
/**
 * The header for our theme
 */

?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- basic -->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <!-- mobile metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <!-- site metas -->
      <title>Header Design</title>
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">
      <!-- bootstrap css -->
      <link rel="stylesheet" href="<?php  echo get_stylesheet_directory_uri()?>/css/bootstrap.min.css">
      <!-- style css -->
      <link rel="stylesheet" href="<?php  echo get_stylesheet_directory_uri()?>/css/style.css">
      <!-- Responsive-->
      <link rel="stylesheet" href="<?php  echo get_stylesheet_directory_uri()?>/css/responsive.css">
      
      
      <!-- Tweaks for older IEs-->
      <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
       <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;1,300&display=swap" rel="stylesheet">
   </head>
   <!-- body -->
   <body class="main-layout">
      
      <!-- header -->
      <header>
         <!-- header inner -->
         <div class="header">
            <div class="container">
               <div class="row">
                  <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col logo_section">
                     <div class="full">
                        <div class="center-desk">
                           <div class="logo"> <a href="index.html"><img src="<?php echo get_option('vlog_logo_uploader'); ?>" alt="logo"></a> </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-xl-9 col-lg-9 col-md-9 col-sm-9">
                     <div class="menu-area">
                        <div class="limit-box">
                           <nav class="main-menu">
						    <?php wp_nav_menu( array(
                    'theme_location' => 'primary',
                    'depth' => 2,
                    'container' => false,
                    'menu_class' => 'menu-area-main',
                    'direct_parent' => true,
                    'sub_menu' => true,
                    'show_parent' => true,
                    'walker'          => '',
                    'items_wrap' => '<ul id="%1$s" class="%2$s" role="menu" >%3$s</ul>',
                   // 'walker'         => new my_walker_nav_menu_start_el,
                )); ?>
				<span class="last"><a href="#"><i class="fa fa-search"></i></a></span>
                              <!--<ul class="menu-area-main">
                                 <li class="active"> <a href="#">Home</a> </li>
                                 <li> <a href="#about">About</a> </li>
                                 <li><a href="#plant">Plant</a></li>
                                 <li><a href="#gallery">Gallery</a></li>
                                 <li><a href="#contact">Contact Us</a></li>
                                  <li class="last"><a href="#"><i class="fa fa-search"></i></a></li>
                              </ul>-->
                           </nav>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <!-- end header inner -->
      </header>