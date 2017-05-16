<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page extends MY_Controller {

	public function __construct()
	{
            parent::__construct();
            // Your own constructor code

            //$data = $this->session->userdata('gajiku_in');
            //if( !$this->is_logged_in() )
            //{
            //    redirect("login");
            //}

            if( !$this->verify_role('admin') )
            {
                redirect("login");
            }
	}
	
	public function index()
	{	
            $page = 'home/main';
            if ( ! file_exists(APPPATH.'views/pages/'.$page.'.php'))
            {
                            // Whoops, we don't have a page for that!
                            show_404();
            }

            $data['title'] = "Dashboard"; // Capitalize the first letter

            $this->load->view('templates/header', $data);
            $this->load->view('pages/'.$page, $data);
            $this->load->view('templates/footer', $data);
	}
}
