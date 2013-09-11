<?php

class Pages extends CI_Controller {

	public function view($page = 'home')
	{

		if( !file_exists('application/views/pages/' . $page . '.php')) 
		{
			// Opps, we don't have page for that
			show_404();	
		}

		$data['title'] = ucfirst($page); // CApitalize the first letter

		$this->load->view('templates/header', $data);
		$this->load->view('pages/' . $page, $data);
		$this->load->view('templates/header', $data);

	}
}