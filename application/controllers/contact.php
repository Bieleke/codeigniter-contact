<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contact extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
	}

	public function index()
	{
		// load configuration
		$this->load->config('contact', true);

		// load form_validation class
		$this->load->library('form_validation');

		// set error delimiters
		$this->form_validation->set_error_delimiters($this->config->item('start_delimiter', 'contact'), $this->config->item('end_delimiter', 'contact'));

		// set validation rules
		$this->form_validation->set_rules('subject', $this->config->item('subject_label', 'contact'), 'trim|required|xss_clean');
		$this->form_validation->set_rules('message', $this->config->item('message_label', 'contact'), 'trim|required|xss_clean');
		$this->form_validation->set_rules('email', $this->config->item('email_label', 'contact'), 'trim|required|valid_email|xss_clean');
		$this->form_validation->set_rules('name', $this->config->item('name_label', 'contact'), 'trim|required|xss_clean');

		if ($this->form_validation->run() == false)
		{
			// show contact form
			$data['contact_form'] = array(
				'name' => 'contact_form',
				'id' => 'contact_form',
				'class' => '',
				'onsubmit' => "document.getElementById('submit').disabled=1;",
			);
			$data['subject'] = array(
				'name' => 'subject',
				'id' => 'subject',
				'value' => $this->form_validation->set_value('subject'),
				'class' => '',
				'tabindex' => '1',
			);
			$data['message'] = array(
				'type' => 'textarea',
				'name' => 'message',
				'id' => 'message',
				'value' => $this->form_validation->set_value('message'),
				'class' => '',
				'tabindex' => '2',
			);
			$data['name'] = array(
				'type' => 'text',
				'name' => 'name',
				'id' => 'name',
				'value' => $this->form_validation->set_value('name'),
				'class' => '',
				'tabindex' => '3',
			);
			$data['email'] = array(
				'type' => 'email',
				'name' => 'email',
				'id' => 'email',
				'value' => $this->form_validation->set_value('email'),
				'class' => '',
				'tabindex' => '4',
			);
			$data['submit'] = array(
				'type' => 'submit',
				'name' => 'submit',
				'id' => 'submit',
				'value' => $this->config->item('submit_button', 'contact'),
				'class' => '',
				'tabindex' => '5',
			);
			$data['token'] = $this->_get_token();

			$this->load->view('contact_view', $data);
		}
		else
		{
			if ($this->_validate_token() == false)
			{
				// if token does not correspond, redirect
				redirect('contact');
			}
			else
			{
				// otherwise load email class
				$this->load->library('email');

				// initialize email configuration
				$email_config = $this->config->item('email_config', 'contact');

				if (isset($email_config) && is_array($email_config))
				{
					$this->email->initialize($email_config);
				}

				// and send a message
				$this->email->from($this->input->post('email', true), $this->input->post('name', true));
				$this->email->to($this->config->item('recipients', 'contact'));
				$this->email->reply_to($this->input->post('email', true), $this->input->post('name', true));
				$this->email->subject($this->input->post('subject', true));
				$this->email->message($this->input->post('message', true));

				if ($this->email->send() == false)
				{
					// if email wasn't sent, say sorry
					$this->session->set_flashdata('msg', $this->config->item('error_message', 'contact'));
				}
				else
				{
					// otherwise say thanks
					$this->session->set_flashdata('msg', $this->config->item('success_message', 'contact'));
				}

				// and redirect
				redirect('contact');
			}
		}
	}

	protected function _get_token()
	{
		$key = md5(uniqid(mt_rand()));
		$value = md5(uniqid(mt_rand()));

		$this->session->set_flashdata('token_key', $key);
		$this->session->set_flashdata('token_value', $value);

		return array($key => $value);
	}

	protected function _validate_token()
	{
		if ($this->input->post($this->session->flashdata('token_key'), true) == $this->session->flashdata('token_value'))
		{
			return true;
		}
		else
		{
			return false;
		}
	}

}


/* End of file contact.php */
/* Location: ./application/controllers/contact.php */