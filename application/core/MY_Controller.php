<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
		$this->load->model('konsumen'); 
		$this->load->model('kategori');
		$this->load->model('subkategori'); 
		$this->load->model('itemsub'); 
		$this->load->model('produk');
		$this->load->model('toko');
		$this->load->model('ulasan');
		$this->load->model('diskusi');
		$this->load->model('diskusi_balas');
		$this->load->model('user');
		$this->load->model('opsi');
		//$this->load->model('order');
	}

}

/* End of file mY_Controller.php */
/* Location: ./application/controllers/mY_Controller.php */