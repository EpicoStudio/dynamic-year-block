<?php
// This file is generated. Do not modify it manually.
return array(
	'dynamic-year-block' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'epico/dynamic-year-block',
		'version' => '1.0.0',
		'title' => 'Dynamic Year',
		'category' => 'text',
		'icon' => 'calendar',
		'keywords' => array(
			'year',
			'dynamic',
			'date',
			'block',
			'footer',
			'copyright'
		),
		'description' => 'Display a copyright notice in your footer with the current year.',
		'textdomain' => 'dynamic-year-block',
		'attributes' => array(
			'format' => array(
				'type' => 'string',
				'default' => 'Y'
			),
			'beforeElement' => array(
				'type' => 'string',
				'default' => ''
			),
			'afterElement' => array(
				'type' => 'string',
				'default' => ''
			),
			'alignment' => array(
				'type' => 'string',
				'default' => 'none'
			),
			'displaySiteName' => array(
				'type' => 'boolean',
				'default' => false
			),
			'privacyPolicy' => array(
				'type' => 'string',
				'default' => ''
			)
		),
		'usesContext' => array(
			'backgroundColor',
			'foregroundColor'
		),
		'supports' => array(
			'anchor' => false,
			'html' => false,
			'border' => array(
				'color' => true,
				'radius' => true,
				'style' => true,
				'width' => true
			),
			'spacing' => array(
				'padding' => true,
				'margin' => true,
				'defaultControls' => array(
					'margin' => false,
					'padding' => false
				)
			),
			'background' => array(
				'backgroundImage' => true,
				'backgroundSize' => true
			),
			'dimensions' => array(
				'minHeight' => true
			),
			'color' => array(
				'gradients' => true,
				'link' => true,
				'enableContrastChecker' => true,
				'defaultControls' => array(
					'background' => true,
					'text' => true,
					'link' => true
				)
			),
			'typography' => array(
				'fontSize' => true,
				'lineHeight' => true,
				'fontFamily' => true,
				'fontWeight' => true,
				'fontStyle' => true,
				'textTransform' => true,
				'textDecoration' => true,
				'letterSpacing' => true,
				'fitText' => true,
				'defaultControls' => array(
					'fontSize' => true,
					'fontFamily' => true,
					'fontStyle' => true,
					'fontWeight' => true
				)
			),
			'interactivity' => array(
				'clientNavigation' => true
			)
		),
		'render' => 'file:./render.php',
		'editorScript' => 'file:./index.js'
	)
);
