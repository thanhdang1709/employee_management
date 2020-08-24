<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Staff extends CI_Controller
{
    protected $department_model;
    protected $staff_model;
    public function __construct()
    {
        parent::__construct();
        $this->load->helper("url");
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->model("Department_model");
        $this->load->library('pagination');
        $this->load->model("Staff_model");
        $this->load->library('user_agent');
        $this->department_model = new Department_model;
        $this->staff_model = new Staff_model;
        if (!$this->session->has_userdata('user_id')) {
            redirect('Auth/index');
        }
    }
    public function index()
    {
        $config = array();
        $config["base_url"] = base_url() . "staff";
        $config["total_rows"] = $this->staff_model->get_count();
        $config["per_page"] = 5;
        $config["uri_segment"] = 2;
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;
        $data["links"] = $this->pagination->create_links();
        $this->load_header_theme();
        $data['departments'] = $this->department_model->departments();
        $group_department = $this->input->get('group');
        if (!empty($group_department)) {

            $data['staffs'] = $this->staff_model->getStaffbyGroup($group_department);
            $this->load->view('staff/list', $data);
        } else {
            $data['count_result_search'] = $config['total_rows'];
            $data['staffs'] = $this->staff_model->staffs($config["per_page"], $page);
            $this->load->view('staff/list', $data);
        }
        $this->load_footer_theme();
    }
    public function create()
    {
        $this->load_header_theme();
        $data['departments'] = $this->department_model->departments();
        $this->load->view('staff/create', $data);
        $this->load_footer_theme();
    }
    public function edit()
    {
        $this->load_header_theme();
        $id = $this->input->get('id');
        $data['departments'] = $this->department_model->departments();
        $data['staff'] = $this->staff_model->find_item($id);
        if ($data['staff']) {
            $this->load->view('staff/edit', $data);
        } else {
            $this->session->set_flashdata('error', 'ERROR!');
            $this->load->view('error');
        }
        $this->load_footer_theme();
    }
    public function update()
    {

        $config['upload_path'] = './assets/images';
        $config['allowed_types'] = 'jpg|jpeg|png';
        $config['max_size'] = '2048';
        $config['maintain_ratio'] = TRUE;
        $config['encrypt_name'] = TRUE;
        $config['detect_mime'] = TRUE;
        $this->form_validation->set_rules('name', 'name', 'trim|required', ['required' => 'You must provide a %s.']);
        $this->form_validation->set_rules('email', 'email', 'trim|required|valid_email');
        $this->form_validation->set_rules('phone', 'phone', 'trim|required');
        $this->form_validation->set_rules('note', 'note', 'trim|required');
        $data = array(
            'name' => $this->input->post($this->security->xss_clean('name')),
            'email' => $this->input->post($this->security->xss_clean('email')),
            'phone' => $this->input->post($this->security->xss_clean('phone')),
            'note' => $this->input->post($this->security->xss_clean('note'))
        );

        $id = $this->input->post('id');

        $config['file_name'] = $this->input->post('picture');
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if ($this->upload->do_upload('picture')) {
            $uploadData = $this->upload->data();
            $data["image"] = base_url() . 'assets/images/' . $uploadData['file_name'];
        } else {
            $this->session->set_flashdata('errors', $this->upload->display_errors());
        }
        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('errors', validation_errors());
            $this->load_header_theme();
            $data['departments'] = $this->department_model->departments();
            $this->load->view('staff/create', $data);
            $this->load_footer_theme();
        } else {
            $departments = $this->input->post('departments');
            $update = $this->staff_model->update_item($id, $data, $departments);
            // dd($update);
            if ($update) {
                $this->session->set_flashdata('success', 'Update success!');
                //var_dump($department_id);
                redirect('staff/index');
            } else {
                $this->session->set_flashdata('errors', 'Update failed');
                //var_dump($department_id);
                redirect(base_url('staff/index'));
            }
        }
        return;
    }
    public function delete()
    {
        $id = $this->input->get('id');
        $security = $this->input->get('token');
        $timestamp = $this->input->get('timestamp');
        $secret = $this->input->get('secret');
        if (md5($timestamp . 'mal') == $secret) {
            $item = $this->staff_model->delete_item($id);
            $this->session->set_flashdata('success', 'Deleted success!');
            redirect(base_url('staff/index'));
        }
    }
    public function store()
    {
        $config['upload_path'] = './assets/images';
        $config['allowed_types'] = 'jpg|jpeg|png';
        $config['max_size'] = '2048';
        $config['maintain_ratio'] = TRUE;
        $config['encrypt_name'] = TRUE;
        $config['detect_mime'] = TRUE;
        $this->form_validation->set_rules('name', 'name', 'trim|required', ['required' => 'You must provide a %s.']);
        $this->form_validation->set_rules('email', 'email', 'trim|required|valid_email');
        $this->form_validation->set_rules('phone', 'phone', 'trim|required');
        $this->form_validation->set_rules('note', 'note', 'trim|required');
        $data = array('name' => $this->input->post($this->security->xss_clean('name')), 'email' => $this->input->post($this->security->xss_clean('email')), 'phone' => $this->input->post($this->security->xss_clean('phone')), 'note' => $this->input->post($this->security->xss_clean('note')),);
        $config['file_name'] = $this->input->post('picture');
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if ($this->upload->do_upload('picture')) {
            $uploadData = $this->upload->data();
            $data["image"] = base_url() . 'assets/images/' . $uploadData['file_name'];
        } else {
            $this->session->set_flashdata('errors', $this->upload->display_errors());
            $data["image"] = 'https://upload.wikimedia.org/wikipedia/commons/thumb/a/ac/No_image_available.svg/480px-No_image_available.svg.png';
        }
        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('errors', validation_errors());
            $this->load_header_theme();
            $data['departments'] = $this->department_model->departments();
            $this->load->view('staff/create', $data);
            $this->load_footer_theme();
        } else {
            $insert_data = $this->staff_model->insert_item($data, $this->input->post('departments'));
            //dd($insert_data);
            if ($insert_data) {
                $this->session->set_flashdata('success', 'Added success!');
                //var_dump($department_id);
                redirect(base_url('staff/index'));
            } else {
                $this->session->set_flashdata('errors', 'Email or Phone already exists ');
                //var_dump($department_id);
                redirect(base_url('staff/index'));
            }
        }
        return;
    }
    public function search()
    {
        $this->load_header_theme();
        $data['departments'] = $this->department_model->departments();
        $keyword = $this->input->get('search');
        $keyword = strtolower($keyword);
        if (!empty($keyword)) {
            $config["total_rows"] = $this->staff_model->get_count_search($keyword);
            $data['count_result_search'] = $config["total_rows"];
            $data['staffs'] = $this->staff_model->getStaffbySearch($keyword);
            $this->load->view('staff/list', $data);
            //var_dump($data['staffs']);
            //redirect(base_url('staff/index'));b

        } else {
            $config = array();
            $config["base_url"] = base_url() . "staff";
            $config["total_rows"] = $this->staff_model->get_count();
            $config["per_page"] = 5;
            $config["uri_segment"] = 2;
            $this->pagination->initialize($config);
            $page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;
            //dd($config["total_rows"]);
            $data["links"] = $this->pagination->create_links();
            $data['count_result_search'] = $config["total_rows"];
            //$data['error'] = "Keyword is empty";
            $data['staffs'] = $this->staff_model->staffs($config["per_page"], $page);
            $this->session->set_flashdata('error', 'Keyword is empty');
            $this->load->view('staff/list', $data);
        }
        $this->load_footer_theme();
        return;
    }
    protected function load_header_theme()
    {
        $this->load->view('theme/header');
        $this->load->view('theme/nav');
        $this->load->view('theme/sidebar');
    }
    protected function load_footer_theme()
    {
        $this->load->view('theme/footer');
    }
}
