<?php

class mdl_mobile_app extends Model{
    function getcampaignlist($order,$limit,$search){
     $sqlquery="select a.`art_id`,a.`title`,REPLACE(a.descrip,'<br />','') as descrip_art,
                pict_attfile,a.`prof_id`,a.artstat, a.publish_date,
                b.`firstname`,b.`username`,b.`avatar`,b.`description` as descrip_prof,
                (select COUNT(art_id) as jum from art_mst_art where art_id_root=a.art_id and artstat='publish') as jument,
                if(datediff(oa_closing_date,date(now()))<0,'Close',datediff(oa_closing_date,date(now()))) AS dayleft
                from `vw_art_mst_art` a left join `pro_mst_profiles` b on b.`prof_id`=a.`prof_id`
                where a.`artstat`='publish' and a.`type_id`='2' and a.`grpcat_id`<2 and a.`choose_camp`=1
                and a.`is_closed`=0 and a.`is_oa_done`=0 and a.title like '%".$search."%'
                $order $limit";
     $query = $this->db->query($sqlquery);
     $get = $query->result();
     return $get;
    }
    function getcampaignlist_completed($order,$limit,$search){
     $sqlquery="select a.`art_id`,a.`title`,REPLACE(a.descrip,'<br />','') as descrip_art,
                pict_attfile,a.`prof_id`,a.artstat, a.publish_date,
                b.`firstname`,b.`username`,b.`avatar`,b.`description` as descrip_prof,
                (select COUNT(art_id) as jum from art_mst_art where art_id_root=a.art_id and artstat='publish') as jument,
                if(datediff(oa_closing_date,date(now()))<0,'Close',datediff(oa_closing_date,date(now()))) AS dayleft
                from `vw_art_mst_art` a left join `pro_mst_profiles` b on b.`prof_id`=a.`prof_id`
                where a.`artstat`='publish' and a.`type_id`='2' and a.`grpcat_id`<2 and a.`choose_camp`=1
                and a.`is_closed`=1 and a.`is_oa_done`=1 and a.title like '%".$search."%'
                $order $limit";
     $query = $this->db->query($sqlquery);
     $get = $query->result();
     return $get;
    }
    function getcampaignlist_upcoming($order,$limit,$search){
     $sqlquery="select a.`art_id`,a.`title`,REPLACE(a.descrip,'<br />','') as descrip_art,
                pict_attfile,a.`prof_id`,a.artstat, a.publish_date,
                b.`firstname`,b.`username`,b.`avatar`,b.`description` as descrip_prof,
                (select COUNT(art_id) as jum from art_mst_art where art_id_root=a.art_id and artstat='publish') as jument,
                if(datediff(oa_closing_date,date(now()))<0,'Close',datediff(oa_closing_date,date(now()))) AS dayleft
                from `vw_art_mst_art` a left join `pro_mst_profiles` b on b.`prof_id`=a.`prof_id`
                where a.`artstat`='confirm' and a.`type_id`='2' and a.`grpcat_id`<2 and a.`choose_camp`=1
                and a.`is_closed`=0 and a.`is_oa_done`=0 and a.title like '%".$search."%'
                $order $limit";
     $query = $this->db->query($sqlquery);
     $get = $query->result();
     return $get;
    }
    function campaign_detail($art_id){
        $strsql= "SELECT art_id,hook_name, key_page, art_id_root,oa_start_date,oa_closing_date,title,descrip,pict_attfile,c.`description` as descrip_prof,
                    a.`prof_id`,firstname,username,description,avatar,artstat,oa_num_entry,oa_photo_entry,coverprofile_position_x,coverprofile_position_y,
                    (select COUNT(art_id) as jum from art_mst_art where art_id_root=a.art_id and artstat='publish') as jument,
                    if(datediff(oa_closing_date,date(now()))<0,'Close',datediff(oa_closing_date,date(now()))) AS dayleft, a.is_closed, a.is_oa_done
                    FROM `vw_art_mst_art` a
                    LEFT JOIN `pro_mst_profiles` c ON a.`prof_id`=c.`prof_id` WHERE art_id = ?
                    and (artstat='publish' || artstat='confirm')and type_id = 2";
        $query = $this->db->query($strsql,array($art_id));
        $get = $query->result();
        return $get;
    }
    function prizes($art_id){
        $strsql= "SELECT * FROM art_trx_prize Where art_id = ? Order By prize_sort asc";
        $query = $this->db->query($strsql,array($art_id));
        $get = $query->result();
        return $get;
    }
    function getentrieslist($order_id,$limit,$art_id){
        $strsql= "SELECT art_id,a.`publish_Date`,a.`descrip`,a.prof_id,hook_name,title,firstname,username,totnewsworthyness,oa_start_date,description,avatar,`func_pic_attfile`(a.key_page,0) AS pic1
                  from vw_art_mst_art a LEFT JOIN `pro_mst_profiles` c ON a.`prof_id`=c.`prof_id` WHERE type_id = 1 and art_id_root = ? AND artstat='publish' $order_id $limit";
        $query = $this->db->query($strsql,array($art_id));
        $get = $query->result();
        return $get;
    }
     function getentrieslist_detail_response($art_id_res,$prof_id){
        $strsql= "SELECT a.art_id,a.art_id_root,title,b.is_closed,b.is_oa_done,a.prof_id,firstname,username,a.hook_name,avatar,totnewsworthyness,tag,publish_Date,descrip,`func_pic_attfile`(a.key_page,0) AS pic1, func_pic_desc(a.key_page) as pic_desc,`funct_isworthy_dismiss`(a.`art_id`,1,?,0) AS isworthy, (SELECT content_id FROM `art_trx_content` d WHERE d.key_page = a.key_page and (content_type = '0' and islink = '0') ORDER BY sort_num ASC limit 0,1) as content_id
                      from vw_art_mst_art a
                      LEFT JOIN `pro_mst_profiles` c ON a.`prof_id`=c.`prof_id`
                      LEFT JOIN `art_trx_project` b ON a.`art_id`=a.`art_id`
                       WHERE a.art_id =? and type_id=1 and artstat='publish'
                       and a.`art_id_root`=b.art_id";
        $query = $this->db->query($strsql,array($prof_id,$art_id_res));
        $get = $query->result();
        return $get;
    }
    function comment($limit,$art_id){
            $strsql= "SELECT comm_id,content_id,a.prof_id,commdate,comment,commstat,username,avatar,firstname FROM `art_trx_content_comment` a LEFT JOIN pro_mst_profiles b on a.prof_id = b.prof_id WHERE art_id = ? order by comm_id desc $limit";
            $query = $this->db->query($strsql,array($art_id));
            $get = $query->result();
            return $get;
        }
    function getprofid($username){
        $username=str_replace("'","",$username);
        $sqlquery = "select prof_id from pro_mst_profiles where email=? or username='".$username."'";
        $query = $this->db->query($sqlquery,array($username));
        $get =$query->result();
        $data = '';
        foreach ($get as $p) {
            $data = $p->prof_id;
        }
	return $data;
    }
    function popup_join($art_id){
            $strsql= "SELECT art_id,tag,a.prof_id,firstname,username,oa_num_entry,oa_photo_entry,hook_name
                      from vw_art_mst_art a LEFT JOIN `pro_mst_profiles` c ON a.`prof_id`=c.`prof_id` WHERE art_id = ? and artstat='publish'";
            $query = $this->db->query($strsql,array($art_id));
            $get = $query->result();
            return $get;
    }
    function get_num($keypage){
        $sqlquery = "Select sort_num from art_trx_content where key_page=? order by sort_num desc limit 0,1";
        $query = $this->db->query($sqlquery,array($keypage));

                $get = $query->result();
                $sort_num='';
                foreach ($get as $g){
                    $sort_num=$g->sort_num;
                }
                if($sort_num==''){
                    $sort_num=0;
                }
                return $sort_num;
    }
    function get_randomcode($prof_id)
    {
        $sqlquery = "SELECT Rndnum from pro_mst_profiles where Prof_id= '".$prof_id."'";
        $getrndmcode = $this->db->query($sqlquery);
        $rndcode = $getrndmcode->row();
        if (isset($rndcode) && count($rndcode))
        {  $get = $rndcode->Rndnum;    }
        else { $get = "0"; }
        return $get;
    }
    function get_pass($prof_id){
        $sqlquery = "SELECT Password from pro_mst_profiles where Prof_id=?";
        $getpass = $this->db->query($sqlquery,array($prof_id));
        $pass = $getpass->row();
        if (isset($pass) && count($pass))
        { $get = $pass->Password; }
        else {$get=''; }
        return $get;
    }

