<?php
/**
 * The template for displaying all pages
 *
 * Template Name: Homepage
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package ThemeCom
 */

get_header();
?>

  <div id="primary" class="content-area container cat">

        <div class="category-part col-lg-3">
              <div class="cat-header">
                <h1>CATEGORIES</h1>
              </div>
          <?php  wp_nav_menu(array( 'theme_location' => 'menu-2','class' => 'cat-nav'));?>
        </div>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!-- Include the above in your HEAD tag-->

<div id="myCarousel" class="carousel slide" data-ride="carousel" style="float: left;width: 75%;">
        <!-- Wrapper for slides -->
        <div class="carousel-inner" style="width: 100%; float: left;">
            <?php
            $c = 0;
            $class = '';
            $args = array('post_type' => 'slider' , 'posts_per_page' => 4);
            $myposts = get_posts( $args );
            foreach ( $myposts as $post ) : setup_postdata( $post );
                $c++;
            $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );
            $url = $thumb['0'];
               if ( $c == 1 ) $class .= ' active';
            else $class = '';
                ?>
                <div class="item <?php echo $class; ?>">
                 <img src="<?php echo $url; ?>">
                    <div class="carousel-caption">
                        <?php the_title(); ?>
                        <p><?php the_content(); ?></p>
                    </div>
                </div><!-- End Item -->
            <?php
            endforeach;
            wp_reset_postdata();
            ?>
        </div><!-- End Carousel Inner -->
       

    <ul class="nav nav-pills nav-justified">
            <?php
            $c = 0;
            $class = '';
            $i = 0;
            $args = array('post_type' => 'slider' , 'posts_per_page' => 4);
            $myposts = get_posts( $args );
            foreach ( $myposts as $post ) : setup_postdata( $post );
                $c++;
                if ( $c == 1 ) $class .= ' active';
            else $class = '';
                ?>
                <li class="<?php echo $class; ?>" data-target="#myCarousel" style="width: 206.5px;" data-slide-to="<?php echo $i++ ?>"   >
                  <a data-toggle="tab" href="#"><?php the_title(); ?></a>
                </li>
                <?php
            endforeach;
            wp_reset_postdata();
            ?>
        </ul>    
 </div><!-- End Carousel -->
</div><!-- #primary -->

<div class="container" style="float: left;">
  <div class="product-title">
    <h2>  Latest Products </h2>
   </div> 
<?php echo do_shortcode(' [tc-featured-product style="one" lg_items="4" sm_items="4" tablets="3" mobi_items="2" nav="true" nav_style="tcwps-nav-top-right" dots="false" rtl="false" stage_padding="0" margin="0" hover="tczoomin"]');?> 
</div>
<?php
get_sidebar();
get_footer();
