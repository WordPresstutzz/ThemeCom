<?php
/**
 * ThemeCom Theme Customizer
 *
 * @package ThemeCom
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function themecom_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => '.site-title a',
			'render_callback' => 'themecom_customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => 'themecom_customize_partial_blogdescription',
		) );
	}
}
add_action( 'customize_register', 'themecom_customize_register' );

/*
*Add a Theme Customizer Section
*/
function my_add_customizer_sections( $wp_customize ) {

	$social_sites = ct_themecom_social_array();

	// set a priority used to order the social sites
	$priority = 5;

	// section
	$wp_customize->add_section( 'ct_themecom_social_media_icons', array(
		'title'       => __( 'Social Media Icons', 'themecom' ),
		'priority'    => 25,
		'description' => __( 'Add the URL for each of your social profiles.', 'themecom' )
	) );

	// create a setting and control for each social site
	foreach ( $social_sites as $social_site => $value ) {

		$label = ucfirst( $social_site );

		if ( $social_site == 'google-plus' ) {
			$label = 'Google Plus';
		} elseif ( $social_site == 'rss' ) {
			$label = 'RSS';
		} elseif ( $social_site == 'soundcloud' ) {
			$label = 'SoundCloud';
		} elseif ( $social_site == 'slideshare' ) {
			$label = 'SlideShare';
		} elseif ( $social_site == 'codepen' ) {
			$label = 'CodePen';
		} elseif ( $social_site == 'stumbleupon' ) {
			$label = 'StumbleUpon';
		} elseif ( $social_site == 'deviantart' ) {
			$label = 'DeviantArt';
		} elseif ( $social_site == 'hacker-news' ) {
			$label = 'Hacker News';
		} elseif ( $social_site == 'whatsapp' ) {
			$label = 'WhatsApp';
		} elseif ( $social_site == 'qq' ) {
			$label = 'QQ';
		} elseif ( $social_site == 'vk' ) {
			$label = 'VK';
		} elseif ( $social_site == 'wechat' ) {
				$label = 'WeChat';
		} elseif ( $social_site == 'tencent-weibo' ) {
			$label = 'Tencent Weibo';
		} elseif ( $social_site == 'paypal' ) {
			$label = 'PayPal';
		} elseif ( $social_site == 'email-form' ) {
			$label = 'Contact Form';
		}
		// setting
		$wp_customize->add_setting( $social_site, array(
			'sanitize_callback' => 'esc_url_raw'
		) );
		// control
		$wp_customize->add_control( $social_site, array(
			'type'     => 'url',
			'label'    => $label,
			'section'  => 'ct_themecom_social_media_icons',
			'priority' => $priority
		) );
		// increment the priority for next site
		$priority = $priority + 5;
	}
}
add_action( 'customize_register', 'my_add_customizer_sections' );

/**
*	Output the Social Media Icons
*/
function my_social_icons_output() {

	$social_sites = ct_themecom_social_array();

	foreach ( $social_sites as $social_site => $profile ) {

		if ( strlen( get_theme_mod( $social_site ) ) > 0 ) {
			$active_sites[ $social_site ] = $social_site;
		}
	}

	if ( ! empty( $active_sites ) ) {

		echo '<ul class="social-media-icons">';
		foreach ( $active_sites as $key => $active_site ) { 
        	$class = 'fa fa-' . $active_site; ?>
		 	<li>
				<a class="<?php echo esc_attr( $active_site ); ?>" target="_blank" href="<?php echo esc_url( get_theme_mod( $key ) ); ?>">
					<i class="<?php echo esc_attr( $class ); ?>" title="<?php echo esc_attr( $active_site ); ?>"></i>
				</a>
			</li>
		<?php } 
		echo "</ul>";
	}
}


/**
 * Social Media icon helper functions
 */
function ct_themecom_social_array() {

	$social_sites = array(
		
		'facebook'      => 'themecom_facebook_profile',
		'twitter'       => 'themecom_twitter_profile',
		'instagram'     => 'themecom_instagram_profile',
		'google-plus'   => 'themecom_googleplus_profile',
		'pinterest'     => 'themecom_pinterest_profile',
		'linkedin'      => 'themecom_linkedin_profile',
		'youtube'       => 'themecom_youtube_profile',
		'vimeo'         => 'themecom_vimeo_profile',
		'tumblr'        => 'themecom_tumblr_profile',
		'flickr'        => 'themecom_flickr_profile',
		'dribbble'      => 'themecom_dribbble_profile',
		'rss'           => 'themecom_rss_profile',
		'reddit'        => 'themecom_reddit_profile',
		'soundcloud'    => 'themecom_soundcloud_profile',
		'spotify'       => 'themecom_spotify_profile',
		'vine'          => 'themecom_vine_profile',
		'yahoo'         => 'themecom_yahoo_profile',
		'behance'       => 'themecom_behance_profile',
		'codepen'       => 'themecom_codepen_profile',
		'delicious'     => 'themecom_delicious_profile',
		'stumbleupon'   => 'themecom_stumbleupon_profile',
		'deviantart'    => 'themecom_deviantart_profile',
		'digg'          => 'themecom_digg_profile',
		'github'        => 'themecom_github_profile',
		'hacker-news'   => 'themecom_hacker-news_profile',
		'steam'         => 'themecom_steam_profile',
		'vk'            => 'themecom_vk_profile',
		'weibo'         => 'themecom_weibo_profile',
		'tencent-weibo' => 'themecom_tencent_weibo_profile',
		'500px'         => 'themecom_500px_profile',
		'foursquare'    => 'themecom_foursquare_profile',
		'slack'         => 'themecom_slack_profile',
		'slideshare'    => 'themecom_slideshare_profile',
		'qq'            => 'themecom_qq_profile',
		'whatsapp'      => 'themecom_whatsapp_profile',
		'skype'         => 'themecom_skype_profile',
		'wechat'        => 'themecom_wechat_profile',
		'xing'          => 'themecom_xing_profile',
		'paypal'        => 'themecom_paypal_profile',
		'email-form'    => 'themecom_email_form_profile'
	);

	return apply_filters( 'ct_themecom_social_array_filter', $social_sites );
}

// Get user input from the Customizer and output the linked social media icons
function theme_slug_show_social_icons() {
 
     $social_sites = theme_slug_get_social_sites();
 
     // Any inputs that aren't empty are stored in $active_sites array
     foreach( $social_sites as $social_site ) {
         if ( strlen( get_theme_mod( $social_site ) ) > 0 ) {
             $active_sites[] = $social_site;
         }
     }
 
     // For each active social site, add it as a list item
     if ( !empty( $active_sites ) ) {
         echo "<ul class='social-media-icons'>";
 
         foreach ( $active_sites as $active_site ) { ?>

             <li>
             <a href="<?php echo get_theme_mod( $active_site ); ?>">
             <?php if( $active_site == 'vimeo' ) { ?>
                 <i class="fa fa-<?php echo $active_site; ?>-square"></i> <?php
             } else if( $active_site == 'email' ) { ?>
                 <i class="fa fa-envelope"></i> <?php
             } else { ?>
                 <i class="fa fa-<?php echo $active_site; ?>"></i> <?php
             } ?>
             </a>
             </li> <?php
         }
         echo "</ul>";
     }
}

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function themecom_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function themecom_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function themecom_customize_preview_js() {
	wp_enqueue_script( 'themecom-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'themecom_customize_preview_js' );
