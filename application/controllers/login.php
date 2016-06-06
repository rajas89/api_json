<?php
class login extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
		$this->load->helper('form');
        $this->load->helper('url');
        $this->load->helper('file');
        $this->load->helper('cookie');
        $this->load->model('mod_login');
    }

    function index(){
        $this->id();
    }

    function id(){
        $base_url=$this->config->item('base_url');
		$data['base_url']=$base_url;
		$data['message']='';
        $this->load->view('admin/login', $data);
		if ($this->input->post('submit')) {

        $email = $this->security->xss_clean($this->input->post('email'));
        $password = $this->security->xss_clean($this->input->post('password'));

         if($email!="" || $password!=""){
                    $query = $this->mod_login->validasi();
                    $get_user_id = $this->mod_login->get_prof_id($email);
                    if($query){
                            $session = array('user_id'=>$get_user_id,'email'=>$this->input->post('email'));
                            $this->session->set_userdata($session);
                            $this->load->helper('url');
                            redirect('admin');
                    }else{
                            $this->index();
                    }
            }else{
                    redirect($base_url.'login');
            }
    }
}
	function wrongPassword()
	{
		$this->load->helper('url');
		$base_url=$this->config->item('base_url');
		$data['message']='Wrong email or password, Please try again... !';
		$data['base_url']=$base_url;

		$this->load->view('admin/login', $data);
	}
	function mustLogin()
	{
		$this->load->helper('url');

		$base_url=$this->config->item('base_url');
		$data['message']='Sorry, You Must Login First !';
		$data['base_url']=$base_url;
		$this->load->view('admin/login', $data);
	}
	function logout()
	{
        $session = array('user_id'=>'','email'=>'');
		$this->session->set_userdata($session);
		redirect('login', 'refresh');
	}
        
    
	
    
}
?>
