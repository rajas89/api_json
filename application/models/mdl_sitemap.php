<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of mdl_sitemap
 *
 * @author prayoga
 */
class mdl_sitemap extends CI_Model{
    function __construct()
    {
        parent::__construct();
    }
    
    function get_sitemap_list()
    {
        $strsql= "SELECT menu_id,parent_id,title,link FROM menu WHERE parent_id = 0";
        $query = $this->db->query($strsql);
        $get = $query->result();
        return $get;
    }
    function get_sitemap_sublist($parent_id)
    {
        $strsql= "SELECT menu_id,parent_id,title,link FROM menu WHERE parent_id = ? ORDER BY title ASC";
        $query = $this->db->query($strsql, array($parent_id));
        $get = $query->result();
        return $get;
    }
}
