<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EventsBooking extends CI_Controller
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
        $this->load->model(array('Event_model','EventCategory_model','EventLocation_model','EventBooking_model'));
    }
     
     public function index(){
        $this->data['title']="Bookings";
        $this->data['bookings']= var_dump($this->EventBooking_model->getAllBookings()); die();
        render_admin('eventsbooking/index');
     }


}