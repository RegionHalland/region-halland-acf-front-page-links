<?php

	/**
	 * @package Region Halland ACF Front Page Links
	 */
	/*
	Plugin Name: Region Halland ACF Front Page Links
	Description: Front-page-plugin för ACF-länkar på sajtens front-page
	Version: 1.2.0
	Author: Roland Hydén
	License: GPL-3.0
	Text Domain: regionhalland
	*/

	// Anropa funktion om ACF är installerad & aktiverad
	add_action('acf/init', 'my_acf_add_front_page_links_field_groups');

	// Lägg till formulär så att det går att skapa länkar
	function my_acf_add_front_page_links_field_groups() {

		if (function_exists('acf_add_local_field_group')) {
		    acf_add_local_field_group(array(
		    'key' => 'group_1000024',
		    'title' => __('Startsida', 'halland'),
		    'fields' => array(
		        0 => array(
		            'key' => 'field_1000025',
		            'label' => __('Populära länkar', 'halland'),
		            'name' => 'name_1000026',
		            'type' => 'repeater',
		            'instructions' => __('Klicka på "Lägg till rad" för att lägga till en länk. Maximalt 5 stycken.', 'halland'),
		            'required' => 0,
		            'conditional_logic' => 0,
		            'wrapper' => array(
		                'width' => '',
		                'class' => '',
		                'id' => '',
		            ),
		            'collapsed' => '',
		            'min' => 0,
		            'max' => 5,
		            'layout' => 'table',
		            'button_label' => '',
		            'sub_fields' => array(
		                0 => array(
		                    'key' => 'field_1000027',
		                    'label' => __('Länk', 'halland'),
		                    'name' => 'name_1000028',
		                    'type' => 'link',
		                    'instructions' => __('Lägg till populära länkar på.', 'halland'),
		                    'required' => 0,
		                    'conditional_logic' => 0,
		                    'wrapper' => array(
		                        'width' => '',
		                        'class' => '',
		                        'id' => '',
		                    ),
		                    'return_format' => 'array',
		                ),
		            ),
		        ),
		    ),
		    'location' => array(
		        0 => array(
		            0 => array(
		                'param' => 'page_type',
		                'operator' => '==',
		                'value' => 'front_page',
		            ),
		        ),
		    ),
		    'menu_order' => 0,
		    'position' => 'normal',
		    'style' => 'default',
		    'label_placement' => 'top',
		    'instruction_placement' => 'label',
		    'hide_on_screen' => '',
		    'active' => 1,
		    'description' => 'Används för att skapa innehåll specifikt för startsidan.',
		));
		}

	}

	// Returnera inlagda länkar
	function get_region_halland_acf_front_page_links() {
		
		// Hämta id för front-page
		$frontpage_id = get_option('page_on_front');
		
		// Hämta alla inlagda länkar
		$popular_links = get_field('name_1000026', $frontpage_id);

		// Skapa array med länkar
        $myLinks = array();
        foreach ($popular_links as $links) {
	        $strLinkUrl		= $links['name_1000028']['url'];
	        $strLinkTitle	= $links['name_1000028']['title'];
	        array_push($myLinks, array(
	           'url' => $strLinkUrl,
	           'title' => $strLinkTitle
	        ));
        }

		// Returnera länkar
		return $myLinks;
	}

	// Metod som anropas när pluginen aktiveras
	function region_halland_acf_front_page_links_activate() {
		// Ingenting just nu...
	}

	// Metod som anropas när pluginen av-aktiveras
	function region_halland_acf_front_page_links_deactivate() {
		// Ingenting just nu...
	}

	// Aktivera pluginen och anropa metod
	register_activation_hook( __FILE__, 'region_halland_acf_front_page_links_activate');

	// Av-aktivera pluginen och anropa metod
	register_deactivation_hook( __FILE__, 'region_halland_acf_front_page_links_deactivate');

?>