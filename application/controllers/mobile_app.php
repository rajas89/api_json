<?php
class mobile_app extends Controller{
    function mobile_app(){
        parent::Controller();
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->helper('file');
        $this->load->model('mdl_mobile_app');
    }
    function index(){
    
        
    }
    function getcampaign(){
        $data['base_url'] = $this->config->item('base_url');
        $skip=$_GET['skip'];
        $page_size=$_GET['take'];
        $search=$_GET['searchString'];
        $filter=$_GET['filter'];
        $limit='LIMIT '.$skip.','.$page_size;
        $order_id = 'Order By publish_Date desc';
		if ($filter==1){
        $data=$this->mdl_mobile_app->getcampaignlist($order_id,$limit,$search);
		}
		if ($filter==2){
        $data=$this->mdl_mobile_app->getcampaignlist_completed($order_id,$limit,$search);
		}
		if ($filter==3){
        $data=$this->mdl_mobile_app->getcampaignlist_upcoming($order_id,$limit,$search);
		}
        $a='';
        foreach($data as $p){
        $a[]=array(
        "title"=>$p->title,
        "pic"=>$p->pict_attfile,
        "id"=>$p->art_id,
        "desc"=>$p->descrip_art,
        "avatar"=>$p->avatar,
        "jument"=>$p->jument,
        "dayleft"=>$p->dayleft
        );
        }
        echo json_encode($a);
    }
    function getdet(){
        $art_id = $this->uri->segment(3);
        $data=$this->mdl_mobile_app->campaign_detail($art_id);
        foreach($data as $p){
            $a[]=array(
                    "id"=>$art_id,
                    "judul"=>$p->title,
                    "pic"=>$p->pict_attfile,
                    "desc"=>$p->descrip,
                    "avatar"=>$p->avatar,
                    "startdate"=>$p->oa_start_date,
                    "closedate"=>$p->oa_closing_date,
                    "hookname"=>$p->hook_name,
                    "jument"=>$p->jument,
                    "dayleft"=>$p->dayleft,
                    "is_closed"=>$p->is_closed,
                    "is_oa_done"=>$p->is_oa_done,
                    "artstat"=>$p->artstat
            );
        }
        echo json_encode($a);
    }
    function getprize(){
        $art_id = $this->uri->segment(3);
        $data['base_url'] = $this->config->item('base_url');
//        $art_id = $_GET['artidprize'];
        $data=$this->mdl_mobile_app->prizes($art_id);
        $a='';
        foreach($data as $p){
            $a[]=array(
                    "id"=>$p->art_id,
                    "prize_title"=>$p->prize_title,
                    "prize_desc"=>$p->prize_desc,
                    "prize_pic"=>$p->prize_pic
            );
        }
        echo json_encode($a);
    }
    function getentries(){
        $data['base_url'] = $this->config->item('base_url');
        $skip=$_GET['skip'];
        $page_size=$_GET['take'];
        $limit='LIMIT '.$skip.','.$page_size;
        $order_id = 'Order By publish_Date desc';
        $art_id = $_GET['artid'];
        $data=$this->mdl_mobile_app->getentrieslist($order_id,$limit,$art_id);
        $a='';
        foreach($data as $p){
            $a[]=array(
            "id"=>$p->art_id,
            "pic"=>$p->pic1,
            "firstname"=>$p->firstname,
            "desc"=>$p->descrip,
            "avatar"=>$p->avatar
            );
        }
        echo json_encode($a);
    }
    function getentriesdet(){
        $data['base_url'] = $this->config->item('base_url');
        $a='';
        $art_id_res = $this->uri->segment(3);
        $prof_id = $this->uri->segment(4);
        $data=$this->mdl_mobile_app->getentrieslist_detail_response($art_id_res,$prof_id);
        foreach($data as $p){
            $a[]=array(
            "id"=>$art_id_res,
            "pic"=>$p->pic1,
            "prof_id"=>$p->prof_id,
            "firstname"=>$p->firstname,
            "desc"=>$p->descrip,
            "avatar"=>$p->avatar,
            "hook_name"=>$p->hook_name,
            "tag"=>$p->tag,
            "totnewsworthyness"=>$p->totnewsworthyness,
            "content_id"=>$p->content_id,
            "isworthy"=>$p->isworthy,
            "is_closed"=>$p->is_closed,
            "is_oa_done"=>$p->is_oa_done
            );
        }
        echo json_encode($a);
    }
    function comment(){
        $data['base_url'] = $this->config->item('base_url');
        $a='';
        $skip=$_GET['skip'];
        $page_size=$_GET['take'];
        $limit='LIMIT '.$skip.','.$page_size;
        $art_id = $_GET['artid'];
//        $art_id = $this->uri->segment(3);
        $data=$this->mdl_mobile_app->comment($limit,$art_id);
        foreach($data as $p){
            $a[]=array(
            "id"=>$art_id,
            "comment"=>$p->comment,
            "firstname"=>$p->firstname,
            "avatar"=>$p->avatar,
            "prof_id"=>$p->prof_id
            );
        }
        echo json_encode($a);
        
    }
    function ceklogin(){
        $data['base_url'] = $this->config->item('base_url');
        $email = $this->input->xss_clean($this->input->post('email'));
        $password = $this->input->xss_clean($this->input->post('password'));
        $prof_id=$this->mdl_mobile_app->getprofid($email);
        $randomcode = $this->mdl_mobile_app->get_randomcode($prof_id);
        $firstname = $this->mdl_mobile_app->getfirstname($prof_id);
        $pass = $this->mdl_mobile_app->get_pass($prof_id);
        $password_in_dec=$this->encrypt($password,$randomcode);
        if($pass==$password_in_dec){ 
            $a[]=array(
            "status"=>'success',
            "prof_id"=>$prof_id,
            "firstname"=>$firstname
            );
//            echo 'success||'.$prof_id.'||'.$firstname;
        }else{
            $a[]=array(
            "status"=>'failed'
            );
        }
       // echo $pass.'-'.$password_in_dec;
       echo json_encode($a);
    }
    function encrypt($pass,$code) {
        $sandi='';
        $len_pass = strlen(trim($pass));
        $len_code = strlen(trim($code));
        for ($i=1; $i<= $len_pass; $i++) {
            $pass_enc = substr($pass, $i-1, 1);
            $code_enc = substr($code, ($i-1)%$len_code, 1);
            $pass_ascii = ord($pass_enc);
            $pass_result = chr($pass_ascii + $code_enc);
            $sandi = $sandi . $pass_result;
            }
            return $hasilplain = $sandi;
        }
        function decrypt($pass,$code) {
        $sandi='';
        $len_pass = strlen(trim($pass));
        $len_code = strlen(trim($code));
        for ($i=1; $i<= $len_pass; $i++) {
            $pass_enc = substr($pass, $i-1, 1);
            $code_enc = substr($code, ($i-1)%$len_code, 1);
            $pass_ascii = ord($pass_enc);
            $pass_result = chr($pass_ascii - $code_enc);
            $sandi = $sandi . $pass_result;
        }
        return $hasilplain = $sandi;
    }    
    function insertdata(){
        $data['base_url'] = $this->config->item('base_url');
        $art_id = $this->uri->segment(3);
        $prof_id = $this->input->post('prof_id');
        $key_page= $prof_id.'_'.date("YmdHis").'_'.rand(10,99);
          //$filename=  $this->input->post('isi2');
          //$isi1=$_POST['isi1'];
          $txtcaption=$this->input->xss_clean($this->input->post('isi1'));
         // $isi2=$_POST['isi2'];
          $filename=  $this->input->post('isi2');
          $language_id=$this->session->userdata('language_id');
          $country_id=$this->session->userdata('country_id');
          $timezone_id=$this->session->userdata('timezone_id');
          $ip_id=$this->session->userdata('ip_computer');
          $com_name=$this->session->userdata('comp_name');
          $grpcat_id='1';
          $type_id='1';
          $artstat='publish';
          $ispicture='1';
          $popup_join= $this->mdl_mobile_app->popup_join($art_id);
            foreach ($popup_join as $y){
                $tag='#'.$y->hook_name;
            }
          $this->mdl_mobile_app->add_campaign($art_id,$prof_id,$language_id,$country_id,$timezone_id,$tag,$grpcat_id,$key_page,$ispicture,$txtcaption);
          echo $isi1.'-'.$language_id.'-';
          $num=$this->mdl_mobile_app->get_num($key_page);
          $array_file=explode('|', $filename);
          $count_array=count($array_file)-1;
          for($p=0;$p<=$count_array;$p++){
              if($array_file[$p]!=''||$array_file[$p]!=null){
                  $num=$num+1;
                  $this->mdl_mobile_app->add_picture_campaign($key_page,$array_file[$p],$array_file[$p],$num);
          echo $isi2;
                  //            pindah photo
                    if($array_file[$p]!='' || $array_file[$p]!=null){
                        if (is_dir( './uni_img/publish_temp/'))  {
                                 if (copy('./uni_img/publish_temp/'.$array_file[$p],'./uni_img/publish_img/'.$array_file[$p])) {
                                     //ini untuk memindahkan/MOVE picture dari publish_temp ke Publish_img thumb 50 dan 210 dan 800
//                                     $this->img_resize('./uni_img/publish_temp/thumb_170/'.$array_file[$p], 170, './uni_img/publish_img/thumb_170/', $array_file[$p]);
//                                     $this->img_resize('./uni_img/publish_temp/thumb_250/'.$array_file[$p], 250, './uni_img/publish_img/thumb_250/', $array_file[$p]);
//                                     $this->img_resize('./uni_img/publish_temp/thumb_40/'.$array_file[$p], 50, './uni_img/publish_img/thumb_40/', $array_file[$p]);
//                                     $this->img_resize('./uni_img/publish_temp/thumb_530/'.$array_file[$p], 530, './uni_img/publish_img/thumb_530/', $array_file[$p]);
//                                     $this->img_resize('./uni_img/publish_temp/thumb_800/'.$array_file[$p], 800, './uni_img/publish_img/thumb_800/', $array_file[$p]);
        //                             $this->img_resize('./uni_img/publish_temp/cover_thumb/'.$filename, 240, './uni_img/publish_img/cover/', $filename);
                                     //ini untuk hapus, ketika picture sudah dimasukan ke folder
                                     if (file_exists('./uni_img/publish_temp/thumb_170/'.$array_file[$p])){
                                            copy('./uni_img/publish_temp/thumb_170/'.$array_file[$p],'./uni_img/publish_img/thumb_170/'.$array_file[$p]);
                                            unlink('./uni_img/publish_temp/thumb_170/'.$array_file[$p]);
                                       }
                                     if (file_exists('./uni_img/publish_temp/thumb_500/'.$array_file[$p])){
                                            copy('./uni_img/publish_temp/thumb_500/'.$array_file[$p],'./uni_img/publish_img/thumb_500/'.$array_file[$p]);
                                            unlink('./uni_img/publish_temp/thumb_500/'.$array_file[$p]);
                                       }
                                     if (file_exists('./uni_img/publish_temp/thumb_235/'.$array_file[$p])){
                                            copy('./uni_img/publish_temp/thumb_235/'.$array_file[$p],'./uni_img/publish_img/thumb_235/'.$array_file[$p]);
                                            unlink('./uni_img/publish_temp/thumb_235/'.$array_file[$p]);
                                       }
                                       if (file_exists('./uni_img/publish_temp/thumb_crop/'.$array_file[$p])){
                                            copy('./uni_img/publish_temp/thumb_crop/'.$array_file[$p],'./uni_img/publish_img/thumb_crop/'.$array_file[$p]);
                                            unlink('./uni_img/publish_temp/thumb_crop/'.$array_file[$p]);
                                       }
                                     unlink("./uni_img/publish_temp/".$array_file[$p]);
//                                     unlink("./uni_img/publish_temp/thumb_40/".$array_file[$p]);
                                     unlink("./uni_img/publish_temp/thumb_530/".$array_file[$p]);
//                                     unlink("./uni_img/publish_temp/thumb_800/".$array_file[$p]);
                                 }
                        }
                    }
              }
          }
        echo json_encode('success !');
    }
    function insertfoto(){
		$imgname=$_FILES["file"]["name"];
		$imgname_spl=explode(".", $imgname);
		$new_image_name = "FOT".date("YmdHis").rand(100, 999);
		move_uploaded_file($_FILES["file"]["tmp_name"], "./uni_img/publish_temp/".$new_image_name.".".$imgname_spl[count($imgname_spl)-1]);

		$this->load->library('image_lib');
		$config = array(
			'source_image' => "./uni_img/publish_temp/".$new_image_name.".".$imgname_spl[count($imgname_spl)-1],
			'new_image' => "./uni_img/publish_temp/thumb_170/",
			'maintain_ration' => true,
			'thumb_marker' => '',
			'width' => 170,
			'height' => 170
			);

		$this->image_lib->initialize($config);
			$this->image_lib->resize();
			$this->image_lib->clear();
		
		$config2 = array(
			'source_image' => "./uni_img/publish_temp/".$new_image_name.".".$imgname_spl[count($imgname_spl)-1],
			'new_image' => "./uni_img/publish_temp/thumb_235/",
			'maintain_ration' => true,
			'thumb_marker' => '',
			'width' => 235,
			'height' => 235
			);

		$this->image_lib->initialize($config2);
			$this->image_lib->resize();
			$this->image_lib->clear();
		
		$config3 = array(
			'source_image' => "./uni_img/publish_temp/".$new_image_name.".".$imgname_spl[count($imgname_spl)-1],
			'new_image' => "./uni_img/publish_temp/thumb_500/",
			'maintain_ration' => true,
			'thumb_marker' => '',
			'width' => 500,
			'height' => 500
			);

		$this->image_lib->initialize($config3);
			$this->image_lib->resize();
			$this->image_lib->clear();
		$_FILES["file"]["name"]=$new_image_name.".".$imgname_spl[count($imgname_spl)-1];
		echo '<img class="" src="http://192.168.1.123/campaign/uni_img/publish_temp/thumb_170/'.$new_image_name.".".$imgname_spl[count($imgname_spl)-1].'" height="93px" width="93px" style="border:1px solid white"/>
				 <input type="hidden" value="'.$new_image_name.".".$imgname_spl[count($imgname_spl)-1].'" id="filename" name="filename"/>';
	}
        
