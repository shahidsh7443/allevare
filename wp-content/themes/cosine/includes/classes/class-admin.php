<?php
/**
 * WARNING: This file is part of the theme. DO NOT edit
 * this file under any circumstances.
 */

/**
 * Prevent direct access to this file
 */
defined( 'ABSPATH' ) or die();

/**
 * @package  Cosine
 * @author   Binh Pham Thanh <binhpham@linethemes.com>
 */
class Cosine_Admin extends Cosine_Base
{
	public function __construct() {
		if ( is_admin() ) {
			Cosine_PostOptions::instance();
			Cosine_PageOptions::instance();

			/**
			 * Initialize theme advanced settings
			 */
			Cosine_Advanced::instance();

			/**
			 * Initialize sample data installer
			 */
			Cosine_SampleData::instance();
		}
	}
}
