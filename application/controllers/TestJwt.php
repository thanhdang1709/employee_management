<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use \Firebase\JWT\JWT;


class TestJwt extends CI_Controller
{
	public function __construct()
	{

	}

	public function index(){
		$key = "ma_training";
		$payload = array(
		    "iss" => "http://example.org",
		    "aud" => "http://example.com",
		    "iat" => 1356999524,
		    "nbf" => 1357000000
		);

		$jwt = JWT::encode($payload, $key);
		$decoded = JWT::decode($jwt, $key, array('HS256'));
		print_r($jwt);

		$decoded_array = (array) $decoded;

		JWT::$leeway = 60; // $leeway in seconds
		$decoded = JWT::decode($jwt, $key, array('HS256'));
	}
}

?>