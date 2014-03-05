<?php
/*
Plugin Name: Simple Share Buttons Adder
Plugin URI: http://www.simplesharebuttons.com
Description: A simple plugin that enables you to add share buttons to all of your posts and/or pages.
Version: 3.4
Author: David S. Neal
Author URI: http://www.davidsneal.co.uk/
License: GPLv2

Copyright 2013 Simple Share Buttons admin@simplesharebuttons.com

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License, version 2, as 
published by the Free Software Foundation.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

*/
	// turn error reporting off
	error_reporting(0);

	// --------- INSTALLATION ------------ //

	// run the activation function upon acitvation of the plugin
	register_activation_hook( __FILE__,'ssba_activate');
	
	// register deactivation hook
	register_uninstall_hook(__FILE__,'ssba_uninstall');
	
	// activate ssba function
	function ssba_activate() {
	
		// insert default options for ssba
		add_option('ssba_version', 				'3.4');
		add_option('ssba_image_set', 			'somacro');
		add_option('ssba_size', 				'35');
		add_option('ssba_pages',				'');
		add_option('ssba_posts',				'');
		add_option('ssba_cats_archs',			'');
		add_option('ssba_homepage',				'');
		add_option('ssba_align', 				'left');
		add_option('ssba_padding', 				'6');
		add_option('ssba_before_or_after', 		'after');
		add_option('ssba_custom_styles', 		'');
		add_option('ssba_email_message', 		'');
		add_option('ssba_twitter_text', 		'');
		add_option('ssba_buffer_text', 			'');
		add_option('ssba_flattr_user_id', 		'');
		add_option('ssba_flattr_url', 			'');
		add_option('ssba_share_new_window', 	'Y');
		add_option('ssba_link_to_ssb', 			'Y');
		add_option('ssba_show_share_count',		'');
		add_option('ssba_share_count_style',	'default');
		add_option('ssba_share_count_css',		'');
		add_option('ssba_share_count_once',		'Y');
		
		// share container
		add_option('ssba_div_padding', 			'');
		add_option('ssba_div_rounded_corners', 	'');
		add_option('ssba_border_width', 		'');
		add_option('ssba_div_border', 			'#59625c');
		add_option('ssba_div_background', 		'');
		
		// share text
		add_option('ssba_share_text', 			"Don't be shellfish...");
		add_option('ssba_text_placement', 		'left');
		add_option('ssba_font_family', 			'Indie Flower');
		add_option('ssba_font_color',			'');	
		add_option('ssba_font_size',			'20');
		add_option('ssba_font_weight',			'');
		
		// include
		add_option('ssba_selected_buttons', 	'');
		
		// custom images
		add_option('ssba_custom_email', 		'');
		add_option('ssba_custom_google', 		'');
		add_option('ssba_custom_facebook', 		'');
		add_option('ssba_custom_twitter', 		'');
		add_option('ssba_custom_diggit', 		'');
		add_option('ssba_custom_linkedin', 	  	'');
		add_option('ssba_custom_reddit', 	  	'');
		add_option('ssba_custom_stumbleupon', 	'');
		add_option('ssba_custom_pinterest', 	'');
		add_option('ssba_custom_buffer', 		'');
		add_option('ssba_custom_flattr', 		'');
		add_option('ssba_custom_tumblr', 		'');
	}
	
	// uninstall ssba
	function ssba_uninstall() {

		//if uninstall not called from WordPress exit
		if (defined('WP_UNINSTALL_PLUGIN')) {
			exit();
		}

		// delete all options
		delete_option('ssba_version');
		delete_option('ssba_image_set');
		delete_option('ssba_size');
		delete_option('ssba_pages');
		delete_option('ssba_posts');
		delete_option('ssba_cats_archs');
		delete_option('ssba_homepage');
		delete_option('ssba_align');
		delete_option('ssba_padding');
		delete_option('ssba_before_or_after');
		delete_option('ssba_custom_styles');
		delete_option('ssba_email_message');
		delete_option('ssba_buffer_text');
		delete_option('ssba_twitter_text');
		delete_option('ssba_flattr_user_id');
		delete_option('ssba_flattr_url');
		delete_option('ssba_share_new_window');
		delete_option('ssba_link_to_ssb');
		delete_option('ssba_show_share_count');
		delete_option('ssba_share_count_style');
		delete_option('ssba_share_count_css');
		delete_option('ssba_share_count_once');
		
		// share container
		delete_option('ssba_div_padding');
		delete_option('ssba_div_rounded_corners');
		delete_option('ssba_border_width');
		delete_option('ssba_div_border');
		delete_option('ssba_div_background');

		// share text
		delete_option('ssba_share_text');
		delete_option('ssba_text_placement');
		delete_option('ssba_font_family');
		delete_option('ssba_font_color');	
		delete_option('ssba_font_size');
		delete_option('ssba_font_weight');

		// include
		delete_option('ssba_selected_buttons');

		// custom images
		delete_option('ssba_custom_email');
		delete_option('ssba_custom_google');
		delete_option('ssba_custom_facebook');
		delete_option('ssba_custom_twitter');
		delete_option('ssba_custom_diggit');
		delete_option('ssba_custom_linkedin');
		delete_option('ssba_custom_reddit');
		delete_option('ssba_custom_stumbleupon');
		delete_option('ssba_custom_pinterest');
		delete_option('ssba_custom_buffer');
		delete_option('ssba_custom_flattr');
		delete_option('ssba_custom_tumblr');
	}

	// --------- ADMIN BITS ------------ //
	
	// add settings link on plugin page
	function ssba_settings_link($links) { 
	
		// add to plugins links
		array_unshift($links, '<a href="options-general.php?page=simple-share-buttons-adder">Settings</a>'); 
		
		// return all links
		return $links; 
	}

	// add filter hook for plugin action links
	add_filter('plugin_action_links_' . plugin_basename(__FILE__), 'ssba_settings_link' );
	
	// add menu to dashboard
	add_action( 'admin_menu', 'ssba_menu' );
	
	// widget class
	class ssba_widget extends WP_Widget {

		// construct the widget
		public function __construct() {
			parent::__construct(
	 		'ssba_widget', // Base ID
			'Share Buttons', // Name
			array( 'description' => __( 'Simple Share Buttons Adder', 'text_domain' ), ) // Args
		);
		}

		// extract required arguments and run the shortcode
		public function widget( $args, $instance ) {
			extract( $args );
			$title = apply_filters( 'widget_title', $instance['title'] );
			$url = $instance['url'];
			$pagetitle = $instance['pagetitle'];

			echo $before_widget;
			if (!empty($title))
			echo $before_title . $title . $after_title;
			
			$shortcode = '[ssba';
			($url != '' ? $shortcode .= ' url="' . $url . '"' : NULL);
			($pagetitle != '' ? $shortcode .= ' title="' . $pagetitle . '"' : NULL);
			$shortcode .= ']';
			echo do_shortcode($shortcode, 'text_domain' );
			echo $after_widget;
		}

		public function form( $instance ) {
			
			if ( isset( $instance[ 'title' ] ) ) {
			
				$title = $instance[ 'title' ];
			} else {
			
			$title = __( 'Share Buttons', 'text_domain' );
			}

			$url = esc_url( $instance['url'] );
			$pagetitle = esc_attr( $instance['pagetitle'] );
		
			# Title
			echo '<p><label for="' . $this->get_field_id('title') . '">' . 'Title:' . '</label><input class="widefat" id="' . $this->get_field_id('title') . '" name="' . $this->get_field_name('title') . '" type="text" value="' . $title . '" /></p>';
			# URL
			echo '<p><label for="' . $this->get_field_id('url') . '">' . 'URL:' . '</label><input class="widefat" id="' . $this->get_field_id('url') . '" name="' . $this->get_field_name('url') . '" type="text" value="' . $url . '" /></p>';
			echo '<p class="description">Leave this blank to share the current page, or enter a URL to force one URL for all pages.</p>';
			# Page title
			echo '<p><label for="' . $this->get_field_id('pagetitle') . '">' . 'Page title:' . '</label><input class="widefat" id="' . $this->get_field_id('pagetitle') . '" name="' . $this->get_field_name('pagetitle') . '" type="text" value="' . $pagetitle . '" /></p>';
			echo '<p class="description">Set a page title for the page being shared, leave this blank if you have not set a URL.</p>';
		}

		public function update( $new_instance, $old_instance ) {
			$instance = array();
			$instance['title'] = strip_tags( $new_instance['title'] );
			$instance['url'] = strip_tags( $new_instance['url'] );
			$instance['pagetitle'] = strip_tags( $new_instance['pagetitle'] );

			return $instance;
		}

	}
	
	// add ssba to available widgets
	add_action( 'widgets_init', create_function( '', 'register_widget( "ssba_widget" );' ) );
	
	
	function mywidget_init() {
		
		register_sidebar_widget('Share Buttons Widget', 'ssba_widget');
		register_widget_control('Share Buttons Widget', 'ssba_widget_control');
	}
	
	// include js files and upload script
	function ssba_admin_scripts() {
	
		// all extra scripts needed
		wp_enqueue_script('media-upload');
		wp_enqueue_script('thickbox');
		wp_enqueue_script('wp-color-picker');
		wp_register_script('my-upload', plugins_url('/js/ssba_admin.js', __FILE__ ));
		wp_enqueue_script('my-upload');
		wp_enqueue_script('jquery-ui-sortable');
		wp_enqueue_script('jquery-ui');
	}
	
	// include styles for the ssba admin panel
	function ssba_admin_styles() {
	
		// admin styles
		wp_enqueue_style('thickbox');
		wp_enqueue_style('wp-color-picker');
		wp_register_style('ssba-styles', plugins_url('/css/style.css', __FILE__ ));
		wp_enqueue_style('ssba-styles');
	}
	
	// check if viewing the admin page
	if (isset($_GET['page']) && $_GET['page'] == 'simple-share-buttons-adder') {
	
		// add the registered scripts
		add_action('admin_print_styles', 'ssba_admin_styles');
		add_action('admin_print_scripts', 'ssba_admin_scripts');
	}
	
	// add css scripts for page/post use
	function ssba_page_scripts() {
	
		// get settings
		$arrSettings = get_ssba_settings();
		
		// if reenie beenie font is selected
		if ($arrSettings['ssba_font_family'] == 'Indie Flower') {
	
			// font scripts 
			wp_register_style('ssbaFont', 'http://fonts.googleapis.com/css?family=Indie+Flower');
			wp_enqueue_style( 'ssbaFont');
		} else if ($arrSettings['ssba_font_family'] == 'Reenie Beanie') {
			
			// font scripts 
			wp_register_style('ssbaFont', 'http://fonts.googleapis.com/css?family=Reenie+Beanie');
			wp_enqueue_style( 'ssbaFont');
		
		}
	
		// register and enqueue css styles
		wp_register_style('ssba-page-styles', plugins_url('/css/page-style.css', __FILE__ ));
		wp_enqueue_style('ssba-page-styles');
	}
	
	// call scripts add function
	add_action( 'wp_enqueue_scripts', 'ssba_page_scripts' );
	
	// menu settings
	function ssba_menu() {
	
		// add menu page
		add_options_page( 'Simple Share Buttons Adder', 'Share Buttons', 'manage_options', 'simple-share-buttons-adder', 'ssba_settings');
		
		// query the db for current ssba settings
		$arrSettings = get_ssba_settings();

		// check if not yet updated to 3.4
		if ($arrSettings['ssba_version'] != '3.4') {
		
			// include then run the upgrade script
			include_once (plugin_dir_path(__FILE__) . '/inc/ssba_upgrade.php');
			upgrade_ssba($arrSettings);		
		}
		
		// check if any buttons have been selected
		if ($arrSettings['ssba_selected_buttons'] == '' && $_GET['page'] != 'simple-share-buttons-adder') {
		
			// output a warning that buttons need configuring and provide a link to settings
			echo '<div id="ssba-warning" class="updated fade"><p>Your <strong>Simple Share Buttons</strong> need <a href="admin.php?page=simple-share-buttons-adder"><strong>configuration</strong></a> before they will appear. <strong>View the tutorial video <a href="http://www.youtube.com/watch?v=p03B4C3QMzs" target="_blank">here</a></strong></p></div>';
		}
	}

	// --------- SETTINGS PAGE ------------ //

	// answer form
	function ssba_settings() {
	
		//' check if user has the rights to manage options
		if ( !current_user_can( 'manage_options' ) )  {
		
			// permissions message
			wp_die( __('You do not have sufficient permissions to access this page.'));
		}
		
		// variables
		$htmlSettingsSaved = '';
		
		// check for submitted form
		if (isset($_POST['ssba_options'])) {
		
			// update existing ssba settings		
			update_option('ssba_image_set', 			$_POST['ssba_image_set']);
			update_option('ssba_size', 					$_POST['ssba_size']);
			update_option('ssba_pages', 				$_POST['ssba_pages']);
			update_option('ssba_posts', 				$_POST['ssba_posts']);
			update_option('ssba_cats_archs', 			$_POST['ssba_cats_archs']);
			update_option('ssba_homepage', 				$_POST['ssba_homepage']);
			update_option('ssba_align', 				$_POST['ssba_align']);
			update_option('ssba_padding', 				$_POST['ssba_padding']);								
			update_option('ssba_before_or_after', 		$_POST['ssba_before_or_after']);
			update_option('ssba_custom_styles', 		$_POST['ssba_custom_styles']);
			update_option('ssba_email_message', 		stripslashes_deep($_POST['ssba_email_message']));
			update_option('ssba_twitter_text', 			stripslashes_deep($_POST['ssba_twitter_text']));
			update_option('ssba_buffer_text', 			stripslashes_deep($_POST['ssba_buffer_text']));
			update_option('ssba_flattr_user_id', 		stripslashes_deep($_POST['ssba_flattr_user_id']));
			update_option('ssba_flattr_url', 			stripslashes_deep($_POST['ssba_flattr_url']));
			update_option('ssba_share_new_window', 		$_POST['ssba_share_new_window']);
			update_option('ssba_link_to_ssb', 			$_POST['ssba_link_to_ssb']);
			update_option('ssba_show_share_count', 		$_POST['ssba_show_share_count']);
			update_option('ssba_share_count_style',		$_POST['ssba_share_count_style']);
			update_option('ssba_share_count_css',		$_POST['ssba_share_count_css']);
			update_option('ssba_share_count_once',		$_POST['ssba_share_count_once']);
			
			// share container
			update_option('ssba_div_padding', 			$_POST['ssba_div_padding']);
			update_option('ssba_div_rounded_corners', 	$_POST['ssba_div_rounded_corners']);
			update_option('ssba_border_width', 			$_POST['ssba_border_width']);
			update_option('ssba_div_border', 			$_POST['ssba_div_border']);
			update_option('ssba_div_background', 		$_POST['ssba_div_background']);

			// text
			update_option('ssba_share_text', 			stripslashes_deep($_POST['ssba_share_text']));	
			update_option('ssba_text_placement', 		$_POST['ssba_text_placement']);	
			update_option('ssba_font_family', 			$_POST['ssba_font_family']);	
			update_option('ssba_font_color', 			$_POST['ssba_font_color']);	
			update_option('ssba_font_size', 			$_POST['ssba_font_size']);	
			update_option('ssba_font_weight', 			$_POST['ssba_font_weight']);	

			// include
			update_option('ssba_selected_buttons', 		$_POST['ssba_selected_buttons']);
			
			// custom images
			update_option('ssba_custom_email', 			$_POST['ssba_custom_email']);
			update_option('ssba_custom_google', 		$_POST['ssba_custom_google']);
			update_option('ssba_custom_facebook', 		$_POST['ssba_custom_facebook']);
			update_option('ssba_custom_twitter', 		$_POST['ssba_custom_twitter']);
			update_option('ssba_custom_diggit', 		$_POST['ssba_custom_diggit']);
			update_option('ssba_custom_linkedin', 		$_POST['ssba_custom_linkedin']);
			update_option('ssba_custom_reddit', 		$_POST['ssba_custom_reddit']);
			update_option('ssba_custom_stumbleupon', 	$_POST['ssba_custom_stumbleupon']);
			update_option('ssba_custom_pinterest', 		$_POST['ssba_custom_pinterest']);
			update_option('ssba_custom_buffer', 		$_POST['ssba_custom_buffer']);
			update_option('ssba_custom_flattr', 		$_POST['ssba_custom_flattr']);
			update_option('ssba_custom_tumblr', 		$_POST['ssba_custom_tumblr']);

			// show settings saved message
			$htmlSettingsSaved = '<div id="setting-error-settings_updated" class="updated settings-error"><p><strong>Your settings have been saved. <a href="' . site_url() . '">Visit your site</a> to see how your buttons look!</strong></p></div>';
		}
		
		// include then run the upgrade script
		include_once (plugin_dir_path(__FILE__) . '/inc/ssba_admin_panel.php');

		// query the db for current ssba settings
		$arrSettings = get_ssba_settings();

		// --------- ADMIN PANEL ------------ //
		ssba_admin_panel($arrSettings, $htmlSettingsSaved);
	}
	
	// add CSS to the head
	add_action( 'wp_head', 'get_ssba_style' );
	
	// generate style
	function get_ssba_style() {
	
		// query the db for current ssba settings
		$arrSettings = get_ssba_settings();
	
		// css style
		$htmlSSBAStyle .= '<style type="text/css">';
		
		// check if custom styles haven't been set
		if ($arrSettings['ssba_custom_styles'] == '') {
		
			// use set options
			$htmlSSBAStyle .= '	#ssba {
										' . ($arrSettings['ssba_div_padding'] 			!= ''	? 'padding: ' 	. $arrSettings['ssba_div_padding'] . 'px;' : NULL) . '
										' . ($arrSettings['ssba_border_width'] 			!= ''	? 'border: ' . $arrSettings['ssba_border_width'] . 'px solid ' 	. $arrSettings['ssba_div_border'] . ';' : NULL) . '
										' . ($arrSettings['ssba_div_background'] 		!= ''	? 'background-color: ' 	. $arrSettings['ssba_div_background'] . ';' : NULL) . '
										' . ($arrSettings['ssba_div_rounded_corners'] 	== 'Y'	? '-moz-border-radius: 10px; -webkit-border-radius: 10px; -khtml-border-radius: 10px;  border-radius: 10px; -o-border-radius: 10px;' : NULL) . '
									}
									#ssba img		
									{ 	
										width: ' . $arrSettings['ssba_size'] . 'px !important;
										padding: ' . $arrSettings['ssba_padding'] . 'px;
										border:  0;
										box-shadow: none !important;
										display: inline;
										vertical-align: middle;
									}
									#ssba, #ssba a		
									{
										' . ($arrSettings['ssba_div_background'] == ''	? 'background: none;' : NULL) . '
										' . ($arrSettings['ssba_font_family'] 	!= ''	? 'font-family: ' . $arrSettings['ssba_font_family'] . ';' : NULL) . '
										' . ($arrSettings['ssba_font_size']		!= ''	? 'font-size: 	' . $arrSettings['ssba_font_size'] . 'px;' : NULL) . '
										' . ($arrSettings['ssba_font_color'] 	!= ''	? 'color: 		' . $arrSettings['ssba_font_color'] . '!important;' : NULL) . '
										' . ($arrSettings['ssba_font_weight'] 	!= ''	? 'font-weight: ' . $arrSettings['ssba_font_weight'] . ';' : NULL) . '
									}';
		}
		
		// else use set options
		else {

			// use custom styles
			$htmlSSBAStyle .= $arrSettings['ssba_custom_styles'];
			
		}
		
		// if counters option is set to Y
		if ($arrSettings['ssba_show_share_count'] == 'Y') {
		
			// if no custom share count css is set
			if ($arrSettings['ssba_share_count_css'] == '') {
			
				// styles that apply to all counter css sets
				$htmlSSBAStyle .= '.ssba_sharecount:after, .ssba_sharecount:before {
										right: 100%;
										border: solid transparent;
										content: " ";
										height: 0;
										width: 0;
										position: absolute;
										pointer-events: none;
									}
									.ssba_sharecount:after {
										border-color: rgba(224, 221, 221, 0);
										border-right-color: #f5f5f5;
										border-width: 5px;
										top: 50%;
										margin-top: -5px;
									}
									.ssba_sharecount:before {
										border-color: rgba(85, 94, 88, 0);
										border-right-color: #e0dddd;
										border-width: 6px;
										top: 50%;
										margin-top: -6px;
									}
									.ssba_sharecount {
										font: 11px Arial, Helvetica, sans-serif;
										
										padding: 5px;
										-khtml-border-radius: 6px;
										-o-border-radius: 6px;
										-webkit-border-radius: 6px;
										-moz-border-radius: 6px;
										border-radius: 6px;
										position: relative;
										border: 1px solid #e0dddd;';
		
				// if default counter style has been chosen
				if ($arrSettings['ssba_share_count_style'] == 'default') {
			
					// style share count
					$htmlSSBAStyle .= 	'color: #555e58;
											background: #f5f5f5;
										}
										.ssba_sharecount:after {
											border-right-color: #f5f5f5;
										}';
											
				} elseif ($arrSettings['ssba_share_count_style'] == 'white') {
				
					// show white style share counts
					$htmlSSBAStyle .= 	'color: #555e58;
											background: #ffffff;
										}
										.ssba_sharecount:after {
											border-right-color: #ffffff;
										}';
					
				} elseif ($arrSettings['ssba_share_count_style'] == 'blue') {
				
					// show blue style share counts
					$htmlSSBAStyle .= 	'color: #ffffff;
											background: #42a7e2;
										}
										.ssba_sharecount:after {
											border-right-color: #42a7e2;
										}';
				}
			} else {
			
				// custom style
				$htmlSSBAStyle .= $arrSettings['ssba_share_count_css'];
			}
		}
		
		// close style tag
		$htmlSSBAStyle .= '</style>';
		
		// return
		echo $htmlSSBAStyle;
	}
	
	// --------- SHARE BUTTONS ------------ //
	
	// return ssba settings
	function get_ssba_settings() {
	
		// globals
		global $wpdb;
		
		// query the db for current ssba settings
		$arrSettings = $wpdb->get_results("SELECT option_name, option_value
											 FROM $wpdb->options 
											WHERE option_name LIKE 'ssba_%'");
											
		// loop through each setting in the array
		foreach ($arrSettings as $setting) {
		
			// add each setting to the array by name
			$arrSettings[$setting->option_name] =  $setting->option_value;
		}
	
		// return
		return $arrSettings;	
	}
	
	// get and show share buttons
	function show_share_buttons($content, $booShortCode = FALSE, $atts = '') {
	
		// globals
		global $post;
		
		// variables
		$htmlContent = $content;
		$htmlShareButtons = '';
		$strIsWhatFunction = '';
		$pattern = get_shortcode_regex();

		// ssba_hide shortcode is in the post content and instance is not called by shortcode ssba
		if (preg_match_all( '/'. $pattern .'/s', $post->post_content, $matches )
			&& array_key_exists( 2, $matches )
			&& in_array('ssba_hide', $matches[2]) 
			&& $booShortCode == FALSE) {
			
			// exit the function returning the content without the buttons
			return $content;
		}
	
		// get sbba settings
		$arrSettings = get_ssba_settings();

		// placement on pages/posts/categories/archives/homepage
		if (is_page() && $arrSettings['ssba_pages'] == 'Y' || is_single() && $arrSettings['ssba_posts'] == 'Y' || is_category() && $arrSettings['ssba_cats_archs'] == 'Y' || is_archive() && $arrSettings['ssba_cats_archs'] == 'Y' || is_home() && $arrSettings['ssba_homepage'] == 'Y' || $booShortCode == TRUE) {
			
			// ssba div
			$htmlShareButtons.= '<!-- I got these buttons from simplesharebuttons.com --><div id="ssba">';
			
			// center if set so
			$htmlShareButtons.= ($arrSettings['ssba_align'] == 'center' ? '<center>' : NULL);
			
			// add custom text if set and set to placement above or left
			if (($arrSettings['ssba_share_text'] != '') && ($arrSettings['ssba_text_placement'] == 'above' || $arrSettings['ssba_text_placement'] == 'left')) {
			
				// check if user has left share link box checked
				if ($arrSettings['ssba_link_to_ssb'] == 'Y') {
				
					// share text with link
					$htmlShareButtons .= '<a href="http://www.simplesharebuttons.com" target="_blank" class="ssba_tooptip" id="ssba_tooptip""><span>www.simplesharebuttons.com</span>' . $arrSettings['ssba_share_text'];
				}
				
				// just display the share text
				else { 
					
					// share text
					$htmlShareButtons .= $arrSettings['ssba_share_text'];
				}
				// add a line break if set to above
				($arrSettings['ssba_text_placement'] == 'above' ? $htmlShareButtons .= '<br/>' : NULL);
			}
			
			// if running standard
			if ($booShortCode == FALSE) {
			
				// use wordpress functions for page/post details
				$urlCurrentPage = get_permalink($post->ID);	
				$strPageTitle = get_the_title($post->ID);
			}	else if ($booShortCode == TRUE) { // if using shortcode
			
				// if custom attributes have been set
				if ($atts['url'] != '') {
					
					// set page URL and title as set by user
					$urlCurrentPage = (isset($atts['url']) ? $atts['url'] : ssba_current_url());
					$strPageTitle = (isset($atts['title']) ? $atts['title'] : NULL);
				} else {
					// get page name and url from functions
					$urlCurrentPage = ssba_current_url();
					$strPageTitle = $_SERVER["SERVER_NAME"];
				}
				
				
			}		
			
			// the buttons!
			$htmlShareButtons.= get_share_buttons($arrSettings, $urlCurrentPage, $strPageTitle);
			
			// add custom text if set and set to placement right or below
			if (($arrSettings['ssba_share_text'] != '') && ($arrSettings['ssba_text_placement'] == 'right' || $arrSettings['ssba_text_placement'] =='below')) {
			
				// add a line break if set to above
				($arrSettings['ssba_text_placement'] == 'below' ? $htmlShareButtons .= '<br/>' : NULL);
				
				// check if user has left share link box checked
				if ($arrSettings['ssba_link_to_ssb'] == 'Y') {
				
					// share text with link
					$htmlShareButtons .= '<a href="http://www.simplesharebuttons.com" target="_blank" class="ssba_tooptip" id="ssba_tooptip""><span>www.simplesharebuttons.com</span>' . $arrSettings['ssba_share_text'];
				}
				
				// just display the share text
				else { 
					
					// share text
					$htmlShareButtons .= $arrSettings['ssba_share_text'];
				}
			}
			
			// close center if set
			$htmlShareButtons.= ($arrSettings['ssba_align'] == 'center' ? '</center>' : NULL);
			$htmlShareButtons.= '</div>';
			
			// if not using shortcode
			if ($booShortCode == FALSE) {
			
				// switch for placement of ssba
				switch ($arrSettings['ssba_before_or_after']) {
				
					case 'before': // before the content
					$htmlContent = $htmlShareButtons . $content;
					break;
					
					case 'after': // after the content
					$htmlContent = $content . $htmlShareButtons;
					break;
					
					case 'both': // before and after the content
					$htmlContent = $htmlShareButtons . $content . $htmlShareButtons;
					break;
				}
			}
			
			// if using shortcode
			else {
			
				// just return buttons
				$htmlContent = $htmlShareButtons;
			}
		}
		
		// return content and share buttons
		return $htmlContent;
	}

	// add share buttons to content and/or excerpts
	add_filter( 'the_content', 'show_share_buttons');	
	add_filter( 'the_excerpt', 'show_share_buttons');

	// shortcode for adding buttons
	function ssba_buttons($atts) {
	
		// get buttons - NULL for $content, TRUE for shortcode flag
		$htmlShareButtons = show_share_buttons(NULL, TRUE, $atts);
		
		//return buttons
		return $htmlShareButtons;
	}
	
	// shortcode for hiding buttons
	function ssba_hide($content) {

	}
	
	// get URL function
	function ssba_current_url() {
	
		// add http
		$urlCurrentPage = 'http';
		
		// add s to http if required
		if ($_SERVER["HTTPS"] == "on") {$urlCurrentPage .= "s";}
		
		// add colon and forward slashes
		$urlCurrentPage .= "://";
		
		// check if port is not 80
		if ($_SERVER["SERVER_PORT"] != "80") {
		
			// include port if needed
			$urlCurrentPage .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
			
		} 
		
		// else if on port 80
		else {
		
			// don't include port in url
			$urlCurrentPage .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
		}
		
		return $urlCurrentPage;
	}
	
	// shorten URL with bit.ly
	function ssba_shorten($urlLong) {
	
		// get results from bitly and return short url
		$hmtlBitly = file_get_contents('http://api.bit.ly/v3/shorten?login=simplesharebuttons&apiKey=R_555eddf50da1370b8ab75670a3de2fe6&longUrl=' . $urlLong);
		$arrBitly = json_decode($hmtlBitly, true);
		$urlShort =  $arrBitly['data'];
		$urlShort =  $urlShort['url'];
		$hmtlBitly = str_replace('[\]', '', $hmtlBitly);
		
		if ($urlShort != '') {
		
			return $urlShort;
		} else {
		
			return $urlLong;
		}; 
	}
	
	// get set share buttons
	function get_share_buttons($arrSettings, $urlCurrentPage, $strPageTitle) {

	// variables
	$htmlShareButtons = '';
	
	// explode saved include list and add to a new array
	$arrSelectedSSBA = explode(',', $arrSettings['ssba_selected_buttons']);
	
	// check if array is not empty
	if ($arrSettings['ssba_selected_buttons'] != '') {
	
		// if show counters option is selected
		if ($arrSettings['ssba_show_share_count'] == 'Y') {
		
			// set show flag to true
			$booShowShareCount = true;
			
			// if show counters once option is selected
			if ($arrSettings['ssba_share_count_once'] == 'Y') {
		
				// if not a page or post
				if (!is_page() && !is_single()) {
				
					// set show flag to false
					$booShowShareCount = false;
				}
			}
		}
	
		// for each included button
		foreach ($arrSelectedSSBA as $strSelected) {
		
			 $strGetButton = 'ssba_' . $strSelected;
		
			// add a list item for each selected option
			$htmlShareButtons .= $strGetButton($arrSettings, $urlCurrentPage, $strPageTitle, $booShowShareCount);
		}
	}
	
	// return share buttons
	return $htmlShareButtons;
}

// get facebook button
function ssba_facebook($arrSettings, $urlCurrentPage, $strPageTitle, $booShowShareCount) {

	// facebook share link
	$htmlShareButtons .= '<a id="ssba_facebook_share" href="http://www.facebook.com/sharer.php?u=' . $urlCurrentPage  . '" ' . ($arrSettings['ssba_share_new_window'] == 'Y' ? 'target="_blank"' : NULL) . '>';
	
	// if not using custom
	if ($arrSettings['ssba_image_set'] != 'custom') {
	
		// show selected ssba image
		$htmlShareButtons .= '<img title="Facebook" class="ssba" alt="Facebook" src="' . WP_PLUGIN_URL . '/simple-share-buttons-adder/buttons/' . $arrSettings['ssba_image_set'] . '/facebook.png" />';
	}
	
	// if using custom images
	else {
	
		// show custom image
		$htmlShareButtons .= '<img title="Facebook" class="ssba" src="' . $arrSettings['ssba_custom_facebook'] . '" alt="Facebook" />';
	}
	
	// close href
	$htmlShareButtons .= '</a>';
	
	// if show share count is set to Y
	if ($arrSettings['ssba_show_share_count'] == 'Y' && $booShowShareCount == true) {
	
		$htmlShareButtons .= '<span class="ssba_sharecount">' . getFacebookShareCount($urlCurrentPage) . '</span>';
	}
	
	// return share buttons
	return $htmlShareButtons;
}

// get facebook share count
function getFacebookShareCount($urlCurrentPage) {

	// get results from facebook and return the number of shares
    $htmlFacebookShareDetails = file_get_contents('http://graph.facebook.com/' . $urlCurrentPage);
    $arrFacebookShareDetails = json_decode($htmlFacebookShareDetails, true);
    $intFacebookShareCount =  $arrFacebookShareDetails['shares'];
    return ($intFacebookShareCount ) ? $intFacebookShareCount : '0';
}

// get twitter button
function ssba_twitter($arrSettings, $urlCurrentPage, $strPageTitle, $booShowShareCount) {

	// format the URL into friendly code
	$twitterShareText = urlencode(html_entity_decode($strPageTitle . ' ' . $arrSettings['ssba_twitter_text'], ENT_COMPAT, 'UTF-8'));

	// twitter share link
	$htmlShareButtons .= '<a id="ssba_twitter_share" href="http://twitter.com/share?url=' . $urlCurrentPage . '&text=' . $twitterShareText . '" ' . ($arrSettings['ssba_share_new_window'] == 'Y' ? 'target="_blank"' : NULL) . '>';
	
	// if image set is not custom
	if ($arrSettings['ssba_image_set'] != 'custom') {
	
		// show ssba image
		$htmlShareButtons .= '<img title="Twitter" class="ssba" alt="Twitter" src="' . WP_PLUGIN_URL . '/simple-share-buttons-adder/buttons/' . $arrSettings['ssba_image_set'] . '/twitter.png" />';
	}
	
	// if using custom images
	else {
	
		// show custom image
		$htmlShareButtons .= '<img title="Twitter" class="ssba" src="' . $arrSettings['ssba_custom_twitter'] . '" alt="Twitter" />';
	}
	
	// close href
	$htmlShareButtons .= '</a>';
	
	// if show share count is set to Y
	if ($arrSettings['ssba_show_share_count'] == 'Y' && $booShowShareCount == true) {
	
		$htmlShareButtons .= '<span class="ssba_sharecount">' . getTwitterShareCount($urlCurrentPage) . '</span>';
	}
	
	// return share buttons
	return $htmlShareButtons;
}

// get twitter share count
function getTwitterShareCount($urlCurrentPage) {

	// get results from twitter and return the number of shares
    $htmlTwitterShareDetails = file_get_contents('http://urls.api.twitter.com/1/urls/count.json?url=' . $urlCurrentPage);
    $arrTwitterShareDetails = json_decode($htmlTwitterShareDetails, true);
    $intTwitterShareCount =  $arrTwitterShareDetails['count'];
    return ($intTwitterShareCount ) ? $intTwitterShareCount : '0';
}

// get google+ button
function ssba_google($arrSettings, $urlCurrentPage, $strPageTitle, $booShowShareCount) {

	// google share link
	$htmlShareButtons .= '<a id="ssba_google_share" href="https://plus.google.com/share?url=' . $urlCurrentPage  . '" ' . ($arrSettings['ssba_share_new_window'] == 'Y' ? 'target="_blank"' : NULL) . '>';
	
	// if image set is not custom
	if ($arrSettings['ssba_image_set'] != 'custom') {
	
		// show ssba image
		$htmlShareButtons .= '<img title="Google+" class="ssba" alt="Google+" src="' . WP_PLUGIN_URL . '/simple-share-buttons-adder/buttons/' . $arrSettings['ssba_image_set'] . '/google.png" />';
	}
	
	// if using custom images
	else {
	
		// show custom image
		$htmlShareButtons .= '<img title="Google+" class="ssba" src="' . $arrSettings['ssba_custom_google'] . '" alt="Google+" />';
	}
	
	// close href
	$htmlShareButtons .= '</a>';
	
	// if show share count is set to Y
	if ($arrSettings['ssba_show_share_count'] == 'Y' && $booShowShareCount == true) {
	
		$htmlShareButtons .= '<span class="ssba_sharecount">' . getGoogleShareCount($urlCurrentPage) . '</span>';
	}
	
	// return share buttons
	return $htmlShareButtons;
}

// get google share count
function getGoogleShareCount($urlCurrentPage) {

	 $args = array(
            'method' => 'POST',
            'headers' => array(
                // setup content type to JSON 
                'Content-Type' => 'application/json'
            ),
            // setup POST options to Google API
            'body' => json_encode(array(
                'method' => 'pos.plusones.get',
                'id' => 'p',
                'method' => 'pos.plusones.get',
                'jsonrpc' => '2.0',
                'key' => 'p',
                'apiVersion' => 'v1',
                'params' => array(
                    'nolog'=>true,
                    'id'=> $urlCurrentPage,
                    'source'=>'widget',
                    'userId'=>'@viewer',
                    'groupId'=>'@self'
                ) 
             )),
             // disable checking SSL sertificates               
            'sslverify'=>false
        );
     
    // retrieves JSON with HTTP POST method for current URL  
    $json_string = wp_remote_post("https://clients6.google.com/rpc", $args);
     
    if (is_wp_error($json_string)){
        // return zero if response is error                             
        return "0";             
    } else {        
        $json = json_decode($json_string['body'], true);                    
        // return count of Google +1 for requsted URL
        return intval( $json['result']['metadata']['globalCounts']['count'] ); 
    }
}

// get diggit button
function ssba_diggit($arrSettings, $urlCurrentPage, $strPageTitle, $booShowShareCount) {

	// diggit share link
	$htmlShareButtons .= '<a id="ssba_diggit_share" class="ssba_share_link" href="http://www.digg.com/submit?url=' . $urlCurrentPage  . '" ' . ($arrSettings['ssba_share_new_window'] == 'Y' ? 'target="_blank"' : NULL) . '>';
	
	// if image set is not custom
	if ($arrSettings['ssba_image_set'] != 'custom') {
	
		// show ssba image
		$htmlShareButtons .= '<img title="Digg" class="ssba" alt="Digg" src="' . WP_PLUGIN_URL . '/simple-share-buttons-adder/buttons/' . $arrSettings['ssba_image_set'] . '/diggit.png" />';
	}
	
	// if using custom images
	else {
		
		// show custom image
		$htmlShareButtons .= '<img title="Digg" class="ssba" src="' . $arrSettings['ssba_custom_diggit'] . '" alt="Digg" />';			
	}
	
	// close href
	$htmlShareButtons .= '</a>';

	// return share buttons
	return $htmlShareButtons;
}

// get reddit button
function ssba_reddit($arrSettings, $urlCurrentPage, $strPageTitle, $booShowShareCount) {

	// reddit share link
	$htmlShareButtons .= '<a id="ssba_reddit_share" href="http://reddit.com/submit?url=' . $urlCurrentPage  . '&title=' . $strPageTitle . '" ' . ($arrSettings['ssba_share_new_window'] == 'Y' ? 'target="_blank"' : NULL) . '>';
	
	// if image set is not custom
	if ($arrSettings['ssba_image_set'] != 'custom') {
	
		// show ssba image
		$htmlShareButtons .= '<img title="Reddit" class="ssba" alt="Reddit" src="' . WP_PLUGIN_URL . '/simple-share-buttons-adder/buttons/' . $arrSettings['ssba_image_set'] . '/reddit.png" />';
	}
	
	// if using custom images
	else {
		
		// show custom image
		$htmlShareButtons .= '<img title="Reddit" class="ssba" src="' . $arrSettings['ssba_custom_reddit'] . '" alt="Reddit" />';
	}
	
	// close href
	$htmlShareButtons .= '</a>';
	
	// if show share count is set to Y
	if ($arrSettings['ssba_show_share_count'] == 'Y' && $booShowShareCount == true) {
	
		// get and display share count
		$htmlShareButtons .= '<span class="ssba_sharecount">' . getRedditShareCount($urlCurrentPage) . '</span>';
	}
	
	// return share buttons
	return $htmlShareButtons;
}

// get reddit share count
function getRedditShareCount($urlCurrentPage) {

	// get results from reddit and return the number of shares
    $htmlRedditShareDetails = file_get_contents('http://www.reddit.com/api/info.json?url=' . $urlCurrentPage);
	$arrRedditResult = json_decode($htmlRedditShareDetails, true);
    $intRedditShareCount = $arrRedditResult['data']['children']['0']['data']['score'];
    return ($intRedditShareCount ) ? $intRedditShareCount : '0';
}

// get linkedin button
function ssba_linkedin($arrSettings, $urlCurrentPage, $strPageTitle, $booShowShareCount) {

	// linkedin share link
	$htmlShareButtons .= '<a id="ssba_linkedin_share" class="ssba_share_link" href="http://www.linkedin.com/shareArticle?mini=true&url=' . $urlCurrentPage  . '" ' . ($arrSettings['ssba_share_new_window'] == 'Y' ? 'target="_blank"' : NULL) . '>';
	
	// if image set is not custom
	if ($arrSettings['ssba_image_set'] != 'custom') {
	
		// show ssba image
		$htmlShareButtons .= '<img title="Linkedin" class="ssba" alt="LinkedIn" src="' . WP_PLUGIN_URL . '/simple-share-buttons-adder/buttons/' . $arrSettings['ssba_image_set'] . '/linkedin.png" />';
	}
	
	// if using custom images
	else {
	
		// show custom image
		$htmlShareButtons .= '<img title="LinkedIn" class="ssba" src="' . $arrSettings['ssba_custom_linkedin'] . '" alt="LinkedIn" />';
	}
	
	// close href
	$htmlShareButtons .= '</a>';
	
	// if show share count is set to Y
	if ($arrSettings['ssba_show_share_count'] == 'Y' && $booShowShareCount == true) {
	
		// get and display share count
		$htmlShareButtons .= '<span class="ssba_sharecount">' . getLinkedinShareCount($urlCurrentPage) . '</span>';
	}
	
	// return share buttons
	return $htmlShareButtons;
}

// get linkedin share count
function getLinkedinShareCount($urlCurrentPage) {

	// get results from linkedin and return the number of shares
    $htmlLinkedinShareDetails = file_get_contents('http://www.linkedin.com/countserv/count/share?url=' . $urlCurrentPage);
	$htmlLinkedinShareDetails = str_replace('IN.Tags.Share.handleCount(', '', $htmlLinkedinShareDetails);
    $htmlLinkedinShareDetails = str_replace(');', '', $htmlLinkedinShareDetails);
    $arrLinkedinShareDetails = json_decode($htmlLinkedinShareDetails, true);
    $intLinkedinShareCount =  $arrLinkedinShareDetails['count'];
    return ($intLinkedinShareCount ) ? $intLinkedinShareCount : '0';
}

// get pinterest button
function ssba_pinterest($arrSettings, $urlCurrentPage, $strPageTitle, $booShowShareCount) {

	// pinterest share link
	$htmlShareButtons .= "<a id='ssba_pinterest_share' href='javascript:void((function()%7Bvar%20e=document.createElement(&apos;script&apos;);e.setAttribute(&apos;type&apos;,&apos;text/javascript&apos;);e.setAttribute(&apos;charset&apos;,&apos;UTF-8&apos;);e.setAttribute(&apos;src&apos;,&apos;http://assets.pinterest.com/js/pinmarklet.js?r=&apos;+Math.random()*99999999);document.body.appendChild(e)%7D)());'>";
	
	// if image set is not custom
	if ($arrSettings['ssba_image_set'] != 'custom') {
	
		// show ssba image
		$htmlShareButtons .= '<img title="Pinterest" class="ssba" alt="Pinterest" src="' . WP_PLUGIN_URL . '/simple-share-buttons-adder/buttons/' . $arrSettings['ssba_image_set'] . '/pinterest.png" />';
	}
	
	// if using custom images
	else {
	
		// show custom image
		$htmlShareButtons .= '<img title="Pinterest" class="ssba" src="' . $arrSettings['ssba_custom_pinterest'] . '" alt="Pinterest" />';
	}
	
	// close href
	$htmlShareButtons .= '</a>';
	
	// if show share count is set to Y
	if ($arrSettings['ssba_show_share_count'] == 'Y' && $booShowShareCount == true) {
	
		$htmlShareButtons .= '<span class="ssba_sharecount">' . getPinterestShareCount($urlCurrentPage) . '</span>';
	}
	
	// return share buttons
	return $htmlShareButtons;
}

// get pinterest share count
function getPinterestShareCount($urlCurrentPage) {

	// get results from pinterest and return the number of shares
    $htmlPinterestShareDetails = file_get_contents('http://api.pinterest.com/v1/urls/count.json?url=' . $urlCurrentPage);
    $htmlPinterestShareDetails = str_replace('receiveCount(', '', $htmlPinterestShareDetails);
    $htmlPinterestShareDetails = str_replace(')', '', $htmlPinterestShareDetails);
    $arrPinterestShareDetails = json_decode($htmlPinterestShareDetails, true);
    $intPinterestShareCount =  $arrPinterestShareDetails['count'];
    return ($intPinterestShareCount ) ? $intPinterestShareCount : '0';
}

// get stumbleupon button
function ssba_stumbleupon($arrSettings, $urlCurrentPage, $strPageTitle, $booShowShareCount) {

	// stumbleupon share link
	$htmlShareButtons .= '<a id="ssba_stumbleupon_share" class="ssba_share_link" href="http://www.stumbleupon.com/submit?url=' . $urlCurrentPage  . '&title=' . $strPageTitle . '" ' . ($arrSettings['ssba_share_new_window'] == 'Y' ? 'target="_blank"' : NULL) . '>';
	
	// if image set is not custom
	if ($arrSettings['ssba_image_set'] != 'custom') {
	
		// show ssba image
		$htmlShareButtons .= '<img title="StumbleUpon" class="ssba" alt="StumbleUpon" src="' . WP_PLUGIN_URL . '/simple-share-buttons-adder/buttons/' . $arrSettings['ssba_image_set'] . '/stumbleupon.png" />';
	}
	
	// if using custom images
	else {
	
		// show custom image
		$htmlShareButtons .= '<img title="StumbleUpon" class="ssba" src="' . $arrSettings['ssba_custom_stumbleupon'] . '" alt="StumbleUpon" />';
	}
	
	// close href
	$htmlShareButtons .= '</a>';
	
	// if show share count is set to Y
	if ($arrSettings['ssba_show_share_count'] == 'Y' && $booShowShareCount == true) {
	
		$htmlShareButtons .= '<span class="ssba_sharecount">' . getStumbleUponShareCount($urlCurrentPage) . '</span>';
	}
	
	// return share buttons
	return $htmlShareButtons;
}

// get stumbleupon share count
function getStumbleUponShareCount($urlCurrentPage) {

	// get results from stumbleupon and return the number of shares
    $htmlStumbleUponShareDetails = file_get_contents('http://www.stumbleupon.com/services/1.01/badge.getinfo?url=' . $urlCurrentPage);
    $arrStumbleUponResult = json_decode($htmlStumbleUponShareDetails, true);
    $intStumbleUponShareCount =  $arrStumbleUponResult['result']['views'];
    return ($intStumbleUponShareCount ) ? $intStumbleUponShareCount : '0';
}

// get email button
function ssba_email($arrSettings, $urlCurrentPage, $strPageTitle, $booShowShareCount) {

	// email share link
	$htmlShareButtons .= '<a id="ssba_email_share" href="mailto:?Subject=' . $strPageTitle . '&Body=' . $arrSettings['ssba_email_message'] . ' ' . $urlCurrentPage  . '">';
	
	// if image set is not custom
	if ($arrSettings['ssba_image_set'] != 'custom') {
	
		// show ssba image
		$htmlShareButtons .= '<img title="Email" class="ssba" alt="Email" src="' . WP_PLUGIN_URL . '/simple-share-buttons-adder/buttons/' . $arrSettings['ssba_image_set'] . '/email.png" />';
	}
	
	// if using custom images
	else {
	
		// show custom image
		$htmlShareButtons .= '<img title="Email" class="ssba" src="' . $arrSettings['ssba_custom_email'] . '" alt="Email" />';
	}
	
	// close href
	$htmlShareButtons .= '</a>';
	
	// return share buttons
	return $htmlShareButtons;
}

// get flattr button
function ssba_flattr($arrSettings, $urlCurrentPage, $strPageTitle, $booShowShareCount) {

	// check for dedicated flattr URL
	if ($arrSettings['ssba_flattr_url'] != '') {
	
		// updatae url that will be set to specified URL
		$urlCurrentPage = $arrSettings['ssba_flattr_url'];
	}

	// flattr share link
	$htmlShareButtons .= '<a id="ssba_flattr_share" href="https://flattr.com/submit/auto?\user_id=' . $arrSettings['ssba_flattr_user_id'] . '&url=' . $urlCurrentPage . '" ' . ($arrSettings['ssba_share_new_window'] == 'Y' ? 'target="_blank"' : NULL) . '>';
	
	// if image set is not custom
	if ($arrSettings['ssba_image_set'] != 'custom') {
	
		// show ssba image
		$htmlShareButtons .= '<img title="Flattr" class="ssba" alt="flattr" src="' . WP_PLUGIN_URL . '/simple-share-buttons-adder/buttons/' . $arrSettings['ssba_image_set'] . '/flattr.png" />';
	}
	
	// if using custom images
	else {
	
		// show custom image
		$htmlShareButtons .= '<img title="Flattr" class="ssba" src="' . $arrSettings['ssba_custom_flattr'] . '" alt="flattr" />';
	}
	
	// close href
	$htmlShareButtons .= '</a>';
	
	// return share buttons
	return $htmlShareButtons;
}

// get buffer button
function ssba_buffer($arrSettings, $urlCurrentPage, $strPageTitle, $booShowShareCount) {

	// buffer share link
	$htmlShareButtons .= '<a id="ssba_buffer_share" href="https://bufferapp.com/add?url=' . $urlCurrentPage . '&text=' . ($arrSettings['ssba_buffer_text'] != '' ? $arrSettings['ssba_buffer_text'] : NULL) . ' ' . $strPageTitle . '" ' . ($arrSettings['ssba_share_new_window'] == 'Y' ? 'target="_blank"' : NULL) . '>';
	
	// if image set is not custom
	if ($arrSettings['ssba_image_set'] != 'custom') {
	
		// show ssba image
		$htmlShareButtons .= '<img title="Buffer" class="ssba" alt="buffer" src="' . WP_PLUGIN_URL . '/simple-share-buttons-adder/buttons/' . $arrSettings['ssba_image_set'] . '/buffer.png" />';
	}
	
	// if using custom images
	else {
	
		// show custom image
		$htmlShareButtons .= '<img title="Buffer" class="ssba" src="' . $arrSettings['ssba_custom_buffer'] . '" alt="buffer" />';
	}
	
	// close href
	$htmlShareButtons .= '</a>';
	
	// return share buttons
	return $htmlShareButtons;
}

// get tumblr button
function ssba_tumblr($arrSettings, $urlCurrentPage, $strPageTitle, $booShowShareCount) {

	// check if http:// is included
	if (preg_match('[http://]', $urlCurrentPage)) {
	
		// remove http:// from URL
		$urlCurrentPage = str_replace('http://', '', $urlCurrentPage);			
	} else if (preg_match('[https://]', $urlCurrentPage)) { // check if https:// is included
	
		// remove http:// from URL
		$urlCurrentPage = str_replace('https://', '', $urlCurrentPage);			
	}

	// strip http:// or https:// from URL (tumblr doesn't work with this set)
	$urlCurrentPage =  str_replace("http://", '', $urlCurrentPage);  

	// tumblr share link
	$htmlShareButtons .= '<a id="ssba_tumblr_share" href="http://www.tumblr.com/share/link?url=' . $urlCurrentPage . '&name=' . $strPageTitle . '" ' . ($arrSettings['ssba_share_new_window'] == 'Y' ? 'target="_blank"' : NULL) . '>';
	
	// if image set is not custom
	if ($arrSettings['ssba_image_set'] != 'custom') {
	
		// show ssba image
		$htmlShareButtons .= '<img title="tumblr" class="ssba" alt="tumblr" src="' . WP_PLUGIN_URL . '/simple-share-buttons-adder/buttons/' . $arrSettings['ssba_image_set'] . '/tumblr.png" />';
	}
	
	// if using custom images
	else {
	
		// show custom image
		$htmlShareButtons .= '<img title="tumblr" class="ssba" src="' . $arrSettings['ssba_custom_tumblr'] . '" alt="tumblr" />';
	}
	
	// close href
	$htmlShareButtons .= '</a>';
	
	// return share buttons
	return $htmlShareButtons;
}
	
	// register shortcode [ssba] to show [ssba_hide]
	add_shortcode( 'ssba', 'ssba_buttons' );	
	add_shortcode( 'ssba_hide', 'ssba_hide' );	
	
?>