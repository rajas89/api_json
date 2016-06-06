<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of mdl_search
 *
 * @author prayoga
 */

class mdl_search extends CI_Model{

    function __construct()
    {
        parent::__construct();
    }
    
    function get_search_result($news_id,$search_word,$limit){
        $sqlquery = "SELECT news_id, image, title, descrip, url, category 
                    FROM news WHERE (title like '%$search_word%' OR descrip like '%$search_word%') 
                    AND (category = 0 OR category = 1) AND is_delete = 0 AND news_id NOT IN(?) LIMIT $limit";
        $query = $this->db->query($sqlquery, array($news_id));
        $get = $query->result();
        return $get;
    }
} 

?>