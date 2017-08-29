<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class EventBooking_model extends  CI_Model
{
    var $table ='events_bookings';
    public function __construct()
    {
        parent::__construct();
    }


    function viewEventBooking($id)
    {
        $this->db->select('t1.*,t2.*');
        $this->db->from('events_bookings As t1');
        $this->db->join('events As t2','t1.event_id=t2.id');
        $this->db->where('t1.id',$id);
        return $this->db->get()->row();
       //  return $this->db->get_where($this->table,array('id' =>$id))->result();
    }
    
    function getAllBookings(){

        $this->db->select('t1.*,t2.*,t3.*');
        $this->db->from('events_bookings As t1');
        $this->db->join('payments As t2','t1.id=t2.booking_id','LEFT');
        $this->db->join('events As t3','t1.event_id=t3.id','LEFT');
        return $this->db->get()->result();
    }
    function createEventBooking($data =array())
    {
        $bookingData = array(
            'event_id' =>$data['event_id'],
            'first_name'=>$data['first_name'],
            'last_name'=>$data['last_name'],
            'gender'=>$data['gender'],
            'email'=>$data['email'],
            'phone'=>$data['phone'],
            'address'=>$data['address'],
            'country'=>$data['country'],
            'state'=>$data['state'],
            'amount'=>$data['amount'],
            'payment_type'=>$data['payment_type']
            );
        if($this->db->insert($this->table,$bookingData))
        {
            $id= $this->db->insert_id();
           /* $paymentData=array(
                'booking_id'=>$id,
                'amount_paid' =>$data['amount_paid'],
                );
            $this->db->insert('payments',$paymentData);*/
            $result =($this->db->affected_rows() != 1)?false:$id;
        }
        return $result;
        //return ($this->db->affected_rows() != 1)?false:$this->db->insert_id();
    }

    function createEventPayment()
    {
          $this->db->insert($this->table,$data);
          return ($this->db->affected_rows() != 1)?false:true;
    }
    function updateEventBooking($data=array())
    {
        $bookdata=array(
            'payment_status' =>$data['payment_status'] , 
            'ticket_no'=>$data['ticket_no']
            );
        $paymentData=array(
            'booking_id' => $data['booking_id'],
            'trans_no'=>$data['trans_no'],
            'amount_paid'=>$data['amount_paid'],
            'status'=>'successful'
            );
        $this->db->where('id',$data['booking_id']);
        if($this->db->update($this->table,$bookdata))
        {
            $this->db->insert('payments',$paymentData);
        }

        return ($this->db->affected_rows() != 1)?false:true;
    }
}