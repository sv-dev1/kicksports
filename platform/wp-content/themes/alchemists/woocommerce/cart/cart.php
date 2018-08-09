<?php
/**
 * Cart Page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/cart.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 3.3.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

wc_print_notices();

do_action( 'woocommerce_before_cart' ); ?>

<form class="woocommerce-cart-form" action="<?php echo esc_url( wc_get_cart_url() ); ?>" method="post">
	<?php do_action( 'woocommerce_before_cart_table' ); ?>

	<div class="card card--has-table">
		<header class="card__header">
			<h4><?php esc_html_e( 'Your Shopping Cart', 'alchemists' ); ?></h4>
		</header>
		<div class="card__content">
			<table class="table shop-table shop_table shop_table_responsive cart woocommerce-cart-form__contents" cellspacing="0">
				<thead>
					<tr>
						<th class="product__photo"><?php esc_html_e( 'Photo', 'alchemists' ); ?></th>
						<th class="product__info"><?php esc_html_e( 'Product', 'alchemists' ); ?></th>
						<th class="product__price"><?php esc_html_e( 'Price', 'alchemists' ); ?></th>
						<th class="product__quantity"><?php esc_html_e( 'Quantity', 'alchemists' ); ?></th>
						<th class="product__total"><?php esc_html_e( 'Total', 'alchemists' ); ?></th>
						<th class="product__remove"><?php esc_html_e( 'Remove', 'alchemists' ); ?></th>
					</tr>
				</thead>
				<tbody>
					<?php do_action( 'woocommerce_before_cart_contents' ); ?>

					<?php
					foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
						$_product   = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
						$product_id = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );


						if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
							$product_permalink = apply_filters( 'woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink( $cart_item ) : '', $cart_item, $cart_item_key );

							// Post Styling Options
							$product_color_1   = get_field( 'product_grad_color_1', $product_id ) ? get_field( 'product_grad_color_1', $product_id ) : '#fe2b00';
							$product_color_2   = get_field( 'product_grad_color_2', $product_id ) ? get_field( 'product_grad_color_2', $product_id ) : '#f7d500';

							$attributes   = array();
							$attributes[] = 'style="background-image: linear-gradient(to left top, ' . $product_color_1 . ', ' . $product_color_2 . ');"';

							?>
							<tr class="woocommerce-cart-form__cart-item <?php echo esc_attr( apply_filters( 'woocommerce_cart_item_class', 'cart_item', $cart_item, $cart_item_key ) ); ?>">

								<td class="product__photo">
									<?php
										$thumbnail = apply_filters( 'woocommerce_cart_item_thumbnail', sprintf( '<figure class="product__thumb" ' . implode( ' ', $attributes ) . '>%s</figure>', $_product->get_image() ), $cart_item, $cart_item_key );

										if ( ! $product_permalink ) {
											echo $thumbnail;
										} else {
											printf( '<a href="%s">%s</a>', esc_url( $product_permalink ), $thumbnail );
										}
									?>
								</td>

								<td class="product__info" data-title="<?php esc_attr_e( 'Product', 'alchemists' ); ?>">

									<?php echo wc_get_product_category_list( $_product->get_id(), ', ', '<span class="product__cat">', '</span>' ); ?>

									<?php
										if ( ! $product_permalink ) {
											echo apply_filters( 'woocommerce_cart_item_name', sprintf( '<h5 class="product__name">%s</h5>', $_product->get_name() ), $cart_item, $cart_item_key ) . '&nbsp;';
										} else {
											echo apply_filters( 'woocommerce_cart_item_name', sprintf( '<h5 class="product__name"><a href="%s">%s</a></h5>', esc_url( $product_permalink ), $_product->get_name() ), $cart_item, $cart_item_key );
										}

										// Meta data
										echo wc_get_formatted_cart_item_data( $cart_item );

										// Backorder notification
										if ( $_product->backorders_require_notification() && $_product->is_on_backorder( $cart_item['quantity'] ) ) {
											echo '<p class="backorder_notification">' . esc_html__( 'Available on backorder', 'alchemists' ) . '</p>';
										}
									?>
								</td>

								<td class="product__price" data-title="<?php esc_attr_e( 'Price', 'alchemists' ); ?>">
									<?php
										echo apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key );
									?>
								</td>

								<td class="product__quantity" data-title="<?php esc_attr_e( 'Quantity', 'alchemists' ); ?>">
									<?php
										if ( $_product->is_sold_individually() ) {
											$product_quantity = sprintf( '1 <input type="hidden" name="cart[%s][qty]" value="1" />', $cart_item_key );
										} else {
											$product_quantity = woocommerce_quantity_input( array(
												'input_name'    => "cart[{$cart_item_key}][qty]",
												'input_value'   => $cart_item['quantity'],
												'max_value'     => $_product->get_max_purchase_quantity(),
												'min_value'     => '0',
												'product_name'  => $_product->get_name(),
											), $_product, false );
										}

										echo apply_filters( 'woocommerce_cart_item_quantity', $product_quantity, $cart_item_key, $cart_item );
									?>
								</td>

								<td class="product__total" data-title="<?php esc_attr_e( 'Total', 'alchemists' ); ?>">
									<?php
										echo apply_filters( 'woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal( $_product, $cart_item['quantity'] ), $cart_item, $cart_item_key );
									?>
								</td>

								<td class="product__remove">
									<?php
										// @codingStandardsIgnoreLine
										echo apply_filters( 'woocommerce_cart_item_remove_link', sprintf(
											'<a href="%s" class="fa fa-times product__remove-icon" aria-label="%s" data-product_id="%s" data-product_sku="%s"></a>',
											esc_url( wc_get_cart_remove_url( $cart_item_key ) ),
											esc_html__( 'Remove this item', 'alchemists' ),
											esc_attr( $product_id ),
											esc_attr( $_product->get_sku() )
										), $cart_item_key );
									?>
								</td>

							</tr>
							<?php
						}
					}
					?>

					<?php do_action( 'woocommerce_cart_contents' ); ?>

					<tr>
						<td colspan="6" class="actions">

							<?php if ( wc_coupons_enabled() ) { ?>
								<div class="coupon form-inline">
									<div class="form-group">
										<label for="coupon_code" class="sr-only"><?php esc_html_e( 'Coupon:', 'alchemists' ); ?></label>
										<input type="text" name="coupon_code" class="form-control input-sm" id="coupon_code" value="" placeholder="<?php esc_attr_e( 'Coupon code', 'alchemists' ); ?>" />
									</div>
									<input type="submit" class="button" name="apply_coupon" value="<?php esc_attr_e( 'Apply', 'alchemists' ); ?>" />
									<?php do_action( 'woocommerce_cart_coupon' ); ?>
								</div>
							<?php } ?>

							<input type="submit" class="button" name="update_cart" value="<?php esc_attr_e( 'Update cart', 'alchemists' ); ?>" />

							<?php do_action( 'woocommerce_cart_actions' ); ?>

							<?php wp_nonce_field( 'woocommerce-cart' ); ?>
						</td>
					</tr>

					<?php do_action( 'woocommerce_after_cart_contents' ); ?>
				</tbody>
			</table>
		</div>
	</div>
	<?php do_action( 'woocommerce_after_cart_table' ); ?>
</form>

<div class="cart-collaterals">
	<?php
		/**
		 * Cart collaterals hook.
		 *
		 * @hooked woocommerce_cross_sell_display
		 * @hooked woocommerce_cart_totals - 10
		 */
	 	do_action( 'woocommerce_cart_collaterals' );
	?>
</div>

<?php do_action( 'woocommerce_after_cart' ); ?>
