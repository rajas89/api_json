<?php
class admin extends CI_Controller{
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
		if($user_id =='' || $user_id =='0' || $user_id =='null'){
			redirect('login');
		}
        $this->load->view('admin/admin_home', $data);
        
    }
	  function getkaryawan_api_angular(){
	  
        $data['base_url'] = $this->config->item('base_url');
        $data=$this->mdl_admin->getall_api_karyawan();
        $a='';
        foreach($data as $p){
            $a[]=array(
                "nama"=>$p->nama_karyawan,
				"umur"=>$p->umur,
				"alamat"=>$p->alamat,
				"updated_at"=>date('F d, Y',  strtotime($p->updated_at))	
            );
        }
        echo json_encode($a);
    }
	function insertdata_karyawan_angular(){
        $data['base_url'] = $this->config->item('base_url'); 
		$nama=$this->security->xss_clean($this->input->post('nama'));
		$umur=$this->security->xss_clean($this->input->post('umur'));
		$alamat=$this->security->xss_clean($this->input->post('alamat'));
       $this->mdl_admin->add_karyawan($nama,$umur,$alamat);                                      
               
              
        }
	   function getkaryawan_api(){
	
        $data['base_url'] = $this->config->item('base_url');
		$data["get"] = $this->mdl_admin->getall_api_karyawan();
		$c=array("jumlah"=>count($data["get"]),"data"=>array());
		foreach($data["get"] as $p){			
			$nama=$p->nama_karyawan;
			$umur=$p->umur;
			$alamat=$p->alamat;
			$updated_at=$p->updated_at;
           	$b=array(
				"nama"=>$p->nama_karyawan,
				"umur"=>$p->umur,
				"alamat"=>$p->alamat,
				"updated_at"=>date('F d, Y',  strtotime($p->updated_at))		
				
			);
			array_push($c["data"], $b);
		}
		echo json_encode($c);
    }
	function insertdata_karyawan(){
		$data['base_url'] = $this->config->item('base_url'); 
		$nama=$this->security->xss_clean($this->input->post('nama'));
		$umur=$this->security->xss_clean($this->input->post('umur'));
		$alamat=$this->security->xss_clean($this->input->post('alamat'));
		$stat="0";
        if($nama!='' && $umur!='' && $alamat!=''){
			$stat="1";
			$this->mdl_admin->add_karyawan($nama,$umur,$alamat);
		}
		$b=array("status"=>$stat);
		$c=array("data"=>array());
		array_push($c["data"], $b);
		echo json_encode($c);
	
	}
	function edit_karyawan(){		
		$data['base_url'] = $this->config->item('base_url'); 
		$id=$this->security->xss_clean($this->input->post('id'));
		$nama=$this->security->xss_clean($this->input->post('nama'));
		$umur=$this->security->xss_clean($this->input->post('umur'));
		$alamat=$this->security->xss_clean($this->input->post('alamat'));
		$stat="0";
		if($nama!='' && $umur!='' && $alamat!=''){
			$stat="1";
			$this->mdl_admin->update_karyawan($id,$nama,$umur,$alamat);
		}
		$b=array("status"=>$stat);
		$c=array("data"=>array());
		array_push($c["data"], $b);
		echo json_encode($c);            
	
	}
	function delete_karyawan(){	
		$data['base_url'] = $this->config->item('base_url'); 
		$id=$this->security->xss_clean($this->input->post('id'));
		$stat="0";
		if($nama!='' && $umur!='' && $alamat!=''){
			$stat="1";
			$this->mdl_admin->delete_karyawan($id,$nama,$umur,$alamat);
		}
		$b=array("status"=>$stat);
		$c=array("data"=>array());
		array_push($c["data"], $b);
		echo json_encode($c);            
	
	}
	function edit_news(){
            $id= $this->uri->segment(3);
            $base_url=$this->config->item('base_url');
		    $data['base_url']=$base_url;
		    $user_id = $this->session->userdata('user_id');
			if($user_id =='' || $user_id =='0' || $user_id =='null'){
				redirect('login');
			}
           $data['data_news'] = $this->mdl_admin->getall_api_karyawan_detail($id);

           foreach ($data['data_news'] as $d){
               $data['id']=$d->id;
               $data['nama']=$d->nama_karyawan;
               $data['umur']=$d->umur;
			   $data['alamat']=$d->alamat;
            }
            $this->load->view('admin/edit_news',$data);

        }
	function media(){
		 $base_url=$this->config->item('base_url');
		$data['base_url']=$base_url;
		$user_id = $this->session->userdata('user_id');
		if($user_id =='' || $user_id =='0' || $user_id =='null'){
			redirect('login');
		}
		$data['data_media'] = $this->mdl_admin->getall_media();
        $this->load->view('admin/list_media', $data);
	}
	function add_media(){
		 $base_url=$this->config->item('base_url');
		$data['base_url']=$base_url;
		$user_id = $this->session->userdata('user_id');
		if($user_id =='' || $user_id =='0' || $user_id =='null'){
			redirect('login');
		}
		 $data['status_error']='';
        $this->load->view('admin/media', $data);
	}
	function insert_media(){
				$base_url=$this->config->item('base_url');
				$data['base_url']=$base_url;
				$user_id = $this->session->userdata('user_id');
				if($user_id =='' || $user_id =='0' || $user_id =='null'){
					redirect('login');
				}
				
                $config['file_name'] = 'SIDOMUNCUL'.date("YmdHis").rand(100, 999).'-'.$user_id;
                $config['upload_path'] = './sido_img/media_img';
                ini_set('memory_limit', '512M');
                $config['allowed_types'] = 'jpeg|jpg|png';
                $config['max_size']  = '10240';
                $config['max_width']  = '0';
                $config['max_height']  = '0';
                $this->load->library('upload', $config);
                $upload = $this->upload->do_upload('attach');
                if($upload == false) {
                    $data['base_url']=$base_url;
                    $data['warning'] = $this->upload->display_errors();
                    $data['status_error']='1';
                    $data['data_media'] = $this->mdl_admin->getall_media();
					
					$image = $this->security->xss_clean($this->input->post('image'));
					$user_id = $this->session->userdata('user_id');
                    $txtid=$this->security->xss_clean($this->input->post('txtid'));
                    $title=$this->security->xss_clean($this->input->post('title'));
					$descrip=$this->security->xss_clean($this->input->post('descrip'));
					$order=$this->security->xss_clean($this->input->post('order'));
					$type=$this->security->xss_clean($this->input->post('type'));
					$this->mdl_admin->add_media($image,$title,$descrip,$order,$type);
					redirect('admin/media', 'location');
                }
                else {
                    $data = $this->upload->data();
                    $image = $base_url.'sido_img/media_img/'.$data['file_name'];
                    $title=$this->security->xss_clean($this->input->post('title'));
					$descrip=$this->security->xss_clean($this->input->post('descrip'));
					$order=$this->security->xss_clean($this->input->post('order'));
					$type=$this->security->xss_clean($this->input->post('type'));
                    $this->mdl_admin->add_media($image,$title,$descrip,$order,$type);
                    redirect('admin/media', 'location');
                }
                    
                   
					  
                    redirect('admin/media','location');
        }
		function edit_media(){
            $id= $this->uri->segment(3);
            $base_url=$this->config->item('base_url');
		    $data['base_url']=$base_url;
		    $user_id = $this->session->userdata('user_id');
			if($user_id =='' || $user_id =='0' || $user_id =='null'){
				redirect('login');
			}
           $data['data_media'] = $this->mdl_admin->getall_media_upd($id);

           foreach ($data['data_media'] as $d){
               $data['media_id']=$d->media_id;
               $data['image']=$d->image;
               $data['link']=$d->link;
			   $data['title']=$d->title;
               $data['descrip']=$d->descrip;
               $data['order_num']=$d->order_num;
			   $data['type']=$d->type;
            }
            $this->load->view('admin/edit_media',$data);

        }
		function update_media(){
					
                $base_url=$this->config->item('base_url');
				$data['base_url']=$base_url;
				$user_id = $this->session->userdata('user_id');
				if($user_id =='' || $user_id =='0' || $user_id =='null'){
					redirect('login');
				}
				
                $config['file_name'] = 'SIDOMUNCUL'.date("YmdHis").rand(100, 999).'-'.$user_id;
                $config['upload_path'] = './sido_img/media_img';
                ini_set('memory_limit', '512M');
                $config['allowed_types'] = 'jpeg|jpg|png';
                $config['max_size']  = '10240';
                $config['max_width']  = '0';
                $config['max_height']  = '0';
                $this->load->library('upload', $config);
                $upload = $this->upload->do_upload('attach');
                if($upload == false) {
                    $data['base_url']=$base_url;
                    $data['warning'] = $this->upload->display_errors();
                    $data['status_error']='1';
                    $data['data_media'] = $this->mdl_admin->getall_media();
					$edit_file = $this->security->xss_clean($this->input->post('edit_file'));
					$user_id = $this->session->userdata('user_id');
                    $txtid=$this->security->xss_clean($this->input->post('txtid'));
                    $title=$this->security->xss_clean($this->input->post('title'));
					$descrip=$this->security->xss_clean($this->input->post('descrip'));
					$order=$this->security->xss_clean($this->input->post('order'));
					$type=$this->security->xss_clean($this->input->post('type'));
                    $this->mdl_admin->update_media($txtid,$edit_file,$title,$descrip,$order,$type,$user_id);
                    redirect('admin/media', 'location');
                }
                else {
                    $data = $this->upload->data();
                    $image = $base_url.'sido_img/media_img/'.$data['file_name'];
					$user_id = $this->session->userdata('user_id');
                    $txtid=$this->security->xss_clean($this->input->post('txtid'));
                    $title=$this->security->xss_clean($this->input->post('title'));
					$descrip=$this->security->xss_clean($this->input->post('descrip'));
					$order=$this->security->xss_clean($this->input->post('order'));
					$type=$this->security->xss_clean($this->input->post('type'));
                    $this->mdl_admin->update_media($txtid,$image,$title,$descrip,$order,$type,$user_id);
                    redirect('admin/media', 'location');
                }
                    
                   
					  
                    redirect('admin/media','location');
        }
		function delete_media(){
		    $id=$this->uri->segment(3);
			$this->mdl_admin->delete_media($id);
		 redirect('admin/media', 'location');
		}
	function news(){
		 $base_url=$this->config->item('base_url');
		$data['base_url']=$base_url;
		$user_id = $this->session->userdata('user_id');
		if($user_id =='' || $user_id =='0' || $user_id =='null'){
			redirect('login');
		}
		$data['data_news'] = $this->mdl_admin->getall_news();
        $this->load->view('admin/list_news', $data);
	}
	function add_news(){
		 $base_url=$this->config->item('base_url');
		$data['base_url']=$base_url;
		$user_id = $this->session->userdata('user_id');
		if($user_id =='' || $user_id =='0' || $user_id =='null'){
			redirect('login');
		}
		 $data['status_error']='';
        $this->load->view('admin/news', $data);
	}
	function insert_news(){
				$base_url=$this->config->item('base_url');
				$data['base_url']=$base_url;
				$user_id = $this->session->userdata('user_id');
				if($user_id =='' || $user_id =='0' || $user_id =='null'){
					redirect('login');
				}
				
                $config['file_name'] = 'SIDOMUNCUL'.date("YmdHis").rand(100, 999).'-'.$user_id;
                $config['upload_path'] = './sido_img/news_img';
                ini_set('memory_limit', '512M');
                $config['allowed_types'] = 'mp4|MP4|3gp|avi|doc|docx|word|pdf|zip|rar|xls|ppt|bmp|gif|jpeg|jpg|png|xlsx|pptx';
                $config['max_size']  = '60240';
                $config['max_width']  = '0';
                $config['max_height']  = '0';
                $config['overwrite'] = FALSE;
                $config['remove_spaces'] = TRUE;
                $this->load->library('upload', $config);
                $upload = $this->upload->do_upload('attach');
                if($upload == false) {
                    $data['base_url']=$base_url;
                    $data['warning'] = $this->upload->display_errors();
                    $data['status_error']='1';
                    $data['data_news'] = $this->mdl_admin->getall_news();
					$image = $this->security->xss_clean($this->input->post('image'));
                    $title=$this->security->xss_clean($this->input->post('title'));
					$descrip=$this->security->xss_clean($this->input->post('descrip'));
					$url=$this->security->xss_clean($this->input->post('url'));
					$category=$this->security->xss_clean($this->input->post('category'));
					$date=$this->security->xss_clean($this->input->post('date'));
                    $this->mdl_admin->add_news($image,$title,$descrip,$url,$date,$category);
                    redirect('admin/news', 'location');
                }
                else {
                    $data = $this->upload->data();
                    $image = $base_url.'sido_img/news_img/'.$data['file_name'];
                    $title=$this->security->xss_clean($this->input->post('title'));
					$descrip=$this->security->xss_clean($this->input->post('descrip'));
					$url=$this->security->xss_clean($this->input->post('url'));
					$category=$this->security->xss_clean($this->input->post('category'));
					$date=$this->security->xss_clean($this->input->post('date'));
                    $this->mdl_admin->add_news($image,$title,$descrip,$url,$date,$category);
                    redirect('admin/news', 'location');
                }
                    
                   
					  
                    redirect('admin/news','location');
        }
		
		function update_news(){
					
                
				$base_url=$this->config->item('base_url');
				$data['base_url']=$base_url;
				$user_id = $this->session->userdata('user_id');
				if($user_id =='' || $user_id =='0' || $user_id =='null'){
					redirect('login');
				}
		$config['file_name'] = 'SIDOMUNCUL'.date("YmdHis").rand(100, 999).'-'.$user_id;
                $config['upload_path'] = './sido_img/news_img';
                ini_set('memory_limit', '512M');
                $config['allowed_types'] = 'mp4|MP4|3gp|avi|doc|docx|word|pdf|zip|rar|xls|ppt|bmp|gif|jpeg|jpg|png|xlsx|pptx';
                $config['max_size']  = '10240';
                $config['max_width']  = '0';
                $config['max_height']  = '0';
                $this->load->library('upload', $config);
                $upload = $this->upload->do_upload('attach');
                if($upload == false) {
                    $data['base_url']=$base_url;
                    $data['warning'] = $this->upload->display_errors();
                    $data['status_error']='1';
                    $data['data_news'] = $this->mdl_admin->getall_news();
					$edit_file = $this->security->xss_clean($this->input->post('edit_file'));
					$user_id = $this->session->userdata('user_id');
                    $txtid=$this->security->xss_clean($this->input->post('txtid'));
                    $title=$this->security->xss_clean($this->input->post('title'));
					$descrip=$this->security->xss_clean($this->input->post('descrip'));
					$url=$this->security->xss_clean($this->input->post('url'));
					$category=$this->security->xss_clean($this->input->post('category'));
					$date=$this->security->xss_clean($this->input->post('date'));
                    $this->mdl_admin->update_news($txtid,$edit_file,$title,$descrip,$url,$date,$category,$user_id);
                    redirect('admin/news', 'location');
                }
                else {
                    $data = $this->upload->data();
                    $image = $base_url.'sido_img/news_img/'.$data['file_name'];
					$user_id = $this->session->userdata('user_id');
                    $txtid=$this->security->xss_clean($this->input->post('txtid'));
                    $title=$this->security->xss_clean($this->input->post('title'));
					$descrip=$this->security->xss_clean($this->input->post('descrip'));
					$url=$this->security->xss_clean($this->input->post('url'));
					$category=$this->security->xss_clean($this->input->post('category'));
					$date=$this->security->xss_clean($this->input->post('date'));
                    $this->mdl_admin->update_news($txtid,$image,$title,$descrip,$url,$date,$category,$user_id);
                    redirect('admin/news', 'location');
                }
				
                    redirect('admin/news','location');
        }
		function delete_news(){
		    $id=$this->uri->segment(3);
			$this->mdl_admin->delete_news($id);
		 redirect('admin/news', 'location');
		}
		function set_featured(){
			$id=$this->uri->segment(3);
			$this->mdl_admin->set_featured($id);
		 redirect('admin/news', 'location');
		}
		function remove_featured(){
			$id=$this->uri->segment(3);
			$this->mdl_admin->remove_featured($id);
		 redirect('admin/news', 'location');
		}
	function testimonial(){
		 $base_url=$this->config->item('base_url');
		$data['base_url']=$base_url;
		$user_id = $this->session->userdata('user_id');
		if($user_id =='' || $user_id =='0' || $user_id =='null'){
			redirect('login');
		}
		$data['data_testi'] = $this->mdl_admin->getall_testimonial();
        $this->load->view('admin/list_testimonial', $data);
	}
	function add_testimonial(){
		 $base_url=$this->config->item('base_url');
		$data['base_url']=$base_url;
		$user_id = $this->session->userdata('user_id');
		if($user_id =='' || $user_id =='0' || $user_id =='null'){
			redirect('login');
		}
        $this->load->view('admin/testimonial', $data);
	}
	function insert_testimonial(){
					
                    $testi=$this->security->xss_clean($this->input->post('testimonial'));
					$from=$this->security->xss_clean($this->input->post('from'));
                    $this->mdl_admin->add_testimonial($testi,$from);
                   
					  
                    redirect('admin/testimonial','location');
        }
		function edit_testimonial(){
            $id= $this->uri->segment(3);
            $base_url=$this->config->item('base_url');
		    $data['base_url']=$base_url;
		    $user_id = $this->session->userdata('user_id');
			if($user_id =='' || $user_id =='0' || $user_id =='null'){
				redirect('login');
			}
           $data['data_testi'] = $this->mdl_admin->getall_testimonial_upd($id);

           foreach ($data['data_testi'] as $d){
               $data['testi_id']=$d->testi_id;
               $data['testi']=$d->testi;
               $data['from_name']=$d->from_name;
            }
            $this->load->view('admin/edit_testimonial',$data);

        }
		function update_testimonial(){
					$user_id = $this->session->userdata('user_id');
                    $txtid=$this->security->xss_clean($this->input->post('txtid'));
                    $testi=$this->security->xss_clean($this->input->post('testimonial'));
					$from=$this->security->xss_clean($this->input->post('from'));
                    $this->mdl_admin->update_testimonial($txtid,$testi,$from,$user_id);
                   
					  
                    redirect('admin/testimonial','location');
        }
		function delete_testimonial(){
		    $id=$this->uri->segment(3);
			$this->mdl_admin->delete_testimonial($id);
		 redirect('admin/testimonial', 'location');
		}
	function files(){
		 $base_url=$this->config->item('base_url');
		$data['base_url']=$base_url;
		$user_id = $this->session->userdata('user_id');
		if($user_id =='' || $user_id =='0' || $user_id =='null'){
			redirect('login');
		}
		$data['data_files'] = $this->mdl_admin->getall_files();
        $this->load->view('admin/list_files', $data);
	}
	function add_files(){
		 $base_url=$this->config->item('base_url');
		$data['base_url']=$base_url;
		$data['status_error']='';
		$user_id = $this->session->userdata('user_id');
		if($user_id =='' || $user_id =='0' || $user_id =='null'){
			redirect('login');
		}
        $this->load->view('admin/files', $data);
	}
	function insert_files(){
                $base_url=$this->config->item('base_url');
				$data['base_url']=$base_url;
				$user_id = $this->session->userdata('user_id');
				if($user_id =='' || $user_id =='0' || $user_id =='null'){
					redirect('login');
				}
				
                $config['file_name'] = 'SIDOMUNCUL'.date("YmdHis").rand(100, 999).'-'.$user_id;
                $config['upload_path'] = './allmedia/files';
                ini_set('memory_limit', '512M');
                $config['allowed_types'] = 'mp4|MP4|3gp|doc|docx|word|pdf|zip|rar|xls|ppt|bmp|gif|jpeg|jpg|png|txt|xlsx|pptx';
                $config['max_size']  = '10240';
                $config['max_width']  = '0';
                $config['max_height']  = '0';
                $this->load->library('upload', $config);
                $upload = $this->upload->do_upload('attach');
                if($upload == false) {
                    $data['base_url']=$base_url;
                    $data['warning'] = $this->upload->display_errors();
                    $data['status_error']='1';
                    $data['data_files'] = $this->mdl_admin->getall_files();
                    $this->load->view('admin/list_files',$data);
                }
                else {
                    $data = $this->upload->data();
                    $url = $base_url.'allmedia/files/'.$data['file_name'];
                    $file_name = $this->security->xss_clean($this->input->post('title'));
                    $category=$this->security->xss_clean($this->input->post('category'));
                    $this->mdl_admin->add_files($file_name,$category,$url);
                    redirect('admin/files', 'location');
                }
                redirect('admin/files','location');
        }
		function edit_files(){
            $id= $this->uri->segment(3);
            $base_url=$this->config->item('base_url');
		    $data['base_url']=$base_url;
		    $user_id = $this->session->userdata('user_id');
			if($user_id =='' || $user_id =='0' || $user_id =='null'){
				redirect('login');
			}
			$data['status_error']='';
           $data['data_files'] = $this->mdl_admin->getall_files_upd($id);

           foreach ($data['data_files'] as $d){
               $data['file_id']=$d->file_id;
               $data['url']=$d->url;
               $data['title']=$d->title;
               $data['category']=$d->category;
            }
            $this->load->view('admin/edit_files',$data);

        }
		function update_files(){
			$base_url=$this->config->item('base_url');
				$data['base_url']=$base_url;
                    
                    $user_id = $this->session->userdata('user_id');
				if($user_id =='' || $user_id =='0' || $user_id =='null'){
					redirect('login');
				}
				
                $config['file_name'] = 'SIDOMUNCUL'.date("YmdHis").rand(100, 999).'-'.$user_id;
                $config['upload_path'] = './allmedia/files';
                ini_set('memory_limit', '512M');
                $config['allowed_types'] = 'mp4|MP4|3gp|doc|docx|word|pdf|zip|rar|xls|ppt|bmp|gif|jpeg|jpg|png|txt|xlsx|pptx';
                $config['max_size']  = '10240';
                $config['max_width']  = '0';
                $config['max_height']  = '0';
                $this->load->library('upload', $config);
                $upload = $this->upload->do_upload('attach');
                if($upload == false) {
                    $data['base_url']=$base_url;
                    $data['warning'] = $this->upload->display_errors();
                    $data['status_error']='1';
                    $data['data_files'] = $this->mdl_admin->getall_files();
                    $user_id = $this->session->userdata('user_id');
                    $txtid=$this->security->xss_clean($this->input->post('txtid'));
                    $edit_file = $this->security->xss_clean($this->input->post('edit_file'));
                    $file_name = $this->security->xss_clean($this->input->post('title'));
                    $category=$this->security->xss_clean($this->input->post('category'));
                    $this->mdl_admin->update_files($txtid,$file_name,$edit_file,$user_id,$category);
                   redirect('admin/files', 'location');
                }
                else {
                    $data = $this->upload->data();
                    $url = $base_url.'allmedia/files/'.$data['file_name'];
                    $user_id = $this->session->userdata('user_id');
                    $txtid=$this->security->xss_clean($this->input->post('txtid'));
                    $file_name = $this->security->xss_clean($this->input->post('title'));
                    $category=$this->security->xss_clean($this->input->post('category'));
                    $this->mdl_admin->update_files($txtid,$file_name,$url,$user_id,$category);
                    redirect('admin/files', 'location');
                }
				redirect('admin/files', 'location');
        }
		 function delete_files(){
		    $id=$this->uri->segment(3);
			$this->mdl_admin->delete_files($id);
		 redirect('admin/files', 'location');
		}
	function subscriber(){
		 $base_url=$this->config->item('base_url');
		$data['base_url']=$base_url;
		$user_id = $this->session->userdata('user_id');
		if($user_id =='' || $user_id =='0' || $user_id =='null'){
			redirect('login');
		}
		$data['data_subscriber'] = $this->mdl_admin->getall_subscriber();
        $this->load->view('admin/subscriber', $data);
	}
	    function delete_subscriber(){
		    $subscribe_id=$this->uri->segment(3);
			$this->mdl_admin->delete_subscribe($subscribe_id);
		 redirect('admin/subscriber', 'location');
		}
    function contact(){
		 $base_url=$this->config->item('base_url');
		$data['base_url']=$base_url;
		$user_id = $this->session->userdata('user_id');
		if($user_id =='' || $user_id =='0' || $user_id =='null'){
			redirect('login');
		}
		$data['data_contact'] = $this->mdl_admin->getall_contact();
        $this->load->view('admin/contact', $data);
	}
	    function delete_contact(){
		    $contact_id=$this->uri->segment(3);
			$this->mdl_admin->delete_contact($contact_id);
		 redirect('admin/contact', 'location');
		}
	function variable(){
		 $base_url=$this->config->item('base_url');
		$data['base_url']=$base_url;
		$user_id = $this->session->userdata('user_id');
		if($user_id =='' || $user_id =='0' || $user_id =='null'){
			redirect('login');
		}
		$data['data_variable'] = $this->mdl_admin->getall_variable();
        $this->load->view('admin/list_variable', $data);
	}
	function edit_variable(){
           $id= $this->uri->segment(3);
            $base_url=$this->config->item('base_url');
		$data['base_url']=$base_url;
		   $user_id = $this->session->userdata('user_id');
			if($user_id =='' || $user_id =='0' || $user_id =='null'){
				redirect('login');
			}
           $data['data_variable'] = $this->mdl_admin->getall_variable();

           foreach ($data['data_variable'] as $d){
               $data['variable_id']=$d->variable_id;
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
            $this->load->view('admin/edit_variable',$data);

        }
		 function update_variable(){
					$user_id = $this->session->userdata('user_id');
                    $txtid=$this->security->xss_clean($this->input->post('txtid'));
                    $share_price=$this->security->xss_clean($this->input->post('share_price'));
                    $low=$this->security->xss_clean($this->input->post('low'));
                    $high=$this->security->xss_clean($this->input->post('high'));
                    $volume=$this->security->xss_clean($this->input->post('volume'));
                    $awards=$this->security->xss_clean($this->input->post('awards'));
                    $employee=$this->security->xss_clean($this->input->post('employee'));
                    $products=$this->security->xss_clean($this->input->post('products'));
                    $link_download_1_title=$this->security->xss_clean($this->input->post('link_download_1_title'));
					$link_download_2_title=$this->security->xss_clean($this->input->post('link_download_2_title'));
                    $link_download_1=$this->security->xss_clean($this->input->post('link_download_1'));
                    $link_download_2=$this->security->xss_clean($this->input->post('link_download_2'));
                    $fb=$this->security->xss_clean($this->input->post('fb'));
					$tw=$this->security->xss_clean($this->input->post('tw'));
                    $googleplus=$this->security->xss_clean($this->input->post('googleplus'));
                    $youtube=$this->security->xss_clean($this->input->post('youtube'));
					$instagram=$this->security->xss_clean($this->input->post('instagram'));
                    $this->mdl_admin->upd_variable($txtid,$share_price,$low,$high,$volume,$awards,$employee,$products,$link_download_1_title,$link_download_2_title,$link_download_1,$link_download_2,$fb,$tw,$googleplus,$youtube,$instagram,$user_id);
                   
					  
                    redirect('admin/variable','location');
        }
	function setting(){
		 $base_url=$this->config->item('base_url');
		$data['base_url']=$base_url;
		$user_id = $this->session->userdata('user_id');
		if($user_id =='' || $user_id =='0' || $user_id =='null'){
			redirect('login');
		}
		$data['data_setting'] = $this->mdl_admin->getall_setting();
		foreach ($data['data_setting'] as $d){
               $data['user_id']=$d->user_id;
               $data['email']=$d->email;
               $data['password']=$d->password;
            }
        $this->load->view('admin/setting', $data);
	}
	function change_password(){
                    $txtid=$this->security->xss_clean($this->input->post('txtid'));
                    $password=$this->security->xss_clean($this->input->post('password'));
                    $this->mdl_admin->update_password($txtid,$password);
                   
					  
                    redirect('admin','location');
        }
        function page(){
		 $base_url=$this->config->item('base_url');
		$data['base_url']=$base_url;
		$user_id = $this->session->userdata('user_id');
		if($user_id =='' || $user_id =='0' || $user_id =='null'){
			redirect('login');
		}
                $data['data_page'] = $this->mdl_admin->getall_page();
        $this->load->view('admin/list_page', $data);
	}
        function add_page(){
		 $base_url=$this->config->item('base_url');
		$data['base_url']=$base_url;
		$user_id = $this->session->userdata('user_id');
		if($user_id =='' || $user_id =='0' || $user_id =='null'){
			redirect('login');
		}
		$data['menu'] = $this->mdl_admin->getall_menu();
        $this->load->view('admin/page', $data);
	}
        function insert_page(){
					
                   
                    $base_url=$this->config->item('base_url');
				$data['base_url']=$base_url;
				$user_id = $this->session->userdata('user_id');
				if($user_id =='' || $user_id =='0' || $user_id =='null'){
					redirect('login');
				}
				
                $config['file_name'] = 'SIDOMUNCUL-Cover'.date("YmdHis").rand(100, 999).'-'.$user_id;
                $config['upload_path'] = './allmedia/files';
                ini_set('memory_limit', '512M');
                $config['allowed_types'] = 'gif|jpeg|jpg|png';
                $config['max_size']  = '10240';
                $config['max_width']  = '0';
                $config['max_height']  = '0';
                $this->load->library('upload', $config);
                $upload = $this->upload->do_upload('attach');
                if($upload == false) {
                    $data['base_url']=$base_url;
                    $data['warning'] = $this->upload->display_errors();
                    $data['status_error']='1';
                    $image = $this->security->xss_clean($this->input->post('image'));
                    $menu_id=$this->security->xss_clean($this->input->post('menu_id'));
                    $page=$this->security->xss_clean($this->input->post('editor1'));
                    $title=$this->security->xss_clean($this->input->post('title'));
                    $this->mdl_admin->add_page($page,$image,$title,$menu_id);
                    $this->load->view('admin/page',$data);
                }
                else {
                    $data = $this->upload->data();
                    $img = $base_url.'allmedia/files/'.$data['file_name'];
                    $menu_id=$this->security->xss_clean($this->input->post('menu_id'));
                    $page=$this->security->xss_clean($this->input->post('editor1'));
                    $title=$this->security->xss_clean($this->input->post('title'));
                    $this->mdl_admin->add_page($page,$img,$title,$menu_id);
                    redirect('admin/page', 'location');
                }
                redirect('admin/page','location');
        }
        function edit_page(){
            $id= $this->uri->segment(3);
            $base_url=$this->config->item('base_url');
		    $data['base_url']=$base_url;
		    $user_id = $this->session->userdata('user_id');
			if($user_id =='' || $user_id =='0' || $user_id =='null'){
				redirect('login');
			}
           $data['menu'] = $this->mdl_admin->getall_menu();             
           $data['data_page'] = $this->mdl_admin->getall_page_upd($id);
           foreach ($data['data_page'] as $d){
               $data['page_id']=$d->page_id;
               $data['menu_id']=$d->menu_id;
               $data['image']=$d->image;
               $data['title_page']=$d->title;
               $data['isi']=$d->isi;
            }
            $this->load->view('admin/edit_page',$data);

        }
		function update_page(){
					
                
                $base_url=$this->config->item('base_url');
                $data['base_url']=$base_url;
                $user_id = $this->session->userdata('user_id');
                if($user_id =='' || $user_id =='0' || $user_id =='null'){
                        redirect('login');
                }
		$config['file_name'] = 'SIDOMUNCUL-Cover'.date("YmdHis").rand(100, 999).'-'.$user_id;
                $config['upload_path'] = './allmedia/files';
                ini_set('memory_limit', '512M');
                $config['allowed_types'] = 'gif|jpeg|jpg|png';
                $config['max_size']  = '10240';
                $config['max_width']  = '0';
                $config['max_height']  = '0';
                $this->load->library('upload', $config);
                $upload = $this->upload->do_upload('attach');
                if($upload == false) {
                    $data['base_url']=$base_url;
                    $data['warning'] = $this->upload->display_errors();
                    $data['status_error']='1';
                    $data['data_page'] = $this->mdl_admin->getall_page();
                    $user_id = $this->session->userdata('user_id');
                    $txtid=$this->security->xss_clean($this->input->post('txtid'));
                    $image = $this->security->xss_clean($this->input->post('image'));
                    $menu_id=$this->security->xss_clean($this->input->post('menu_id'));
//                    $page=$this->security->xss_clean($this->input->post('editor1'));
                    $page=$this->input->post('editor1');
                    $title=$this->security->xss_clean($this->input->post('title'));
                    $this->mdl_admin->update_page($txtid,$page,$image,$title,$menu_id,$user_id);
                    redirect('admin/page', 'location');
                }
                else {
                    $data = $this->upload->data();
                    $image = $base_url.'allmedia/files/'.$data['file_name'];
                    $user_id = $this->session->userdata('user_id');
                    $txtid=$this->security->xss_clean($this->input->post('txtid'));
                    $menu_id=$this->security->xss_clean($this->input->post('menu_id'));
                    $page=$this->security->xss_clean($this->input->post('editor1'));
                    $title=$this->security->xss_clean($this->input->post('title'));
                    $this->mdl_admin->update_page($txtid,$page,$image,$title,$menu_id,$user_id);
                    redirect('admin/page', 'location');
                }
				
                    redirect('admin/page','location');
        }
		function delete_page(){
		    $id=$this->uri->segment(3);
			$this->mdl_admin->delete_page($id);
		 redirect('admin/page', 'location');
		}
        function menu(){
		 $base_url=$this->config->item('base_url');
		$data['base_url']=$base_url;
		$user_id = $this->session->userdata('user_id');
		if($user_id =='' || $user_id =='0' || $user_id =='null'){
			redirect('login');
		}
		$data['data_menu'] = $this->mdl_admin->getall_menu();
        $this->load->view('admin/list_menu', $data);
	}
	function add_menu(){
		 $base_url=$this->config->item('base_url');
		$data['base_url']=$base_url;
		$user_id = $this->session->userdata('user_id');
		if($user_id =='' || $user_id =='0' || $user_id =='null'){
			redirect('login');
		}
        $this->load->view('admin/menu', $data);
	}
	function insert_menu(){
					
                    $parent_id=$this->security->xss_clean($this->input->post('parent_id'));
                    $title=$this->security->xss_clean($this->input->post('title'));
                    $title_url=$this->security->xss_clean($this->input->post('title_url'));
                    $link=$this->security->xss_clean($this->input->post('link'));
                    $order=$this->security->xss_clean($this->input->post('order_num'));
                    $this->mdl_admin->add_menu($parent_id,$title,$title_url,$link,$order);
                   
					  
                    redirect('admin/menu','location');
        }
		function edit_menu(){
            $id= $this->uri->segment(3);
            $base_url=$this->config->item('base_url');
		    $data['base_url']=$base_url;
		    $user_id = $this->session->userdata('user_id');
			if($user_id =='' || $user_id =='0' || $user_id =='null'){
				redirect('login');
			}
           $data['data_menu'] = $this->mdl_admin->getall_menu_upd($id);

           foreach ($data['data_menu'] as $d){
               $data['menu_id']=$d->menu_id;
               $data['parent_id']=$d->parent_id;
               $data['title']=$d->title;
               $data['title_url']=$d->title_url;
               $data['link']=$d->link;
               $data['order_num']=$d->order_num;
            }
            $this->load->view('admin/edit_menu',$data);

        }
		function update_menu(){
                    $user_id = $this->session->userdata('user_id');
                    $txtid=$this->security->xss_clean($this->input->post('txtid'));
                    $parent_id=$this->security->xss_clean($this->input->post('parent_id'));
                    $title=$this->security->xss_clean($this->input->post('title'));
                    $title_url=$this->security->xss_clean($this->input->post('title_url'));
                    $link=$this->security->xss_clean($this->input->post('link'));
                    $order=$this->security->xss_clean($this->input->post('order_num'));
                    $this->mdl_admin->update_menu($txtid,$parent_id,$title,$title_url,$link,$order,$user_id);
                   
					  
                    redirect('admin/menu','location');
        }
		function delete_menu(){
		    $id=$this->uri->segment(3);
			$this->mdl_admin->delete_menu($id);
		 redirect('admin/menu', 'location');
		}
              function awards(){
		 $base_url=$this->config->item('base_url');
		$data['base_url']=$base_url;
		$user_id = $this->session->userdata('user_id');
		if($user_id =='' || $user_id =='0' || $user_id =='null'){
			redirect('login');
		}
		$data['data_awards'] = $this->mdl_admin->getall_awards();
        $this->load->view('admin/list_awards', $data);
	}
	function add_awards(){
		 $base_url=$this->config->item('base_url');
		$data['base_url']=$base_url;
		$user_id = $this->session->userdata('user_id');
		if($user_id =='' || $user_id =='0' || $user_id =='null'){
			redirect('login');
		}
		 $data['status_error']='';
        $this->load->view('admin/awards', $data);
	}
	function insert_awards(){
				$base_url=$this->config->item('base_url');
				$data['base_url']=$base_url;
				$user_id = $this->session->userdata('user_id');
				if($user_id =='' || $user_id =='0' || $user_id =='null'){
					redirect('login');
				}
				
                $config['file_name'] = 'SIDOMUNCUL'.date("YmdHis").rand(100, 999).'-'.$user_id;
                $config['upload_path'] = './sido_img/awards_img';
                ini_set('memory_limit', '512M');
                $config['allowed_types'] = 'gif|jpeg|jpg|png';
                $config['max_size']  = '60240';
                $config['max_width']  = '0';
                $config['max_height']  = '0';
                $config['overwrite'] = FALSE;
                $config['remove_spaces'] = TRUE;
                $this->load->library('upload', $config);
                $upload = $this->upload->do_upload('attach');
                if($upload == false) {
                    $data['base_url']=$base_url;
                    $data['warning'] = $this->upload->display_errors();
                    $data['status_error']='1';
                    $data['data_awards'] = $this->mdl_admin->getall_awards();
					$image = $this->security->xss_clean($this->input->post('image'));
                    $title=$this->security->xss_clean($this->input->post('title'));
					$descrip=$this->security->xss_clean($this->input->post('descrip'));
					$category=$this->security->xss_clean($this->input->post('category'));
					$date=$this->security->xss_clean($this->input->post('date'));
                    $this->mdl_admin->add_awards($image,$title,$descrip,$date,$category);
                    redirect('admin/news', 'location');
                }
                else {
                    $data = $this->upload->data();
                    $image = $base_url.'sido_img/awards_img/'.$data['file_name'];
                    $title=$this->security->xss_clean($this->input->post('title'));
					$descrip=$this->security->xss_clean($this->input->post('descrip'));
					$category=$this->security->xss_clean($this->input->post('category'));
					$date=$this->security->xss_clean($this->input->post('date'));
                    $this->mdl_admin->add_awards($image,$title,$descrip,$date,$category);
                    redirect('admin/awards', 'location');
                }
                    
                   
					  
                    redirect('admin/awards','location');
        }
		function edit_awards(){
            $id= $this->uri->segment(3);
            $base_url=$this->config->item('base_url');
		    $data['base_url']=$base_url;
		    $user_id = $this->session->userdata('user_id');
			if($user_id =='' || $user_id =='0' || $user_id =='null'){
				redirect('login');
			}
           $data['data_awards'] = $this->mdl_admin->getall_awards_upd($id);

           foreach ($data['data_awards'] as $d){
               $data['awards_id']=$d->awards_id;
               $data['image']=$d->image;
	       $data['date']=$d->publish_date;
	       $data['title']=$d->title;
               $data['descrip']=$d->descrip;
	       $data['category']=$d->category;
            }
            $this->load->view('admin/edit_awards',$data);

        }
		function update_awards(){
					
                
				$base_url=$this->config->item('base_url');
				$data['base_url']=$base_url;
				$user_id = $this->session->userdata('user_id');
				if($user_id =='' || $user_id =='0' || $user_id =='null'){
					redirect('login');
				}
		$config['file_name'] = 'SIDOMUNCUL'.date("YmdHis").rand(100, 999).'-'.$user_id;
                $config['upload_path'] = './sido_img/awards_img';
                ini_set('memory_limit', '512M');
                $config['allowed_types'] = 'gif|jpeg|jpg|png';
                $config['max_size']  = '10240';
                $config['max_width']  = '0';
                $config['max_height']  = '0';
                $this->load->library('upload', $config);
                $upload = $this->upload->do_upload('attach');
                if($upload == false) {
                    $data['base_url']=$base_url;
                    $data['warning'] = $this->upload->display_errors();
                    $data['status_error']='1';
                    $data['data_awards'] = $this->mdl_admin->getall_awards();
					$edit_file = $this->security->xss_clean($this->input->post('edit_file'));
					$user_id = $this->session->userdata('user_id');
                    $txtid=$this->security->xss_clean($this->input->post('txtid'));
                    $title=$this->security->xss_clean($this->input->post('title'));
					$descrip=$this->security->xss_clean($this->input->post('descrip'));
					$category=$this->security->xss_clean($this->input->post('category'));
					$date=$this->security->xss_clean($this->input->post('date'));
                    $this->mdl_admin->update_awards($txtid,$edit_file,$title,$descrip,$date,$category,$user_id);
                    redirect('admin/awards', 'location');
                }
                else {
                    $data = $this->upload->data();
                    $image = $base_url.'sido_img/awards_img/'.$data['file_name'];
					$user_id = $this->session->userdata('user_id');
                    $txtid=$this->security->xss_clean($this->input->post('txtid'));
                    $title=$this->security->xss_clean($this->input->post('title'));
					$descrip=$this->security->xss_clean($this->input->post('descrip'));
					$category=$this->security->xss_clean($this->input->post('category'));
					$date=$this->security->xss_clean($this->input->post('date'));
                    $this->mdl_admin->update_awards($txtid,$image,$title,$descrip,$date,$category,$user_id);
                    redirect('admin/awards', 'location');
                }
				
                    redirect('admin/awards','location');
        }
		function delete_awards(){
		    $id=$this->uri->segment(3);
			$this->mdl_admin->delete_awards($id);
		 redirect('admin/awards', 'location');
		}
      function flush_data(){
    	//$this->output->delete_cache('page');
    	$this->output->clear_path_cache('/views/page');
    	redirect('admin/page', 'location');
  	  }
   
}
?>
