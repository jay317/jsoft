<?php
ini_set('memory_limit', '-1');
class Update extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		//if (!$this->input->is_cli_request()) show_error('Error 404 Not found.',404,'Oops');
	}


	function index(){
	    $versions=$this->input->get('v');
	    if($versions){ 
				switch ($versions){

					case 1:
					    $this->db->query('ALTER TABLE icw_clients_0317 ADD icw_fk_shop_id int(11)');
					    echo("done");
					    
						break;
						case 2:
					    $this->db->query('ALTER TABLE icw_invoice_prodetails_0317 ADD icw_fk_shop_id int(11)');
					    $this->db->query('ALTER TABLE icw_invoice_taxdetails_0317 ADD icw_fk_shop_id int(11)');
					    $this->db->query('ALTER TABLE icw_invoice_taxmap_0317 ADD icw_fk_shop_id int(11)');
					    $this->db->query('ALTER TABLE icw_pro_0317 ADD icw_fk_shop_id int(11)');
					    $this->db->query('ALTER TABLE icw_restra_invo_0317 ADD icw_fk_shop_id int(11)');
					    $this->db->query('ALTER TABLE icw_restra_order_0317 ADD icw_fk_shop_id int(11)');
					    $this->db->query('ALTER TABLE icw_restra_servitor_0317 ADD icw_fk_shop_id int(11)');
					    $this->db->query('ALTER TABLE icw_restra_table_0317 ADD icw_fk_shop_id int(11)');
					    $this->db->query('ALTER TABLE icw_stock_0317 ADD icw_fk_shop_id int(11)');
					    $this->db->query('ALTER TABLE icw_stockmap_0317 ADD icw_fk_shop_id int(11)');
					    $this->db->query('ALTER TABLE icw_subcat_0317 ADD icw_fk_shop_id int(11)');
					    $this->db->query('ALTER TABLE icw_supplier_0317 ADD icw_fk_shop_id int(11)');
					    $this->db->query('ALTER TABLE icw_tax_0317 ADD icw_fk_shop_id int(11)');
					    $this->db->query('ALTER TABLE icw_taxmap_0317 ADD icw_fk_shop_id int(11)');
					    $this->db->query('ALTER TABLE icw_img_0317 ADD icw_fk_shop_id int(11)');
					    $this->db->query('ALTER TABLE icw_templates_0317 ADD icw_fk_shop_id int(11)');
					    $this->db->query('ALTER TABLE icw_subcat_0317 ADD icw_fk_shop_id int(11)');
					    $this->db->query('ALTER TABLE icw_sms_template_0317 ADD icw_fk_shop_id int(11)');
					    $this->db->query('ALTER TABLE icw_sms_audit_log_0317 ADD icw_fk_shop_id int(11)');
					    $this->db->query('ALTER TABLE icw_sms_template_0317 ADD icw_fk_shop_id int(11)');
						break;
						case 3:
						$this->db->query('ALTER TABLE icw_restra_invo_0317 ADD icw_restra_qty0317 int(11)');
						$this->db->query('ALTER TABLE icw_restra_invo_0317 ADD icw_restra_price0317 float');
						$this->db->query('ALTER TABLE icw_restra_invo_0317 ADD icw_restra_itemtotal0317 float');
						$this->db->query('ALTER TABLE icw_restra_invo_0317 ADD icw_restra_invoNo_0317 int');
						$this->db->query('ALTER TABLE icw_restra_invo_0317 ADD icw_restra_disPer_0317 float');
						$this->db->query('ALTER TABLE icw_restra_invo_0317 ADD icw_restra_disAmt_0317 float');
						$this->db->query('ALTER TABLE icw_restra_invo_0317 ADD icw_restra_payAmt_0317 float');
						$this->db->query('CREATE TABLE icw_restra_invoTax_0317 (icw_restra_taxid_0317 int NOT NULL AUTO_INCREMENT, icw_restra_invoid_0317 int, icw_restra_taxtype_0317 varchar(20), icw_restra_taxper_0317 float,icw_restra_taxamt_0317 float, PRIMARY KEY (icw_restra_taxid_0317))');
						break;
					default:
					echo("Version Dones not exist");
					break;
					
				}
					}else{
    echo "" . ($versionId / 10) . "  Version Does Not Exist\n";
}
			/*}
	}

 */
}
}


?>