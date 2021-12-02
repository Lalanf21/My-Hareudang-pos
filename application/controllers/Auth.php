<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Auth extends CI_controller{
		public function __construct(){
			parent::__construct();
			$this->load->model('login_model');
		}

	public function index()
	{
		$this->session->sess_destroy();
		$data['title'] = 'Hareudang POS || Login Panel';
		$this->load->view('pages/login/v_login', $data);
	}

	public function proses_login()
	{
		$this->form_validation->set_rules('username', 'Username', 'required', [
			'required' => "wajib di isi !"
		]);
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[2]', [
			'required' => 'wajib di isi !',
			'min_length' => 'Password minimal 2 karakter'
		]);


		if ($this->form_validation->run() == FALSE) {
			$data['title'] = 'Hareudang POS || Login Panel';
			$this->load->view('pages/login/v_login', $data);
		} else {
			$username = htmlspecialchars(htmlentities($this->input->post('username', true)));
			$pass = htmlspecialchars(htmlentities($this->input->post('password',true)));

			$cek_user = $this->login_model->cek_user($username)->row_array();

			if ($cek_user) {
				$cek_pass = $this->login_model->cek_pass($pass, $cek_user['password']);
				if ($cek_pass == true) {
					$sess_data = [
						'nama' => $cek_user['nama_user'],
						'level' => $cek_user['level'],
						'logged_in' => true,
					];
					$this->session->set_flashdata('success', 'Anda telah berhasil login !');

					$this->session->set_userdata($sess_data);
					if ($this->session->userdata('level') == 'kasir') {
						redirect('transaksi');
					} else {
						redirect('dashboard');
					}
				} else {
					$this->session->set_flashdata('error', 'Password salah!');
					redirect('login');
				}
			} else {
				$this->session->set_flashdata('error', ' Username tidak terdaftar !');
				redirect('login');
			}
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('login');
	}
}
	
 ?>