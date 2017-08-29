<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EventsLocation extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if (!$this->ion_auth->logged_in() && !$this->ion_auth->is_admin()) {
            // redirect them to the login page
            redirect('auth/login', 'refresh');
        }

        $this->data['user'] = $this->ion_auth->user()->row();
        $this->data['groupType'] = $this->ion_auth->get_users_groups()->row()->id;
        $this->load->model(array('Event_model','EventCategory_model','EventLocation_model'));
    }
    function  index()
    {

    }
    function  create_event_lot()
    {
        $this->data['title'] ="Create Event Location";
        $this->data['content']='events/index';
        $this->load->view('main_template',$this->data);
    }
    function  create_event_lot_action()
    {
        $this->data['title'] ="Create Event location";
        if($this->form_validation->run() == FALSE) // check if form field are filled correctly
        {
            $this->create_event_lot();
        }
        else
        {
            $data = $this->input->post(NULL, TRUE);
            $result =$this->EventLocation_model->createEventLot($data);
            if($result == TRUE)
            {
                $this->session->set_flashdata('app_success','');
                $this->session->keep_flashdata('app_success');
                redirect('events');
            }
            $this->data['content']='events/index';
            $this->load->view('main_template',$this->data);
        }
    }

    // update event information
    public function editEventLot($id)
    {
        $this->data['title']='UPDATE EVENT LOCATION';
        $ev =$this->EventLocation_model->get_by_id($id);
        if($ev)
        {
            $this->data['events']=$ev;
            //  get customers by ID
            $this->data['content']='events/edit_customer';
            $this->load->view('main_template',$this->data);
        }
        else
        {
            redirect('events');
        }
    }
    // function update information
    public function updateEventLot()
    {
        if($this->form_validation->run() == FALSE) // check if form field are filled correctly
        {

            $this->editEventLot($this->input->post('wc_id'));

        }
        else
        {
            $data = $this->input->post(NULL, TRUE);
            $id=$data['wc_id']; // update ID
            $result =$this->EventLocation_model->updateEventLot($data,$id);
            $this->session->set_flashdata('app_success',"Customer Records Updated Successfully");
            $this->session->keep_flashdata('app_success');
            redirect('events');
        }
    }

}