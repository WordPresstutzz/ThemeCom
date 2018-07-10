
<?php
/**
 * themecom WooCommerce Class
 *
 * @package  themecom
 * @author   WooThemes
 * @since    2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'themecom_WooCommerce' ) ) :

	/**
	 * The themecom WooCommerce Integration class
	 */
	class themecom_WooCommerce {

		/**
		 * Setup class.
		 *
		 * @since 1.0
		 */
		public function __construct() {

			add_action( 'woocommerce_cart_coupon',   		array( $this,'insert_empty_cart_button' ));
			add_action( 'template_redirect', 						array( $this,'empty_cart_button_handler' ));

}




function insert_empty_cart_button() {
    // Echo our Empty Cart button
   echo "<a class='button' href='?empty-cart=true'>" . __( 'Empty Cart', 'woocommerce' ) . "</a>";
}

function empty_cart_button_handler() {
     global $woocommerce;
    if ( isset( $_GET['empty-cart'] ) ) {
        $woocommerce->cart->empty_cart();
    }
}

}

endif;

return new themecom_WooCommerce();
