<?php

/**
 * Class and Function List:
 * Function list:
 * - __construct()
 * - departments()
 * - insert_item()
 * - update_item()
 * - delete_item()
 * - find_item()
 * - getDepartmentBySearch()
 * Classes list:
 * - Department_model extends CI_Model
 */
/**
 *
 */
class Department_model extends CI_Model
{
    protected $table = 'tbl_department';

    public function __construct()
    {
        $this->load->database();
    }

    public function departments_with_paginate($limit, $page)
    {
        $total_page = ceil($this->get_count() / $limit);
        if ($page > $total_page) {
            $page = $total_page;
        } else if ($page < 1) {
            $page = 1;
        }
        $start = ($page - 1) * $limit;

        $query = $this->db->query("SELECT * FROM `tbl_department` WHERE `del_status` IS NULL LIMIT $start, $limit");
        return $query->result();
    }
    public function departments()
    {
        $query = $this->db->query("SELECT * FROM `tbl_department` WHERE `del_status` IS NULL");
        return $query->result();
    }
    public function get_count()
    {

        $query = $this->db->where('del_status IS NULL')->get($this->table);
        return $query->num_rows();
    }
    public function insert_item()
    {
        $data = array(
            'name' => $this->input->post('name'),
            'note' => $this->input->post('note')
        );
        return $this->db->insert($this->table, $data);
    }

    public function update_item($id)
    {
        $data = array(
            'name' => $this->input->post('name'),
            'note' => $this->input->post('note')
        );
        if ($id == 0) {
            return $this->db->insert($this->table, $data);
        } else {
            $this->db->where('id', $id);
            return $this->db->update($this->table, $data);
        }
    }

    public function delete_item($id)

    {
        $this->db->where('id', $id);
        $this->db->update($this->table, array(
            'del_status' => 'Deleted'
        ));
        return $this->db->delete('tbl_department_users', array(
            'department_id' => $id
        ));
    }

    public function find_item($id)
    {
        return $this->db->get_where($this->table, array(
            'id'       => $id
        ))->row();
    }

    public function getDepartmentBySearch($keyword)
    {
        $query = $this->db->query("SELECT * FROM `tbl_department` WHERE `name` LIKE '%{$keyword}%' AND `del_status` IS NULL");
        return $query->result();
    }
}
