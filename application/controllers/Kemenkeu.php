<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
 * Kemenkeu : Realisasi Keuangan Kemenkeu
 */

class Kemenkeu extends MY_Controller {

	public function __construct()
	{
            parent::__construct();
            // Your own constructor code

            /*if( !$this->verify_role('admin') )
            {
                redirect("login");
            }*/
	}
	
	public function index()
	{	
            $page = 'kemenkeu/main';
            if ( ! file_exists(APPPATH.'views/pages/'.$page.'.php'))
            {
                            // Whoops, we don't have a page for that!
                            show_404();
            }

            $data['title'] = "Realisasi Keuangan Kemenkeu | MPO 2017"; // Capitalize the first letter

            $this->load->view('templates/header', $data);
            $this->load->view('pages/'.$page, $data);
            $this->load->view('templates/footer', $data);
	}

    public function create()
    {   
            $page = 'kemenkeu/create';
            if ( ! file_exists(APPPATH.'views/pages/'.$page.'.php'))
            {
                            // Whoops, we don't have a page for that!
                            show_404();
            }

            $data['title'] = "Dashboard"; 

            $this->load->view('templates/header', $data);
            $this->load->view('pages/'.$page, $data);
            $this->load->view('templates/footer', $data);
    }

    public function update($id)
    {   
            $page = 'kemenkeu/update';
            if ( ! file_exists(APPPATH.'views/pages/'.$page.'.php'))
            {
                            // Whoops, we don't have a page for that!
                            show_404();
            }

            $data['title'] = "Dashboard"; 

            $this->load->view('templates/header', $data);
            $this->load->view('pages/'.$page, $data);
            $this->load->view('templates/footer', $data);
    }

    public function save()
    {   
            $page = 'kemenkeu/update';
            if ( ! file_exists(APPPATH.'views/pages/'.$page.'.php'))
            {
                            // Whoops, we don't have a page for that!
                            show_404();
            }

            $data['title'] = "Dashboard"; 

            $this->load->view('templates/header', $data);
            $this->load->view('pages/'.$page, $data);
            $this->load->view('templates/footer', $data);
    }

    public function delete($id)
    {   
            $page = 'kemenkeu/update';
            if ( ! file_exists(APPPATH.'views/pages/'.$page.'.php'))
            {
                            // Whoops, we don't have a page for that!
                            show_404();
            }

            $data['title'] = "Dashboard"; 

            $this->load->view('templates/header', $data);
            $this->load->view('pages/'.$page, $data);
            $this->load->view('templates/footer', $data);
    }
}
