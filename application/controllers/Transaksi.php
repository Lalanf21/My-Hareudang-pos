<?php
defined('BASEPATH') or exit('No direct script access allowed');

require FCPATH . '/vendor/autoload.php';

use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;
use Mike42\Escpos\Printer;
use Mike42\Escpos\EscposImage;

class Transaksi extends CI_controller
{
    private $table = 'pesanan';

    public function __construct()
    {
        parent::__construct();
        is_logged_in('login');
        $this->load->model('my_model', 'logic');
        $this->load->library('cart');
    }

    public function index()
    {
        $data['konten'] = 'pages/transaksi/form_add';
        $data['title'] = 'Transaksi penjualan';

        $data['makanan'] = $this->logic->query("SELECT nama_produk,harga,id_produk FROM produk JOIN kategori ON kategori.id_kategori = produk.id_kategori WHERE nama_kategori = 'makanan' AND status = '1'")->result();

        $data['minuman'] = $this->logic->query("SELECT nama_produk,harga,id_produk FROM produk JOIN kategori ON kategori.id_kategori = produk.id_kategori WHERE nama_kategori = 'minuman' AND status = '1'")->result();
        
        $data['topping'] = $this->logic->query("SELECT nama_produk,harga,id_produk FROM produk JOIN kategori ON kategori.id_kategori = produk.id_kategori WHERE nama_kategori = 'topping' AND status = '1'")->result();

        // var_dump($data['makanan']);die;
        $this->load->view('layouts/template', $data);
    }

    public function save()
    {
        $tanggal = date('Y-m-d');
        $nama_kasir = $this->session->userdata('nama');
        $nama = htmlspecialchars(htmlentities(strtolower($this->input->post('nama_pelanggan', true))));
        $total_belanja = htmlspecialchars(htmlentities(strtolower($this->input->post('total', true))));
        $cash = htmlspecialchars(htmlentities(strtolower($this->input->post('cash', true))));
        $kembalian = htmlspecialchars(htmlentities(strtolower($this->input->post('kembalian', true))));
        $print = htmlspecialchars(htmlentities(strtolower($this->input->post('print', true))));
        $id_pesanan = noRegistrasiotomatis('id_pesanan','pesanan','tanggal') ;
        if($total_belanja && $cash){
            if ($cash < $total_belanja) {
                $this->session->set_flashdata('error', 'Jumlah uang kurang !');
                redirect('show-cart');
            }else{
                $order = $this->logic->simpan_transaksi($id_pesanan,$nama,$total_belanja,$cash,$kembalian,$nama_kasir);

                if ($order) 
                {
                    if($print === 'ya')
                    {
                        $this->cetak_struk($id_pesanan,$nama, $cash, $kembalian);
                    }
                    
                    $this->session->set_flashdata('success', 'Transaksi berhasil !');
                    $this->cart->destroy();
                    redirect('transaksi');
                }else{
                    $this->session->set_flashdata('error', 'Transaksi gagal !');
                    redirect('transaksi');
                }
            }
        }else{
            $this->session->set_flashdata('error', 'Transaksi gagal !');
            redirect('transaksi');
        }
    }

    public function show_cart()
    {
        $data['konten'] = 'pages/transaksi/view';
        $data['title'] = 'Invoice';
        $this->load->view('layouts/template', $data);
    }

    function add_to_cart()
    { 
        $data = array(
            'id' => $this->input->post('produk_id'),
            'name' => $this->input->post('produk_nama'),
            'price' => $this->input->post('produk_harga'),
            'qty' => $this->input->post('quantity'),
        );
        $this->cart->insert($data);
    }

    function hapus_cart()
    { 
        $data = array(
            'rowid' => $this->input->post('row_id'),
            'qty' => 0,
        );
        $this->cart->update($data);
    }

    // public function cetak_antrian($id, $nama,$cash, $kembalian)
    // {
    //     $connector = new WindowsPrintConnector("ZJ-58");

    //     $printer = new Printer($connector);

    //     $printer->initialize();
    //     $printer->text("No Antrian :".$id."\n");
    //     foreach ($this->cart->contents() as $item){
    //         $printer->text($item['name']."  ".$item['qty']."x"."\n");
    //     }
    //     $printer->text("==============================");
    //     $printer->feed(3);
    //     $printer->close();

    //     sleep(5);
    //     $this->cetak_struk($id, $nama, $cash, $kembalian);
    // }

    public function cetak_struk($antrian, $nama, $cash,$kembalian)
    {
        $kasir = $this->session->userdata('nama');
        $connector = new WindowsPrintConnector("ZJ-58");

        $printer = new Printer($connector);
        

        $printer->initialize();
        $img = EscposImage::load(FCPATH.'assets/img/Hareudang.png', false);
        $printer->setJustification(Printer::JUSTIFY_CENTER);
        $printer->bitImageColumnFormat($img);
        $printer->text("\n");

        $printer->initialize();
        $printer->setJustification(Printer::JUSTIFY_CENTER);
        $printer->text("Hareudang Drink\n");
        $printer->text("Jalan Raya Sepatan,Kayu agung \n");
        $printer->text("Kabupaten tangerang, 15520 \n");
        $printer->text("Instagram : @Hareudang_drink \n");
        $printer->text("================================\n");

        $printer->initialize();
        $date = date('d-m-Y');
        $printer->text("Invoice No      :".$antrian."\n");
        $printer->text("Tanggal         :".$date."\n");
        $printer->text("Nama Konsumen   :".$nama."\n");
        $printer->text("Kasir           :". $kasir."\n");

        // Data transaksi     
        $printer->initialize(); 
        $printer->text("================================\n");
        foreach ($this->cart->contents() as $item) {
            $printer->text($item['name']."\n");
            $printer->text(buatBaris3Kolom($item['qty']."x", $item['price'], $item['subtotal']));
        }

        // Total berbelanja
        $printer->text("\n");
        $printer->initialize();
        $printer->selectPrintMode(Printer::MODE_EMPHASIZED);
        $printer->setJustification(Printer::JUSTIFY_RIGHT);
        $printer->text("Total   :" . $this->cart->total() . "\n");
        $printer->text("Cash    : Rp " . $cash . "\n");
        $printer->text("Kembali : Rp " . $kembalian . "\n");
        $printer->text("\n");

        // Pesan penutup
        $printer->initialize();
        $printer->setJustification(Printer::JUSTIFY_CENTER);
        $printer->text(" *** \n");
        $printer->text("Terima kasih telah Mampir \n");

        $printer->feed(3); 

        $printer->close();
        
        $this->cart->destroy();
    }
    
}
