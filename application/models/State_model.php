<?php
class State_model extends CI_Model
{
	var $table = 'states';
    function get_state(){
        $return[''] = '';
        $query  = $this->db->get($this->table);
        foreach($query->result_array() as $row){
            $return[$row['statename']] = $row['statename'];
        }
        return $return;
    }




}



?>