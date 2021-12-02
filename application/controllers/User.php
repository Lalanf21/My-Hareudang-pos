<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_controller
{
    private $table = 'user';

    public function __construct()
    {
        parent::__construct();
        is_logged_in('login');
        if ($this->session->userdata('level') != 'admin') {
            $this->session->set_flashdata('error', 'Hayooo mau ngapain ?!');
            redirect('transaksi');
        }
        $this->load->model('my_model', 'logic');
    }

    public function index()
    {
        $data['konten'] = 'pages/user/view';
        $data['user'] = $this->logic->get_all($this->table)->result();
        $data['title'] = 'Daftar user';
        $this->load->view('layouts/template', $data);
    }

    private function _rules()
    {
        $this->form_validation->set_rules('nama_user', 'Nama user', 'required|trim', [
            'required' => 'wajib di isi !',
        ]);

        $this->form_validation->set_rules('level', 'Level', 'required|trim|alpha', [
            'required' => 'wajib di isi !',
            'alpha' => 'Pilih Option dahulu !',
        ]);

        $this->form_validation->set_rules('status', 'status', 'required|trim|numeric', [
            'required' => 'wajib di isi !',
            'numeric' => 'Pilih Option dahulu !',
        ]);

        $this->form_validation->set_rules('password1', 'Password', 'required|trim|matches[password2]', [
            'required' => 'wajib di isi !',
            'matches' => 'Password tidak sama !',
        ]);

        $this->form_validation->set_rules('password2', 'Konfirmasi Password', 'required|trim|matches[password1]', [
            'required' => 'wajib di isi !',
            'matches' => 'Password tidak sama !',
        ]);
    }

    public function save()
    {
        $this->_rules();
        if ($this->form_validation->run()=== false) {
            $this->session->set_flashdata('error', 'Periksa Inputan !');
            redirect('list-user');
        }else{

            $nama_user = htmlspecialchars(htmlentities($this->input->post('nama_user', true)));
            $password = password_hash($this->input->post('password1'), PASSWORD_DEFAULT);
            $level = htmlspecialchars(htmlentities($this->input->post('level', true)));
            $status = htmlspecialchars(htmlentities($this->input->post('status', true)));

            $data = [
                'nama_user' => $nama_user,
                'password' => $password,
                'level' => $level,
                'status' => $status,
            ];

            $cek = $this->logic->store($this->table,$data);
            if ($cek > 0) {
                $this->session->set_flashdata('success','data user berhasil di tambahkan');
                redirect('list-user');
            }else{
                $this->session->set_flashdata('error','data user gagal di tambahkan');
                redirect('list-user');
            }

        }
    }

    public function update()
    {
        $id = htmlspecialchars(htmlentities($this->input->post('id')));
        $nama_user = htmlspecialchars(htmlentities($this->input->post('nama_user', true)));
        $level = htmlspecialchars(htmlentities($this->input->post('level', true)));
        $status = htmlspecialchars(htmlentities($this->input->post('status', true)));

        $data = [
                'nama_user' => $nama_user,
                'level' => $level,
                'status' => $status,
            ];
        $cek = $this->logic->update($this->table, $data, ['id_user'=>$id]);

        if ($cek > 0) {
            $this->session->set_flashdata('success', 'berhasil di update');
            redirect('list-user');
        } else {
            $this->session->set_flashdata('error', 'gagal di update');
            redirect('list-user');
        }
    }

    public function delete()
    {
        $id = htmlspecialchars(htmlentities($this->input->post('id')));
        $cek = $this->logic->delete($this->table, ['id_user'=>$id]);
        if ($cek > 0) {
            $this->session->set_flashdata('success','berhasil di hapus');
            redirect('list-user');
        } else {
            $this->session->set_flashdata('error','gagal di hapus');
            redirect('list-user');
        }
    }
}
