<?php
//defined('BASEPATH') OR exit('No direct script access allowed');

class AndroidLogin_model extends CI_Model {

public function validate($username,$password){
		$this->db->where('icw_userName0317', $username);
		$this->db->where('icw_userPwd0317', md5($password));
		$this->db->select('icw_userId0317 as uid,icw_user_is_active0317 as sts,icw_userName0317 as loginid,icw_userPwd0317 as pwd,icw_userFname0317 as username');
		$query = $this->db->get('icw_users_0317');
		//echo $this->db->last_query();
		$row = $query->row();
		if($query->num_rows() == 1){
				if($row->sts == 1){					
						$data = array(
					'sessid' => md5(rand()),
					'uid' => $row->uid,
					'login_id' => $row->loginid,
					'username' => $row->username,	
					'shl_validated' => true,
					'shl_logged_in' => true,
						);
						$this->session->set_userdata($data);
						return '200';
				}else{
					return '201';
				}
		}else{
			return '202';
		}
		
	}

public function getProductCat()
{
	$this->db->select('icw_ci0317 as category_id, icw_cn0318 as category_name');
$query = $this->db->get('icw_cat_0317');
return $query;
} 

public function getProducts($id){
	
	$this->db->select('a.icw_pi0317 as product_id, a.icw_pn0317 as product_name,b.icw_imgname0317 as product_image');
	$this->db->from('icw_pro_0317 a');
	$this->db->join('icw_img_0317 b','a.icw_pi0317=b.icw_pid0317');
	$this->db->where('a.icw_cid0317',$id);
	$result=$this->db->get()->result();
	if(count($result)>0){
	return $result;
	}else{
		return false;
	}
}


}
?>