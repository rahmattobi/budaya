<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_admin extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('provinsi_model');
		$this->load->model('bajuadat_model');
		$this->load->model('makanan_model');
		$this->load->model('tarian_model');
		$this->load->library('form_validation');
		if($this->session->userdata('logged_in') !== TRUE){
			redirect('c_login');
		}
	}

	public function index()
	{
		$data['provinsi'] = $this->db->count_all('provinsi');
		$data['tarian'] = $this->db->count_all('tarian');
		$data['baju'] = $this->db->count_all('baju_adat');
		$data['makanan'] = $this->db->count_all('makanan_daerah');
		$data['pvs'] = $this->provinsi_model->get_all();
		$data['content']='admin/dashboard';
		$this->load->view('admin/template', $data);
	}
	
	public function input_provinsi()
	{
		$data['pvs'] = $this->provinsi_model->get_all();
		$data['c_pvs']  = $this->db->count_all('provinsi');
		$data['content']='admin/input_provinsi';
		$this->load->view('admin/template', $data);
	}

	public function simpan_data_provinsi() {
		$config['upload_path'] = './images/';
		$config['file_name'] = md5(date('Y-m-d H:i:s'));
		$config['allowed_types'] = 'jpg|png|jpeg';
		$config['max_size'] = '5000';
		$this->upload->initialize($config);
		$this->load->library('upload', $config);

		if ($this->upload->do_upload('gambar')){
			$gambar = $this->upload->data('file_name');

			$data = array(
				'nama_provinsi' => $this->input->post('nama_provinsi'),
				'foto_provinsi' => $gambar,
				'desk_provinsi' => $this->input->post('desk_provinsi')
			);
			$this->provinsi_model->simpan_data_provinsi($data);
			
			$this->session->set_flashdata('info','<div class="alert alert-success alert-dismissible" role="alert"> Data Berhasil di Tambahkan !</div>');
			redirect('c_admin/input_provinsi','refresh');

		}else {
			$data = array('error' => '<p style="color:red;">FORMAT FOTO TIDAK SESUAI !! <br> Silahkan Uploud Kembali</p>');
			$data['pvs'] = $this->provinsi_model->get_all();
			$data['c_pvs']  = $this->db->count_all('provinsi');
			$data['content']='admin/input_provinsi';
			$this->load->view('admin/template', $data);
		}
	}

	public function edit_data_provinsi($id) {
		$data['data']   = $this->provinsi_model->get_edit_data($id); 
		$data['pvs']    = $this->provinsi_model->get_all();
		$data['c_pvs']  = $this->provinsi_model->count_provinsi();
		$data['content']='admin/edit_input_provinsi';
		$this->load->view('admin/template',$data);
	}

	public function eksekusi_edit_provinsi($id) {
		$config['upload_path'] = './images/';
		$config['file_name'] = md5(date('Y-m-d H:i:s'));
		$config['allowed_types'] = 'jpg|png|jpeg';
		$config['max_size'] = '5000';
		$this->upload->initialize($config);
		$this->load->library('upload', $config);

		if ($this->upload->do_upload('gambar')){
			$gambar = $this->upload->data('file_name');

			$data = array(
				'nama_provinsi' => $this->input->post('nama_provinsi'),
				'foto_provinsi' => $gambar,
				'desk_provinsi' => $this->input->post('desk_provinsi')
			);

			$this->provinsi_model->eksekusi_edit_provinsi($id,$data);
			$this->session->set_flashdata('info','<div class="alert alert-success alert-dismissible" role="alert"> Data Berhasil di Update !</div>');
			redirect('c_admin/input_provinsi','refresh');

		}else {
			$data = array('error' => '<p style="color:red;">FORMAT FOTO TIDAK SESUAI !! <br> Silahkan Uploud Kembali</p>');
			$data['pvs'] = $this->provinsi_model->get_all();
			$data['c_pvs']  = $this->db->count_all('provinsi');
			$data['content']='admin/input_provinsi';
			$this->load->view('admin/template', $data);
		}

	}

	public function hapus_data_provinsi($id) {
		$this->provinsi_model->hapus_data_provinsi($id);
		$this->session->set_flashdata('info','<div class="alert alert-success alert-dismissible" role="alert"> Data Berhasil di hapus !</div>');
		redirect('c_admin/input_provinsi','refresh');
	}

	// BAJU ADAT

	public function baju_adat()
	{
		$data['baju_adat']= $this->bajuadat_model->get_bajuadat();
		$data['provinsi']= $this->bajuadat_model->get_provinsi();
		$data['content']='admin/baju_adat';
		$this->load->view('admin/template', $data);
	}

	public function inputbaju_adat(){
		$config['upload_path'] = './images/';
		$config['file_name'] = md5(date('Y-m-d H:i:s'));
		$config['allowed_types'] = 'jpg|png|jpeg';
		$config['max_size'] = '5000';
		$this->upload->initialize($config);
		$this->load->library('upload', $config);

		if ($this->upload->do_upload('gambar')){
			$gambar = $this->upload->data('file_name');

			$data = array(
				'provinsi_id' => $this->input->post('id_provinsi'),
				'nama_bajuadat' => $this->input->post('nama_bajuadat'),
				'foto' => $gambar,
				'desc_bajuadat' => $this->input->post('desc')
			);
			$this->bajuadat_model->inputbaju_adat($data);
			$this->session->set_flashdata('info','<div class="alert alert-success alert-dismissible" role="alert"> Data Berhasil di Tambahkan !</div>');
			redirect('c_admin/baju_adat','refresh');

		}else {
			$data = array('error' => '<p style="color:red;">FORMAT FOTO TIDAK SESUAI !! <br> Silahkan Uploud Kembali</p>');
			$data['baju_adat']= $this->bajuadat_model->get_bajuadat();
			$data['provinsi']= $this->bajuadat_model->get_provinsi();
			$data['content']='admin/baju_adat';
			$this->load->view('admin/template', $data);
		}
	}

	public function delete_bajuadat($id) {
		if ($this->bajuadat_model->delete_bajuadat($id)) {
			$this->session->set_flashdata('info','<div class="alert alert-success alert-dismissible" role="alert"> Data Berhasil di Hapus !</div>');
			redirect('c_admin/baju_adat','refresh');
		}else{
			$this->session->set_flashdata('info','<div class="alert alert-danger alert-dismissible" role="alert"> Data Gagal di Hapus !</div>');
			redirect('c_admin/baju_adat','refresh');
		}
	}

	public function edit_bajuadat($id)
	{
		$data['baju_adat']= $this->bajuadat_model->get_bajuadat_id($id);
		$data['content']='admin/editbaju_adat';
		$this->load->view('admin/template', $data);
	}

	public function updatebaju_adat($id){
		$config['upload_path'] = './images/';
		$config['file_name'] = md5(date('Y-m-d H:i:s'));
		$config['allowed_types'] = 'jpg|png|jpeg';
		$config['max_size'] = '5000';
		$this->upload->initialize($config);
		$this->load->library('upload', $config);

		if ($this->upload->do_upload('gambar')){
			$gambar = $this->upload->data('file_name');

			$data = array(
				'provinsi_id' => $this->input->post('id_provinsi'),
				'nama_bajuadat' => $this->input->post('nama_bajuadat'),
				'foto' => $gambar,
				'desc_bajuadat' => $this->input->post('desc')
			);
			$this->bajuadat_model->updatebaju_adat($id,$data);
			$this->session->set_flashdata('info','<div class="alert alert-success alert-dismissible" role="alert"> Data Berhasil di Update !</div>');
			redirect('c_admin/baju_adat','refresh');

		}else {
			$data = array('error' => '<p style="color:red;">FORMAT FOTO TIDAK SESUAI !! <br> Silahkan Uploud Kembali</p>');
			$data['baju_adat']= $this->bajuadat_model->get_bajuadat();
			$data['provinsi']= $this->bajuadat_model->get_provinsi();
			$data['content']='admin/baju_adat';
			$this->load->view('admin/template', $data);
		}
	}

	// makanan daerah

	public function makanan_daerah()
	{
		$data['makanan']= $this->makanan_model->get_makanan();
		$data['provinsi']= $this->makanan_model->get_provinsi();
		$data['content']='admin/makanan_daerah';
		$this->load->view('admin/template', $data);
	}

	public function input_makanan_daerah(){
		$config['upload_path'] = './images/';
		$config['file_name'] = md5(date('Y-m-d H:i:s'));
		$config['allowed_types'] = 'jpg|png|jpeg';
		$config['max_size'] = '5000';
		$this->upload->initialize($config);
		$this->load->library('upload', $config);

		if ($this->upload->do_upload('gambar')){
			$gambar = $this->upload->data('file_name');

			$data = array(
				'provinsi_id' => $this->input->post('id_provinsi'),
				'nama_makanan' => $this->input->post('nama_makanan'),
				'foto_makanan' => $gambar,
				'desc_makanan' => $this->input->post('desc_makanan')
			);
			$this->makanan_model->input_makanan_daerah($data);
			$this->session->set_flashdata('info','<div class="alert alert-success alert-dismissible" role="alert"> Data Berhasil di Tambahkan !</div>');
			redirect('c_admin/makanan_daerah','refresh');

		}else {
			$data = array('error' => '<p style="color:red;">FORMAT FOTO TIDAK SESUAI !! <br> Silahkan Uploud Kembali</p>');
			$data['makanan']= $this->makanan_model->get_makanan();
			$data['provinsi']= $this->makanan_model->get_provinsi();
			$data['content']='admin/makanan_daerah';
			$this->load->view('admin/template', $data);
		}
	}

	public function delete_makanan_daerah($id) {
		if ($this->makanan_model->delete_makanan_daerah($id)) {
			$this->session->set_flashdata('info','<div class="alert alert-success alert-dismissible" role="alert"> Data Berhasil di Hapus !</div>');
			redirect('c_admin/makanan_daerah','refresh');
		}else{
			$this->session->set_flashdata('info','<div class="alert alert-danger alert-dismissible" role="alert"> Data Gagal di Hapus !</div>');
			redirect('c_admin/makanan_daerah','refresh');
		}
	}

	public function edit_makanan_daerah($id)
	{
		$data['makanan']= $this->makanan_model->get_makanan_id($id);
		$data['content']='admin/edit_makanan_daerah';
		$this->load->view('admin/template', $data);
	}

	public function update_makanan_daerah($id){
		$config['upload_path'] = './images/';
		$config['file_name'] = md5(date('Y-m-d H:i:s'));
		$config['allowed_types'] = 'jpg|png|jpeg';
		$config['max_size'] = '5000';
		$this->upload->initialize($config);
		$this->load->library('upload', $config);

		if ($this->upload->do_upload('gambar')){
			$gambar = $this->upload->data('file_name');

			$data = array(
				'provinsi_id' => $this->input->post('id_provinsi'),
				'nama_makanan' => $this->input->post('nama_makanan'),
				'foto_makanan' => $gambar,
				'desc_makanan' => $this->input->post('desc_makanan')
			);
			$this->makanan_model->update_makanan_daerah($id,$data);
			$this->session->set_flashdata('info','<div class="alert alert-success alert-dismissible" role="alert"> Data Berhasil di Update !</div>');
			redirect('c_admin/makanan_daerah','refresh');

		}else {
			$data = array('error' => '<p style="color:red;">FORMAT FOTO TIDAK SESUAI !! <br> Silahkan Uploud Kembali</p>');
			$data['makanan']= $this->makanan_model->get_makanan();
			$data['provinsi']= $this->makanan_model->get_provinsi();
			$data['content']='admin/makanan_daerah';
			$this->load->view('admin/template', $data);
		}
	}

	//tarian daerah

	public function tarian_daerah()
	{
		$data['tarian']= $this->tarian_model->get_tarian();
		$data['provinsi']= $this->tarian_model->get_provinsi();
		$data['content']='admin/tarian_daerah';
		$this->load->view('admin/template', $data);
	}

	public function input_tarian_daerah(){
		$config['upload_path'] = './images/';
		$config['file_name'] = md5(date('Y-m-d H:i:s'));
		$config['allowed_types'] = 'jpg|png|jpeg';
		$config['max_size'] = '5000';
		$this->upload->initialize($config);
		$this->load->library('upload', $config);

		if ($this->upload->do_upload('gambar')){
			$gambar = $this->upload->data('file_name');

			$config['upload_path'] = './images/';
			$config['max_size'] = '50000';
			$config['file_name'] = md5(date('Y-m-d H:i:s'));
			$config['allowed_types'] = 'mp4|mkv|avi|3gp';
			$config['overwrite'] = FALSE;
			$config['remove_spaces'] = TRUE;
			$this->upload->initialize($config);
			$this->load->library('upload', $config);

			$this->upload->do_upload('video');
			$video = $this->upload->data('file_name');
			$data = array(
				'provinsi_id' => $this->input->post('id_provinsi'),
				'nama_tarian' => $this->input->post('nama_tarian'),
				'foto_tarian' => $gambar,
				'video_tarian' => $video,
				'desk_tarian' => $this->input->post('desc_tarian')
			);
			$this->tarian_model->input_tarian_daerah($data);
			$this->session->set_flashdata('info','<div class="alert alert-success alert-dismissible" role="alert"> Data Berhasil di Tambahkan !</div>');
			redirect('c_admin/tarian_daerah','refresh');

		}else {
			// $data = array('error' => '<p style="color:red;">FORMAT FOTO TIDAK SESUAI !! <br> Silahkan Uploud Kembali</p>');
			$data = array('error' => $this->upload->display_errors());
			$data['tarian']= $this->tarian_model->get_tarian();
			$data['provinsi']= $this->tarian_model->get_provinsi();
			$data['content']='admin/tarian_daerah';
			$this->load->view('admin/template', $data);
		}
	}

	public function delete_tarian_daerah($id) {
		if ($this->tarian_model->delete_tarian_daerah($id)) {
			$this->session->set_flashdata('info','<div class="alert alert-success alert-dismissible" role="alert"> Data Berhasil di Hapus !</div>');
			redirect('c_admin/tarian_daerah','refresh');
		}else{
			$this->session->set_flashdata('info','<div class="alert alert-danger alert-dismissible" role="alert"> Data Gagal di Hapus !</div>');
			redirect('c_admin/tarian_daerah','refresh');
		}
	}

	public function edit_tarian_daerah($id)
	{
		$data['tarian']= $this->tarian_model->get_tarian_id($id);
		$data['content']='admin/edit_tarian_daerah';
		$this->load->view('admin/template', $data);
	}

	public function update_tarian_daerah($id){
		$config['upload_path'] = './images/';
		$config['file_name'] = md5(date('Y-m-d H:i:s'));
		$config['allowed_types'] = 'jpg|png|jpeg';
		$config['max_size'] = '5000';
		$this->upload->initialize($config);
		$this->load->library('upload', $config);

		if ($this->upload->do_upload('gambar')){
			$gambar = $this->upload->data('file_name');

			$config['upload_path'] = './images/';
			$config['file_name'] = md5(date('Y-m-d H:i:s'));
			$config['allowed_types'] = 'mp4|mkv|avi|3gp';
			$config['max_size'] = '20000';
			$this->upload->initialize($config);
			$this->load->library('upload', $config);

			if ($this->upload->do_upload('video')){
				$video = $this->upload->data('file_name');
				$data = array(
					'provinsi_id' => $this->input->post('id_provinsi'),
					'nama_tarian' => $this->input->post('nama_tarian'),
					'foto_tarian' => $gambar,
					'video_tarian' => $video,
					'desk_tarian' => $this->input->post('desc_tarian')
				);
				$this->tarian_model->update_tarian_daerah($id,$data);
				$this->session->set_flashdata('info','<div class="alert alert-success alert-dismissible" role="alert"> Data Berhasil di Tambahkan !</div>');
				redirect('c_admin/tarian_daerah','refresh');
			}else{
				$data = array('error' => '<p style="color:red;">FORMAT Video TIDAK SESUAI !! <br> Silahkan Uploud Kembali</p>');
				// $data = array('error' => $this->upload->display_errors());
				$data['tarian']= $this->tarian_model->get_tarian();
				$data['provinsi']= $this->tarian_model->get_provinsi();
				$data['content']='admin/tarian_daerah';
				$this->load->view('admin/template', $data);
			}

		}else {
			$data = array('error' => '<p style="color:red;">FORMAT FOTO TIDAK SESUAI !! <br> Silahkan Uploud Kembali</p>');
			$data['tarian']= $this->tarian_model->get_tarian();
			$data['provinsi']= $this->tarian_model->get_provinsi();
			$data['content']='admin/tarian_daerah';
			$this->load->view('admin/template', $data);
		}
	}

	var $a;

	public function print(){
		$a = $this->bajuadat_model->get_bajuadat_id(8);
		print_r($a);
	}
}
?>