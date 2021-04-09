<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Bajuadat_model extends CI_Model {

	public function get_provinsi()
	{
		$this->db->select('*');
		$this->db->from('provinsi');
		$query = $this->db->get()->result();
		return $query;
	}

	public function get_bajuadat()
	{
		$this->db->select('*');
		$this->db->from('baju_adat');
		$this->db->join('provinsi','provinsi.provinsi_id = baju_adat.provinsi_id');
		$query = $this->db->get()->result();
		return $query;
	}

	
	public function get_bajuadat_id($id)
	{
		$this->db->select('*');
		$this->db->from('baju_adat');
		$this->db->join('provinsi','provinsi.provinsi_id = baju_adat.provinsi_id');
		$this->db->where('baju_adat.id_bajuadat',$id);
		$query = $this->db->get()->result();
		return $query;
	}

	public function inputbaju_adat($data){
		$this->db->insert('baju_adat', $data);
		return $this->db->insert_id();
	}

	public function delete_bajuadat($id_baju){
		return $this->db->delete('baju_adat',array('id_bajuadat'=>$id_baju));
	}

	public function updatebaju_adat($id,$data){
		$this->db->where('id_bajuadat', $id);
		return $this->db->update('baju_adat',$data);
	}
}
?>	