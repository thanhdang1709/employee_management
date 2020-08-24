<?php
/**
 * Class and Function List:
 * Function list:
 * - __construct()
 * - index()
 * - create()
 * - edit()
 * - update()
 * - store()
 * - delete()
 * - search()
 * - load_header_theme()
 * - load_footer_theme()
 * Classes list:
 * - Department extends CI_Controller
 */
defined('BASEPATH') or exit('No direct script access allowed');

class Department extends CI_Controller
{

    protected $department_model;

    public function __construct()
    {
        parent::__construct();
        $this->load->helper("url");
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->model("Department_model");

        $this->department_model = new Department_model;

        if (!$this->session->has_userdata('user_id'))
        {
            redirect('Auth/index');
        }

    }
    public function index()
    {
        $this->load_header_theme();

        $data['departments'] = $this->department_model->departments();

        $this->load->view('department/list', $data);

        $this->load_footer_theme();
    }

    public function create()
    {
        $this->load_header_theme();

        $this->load->view('department/create');

        $this->load_footer_theme();
    }

    public function edit()
    {
        $this->load_header_theme();

        $id = $this->input->get('id');

        $data['department']    = $this->department_model->find_item($id);

        if ($data['department'])
        {

            $this->load->view('department/edit', $data);

        }
        else
        {

            $this->session->set_flashdata('error', 'ERROR!');

            $this->load->view('error');
        }

        $this->load_footer_theme();
    }

    public function update()
    {
        $this->form_validation->set_rules('name', 'name', 'required');

        $this->form_validation->set_rules('note', 'note', 'required');

        $id = $this->input->post('id');

        if ($this->form_validation->run() == false)
        {

            $this->session->set_flashdata('errors', validation_errors());

            redirect(base_url('department/edit/' . $id));

        }
        else
        {
            $this->department_model->update_item($id);

            $this->session->set_flashdata('success', 'Updated success!');

            redirect(base_url('department/index'));

        }
    }
    public function store()
    {
        $this->form_validation->set_rules('name', 'name', 'required');

        $this->form_validation->set_rules('note', 'note', 'required');

        if ($this->form_validation->run() == false)
        {

            $this->session->set_flashdata('errors', validation_errors());

            $this->load_header_theme();
            $this->load->view('department/create');
            $this->load_footer_theme();

        }
        else
        {

            $this->department_model->insert_item();

            $this->session->set_flashdata('success', 'Added success!');

            redirect(base_url('department/index'));
        }
    }

    public function delete()
    {
        $id   = $this->input->get('id');

        $item = $this->department_model->delete_item($id);

        $this->session->set_flashdata('success', 'Deleted success!');

        redirect(base_url('department/index'));
    }

    public function search()
    {
        $this->load_header_theme();
        $keyword = $this->input->get('search');
        $keyword = strtolower($keyword);
        if (!empty($keyword))
        {

            $data['departments']         = $this->department_model->getDepartmentbySearch($keyword);
            $this->load->view('department/list', $data);
            //var_dump($data['staffs']);
            //redirect(base_url('staff'));
            
        }
        else
        {

            $data['departments'] = $this->department_model->departments();
            $this->session->set_flashdata('error', 'Can not search by ' . $keyword);
            $this->load->view('department/list', $data);
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

