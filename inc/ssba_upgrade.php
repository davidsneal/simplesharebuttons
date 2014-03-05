<?php

function upgrade_ssba($arrSettings) {

	// see if posts and pages were selected in previous versions
	if (isset($arrSettings['ssba_posts_or_pages']) && $arrSettings['ssba_posts_or_pages'] == 'both') {

		// set posts and pages to Y
		add_option('ssba_pages', 'Y');
		add_option('ssba_posts', 'Y');
	}

	// see if posts only was selected in previous versions
	else if (isset($arrSettings['ssba_posts_or_pages']) && $arrSettings['ssba_posts_or_pages'] == 'posts') {

		// set posts to Y pages to N
		add_option('ssba_pages', '');
		add_option('ssba_posts', 'Y');
	}

	// see if pages only was selected in previous versions
	else if (isset($arrSettings['ssba_posts_or_pages']) && $arrSettings['ssba_posts_or_pages'] == 'pages') {

		// set pages to Y pages to N
		add_option('ssba_pages', 'Y');
		add_option('ssba_posts', '');
	}
	
	// if users had images set to small in previous versions (pre 2.0)
	if ($arrSettings['ssba_size'] == 'small') {
	
		// set image size to new pixel format 35px
		update_option('ssba_size', '35');
	} 
	
	// if users had images set to medium in previous versions (pre 2.0)
	else if ($arrSettings['ssba_size'] == 'medium') { 
	
		// set image size to new pixel format 45px
		update_option('ssba_size', '45');
	}
	
	else { 
	
		// do nothing, user will be installing 1.9+ 
	}
	
	// new include option
	add_option('ssba_selected_buttons', 	'');
	
	// new custom styles option
	add_option('ssba_custom_styles', 		'');
	add_option('ssba_email_message', 		'');

	// new share text option
	add_option('ssba_share_text', 			'');
	add_option('ssba_font_family', 			'');
	add_option('ssba_font_color',			'');	
	add_option('ssba_font_size',			'');
	add_option('ssba_font_weight',			'');
	
	// share container new in 2.3
	add_option('ssba_div_padding', 			'');
	add_option('ssba_div_rounded_corners', 	'');
	add_option('ssba_border_width', 		'');
	add_option('ssba_div_border', 			'#59625c');
	add_option('ssba_div_background', 		'');

	// add new placement options
	add_option('ssba_cats_archs',			'');
	add_option('ssba_homepage',				'');

	// add new buttons
	add_option('ssba_email', 				'');
	add_option('ssba_reddit', 				'');

	// add custom image options
	add_option('ssba_custom_email', 		'');
	add_option('ssba_custom_google', 		'');
	add_option('ssba_custom_facebook', 		'');
	add_option('ssba_custom_twitter', 		'');
	add_option('ssba_custom_diggit', 		'');
	add_option('ssba_custom_linkedin', 	  	'');
	add_option('ssba_custom_reddit', 		'');
	add_option('ssba_custom_stumbleupon', 	'');
	add_option('ssba_custom_pinterest', 	'');
	add_option('ssba_custom_buffer', 		'');
	add_option('ssba_custom_flattr', 		'');
	
	// include
	delete_option('ssba_email', 			'');
	delete_option('ssba_google', 			'');
	delete_option('ssba_facebook', 			'');
	delete_option('ssba_twitter', 			'');
	delete_option('ssba_diggit', 			'');
	delete_option('ssba_linkedin', 			'');
	delete_option('ssba_reddit', 			'');
	delete_option('ssba_stumbleupon', 		'');
	delete_option('ssba_pinterest', 		'');
	
	// new options
	add_option('ssba_share_new_window', 	'Y');
	add_option('ssba_link_to_ssb', 			'Y');
	
	// new for 2.4
	add_option('ssba_show_share_count',		'');
	add_option('ssba_share_count_style',	'default');
	add_option('ssba_share_count_css',		'');
	add_option('ssba_share_count_once',		'Y');
	
	// new for 2.5
	add_option('ssba_twitter_text',			'');
	add_option('ssba_buffer_text',			'');
	add_option('ssba_flattr_user_id',		'');
	add_option('ssba_flattr_url',			'');
	
	// default image set removed for 2.5
	if ($arrSettings['ssba_image_set'] == 'default') {

		// update image set to somacro
		update_option('ssba_image_set', 'somacro');
	}

	// new for 2.6
	add_option('ssba_custom_tumblr', 	'');

	// add text placement option, default to left
	add_option('ssba_text_placement', 	'left');

	// update version number
	update_option('ssba_version', '3.4');
}
	
?>