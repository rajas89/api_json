<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of mdl_awards
 *
 * @author prayoga
 */
class mdl_awards extends CI_Model{
    function __construct()
    {
        parent::__construct();
    }
    
    function get_data_awards($awards_id,$limit){
        $sqlquery = "SELECT awards_id, image, title, descrip, category 
                    FROM awards WHERE is_delete = 0 AND awards_id NOT IN(?) LIMIT $limit";
        $query = $this->db->query($sqlquery, array($awards_id));
        $get = $query->result();
        return $get;
    }
    function get_detail_awards($awards_id){
        $sqlquery = "SELECT awards_id, image, title, descrip, category 
                    FROM awards WHERE awards_id = ? AND is_delete = 0";
        $query = $this->db->query($sqlquery, array($awards_id));
        $get = $query->result();
        return $get;
    }
}
