<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of media
 *
 * @author prayoga
 */

class media extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
	$this->load->helper('form');
        $this->load->helper('url');
        $this->load->helper('file');
        $this->load->helper('cookie');
        $this->load->model('mdl_home');
        $this->load->model('mdl_media');
    }
    
    function index(){
        $this->id();
    }
    
    function id(){
        $base_url = $this->config->item('base_url');
        $data['base_url'] = $base_url;
        $data['cover_media'] = $this->mdl_media->get_cover_pic();
        $limit = "0,6";
        $news_id = 0;
        $data['offset'] = 6;
        $data['fb']='';
        $data['twitter']='';
        $data['googleplus']='';
        $data['youtube']='';
        $data['instagram']='';
        $data['data_media'] = $this->mdl_media->get_data_media($news_id,$limit);
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
        $this->load->view('media', $data);
    }
    
    function load_media(){
        $base_url = $this->config->item('base_url');
        $data['base_url'] = $base_url;
        $offset = $this->security->xss_clean($this->input->post('offset'));
        $news_id = $this->security->xss_clean($this->input->post('news_id'));
        $limit = $offset.",6";
        $offset += 6;
        $data['offset'] = $offset;
        $data['data_media'] = $this->mdl_media->get_data_media($news_id,$limit);
        $this->load->view('load_media', $data);
    }
    function page(){
        $base_url = $this->config->item('base_url');
        $data['base_url'] = $base_url;
        $news_id = $this->uri->segment(3);
        $data['fb']='';
        $data['twitter']='';
        $data['googleplus']='';
        $data['youtube']='';
        $data['instagram']='';
        $data['media_page'] = $this->mdl_media->get_media_page($news_id);
        $data['media_page_other'] = $this->mdl_media->get_media_page_other($news_id);
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
             $data['menu_id']=$d->menu_id;
             $menu_id=$data['menu_id'];
             }
        $submenu_id='11';
        $data['submenu_list'] = $this->mdl_home->getall_submenu($submenu_id);
        $this->load->view('media_page', $data);
    }
}

?>