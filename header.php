<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ThemeCom
 */
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
	<title><?php echo bloginfo('name');?> - <?php bloginfo('description') ?></title>
	<script type='text/javascript' src='http://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js'></script>
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'themecom' ); ?></a>
	<header id="masthead" class="site-header">
		<div class="small-header row ml-0 mr-0">
			<div class="top-bar  col-lg-6 col-md-6 col-sm-12 col-xs-12">
					<div class="top-left col-lg-7 float-lg-left">
						<?php my_social_icons_output();?>
					</div>
			</div>
			<div class="top-nav col-lg-5 col-md-6 col-sm-12 col-xs-12">
				<div class="top-right float-lg-right">
					<?php 
					wp_nav_menu( array(
							'theme_location' => 'menu-3',
							'menu_id'        => 'small-menu',
						) );
					?>	
				</div>
			</div>
		</div><!-- .small-header -->
		<div class="site-branding row ml-0 mr-0">
                 <div class="header-title col-lg-6 col-md-6 col-sm-12 col-xs-12">
                  		<h2 class="col-lg-7 float-lg-left"><?php bloginfo('name') ?></h2>
                 </div>
	           <div class="cart-martify col-lg-5 col-md-6 col-sm-12 col-xs-12 float-lg-right float-md-right"> 
	           	<div class="float-lg-right">
	           		<?php themecom_wishlist_link(); ?>
					<?php themecom_cart_link(); ?>
					

					</div>                
				</div>
		</div><!-- .site-branding -->
		<div class="header-wrapper ">
			<div id="site-navigation" class="main-navigation">
					<div class="container">
							<?php
							wp_nav_menu( array(
								'theme_location' => 'menu-1',
								'menu_id'        => 'mega-menu',
							));
							?>
					</div>
			</div>
		</div>
		

	</header><!-- #masthead -->

	<div id="content" class="site-content container">
 <?php 
// do_action('themecom_before_content');