<?php

class devnodes_REST_Controller_Product extends WP_REST_Controller
{
	public function register_routes()
	{

		// https://example.com/wp-json/devnodes/v1/product/1 <- product id = 1
		$namespace = 'devnodes/v1';
		$path = 'product/(?P<product_id>\d+)';

		register_rest_route($namespace, '/' . $path, [
			array(
				'methods' => 'GET',
				'callback' => array($this, 'get_items'),
				'permission_callback' => array($this, 'get_items_permissions_check'),
			),

		]);
	}

	public function get_items($request)
	{

		$productId = $request['product_id'];

		$product = wc_get_product($productId);

		$product_data = json_encode(
			array(
				'status' => "na",
				'msg' => "Product not found",
			)
		);

		if ($product) {
			$product_data = json_encode(
				array(
					'status' => "ok",
					'id' => $productId,
					'name' => $product->get_name(),
					'mrp' => $product->get_regular_price(),
					'sp' => $product->get_sale_price(),
					'quantity' => $product->get_stock_quantity(),
				)
			);
		}

		$response = json_encode($product_data);

		return rest_ensure_response($product_data);
	}

	public function get_items_permissions_check($request)
	{
		return true;
	}

}
