<?php
/**
* @version	1.6.4
*/

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $woocommerce, $product;
?>

<?php
/**
* woocommerce_before_single_product hook
*
* @hooked wc_print_notices - 10
*/
do_action( 'woocommerce_before_single_product' );

if ( post_password_required() ) {
	echo get_the_password_form();
	return;
}
?>

<div itemscope itemtype="<?php echo woocommerce_get_product_schema(); ?>" id="product-<?php the_ID(); ?>" <?php post_class(); ?>>

	<!-- Product images -->
	<div class="product-images slider">

	</div>

	<!-- Product info -->
	<?php
	$title = get_the_title();
	$subtitle = get_field( 'product_subtitle' );
	$description = get_field( 'product_description' );
	?>

	<div class="product-info">
		<h1><?php echo $title; ?></h1>
		<h2><?php echo $subtitle; ?></h2>
		<?php echo $description; ?>

		<?php
			/**
			 * @hooked woocommerce_template_single_add_to_cart - 30
			 */
			do_action( 'woocommerce_single_product_summary' );
		?>
	</div>

	<?php
	/**
	* woocommerce_after_single_product_summary hook
	*
	* @hooked woocommerce_output_product_data_tabs - 10
	* @hooked woocommerce_upsell_display - 15
	* @hooked woocommerce_output_related_products - 20
	*/
	do_action( 'woocommerce_after_single_product_summary' );
	?>

	<meta itemprop="url" content="<?php the_permalink(); ?>" />

</div><!-- #product-<?php the_ID(); ?> -->

<?php do_action( 'woocommerce_after_single_product' ); ?>
