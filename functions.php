<?php

/**
 * Functions.php
 *
 * @author Budi Haryono <mail.budiharyono@gmail.com>
 */

/**
 * Function is_devmode
 *
 * @author Budi Haryono <mail.budiharyono@gmail.com>
 */
function mm_is_devmode()
{
	if (isset($_SERVER['REMOTE_ADDR']) && in_array($_SERVER['REMOTE_ADDR'], array('127.0.0.1', '::1'), true)) {
		return true;
	}
	return false;
}


/**
 * Function mah
 *
 * @author Budi Haryono <mail.budiharyono@gmail.com>
 * @param array $html_tags_allowed Array of HTML tags allowed.
 */
function mah($html_tags_allowed = array())
{
	$pass = array();

	// Definisikan atribut untuk SVG.
	$svg_args = array(
		'class'             => true,
		'aria-hidden'       => true,
		'aria-labelledby'   => true,
		'role'              => true,
		'xmlns'             => true,
		'width'             => true,
		'height'            => true,
		'viewBox'           => true, // Perbaiki casing di sini.
		'version'           => true,
		'xmlns:xlink'       => true,
		'x'                 => true,
		'y'                 => true,
		'enable-background' => true,
		'xml:space'         => true,
		'metadata'          => true,
		'fill' 				=> true,
		'style' 			=> true,
		'path' 				=> true,
		'd' 				=> true,

	);

	foreach ($html_tags_allowed as $tag) {
		$attributes = array(
			'class' => array(),
			'id'    => array(), // Tambahkan atribut id.
		);

		// Tambahkan atribut tambahan untuk tag spesifik.
		if ('img' === $tag) {
			$attributes['src']    = array();
			$attributes['alt']    = array();
			$attributes['title']  = array();
			$attributes['width']  = array();
			$attributes['height'] = array();
		}

		if ('a' === $tag) {
			$attributes['href']   = array();
			$attributes['target'] = array();
			$attributes['rel']    = array();
			$attributes['style']  = array();
			$attributes['class']  = array();
		}

		// Jika tag adalah SVG, gunakan atribut yang telah didefinisikan dalam $svg_args.
		if ('svg' === $tag) {
			$attributes = $svg_args;
		}

		// iframe.
		if ('iframe' === $tag) {
			$attributes['src']             = true;
			$attributes['width']           = true;
			$attributes['height']          = true;
			$attributes['frameborder']     = true;
			$attributes['allowfullscreen'] = true;
		}

		// Jika tag adalah div, tambahkan atribut data-xxxx dengan validasi nilai hex.
		if ('div' === $tag) {
			$attributes = array_merge(
				$attributes,
				array(
					'/^data-[a-zA-Z0-9-]*$/' => array(
						'pattern' => '/^#[a-fA-F0-9]{6}$/',
					),
				)
			);
		}

		$pass[$tag] = $attributes;
	}

	// Tambahkan elemen lain yang diperlukan untuk SVG.
	$pass['g']     = array('fill' => true);
	$pass['title'] = array('title' => true);
	$pass['path']  = array(
		'd'    => true,
		'fill' => true,
	);

	return $pass;
}

defined('ABSPATH') || exit;

// add theme support.
add_theme_support('title-tag');
add_theme_support('post-thumbnails');
add_theme_support('menus');

/**
 * Function load Carbon Fields
 *
 * @author Budi Haryono <mail.budiharyono@gmail.com>
 */
function mm_call_carbon_fields()
{
	require_once 'vendor/autoload.php';
	\Carbon_Fields\Carbon_Fields::boot();
}
add_action('after_setup_theme', 'mm_call_carbon_fields'); // install carbon fields dulu



require_once get_template_directory() . '/inc/inc.php';
require get_template_directory() . '/assets/assets.php';
