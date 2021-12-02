<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kategori extends CI_controller
{
    private $table = 'kategori';

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
        $data['konten'] = 'pages/kategori/view';
        $data['kategori'] = $this->logic->get_all($this->table)->result();
        $data['title'] = 'Kategori Produk';
        // var_dump($data['kategori']);die;
        $this->load->view('layouts/template', $data);
    }

    public function add()
    {
        $nama_kategori = htmlspecialchars(htmlentities($this->input->post('nama_kategori', true)));

        $cek = $this->logic->store($this->table,['nama_kategori'=>$nama_kategori]);
        if ($cek > 0) {
            $this->session->set_flashdata('success','data berhasil di tambahkan');
            redirect('list-kategori');
        }else{
            $this->session->set_flashdata('error','data gagal di tambahkan');
            redirect('list-kategori');
        }
    }

    public function update()
    {
        $id = htmlspecialchars(htmlentities($this->input->post('id')));
        $nama = htmlspecialchars(htmlentities($this->input->post('nama_kategori')));

        $cek = $this->logic->update($this->table,['nama_kategori'=>$nama],['id_kategori'=>$id]);

        if ($cek > 0) {
            $this->session->set_flashdata('success', 'berhasil di update');
            redirect('list-kategori');
        } else {
            $this->session->set_flashdata('error', 'gagal di update');
            redirect('list-kategori');
        }
    }

    public function delete()
    {
        $id = htmlspecialchars(htmlentities($this->input->post('id')));
        $cek = $this->logic->delete($this->table, ['id_kategori'=>$id]);
        if ($cek > 0) {
            $this->session->set_flashdata('success','berhasil di hapus');
            redirect('list-kategori');
        } else {
            $this->session->set_flashdata('error','gagal di hapus');
            redirect('list-kategori');
        }
    }
}
