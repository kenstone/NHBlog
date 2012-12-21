<?php
/*
Plugin Name: Super Simple Contact Form
Plugin URI: http://shinraholdings.com/plugins/super-simple-contact-form
Description: An absurdly simple contact form plugin. Just type [contact]. There are no options.
Version: 1.3.1
Author: bitacre
Author URI: http://shinraholdings.com
	Copyright 2012 Shinra Web Holdings (http://shinraholdings.com)
*/

function super_simple_contact_form() { 
	if( array_key_exists( 'submit', $_POST ) ) : 
		$to_email = get_option( 'admin_email' );
		$subject = 'Super Simple Contact Form: ' . ( empty( $_POST['sscf_subject'] ) ? '(no subject)' : $_POST['sscf_subject'] );
		$message = ( empty( $_POST['sscf_message'] ) ? '(message was blank)' : $_POST['sscf_message'] );
		$from_name = ( empty( $_POST['sscf_from_name'] ) ? '(name was blank)' : $_POST['sscf_from_name'] );
		$from_email = ( empty ( $_POST['sscf_from_email'] ) ? $to_email : esc_attr( $_POST['sscf_from_email'] ) );
		$headers = 'From: ' . $from_name . ' <' . $from_email . '>' . "\r\n";
		
		wp_mail( $to_email, $subject, $message, $headers );
		$output = '<p>' . __( 'Your message was sent successfully!', 'SuperSimpleContactForm' ) . '</p>';  
	else : 
		$output = '
<!-- start Super Simple Contact Form -->
<div class="sscf-wrapper" style="margin:0; padding:0; clear:both;">
	<form action="" method="post">
	<p class="sscf-from-name">
		<label for="sscf_from_name" style="width:100px; float:left;">' . __( 'Your name:', 'SuperSimpleContactForm' ) .'</label>
		<input type="text" name="sscf_from_name" id="sscf_from_name" style="width:280px;" /></p>
		
	<p class="sscf-from-email">
		<label for="sscf_from_email" style="width:100px; float:left;">' . __( 'Your email:', 'SuperSimpleContactForm' ) .'</label>
		<input type="text" name="sscf_from_email" id="sscf_from_email" style="width:280px;" /></p>
		
	<p class="sscf-subject">
		<label for="sscf_subject" style="width:100px; float:left;">' . __( 'Subject:', 'SuperSimpleContactForm' ) .'</label>
		<input type="text" name="sscf_subject" id="sscf_subject" style="width:280px;" /></p>
		
	<p class="sscf-message">
		<label for="sscf_message" style="width:100px; float:left;">' . __( 'Message', 'SuperSimpleContactForm' ) .'</label>
		<textarea name="sscf_message" id="sscf_message" cols="45" rows="5" style="width:280px; height:102px"></textarea></p>
		
	<p class="sscf-submit">
		<input type="submit" name="submit" id="submit" value="Send" style="margin-left:100px;" /></p>
		
	<p style="clear:both;">&nbsp;</p>
	</form>
</div>
<!-- end Super Simple Contact Form -->';
	endif;
	
	return $output;
}
add_shortcode( 'contact', 'super_simple_contact_form' );
?>