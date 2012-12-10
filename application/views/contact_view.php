<?php echo $this->session->flashdata('msg');?>

<?php echo form_open('contact', $contact_form);?>

	<?php echo form_label($this->config->item('subject_label', 'contact').'&nbsp;*', 'subject');?>
	<?php echo form_input($subject);?>
	<?php echo form_error('subject');?>

	<br>

	<?php echo form_label($this->config->item('message_label', 'contact').'&nbsp;*', 'message');?>
	<?php echo form_textarea($message);?>
	<?php echo form_error('message');?>

	<br>

	<?php echo form_label($this->config->item('name_label', 'contact').'&nbsp;*', 'name');?>
	<?php echo form_input($name);?>
	<?php echo form_error('name');?>

	<br>

	<?php echo form_label($this->config->item('email_label', 'contact').'&nbsp;*', 'email');?>
	<?php echo form_input($email);?>
	<?php echo form_error('email');?>

	<?php echo form_input($email_confirm);?>
	
	<?php echo form_hidden($token);?>

	<br>

	<?php echo form_submit($submit);?>

<?php echo form_close();?>