<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Events extends CI_Controller
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
        $this->load->model(array('Event_model','EventCategory_model','EventLocation_model','State_model'));
        $this->load->helper('template_helper');
    }

    function  index()
    {
        $this->data['title'] ="Manage Event";
        $this->data['events']=$this->Event_model->viewEvent();
        render_admin('events/index');
    }

    public function do_upload($field) {
      
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '100000';
        $config['max_width'] = '3000';
        $config['max_height'] = '3000';
      /*  $out_dir='./uploads/';
       if(!file_exists($out_dir)) {
        mkdir($out_dir, '0777', true);
       }*/
        $this->load->library('upload', $config);
        $this->upload->initialize($config);

            if (!$this->upload->do_upload($field)) {
                $error = array('error' => $this->upload->display_errors());
               $this->session->set_flashdata('app_error', $error['error']);
               redirect('events/create_event');
            }
             else {

                $updata = $this->upload->data();
                $data = $updata['file_name'];
                 //  print_r($data);die();
                return $data;
            }



    }
    function  create_event()
    {
        $this->data['title'] ="Create Event";
        $this->data['eventcatlisted']=$this->EventCategory_model->getEventCat();
        $this->data['statelisted']=$this->State_model->get_state();
        render_admin('events/add');
    }
    function  create_event_action()
    {

      //  print_r("welcome"); die();
        $this->data['title'] ="Create Event";
        $this->form_validation->set_rules('ev_cat_id','event category name','required');
        if($this->form_validation->run() == FALSE) // check if form field are filled correctly
        {
            $this->create_event();
        }
        else
        {

            if(strlen($_FILES['userfile']['name']) >0)
            {
                $image = $this->do_upload('userfile');

            }
            else
            {
                $image ='';
            }
           
            $data = array(
                'ev_cat_id' => $this->input->post('ev_cat_id'),
                'ev_title'=>$this->input->post('ev_title'),
                'ev_location'=>$this->input->post('ev_location'),
                'ev_description'=>$this->input->post('ev_description'),
                'ev_amount'=>$this->input->post('ev_amount'),
                'ev_startDate'=>$this->input->post('ev_startDate'),
                'ev_endDate'=>$this->input->post('ev_endDate'),
                'ev_image'=>$image
                );
           
            $result =$this->Event_model->createEvent($data);
            if($result == TRUE)
            {
                $this->session->set_flashdata('app_success','Event Created Successfully');
                $this->session->keep_flashdata('app_success');
                redirect('events/index');
            }
              render_admin('events/index');
        }
    }


function ajax_edit_event_popup()
    {

          $this->data['id'] =$id= $_POST['id'];  
          $this->data['eventcatlisted']=$this->EventCategory_model->getEventCat();
          $this->data['statelisted']=$this->State_model->get_state();
          $this->data['events']=$this->Event_model->get_by_id($id);
        // get your data by manufacture id and passed to the modal 
          echo $this->load->view('events/edit_event',$this->data,true);
    }
    // update event information
    public function editEvent($id)
    {
        $this->data['title']= 'UPDATE EVENT';
        $ev =$this->Event_model->get_by_id($id);
        if($ev)
        {
            $this->data['events']=$ev;
            //  get customers by ID
            $this->data['content']='events/edit_customer';
            $this->load->view('main_template',$this->data);
        }
        else
        {
            redirect('events/index');
        }
    }
    // function update customer information
    public function updateEvent()
    {
       
            $data = $this->input->post(NULL, TRUE);
            $id=$data['id']; // update ID
            $result =$this->Event_model->updateEvent($data,$id);
            $this->session->set_flashdata('app_success',"Event Updated Successfully");
            $this->session->keep_flashdata('app_success');
            redirect('events/index');
        
    }

    public function deleteEvent($id){
       $result=  $this->Event_model->deleteEvent($id);
       if($result){
         $this->session->set_flashdata('app_success',"Event Deleted Successfully");
         $this->session->keep_flashdata('app_success');
         redirect('events/index');
       }
       else{
         $this->session->set_flashdata('app_error',"Error Deleting event");
         $this->session->keep_flashdata('app_error');
       }
       
    }

}