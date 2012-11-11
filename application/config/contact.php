<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

// Email recipients
$config['recipients'] = array(
	'your@email.com',
	// 'another@email.com',
);

// Email configuration
$config['email_config'] = array(
	'mailtype' => 'html',
	'validate' => true,
);

// Form Validation error delimiters
$config['start_delimiter'] = '<p style="color:#b94a48;">';
$config['end_delimiter'] = '</p>';

// Error and success messages
$config['error_message'] = 'Oops, something is wrong! Please, drop us a line on email.';
$config['success_message'] = 'Thanks, your message successfully sent. Get in touch!';

// Labels
$config['subject_label'] = 'Subject';
$config['message_label'] = 'Message';
$config['name_label'] = 'Name';
$config['email_label'] = 'Email';

// Submit button
$config['submit_button'] = 'Send';


/* End of file contact.php */
/* Location: ./application/config/contact.php */