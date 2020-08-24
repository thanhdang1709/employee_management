<?php

/**
 * Class and Function List:
 * Function list:
 * - __construct()
 * - staffs()
 * - get_count()
 * - staff_department()
 * - getStaffbyGroup()
 * - get_count_search()
 * - getStaffbySearch()
 * - insert_item()
 * - update_item()
 * - delete_item()
 * - find_item()
 * Classes list:
 * - Staff_model extends CI_Model
 */
/**
 *
 */
class Staff_model extends CI_Model
{
    protected $table = 'tbl_staff';

    public function __construct()
    {
        $this->load->database();
    }

    public function staffs($limit, $start)
    {

        /* $this->db->select('tbl_staff.*','tbl_department.name as department_name','tbl_department.note as department_note','tbl_department_users.*');
        $this->db->from('tbl_staff');
        
        $this->db->join('tbl_department_users', 'tbl_department_users.staff_id = tbl_staff.id','left');
        $this->db->join('tbl_department', 'tbl_department.id = tbl_department_users.department_id');*/
        $this->db->where('del_status IS NULl')->order_by('id desc')->limit($limit, $start);
        $query = $this->db->get($this->table);
        return $query->result();
    }
    public function getAllEmployee($limit, $page)
    {
        $total_page = ceil($this->get_count() / $limit);
        if ($page > $total_page) {
            $page = $total_page;
        } else if ($page < 1) {
            $page = 1;
        }
        $start = ($page - 1) * $limit;
        //dd($total_page);
        $query = $this->db->query("SELECT s.*, IFNULL(GROUP_CONCAT(d.id),'') as department_id, IFNULL(GROUP_CONCAT(d.name),'') as department_name FROM `tbl_staff` as s
        LEFT JOIN `tbl_department_users` as de ON de.staff_id = s.id
        LEFT OUTER JOIN `tbl_department` as d ON d.id = de.department_id
        WHERE s.del_status IS NULL
        GROUP BY (s.id) DESC
        LIMIT $start, $limit
        ");
        return $query->result();
    }

    public function get_count()
    {

        $query = $this->db->where('del_status IS NULL')->get($this->table);
        return $query->num_rows();
    }

    public function staff_department($id)
    {
        $this->db->select('tbl_department.id as department_id, tbl_department.name as department_name');
        $this->db->from('tbl_staff');

        $this->db->join('tbl_department_users', 'tbl_department_users.staff_id = tbl_staff.id', 'left');
        $this->db->join('tbl_department', 'tbl_department.id = tbl_department_users.department_id');
        $this->db->where('tbl_staff.id', $id);
        $this->db->where('tbl_staff.del_status', NULL);

        $query = $this->db->get();
        return $query->result();
    }
    public function getStaffbyGroup($id)
    {
        $this->db->select('{$this->table}.*, tbl_department.id as department_id, tbl_department.name as department_name');
        $this->db->from('{$this->table}');

        $this->db->join('tbl_department_users', 'tbl_department_users.staff_id = {$this->table}.id', 'left');
        $this->db->join('tbl_department', 'tbl_department.id = tbl_department_users.department_id');
        $this->db->where('tbl_department.id', $id);
        $this->db->oder_by('id desc');
        $query = $this->db->get();
        return $query->result();
    }
    public function get_count_search($keyword)
    {
        $query = $this->db->where("`name` LIKE '%{$keyword}%' OR `email` LIKE '%{$keyword}%' OR `phone` LIKE '%{$keyword}%' AND `del_status` IS NULL")->get($this->table);
        //dd($query);
        return $query->num_rows();
    }
    public function getStaffbySearch($keyword)
    {
        $query = $this->db->query("SELECT * FROM `tbl_staff` WHERE `name` LIKE '%{$keyword}%' OR `email` LIKE '%{$keyword}%' OR `phone` LIKE '%{$keyword}%' AND `del_status` IS NULL ORDER BY `id` DESC");
        return $query->result();
    }
    public function insert_item($data, $departments)
    {
        $this->db->where('email', $data['email']);
        $this->db->or_where('phone', $data['phone']);
        $query     = $this->db->get($this->table);

        $count_row = $query->num_rows();

        if ($count_row > 0) {

            return false; // here I change TRUE to false.

        } else {

            $this->db->insert($this->table, $data);
            $insert_id             = $this->db->insert_id();

            $department_id         = $departments;

            foreach ($department_id as  $id) {

                $data_department_users = ['staff_id' => $insert_id, 'department_id' => $id];
                $this->db->insert('tbl_department_users', $data_department_users);
            }
            return true; // And here false to TRUE

        }
    }

    public function update_item($id, $data, $departments)
    {

        if ($id == 0) {
            return $this->db->insert($this->table, $data, $departments);
        } else {
            $this->db->where('id', $id);
            $this->db->update($this->table, $data);

            $department_id = $departments;

            $this->db->delete('tbl_department_users', ['staff_id' => $id]);

            foreach ($department_id as $dep_id) {

                $data_department_users = ['staff_id' => $id, 'department_id' => $dep_id];
                $this->db->insert('tbl_department_users', $data_department_users);
            }

            return true;
        }
        return false;
    }

    public function delete_item($id)

    {
        $this->db->where('id', $id);
        $this->db->update($this->table, array(
            'del_status' => 'Deleted'
        ));
        $this->db->delete('tbl_department_users', array(
            'staff_id' => $id
        ));

        return;
    }

    public function find_item($id)
    {
        return $this->db->get_where($this->table, array(
            'id' => $id
        ))->row();
    }
    public function find_email($email)
    {
        return $this->db->where(array(
            'email' => $email
        ))->get($this->table);
    }
    public function find_phone($phone)
    {
        return $this->db->where(array(
            'phone' => $phone
        ))->get($this->table);
    }
    public function find_email_with_id($id, $email)
    {
        return $this->db->where(array(
            'email' => $email
        ))->where('id', '<>', $id)->get($this->table);
    }
    public function find_phone_with_id($id, $phone)
    {
        return $this->db->where(array(
            'phone' => $phone
        ))->where('id', '<>', $id)->get($this->table);
    }
}
