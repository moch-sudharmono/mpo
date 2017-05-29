<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Wilayah_provinsi_m
 *
 * @author Selamet Subu - Dell 5459
 */
class Wilayah_provinsi_m extends My_model {

    //put your code here
    var $table = "wilayah_provinsi";
    var $view = "wilayah_provinsi";
    var $primary_key = "provinsi_id";

    function get_data($where = NULL, $order_by = NULL) {
        if (!empty($where))
            $this->db->where(array($this->primary_key => $id));
        if (!empty($order_by))
            $this->db->order_by($order_by);
        $query = $this->db->get($this->table);
        return $query->result();
    }

    function get_data_count() {
        if (!empty($where))
            $this->db->where(array($this->primary_key => $id));
        $query = $this->db->get($this->table);
        return $query->num_rows();
    }

    function get_data_by_id($id = NULL) {
        $this->db->where(array($this->primary_key => $id));
        $query = $this->db->get($this->table);
        return $query->result();
    }

    public function insert($data = NULL) {
        return $this->db->insert($this->table, $data);
    }

    public function update_by_id($data = NULL, $id = NULL) {
        return $this->db->update($this->table, $data, array($this->primary_key => $id));
    }

    public function delete_by_id($id) {
        return $this->db->delete($this->table, array($this->primary_key => $id));
    }

    public function get_regno_by_user_id($user_id) {
        $this->db->select('regno');
        $this->db->where(array('user_id' => $user_id));
        $this->db->distinct();
        $query = $this->db->get($this->table);
        return $query->result();
    }

    // For Data Tables
    private function _get_datatables_query($column_order, $order, $column_search) {
        // you can use table or view
        $this->db->from($this->table);

        $i = 0;

        foreach ($column_search as $item) { // loop column 
            if (isset($_GET[$item]) && !empty($_GET[$item])) { // if datatable send GET for search
                if ($i === 0) { // first loop
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_GET[$item]);
                } else {
                    $this->db->or_like($item, $_GET[$item]);
                }

                if (count($column_search) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }

        if (isset($_GET['order'])) { // here order processing
            $this->db->order_by($column_order[$_GET['order']['0']['column']], $_GET['order']['0']['dir']);
        } else if (isset($order)) {
            $order = $order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    function get_datatables($column_order, $order, $column_search) {
        $this->_get_datatables_query($column_order, $order, $column_search);
        if ($_GET['length'] != -1)
            $this->db->limit($_GET['length'], $_GET['start']);
        $query = $this->db->get();
        return $query->result_array();
    }

    function count_filtered($column_order, $order, $column_search) {
        $this->_get_datatables_query($column_order, $order, $column_search);
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all() {
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // end fata tables
}
