<?php

/**
* Class and Function List:
* Function list:
* - __construct()
* - index()
* - loginCheck()
* - logOut()
* Classes list:
* - Auth extends CI_Controller
*/
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Auth_model');
        $this->load->library('form_validation');
    }
    public function index()
    {

        if ($this->session->userdata('user_id'))
        {

            $this->load->view('welcome_message');

        }
        else
        {
            $this->load->view('auth/login');
        }

    }
    public function loginCheck()
    {

        $this->form_validation->set_rules('email', 'email', 'required|valid_email');
        $this->form_validation->set_rules('password', 'password', "required|max_length[25]");
        if ($this->form_validation->run() == true)
        {
            $email            = $this->input->post($this->security->xss_clean('email'));
            $password         = $this->input->post($this->security->xss_clean('password'));
            $user_information = $this->Auth_model->getUserInfor($email, $password);

            //If user exists
            if ($user_information)
            {

                $login_session    = array();
                //User Information
                $login_session['user_id']                  = $user_information->id;
                $login_session['email']                  = $user_information->email;
                $login_session['user_name']                  = $user_information->name;
                //Set session
                $this->session->set_userdata($login_session);
                redirect("Auth/index");

            }
            else
            {

                $this->session->set_flashdata('errors', 'User account or password is not available');
                redirect("Auth/index");
            }
        }
    }
    public function logOut()
    {
        //User Information
        $this->session->unset_userdata('user_id');
        $this->session->unset_userdata('name');
        $this->session->unset_userdata('email');

        redirect('Auth/index');
    }
}

