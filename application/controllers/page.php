<?php
class page extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
	$this->load->helper('form');
        $this->load->helper('url');
        $this->load->helper('file');
        $this->load->helper('cookie');
        $this->load->model('mdl_home');
        $this->load->model('mdl_awards');
    }

    function index(){
        $this->id();
    }

    
    function id(){
        $base_url=$this->config->item('base_url');
        $data['base_url']=$base_url;
        $id_page=$this->uri->segment(3);
        $data['data_media_slide'] = $this->mdl_home->getall_media_slide();
        $data['data_media_announcement'] = $this->mdl_home->getall_media_announcement();
        $data['data_media_product'] = $this->mdl_home->getall_media_product();
        $data['data_testimonial'] = $this->mdl_home->getall_testimonial();
        $data['data_variable'] = $this->mdl_home->getall_variable();
        $data['share_price']='';
        $data['low']='';
        $data['high']='';
        $data['volume']='';
        $data['awards']='';
        $data['employee']='';
        $data['products']='';
        $data['link_download_1_title']='';
        $data['link_download_2_title']='';
        $data['link_download_1']='';
        $data['link_download_2']='';
        $data['fb']='';
        $data['twitter']='';
        $data['googleplus']='';
        $data['youtube']='';
        $data['instagram']='';
        foreach ($data['data_variable'] as $d){
               $data['share_price']=$d->share_price;
               $data['low']=$d->low;
               $data['high']=$d->high;
               $data['volume']=$d->volume;
               $data['awards']=$d->awards;
               $data['employee']=$d->employee;
               $data['products']=$d->products;
               $data['link_download_1_title']=$d->link_download_1_title;
               $data['link_download_2_title']=$d->link_download_2_title;
               $data['link_download_1']=$d->link_download_1;
               $data['link_download_2']=$d->link_download_2;
               $data['fb']=$d->fb;
               $data['twitter']=$d->twitter;
               $data['googleplus']=$d->googleplus;
               $data['youtube']=$d->youtube;
               $data['instagram']=$d->instagram;
            }
               $data['title_feat']='';
               $data['descrip_feat']='';
               $data['image_feat']='';
               $data['menu_id']='';
			   
        $data['data_page'] = $this->mdl_home->getall_page($id_page);
        foreach ($data['data_page'] as $d){
               $data['menu_id']=$d->menu_id;
            }
        $data['data_menu'] = $this->mdl_home->getall_menu();
        $submenu_id='11';
               $data['submenu_list'] = $this->mdl_home->getall_submenu($submenu_id);
        $this->load->view('page', $data);
	}

    function load_awards(){
        $base_url = $this->config->item('base_url');
        $data['base_url'] = $base_url;
        $offset = $this->security->xss_clean($this->input->post('offset'));
        $awards_id = $this->security->xss_clean($this->input->post('awards_id'));
        $limit = $offset.",3";
        $offset += 3;
        $data['offset'] = $offset;
        $data['data_awards'] = $this->mdl_awards->get_data_awards($awards_id,$limit);
        $this->load->view('load_awards', $data);
    }
    
    function awards(){
        $base_url = $this->config->item('base_url');
        $data['base_url'] = $base_url;
        $awards_id = $this->security->xss_clean($this->input->post('awards_id'));
        $data['detail_awards'] = $this->mdl_awards->get_detail_awards($awards_id);
        $this->load->view('detail_awards', $data);
    }
}
?>
