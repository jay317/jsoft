<?php
class SendSms extends CI_Model {

	/* Optics sms */
	function send_sms_optics_cus($mobile_cus,$ord_no,$tmplt_id_cus){
		$mobile=$mobile_cus;
		$this->db->select('*');
		$this->db->where('icw_template_code0317',$tmplt_id_cus);
		$this->db->from('icw_templates_0317');
		$rslt=$this->db->get()->row();
			
		if(count($rslt)>0){
			$message =urlencode($rslt->icw_template_name0317 . ":");
			$message .=urlencode($rslt->icw_sms_tmplt0317);
			$message .=urlencode("-" . $ord_no);

			$mobileNumber = "9999999";
			$senderId = "ICONRD";
			$settingDetails=$this->session->userdata('settingDetails');
		 $url=$settingDetails->icw_shop_sms0317;
		 $url= str_replace("{message}", $message, $url);
		 $url= str_replace("{mobile}", $mobile, $url);
		 $ch = curl_init();
		 curl_setopt_array($ch, array(
		 CURLOPT_URL => $url,
		 CURLOPT_RETURNTRANSFER => true,
		 ));

		 $output = curl_exec($ch);

		 //Print error if any
		 if(curl_errno($ch))
		 {
		 	echo 'error:' . curl_error($ch);
		 }
		 curl_close($ch);
		// echo $output;
		 if($output){
		 	$insData=array('icw_sms_mob0317'=>$mobile,'icw_sms_temp0317'=>$tmplt_id_cus,'icw_sms_status0317'=>1);
		 }else{
		 	$insData=array('icw_sms_mob0317'=>$mobile,'icw_sms_temp0317'=>$tmplt_id_cus,'icw_sms_status0317'=>0);
		 }
			$ins = $this->db->insert('icw_sms_audit_log_0317', $insData);
		}
	}

	function send_sms_optics_tec($mobile_tec,$ord_no,$tmplt_id_tec){
		$mobile=$mobile_tec;
		$this->db->select('*');
		$this->db->where('icw_template_code0317',$tmplt_id_tec);
		$this->db->from('icw_templates_0317');
		$rslt=$this->db->get()->row();

		if(count($rslt)>0){
			$message =urlencode($rslt->icw_template_name0317 . ":");
			$message .=urlencode($rslt->icw_sms_tmplt0317);
			$message .=urlencode("-" . $ord_no);

			$mobileNumber = "9999999";
			$senderId = "ICONRD";
			
		 $settingDetails=$this->session->userdata('settingDetails');
		 $url=$settingDetails->icw_shop_sms0317;
		 $url= str_replace("{message}", $message, $url);
		 $url= str_replace("{mobile}", $mobile, $url);
			// init the resource
			$ch = curl_init();
			curl_setopt_array($ch, array(
			CURLOPT_URL => $url,
			CURLOPT_RETURNTRANSFER => true,
			));

			$output = curl_exec($ch);

			//Print error if any
			if(curl_errno($ch))
			{
				echo 'error:' . curl_error($ch);
			}
			curl_close($ch);
			//echo $output;
			if($output){
				$insData=array('icw_sms_mob0317'=>$mobile,'icw_sms_temp0317'=>$tmplt_id_tec,'icw_sms_status0317'=>1);
			}else{
				$insData=array('icw_sms_mob0317'=>$mobile,'icw_sms_temp0317'=>$tmplt_id_tec,'icw_sms_status0317'=>0);
			}
			$ins = $this->db->insert('icw_sms_audit_log_0317', $insData);
		}
	}


	/* Tailor sms */
	function send_sms_tailor_cus($mobile_cus,$ord_no,$tmplt_id_cus){
		$mobile=$mobile_cus;
		$this->db->select('*');
		$this->db->where('icw_template_code0317',$tmplt_id_cus);
		$this->db->from('icw_templates_0317');
		$rslt=$this->db->get()->row();
		if(count($rslt)>0){
			$message =urlencode($rslt->icw_template_name0317 . ":");
			$message .=urlencode($rslt->icw_sms_tmplt0317);
			$message .=urlencode("-" . $ord_no);

			$mobileNumber = "9999999";
			$senderId = "ICONRD";

			$settingDetails=$this->session->userdata('settingDetails');
			 $url=$settingDetails->icw_shop_sms0317;
			 $url= str_replace("{message}", $message, $url);
			 $url= str_replace("{mobile}", $mobile, $url);
			$ch = curl_init();
			curl_setopt_array($ch, array(
			CURLOPT_URL => $url,
			CURLOPT_RETURNTRANSFER => true,
			));

			$output = curl_exec($ch);

			//Print error if any
			if(curl_errno($ch))
			{
				echo 'error:' . curl_error($ch);
			}
			curl_close($ch);
			echo $output;
			if($output){
				$insData=array('icw_sms_mob0317'=>$mobile,'icw_sms_temp0317'=>$tmplt_id_cus,'icw_sms_status0317'=>1);
			}else{
				$insData=array('icw_sms_mob0317'=>$mobile,'icw_sms_temp0317'=>$tmplt_id_cus,'icw_sms_status0317'=>0);
			}
			$ins = $this->db->insert('icw_sms_audit_log_0317', $insData);
		}
	}
	function send_sms_tailor_tec($mobile_tec,$ord_no,$tmplt_id_tec){
		$mobile=$mobile_tec;
		$this->db->select('*');
		$this->db->where('icw_template_code0317',$tmplt_id_tec);
		$this->db->from('icw_templates_0317');
		$rslt=$this->db->get()->row();
		if(count($rslt)>0){
			$message =urlencode($rslt->icw_template_name0317 . ":");
			$message .=urlencode($rslt->icw_sms_tmplt0317);
			$message .=urlencode("-" . $ord_no);

			$mobileNumber = "9999999";
			$senderId = "ICONRD";

			$settingDetails=$this->session->userdata('settingDetails');
		 $url=$settingDetails->icw_shop_sms0317;
		 $url= str_replace("{message}", $message, $url);
		 $url= str_replace("{mobile}", $mobile, $url);
			$ch = curl_init();
			curl_setopt_array($ch, array(
			CURLOPT_URL => $url,
			CURLOPT_RETURNTRANSFER => true,
			));

			$output = curl_exec($ch);

			//Print error if any
			if(curl_errno($ch))
			{
				echo 'error:' . curl_error($ch);
			}
			curl_close($ch);
			//echo $output;
			if($output){
				$insData=array('icw_sms_mob0317'=>$mobile,'icw_sms_temp0317'=>$tmplt_id_tec,'icw_sms_status0317'=>1);
			}else{
				$insData=array('icw_sms_mob0317'=>$mobile,'icw_sms_temp0317'=>$tmplt_id_tec,'icw_sms_status0317'=>0);
			}
			$ins = $this->db->insert('icw_sms_audit_log_0317', $insData);
		}
	}
}