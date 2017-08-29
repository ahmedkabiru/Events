<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EventsCategory extends CI_Controller
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
 	    $this->data['title'] ="Manage Event Categories";
        $this->data['events_category']=$this->EventCategory_model->viewEventCat();
        render_admin('eventscategory/index');
    }
    function  create_event_cat()
    {
        $this->data['title'] ="Create Event Category";
        render_admin('eventscategory/add');
    }
    function  create_event_cat_action()
    {
        $this->data['title'] ="Create Event Category";
         $this->form_validation->set_rules('category_name','Category name','required');
        if($this->form_validation->run() == FALSE) // check if form field are filled correctly
        {
            $this->create_event_cat();
        }
        else
        {
            $data = $this->input->post(NULL, TRUE);
            $result =$this->EventCategory_model->addEventCat($data);
            if($result == TRUE)
            {
                $this->session->set_flashdata('app_success','Category added Successfully');
                $this->session->keep_flashdata('app_success');
                redirect('EventsCategory');
            }
            render_admin('eventscategory/index');
        }
    }

function ajax_edit_category_popup()
    {

        //print_r($_POST); die;
          $this->data['id'] =$id= $_POST['id'];  
          $this->data['events']=$this->EventCategory_model->get_by_id($id);
        // get your data by manufacture id and passed to the modal 
          echo $this->load->view('eventscategory/edit_modal',$this->data,true);
    }
    // update event information
    public function editEventCat($id)
    {
        $this->data['title']='UPDATE EVENT CATGEORY';
        $ev =$this->EventCategory_model->get_by_id($id);
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
    public function updateEventCat()
    {
            $data =array(
                'category_name' => $this->input->post('category_name'),
                'category_description' => $this->input->post('category_description')
             );
            $id=$this->input->post('id'); // update ID
            $result =$this->EventCategory_model->updateEventCat($data,$id);
            $this->session->set_flashdata('app_success',"Category Updated Successfully");
            $this->session->keep_flashdata('app_success');
            redirect('EventsCategory');
    }


}