        function profile(){
//      uri=3 session uri4=open
        $data['base_url'] = $this->config->item('base_url');
        $prof_id_open=$this->uri->segment(4);
        $profile=$this->mdl_mobile_app->get_profil($prof_id_open);
        $prof_id_session=$this->uri->segment(3);
        $isFollow=$this->mdl_mobile_app->cek_is_subscribe($prof_id_session,$prof_id_open);
        if($isFollow==0 && $prof_id_open!=$prof_id_session){
            $isFollow='<div id="btn_follow_profile" style="color:#414042;background-color:#cccccc;cursor:pointer" onclick="follow_profile('.$prof_id_open.')">Follow</div>
                <div id="btn_unfollow_profile" style="color:#414042;background-color:#cccccc;display:none;cursor:pointer" onclick="unfollow_profile('.$prof_id_open.')">Unfollow</div>';
        }else{
            if($prof_id_open!=$prof_id_session){
                 $isFollow='<div id="btn_follow_profile" style="color:#414042;background-color:#cccccc;cursor:pointer;display:none" onclick="follow_profile('.$prof_id_open.')">Follow</div>
                <div id="btn_unfollow_profile" style="color:#414042;background-color:#cccccc;cursor:pointer" onclick="unfollow_profile('.$prof_id_open.')">Unfollow</div>';
            }else{
                 $isFollow='';
            }
        }
        foreach($profile as $p){
            $a[]=array(
            "prof_id"=>$p->prof_id,
            "cover_profile"=>$p->header_art_photo,
            "cover_x"=>$p->header_photo_pos_x,
            "cover_y"=>$p->header_photo_pos_y,
            "firstname"=>$p->firstname,
            "desc"=>$p->description,
            "avatar"=>$p->avatar,
            "sex"=>$p->sex,
            "address"=>$p->address,
            "isfollow"=>$isFollow,
            );
        }
        echo json_encode($a);
    }