    function getfirstname($prof_id){
        $sqlquery = "select firstname from pro_mst_profiles where prof_id=?";
        $query = $this->db->query($sqlquery,array($prof_id));
        $get =$query->result();
        $data='';
        foreach ($get as $p) {
            $data = $p->firstname;
        }
        return $data;
    }

    function insertdummy($isi1,$isi2){
    $data = array(
          "timezone_name" => $isi1,
          "timezone_time" => $isi2
         );
    $this->db->insert('tlb_timezone', $data);
    }

    function getdetentries($art_id,$prof_id){
            $strsql= "SELECT key_page,art_id_root,art_id,title,a.prof_id,firstname,username,avatar,totnewsworthyness,tag,publish_Date,descrip,`func_pic_attfile`(a.key_page,0) AS pic1, func_pic_desc(a.key_page) as pic_desc,`funct_isworthy_dismiss`(a.`art_id`,1,?,0) AS isworthy
                  from vw_art_mst_art a LEFT JOIN `pro_mst_profiles` c ON a.`prof_id`=c.`prof_id` WHERE art_id = ? and artstat='publish'";
        $query = $this->db->query($strsql,array($prof_id,$art_id));
        $get = $query->result();
        return $get;
    }
    function add_campaign($art_id,$prof_id,$language_id,$country_id,$timezone_id,$tag,$grpcat_id,$key_page,$ispicture,$descrip){
            $data = array(
            'art_id_root'  => $art_id,
            'prof_id'  => $prof_id,
            'language_id'  => $language_id,
            'country_id'  => $country_id,
            'timezone_id'  => $timezone_id,
            'tag'  => $tag,
            'grpcat_id'  => $grpcat_id,
            'type_id'  => '1',
            'artstat'  => 'publish',
            'key_page'  => $key_page,
            'isPicture'  => $ispicture,
            'descrip'  => $descrip,
            'publish_Date'  => date('Y-m-d H:i:s')
            );
            $this->db->insert('art_mst_art', $data);
        }
         function add_picture_campaign($key_page,$pict_attfile,$pict_attfile_thumb){
            $data = array(
            'key_page' => $key_page,
            'content_type' => '0',
            'pict_attfile' => $pict_attfile,
            'pict_attfile_thumb' => $pict_attfile_thumb,
            'islink' => '0'
            );
            $this->db->insert('art_trx_content', $data);

        }
		//PROFILE
    function get_profil($prof_id){
        $sqlquery="select prof_id,firstname,header_art_photo,header_photo_pos_x,header_photo_pos_y,avatar,description,username,sex,address 

            from vw_portofolio where prof_id=?";
        $query = $this->db->query($sqlquery,array($prof_id));
		$get = $query->result();
		return $get;
    }
    function cek_is_subscribe($prof_id,$prof_id_to){
        $sqlquery="select `func_is_subscribe`(?,?) as jumlah";
        $query = $this->db->query($sqlquery,array($prof_id,$prof_id_to));
		$get = $query->result();
		$jumlah='';
        foreach ($get as $g){
            $jumlah=$g->jumlah;
        }
        if($jumlah==''){
            $jumlah=0;
        }
        return $jumlah;
    }
    function get_count_campaign($prof_id){
        $sqlquery="select func_count_campaign(?,'2') as count_campaign, func_count_campaign(?,'1') as count_response";
        $query = $this->db->query($sqlquery,array($prof_id,$prof_id,$prof_id));
		$get = $query->result();
		return $get;
    }
    function get_slide_campaign($prof_id, $strlimit, $type, $where){
        if($type=='1'){//02102013
            $sqlquery="select a.`art_id`,func_get_front_pic_drk(a.`key_page`,0) as photo_slide,a.`prof_id`
                    from `art_mst_art` a 
                    left join art_trx_project d on a.art_id = d.art_id
                    where (a.`artstat`='publish' or a.`artstat`='confirm') and a.`type_id`=? and a.`grpcat_id`<2
                    and a.prof_id = ? ".$where." order by a.`art_id` desc ".$strlimit;
            $query = $this->db->query($sqlquery,array($type,$prof_id));
            $get = $query->result();
            return $get;
        }else if($type=='2'){
        $sqlquery="select a.`art_id`,a.`title`,a.`descrip` as descrip_art, d.pict_attfile as photo_slide,a.`prof_id`,a.`artstat`,
                    b.`avatar`, d.season
                    from `art_mst_art` a inner join `pro_mst_profiles` b on b.`prof_id`=a.`prof_id`
                    left join art_trx_project d on a.art_id = d.art_id
                    where (a.`artstat`='publish' or a.`artstat`='confirm') and a.`type_id`=? and a.`grpcat_id`<2
                    and a.prof_id = ? ".$where." order by a.`art_id` desc ".$strlimit;
        $query = $this->db->query($sqlquery,array($type,$prof_id));
		$get = $query->result();
		return $get;}
    }
    function Add_subscribe($prof_id,$prof_id_to){
        $sqlquery="insert into `pro_trx_people` (
              `people_type`,
              `prof1_id`,
              `prof2_id`,
              `people_date`
              )
              values(?,?,?,?)";
        $this->db->query($sqlquery,array('1',$prof_id_to,$prof_id,date('Y-m-d H:i:s')));
    }
    function get_people_id($prof_id_session, $prof_id_to){
        $sqlquery="select people_id from pro_trx_people where prof2_id = ? and prof1_id = ?";
        $query = $this->db->query($sqlquery,array($prof_id_session, $prof_id_to));
	$get = $query->result();
        $people_id='';
        foreach ($get as $g){
            $people_id=$g->people_id;
        }
        return $people_id;
    }
    function del_subscribe($peopleid){
        $this->db->where('people_id',$peopleid);
        $this->db->delete('pro_trx_people');
    }
    //04112013
    function get_profiles_setting($prof_id){
        $sqlquery = "SELECT prof_id,firstname,avatar,description,dob,sex,address,header_art_photo FROM pro_mst_profiles WHERE prof_id = ?";
        $query = $this->db->query($sqlquery,array($prof_id));
        $result =$query->result();
        return $result;
    }
    function save_profiles_setting($prof_id,$firstname,$description,$dob,$sex,$address,$avatar,$cover){
        $this->db->where('prof_id',$prof_id);
        $data = array(
            'firstname' =>$firstname,
            'description' =>$description,
            'dob'=>$dob,
            'sex' => $sex,
            'address' => $address,
            'avatar' =>$avatar,
            'header_art_photo'=>$cover
        );        
        $this->db->update('pro_mst_profiles', $data);
    }
    //08112013
    function get_acc_setting($prof_id){
        $sqlquery = "SELECT username FROM pro_mst_profiles WHERE prof_id = ?";
        $query = $this->db->query($sqlquery,array($prof_id));
        $result =$query->result();
        return $result;
    }
    function cek_username_change($username){
        $sqlquery = "SELECT count(username) total
                        from pro_mst_profiles
                    where username ='".$username."'and prof_id not in ('".$this->session->userdata('prof_id')."')";
        $query = $this->db->query($sqlquery);
        $result =$query->result();
        $total=0;
        foreach ($result as $value) {
            $total=$value->total;
        }
        return $total;
    }
    function cek_username_sys($username){
        $sqlquery = "SELECT count(username_no) total
                        from sys_username
                    where username_no = '".$username."'";
        $query = $this->db->query($sqlquery);
        $result =$query->result();
        $total=0;
        foreach ($result as $value) {
            $total=$value->total;
        }
        return $total;
    }
    function update_username($username,$prof_id){
        $this->db->where('prof_id',$prof_id);
        $data = array(
            'username' =>$username
        );
        $this->db->update('pro_mst_profiles', $data);
    }    
    function save_account_setting($prof_id,$new_password){
        $this->db->where('prof_id',$prof_id);
        $data = array(
            'password' =>$new_password,
            'lastupd' =>date("Y-m-d H:i:s")
        );
        $this->db->update('pro_mst_profiles', $data);
    }
        function is_activity_sensitif($prof_id,$art_id){
            $sqlquery = "select count(artactivity_id) as a from art_trx_activity where prof_id=? and art_id=? and (fromtype=1 or fromtype=2)";
            $query = $this->db->query($sqlquery,array($prof_id,$art_id));
            $get =$query->result();
            foreach ($get as $p) {
                $data = $p->a;
            }
            return $data;
        }
        function insert_activity($prof_id,$art_id,$fromtype,$country_id,$ip_id,$com_name){
            $data = array(
                'fromtype'=>$fromtype,
                'act_date'=>date('Y-m-d H:i:s'),
                'prof_id'=>$prof_id,
                'art_id'=>$art_id,
                'country_id'=>$country_id,
                'IP_prof_id'=>$ip_id,
                'Com_name_prof_id'=>$com_name
            );
            $this->db->insert('art_trx_activity', $data);
        }
        function update_totnewsworthyness($art_id){
            $sqlquery = "SELECT totnewsworthyness FROM art_mst_art where art_id = ?";
            $query = $this->db->query($sqlquery,array($art_id));
            $get =$query->result();
            foreach($get as $f){
                $tambah = 1 + $f->totnewsworthyness;
            }
            $this->db->where('art_id', $art_id);
            $data = array(
               'totnewsworthyness' => $tambah
            );
            $this->db->update('art_mst_art', $data);
        }   
        function get_isworty_vote($art_id){
        $sqlquery = "SELECT totnewsworthyness FROM art_mst_art where art_id = ?";
        $query = $this->db->query($sqlquery,array($art_id));
        $result =$query->result();
        foreach($result as $f){
                $totvote =  $f->totnewsworthyness;
            }
        return $totvote;
    }
        function update_isvoted($art_id){
            $this->db->where('art_id',$art_id);
            $data = array(
                 'is_voted' => 1
            );
            $this->db->update('art_mst_art', $data);    
        }
      function is_activity_mobile($prof_id,$art_id){
            $sqlquery = "select count(artactivity_id) as a from art_trx_activity where prof_id=? and art_id=? and (fromtype=1 or fromtype=2)";
            $query = $this->db->query($sqlquery,array($prof_id,$art_id));
            $get =$query->result();
            foreach ($get as $p) {
                $data = $p->a;
            }
            return $data;
        }
        function insert_comment_content($date_now, $prof_id, $art_id, $comment, $content_id){
            $sqlquery="INSERT INTO art_trx_content_comment VALUES('',?,?,?,'publish','1',?,?)";
            $query = $this->db->query($sqlquery,array($prof_id,$date_now,$comment,$content_id,$art_id));
        }
        function get_one_comment($content_id){
            $sqlquery="select a.comm_id,a.prof_id,b.username,b.firstname,b.avatar,a.commdate,a.comment,a.commstat, a.ref_from, a.content_id, a.art_id
                        from art_trx_content_comment a
                        left join pro_mst_profiles b on b.prof_id=a.prof_id
                        where content_id =? and a.ref_from=1 order by a.commdate desc limit 0,1";
            $query = $this->db->query($sqlquery,array($content_id));
            $get = $query->result();
		$load_comm=0;
		foreach ($get as $d){
                    $load_comm=$d->comm_id;
                }
            return $load_comm;
        }
        function insert_activity_comment($prof_id,$art_id,$fromtype,$country_id,$ip_id,$com_name,$comm_id){
            $data = array(
                'fromtype'=>$fromtype,
                'act_date'=>date('Y-m-d H:i:s'),
                'prof_id'=>$prof_id,
                'art_id'=>$art_id,
                'country_id'=>$country_id,
                'IP_prof_id'=>$ip_id,
                'Com_name_prof_id'=>$com_name,
                'comm_id'=>$comm_id
            );
            $this->db->insert('art_trx_activity', $data);
        }
}
?>
