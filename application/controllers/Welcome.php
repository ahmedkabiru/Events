<?php
//defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	
	  public function __construct()
    {
        parent::__construct();
         $this->load->library(array('form_validation','session','pagination'));
        $this->load->model(array('Event_model','EventCategory_model','EventLocation_model','State_model','EventBooking_model'));
        $this->load->helper('template_helper');
    }
	public function index()
	{
		 $this->session->unset_userdata('booking_id');
		 $this->session->unset_userdata('email');
		 $this->data['title'] ="HomePage";
		 $this->data['categories']=$this->EventCategory_model->viewEventCat();
		 $this->data['events']=$this->Event_model->viewEvent();
		render_user('home/index',$this->data);
	}
		public function about()
	{
		 $this->data['title'] ="About";
		render_user('home/about',$this->data);
	}
	public function events()
	{
		 $this->data['title'] ="Events";
		 $config = array();
        $config["base_url"] = site_url() . "/welcome/events";
        $config["total_rows"] = $this->db->count_all('events');
        $config["per_page"] = 1;
        $config["uri_segment"] = 3;
        //config for bootstrap pagination class integration
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['first_link'] = false;
        $config['last_link'] = false;
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['prev_link'] = '&laquo';
        $config['prev_tag_open'] = '<li class="prev">';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = '&raquo';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $this->pagination->initialize($config);
        //math to get the initial record to be select in the database
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
     /*   $limit_end = ($page * $config['per_page']) - $config['per_page'];
        if ($limit_end < 0){
            $limit_end = 0;
        }*/
        $this->data['events']=$this->Event_model->getAllEventData($config["per_page"],$page);//get all employee from  employeee table
        //$this->data['field'] = $this->employee_model->get_field();// get table  fields
        $this->data["links"] = $this->pagination->create_links();
		 // $this->data['events']=$this->Event_model->viewEvent();
		render_user('home/events',$this->data);
	}
		public function contact()
	{
		 $this->data['title'] ="Contact";
		render_user('home/contact',$this->data);
	}
	public function event_category($id)
	{
		 $this->data['title'] ="Event Category";
		 $this->data['events']=$this->Event_model->getEventByCat($id);
		  $this->data['categories']=$this->EventCategory_model->viewEventCat();
		 render_user('home/event_category',$this->data);
	}
public function event_details($id)
	{

		 $this->data['title'] ="Event Details";
		 $this->data['categories']=$this->EventCategory_model->viewEventCat();
		 $this->data['events']=$ev=$this->Event_model->viewEvent($id);
		 render_user('home/event_details',$this->data);
	}
	public function events_booking($id)
	{
		$this->data['event_id']=$id;
		$this->data['event']=$this->db->get_where('events',array('id' =>$id))->row();
		render_user('home/register',$this->data);
	}
	public function create_booking()
	{
		$data=array(
			'event_id'=>$this->input->post('event_id'),
			'first_name' => $this->input->post('first_name'),
			'last_name'=>$this->input->post('last_name'),
			'gender'=>$this->input->post('gender'), 
			'email'=>$this->input->post('email'),
			'phone'=>$this->input->post('phone'),
			'address'=>$this->input->post('address'),
			'country'=>$this->input->post('country'),
			'state'=>$this->input->post('state'),
			'amount'=>$this->input->post('amount'),
			'payment_type'=>'webpay'
			);
	    $session_id=$this->EventBooking_model->createEventBooking($data);
		$this->session->set_userdata('booking_id',$session_id);
		$this->session->set_userdata('email',$this->input->post('email'));
		redirect('welcome/view_success');

	}
	public function view_success()
	{
		//$this->load->library('paystack');
		$book_id=$this->session->userdata('booking_id');
		$this->data['events']=$ev =$this->EventBooking_model->viewEventBooking($book_id);
		render_user('home/view_success',$this->data);
	}

	public function success()
	{
	   $book_id=$this->session->userdata('booking_id');
	   $payment_status='paid';
	   $trans_no=$this->input->get('reference');
	   $amount_paid=$this->input->get('amount');
	   $ticket_no =uniqid();
	   $data =array(
	   	'payment_status' => $payment_status,
	   	'booking_id'=>$book_id,
	   	'trans_no'=>$trans_no,
	   	'ticket_no'=>$ticket_no,
	   	'amount_paid'=>$amount_paid
	   	);
	   $this->EventBooking_model->updateEventBooking($data);
	   if($this->sendMail() === TRUE)
	   {
       $content = "<h1> Your Payment Was Successful</h1> <br/>";
       $content .= "<h2>Your ticket information has been sent to your mail</h2>";
       $this->data['content']=$content;
	   }
	 render_user('home/success',$this->data);
	}
 function sendMail()
 {
     @include('Mail.php'); // includes the PEAR Mail class, already on your server.
$host = "localhost";
$username = 'jekii.kabiru@gmail.com'; // your email address
$password = 'KaMok@water.com'; // your email address password
$email=$this->session->userdata('email');
$from = "jekii.kabiru@gmail.com";
$to = $email;
$subject = "TICKET INFORMATION";
$book_id=$this->session->userdata('booking_id');
$this->data['events']=$ev =$this->EventBooking_model->viewEventBooking($book_id);
$body= $this->load->view('home/email_success',$this->data,TRUE);

$headers = array ('From' => $from, 'To' => $to, 'Subject' => $subject ,'MIME-Version' => 1,
    'Content-type' => 'text/html;charset=iso-8859-1'); // the email headers
$smtp = @Mail::factory('smtp', array ('host' =>$host, 'auth' => false, 'username' => $username, 'password' => $password, 'port' => '25')); // SMTP protocol with the username and password of an existing email account in your hosting account
$mail = @$smtp->send($to, $headers, $body); // sending the email

if (@PEAR::isError($mail)){
// echo("<p>" . $mail->getMessage() . "</p>");
	return FALSE;
}
else {
	return TRUE;
// echo("<p>Message successfully sent!</p>");
// header("Location: http://www.example.com/"); // you can redirect page on successful submission.
}

 }
	public function send_mail() { 
		$email=$this->session->userdata('email');
         $from_email = "eventng2016@gmail.com"; 
         $to_email = $email; 
   
         //Load email library 
         $this->load->library('email'); 
   
         $this->email->from($from_email, 'Your Name'); 
         $this->email->to($to_email);
         $this->email->subject('Email Test'); 
         $this->email->message('Testing the email class.'); 
   
         //Send mail 
         
        if($this->email->send()) {
            // echo $this->email->print_debugger(); die();
            return TRUE;
        } else {
            // echo $this->email->print_debugger(); die();
            return FALSE;
        }
       
      } 
	/*public function success()
	{
		$item_no            = $_REQUEST['item_number'];
		$item_transaction   = $_REQUEST['tx']; // Paypal transaction ID
		$item_price         = $_REQUEST['amt']; // Paypal received amount
		$item_currency      = $_REQUEST['cc']; // Paypal received currency type

				$price = '10.00';
				$currency='USD';

		//Rechecking the product price and currency details
		if($item_price==$price && $item_currency==$currency)
				{
       $content = "<h1>Welcome, Guest</h1>";
       $content .= "<h1>Payment Successful</h1>";
				}
        else
        {
    $content = "<h1>Payment Failed</h1>";
       }

	}
	public function cancel()
	{

$content.="<h1>Payment Canceled</h1>";
$this->data['content']=$content;
render_user('home/cancel',$this->data);
	}*/
}