<?php
defined('BASEPATH') or exit('No direct script access allowed');

<#assign licenseFirst = "/* ">
<#assign licensePrefix = " * ">
<#assign licenseLast = " */">
<#include "${project.licensePath}">

<#if namespace?? && namespace?length &gt; 0>
namespace ${namespace};
</#if>

/**
 * Description of ${name}
 *
 * @author Selamet Subu - ${user}
 */

class ${name} extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('${name}_m');
    }

    public function index()
    {
        // set page
        $page = 'set your page';
        // set data
        $data["result"] = array();
        $data['title'] = '<set your title>';
        $this->load->view("pages/templates/header", $data);
        $this->load->view('pages/'.$page, $data);
        $this->load->view('pages/templates/footer', $data);
    }
    
    public function simpan_json(){
        // check user  login
        if (!$this->verify_role('admin')) {
            redirect("login");
        }

        // Post data
        $id = $this->input->post('<set your id>');

        // set POST data in Array
        $data = array(
            '<set your data to save>'
        );
        
        if(!empty($id)){
            $result = $this->${name}_m->update_by_id($data, $id);
        }else{
            $result = $this->${name}_m->insert($data);
        }
        
        if( $result ){
            $r = array('status'=>'1', 'message'=>'Data tersimpan');
        }else{
            $r = array('status'=>'0', 'message'=>'Data gagal tersimpan');
        }
        
        echo json_encode($r);
    }
    
    public function simpan(){
        // check user  login
        if (!$this->verify_role('admin')) {
            redirect("login");
        }

        // Post data
        $id = $this->input->post('<set your id>');

        // set POST data in Array
        $data = array(
            '<set your data to save>'
        );
        
        if(!empty($id)){
            $result = $this->${name}_m->update_by_id($data, $id);
        }else{
            $result = $this->${name}_m->insert($data);
        }
        
        if( $result ){
           // <set youe code here>
        }else{
            // <set youe code here>
        }
        
        redirect('<set your page to redirect>');
    }
    
    public function hapus_json(){
        if (!$this->verify_role('admin')) {
            redirect("login");
        }
        $id = $this->input->get('<set your id>');
        $result = $this->${name}_m->delete_by_id($id);
        if( $result ){
            $r = array('status'=>'1', 'message'=>'Data terhapus');
        }else{
            $r = array('status'=>'0', 'message'=>'Data gagal terhapus');
        }
        
        echo json_encode($r);
    }
    
     public function hapus(){
        if (!$this->verify_role('admin')) {
            redirect("login");
        }
        $id = $this->input->get('<set your id>');
        $result = $this->${name}_m->delete_by_id($id);
        if( $result ){
            // <set your code here>
        }else{
            // <set your code here>
        }
        
        redirect('<set your page to redirect>');
    }
    
    public function admin_ajax_list()
    {
        if( !$this->verify_role('admin') )
        {
            redirect("login");
        }
        
        $this->load->model('${name}_m');
        
        $column_order = array(
            
        );
        $column_search = $column_order;
        $order = array('<set your default order>' => 'desc'); // default order 
        
        $list = $this->${name}_m->get_datatables($column_order, $order, $column_search);
        $data = array();
        $no = $_GET['start'];
        foreach ($list as $r) {
            $no++;
            $row = array();
            for( $i=0; $i<count($column_search); $i++ ){
                $row[] = $r[$column_search[$i]];
            }
 
            $data[] = $row;
        }
 
        $output = array(
            "draw" => $_GET['draw'],
            "recordsTotal" => $this->${name}_m->count_all(),
            "recordsFiltered" => $this->${name}_m->count_filtered($column_order, $order, $column_search),
            "data" => $data,
        );
        echo json_encode($output);
    }
    
    public function get_data_by_id_json(){
        $this->load->model('${name}_m');
        $this->is_logged_in();
        
        $id = $this->input->get("id");
        $data = $this->${name}_m->get_data_by_id($id);
        echo json_encode($data);
    }

}