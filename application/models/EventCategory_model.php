<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class EventCategory_model extends  CI_Model
{
    var $table ='events_categories';
    public function __construct()
    {
        parent::__construct();
    }

    function viewEventCat()
    {
        return $this->db->get($this->table)->result();
    }
    function addEventCat($data)
    {
        $this->db->insert($this->table,$data);
        return ($this->db->affected_rows() != 1)?false:true;
    }
    function updateEventCat($data,$id)
    {
        $this->db->where('id',$id);
        $this->db->update($this->table,$data);
        return ($this->db->affected_rows() != 1)?false:true;
    }
    function get_by_id($id)
    {
        $query =$this->db->get_where($this->table,array('id'=>$id));
        return $query->row();
    }
 // get all listed 
    function getEventCat(){
        $return[''] = '';
        $query  = $this->db->get($this->table);
        foreach($query->result_array() as $row){
            $return[$row['id']] = $row['category_name'];
        }
        return $return;
    }

}