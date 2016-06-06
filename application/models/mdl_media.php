<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of mdl_media
 *
 * @author prayoga
 */

class mdl_media extends CI_Model{
    function __construct()
    {
        parent::__construct();
    }
    function get_cover_pic()
    {
        $sqlquery = "SELECT image FROM media WHERE is_delete = 0 AND type = 3 LIMIT 0,1";
        $query = $this->db->query($sqlquery);
        $get = $query->result();
        $cover = '';
        foreach ($get as $a){
            $cover = $a->image;
        }
        return $cover;
    }
    
    function get_data_media($news_id,$limit){
        $sqlquery = "SELECT news_id, image, title, descrip, url, category 
                    FROM news WHERE (category = 0 OR category = 1) 
                    AND is_delete = 0 AND news_id NOT IN(?) LIMIT $limit";
//        $query = $this->db->query($sqlquery);
        $query = $this->db->query($sqlquery, array($news_id));
        $get = $query->result();
        return $get;
    }
    
    function get_media_page($news_id){
        $sqlquery = "SELECT news_id, image, title, descrip, url, category, publish_date
                    FROM news WHERE news_id = ?
                    AND is_delete = 0";
        $query = $this->db->query($sqlquery, array($news_id));
        $get = $query->result();
        return $get;
    }
    function get_media_page_other($news_id){
        $sqlquery = "SELECT news_id,title, url
                    FROM news WHERE (category = 0 OR category = 1)
                    AND news_id NOT IN (?)
                    AND is_delete = 0
                    ORDER BY RAND()
                    LIMIT 5";
        $query = $this->db->query($sqlquery, array($news_id));
        $get = $query->result();
        return $get;
    }
}