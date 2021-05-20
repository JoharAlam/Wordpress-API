<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<!-- API calling through script start -->
<!-- <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
	$(document).ready(function(){
		fetch('https://jsonplaceholder.typicode.com/posts')
		.then(response => response.json())
		.then(json => {
			// $("#me").val("success");
			// $("#someId").val(json[99].id);
			// $("#post").val(json[99].title);
		});
	});
</script> -->
<!-- API calling through script end -->

<?php
/**
 * Empty cart page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/cart-empty.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.5.0
 */

defined( 'ABSPATH' ) || exit;

/*
 * @hooked wc_empty_cart_message - 10
 */
do_action( 'woocommerce_cart_is_empty' );

if ( wc_get_page_id( 'shop' ) > 0 ) : ?>
	<p class="return-to-shop">
		<?php 
			// Calling public API and decoding start
			$json = file_get_contents('https://jsonplaceholder.typicode.com/posts');
			$data = json_decode($json);
			// Calling public API and decoding end

			// var_dump($data);
			// echo "<br><br>";

			// Showing API data in different fields start
			// foreach($data as $post)
			// {
		?>
				<!-- <label>User ID</label><input type="text" id="user_id" name="user_id" value="<?php echo $post->userId; ?>"><br>
				<label>Title</label><input type="text" id="title" name="title" value="<?php echo $post->title; ?>"><br>
				<label>Post</label><textarea id="post" name="post" style="height: 130px;"><?php echo $post->body; ?></textarea><br> -->
		<?php 
			// }
			// Showing API data in different fields end

			// Updating order status in database tables on api call start
			global $wpdb;
			$array = $wpdb->get_results("select * from wp_posts where post_type='shop_order'");
			if($data != '')
			{
				echo "<div class='alert alert-success'>200 OK and data fetched from API sucessfully</div>";
				echo "<u>Orders status before</u>: <br><br>";
				foreach($array as $order)
				{
					echo "Order ID: " . $order->ID . "<br>";
					echo "Order Status: " . $order->post_status . "<br><hr>";
				}
				echo "<br><br>";

				$update = $wpdb->get_results("update wp_posts set post_status='wc-on-hold' where post_type='shop_order'");
				$update = $wpdb->get_results("update wp_wc_order_stats set status='wc-on-hold'");
				$array1 = $wpdb->get_results("select * from wp_posts where post_type='shop_order'");

				echo "<u>Orders status after update</u>: <br><br>";
				foreach($array1 as $updatedOrder)
				{
					echo "Order ID: " . $updatedOrder->ID . "<br>";
					echo "Order Status: " . $updatedOrder->post_status . "<br><hr>";
				}
				echo "<br>";
			}
			else
			{
				echo "<div class='alert alert-danger'>404 No response from API</div>";
			}
			// Updating order status in database tables on api call end
		?>
		<a class="button wc-backward" href="<?php echo esc_url( apply_filters( 'woocommerce_return_to_shop_redirect', wc_get_page_permalink( 'shop' ) ) ); ?>">
			<?php
				/**
				 * Filter "Return To Shop" text.
				 *
				 * @since 4.6.0
				 * @param string $default_text Default text.
				 */
				echo esc_html( apply_filters( 'woocommerce_return_to_shop_text', __( 'Return to shop', 'woocommerce' ) ) );
			?>
		</a>
	</p>
<?php endif; ?>