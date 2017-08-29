<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        if (!$this->ion_auth->logged_in() && !$this->ion_auth->is_admin())
        {
            // redirect them to the login page
            redirect('auth/login', 'refresh');
        }
        $this->load->model(array('Count_model'));
        $this->data['user'] = $this->ion_auth->user()->row();
        $this->data['groupType']=$this->ion_auth->get_users_groups()->row()->id;
    }
    public function index()
    {
        $this->data['title']='Dashboard';
        $this->data['countEvent']=$this->Count_model->countEvent();
        $this->data['countUsers']=$this->Count_model->countUsers();
       //$this->data['menus']=$this->get_menus();
        render_admin('admin/dashboard');
    }
   /* private function render($view,$data=NULL){

        $this->layout->setLayout('/backend_template/layout_view');

        $data['header_view'] = $this->load->view('backend_template/header_view',$this->data,TRUE);
        $data['footer_view'] = $this->load->view('backend_template/footer_view',$this->data,TRUE);
        $this->layout->view($view,$data);

    }*/
}
