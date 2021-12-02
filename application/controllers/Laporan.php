<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan extends CI_controller
{
    private $table = 'produk';

    public function __construct()
    {
        parent::__construct();
        is_logged_in('login');
        $this->load->model('my_model', 'logic');
    }

    public function index()
    {
        $data['konten'] = 'pages/produk/view';
        $join = ['kategori','kategori.id_kategori = produk.id_kategori'];
        $data['produk'] = $this->logic->get_all_join($this->table,'*',$join)->result();
        $data['kategori'] = $this->logic->get_all('kategori')->result();
        $data['title'] = 'list menu';
        $this->load->view('layouts/template', $data);
    }

    private function _rules()
    {
        $this->form_validation->set_rules('nama_menu', 'Nama Menu', 'required|trim', [
            'required' => 'wajib di isi !',
        ]);

        $this->form_validation->set_rules('kategori', 'Kategori', 'required|trim|numeric', [
            'required' => 'wajib di isi !',
            'numeric' => 'Pilih dahulu'
        ]);

        $this->form_validation->set_rules('status', 'Tersedia', 'required|trim|numeric', [
            'required' => 'wajib di isi !',
            'numeric' => 'Pilih dahulu !'
        ]);

        $this->form_validation->set_rules('harga', 'Harga', 'required|trim|numeric', [
            'required' => 'wajib di isi !',
            'numeric' => 'Masukkan angka !'
        ]);
    }

    public function add()
    {
        $this->_rules();
        if ($this->form_validation->run() === false ) {
            $this->session->set_flashdata('error', 'Cek inputan !');
            $this->index();
        }else{
            $nama_menu = htmlspecialchars(htmlentities(strtolower($this->input->post('nama_menu', true))));
            $kategori = htmlspecialchars(htmlentities(strtolower($this->input->post('kategori', true))));
            $harga = htmlspecialchars(htmlentities(strtolower($this->input->post('harga', true))));
            $status = htmlspecialchars(htmlentities(strtolower($this->input->post('status', true))));

            $data = [
                'id_produk'   => getAutoNumber($this->table,'id_produk','PROD',7), 
                'id_kategori' => $kategori,
                'nama_produk' => $nama_menu,
                'harga'       => $harga,
                'status'      => $status
            ];

            $where = ['nama_produk'=>$nama_menu];

            $cekmenu = $this->logic->get_where($this->table,$where);
            if ($cekmenu->num_rows()>0) {
                $this->session->set_flashdata('error', 'Menu sudah ada !');
                redirect('list-produk');
            } else {
                $cek = $this->logic->store($this->table, $data);
                if ($cek > 0) {
                    $this->session->set_flashdata('success', 'data berhasil di tambahkan');
                    redirect('list-produk');
                } else {
                    $this->session->set_flashdata('error', 'data gagal di tambahkan');
                    redirect('list-produk');
                }
            }
            
        }
        
    }

    public function update()
    {
        if ($this->session->userdata('level') != 'admin') {
            $this->session->set_flashdata('error', 'Hayooo mau ngapain ?!');
            redirect('transaksi');
        }
        $this->_rules();
        if ($this->form_validation->run() === false) {
            $this->session->set_flashdata('error', 'Cek inputan !');
            $this->index();
        } else{
            $id = htmlspecialchars(htmlentities($this->input->post('id')));
            $nama_menu = htmlspecialchars(htmlentities(strtolower($this->input->post('nama_menu', true))));
            $kategori = htmlspecialchars(htmlentities(strtolower($this->input->post('kategori', true))));
            $harga = htmlspecialchars(htmlentities(strtolower($this->input->post('harga', true))));
            $status = htmlspecialchars(htmlentities(strtolower($this->input->post('status', true))));

            $data = [
                'id_kategori' => $kategori,
                'nama_produk' => $nama_menu,
                'harga'       => $harga,
                'status'      => $status
            ];
            // var_dump($data);die;

            $cek = $this->logic->update($this->table,$data, ['id_produk' => $id]);

            if ($cek > 0) {
                $this->session->set_flashdata('success', 'berhasil di update');
                redirect('list-produk');
            } else {
                $this->session->set_flashdata('error', 'gagal di update');
                redirect('list-produk');
            }
        }
        
    }

    public function delete()
    {
        if ($this->session->userdata('level') != 'admin') {
            $this->session->set_flashdata('error', 'Hayooo mau ngapain ?!');
            redirect('transaksi');
        }
        $id = htmlspecialchars(htmlentities($this->input->post('id')));
        $cek = $this->logic->delete($this->table, ['id_produk'=>$id]);
        if ($cek > 0) {
            $this->session->set_flashdata('success','berhasil di hapus');
            redirect('list-produk');
        } else {
            $this->session->set_flashdata('error','gagal di hapus');
            redirect('list-produk');
        }
    }
}
