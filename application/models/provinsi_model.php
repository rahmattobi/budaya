<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Provinsi_model extends CI_Model {

	function __construct() 
	{
		parent :: __construct();
	}

	public function get_all()
	{
		$data = $this->db->query("SELECT * FROM provinsi");
		return $data->result();
	}

	public function get_edit_data($id)
	{
		$data = $this->db->query("SELECT * FROM provinsi WHERE provinsi_id='$id'");
		return $data->result();
	}

	public function count_provinsi()
	{
		$data = $this->db->query("SELECT * FROM provinsi");
		return $data->num_rows();
	}

	public function simpan_data_provinsi($data)
	{
		$this->db->insert('provinsi',$data);
	}	

	public function eksekusi_edit_provinsi($id,$data)
	{
		$this->db->where('provinsi_id', $id);
		return $this->db->update('provinsi',$data);
	}	

	public function hapus_data_provinsi($id)
	{
		$this->db->query("DELETE FROM provinsi WHERE provinsi_id='$id'");
	}
}
?>	