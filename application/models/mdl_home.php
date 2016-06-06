<?php

class mdl_home extends CI_Model{
function __construct()
    {
        parent::__construct();
    }
        function getall_media_slide(){
            $strsql= "SELECT media_id,image,link,title,descrip,order_num,type from media where is_delete=0 and type=0 order by order_num asc";
            $query = $this->db->query($strsql);
            $get = $query->result();
            return $get;
        }
        function getall_media_announcement(){
            $strsql= "SELECT media_id,image,link,title,descrip,order_num,type from media where is_delete=0 and type='1' order by order_num asc";
            $query = $this->db->query($strsql);
            $get = $query->result();
            return $get;
        }
        function getall_media_product(){
            $strsql= "SELECT media_id,image,link,title,descrip,order_num,type from media where is_delete=0 and type='2' order by order_num asc";
            $query = $this->db->query($strsql);
            $get = $query->result();
            return $get;
        }
	function getall_variable(){
            $this->db->cache_on();
            $strsql= "select `variable_id`,`share_price`,`low`,`high`, `volume`,`awards`,`employee`,`products`,
					`link_download_1_title`,`link_download_2_title`,`link_download_1`, `link_download_2`,
					`fb`,`twitter`,`googleplus`,`youtube`,`instagram`,publish_date from variable where is_delete=0";
            $query = $this->db->query($strsql);
            $get = $query->result();
            return $get;
        }
     function getall_testimonial(){
            $strsql= "SELECT testi_id,testi,from_name from testimonial where is_delete=0";
            $query = $this->db->query($strsql);
            $get = $query->result();
            return $get;
        }
	
     function getall_news(){
            $strsql= "SELECT news_id,image,url,title,descrip,category,publish_date from news where is_delete=0 order by news_id desc limit 0,3";
            $query = $this->db->query($strsql);
            $get = $query->result();
            return $get;
        }
        function getall_menu(){
            $strsql= "SELECT menu_id,parent_id,title,title_url,link,order_num from menu where is_delete=0 and parent_id=0 order by order_num asc";
            $query = $this->db->query($strsql);
            $get = $query->result();
            return $get;
        }
        function getall_submenu($id){
            $strsql= "SELECT menu_id,parent_id,title,title_url,link,order_num from menu where is_delete=0 and parent_id != 0 order by order_num asc";
            $query = $this->db->query($strsql);
            $get = $query->result();
            return $get;
        }

        function getall_news_featured(){
            $strsql= "SELECT news_id,image,url,title,descrip,category,publish_date,is_featured from news where is_featured='1' and is_delete=0 order by news_id desc";
            $query = $this->db->query($strsql);
            $get = $query->result();
            return $get;
        }
        function getall_news_load($news_id,$sort){
            $strsql= "SELECT news_id,image,url,title,descrip,category,publish_date from news a where is_delete=0 and a.news_id not in($news_id) order by a.news_id $sort limit 0,3";
            $query = $this->db->query($strsql);
            $get = $query->result();
            return $get;
        }
	function getall_files(){
            $strsql= "SELECT file_id,title,url from file where is_delete=0";
            $query = $this->db->query($strsql);
            $get = $query->result();
            return $get;
        }
		function getall_media_upd($id){
            $strsql= "SELECT media_id,image,link,title,descrip,order_num,type from media where media_id='".$id."' and is_delete=0";
            $query = $this->db->query($strsql);
            $get = $query->result();
            return $get;
        }
		function getall_news_upd($id){
            $strsql= "SELECT news_id,image,url,title,descrip,category,publish_date from news where news_id='".$id."' and is_delete=0";
            $query = $this->db->query($strsql);
            $get = $query->result();
            return $get;
        }
		function getall_testimonial_upd($id){
            $strsql= "SELECT testi_id,testi,from_name from testimonial where testi_id='".$id."' and is_delete=0";
            $query = $this->db->query($strsql);
            $get = $query->result();
            return $get;
        }
		function getall_files_upd($id){
            $strsql= "SELECT file_id,title,url from file where file_id='".$id."' and is_delete=0";
            $query = $this->db->query($strsql);
            $get = $query->result();
            return $get;
        }
        function getall_page($id_page){
            $strsql= "SELECT page_id,menu_id,isi,image,publish_date,title from page where menu_id='".$id_page."' and is_delete=0";
            $query = $this->db->query($strsql);
            $get = $query->result();
            return $get;
        }
        
        
        function submit_contact($name, $email, $phone, $country, $zipcode, $message, $type){
            $this->name = $name;
            $this->email = $email;
            $this->phone = $phone;
            $this->country = $country;
            $this->zip_code = $zipcode;
            $this->message = $message;
            $this->category = $type;

            $this->db->insert('contact', $this);
        }
        
        function insert_subscriber($subscriber_mail){
            $this->email = $subscriber_mail;
            $this->is_subscribe = 1;
            $this->publish_date = date("Y-m-d H:i:s");
            $this->update_date = date("Y-m-d H:i:s");

            $this->db->insert('subscriber', $this);
        }
        function update_subscriber($subscriber_mail){
            $data = array(
               'is_subscribe' => 1,
               'update_date' => date("Y-m-d H:i:s")
            );

            $this->db->where('email', $subscriber_mail);
            $this->db->update('subscriber', $data); 
        }
        
        function check_subscriber($subscriber_mail){
            $strsql= "SELECT COUNT(*) as total FROM subscriber WHERE email = '".$subscriber_mail."'";
            $query = $this->db->query($strsql);
            $get = $query->result();
            $total = 0;
            foreach ($get as $a)
            {
                $total = $a->total;
            }
            return $total;
        }
        
}
?>
