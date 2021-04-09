<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Makanan_model extends CI_Model {

	public function get_provinsi()
	{
		$this->db->select('*');
		$this->db->from('provinsi');
		$query = $this->db->get()->result();
		return $query;
	}

	public function get_makanan()
	{
		$this->db->select('*');
		$this->db->from('makanan_daerah');
		$this->db->join('provinsi','provinsi.provinsi_id = makanan_daerah.provinsi_id');
		$query = $this->db->get()->result();
		return $query;
	}

	
	public function get_makanan_id($id)
	{
		$this->db->select('*');
		$this->db->from('makanan_daerah');
		$this->db->join('provinsi','provinsi.provinsi_id = makanan_daerah.provinsi_id');
		$this->db->where('makanan_daerah.id_makanan',$id);
		$query = $this->db->get()->result();
		return $query;
	}

	public function input_makanan_daerah($data){
		$this->db->insert('makanan_daerah', $data);
		return $this->db->insert_id();
	}

	public function delete_makanan_daerah($id){
		return $this->db->delete('makanan_daerah',array('id_makanan'=>$id));
	}

	public function update_makanan_daerah($id,$data){
		$this->db->where('id_makanan', $id);
		return $this->db->update('makanan_daerah',$data);
	}
}
?>	