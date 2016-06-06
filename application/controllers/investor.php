<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of investor
 *
 * @author prayoga
 */
class investor extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
	$this->load->helper('form');
        $this->load->helper('url');
        $this->load->helper('file');
        $this->load->helper('cookie');
        $this->load->model('mdl_home');
        $this->load->model('mdl_investor');
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
        
        $corp_structure_id = '34';
        $devident_id = '36';
        $data['investor_update'] = $this->mdl_investor->get_page_by_category('1');
        $data['finance_statement'] = $this->mdl_investor->get_page_by_category('2');
        $data['comp_presentation'] = $this->mdl_investor->get_page_by_category('3');
        $data['corp_structure'] = $this->mdl_investor->get_corp_structure($corp_structure_id);
        $data['divident_info'] = $this->mdl_investor->get_divident_info($devident_id);
        $this->load->view('investor', $data);
    }
}

?>