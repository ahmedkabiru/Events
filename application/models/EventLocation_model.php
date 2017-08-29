<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class EventLocation_model extends  CI_Model
{
    var $table ='events_locations';
    public function __construct()
    {
        parent::__construct();
    }

    function viewEventLot()
    {
        return $this->db->get($this->table)->result();
    }
    function addEventLot($data)
    {
        $this->db->insert($this->table,$data);
        return ($this->db->affected_rows() != 1)?false:true;
    }
    function updateEventLot($data)
    {
        $this->db->update($this->table,$data);
        return ($this->db->affected_rows() != 1)?false:true;
    }
    function get_by_id($id)
    {
        $query =$this->db->get_where($this->table,array('id'=>$id));
        return $query->row();
    }
}