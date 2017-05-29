<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
 * RKA : Rencana Kerja dan Anggaran
 */

class Rka extends MY_Controller {

	public function __construct()
	{
            parent::__construct();

            /*if( !$this->verify_role('admin') )
            {
                redirect("login");
            }*/
	}
	
    /*
     * Listing Dinas Provinsi, Kabupaten dan Kota
     */    

	public function index()
	{	
            $page = 'rka/main';
            if ( ! file_exists(APPPATH.'views/pages/'.$page.'.php'))
            {
                            // Whoops, we don't have a page for that!
                            show_404();
            }

            $data['title'] = "Rencana Kerja Anggaran | MPO 2017"; // Capitalize the first letter

            $this->load->view('templates/header', $data);
            $this->load->view('pages/'.$page, $data);
            $this->load->view('templates/footer', $data);
	}

    public function detail($id=null)
    {   
            $page = 'rka/detail';
            if ( ! file_exists(APPPATH.'views/pages/'.$page.'.php'))
            {
                            // Whoops, we don't have a page for that!
                            show_404();
            }

            $data['title'] = "Rencana Kerja Anggaran | MPO 2017"; // Capitalize the first letter

            $this->load->view('templates/header', $data);
            $this->load->view('pages/'.$page, $data);
            $this->load->view('templates/footer', $data);
    }

    public function create()
    {   
            $page = 'rka/create';
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
            $page = 'rka/update';
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
            $page = 'rka/update';
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
            $page = 'rka/update';
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
