<?php

/**
 * Description of contact
 *
 * @author prayoga
 */
class contact extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
	$this->load->helper('form');
        $this->load->helper('url');
        $this->load->helper('file');
        $this->load->helper('cookie');
        $this->load->model('mdl_home');
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
        $this->load->view('contact_us', $data);
    }
    
    function submit_contact(){
        $base_url = $this->config->item('base_url');
        $data['base_url'] = $base_url;
        $contact_name = $this->security->xss_clean($this->input->post('input_name'));
        if($contact_name == ''){
            redirect('/contact', 'refresh');
        }
        $contact_email = $this->security->xss_clean($this->input->post('input_email'));
        $contact_phone = $this->security->xss_clean($this->input->post('input_phone'));
        $contact_country = $this->security->xss_clean($this->input->post('input_country'));
        $contact_zipcode = $this->security->xss_clean($this->input->post('input_zipcode'));
        $contact_message = $this->security->xss_clean($this->input->post('input_message'));
        $contact_type = $this->security->xss_clean($this->input->post('type_form'));
        
        $this->mdl_home->submit_contact($contact_name,$contact_email,$contact_phone,$contact_country,
                                        $contact_zipcode,$contact_message,$contact_type);
        redirect('/contact', 'refresh');
    }
}

?>