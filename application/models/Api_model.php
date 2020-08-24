<?php


class Api_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function getUserInfor($email, $password)
    {
        $this->db->select("*");
        $this->db->from("tbl_users");
        $this->db->where("email", $email);
        $this->db->where("password", $password);
        $this->db->where("status", 1);
        return $this->db->get()->row();
    }

    public function getAllEmployee()
    {
        $query = $this->db->query("SELECT s.*, IFNULL(GROUP_CONCAT(d.id),'') as department_id, IFNULL(GROUP_CONCAT(d.name),'') as department_name FROM `tbl_staff` as s
        LEFT JOIN `tbl_department_users` as de ON de.staff_id = s.id
        LEFT OUTER JOIN `tbl_department` as d ON d.id = de.department_id
        WHERE s.del_status IS NULL
        GROUP BY(s.id)
        ");
        return $query->result();
    }
    public function addEmployee($data)
    {

        return $this->db->insert('tbl_staff', $data);
    }

    public function getAllDepartment()
    {
        $query = $this->db->query("SELECT * FROM `tbl_department` WHERE `del_status` IS NULL");
        return $query->result();
    }
    public function editDepartment(int $id, string $name, string $note)
    {

        $data = array(
            'name' => $name,
            'note' => $note
        );
        if ($id == 0) {
            return $this->db->insert('tbl_department', $data);
        } else {
            $this->db->where('id', $id);
            $update =  $this->db->update('tbl_department', $data);
            if ($update) {
                return $this->db->query("SELECT * FROM `tbl_department` WHERE `del_status` IS NULL")->result();
            } else {
                return false;
            }
        }
    }
    public function deleteDepartment($id)
    {
        $this->db->where('id', $id);
        $this->db->update('tbl_department', array(
            'del_status' => 'Deleted'
        ));
        return $this->db->delete('tbl_department_users', array(
            'department_id' => $id
        ));
    }
    public function deleteEmployee($id)
    {
        $this->db->where('id', $id);
        $this->db->update('tbl_staff', array(
            'del_status' => 'Deleted'
        ));
        return $this->db->delete('tbl_department_users', array(
            'staff_id' => $id
        ));
    }
    public function addDepartment(string $name, string $note)
    {
        $data = array(
            'name' => $name,
            'note' => $note
        );
        return $this->db->insert('tbl_department', $data);
    }

    public function findEmployee($id)
    {
        $this->db->select("*");
        $this->db->from("tbl_staff");
        $this->db->where('id', $id);
        return $this->db->get();
    }
    public function user($email, $password)
    {
        $this->db->select('*');
        $this->db->from('tbl_users');
        $this->db->where('email', $email);
        $this->db->where('password', $password);
        return $this->db->get();
    }
    public function findEmail($email)
    {
        return $this->db->where(array(
            'email' => $email
        ))->get('tbl_staff');
    }
}
