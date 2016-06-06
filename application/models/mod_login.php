<?php
class mod_login extends CI_Model{
function __construct()
    {
        parent::__construct();
    }
function cekpassword($user_id, $newpass)
{
		$this->db->where('user_id',$user_id);
		$ambil=$this->db->get('user_admin');
		if ($ambil->num_rows==1)
		{
			$this->db->where('user_id',$user_id);
			$data = array(
				'password' => md5($newpass),
				);
			$this->db->update('user_admin', $data);
			return true;
		}
		else
		{
			return false;
		}
}


	function changepass($email, $oldpass, $newpass)
	{
		$this->db->where('email',$email);
		$this->db->where('password',md5($oldpass));
		$ambil=$this->db->get('user_admin');
		if ($ambil->num_rows==1)
		{
			$this->db->where('email',$email);
			$data = array(
				'password' => md5($newpass)
				);
			$this->db->update('user_admin', $data);
			return true;
		}
		else
		{
		return false;
		}
	}

	function validasi()
	{
		$this->db->where('email',$this->input->post('email'));
		$this->db->where('password',$this->input->post('password'));

		$ambil = $this->db->get('user_admin');
		$base_url=$this->config->item('base_url');
		if($ambil->num_rows == 1)
			{
			return true;
			}
		else
			{
			redirect($base_url.'index.php/login/wrongPassword');
			}
	}
        function get_prof_id($email)
	{
		$sqlquery = "SELECT user_id FROM user_admin WHERE email='".$email."'";
                $query = $this->db->query($sqlquery);
                $get = $query ->result();
                $prof_id='';
                foreach ($get as $p) {
                    $prof_id=$p->user_id;
                }
                return $prof_id;
	}


        function get_user_id($email)
	{
		$sqlquery = "SELECT user_id FROM user_admin WHERE email='".$email."'";
                $query = $this->db->query($sqlquery);
                $get = $query ->result();
                $user_id='';
                foreach ($get as $p) {
                    $user_id=$p->user_id;
                }
                return $user_id;
	}

   }
 ?>