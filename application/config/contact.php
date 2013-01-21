<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

// Email recipients
$config['recipients'] = array(
	'pbielen@gmail.com',
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
// Error and success messages
$config['error_message'] = 'Oops, er ging iets fout! Probeert U a.u.b. opnieuw.';
$config['success_message'] = 'Bedankt, uw bericht is succesvol verzonden. We nemen spoedig contact met U op!';

// Labels
$config['subject_label'] = 'Onderwerp';
$config['message_label'] = 'Bericht';
$config['name_label'] = 'Naam';
$config['email_label'] = 'E-mail';

// Submit button
$config['submit_button'] = 'Verzenden';


/* End of file contact.php */
/* Location: ./application/config/contact.php */