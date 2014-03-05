<?php

function ssba_admin_panel($arrSettings, $htmlSettingsSaved) {

	// variables
	$htmlShareButtonsForm = '';
	
	// header
	$htmlShareButtonsForm .= '<div id="ssba-header">';
	
		//logo
		$htmlShareButtonsForm .= '<div id="ssba-logo">';
			$htmlShareButtonsForm .= '<a href="http://www.simplesharebuttons.com" target="_blank"><img src="' . plugins_url() . '/simple-share-buttons-adder/images/simplesharebuttons.png' . '" /></a>';
		$htmlShareButtonsForm .= '</div>';
		
		// top nav
		$htmlShareButtonsForm .= '<div id="ssba-top-nav">';
			$htmlShareButtonsForm .= '<a href="http://www.simplesharebuttons.com/forums/forum/wordpress-forum/" target="_blank">Support</a>';
			$htmlShareButtonsForm .= '<a href="http://www.simplesharebuttons.com/wordpress-faq/" target="_blank">FAQ</a>';
			$htmlShareButtonsForm .= '<a href="http://www.simplesharebuttons.com/showcase/" target="_blank">Showcase</a>';
			$htmlShareButtonsForm .= '<a href="http://www.simplesharebuttons.com/donate/" target="_blank">Donate</a>';
		$htmlShareButtonsForm .= '</div>';
		
	// close header
	$htmlShareButtonsForm .= '</div>';
	
	// tabs
	$htmlShareButtonsForm .= '<div id="ssba-tabs">';
	$htmlShareButtonsForm .= '<a id="ssba_tab_basic" class="ssba-selected-tab" href="javascript:;">Basic</a>';
	$htmlShareButtonsForm .= '<a id="ssba_tab_styling" href="javascript:;">Styling</a>';
	$htmlShareButtonsForm .= '<a id="ssba_tab_counters" href="javascript:;">Counters</a>';
	$htmlShareButtonsForm .= '<a id="ssba_tab_advanced" href="javascript:;">Advanced</a>';
	$htmlShareButtonsForm .= '</div>';
	
	// html form
	$htmlShareButtonsForm .= '<div class="wrap">';
		
		// create a table and cell to contain all minus the author cell
		$htmlShareButtonsForm .= '<table><tr><td style="width: 610px; vertical-align: top;">';
	
		// show settings saved message if set
		(isset($htmlSettingsSaved) ? $htmlShareButtonsForm .= $htmlSettingsSaved : NULL);
		
		// start form
		$htmlShareButtonsForm .= '<form method="post">';
		
		// hidden field to check for post IMPORTANT
		$htmlShareButtonsForm .= '<input type="hidden" name="ssba_options" id="ssba_options" value="save" />';
		
			//------ BASIC TAB -------//
			
			$htmlShareButtonsForm .= '<div id="ssba_settings_basic">';
				$htmlShareButtonsForm .= '<h2>Basic Settings</h2>';
				$htmlShareButtonsForm .= '<table class="form-table">';
					$htmlShareButtonsForm .= '<tr><td><h3>Where</h3></td></tr>';
					$htmlShareButtonsForm .= '<tr valign="top">';
						$htmlShareButtonsForm .= '<th scope="row" style="width: 120px;"><label>Location:</label></th>';
						$htmlShareButtonsForm .= '<td>';
						$htmlShareButtonsForm .= 'Homepage&nbsp;<input type="checkbox" name="ssba_homepage" id="ssba_homepage" ' 	 	. ($arrSettings['ssba_homepage'] 	== 'Y'   ? 'checked' : NULL) . ' value="Y" style="margin-right: 10px;" />';
						$htmlShareButtonsForm .= 'Pages&nbsp;<input type="checkbox" name="ssba_pages" id="ssba_pages" ' 		 		. ($arrSettings['ssba_pages'] 		== 'Y'   ? 'checked' : NULL) . ' value="Y" style="margin-right: 10px;" />';
						$htmlShareButtonsForm .= 'Posts&nbsp;<input type="checkbox" name="ssba_posts" id="ssba_posts" ' 		 		. ($arrSettings['ssba_posts'] 		== 'Y'   ? 'checked' : NULL) . ' value="Y" style="margin-right: 10px;" />';
						$htmlShareButtonsForm .= 'Categories&#47;Archives&nbsp;<input type="checkbox" name="ssba_cats_archs" id="ssba_cats_archs" '	. ($arrSettings['ssba_cats_archs']	== 'Y'   ? 'checked' : NULL) . ' value="Y" style="margin-right: 10px;" />';
						$htmlShareButtonsForm .= '<p class="description">Check all those that you wish to show your share buttons</br>Note you can also show&#47;hide your buttons using &#91;ssba&#93; and &#91;ssba&#95;hide&#93;</p></td>';
					$htmlShareButtonsForm .= '</tr>';
					$htmlShareButtonsForm .= '<tr valign="top">';
						$htmlShareButtonsForm .= '<th scope="row" style="width: 120px;"><label for="ssba_before_or_after">Placement:&nbsp;</label></th>';
						$htmlShareButtonsForm .= '<td><select name="ssba_before_or_after" id="ssba_before_or_after">';
						$htmlShareButtonsForm .= '<option ' . ($arrSettings['ssba_before_or_after'] == 'after' 	? 'selected="selected"' : NULL) . ' value="after">After</option>';
						$htmlShareButtonsForm .= '<option ' . ($arrSettings['ssba_before_or_after'] == 'before' ? 'selected="selected"' : NULL) . ' value="before">Before</option>';
						$htmlShareButtonsForm .= '<option ' . ($arrSettings['ssba_before_or_after'] == 'both' 	? 'selected="selected"' : NULL) . ' value="both">Both</option>';
						$htmlShareButtonsForm .= '</select>';
						$htmlShareButtonsForm .= '<p class="description">Place share buttons before or after your content</p></td>';
					$htmlShareButtonsForm .= '</tr>';
						$htmlShareButtonsForm .= '<tr><td><h3>What</h3></td></tr>';
						$htmlShareButtonsForm .= '<tr valign="top">';
						$htmlShareButtonsForm .= '<th scope="row" style="width: 120px;"><label for="ssba_share_text">Share Text:&nbsp;</label></th>';
						$htmlShareButtonsForm .= '<td><input type="text" name="ssba_share_text" id="ssba_share_text" value="' . $arrSettings['ssba_share_text'] . '" />';
						$htmlShareButtonsForm .= '<p class="description">Add some custom text by your share buttons</p></td>';
					$htmlShareButtonsForm .= '</tr>';
					$htmlShareButtonsForm .= '<tr valign="top">';
						$htmlShareButtonsForm .= '<th scope="row" style="width: 120px;"><label for="ssba_image_set">Image Set:&nbsp;</label></th>';
						$htmlShareButtonsForm .= '<td><select name="ssba_image_set" id="ssba_image_set">';
						$htmlShareButtonsForm .= '<option ' . ($arrSettings['ssba_image_set'] == 'arbenta' 		? 'selected="selected"' : NULL) . ' value="arbenta">Arbenta</option>';
						$htmlShareButtonsForm .= '<option ' . ($arrSettings['ssba_image_set'] == 'custom' 		? 'selected="selected"' : NULL) . ' value="custom">Custom</option>';
						$htmlShareButtonsForm .= '<option ' . ($arrSettings['ssba_image_set'] == 'metal' 		? 'selected="selected"' : NULL) . ' value="metal">Metal</option>';
						$htmlShareButtonsForm .= '<option ' . ($arrSettings['ssba_image_set'] == 'pagepeel' 	? 'selected="selected"' : NULL) . ' value="pagepeel">Page Peel</option>';
						$htmlShareButtonsForm .= '<option ' . ($arrSettings['ssba_image_set'] == 'plain' 		? 'selected="selected"' : NULL) . ' value="plain">Plain</option>';
						$htmlShareButtonsForm .= '<option ' . ($arrSettings['ssba_image_set'] == 'retro' 		? 'selected="selected"' : NULL) . ' value="retro">Retro</option>';
						$htmlShareButtonsForm .= '<option ' . ($arrSettings['ssba_image_set'] == 'ribbons' 		? 'selected="selected"' : NULL) . ' value="ribbons">Ribbons</option>';
						$htmlShareButtonsForm .= '<option ' . ($arrSettings['ssba_image_set'] == 'simple' 		? 'selected="selected"' : NULL) . ' value="simple">Simple</option>';
						$htmlShareButtonsForm .= '<option ' . ($arrSettings['ssba_image_set'] == 'somacro' 		? 'selected="selected"' : NULL) . ' value="somacro">Somacro</option>';
						$htmlShareButtonsForm .= '</select>';
						$htmlShareButtonsForm .= '<p class="description">You can make your own <a href="http://make.simplesharebuttons.com" target="blank"><strong>custom-coloured share buttons here</strong></a>! Choose your favourite set of buttons, or set to &#39;Custom&#39; to choose your own. <a href="http://www.simplesharebuttons.com/button-sets/" target="_blank">Click here</a> to preview the button sets</br>';
						$htmlShareButtonsForm .= "</p></td>";
					$htmlShareButtonsForm .= '</tr>';
				$htmlShareButtonsForm .= '</table>';
				
				// --------- CUSTOM IMAGES ------------ //
				$htmlShareButtonsForm .= '<div id="ssba-custom-images"' . ($arrSettings['ssba_image_set'] != 'custom' ? 'style="display: none;"' : NULL) . '>';
				$htmlShareButtonsForm .= '<h4>Custom Images</h4>';
				$htmlShareButtonsForm .= '<table class="form-table">';
					$htmlShareButtonsForm .= '<tr valign="top">';
						$htmlShareButtonsForm .= '<th scope="row" style="width: 120px;"><label>Buffer:</label></th>';
						$htmlShareButtonsForm .= '<td>';
						$htmlShareButtonsForm .= '<input id="ssba_custom_buffer" type="text" size="50" name="ssba_custom_buffer" value="' . (isset($arrSettings['ssba_custom_buffer']) ? $arrSettings['ssba_custom_buffer'] : NULL)  . '" />';
						$htmlShareButtonsForm .= '<input id="upload_buffer_button" data-ssba-input="ssba_custom_buffer" class="button customUpload" type="button" value="Upload Image" />';
						$htmlShareButtonsForm .= '</td>';
					$htmlShareButtonsForm .= '</tr>';
					$htmlShareButtonsForm .= '<tr valign="top">';
						$htmlShareButtonsForm .= '<th scope="row" style="width: 120px;"><label>Diggit:</label></th>';
						$htmlShareButtonsForm .= '<td>';
						$htmlShareButtonsForm .= '<input id="ssba_custom_diggit" type="text" size="50" name="ssba_custom_diggit" value="' . (isset($arrSettings['ssba_custom_diggit']) ? $arrSettings['ssba_custom_diggit'] : NULL)  . '" />';
						$htmlShareButtonsForm .= '<input id="upload_diggit_button" data-ssba-input="ssba_custom_diggit" class="button customUpload" type="button" value="Upload Image" />';
						$htmlShareButtonsForm .= '</td>';
					$htmlShareButtonsForm .= '</tr>';
					$htmlShareButtonsForm .= '<tr valign="top">';
						$htmlShareButtonsForm .= '<th scope="row" style="width: 120px;"><label>Email:</label></th>';
						$htmlShareButtonsForm .= '<td>';
						$htmlShareButtonsForm .= '<input id="ssba_custom_email" type="text" size="50" name="ssba_custom_email" value="' . (isset($arrSettings['ssba_custom_email']) ? $arrSettings['ssba_custom_email'] : NULL)  . '" />';
						$htmlShareButtonsForm .= '<input id="upload_email_button" data-ssba-input="ssba_custom_email" class="button customUpload" type="button" value="Upload Image" />';
						$htmlShareButtonsForm .= '</td>';
					$htmlShareButtonsForm .= '</tr>';
					$htmlShareButtonsForm .= '<tr valign="top">';
						$htmlShareButtonsForm .= '<th scope="row" style="width: 120px;"><label>Facebook:</label></th>';
						$htmlShareButtonsForm .= '<td>';
						$htmlShareButtonsForm .= '<input id="ssba_custom_facebook" type="text" size="50" name="ssba_custom_facebook" value="' . (isset($arrSettings['ssba_custom_facebook']) ? $arrSettings['ssba_custom_facebook'] : NULL)  . '" />';
						$htmlShareButtonsForm .= '<input id="upload_facebook_button" data-ssba-input="ssba_custom_facebook" class="button customUpload" type="button" value="Upload Image" />';
						$htmlShareButtonsForm .= '</td>';
					$htmlShareButtonsForm .= '</tr>';
					$htmlShareButtonsForm .= '<tr valign="top">';
						$htmlShareButtonsForm .= '<th scope="row" style="width: 120px;"><label>Flattr:</label></th>';
						$htmlShareButtonsForm .= '<td>';
						$htmlShareButtonsForm .= '<input id="ssba_custom_flattr" type="text" size="50" name="ssba_custom_flattr" value="' . (isset($arrSettings['ssba_custom_flattr']) ? $arrSettings['ssba_custom_flattr'] : NULL)  . '" />';
						$htmlShareButtonsForm .= '<input id="upload_flattr_button" data-ssba-input="ssba_custom_flattr" class="button customUpload" type="button" value="Upload Image" />';
						$htmlShareButtonsForm .= '</td>';
					$htmlShareButtonsForm .= '</tr>';
					$htmlShareButtonsForm .= '<tr valign="top">';
						$htmlShareButtonsForm .= '<th scope="row" style="width: 120px;"><label>Google:</label></th>';
						$htmlShareButtonsForm .= '<td>';
						$htmlShareButtonsForm .= '<input id="ssba_custom_google" type="text" size="50" name="ssba_custom_google" value="' . (isset($arrSettings['ssba_custom_google']) ? $arrSettings['ssba_custom_google'] : NULL)  . '" />';
						$htmlShareButtonsForm .= '<input id="upload_google_button" data-ssba-input="ssba_custom_google" class="button customUpload" type="button" value="Upload Image" />';
						$htmlShareButtonsForm .= '</td>';
					$htmlShareButtonsForm .= '</tr>';
					$htmlShareButtonsForm .= '<tr valign="top">';
						$htmlShareButtonsForm .= '<th scope="row" style="width: 120px;"><label>LinkedIn:</label></th>';
						$htmlShareButtonsForm .= '<td>';
						$htmlShareButtonsForm .= '<input id="ssba_custom_linkedin" type="text" size="50" name="ssba_custom_linkedin" value="' . (isset($arrSettings['ssba_custom_linkedin']) ? $arrSettings['ssba_custom_linkedin'] : NULL)  . '" />';
						$htmlShareButtonsForm .= '<input id="upload_linkedin_button" data-ssba-input="ssba_custom_linkedin" class="button customUpload" type="button" value="Upload Image" />';
						$htmlShareButtonsForm .= '</td>';
					$htmlShareButtonsForm .= '</tr>';
					$htmlShareButtonsForm .= '<tr valign="top">';
						$htmlShareButtonsForm .= '<th scope="row" style="width: 120px;"><label>Pinterest:</label></th>';
						$htmlShareButtonsForm .= '<td>';
						$htmlShareButtonsForm .= '<input id="ssba_custom_pinterest" type="text" size="50" name="ssba_custom_pinterest" value="' . (isset($arrSettings['ssba_custom_pinterest']) ? $arrSettings['ssba_custom_pinterest'] : NULL)  . '" />';
						$htmlShareButtonsForm .= '<input id="upload_pinterest_button" data-ssba-input="ssba_custom_pinterest" class="button customUpload" type="button" value="Upload Image" />';
						$htmlShareButtonsForm .= '</td>';
					$htmlShareButtonsForm .= '</tr>';
					$htmlShareButtonsForm .= '<tr valign="top">';
						$htmlShareButtonsForm .= '<th scope="row" style="width: 120px;"><label>Reddit:</label></th>';
						$htmlShareButtonsForm .= '<td>';
						$htmlShareButtonsForm .= '<input id="ssba_custom_reddit" type="text" size="50" name="ssba_custom_reddit" value="' . (isset($arrSettings['ssba_custom_reddit']) ? $arrSettings['ssba_custom_reddit'] : NULL)  . '" />';
						$htmlShareButtonsForm .= '<input id="upload_reddit_button" data-ssba-input="ssba_custom_reddit" class="button customUpload" type="button" value="Upload Image" />';
						$htmlShareButtonsForm .= '</td>';
					$htmlShareButtonsForm .= '</tr>';
					$htmlShareButtonsForm .= '<tr valign="top">';
						$htmlShareButtonsForm .= '<th scope="row" style="width: 120px;"><label>StumbleUpon:</label></th>';
						$htmlShareButtonsForm .= '<td>';
						$htmlShareButtonsForm .= '<input id="ssba_custom_stumbleupon" type="text" size="50" name="ssba_custom_stumbleupon" value="' . (isset($arrSettings['ssba_custom_stumbleupon']) ? $arrSettings['ssba_custom_stumbleupon'] : NULL)  . '" />';
						$htmlShareButtonsForm .= '<input id="upload_stumbleupon_button" data-ssba-input="ssba_custom_stumbleupon" class="button customUpload" type="button" value="Upload Image" />';
						$htmlShareButtonsForm .= '</td>';
					$htmlShareButtonsForm .= '</tr>';
					$htmlShareButtonsForm .= '<tr valign="top">';
						$htmlShareButtonsForm .= '<th scope="row" style="width: 120px;"><label>Tumblr:</label></th>';
						$htmlShareButtonsForm .= '<td>';
						$htmlShareButtonsForm .= '<input id="ssba_custom_tumblr" type="text" size="50" name="ssba_custom_tumblr" value="' . (isset($arrSettings['ssba_custom_tumblr']) ? $arrSettings['ssba_custom_tumblr'] : NULL)  . '" />';
						$htmlShareButtonsForm .= '<input id="upload_tumblr_button" data-ssba-input="ssba_custom_tumblr" class="button customUpload" type="button" value="Upload Image" />';
						$htmlShareButtonsForm .= '</td>';
					$htmlShareButtonsForm .= '</tr>';
					$htmlShareButtonsForm .= '<tr valign="top">';
						$htmlShareButtonsForm .= '<th scope="row" style="width: 120px;"><label>Twitter:</label></th>';
						$htmlShareButtonsForm .= '<td>';
						$htmlShareButtonsForm .= '<input id="ssba_custom_twitter" type="text" size="50" name="ssba_custom_twitter" value="' . (isset($arrSettings['ssba_custom_twitter']) ? $arrSettings['ssba_custom_twitter'] : NULL)  . '" />';
						$htmlShareButtonsForm .= '<input id="upload_twitter_button" data-ssba-input="ssba_custom_twitter" class="button customUpload" type="button" value="Upload Image" />';
						$htmlShareButtonsForm .= '<p class="description">Enter the URLs of your images or upload from here.<br/>Simply leave any blank you do not wish to include.</p></td>';
					$htmlShareButtonsForm .= '</tr>';
				$htmlShareButtonsForm .= '</table>';
				$htmlShareButtonsForm .= '</div>';
				
				// --------- NON-CUSTOM IMAGE SETTINGS ------------ //
				$htmlShareButtonsForm .= '<div id="ssba-image-settings">';
				$htmlShareButtonsForm .= '<table class="form-table">';
					$htmlShareButtonsForm .= '<tr valign="top">';
						$htmlShareButtonsForm .= '<th scope="row" style="width: 120px !important;"><label for="ssba_choices">Include:</label></th>';
						$htmlShareButtonsForm .= '<td class="ssba-include-list available">';
							$htmlShareButtonsForm .= '<span class="include-heading">Available</span>';
							$htmlShareButtonsForm .= '<center><ul id="ssbasort1" class="connectedSortable">';
							 $htmlShareButtonsForm .= getAvailableSSBA($arrSettings['ssba_selected_buttons']);
							$htmlShareButtonsForm .= '</ul></center>';
						$htmlShareButtonsForm .= '</td>';
						$htmlShareButtonsForm .= '<td class="ssba-include-list chosen">';
							$htmlShareButtonsForm .= '<span class="include-heading">Selected</span>';
							$htmlShareButtonsForm .= '<center><ul id="ssbasort2" class="connectedSortable">';
							$htmlShareButtonsForm .= getSelectedSSBA($arrSettings['ssba_selected_buttons']);
							$htmlShareButtonsForm .= '</ul></center>';
						$htmlShareButtonsForm .= '</td>';
					$htmlShareButtonsForm .= '</tr>';
					$htmlShareButtonsForm .= '<tr valign="top">';
						$htmlShareButtonsForm .= '<th scope="row" style="width: 120px !important;"></th>';
						$htmlShareButtonsForm .= '<td colspan=2>';
							$htmlShareButtonsForm .= '<p class="description">Drag, drop and reorder those buttons that you wish to include.</p>';
						$htmlShareButtonsForm .= '</td>';
					$htmlShareButtonsForm .= '</tr>';
				$htmlShareButtonsForm .= '</table>';
				$htmlShareButtonsForm .= '</div>';
			$htmlShareButtonsForm .= '</div>';
			$htmlShareButtonsForm .= '<input type="hidden" name="ssba_selected_buttons" id="ssba_selected_buttons" />';
			
		//------ STYLING TAB ------//
		
		//----- STYLING SETTINGS DIV ------//
		$htmlShareButtonsForm .= '<div id="ssba_settings_styling" style="display: none;">';
			$htmlShareButtonsForm .= '<h2>Style Settings</h2>';
		
			// toggle setting options
			$htmlShareButtonsForm .= '<div id="ssba_toggle_styling" style="margin: 10px 0 20px;">';
			$htmlShareButtonsForm .= 'Toggle between <a href="javascript:;" id="ssba_button_normal_settings">assisted styling</a> and <a href="javascript:;" id="ssba_button_custom_styles">custom CSS</a>.';
			$htmlShareButtonsForm .= '</div>';
		
			// normal settings options
			$htmlShareButtonsForm .= '<div id="ssba_normal_settings" ' . ($arrSettings['ssba_custom_styles'] != '' ? 'style="display: none;"' : NULL) . '>';
				$htmlShareButtonsForm .= '<table class="form-table">';
					$htmlShareButtonsForm .= '<tr><td><h3>Buttons</h3></td></tr>';
					$htmlShareButtonsForm .= '<tr valign="top">';
						$htmlShareButtonsForm .= '<th scope="row" style="width: 120px;"><label for="ssba_size">Button Size:&nbsp;</label></th>';
						$htmlShareButtonsForm .= '<td><input type="number" name="ssba_size" id="ssba_size" step="1" min="10" max="50" value="' . $arrSettings['ssba_size'] . '"><span class="description">px</span>';
						$htmlShareButtonsForm .= '<p class="description">Set the width of your buttons in pixels</p></td>';
						$htmlShareButtonsForm .= '</input></td>';
					$htmlShareButtonsForm .= '</tr>';
					$htmlShareButtonsForm .= '<tr valign="top">';
						$htmlShareButtonsForm .= '<th scope="row" style="width: 120px;"><label for="ssba_align">Alignment:&nbsp;</label></th>';
						$htmlShareButtonsForm .= '<td><select name="ssba_align" id="ssba_align">';
						$htmlShareButtonsForm .= '<option ' . ($arrSettings['ssba_align'] == 'left'   ? 'selected="selected"' : NULL) . ' value="left">Left</option>';
						$htmlShareButtonsForm .= '<option ' . ($arrSettings['ssba_align'] == 'center' ? 'selected="selected"' : NULL) . ' value="center">Center</option>';
						$htmlShareButtonsForm .= '</select>';
						$htmlShareButtonsForm .= '<p class="description">Center your buttons if desired</p></td>';
					$htmlShareButtonsForm .= '</tr>';
					$htmlShareButtonsForm .= '<tr valign="top">';
						$htmlShareButtonsForm .= '<th scope="row" style="width: 120px;"><label for="ssba_padding">Padding:&nbsp;</label></th>';
						$htmlShareButtonsForm .= '<td><input type="number" name="ssba_padding" id="ssba_padding" step="1" min="0" value="' . $arrSettings['ssba_padding'] . '" /><span class="description">px</span>';
						$htmlShareButtonsForm .= '<p class="description">Apply some space around your images</p></td>';
					$htmlShareButtonsForm .= '</tr>';
					$htmlShareButtonsForm .= '<tr><td><h3>Share Text</h3></td></tr>';
					$htmlShareButtonsForm .= '<tr valign="top">';
						$htmlShareButtonsForm .= '<th scope="row" style="width: 120px;"><label for="ssba_font_color">Font Colour:&nbsp;</label></th>';
						$htmlShareButtonsForm .= '<td><input type="text" name="ssba_font_color" id="ssba_font_color" value="' . $arrSettings['ssba_font_color'] . '">';
						$htmlShareButtonsForm .= '</input>';
						$htmlShareButtonsForm .= '<p class="description">Choose the colour of your share text</p></td>';
					$htmlShareButtonsForm .= '</tr>';
					$htmlShareButtonsForm .= '<tr valign="top">';
						$htmlShareButtonsForm .= '<th scope="row" style="width: 120px;"><label for="ssba_font_family">Font Family:&nbsp;</label></th>';
						$htmlShareButtonsForm .= '<td><select name="ssba_font_family" id="ssba_font_family">';
						$htmlShareButtonsForm .= '<option ' . ($arrSettings['ssba_font_family'] == 'Reenie Beanie' ? 'selected="selected"' : NULL) . ' value="Reenie Beanie">Reenie Beanie</option>';
						$htmlShareButtonsForm .= '<option ' . ($arrSettings['ssba_font_family'] == 'Indie Flower'  ? 'selected="selected"' : NULL) . ' value="Indie Flower">Indie Flower</option>';
						$htmlShareButtonsForm .= '<option ' . ($arrSettings['ssba_font_family'] == '' 			   ? 'selected="selected"' : NULL) . ' value="">Inherit from my website</option>';
						$htmlShareButtonsForm .= '</select>';
						$htmlShareButtonsForm .= '<p class="description">Choose a font available or inherit the font from your website</p></td>';
					$htmlShareButtonsForm .= '</tr>';
					$htmlShareButtonsForm .= '<tr valign="top">';
						$htmlShareButtonsForm .= '<th scope="row" style="width: 120px;"><label for="ssba_font_size">Font Size:&nbsp;</label></th>';
						$htmlShareButtonsForm .= '<td><input type="number" name="ssba_font_size" id="ssba_font_size" value="' . $arrSettings['ssba_font_size'] . '"><span class="description">px</span>';
						$htmlShareButtonsForm .= '</input>';
						$htmlShareButtonsForm .= '<p class="description">Set the size of the share text in pixels</p></td>';
					$htmlShareButtonsForm .= '</tr>';
					$htmlShareButtonsForm .= '<tr valign="top">';
						$htmlShareButtonsForm .= '<th scope="row" style="width: 120px;"><label for="ssba_font_weight">Font Weight:&nbsp;</label></th>';
						$htmlShareButtonsForm .= '<td><select name="ssba_font_weight" id="ssba_font_weight">';
						$htmlShareButtonsForm .= '<option value="">Please select...</option>';
						$htmlShareButtonsForm .= '<option ' . ($arrSettings['ssba_font_weight'] == 'bold'   ? 'selected="selected"' : NULL) . ' value="bold">Bold</option>';
						$htmlShareButtonsForm .= '<option ' . ($arrSettings['ssba_font_weight'] == 'normal' ? 'selected="selected"' : NULL) . ' value="normal">Normal</option>';
						$htmlShareButtonsForm .= '<option ' . ($arrSettings['ssba_font_weight'] == 'light' ? 'selected="selected"' : NULL) . ' value="light">Light</option>';
						$htmlShareButtonsForm .= '</select>';
						$htmlShareButtonsForm .= '<p class="description">Set the weight of the share text</p></td>';
					$htmlShareButtonsForm .= '</tr>';
					$htmlShareButtonsForm .= '<tr valign="top">';
						$htmlShareButtonsForm .= '<th scope="row" style="width: 120px;"><label for="ssba_text_placement">Text placement:&nbsp;</label></th>';
						$htmlShareButtonsForm .= '<td><select name="ssba_text_placement" id="ssba_text_placement">';
						$htmlShareButtonsForm .= '<option value="">Please select...</option>';
						$htmlShareButtonsForm .= '<option ' . ($arrSettings['ssba_text_placement'] == 'above'   ? 'selected="selected"' : NULL) . ' value="above">Above</option>';
						$htmlShareButtonsForm .= '<option ' . ($arrSettings['ssba_text_placement'] == 'left' 	? 'selected="selected"' : NULL) . ' value="left">Left</option>';
						$htmlShareButtonsForm .= '<option ' . ($arrSettings['ssba_text_placement'] == 'right' 	? 'selected="selected"' : NULL) . ' value="right">Right</option>';
						$htmlShareButtonsForm .= '<option ' . ($arrSettings['ssba_text_placement'] == 'below' 	? 'selected="selected"' : NULL) . ' value="below">Below</option>';
						$htmlShareButtonsForm .= '</select>';
						$htmlShareButtonsForm .= '<p class="description">Choose where you want your text to be displayed, in relation to the buttons</p></td>';
					$htmlShareButtonsForm .= '</tr>';
					$htmlShareButtonsForm .= '<tr><td><h3>Container</h3></td></tr>';
					$htmlShareButtonsForm .= '<tr valign="top">';
						$htmlShareButtonsForm .= '<th scope="row" style="width: 120px;"><label for="ssba_div_padding">Padding:&nbsp;</label></th>';
						$htmlShareButtonsForm .= '<td><input type="number" name="ssba_div_padding" id="ssba_div_padding" value="' . $arrSettings['ssba_div_padding'] . '">';
						$htmlShareButtonsForm .= '</input>';
						$htmlShareButtonsForm .= '<p class="description">Add some padding to your share container</p></td>';
					$htmlShareButtonsForm .= '</tr>';
					$htmlShareButtonsForm .= '<tr valign="top">';
						$htmlShareButtonsForm .= '<th scope="row" style="width: 120px;"><label for="ssba_div_background">Background Colour:&nbsp;</label></th>';
						$htmlShareButtonsForm .= '<td><input type="text" name="ssba_div_background" id="ssba_div_background" value="' . $arrSettings['ssba_div_background'] . '">';
						$htmlShareButtonsForm .= '</input>';
						$htmlShareButtonsForm .= '<p class="description">Choose the colour of your share container</p></td>';
					$htmlShareButtonsForm .= '</tr>';
					$htmlShareButtonsForm .= '<tr valign="top">';
						$htmlShareButtonsForm .= '<th scope="row" style="width: 120px;"><label for="ssba_div_border">Border Colour:&nbsp;</label></th>';
						$htmlShareButtonsForm .= '<td><input type="text" name="ssba_div_border" id="ssba_div_border" value="' . $arrSettings['ssba_div_border'] . '">';
						$htmlShareButtonsForm .= '</input>';
						$htmlShareButtonsForm .= '<p class="description">Choose the colour of your share container border</p></td>';
					$htmlShareButtonsForm .= '</tr>';
					$htmlShareButtonsForm .= '<tr valign="top">';
						$htmlShareButtonsForm .= '<th scope="row" style="width: 120px;"><label for="ssba_border_width">Border Width:&nbsp;</label></th>';
						$htmlShareButtonsForm .= '<td><input type="number" name="ssba_border_width" id="ssba_border_width" value="' . $arrSettings['ssba_border_width'] . '"><span class="description">px</span>';
						$htmlShareButtonsForm .= '</input>';
						$htmlShareButtonsForm .= '<p class="description">Set the width of the share container border</p></td>';
					$htmlShareButtonsForm .= '</tr>';
					$htmlShareButtonsForm .= '<tr valign="top">';
						$htmlShareButtonsForm .= '<th scope="row" style="width: 120px;"><label>Container Corners:&nbsp;</label></th>';
						$htmlShareButtonsForm .= '<td>';
						$htmlShareButtonsForm .= 'Round the corners&nbsp;<input type="checkbox" name="ssba_div_rounded_corners" id="ssba_div_rounded_corners" ' . ($arrSettings['ssba_div_rounded_corners'] 	== 'Y'   ? 'checked' : NULL) . ' value="Y" style="margin-right: 10px;" />';
						$htmlShareButtonsForm .= '<p class="description">Check this box to round the corners of the share container</p></td>';
					$htmlShareButtonsForm .= '</tr>';
				$htmlShareButtonsForm .= '</table>';
			$htmlShareButtonsForm .= '</div>';
				
			// custom style field
			$htmlShareButtonsForm .= '<div id="ssba_option_custom_css" ' . ($arrSettings['ssba_custom_styles'] == '' ? 'style="display: none;"' : NULL) . '>';
				$htmlShareButtonsForm .= '<table>';
					$htmlShareButtonsForm .= '<tr valign="top">';
						$htmlShareButtonsForm .= '<th scope="row" style="width: 120px;"><label for="ssba_custom_styles">Custom CSS:&nbsp;</label></th>';
						$htmlShareButtonsForm .= '<td>';
						$htmlShareButtonsForm .= '<textarea name="ssba_custom_styles" id="ssba_custom_styles" rows="20" cols="50">' . $arrSettings['ssba_custom_styles'] . '</textarea>';
						$htmlShareButtonsForm .= '<td>';
							$htmlShareButtonsForm .= <<<CODE
													<h3>Default CSS</h3>
													#ssba img</br>	
													{ 	</br>
														width: 35px;</br>
														padding: 6px;</br>
														border:  0;</br>
														box-shadow: none !important;</br>
														display: inline;</br>
														vertical-align: middle;</br>
													}</br></br>
													#ssba, #ssba a		</br>
													{</br>
														font-family: Indie Flower;</br>
														font-size: 	20px;</br>
													}
CODE;
						$htmlShareButtonsForm .= '</td>';
					$htmlShareButtonsForm .= '<tr>';
						$htmlShareButtonsForm .= '<td>';
						$htmlShareButtonsForm .= '</td>';
						$htmlShareButtonsForm .= '<td colspan=2>';
							$htmlShareButtonsForm .= '<p class="description">Note that entering any text into the &#39;Custom styles&#39; box will automatically override any other style settings on this page.<br/>The div id is ssba.</p>';
						$htmlShareButtonsForm .= '</td>';
					$htmlShareButtonsForm .= '</tr>';
				$htmlShareButtonsForm .= '</table>';
			$htmlShareButtonsForm .= '</div>';
			
		// close styling tab
		$htmlShareButtonsForm .= '</div>';
		
		//------ COUNTERS TAB ------//
		
		//----- COUNTERS SETTINGS DIV ------//
		$htmlShareButtonsForm .= '<div id="ssba_settings_counters" style="display: none;">';
			$htmlShareButtonsForm .= '<h2>Counter Settings</h2>';
		
			// toggle setting options
			$htmlShareButtonsForm .= '<div id="ssba_toggle_styling" style="margin: 10px 0 20px;">';
			$htmlShareButtonsForm .= '<p>Toggle between <a href="javascript:;" id="ssba_counter_normal_settings">assisted styling</a> and <a href="javascript:;" id="ssba_counter_custom_styles">custom CSS</a>.</p>';
			$htmlShareButtonsForm .= '</div>';
			
			// activate option
			$htmlShareButtonsForm .= '<table class="form-table">';
				$htmlShareButtonsForm .= '<tr valign="top">';
					$htmlShareButtonsForm .= '<th scope="row" style="width: 120px;"><label>Share Count:</label></th>';
					$htmlShareButtonsForm .= '<td>';
					$htmlShareButtonsForm .= 'Show&nbsp;<input type="checkbox" name="ssba_show_share_count" id="ssba_show_share_count" ' . ($arrSettings['ssba_show_share_count'] == 'Y'  ? 'checked' : NULL) . ' value="Y" style="margin-right: 10px;" />';
					$htmlShareButtonsForm .= '<p class="description">Check the box if you wish to display a share count for those sites that it is available.</br>Note that enabling this option will slow down the loading of any pages that use share buttons.</p></td>';
				$htmlShareButtonsForm .= '</tr>';
				$htmlShareButtonsForm .= '<tr valign="top">';
					$htmlShareButtonsForm .= '<th scope="row" style="width: 120px;"><label>Show Once:</label></th>';
					$htmlShareButtonsForm .= '<td>';
					$htmlShareButtonsForm .= 'Show only on posts and pages&nbsp;<input type="checkbox" name="ssba_share_count_once" id="ssba_share_count_once" ' . ($arrSettings['ssba_share_count_once'] == 'Y'  ? 'checked' : NULL) . ' value="Y" style="margin-right: 10px;" />';
					$htmlShareButtonsForm .= '<p class="description">This option is recommended, it deactivates share counts for categories and archives allowing them to load more quickly</p></td>';
				$htmlShareButtonsForm .= '</tr>';
			$htmlShareButtonsForm .= '</table>';
		
			// normal counter settings options
			$htmlShareButtonsForm .= '<div id="ssba_counter_settings" ' . ($arrSettings['ssba_share_count_css'] != '' ? 'style="display: none;"' : NULL) . '>';
				$htmlShareButtonsForm .= '<table class="form-table">';
					$htmlShareButtonsForm .= '<tr valign="top">';
						$htmlShareButtonsForm .= '<th scope="row" style="width: 120px;"><label for="ssba_share_count_style">Counters Style:&nbsp;</label></th>';
						$htmlShareButtonsForm .= '<td><select name="ssba_share_count_style" id="ssba_share_count_style">';
						$htmlShareButtonsForm .= '<option ' . ($arrSettings['ssba_share_count_style'] == 'default'  ? 'selected="selected"' : NULL) . ' value="default">Default</option>';
						$htmlShareButtonsForm .= '<option ' . ($arrSettings['ssba_share_count_style'] == 'white' 	? 'selected="selected"' : NULL) . ' value="white">White</option>';
						$htmlShareButtonsForm .= '<option ' . ($arrSettings['ssba_share_count_style'] == 'blue' 	? 'selected="selected"' : NULL) . ' value="blue">Blue</option>';
						$htmlShareButtonsForm .= '</select>';
						$htmlShareButtonsForm .= '<p class="description">Pick a setting to style the share counters</p></td>';
					$htmlShareButtonsForm .= '</tr>';
				$htmlShareButtonsForm .= '</table>';
			$htmlShareButtonsForm .= '</div>';
				
			// custom counter style field
			$htmlShareButtonsForm .= '<div id="ssba_counter_custom_css" ' . ($arrSettings['ssba_share_count_css'] == '' ? 'style="display: none;"' : NULL) . '>';
				$htmlShareButtonsForm .= '<table>';
					$htmlShareButtonsForm .= '<tr valign="top">';
						$htmlShareButtonsForm .= '<th scope="row" style="width: 120px;"><label for="ssba_share_count_css">Custom CSS:&nbsp;</label></th>';
						$htmlShareButtonsForm .= '<td>';
						$htmlShareButtonsForm .= '<textarea name="ssba_share_count_css" id="ssba_share_count_css" rows="20" cols="50">' . $arrSettings['ssba_share_count_css'] . '</textarea>';
						$htmlShareButtonsForm .= '<td>';
							$htmlShareButtonsForm .= <<<CODE
													<h3>Default CSS</h3>
													.ssba_sharecount:after, .ssba_sharecount:before {</br>
														right: 100%;</br>
														border: solid transparent;</br>
														content: " ";</br>
														height: 0;</br>
														width: 0;</br>
														position: absolute;</br>
														pointer-events: none;</br>
													}</br>
													.ssba_sharecount:after {</br>
														border-color: rgba(224, 221, 221, 0);</br>
														border-right-color: #f5f5f5;</br>
														border-width: 5px;</br>
														top: 50%;</br>
														margin-top: -5px;</br>
													}
													.ssba_sharecount:before {</br>
														border-color: rgba(85, 94, 88, 0);</br>
														border-right-color: #e0dddd;</br>
														border-width: 6px;</br>
														top: 50%;</br>
														margin-top: -6px;</br>
													}</br>
													.ssba_sharecount {</br>
														font: 11px Arial, Helvetica, sans-serif;</br>
														color: #555e58;</br>
														padding: 5px;</br>
														-khtml-border-radius: 6px;</br>
														-o-border-radius: 6px;</br>
														-webkit-border-radius: 6px;</br>
														-moz-border-radius: 6px;</br>
														border-radius: 6px;</br>
														position: relative;</br>
														background: #f5f5f5;</br>
														border: 1px solid #e0dddd;</br>
													}
CODE;
						$htmlShareButtonsForm .= '</td>';
					$htmlShareButtonsForm .= '<tr>';
						$htmlShareButtonsForm .= '<td>';
						$htmlShareButtonsForm .= '</td>';
						$htmlShareButtonsForm .= '<td colspan=2>';
							$htmlShareButtonsForm .= '<p class="description">Note that entering any text into the &#39;Custom styles&#39; box will automatically override any other style settings on this page.<br/>The share count class is ssba_sharecount.</p>';
						$htmlShareButtonsForm .= '</td>';
					$htmlShareButtonsForm .= '</tr>';
				$htmlShareButtonsForm .= '</table>';
			$htmlShareButtonsForm .= '</div>';
			
		// close counters tab
		$htmlShareButtonsForm .= '</div>';
		
		//------ ADVANCED TAB ------//
		
		$htmlShareButtonsForm .= '<div id="ssba_settings_advanced" style="display: none;">';
			$htmlShareButtonsForm .= '<h2>Advanced Settings</h2>';
			$htmlShareButtonsForm .= '<table class="form-table">';
				$htmlShareButtonsForm .= '<tr><td><h3>General</h3></td></tr>';
				$htmlShareButtonsForm .= '<tr valign="top">';
					$htmlShareButtonsForm .= '<th scope="row" style="width: 120px;"><label>Links:</label></th>';
					$htmlShareButtonsForm .= '<td>';
					$htmlShareButtonsForm .= 'Open links in a new window&nbsp;<input type="checkbox" name="ssba_share_new_window" id="ssba_share_new_window" ' . ($arrSettings['ssba_share_new_window'] == 'Y'   ? 'checked' : NULL) . ' value="Y" />';
					$htmlShareButtonsForm .= '<p class="description">Unchecking this box will make links open in the same window</p></td>';
				$htmlShareButtonsForm .= '</tr>';
				$htmlShareButtonsForm .= '<tr valign="top">';
					$htmlShareButtonsForm .= '<th scope="row" style="width: 120px;"><label>Share Text Link:</label></th>';
					$htmlShareButtonsForm .= '<td>';
					$htmlShareButtonsForm .= 'Share text links to simplesharebuttons.com&nbsp;<input type="checkbox" name="ssba_link_to_ssb" id="ssba_link_to_ssb" ' . ($arrSettings['ssba_link_to_ssb'] == 'Y'   ? 'checked' : NULL) . ' value="Y" />';
					$htmlShareButtonsForm .= '<p class="description">Leave this checked if you are feeling kind &#58;&#41;</p></td>';
				$htmlShareButtonsForm .= '</tr>';
				$htmlShareButtonsForm .= '<tr><td><h3>Email</h3></td></tr>';
				$htmlShareButtonsForm .= '<tr valign="top">';
					$htmlShareButtonsForm .= '<th scope="row" style="width: 120px;"><label for="ssba_email_message">Email Text:&nbsp;</label></th>';
					$htmlShareButtonsForm .= '<td><input type="text" name="ssba_email_message" style="width: 250px;" id="ssba_email_message" value="' . $arrSettings['ssba_email_message'] . '" />';
					$htmlShareButtonsForm .= '<p class="description">Add some text included in the email when people share that way</p></td>';
				$htmlShareButtonsForm .= '</tr>';
				$htmlShareButtonsForm .= '<tr><td><h3>Twitter</h3></td></tr>';
				$htmlShareButtonsForm .= '<tr valign="top">';
					$htmlShareButtonsForm .= '<th scope="row" style="width: 120px;"><label for="ssba_twitter_text">Twitter Text:&nbsp;</label></th>';
					$htmlShareButtonsForm .= '<td><input type="text" name="ssba_twitter_text" style="width: 250px;" id="ssba_twitter_text" value="' . $arrSettings['ssba_twitter_text'] . '" />';
					$htmlShareButtonsForm .= '<p class="description">Add some custom text for when people share via Twitter</p></td>';
				$htmlShareButtonsForm .= '</tr>';
				$htmlShareButtonsForm .= '<tr><td><h3>Flattr</h3></td></tr>';
				$htmlShareButtonsForm .= '<tr valign="top">';
					$htmlShareButtonsForm .= '<th scope="row" style="width: 120px;"><label for="ssba_flattr_user_id">Flattr User ID:&nbsp;</label></th>';
					$htmlShareButtonsForm .= '<td><input type="text" name="ssba_flattr_user_id" id="ssba_flattr_user_id" value="' . $arrSettings['ssba_flattr_user_id'] . '" />';
					$htmlShareButtonsForm .= '<p class="description">Enter your Flattr ID, e.g. davidsneal</p></td>';
				$htmlShareButtonsForm .= '</tr>';
				$htmlShareButtonsForm .= '<tr valign="top">';
					$htmlShareButtonsForm .= '<th scope="row" style="width: 120px;"><label for="ssba_flattr_url">Flattr URL:&nbsp;</label></th>';
					$htmlShareButtonsForm .= '<td><input type="text" name="ssba_flattr_url" style="width: 250px;" id="ssba_flattr_url" value="' . $arrSettings['ssba_flattr_url'] . '" />';
					$htmlShareButtonsForm .= '<p class="description">This option is perfect for dedicated sites, e.g. http://www.simplesharebuttons.com</p></td>';
				$htmlShareButtonsForm .= '</tr>';
				$htmlShareButtonsForm .= '<tr><td><h3>Buffer</h3></td></tr>';
				$htmlShareButtonsForm .= '<tr valign="top">';
					$htmlShareButtonsForm .= '<th scope="row" style="width: 120px;"><label for="ssba_buffer_text">Custom Buffer Text:&nbsp;</label></th>';
					$htmlShareButtonsForm .= '<td><input type="text" name="ssba_buffer_text" style="width: 250px;" id="ssba_buffer_text" value="' . $arrSettings['ssba_buffer_text'] . '" />';
					$htmlShareButtonsForm .= '<p class="description">Add some custom text for when people share via Buffer</p></td>';
				$htmlShareButtonsForm .= '</tr>';
			$htmlShareButtonsForm .= '</table>';
		$htmlShareButtonsForm .= '</div>';
		
		// save button
		$htmlShareButtonsForm .= '<table class="form-table">';
				$htmlShareButtonsForm .= '<tr valign="top">';
					$htmlShareButtonsForm .= '<td><input type="submit" value="Save changes" id="submit" class="button button-primary"/></td>';
				$htmlShareButtonsForm .= '</tr>';
			$htmlShareButtonsForm .= '</table>';
		$htmlShareButtonsForm .= '</form>';
		
	// close form cell and open author one
	$htmlShareButtonsForm .= '</td><td style="vertical-align: top;">';	
	
	// author div
	$htmlShareButtonsForm .= '	<div class="ssba-box ssba-shadow">
									<div class="ssba-box-content">Quite a fair amount of time and effort has gone into Simple Share Buttons, any donations would be greatly appreciated, it will help me continue to be able to offer this for free!<p></p>
										<div class="author-shortcodes">
											<div class="author-inner">
												<div class="author-image">
													<img src="' . plugins_url() . '/simple-share-buttons-adder/images/david.jpg" style="float: left; margin-right: 10px;" alt="">
													<div class="author-overlay"></div>
												</div> <!-- .author-image --> 
												<div class="author-info">
													<a href="http://www.davidsneal.co.uk" target="_blank">David Neal</a> – Married, father of one, with an (sometimes unhealthy) obsession with websites, coding and gaming. This plugin and its website has been funded by myself.
												</div> <!-- .author-info -->
											</div> <!-- .author-inner -->
										</div> <!-- .author-shortcodes -->
									</div></br>
									<center><table>
										<tr>
											<td><form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
													<input type="hidden" name="cmd" value="_s-xclick">
													<input type="hidden" name="hosted_button_id" value="4TLXT69XCP3B8">
													<input type="image" src="' . plugins_url() . '/simple-share-buttons-adder/images/paypal.png" border="0" name="submit" alt="PayPal – The safer, easier way to pay online.">
													<img alt="" border="0" src="' . plugins_url() . '/simple-share-buttons-adder/images/paypal.png" width="1" height="1">
												</form>
											<td><a href="http://flattr.com/thing/1328301/Simple-Share-Buttons" target="_blank"><img class="ssba-flattr-this" src="' . plugins_url() . '/simple-share-buttons-adder/images/flattr.png" alt="Flattr this" title="Flattr this" border="0" /></a>
											<td><a href="https://www.freelancer.co.uk/u/davidsneal.html" target="_blank"><img src="' . plugins_url() . '/simple-share-buttons-adder/images/freelancer.png" title="Hire me on Freelancer!" /></a>
										</tr>
									</table>
									<p>You can show your support for <strong>free</strong> too&#33;</p>
									<table class="centerme">
										<tr>
											<td><a href="http://wordpress.org/support/view/plugin-reviews/simple-share-buttons-adder" target="_blank" title="Rate 5 Star">Rate the plugin<br/><img src="' . plugins_url() . '/simple-share-buttons-adder/images/stars.png"></a></br></td>
										<tr>
											<td><a href="http://twitter.com/share?url=http://www.simplesharebuttons.com&text=Simple Share Buttons" target="_blank" title="Tweet">Tweet about Simple Share Buttons<br/><img src="' . plugins_url() . '/simple-share-buttons-adder/images/tweet.png"></a></td>
										<tr>
											<td><a href="http://www.facebook.com/sharer.php?u=http://www.simplesharebuttons.com" target="_blank" title="Share on Facebook">Share on Facebook<br/><img src="' . plugins_url() . '/simple-share-buttons-adder/images/share.png"></a></td>
										</tr>
									</table>
									<div class="et-box et-bio">
										<div class="et-box-content">
										<h2>Make your own custom&#45;coloured buttons for free!</h2>
										<h3>Visit <a href="http://make.simplesharebuttons.com" target="blank">make.simplesharebuttons.com</a></h3>
									</center></div></div>
								</div>';

	// close author cell and close table
	$htmlShareButtonsForm .= '</td></tr></table>';							
								
	// close #wrap	
	$htmlShareButtonsForm .= '</div>';
	
	echo $htmlShareButtonsForm;
}

