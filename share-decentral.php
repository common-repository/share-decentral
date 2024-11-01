<?php
/**
 * Plugin Name: Share Decentral
 * Plugin URI: http://wordpress.org/plugins/share-decentral/
 * Description: The original Facebook, Twitter and Google+ Share Buttons, but without external connentions. Inserts the Buttons after the post content. Simple plugin, pure HTML & CSS, no JavaScript.
 * Version: 1.0
 * Author: NodeCode
 * Author URI: http://nodecode.de/
 * License: GPLv2 or later
 */
 
/*  Copyright 2013 NodeCode (email : info@nodecode.de)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as 
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

// default
global $share_decentral_auto;
$share_decentral_auto = true;

// Translation
load_plugin_textdomain('share-decentral', false, basename( dirname( __FILE__ ) ) . '/languages');

// Style 
wp_register_style('share-decentral', plugins_url() . '/share-decentral/style.css');
wp_enqueue_style('share-decentral');

// Template (the_share_decentral)
function the_share_decentral($class) {
	echo share_decentral($class);
}

// After Post Content
function add_post_content($content) {
	global $share_decentral_auto;
	if($share_decentral_auto != false && !is_feed() && !is_home() && !is_archive() && !is_search()) {
		// After Content
		$content .= share_decentral();
	}
	return $content;
}
add_filter('the_content', 'add_post_content');

// Return Buttons (share_decentral)
function share_decentral($class = '') {
	// Tags
	$posttags = get_the_tags();
	if ($posttags) {
		foreach($posttags as $tag) {
			$hashtags .= str_replace('.', '', $tag->name). ','; // remove dots
		}
	}
	// HTML-Code
	return '<div class="share-decentral'. ($class != '' ? (' '. $class) : ''). '">'.
		// Facebook
			'<div class="share-decentral-fb">
				<a class="share-decentral-fb-2" href="http://www.facebook.com/sharer.php?u='. urlencode(get_permalink()). '&amp;t=' . urlencode(get_the_title()). '" target="_blank" rel="nofollow">
					<div class="share-decentral-fb-3">
						<div class="share-decentral-fb-4">
							<div class="share-decentral-fb-5">
								<i class="share-decentral-fb-6"></i>
							</div>
						</div><span class="share-decentral-fb-7">'. __('Share', 'share-decentral'). '</span>
					</div>
				</a>
			</div>'.
		// Twitter
			'<a class="share-decentral-tw" href="http://twitter.com/intent/tweet?url='. urlencode(get_permalink()). '&amp;text='. urlencode(get_the_title()). '&amp;hashtags='. urlencode($hashtags). '" target="_blank" rel="nofollow"><i class="share-decentral-tw-2"></i><span class="share-decentral-tw-3">Tweet</span></a>'.
		// Google+
			'<a class="share-decentral-gp" href="https://plus.google.com/share?url='. urlencode(get_permalink()). '" target="_blank" rel="nofollow"><div class="share-decentral-gp-2"><div class="share-decentral-gp-3"><div class="share-decentral-gp-4"><svg version="1.1" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid meet" width="30px" height="18px" viewBox="-5 -3 30 18" class="share-decentral-gp-5"><path d="m13,3-1,0 0,2-2,0 0,1 2,0 0,2 1,0 0-2 2,0 0-1-2,0zm3-1 0,1 1.525,0 0,7 1.475,0 0-9z" class="share-decentral-gp-6"></path><path d="m5.286,4.594c.6738-.7371 .4033-1.8668 .0644-2.6978-.3285-.8508-1.2405-1.6446-2.1986-1.2906-1.0081,.2923-1.1732,1.5074-.9326,2.3834 .2018,1.0002 .9514,2.1602 2.1087,2.0389 .3526-.0415 .6989-.1886 .9582-.4338zm-1.07,2.994c-.9808,.1331-2.2146,.2197-2.7558,1.1827-.4634,.903 .1368,2.0029 1.0462,2.3257 1.0948,.423 2.4643,.5029 3.4766-.1714 .7996-.5457 .782-1.7676 .0953-2.3999-.4467-.4296-.9761-.9594-1.6354-.928l-.1604-.0062-.0665-.0029zm2.08-6.813c.9768,.8909 1.1759,2.5831 .202,3.5514-.4793,.4835-1.6627,1.1022-.9829,1.9012 .8682,.745 2.0921,1.3705 2.1724,2.6504 .1322,1.4396-1.152,2.5382-2.4389,2.8743-1.3767,.3557-2.9341,.3999-4.2257-.2652-.9283-.463-1.2487-1.6423-.8776-2.5713 .4529-1.2574 1.8947-1.6648 3.0933-1.8019 .455-.0565 1.0058,.0692 .574-.4763-.3008-.5051 .4956-1.4305-.4106-1.1547-1.3817,.0793-2.7503-1.0582-2.719-2.482-.0055-1.4944 1.3204-2.6506 2.7222-2.8791 1.2321-.1995 2.4871-.0819 3.7303-.1139 .2139,.0229 .6535-.0445 .736,.031-.2764,.2346-.5192,.5532-.8164,.736-.253,0-.506,0-.7591,0z" class="share-decentral-gp-7"></path><path d="m5.286,4.594c.6738-.7371 .4033-1.8668 .0644-2.6978-.3285-.8508-1.2405-1.6446-2.1986-1.2906-1.0081,.2923-1.1732,1.5074-.9326,2.3834 .2018,1.0002 .9514,2.1602 2.1087,2.0389 .3526-.0415 .6989-.1886 .9582-.4338zm-1.07,2.994c-.9808,.1331-2.2146,.2197-2.7558,1.1827-.4634,.903 .1368,2.0029 1.0462,2.3257 1.0948,.423 2.4643,.5029 3.4766-.1714 .7996-.5457 .782-1.7676 .0953-2.3999-.4467-.4296-.9761-.9594-1.6354-.928l-.1604-.0062-.0665-.0029zm2.08-6.813c.9768,.8909 1.1759,2.5831 .202,3.5514-.4793,.4835-1.6627,1.1022-.9829,1.9012 .8682,.745 2.0921,1.3705 2.1724,2.6504 .1322,1.4396-1.152,2.5382-2.4389,2.8743-1.3767,.3557-2.9341,.3999-4.2257-.2652-.9283-.463-1.2487-1.6423-.8776-2.5713 .4529-1.2574 1.8947-1.6648 3.0933-1.8019 .455-.0565 1.0058,.0692 .574-.4763-.3008-.5051 .4956-1.4305-.4106-1.1547-1.3817,.0793-2.7503-1.0582-2.719-2.482-.0055-1.4944 1.3204-2.6506 2.7222-2.8791 1.2321-.1995 2.4871-.0819 3.7303-.1139 .2139,.0229 .6535-.0445 .736,.031-.2764,.2346-.5192,.5532-.8164,.736-.253,0-.506,0-.7591,0z" class="share-decentral-gp-8"></path></svg><div class="share-decentral-gp-9"></div></div></div><div class="share-decentral-gp-10"><svg version="1.1" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid meet" width="18px" height="18px" viewBox="-2 -2 18 18" class="share-decentral-gp-11"><g class="share-decentral-gp-12" fill="#aaaaaa" transform="rotate(0,7,7)"><path d="M5.5,1.5h3v4h4v3h-4v4h-3v-4h-4v-3h4z" class="share-decentral-gp-13"><animateTransform attributeName="transform" attributeType="XML" type="rotate" from="0 7 7" to="360 7 7" dur="2s" repeatCount="indefinite" class="share-decentral-gp-14"></animateTransform></path></g></svg><div class="share-decentral-gp-15"></div></div><div class="share-decentral-gp-16"><svg version="1.1" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid meet" width="16px" height="18px" viewBox="0 -2.571428571428571 20 23.142857142857142" class="share-decentral-gp-17"><path fill="#DD4B39" d="m19.8059,16.041-8.74-15.404c-.223-.394-.635-.637-1.078-.637-.443,0-.855,.243-1.078,.637l-8.739,15.404c-.227,.396-.227,.9-.005,1.299 .223,.398 .637,.66 1.283,.66h17.279c.445,0 .859-.262 1.082-.66 .22-.399 .22-.902-.004-1.299zm-9.798-1.041c-.552,0-1-.463-1-1.02 0-.555 .448-1.002 1-1.002 .552,0 1,.447 1,1.002-.001,.557-.448,1.02-1,1.02zm.999-9-.375,5h-1.25l-.374-5h.004l-.004-.02c0-.551 .448-.996 1-.996 .552,0 1,.449 1,1-.001,.007-.004,.016-.004,.016h.003z" class="share-decentral-gp-18"></path></svg><div class="share-decentral-gp-19"></div></div></div></a>'.
		'</div>';
}


/* // Admin (coming soon...)
add_action( 'admin_menu', 'admin_menu' );

function admin_menu() {
	add_options_page( 'Share Decentral Options', 'Share Decentral', 'manage_options', 'share-decentral', 'admin_options' );
}

function admin_options() {
	if ( !current_user_can( 'manage_options' ) )  {
		wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
	}
	echo '<div class="wrap">';
	echo '<p></p>';
	echo '</div>';
} */
?>