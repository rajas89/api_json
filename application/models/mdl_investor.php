<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of mdl_investor
 *
 * @author prayoga
 */


class mdl_investor extends CI_Model{

    function __construct()
    {
        parent::__construct();
    } 
    
    function get_divident_info($id_page){
        $strsql= "SELECT page_id,menu_id,isi,image,publish_date,title FROM page 
                WHERE page_id='".$id_page."' AND is_delete=0";
        $query = $this->db->query($strsql);
        $get = $query->result();
        return $get;
    }
    function get_corp_structure($id_page){
        $strsql= "SELECT page_id,menu_id,isi,image,publish_date,title FROM page 
                WHERE page_id='".$id_page."' AND is_delete=0";
        $query = $this->db->query($strsql);
        $get = $query->result();
        return $get;
    }
    function get_page_by_category($category){
        $strsql= "SELECT file_id,url,title,publish_date FROM file 
                WHERE category='".$category."' AND is_delete=0";
        $query = $this->db->query($strsql);
        $get = $query->result();
        return $get;
    }
}