// get an html formatted of currently selected and ordered buttons
function getSelectedSSBA($strSelectedSSBA) {

	// variables
	$htmlSelectedList = '';
	$arrSelectedSSBA = '';

	// if there are some selected buttons
	if ($strSelectedSSBA != '') {
	
		// explode saved include list and add to a new array
		$arrSelectedSSBA = explode(',', $strSelectedSSBA);
		
		// check if array is not empty
		if ($arrSelectedSSBA != '') {
		
			// for each included button
			foreach ($arrSelectedSSBA as $strSelected) {
			
				// add a list item for each selected option
				$htmlSelectedList .= '<li id="' . $strSelected . '">' . $strSelected . '</li>';
			}
		}
	}
	
	// return html list options
	return $htmlSelectedList;
}

// get an html formatted of currently selected and ordered buttons
function getAvailableSSBA($strSelectedSSBA) {

	// variables
	$htmlAvailableList = '';
	$arrSelectedSSBA = '';
	
	// explode saved include list and add to a new array
	$arrSelectedSSBA = explode(',', $strSelectedSSBA);
	
	// create array of all available buttons
	$arrAllAvailableSSBA = array('buffer', 'diggit', 'email', 'facebook', 'flattr', 'google', 'linkedin', 'pinterest', 'reddit', 'stumbleupon', 'tumblr', 'twitter');
	
	// explode saved include list and add to a new array
	$arrAvailableSSBA = array_diff($arrAllAvailableSSBA, $arrSelectedSSBA);
	
	// check if array is not empty
	if ($arrSelectedSSBA != '') {
	
		// for each included button
		foreach ($arrAvailableSSBA as $strAvailable) {
		
			// add a list item for each available option
			$htmlAvailableList .= '<li id="' . $strAvailable . '">' . $strAvailable . '</li>';
		}
	}
	
	// return html list options
	return $htmlAvailableList;
}

?>