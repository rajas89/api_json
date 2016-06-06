<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of search
 *
 * @author prayoga
 */

class search extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
	$this->load->helper('form');
        $this->load->helper('url');
        $this->load->helper('file');
        $this->load->helper('cookie');
        $this->load->model('mdl_home');
        $this->load->model('mdl_search');
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
        $search_word = '';
        $search_word = $this->security->xss_clean($this->input->post('search'));
        $data['search_word'] = $search_word;
        $news_id = 0;
        $limit = "0,6";
        $data['offset'] = 6;
        $data['search_result'] = $this->mdl_search->get_search_result($news_id,$search_word,$limit);
        
        $this->load->view('search', $data);
    }
    
    function load_search(){
        $base_url = $this->config->item('base_url');
        $data['base_url'] = $base_url;
        $offset = $this->security->xss_clean($this->input->post('offset'));
        $news_id = $this->security->xss_clean($this->input->post('news_id'));
        $search_word = $this->security->xss_clean($this->input->post('search_word'));
        $limit = $offset.",6";
        $offset += 6;
        $data['offset'] = $offset;
        $data['search_result'] = $this->mdl_search->get_search_result($news_id,$search_word,$limit);
        $this->load->view('load_search', $data);
    }
}

?>