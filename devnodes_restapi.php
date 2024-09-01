<?php
/*
Plugin Name: Devnodes REST API
Plugin URI: http://devnodes.in/
Description: Rest API for exporting products.
Author: Devnodes.in
Version: 1.0.0
Author URI: http://devnodes.in/
*/

require_once dirname(__FILE__) . '/class_restapi_Product.php';

add_action('rest_api_init', function () {
	$restapi = new devnodes_REST_Controller_Product();
	$restapi->register_routes();
});
