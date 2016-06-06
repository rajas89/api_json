<?php
class tolakangin extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
	$this->load->helper('form');
        $this->load->helper('url');
        $this->load->helper('file');
        $this->load->helper('cookie');
        $this->load->model('mdl_admin');
    }

    function index(){
        $this->id();
    }

    function id(){
        $base_url=$this->config->item('base_url');
        $data['base_url']=$base_url;
        $user_id = $this->session->userdata('user_id');
        $this->load->view('tolakangin', $data);
        
    }
  
	
}
?>
