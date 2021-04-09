<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class MY_Model extends CI_Model {
	//Nama tabel database yang digunakan
	protected $_tabel = '';

	//Jumlah data per halaman(paging)
	protected $_per_page = 0;

	//Offset limit paging
	protected $_offset = 0;
	
	public function __construct()
	{
		parent::__construct();
		
		//Nama tabel berdasarkan nama model
		if (!$this->_tabel) {
			$this->_tabel = 'tb_'. strtolower(str_replace('_model', '', get_class($this)));
		}
	}


	//Ambil 1 record, dengan klausa 'where'
	public function get()
	{
		//Ambil argumen yang dilewatkan ke fungsi
		$args = func_get_args();

		if(count($args)>1){
			$this->db->where($args[0], $args[1]);
			// $this->db->where('nama', $name);
		}
		elseif (count($args)==1 && is_numeric($args)) {
			$this->db->where('id', $args[0]);
			// $this->db->where('id', $args[0]);
		}
		else
		{
			$this->db->where($args[0]);
			// $this->db->where(array('id' => $id, 'nama' => $nama));
			// $this->db->where("name ='JOE' and status = 'aktif'");
		}

		$this->db->select('*');
		//Hanya mengembalikan satu record
		$this->db->limit(1);

		//Mengembalikan hasil query
		return $this->db->get($this->_tabel)->row();
	}

	//Ambil smua data dengan beberapa klausa where
	public function get_all()
	{
		$args = func_get_args();
		
		//Tanpa parameter
		if(!count($args)>0){
			return $this->db->get($this->_tabel)->result();
		}
		elseif(count($args)>1){
			$this->db->where($args[0], $args[1]);
			// $this->db->where('nama', $name);
		}
		elseif (count($args)==1 && is_array($args[0]) || is_srting($args[0])) {
			$this->db->where($args[0]);
			// $this->db->where('id', $args[0]);
		}

		//Mengembalikan semua record
		return $this->db->get($this->_tabel)->result();
	}

	public function get_all_paged()
	{
		$args = func_get_args();

		// get_all_paged($offset)
		if(count($args) < 2){
			// $this->get_real_offset($args[0]);
			$this->db->limit($this->_per_page, $this->_offset);
		}else{
			// $this->get_real_offset($args[1]);
			$this->db->where($args[0])->limit($this->_per_page, $this->_offset);
		}

		return $this->db->get($this->_tabel)->result();
	}

	public function sort($field = '', $order ='')
	{
		if($field && $order){
			$this->db->order_by($field, $order);
		}else{
			$this->db->order_by('id', 'asc');
		}

		return $this;
	}

	public function get_all_num_rows()
	{
		return $this->db->get($this->_tabel)->num_rows();
	}

	public function insert($data)
	{
		$obj = (object) $data;
		$this->db->insert($this->_tabel, $obj);	
		return $this->db->insert_id();
	}

	public function update()
	{
		$args = func_get_args();

		//update('nama',$nama, $data)
		if(count($args) > 2){
			$this->db->where($args[0], $args[1]);
			$data = (object) $args[2];
		}
		//update(3, $data)
		elseif(count($args) == 2 && is_numeric($args[0])){
			$this->db->where('id', $args[0]);
			$data = (object) $args[1];
		}
		else
		{
			$this->db->where($args[0]);
			$data = (object) $args[1];
		}

		$this->db->limit(1);
		return $this->db->update($this->_tabel, $data);
	}

	//Hapus berdasarkan id
	public function delete($id)
	{
		$this->db->where('id', $id)->limit(1)->delete($this->_tabel);

		if($this->db->affected_rows() > 0){
			return true;
		}


		return false;
	}

	public function paging($base_url, $uri_segment, $limit)
	{
		$this->load->library('pagination');
		
		$config['base_url']			= $base_url;
		$config['uri_segment'] 		= $uri_segment;
		$config['per_page'] 		= $limit;
		$config['total_rows'] 		= $this->get_all_num_rows();
		$config['num_links'] 		= 4;
		$config['full_tag_open']    = '<ul class="pagination">';
        $config['full_tag_close']   = '</ul>';
        $config['first_link']       = 'First';
        $config['last_link']        = 'Last';
        $config['first_tag_open']   = '<li>';
        $config['first_tag_close']  = '</li>';
        $config['prev_link']        = '&laquo';
        $config['prev_tag_open']    = '<li class="prev">';
        $config['prev_tag_close']   = '</li>';
        $config['next_link']        = '&raquo';
        $config['next_tag_open']    = '<li>';
        $config['next_tag_close']   = '</li>';
        $config['last_tag_open']    = '<li>';
        $config['last_tag_close']   = '</li>';
        $config['cur_tag_open']     = '<li class="active"><a href="">';
        $config['cur_tag_close']    = '</a></li>';
        $config['num_tag_open']     = '<li>';
        $config['num_tag_close']    = '</li>';
		
		$this->pagination->initialize($config);
		
		return $this->pagination->create_links();
	}
}

/* End of file mY_Model.php */
/* Location: ./application/models/mY_Model.php */