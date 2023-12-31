<?php
/**
 * Checkout login form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/form-login.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.8.0
 */

defined( 'ABSPATH' ) || exit;

if ( is_user_logged_in() || 'no' === get_option( 'woocommerce_enable_checkout_login_reminder' ) ) {
	return;
}

?>
<div class="py-4 px-5 mytravel-returning-customer shadow-soft bg-white rounded-sm mb-5">
 
	<div class="woocommerce-form-login-toggle">
		<?php echo wp_kses_post( apply_filters( 'woocommerce_checkout_login_message', __( 'Returning customer?', 'mytravel' ) . sprintf( '<a class="showlogin" href="#">%s</a>', __( ' Click here to login', 'mytravel' ) ) ) ); ?>
	</div>

<?php

woocommerce_login_form(
	array(
		'message'  => esc_html__( 'If you have shopped with us before, please enter your details below. If you are a new customer, please proceed to the Billing section.', 'mytravel' ),
		'redirect' => wc_get_checkout_url(),
		'hidden'   => true,
	)
);
?>
</div>
