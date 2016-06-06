<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of sitemap
 *
 * @author prayoga
 */
class sitemap extends CI_Controller{
    
    public function __construct()
    {
        parent::__construct();
	$this->load->helper('form');
        $this->load->helper('url');
        $this->load->helper('file');
        $this->load->helper('cookie');
        $this->load->model('mdl_home');
        $this->load->model('mdl_sitemap');
    }

    function index(){
        $this->id();
    }

    function id(){
        $base_url = $this->config->item('base_url');
        $data['base_url']=$base_url;
        $user_id = $this->session->userdata('user_id');
        $data['fb']='';
        $data['twitter']='';
        $data['googleplus']='';
        $data['youtube']='';
        $data['instagram']='';
        $data['data_variable'] = $this->mdl_home->getall_variable();
        foreach ($data['data_variable'] as $d){
               $data['fb']=$d->fb;
               $data['twitter']=$d->twitter;
               $data['googleplus']=$d->googleplus;
               $data['youtube']=$d->youtube;
               $data['instagram']=$d->instagram;
        }
        $data['data_menu'] = $this->mdl_home->getall_menu();
            foreach ($data['data_menu'] as $d){
                $data['menu_id'] = $d->menu_id;
                $menu_id = $data['menu_id'];
            }
        $submenu_id = '11';
        $data['submenu_list'] = $this->mdl_home->getall_submenu($submenu_id);
//        $data['main_list'] = $this->mdl_sitemap->get_sitemap_list();
        $this->load->view('sitemap', $data);
    }
    
    function load_sublist(){
        $base_url = $this->config->item('base_url');
        $data['base_url']=$base_url;
        $user_id = $this->session->userdata('user_id');
        $parent_id = $this->uri->segment(3);
        
        $data['sub_list'] = $this->mdl_sitemap->get_sitemap_sublist($parent_id);
        $this->load->view('load_sublist', $data);
    }
}
