<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Stok_in extends CI_controller
{
    private $table = 'stok_in';

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
        $data['konten'] = 'pages/stok_in/form_add';
        $data['title'] = 'Tambah Stok';
        $this->load->view('layouts/template', $data);
    }

    public function form_list()
    {
        $sess = ['tanggal_awal', 'tanggal_akhir'];
        $this->session->unset_userdata($sess);

        $data['title'] = 'stok';
        $data['konten'] = 'pages/stok_in/form_list';
        $this->load->view('layouts/template', $data);
    }

    public function list_stok()
    {
        $tanggal_awal = htmlspecialchars(htmlentities(strtolower($this->input->post('tanggal_awal', true))));
        $tanggal_akhir = htmlspecialchars(htmlentities(strtolower($this->input->post('tanggal_akhir', true))));

        $sess = [
            'tanggal_awal'=> $tanggal_awal,
            'tanggal_akhir'=> $tanggal_akhir
        ];
        $this->session->set_userdata($sess);
        redirect('tampil');
    }

    public function tampil()
    {
        $tanggal_awal = $this->session->userdata('tanggal_awal');
        $tanggal_akhir = $this->session->userdata('tanggal_akhir');
        $data['konten'] = 'pages/stok_in/view';
        $data['stok'] = $this->logic->get_stok($this->table, $tanggal_awal, $tanggal_akhir)->result();

        $data['title'] = 'stok';
        // var_dump($data['stok']);die;
        $this->load->view('layouts/template', $data);
    }

    private function _rules()
    {
        $this->form_validation->set_rules('tanggal', 'Tanggal', 'required|trim', [
            'required' => 'wajib di isi !',
        ]);

        $this->form_validation->set_rules('nama_barang', 'Nama barang', 'required|trim', [
            'required' => 'wajib di isi !',
        ]);

        $this->form_validation->set_rules('qty', 'Quantity', 'required|trim|numeric', [
            'required' => 'wajib di isi !',
            'numeric' => 'Masukkan angka !'
        ]);

        $this->form_validation->set_rules('harga', 'Harga', 'required|trim|numeric', [
            'required' => 'wajib di isi !',
            'numeric' => 'Masukkan angka !'
        ]);
        $this->form_validation->set_rules('unit', 'Unit', 'required|trim', [
            'required' => 'wajib di isi !',
        ]);
    }

    public function add()
    {
        $this->_rules();
        if ($this->form_validation->run() === false ) {
            $this->session->set_flashdata('error', 'Cek inputan !');
            $this->form_add();
        }else{
            $tanggal = htmlspecialchars(htmlentities(strtolower($this->input->post('tanggal', true))));
            $nama_barang = htmlspecialchars(htmlentities(strtolower($this->input->post('nama_barang', true))));
            $harga = htmlspecialchars(htmlentities(strtolower($this->input->post('harga', true))));
            $qty = htmlspecialchars(htmlentities(strtolower($this->input->post('qty', true))));
            $unit = htmlspecialchars(htmlentities(strtolower($this->input->post('unit', true))));

            $data = [
                'nama_barang'   => $nama_barang, 
                'unit' => $unit,
                'qty' => $qty,
                'harga'       => $harga,
                'tanggal'      => $tanggal
            ];

            $where = [
                'nama_barang'=>$nama_barang,
                'nama_barang'   => $nama_barang,
                'unit' => $unit,
                'qty' => $qty,
                'harga'       => $harga,
                'tanggal'      => $tanggal
            ];

            $cekStok = $this->logic->get_where($this->table,$where);
            if ($cekStok->num_rows()>0) {
                $this->session->set_flashdata('error', 'Stok sudah ada !');
                redirect('add-stok');
            } else {
                $cek = $this->logic->store($this->table, $data);
                if ($cek > 0) {
                    $this->session->set_flashdata('success', 'data berhasil di tambahkan');
                    redirect('stok');
                } else {
                    $this->session->set_flashdata('error', 'data gagal di tambahkan');
                    redirect('stok');
                }
            }
            
        }
        
    }

    public function form_edit()
    {
        $id = htmlspecialchars(htmlentities($this->input->post('id')));
        $data['stok'] = $this->logic->get_where($this->table,['id_pembelian'=>$id])->row();
        $data['konten'] = 'pages/stok_in/form_edit';
        $data['title'] = 'Tambah Stok';
        $this->load->view('layouts/template', $data);
    }

    public function update()
    {
        $this->_rules();
        if ($this->form_validation->run() === false) {
            $this->session->set_flashdata('error', 'Cek inputan !');
            $this->index();
        } else{
            $id = htmlspecialchars(htmlentities($this->input->post('id')));
            $nama_barang = htmlspecialchars(htmlentities(strtolower($this->input->post('nama_barang', true))));
            $harga = htmlspecialchars(htmlentities(strtolower($this->input->post('harga', true))));
            $qty = htmlspecialchars(htmlentities(strtolower($this->input->post('qty', true))));
            $unit = htmlspecialchars(htmlentities(strtolower($this->input->post('unit', true))));

            $data = [
                'nama_barang'   => $nama_barang,
                'unit' => $unit,
                'qty' => $qty,
                'harga'       => $harga,
            ];

            $cek = $this->logic->update($this->table,$data, ['id_pembelian' => $id]);

            if ($cek > 0) {
                $this->session->set_flashdata('success', 'berhasil di update');
                redirect('tampil');
            } else {
                $this->session->set_flashdata('error', 'gagal di update');
                redirect('tampil');
            }
        }
        
    }

    public function delete()
    {
        $id = htmlspecialchars(htmlentities($this->input->post('id')));
        $cek = $this->logic->delete($this->table, ['id_pembelian'=>$id]);
        if ($cek > 0) {
            $this->session->set_flashdata('success','berhasil di hapus');
            redirect('tampil');
        } else {
            $this->session->set_flashdata('error','gagal di hapus');
            redirect('tampil');
        }
    }
}
