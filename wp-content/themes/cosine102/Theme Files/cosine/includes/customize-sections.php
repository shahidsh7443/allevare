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
 * Return an array that declaration theme customize sections
 */
return array(
	'general'            => array( 'title' => esc_html__( 'General', 'cosine' ) ),
	'header'             => array( 'title' => esc_html__( 'Header', 'cosine' ) ),
	'footer'             => array( 'title' => esc_html__( 'Footer', 'cosine' ) ),
	'layout'             => array( 'title' => esc_html__( 'Layout & Styles', 'cosine' ) ),
	'typography'         => array( 'title' => esc_html__( 'Typography', 'cosine' ) ),
	'blog'               => array( 'title' => esc_html__( 'Blog', 'cosine' ) ),
	'under-construction' => array(
		'title'    => esc_html__( 'Under Construction', 'cosine' ),
		'priority' => 99
	)
);
