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

/* Updated this to do my bidding!!!! Mu Ha Ha Ha.
 */

function super_simple_contact_form() { 
	if( array_key_exists( 'submit', $_POST ) ) : 
		$to_email = get_option( 'admin_email' );
		$subject = 'Notebook Heavy Contact Form: ' . ( empty( $_POST['sscf_subject'] ) ? '(no subject)' : $_POST['sscf_subject'] );
		$message = ( empty( $_POST['sscf_message'] ) ? '(message was blank)' : $_POST['sscf_message'] );
		$from_name = ( empty( $_POST['sscf_from_name'] ) ? '(name was blank)' : $_POST['sscf_from_name'] );
		$from_email = ( empty ( $_POST['sscf_from_email'] ) ? $to_email : esc_attr( $_POST['sscf_from_email'] ) );
		$headers = 'From: ' . $from_name . ' <' . $from_email . '>' . "\r\n";
		
		wp_mail( $to_email, $subject, $message, $headers );
		$output = '<div>' . __( 'Your message was sent successfully!', 'SuperSimpleContactForm' ) . '</div>';  
	else : 
		$output = '
<!-- start Super Simple Contact Form -->
	<form action="" method="post" id="contactForm">
		<ul>
	        <li>
	            <div class="ancientHelper"><label for="sscf_from_name">Your Name</label></div>
	            <input type="text" placeholder="Your Name" name="sscf_from_name" required="required"  id="sscf_from_name"  /><span class="ancientHelper required">(required)</span>
	        </li>
	        <li>
	            <div class="ancientHelper"><label for="sscf_from_email">Your Email</label></div>
	            <input type="email" placeholder="Your Email" name="sscf_from_email" id="sscf_from_email" required="required" /><span class="ancientHelper required">(required)</span>
	        </li>
	        <li>
	            <div class="ancientHelper"><label for="sscf_subject">Subject</label></div>
	            <input type="text" placeholder="Subject" name="sscf_subject" id="sscf_subject" /></li>
	        <li>
	            <div class="ancientHelper"><label for="sscf_message">Message</label></div>
	            <textarea placeholder="Message" name="sscf_message" id="sscf_message" required="required"></textarea>
	        </li>
	        <li>
	            <input type="submit" name="submit" id="submit" value="Send Message!" /></p></li>
	    </ul>

	</form>

	<script>

        if (!Modernizr.input.placeholder) {
            $(".ancientHelper").show();
        }

    </script>

<!-- end Super Simple Contact Form -->';
	endif;
	
	return $output;
}
add_shortcode( 'contact', 'super_simple_contact_form' );
?>