    function campaign_profile(){
        $a='';
        $skip=$_GET['skip'];
        $page_size=$_GET['take'];
        $limit='LIMIT '.$skip.','.$page_size;
        $type_id='';
        $data_slide='';
        $prof_id_session=$_GET['id'];
        $prof_id_open=$_GET['id_open'];
        $where='and d.`is_closed`=0 and d.`is_oa_done`=0';
        $data_slide=$this->mdl_mobile_app->get_slide_campaign($prof_id_open, $limit,'2',$where);
        foreach($data_slide as $p){
                $a[]=array(
                "art_id"=>$p->art_id,
                "title"=>$p->title,
                "descrip_art"=>$p->descrip_art,
                "photo_slide"=>$p->photo_slide,
                "prof_id_slide"=>$p->prof_id,
                "avatar_campaign"=>$p->avatar,
                "season"=>$p->season,
                "artstat"=>$p->artstat
                );
            }
        echo json_encode($a);
    }

    function response_profile(){
        $a='';
        $skip=$_GET['skip_response'];
        $page_size=$_GET['take_response'];
        $limit='LIMIT '.$skip.','.$page_size;
        $type_id='';
        $data_slide='';
        $prof_id_session=$_GET['id'];
        $prof_id_open=$_GET['id_open'];        
        $where='';
        $data_slide=$this->mdl_mobile_app->get_slide_campaign($prof_id_open,$limit,'1',$where);
        foreach($data_slide as $p){
                $a[]=array(
                "art_id_response"=>$p->art_id,
                "photo_slide_response"=>$p->photo_slide,
                "prof_id_response"=>$p->prof_id,
                );
            }
        echo json_encode($a);
    }    

