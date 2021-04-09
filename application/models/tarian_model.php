<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tarian_model extends CI_Model {

	public function get_provinsi()
	{
		$this->db->select('*');
		$this->db->from('provinsi');
		$query = $this->db->get()->result();
		return $query;
	}

	public function get_tarian()
	{
		$this->db->select('*');
		$this->db->from('tarian');
		$this->db->join('provinsi','provinsi.provinsi_id = tarian.provinsi_id');
		$query = $this->db->get()->result();
		return $query;
	}

	
	public function get_tarian_id($id)
	{
		$this->db->select('*');
		$this->db->from('tarian');
		$this->db->join('provinsi','provinsi.provinsi_id = tarian.provinsi_id');
		$this->db->where('tarian.tarian_id',$id);
		$query = $this->db->get()->result();
		return $query;
	}

	public function input_tarian_daerah($data){
		$this->db->insert('tarian', $data);
		return $this->db->insert_id();
	}

	public function delete_tarian_daerah($id){
		return $this->db->delete('tarian',array('tarian_id'=>$id));
	}

	public function update_tarian_daerah($id,$data){
		$this->db->where('tarian_id', $id);
		return $this->db->update('tarian',$data);
	}
}
?>	