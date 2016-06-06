<?php
class home extends CI_Controller{
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
        $base_url=$this->config->item('base_url');
        $data['base_url']=$base_url;
        $user_id = $this->session->userdata('user_id');
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
//        $data['category']='';
               $data['title_feat']='';
               $data['descrip_feat']='';
               $data['image_feat']='';
               $data['data_news'] = $this->mdl_home->getall_news();
               $data['data_news_featured'] = $this->mdl_home->getall_news_featured();
//                foreach ($data['data_news_featured'] as $d){
//                    $data['title_feat']=$d->title;
//                    $data['descrip_feat']=$d->descrip;
//                    $data['image_feat']=$d->image;
//                    }
               $data['sort']='desc';    
               $data['data_menu'] = $this->mdl_home->getall_menu();
               foreach ($data['data_menu'] as $d){
                    $data['menu_id']=$d->menu_id;
                    $menu_id=$data['menu_id'];
                    }
               $submenu_id='11';
               $data['submenu_list'] = $this->mdl_home->getall_submenu($submenu_id);
        $this->load->view('home', $data);
        
    }
    function load_news(){
        $base_url=$this->config->item('base_url');
        $data['base_url']=$base_url;
        $news_id = $this->security->xss_clean($this->input->post('news_id'));
//        $sort='';
        $sort=$this->uri->segment(3);
        $data['data_news'] = $this->mdl_home->getall_news_load($news_id,$sort);
        $this->load->view('load_news', $data);
    }
   
   function subscribe(){
        $already = 0;
        $subscribe_mail = $this->security->xss_clean($this->input->post('subscribe'));
        if($subscribe_mail != ''){
            $already = $this->mdl_home->check_subscriber($subscribe_mail);
            if($already == 0){
                $this->mdl_home->insert_subscriber($subscribe_mail);
            }else{
                $this->mdl_home->update_subscriber($subscribe_mail);
            }
        }
   }
   
}
?>
