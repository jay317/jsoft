<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Tool extends CI_Controller {

	public function __construct() {

		parent::__construct();
		if(!$this->session->userdata("username"))
		{
			redirect('welcome/index');
		}
		$this->load->model('ToolModel');

	}
	function license(){
	$data['page_title']='POS LICENSE';
	$this->load->view('tool/license',$data);

	}
	public function backup_restore(){
		$data['page_title']='BackUp And Restore';
		$data['req_page_name']='tool/backup_restore';
		$this->load->view('layout',$data);
	}
	
    public function backup(){
    	
    	$prefs = array(
        'ignore'        => array(),                     
        'format'        => 'txt',                       
        'filename'      => 'pos.sql',             
        'add_drop'      => TRUE,                       
        'add_insert'    => TRUE,                        
        'newline'       => "\n"                         
		);		
	//$fileName=date('m-d-Y H:i:s').'_'.$fileName;
    $this->load->dbutil();
    $backup =& $this->dbutil->backup($prefs);
    $this->load->helper('file');
    write_file(FCPATH.'/downloads/', $backup);
    $this->load->helper('download');
    force_download('pos.sql', $backup);
	}

	
public function restore(){
		
	$filename=$_FILES['sql_file']['tmp_name'];
	if(!empty($filename)){
		$templine = '';
		$lines = file($filename);
		foreach ($lines as $line)
		{
			if (substr($line, 0, 2) == '--' || $line == '' || $line[0]=='#')
			    continue;
			$templine .= $line;
			if (substr(trim($line), -1, 1) == ';')
			{
			    $this->db->query($templine) or print('Error performing query \'<strong>' . $templine . '\': ' . mysql_error() . '<br /><br />');
			    $templine = '';
			}else{
				$this->session->set_flashdata('msg_flash','<span class="text-danger" style="font-size:14px;font-style: italic;">Tables not imported please drop all tables before uploading. &nbsp;&nbsp;<i class="fa fa-times" aria-hidden="true"></i></span>');
		 		redirect('tool/backup_restore');
			}
		}
		$this->session->set_flashdata('msg_flash','<span class="text-success" style="font-size:18px;font-style: italic;">Tables imported successfully &nbsp;&nbsp;<i class="fa fa-check" aria-hidden="true"></i></span>');
		redirect('tool/backup_restore');
	 }else{
		$this->session->set_flashdata('msg_flash','<span class="text-danger" style="font-size:18px;font-style: italic;">No file selected.&nbsp;&nbsp;<i class="fa fa-times" aria-hidden="true"></i></span>');
		redirect('tool/backup_restore');
	}		
}
	
	
}
?>