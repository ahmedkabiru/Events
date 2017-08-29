<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Count_model extends  CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    function countEvent()
    {
        
        return $this->db->count_all_results('events');
    }
    function countUsers()
    {
        
        return $this->db->count_all_results('users');
    }

  
}