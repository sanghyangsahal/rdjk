<?php if ( ! defined('BASEPATH')) exit('No direct script access
allowed');
class MY_Controller extends CI_Controller
{
	function __consruct()
	{
		parent::__consruct();
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->helper('security');
		$this->load->helper('language');

		//load language file
		$this->lang->load('en_admin', 'english');
	}

	
}