<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in('login');
        if($this->session->userdata('level') != 'admin'){
            $this->session->set_flashdata('error', 'Hayooo mau ngapain ?!');
            redirect('transaksi');
        }
        $this->load->model('my_model','logic');
    }

    public function index()
    {
        $date = date('Y-m-d');
        $total_transaksi = $this->logic->count_transaction('pesanan','total_belanja', $date)->row()->total_belanja;
        $pengeluaran = $this->logic->count_transaction('stok_in','harga', $date)->row()->harga;
        
        $data['pendapatan'] = $total_transaksi - $pengeluaran;
        // var_dump($total_transaksi);die;
        $data['total_penjualan'] = $this->logic->total_penjualan('pesanan', $date);
        if ( $this->logic->produk_terlaris()->row()  ) {
            $data['terlaris'] = $this->logic->produk_terlaris()->row()->nama_produk;
        }else{
            $data['terlaris'] = "Tidak ada data
            ";
        }
        $data['konten'] = 'pages/dashboard/view';
        $data['title'] = 'Hareudang-POS';
        $this->load->view('layouts/template', $data);
    }
}