    function add_subscribe(){
        $data['base_url'] =$this->config->item('base_url');
        $prof_id=$this->uri->segment(3);
        $prof_id_to=$this->uri->segment(4);
        $cek_is_subscribe=$this->mdl_mobile_app->cek_is_subscribe($prof_id,$prof_id_to);
        if($prof_id!=''){
            if($cek_is_subscribe==0){
                if($prof_id_to!=$prof_id){
                    $this->mdl_mobile_app->Add_subscribe($prof_id,$prof_id_to);
                    echo '1';
                }
            }else{ echo '1';}
        }else{echo 'sigin';}
    }

    function del_subscribe(){
        $prof_id=$this->uri->segment(3);
        $prof_id_to=$this->uri->segment(4);
        $cekpeopleid=$this->mdl_mobile_app->cek_is_subscribe($prof_id,$prof_id_to);
        $people_id=$this->mdl_mobile_app->get_people_id($prof_id, $prof_id_to);
        if($prof_id!=''){
            if($cekpeopleid!=0){
                $this->mdl_mobile_app->del_subscribe($people_id);
                echo '1';
            }else{echo '1';}
        }else{echo 'sigin';}
    }
//04112013
    function getprofilesetting(){
        $prof_id = $this->uri->segment(3);
        $data=$this->mdl_mobile_app->get_profiles_setting($prof_id);
        $a='';
        foreach($data as $p){
            $a[]=array(
                    "prof_id"=>$prof_id,
                    "firstname"=>$p->firstname,
                    "desc"=>$p->description,
                    "avatar"=>$p->avatar,
                    "dob"=>$p->dob,
                    "sex"=>$p->sex,
                    "address"=>$p->address,
                    "imgback"=>$p->header_art_photo
            );
        }
        echo json_encode($a);
    }
     function save_aboutme(){
        $prof_id=$this->input->post('prof_id'); 
        $firstname=$this->input->post('firstname');        
        $description=$this->input->post('desc');
        $dob=$this->input->post('dob');  
        $sex=$this->input->post('sex'); 
        $address=$this->input->post('address'); 
        $avatar=  $this->input->post('avatar');
        $avatar_hide=$this->input->post('avatar_hide');
        $imgback_hide=$this->input->post('imgback_hide');
        $cover=$this->input->post('cover');
        if ($avatar_hide==$avatar){
            $avatar=$avatar_hide;
        }
        if ($avatar=='undefined'){
            $avatar=$avatar_hide;
        }
        if($imgback_hide==$cover){
            $cover=$imgback_hide;
        }
        if($cover=='undefined'){
            $cover=$imgback_hide;
        }
        $this->mdl_mobile_app->save_profiles_setting($prof_id,$firstname,$description,$dob,$sex,$address,$avatar,$cover);       
              
        $temp_file_header='0';
        $temp_file_avatar='0';
        if($avatar!=$avatar_hide){
            if (file_exists('./uni_img/temp/'.$avatar)){
               $temp_file_avatar='1';
            }
        }else{
            $temp_file_avatar='1';
        }
        //unlink
        if($avatar!=$avatar_hide && $temp_file_avatar=='1' && $avatar!='' && $avatar!=null){
            if (is_dir( './uni_img/personal_foto/'))  {
                if (copy('./uni_img/temp/'.$avatar,'./uni_img/personal_foto/'.$avatar)) {
                    //ini untuk memindahkan/MOVE picture dari publish_temp ke Publish_img thumb 50 dan 150
                    $this->img_resize('./uni_img/temp/thumb_150/'.$avatar, 150, './uni_img/personal_foto/thumb_150/', $avatar);
                    $this->img_resize('./uni_img/temp/thumb_40/'.$avatar, 40, './uni_img/personal_foto/thumb_40/', $avatar);
                    //ini untuk hapus, ketika picture sudah dimasukan ke folder
                    unlink("./uni_img/temp/".$avatar);
                    unlink("./uni_img/temp/thumb_500/".$avatar);
                    unlink("./uni_img/temp/thumb_150/".$avatar);
                    unlink("./uni_img/temp/thumb_40/".$avatar);
                    if (file_exists('./uni_img/personal_foto/'.$avatar_hide)){//28052013-jika exist maka hapus
                        if($avatar_hide!='default.jpg' && $avatar_hide!='' && $avatar_hide!=null){
                            unlink("./uni_img/personal_foto/".$avatar_hide);
                            unlink("./uni_img/personal_foto/thumb_150/".$avatar_hide);
                            unlink("./uni_img/personal_foto/thumb_40/".$avatar_hide);
                        }
                    }
                }
            }
        }
        if($cover!=$imgback_hide && $temp_file_header=='1' && $cover!='' && $cover!=null){
            if (is_dir( './uni_img/img_back/'))  {
                if (copy('./uni_img/temp/cover/'.$cover,'./uni_img/img_back/'.$cover)) {
                    //ini untuk memindahkan/MOVE picture dari publish_temp ke Publish_img thumb 50 dan 150
                    $this->img_resize('./uni_img/temp/cover/'.$cover, 500, './uni_img/img_back/thumb_500/', $cover);
                    //ini untuk hapus, ketika picture sudah dimasukan ke folder
                    unlink("./uni_img/temp/".$cover);
                    if (file_exists('./uni_img/personal_foto/'.$imgback_hide)){//28052013-jika exist maka hapus
                        if($imgback_hide!='default.jpg' && $imgback_hide!='' && $imgback_hide!=null){
                            unlink("./uni_img/personal_foto/".$imgback_hide);
                             unlink("./uni_img/personal_foto/thumb_500/".$imgback_hide);
                        }
                    }
                }
            }
        }
        $a[]=array(
            "firstname"=>$firstname,
            "avatar"=>$avatar,
            'imgback'=>$cover
            );
        echo json_encode($a);
     }
     function insertfoto_setprof(){
		$imgname=$_FILES["file"]["name"];
		$imgname_spl=explode(".", $imgname);
		$new_image_name = "FOT".date("YmdHis").rand(100, 999);
		move_uploaded_file($_FILES["file"]["tmp_name"], "./uni_img/temp/".$new_image_name.".".$imgname_spl[count($imgname_spl)-1]);

		$this->load->library('image_lib');
		$config = array(
			'source_image' => "./uni_img/temp/".$new_image_name.".".$imgname_spl[count($imgname_spl)-1],
			'new_image' => "./uni_img/temp/thumb_150/",
			'maintain_ration' => true,
			'thumb_marker' => '',
			'width' => 150,
			'height' => 150
			);

		$this->image_lib->initialize($config);
			$this->image_lib->resize();
			$this->image_lib->clear();
		
		$config2 = array(
			'source_image' => "./uni_img/temp/".$new_image_name.".".$imgname_spl[count($imgname_spl)-1],
			'new_image' => "./uni_img/publish_temp/thumb_40/",
			'maintain_ration' => true,
			'thumb_marker' => '',
			'width' =>40,
			'height' => 40
			);

		$this->image_lib->initialize($config2);
			$this->image_lib->resize();
			$this->image_lib->clear();
		
		$config3 = array(
			'source_image' => "./uni_img/temp/".$new_image_name.".".$imgname_spl[count($imgname_spl)-1],
			'new_image' => "./uni_img/temp/thumb_500/",
			'maintain_ration' => true,
			'thumb_marker' => '',
			'width' => 500,
			'height' => 500
			);

		$this->image_lib->initialize($config3);
			$this->image_lib->resize();
			$this->image_lib->clear();
		$_FILES["file"]["name"]=$new_image_name.".".$imgname_spl[count($imgname_spl)-1];
		echo '<img style="vertical-align: middle;border:1px solid white" width="100%" height="100%" src="http://192.168.1.123/campaign/uni_img/temp/thumb_150/'.$new_image_name.".".$imgname_spl[count($imgname_spl)-1].'"/>
				 <input type="hidden" value="'.$new_image_name.".".$imgname_spl[count($imgname_spl)-1].'" id="setprof_avatar1" name="setprof_avatar1"/>';
	} 
    //untuk hapus di temp ketika onchange
    function delete_file_foto(){
        $namafile=$this->input->xss_clean($this->input->post('file_name'));;
        if($namafile!='0' && $namafile!=''){
           if (file_exists('./uni_img/temp/'.$namafile)){
                unlink('./uni_img/temp/'.$namafile);
                unlink('./uni_img/temp/thumb_40/'.$namafile);
                unlink('./uni_img/temp/thumb_150/'.$namafile);
                unlink('./uni_img/temp/thumb_500/'.$namafile);
           }
        }
    }
     //RESIZE IMG
    function img_resize( $tmpname, $size, $save_dir, $save_name ){
        $save_dir .= ( substr($save_dir,-1) != "/") ? "/" : "";
        $gis       = GetImageSize($tmpname);
        $type      = $gis[2];
        switch($type){
            case "1": $imorig = imagecreatefromgif($tmpname); break;
            case "2": $imorig = imagecreatefromjpeg($tmpname);break;
            case "3": $imorig = imagecreatefrompng($tmpname); break;
            default:  $imorig = imagecreatefromjpeg($tmpname);
        }
        $x = imageSX($imorig);
        $y = imageSY($imorig);
        if($gis[0] <= $size) {
            $av = $x;
            $ah = $y;
        }else{
            $yc = $y*1.3333333;
            $d = $x>$yc?$x:$yc;
            $c = $d>$size ? $size/$d : $size;
              $av = $x*$c;        //?????? ???????? ????????
              $ah = $y*$c;        //????? ???????? ????????
        }
        $im = imagecreate($av, $ah);
        $im = imagecreatetruecolor($av,$ah);
        if (imagecopyresampled($im,$imorig , 0,0,0,0,$av,$ah,$x,$y))
            if (imagejpeg($im, $save_dir.$save_name))
                return true;
            else
                return false;
    }
    //08112013
    function getaccsetting(){
        $prof_id = $this->uri->segment(3);
        $data=$this->mdl_mobile_app->get_acc_setting($prof_id);
        $a='';
        foreach($data as $p){
            $a[]=array(
                    "prof_id"=>$prof_id,
                    "username"=>$p->username
            );
        }
        echo json_encode($a);
    }
    function save_changeusername(){
       $prof_id=$this->input->post('prof_id'); 
       $user_name=$this->input->post('username');
       $char=Array(
                       "`","~","!","#","%","^","*","(",")","+","=","[","]",
                       "{","}","|","\\",":",";","\'","?","<",">",",","�","�","�","�","�",
                       "-","/","&laquo","'","&lt"
                       );
       $username=str_replace($char,"_",$user_name);
       $username=strtolower(str_replace(' ', '.', $username));
       $char_name=Array("campaign");
       $username=str_replace($char_name, '', $username);
       
       if(($prof_id!='')||($prof_id!=null)){
           $cek_username=$this->mdl_mobile_app->cek_username_change($username);
           $cek_username_sys=$this->mdl_mobile_app->cek_username_sys($username);
           if($cek_username_sys==0 && ($username!=''||$username!=null)){
               if($cek_username==0){
                    $this->mdl_mobile_app->update_username($username,$prof_id);                        
                    $a[]=array(
                        "status"=>'success'
                    );
               }else{
                   $a[]=array(
                        "status"=>'username'
                   );
               }
           }else{
               $a[]=array(
                    "status"=>'username_invalid'
               );           
           }
       }
       echo json_encode($a);
    }    
    function save_accsetting(){        
        $prof_id=$this->input->post('prof_id');  
        $old_pass=$this->input->post('set_old_pass');
        $new_pass=$this->input->post('set_new_pass');
        $confirm_pass=$this->input->post('set_confirm_pass');
        $randomcode=$this->mdl_mobile_app->get_randomcode($prof_id);
        $get_pass = $this->mdl_mobile_app->get_pass($prof_id);
        $get_pass=$this->decrypt($get_pass,$randomcode);//password yang di decrypt(mengembalikan nilai yang sudah di encrypt) - decrypt adalah function
                if(($old_pass=='') && ($new_pass=='') && ($confirm_pass=='')){
                       $set_new_pass = $this->mdl_mobile_app->get_pass($prof_id);
                       $this->mdl_mobile_app->save_account_setting($prof_id,$set_new_pass);
                       $a[]=array(
                           "status"=>'success'
                       );
                }else{
                    if($old_pass != $get_pass){
                        $a[]=array(
                            "status"=>'failed_old_pass'
                        );
                    }else if($new_pass!=$confirm_pass){
                        $a[]=array(
                            "status"=>'failed_matched_pass'
                        );
                    }else{
                        $randomcode=$this->mdl_mobile_app->get_randomcode($prof_id);
                        $new_pass=$this->encrypt($new_pass,$randomcode);//password yang di encrypt - encrypt adalah function
                        $this->mdl_mobile_app->save_account_setting($prof_id,$new_pass);
                        $a[]=array(
                            "status"=>'success'
                        );
                    }
               }    
        echo json_encode($a);
    }
    
