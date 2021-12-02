<?php
defined('BASEPATH') or exit('No direct script access allowed');

class My_model extends CI_Model
{

    public function get_all($table)
    {
        return $this->db->get($table);
    }

    public function get_stok($table, $tanggal_awal, $tanggal_akhir)
    {   
        $this->db->where('tanggal >=', $tanggal_awal);
        $this->db->where('tanggal <=', $tanggal_akhir);
        return $this->db->get($table);
    }

    public function countAll($table)
    {
        return $this->db->get($table)->num_rows();
    }

    public function get_where($table, $where, $order = null)
    {
        $this->db->order_by($order);
        return $this->db->get_where($table, $where);
    }

    public function store($table, $data)
    {
        $this->db->insert($table, $data);
        return $this->db->affected_rows();
    }

    public function update($table, $data, $where)
    {
        $this->db->update($table, $data, $where);
        return $this->db->affected_rows();
    }

    public function delete($table, $where)
    {
        $this->db->delete($table, $where);
        return $this->db->affected_rows();
    }

    public function count_transaction($table, $sum, $tanggal_awal = null, $tanggal_akhir = null)
    {
        if($tanggal_awal){
            $this->db->where(['tanggal' => $tanggal_awal]);
        }else if($tanggal_akhir){
            $this->db->where('tanggal >=', $tanggal_awal);
            $this->db->where('tanggal <=', $tanggal_akhir);
        }
        $this->db->select_sum($sum);
        return $this->db->get($table);
    }

    public function produk_terlaris()
    {
        return $this->db->query("SELECT nama_produk FROM detail_pesanan JOIN produk on detail_pesanan.id_produk = produk.id_produk GROUP BY produk.id_produk ORDER BY SUM(detail_pesanan.qty) desc");
    }

    public function total_penjualan($table, $tanggal_awal = null, $tanggal_akhir = null)
    {
        if ($tanggal_awal) {
            $this->db->where(['tanggal' => $tanggal_awal]);
        } else if ($tanggal_akhir) {
            $this->db->where('tanggal >=', $tanggal_awal);
            $this->db->where('tanggal <=', $tanggal_akhir);
        }
        return $this->db->count_all_results($table);
    }

    public function query($query)
    {
        return $this->db->query($query);
    }

    public function get_all_join($table, $select, $join)
    {
        $this->db->select($select);
        $this->db->from($table);
        $this->db->join($join[0], $join[1]);
        return $this->db->get();
    }

    public function simpan_transaksi($id_pesanan,$nama_pelanggan,$total,$cash,$kembalian,$kasir)
    {
        $dataPesanan = [
            'id_pesanan' => $id_pesanan,
            'nama_pelanggan' => $nama_pelanggan,
            'tanggal' => date('Y-m-d'),
            'total_belanja' => $total,
            'cash'  => $cash,
            'kembalian' => $kembalian,
            'nama_kasir' => $kasir
        ];
        $this->db->insert('pesanan',$dataPesanan);

        foreach ($this->cart->contents() as $item) {
            $dataDetail = [
                'id_pesanan' => $id_pesanan,
                'id_produk' => $item['id'],
                'qty'   => $item['qty']
            ];
            $this->db->insert('detail_pesanan',$dataDetail);
        }
        return true;
    }
}
