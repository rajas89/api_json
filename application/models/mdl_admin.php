<?php

class mdl_admin extends CI_Model{
function __construct()
    {
        parent::__construct();
    }

    function getall_subscriber(){
            $strsql= "SELECT subscriber_id,email,is_subscribe,publish_date from subscriber where is_delete=0";
            $query = $this->db->query($strsql);
            $get = $query->result();
            return $get;
        }
        function getall_contact(){
            $strsql= "SELECT * from contact where is_delete=0";
            $query = $this->db->query($strsql);
            $get = $query->result();
            return $get;
        }
	   function getall_setting(){
            $strsql= "SELECT user_id,email,password from user_admin";
            $query = $this->db->query($strsql);
            $get = $query->result();
            return $get;
        }
	function getall_variable(){
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
		function getall_media(){
            $strsql= "SELECT media_id,image,link,title,descrip,order_num,type from media where is_delete=0";
            $query = $this->db->query($strsql);
            $get = $query->result();
            return $get;
        }
		function getall_news(){
            $strsql= "SELECT news_id,image,url,title,descrip,category,publish_date,is_featured from news where is_delete=0";
            $query = $this->db->query($strsql);
            $get = $query->result();
            return $get;
        }
        function getall_awards(){
            $strsql= "SELECT awards_id,image,title,descrip,category,publish_date from awards where is_delete=0";
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
        function getall_menu(){
            $strsql= "SELECT menu_id,parent_id,title,title_url,link,order_num from menu where is_delete=0";
            $query = $this->db->query($strsql);
            $get = $query->result();
            return $get;
        }
		function getall_page(){
            $strsql= "SELECT page_id,a.menu_id,isi,image,publish_date,a.title,b.title as menu from page a left join menu b on b.menu_id=a.menu_id where a.is_delete=0";
            $query = $this->db->query($strsql);
            $get = $query->result();
            return $get;
        }
        	function getall_page_upd($id_page){
            $strsql= "SELECT page_id,a.menu_id,isi,image,publish_date,a.title,b.title as menu from page a left join menu b on b.menu_id=a.menu_id where page_id='".$id_page."' and a.is_delete=0";
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
        function getall_awards_upd($id){
            $strsql= "SELECT awards_id,image,title,descrip,category,publish_date from awards where awards_id='".$id."' and is_delete=0";
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
            $strsql= "SELECT file_id,title,url,category from file where file_id='".$id."' and is_delete=0";
            $query = $this->db->query($strsql);
            $get = $query->result();
            return $get;
        }
        	function getall_menu_upd($id){
            $strsql= "SELECT menu_id,parent_id,title,title_url,link,order_num from menu where menu_id='".$id."' and is_delete=0";
            $query = $this->db->query($strsql);
            $get = $query->result();
            return $get;
        }
	 function delete_subscribe($subscribe_id){
			$this->db->where('subscriber_id', $subscribe_id);
		    $data = array ( 
			 'is_delete'  => '1'
		    );
		    $this->db->update('subscriber', $data);
		   }
    function delete_contact($contact_id){
            $this->db->where('contact_id', $contact_id);
            $data = array ( 
             'is_delete'  => '1'
            );
            $this->db->update('contact', $data);
           }
         
        function upd_variable($txtid,$share_price,$low,$high,$volume,$awards,$employee,$products,$link_download_1_title,$link_download_2_title,$link_download_1,$link_download_2,$fb,$tw,$googleplus,$youtube,$instagram,$user_id){
                 $this->db->where('variable_id', $txtid);
                 $data = array ( 
               'share_price'=> $share_price,
               'low' =>$low,
               'high' =>$high,
               'volume' =>$volume,
               'awards' =>$awards,
               'employee' =>$employee,
               'products' =>$products,
               'link_download_1_title' =>$link_download_1_title,
               'link_download_2_title' =>$link_download_2_title,
			   'link_download_1' =>$link_download_1,
               'link_download_2' =>$link_download_2,
			   'fb' =>$fb,
               'twitter' =>$tw,
               'googleplus' =>$googleplus,
			   'youtube' =>$youtube,
               'instagram' =>$instagram,
			   'user_id_update' =>$user_id,
			   'update_date' =>date('Y-m-d H:i:s')
                 );
                  $this->db->update('variable', $data);
                 }
        
        function add_testimonial($testi,$from){
            $data = array (
				'testi' =>  $testi,
                'from_name' => $from
             );
            $this->db->insert('testimonial', $data);
        }
		function update_testimonial($testi_id,$testi,$from,$user_id){
			$this->db->where('testi_id', $testi_id);
		    $data = array ( 
			 'testi' =>  $testi,
             'from_name' => $from,
			 'user_id_update' =>$user_id,
			 'update_date' =>date('Y-m-d H:i:s')
		    );
		    $this->db->update('testimonial', $data);
		   }
		   function delete_testimonial($testi_id){
			$this->db->where('testi_id', $testi_id);
		    $data = array ( 
			 'is_delete'  => '1'
		    );
		    $this->db->update('testimonial', $data);
		   }
		   function add_files($file_name,$category,$url){
            $data = array (
				'title' =>  $file_name,
				'category' =>  $category,
                'url' => $url
             );
            $this->db->insert('file', $data);
        }
		function delete_files($file_id){
			$this->db->where('file_id', $file_id);
		    $data = array ( 
			 'is_delete'  => '1'
		    );$this->db->update('file', $data);
        }
		function update_files($txtid,$file_name,$url,$user_id,$category){
			$this->db->where('file_id', $txtid);
		    $data = array ( 
			 'title' =>  $file_name,
             'url' => $url,
			 'user_id_update' =>$user_id,
                        'category' => $category,
			 'update_date' =>date('Y-m-d H:i:s')
		    );
		    $this->db->update('file', $data);
		   }
		function add_media($image,$title,$descrip,$order,$type){
            $data = array (
				'image' =>  $image,
                'title' => $title,
				'descrip' =>  $descrip,
                'order_num' => $order,
				'type' =>  $type
				
             );
            $this->db->insert('media', $data);
        }
		function update_media($txtid,$image,$title,$descrip,$order,$type,$user_id){
			$this->db->where('media_id', $txtid);
		    $data = array ( 
			 'image' =>  $image,
                'title' => $title,
				'descrip' =>  $descrip,
                'order_num' => $order,
				'type' =>  $type,
			 'user_id_update' =>$user_id,
			 'update_date' =>date('Y-m-d H:i:s')
		    );
		    $this->db->update('media', $data);
		}
		function update_news($txtid,$image,$title,$descrip,$url,$date,$category,$user_id){
			$this->db->where('news_id', $txtid);
		    $data = array ( 
			 'image' =>  $image,
			 'title' => $title,
			 'descrip' =>  $descrip,
			 'url' =>  $url,
			 'publish_date' => $date,
			 'category' =>  $category,
			 'user_id_update' =>$user_id,
			 'update_date' =>date('Y-m-d H:i:s')
		    );
		    $this->db->update('news', $data);
		}
		function delete_media($media_id){
			$this->db->where('media_id', $media_id);
		    $data = array ( 
			 'is_delete'  => '1'
		    );$this->db->update('media', $data);
        }
		function add_news($image,$title,$descrip,$url,$date,$category){
            $data = array (
				'image' =>  $image,
                'title' => $title,
				'descrip' =>  $descrip,
				'url' =>  $url,
                'publish_date' => $date,
				'category' =>  $category
				
             );
            $this->db->insert('news', $data);
        }
		function delete_news($news_id){
			$this->db->where('news_id', $news_id);
		    $data = array ( 
			 'is_delete'  => '1'
		    );$this->db->update('news', $data);
        }
		function set_featured($news_id){
			$this->db->where('news_id', $news_id);
		    $data = array ( 
			 'is_featured'  => '1'
		    );$this->db->update('news', $data);
		}
		function remove_featured($news_id){
			$this->db->where('news_id', $news_id);
		    $data = array ( 
			 'is_featured'  => '0'
		    );$this->db->update('news', $data);
		}
		function update_password($txtid,$password){
			$this->db->where('user_id', $txtid);
		    $data = array ( 
			 'password' =>  $password
		    );
		    $this->db->update('user_admin', $data);
		   }	
        function add_page($page,$img,$title,$menu_id){
            $data = array (
				'isi' =>  $page,
				'image' => $img,
                                'title' =>  $title,
                                'menu_id' => $menu_id
             );
            $this->db->insert('page', $data);
        }
        function update_page($txtid,$page,$img,$title,$menu_id,$user_id){
		$this->db->where('page_id', $txtid);
		    $data = array ( 
		    'isi' =>  $page,
                    'image' => $img,
                    'title' =>  $title,
                    'menu_id' => $menu_id,
		    'user_id_update' =>$user_id,
		    'update_date' =>date('Y-m-d H:i:s')
		    );
		    $this->db->update('page', $data);
		}
        function delete_page($page_id){
                $this->db->where('page_id', $page_id);
            $data = array ( 
                    'is_delete'  => '1'
            );
            $this->db->update('page', $data);
            }
            function add_menu($parent_id,$title,$title_url,$link,$order){
            $data = array (
			'parent_id' =>  $parent_id,
                         'title' => $title,
                        'title_url' =>  $title_url,
                         'link' => $link,
                        'order_num' => $order
             );
            $this->db->insert('menu', $data);
        }
		function update_menu($menu_id,$parent_id,$title,$title_url,$link,$order,$user_id){
		    $this->db->where('menu_id', $menu_id);
		    $data = array ( 
			 'parent_id' =>  $parent_id,
                         'title' => $title,
                        'title_url' =>  $title_url,
                         'link' => $link,
                        'order_num' => $order,
			 'user_id_update' =>$user_id,
			 'update_date' =>date('Y-m-d H:i:s')
		    );
		    $this->db->update('menu', $data);
		   }
		   function delete_menu($menu_id){
			$this->db->where('menu_id', $menu_id);
		    $data = array ( 
			 'is_delete'  => '1'
		    );
		    $this->db->update('menu', $data);
		   }
        function add_awards($image,$title,$descrip,$date,$category){
            $data = array (
		'image' =>  $image,
                'title' => $title,
		'descrip' =>  $descrip,
                'publish_date' => $date,
		'category' =>  $category
				
             );
            $this->db->insert('awards', $data);
        }
        function update_awards($txtid,$image,$title,$descrip,$date,$category,$user_id){
			$this->db->where('awards_id', $txtid);
		    $data = array ( 
			 'image' =>  $image,
			 'title' => $title,
			 'descrip' =>  $descrip,
			 'publish_date' => $date,
			 'category' =>  $category,
			 'user_id_update' =>$user_id,
			 'update_date' =>date('Y-m-d H:i:s')
		    );
		    $this->db->update('awards', $data);
		}
		function delete_awards($awards_id){
			$this->db->where('awards_id', $awards_id);
		    $data = array ( 
			 'is_delete'  => '1'
		    );$this->db->update('awards', $data);
        }
		 function getall_api_karyawan(){
            $strsql= "SELECT * from karyawan";
            $query = $this->db->query($strsql);
            $get = $query->result();
            return $get;
        }
		 function getall_api_karyawan_detail($id){
            $strsql= "SELECT * from karyawan where id='".$id."' ";
            $query = $this->db->query($strsql);
            $get = $query->result();
            return $get;
        }
		 function add_karyawan($nama,$umur,$alamat){
				$data = array (
				'nama_karyawan' =>  $nama,
				'umur' => $umur,
				'alamat' =>  $alamat,
				'updated_at' =>date('Y-m-d H:i:s')

				);
				$this->db->insert('karyawan', $data);
        }
		function update_karyawan($id,$nama,$umur,$alamat){
			$this->db->where('id', $id);
		    $data = array ( 
			'nama_karyawan' =>  $nama,
				'umur' => $umur,
				'alamat' =>  $alamat,
				'updated_at' =>date('Y-m-d H:i:s')
		    );
		    $this->db->update('karyawan', $data);
		}
		function delete_karyawan($id){
        $this->db->where('id',$id);
        $data = array(
            'status' =>'1'
        );
        $this->db->update('karyawan', $data);
    } 
}
?>