    function add_activity_art(){
//            if (!(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH']=="XMLHttpRequest")){
//                redirect('home');
//            }
//            else {
                  $data['base_url'] = $this->config->item('base_url');
                $art_id=$this->input->post('art_id');
                $fromtype=$this->input->post('fromtype');
                if($fromtype==''){
                    $fromtype=1;
                }
                $prof_id=$this->input->post('prof_id');
                $country_id="";
                $ip_id=$_SERVER['REMOTE_ADDR'];
                $com_name="Mobile Apps";
//                $cek=1;
//                if($prof_id!='' && $prof_id!='0' && $art_id!='' && ($fromtype=='1'||$fromtype=='2')){
//                    $cek=$this->mdl_mobile_app->is_activity_mobile($prof_id,$art_id);
//                    if($cek=='0'){
//                        $this->mdl_mobile_app->insert_activity($prof_id,$art_id,$fromtype,$country_id,$ip_id,$com_name);
//                        $this->mdl_mobile_app->update_totnewsworthyness($art_id);
//                        if($prof_id==$prof_id_root){//02102013
//                            $this->mdl_mobile_app->update_isvoted($art_id);
//                        }
//                    }
//                }
                $this->mdl_mobile_app->insert_activity($prof_id,$art_id,$fromtype,$country_id,$ip_id,$com_name);
                $this->mdl_mobile_app->update_totnewsworthyness($art_id);
                $totvote=$this->mdl_mobile_app->get_isworty_vote($art_id);
                echo '<img  width="40px" height="40px" src="image/vote_off.png" style="float:left">
                <div style="float:left;margin:12px"><span></span>'.$totvote.' Vote</div>';
                
//                $a='';
//                foreach($totvote as $p){
//                    $a[]=array(
//                    "totnewsworthyness"=>$totvote
//                    );
//                }
//                echo json_encode($a);
        }
         function detail_page_insert_comment(){
            $data['base_url'] = $this->config->item('base_url');
            $art_id = $this->input->post('art_id');
            $content_id  = $this->input->post('content_id');
            $comment = $this->input->post('ins_comment');
            $prof_id = $this->input->post('prof_id');
                $date_now = date("Y-m-d H:i:s");
                $ip_prof='9';
                $country_id = 1;
                $ip_id =$_SERVER['REMOTE_ADDR'];
                $com_name = 'Mobile Apps'; 
                $this->mdl_mobile_app->insert_comment_content($date_now, $prof_id, $art_id, $comment, $content_id);                                         
                $comm_id = $this->mdl_mobile_app->get_one_comment($content_id);
                
                $this->mdl_mobile_app->insert_activity_comment($prof_id,$art_id,'9',$country_id,$ip_id,$com_name,$comm_id);      
                //$this->load->view('detail/comment_load', $data);
                //echo json_encode('success !');
              
        }
     function insertfotoimgback_setprof(){
		$imgname=$_FILES["file"]["name"];
		$imgname_spl=explode(".", $imgname);
		$new_image_name = "FOT".date("YmdHis").rand(100, 999);
		move_uploaded_file($_FILES["file"]["tmp_name"], "./uni_img/temp/cover/".$new_image_name.".".$imgname_spl[count($imgname_spl)-1]);

		$this->load->library('image_lib');
                $config = array(
			'source_image' => "./uni_img/temp/".$new_image_name.".".$imgname_spl[count($imgname_spl)-1],
			'new_image' => "./uni_img/temp/",
			'maintain_ration' => true,
			'thumb_marker' => '',
                        'max_size'=>'10240',
                        'max_width'=>'0',
                        'max_height'=>'0'
			);

		$this->image_lib->initialize($config);
			$this->image_lib->resize();
			$this->image_lib->clear();
                        
		$config3 = array(
			'source_image' => "./uni_img/temp/cover/".$new_image_name.".".$imgname_spl[count($imgname_spl)-1],
			'new_image' => "./uni_img/temp/cover/",
			'maintain_ration' => true,
			'thumb_marker' => '',
			'width' => 1349,
			'height' => 10000
			);

		$this->image_lib->initialize($config3);
			$this->image_lib->resize();
			$this->image_lib->clear();
		
		
                
                
                $x1=0;
                $y1=0;
                $h=500;
                $w=1349;
                $this->load->library('image_lib');
                $this->image_lib->clear();
                $uploadDir = './uni_img/temp/cover/';
                $uploadDir2 = './uni_img/img_back';
                $config2 = array();
                ini_set('memory_limit', '512M');
                $config2=array(
                    'source_image' =>  $uploadDir.$new_image_name.".".$imgname_spl[count($imgname_spl)-1],
                    'new_image' => $uploadDir2,
                    'create_thumb' => FALSE,
                    'maintain_ration' => FALSE,
                    'width' => $w,
                    'height' => $w,
                    'y_axis' =>$y1,
                    'x_axis'  =>$x1,
                );
                $this->image_lib->initialize($config2);               
                if ( ! $this->image_lib->crop()){
                    $r=$this->image_lib->display_errors();
                }else{
                    unlink("./uni_img/temp/".$new_image_name.".".$imgname_spl[count($imgname_spl)-1]);
                    unlink("./uni_img/temp/cover/".$new_image_name.".".$imgname_spl[count($imgname_spl)-1]);
                    $this->image_lib->clear();
                    $config6 = array();
                    $config6['image_library'] = 'gd2';
                    $config6['source_image']=  './uni_img/img_back/'.$new_image_name.".".$imgname_spl[count($imgname_spl)-1];
                    $config6['new_image'] = './uni_img/img_back/thumb_500';
                    $config6['maintain_ratio'] = FALSE;
                    $config6['width']	 = round($w*0.3);
                    $config6['height']	= round($h*0.3);
                    $this->image_lib->initialize($config6);
                    $this->image_lib->resize();
                    if (file_exists('./uni_img/img_back/'.$header_hide)){
                        if($header_hide!='default.jpg'&& $header_hide!='' && $header_hide!=null){
                            unlink("./uni_img/img_back/".$header_hide);
                            unlink("./uni_img/img_back/thumb_500/".$header_hide);
                        }
                    }                
                }      
                        
		$_FILES["file"]["name"]=$new_image_name.".".$imgname_spl[count($imgname_spl)-1];
		echo '<img style="vertical-align: middle;border:1px solid white" width="100%" height="100%" src="http://192.168.1.123/campaign/uni_img/temp/cover/'.$new_image_name.".".$imgname_spl[count($imgname_spl)-1].'"/>
				 <input type="hidden" value="'.$new_image_name.".".$imgname_spl[count($imgname_spl)-1].'" id="setprof_imgback1" name="setprof_imgback1"/>';
	}         
}
?>
