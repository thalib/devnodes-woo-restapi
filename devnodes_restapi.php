<?php
/*
Plugin Name: Devnodes Rest Api
Plugin URI: http://devnodes.in/
Description: Rest API for exporting products.
Author: Devnodes.in
Version: 1.0.0
Author URI: http://devnodes.in/
*/

require_once dirname(__FILE__) . '/class_restapi_Product.php';

add_action('rest_api_init', function () {
	$dn_REST_Controller_Product = new dn_REST_Controller_Product();
	$dn_REST_Controller_Product->register_routes();
});
