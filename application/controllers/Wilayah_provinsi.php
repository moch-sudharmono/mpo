<?php

defined('BASEPATH') or exit('No direct script access allowed');

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Wilayah_provinsi
 *
 * @author Selamet Subu - Dell 5459
 */
class Wilayah_provinsi extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Wilayah_provinsi_m');
    }

    public function index() {
        // set page
        $page = 'provinsi/main';
        // set data
        $data["result"] = array();
        $data['title'] = 'Provinsi';
        $this->load->view("templates/header", $data);
        $this->load->view('pages/' . $page, $data);
        $this->load->view('templates/footer', $data);
    }

    public function simpan_json() {
        // check user  login
        if (!$this->verify_role('admin')) {
            redirect("login");
        }

        // Post data
        $id = $this->input->post('provinsi_id');
        $nama = $this->input->post('nama');

        // set POST data in Array
        $data = array(
            'nama'=>$nama
        );

        if (!empty($id)) {
            $result = $this->Wilayah_provinsi_m->update_by_id($data, $id);
        } else {
            $result = $this->Wilayah_provinsi_m->insert($data);
        }

        if ($result) {
            $r = array('status' => '1', 'message' => 'Data tersimpan');
        } else {
            $r = array('status' => '0', 'message' => 'Data gagal tersimpan');
        }

        echo json_encode($r);
    }

    public function simpan() {
        // check user  login
        if (!$this->verify_role('admin')) {
            redirect("login");
        }

        // Post data
        $id = $this->input->post('provinsi_id');

        // set POST data in Array
        $data = array(
            'nama'
        );

        if (!empty($id)) {
            $result = $this->Wilayah_provinsi_m->update_by_id($data, $id);
        } else {
            $result = $this->Wilayah_provinsi_m->insert($data);
        }

        if ($result) {
            // <set youe code here>
        } else {
            // <set youe code here>
        }

        redirect('wilayah_provinsi');
    }

    public function hapus_json() {
        if (!$this->verify_role('admin')) {
            redirect("login");
        }
        $id = $this->input->get('id');
        $result = $this->Wilayah_provinsi_m->delete_by_id($id);
        if ($result) {
            $r = array('status' => '1', 'message' => 'Data terhapus');
        } else {
            $r = array('status' => '0', 'message' => 'Data gagal terhapus');
        }

        echo json_encode($r);
    }

    public function hapus() {
        if (!$this->verify_role('admin')) {
            redirect("login");
        }
        $id = $this->input->get('<set your id>');
        $result = $this->Wilayah_provinsi_m->delete_by_id($id);
        if ($result) {
            // <set your code here>
        } else {
            // <set your code here>
        }

        redirect('wilayah_provinsi');
    }

    public function admin_ajax_list() {
        if (!$this->verify_role('admin')) {
            redirect("login");
        }

        $this->load->model('Wilayah_provinsi_m');

        $column_order = array(
            'provinsi_id', 'nama', 'provinsi_id'
        );
        $column_search = $column_order;
        $order = array('nama' => 'asc'); // default order 

        $list = $this->Wilayah_provinsi_m->get_datatables($column_order, $order, $column_search);
        $data = array();
        $no = $_GET['start'];
        foreach ($list as $r) {
            $no++;
            $row = array();
            for ($i = 0; $i < count($column_search); $i++) {
                $row[] = $r[$column_search[$i]];
            }

            $data[] = $row;
        }

        $output = array(
            "draw" => $_GET['draw'],
            "recordsTotal" => $this->Wilayah_provinsi_m->count_all(),
            "recordsFiltered" => $this->Wilayah_provinsi_m->count_filtered($column_order, $order, $column_search),
            "data" => $data,
        );
        echo json_encode($output);
    }

    public function get_data_by_id_json() {
        $this->load->model('Wilayah_provinsi_m');
        $this->is_logged_in();

        $id = $this->input->get("id");
        $data = $this->Wilayah_provinsi_m->get_data_by_id($id);
        echo json_encode($data);
    }

}
