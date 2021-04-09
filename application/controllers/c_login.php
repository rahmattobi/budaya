<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_login extends CI_Controller {

	public function index()
	{
		$this->load->view('login/login');
	}

	public function login(){
		$post = $this->input->post(null, TRUE);
		if(isset($post['login'])){
			$this->load->model('m_login');
			$query = $this->m_login->login($post);
			if($query->num_rows()>0){
				$row = $query->row();
				$params = array(
					'id_user' => $row->id_user,
					'nama' => $row->nama,
					// 'foto' => $row->foto,
					'level' => $row->level,
					'logged_in' => TRUE
					);
				$this -> session-> set_userdata($params);
				//Role ketika login
				$user = $this ->db->get_where('user',['id_user' => $this->session->userdata('id_user')])->row_array();
				$user = $this ->db->get_where('user',['nama' => $this->session->userdata('nama')])->row_array();
				if ($user['level'] == 1) {
					redirect ('c_admin');
				}
			}else{
				echo "<script>
					alert('Login Gagal');
					window.location='".site_url('c_login')."';
					</script>";
			}
		}
	}

	public function logout(){
		$this-> session-> unset_userdata('username');
		$this-> session-> unset_userdata('level');
		$this-> session-> sess_destroy();
	
		echo "<script>
		alert('Logout Berhasil');
		window.location='".site_url('c_login')."';
		</script>";
	}
	
}
