<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Event_model extends  CI_Model
{
    var $table ='events';
    public function __construct()
    {
        parent::__construct();
    }

    function viewEvent($id=null)
    {
        $this->db->select('t1.*,t2.category_name');
        $this->db->from('events As t1');
        $this->db->join('events_categories As t2','t1.ev_cat_id=t2.id','left');
if($id)
{
        $this->db->where('t1.id',$id);
        return $this->db->get()->row();
}
else
{

    return $this->db->get()->result();
}
    }

    function getEventByCat($id)
    {
        $this->db->select('t1.*,t2.category_name');
        $this->db->from('events As t1');
        $this->db->join('events_categories As t2','t1.ev_cat_id=t2.id','left');
        $this->db->where('ev_cat_id',$id);
        return $this->db->get()->result();
    }
    function createEvent($data)
    {
        $this->db->insert($this->table,$data);
        return ($this->db->affected_rows() != 1)?false:true;
    }
    function updateEvent($data,$id)
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

    function deleteEvent($id){
        $this->db->where('id',$id);
        $this->db->delete($this->table);
        return ($this->db->affected_rows() != 1) ?false:true;
    }
}