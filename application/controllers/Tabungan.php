<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tabungan extends CI_controller
{
    private $table = 'tabungan';

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
        $data['konten'] = 'pages/tabungan/view';
        $data['title'] = 'Tabungan';
        $data['tabungan'] = $this->logic->get_all($this->table)->result();
        // var_dump($data['tabungan']);die;
        $this->load->view('layouts/template', $data);
    }

    public function add()
    {
        $tanggal = htmlspecialchars(htmlentities($this->input->post('tanggal', true)));
        $jumlah = htmlspecialchars(htmlentities($this->input->post('jumlah', true)));

        $cek = $this->logic->store($this->table,
            [
                'tanggal'=>$tanggal,
                'jumlah'=>$jumlah
            ]
        );
        if ($cek > 0) {
            $this->session->set_flashdata('success','data berhasil di tambahkan');
            redirect('list-tabungan');
        }else{
            $this->session->set_flashdata('error','data gagal di tambahkan');
            redirect('list-tabungan');
        }
    }

    public function update()
    {
        $id = htmlspecialchars(htmlentities($this->input->post('id')));
        $jumlah = htmlspecialchars(htmlentities($this->input->post('jumlah', true)));

        $cek = $this->logic->update($this->table,['jumlah'=>$jumlah],['id_tabungan'=>$id]);

        if ($cek > 0) {
            $this->session->set_flashdata('success', 'berhasil di update');
            redirect('list-tabungan');
        } else {
            $this->session->set_flashdata('error', 'gagal di update');
            redirect('list-tabungan');
        }
    }

    public function delete()
    {
        $id = htmlspecialchars(htmlentities($this->input->post('id')));
        $cek = $this->logic->delete($this->table, ['id_tabungan'=>$id]);
        if ($cek > 0) {
            $this->session->set_flashdata('success','berhasil di hapus');
            redirect('list-tabungan');
        } else {
            $this->session->set_flashdata('error','gagal di hapus');
            redirect('list-tabungan');
        }
    }
}
