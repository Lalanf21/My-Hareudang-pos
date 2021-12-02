<?php

function buatBaris3Kolom($kolom1, $kolom2, $kolom3)
{
	// Mengatur lebar setiap kolom (dalam satuan karakter)
	$lebar_kolom_1 = 8;
	$lebar_kolom_2 = 10;
	$lebar_kolom_3 = 12;

	// Melakukan wordwrap(), jadi jika karakter teks melebihi lebar kolom, ditambahkan \n 
	$kolom1 = wordwrap($kolom1, $lebar_kolom_1, "\n", true);
	$kolom2 = wordwrap($kolom2, $lebar_kolom_2, "\n", true);
	$kolom3 = wordwrap($kolom3, $lebar_kolom_3, "\n", true);

	// Merubah hasil wordwrap menjadi array, kolom yang memiliki 2 index array berarti memiliki 2 baris (kena wordwrap)
	$kolom1Array = explode("\n", $kolom1);
	$kolom2Array = explode("\n", $kolom2);
	$kolom3Array = explode("\n", $kolom3);

	// Mengambil jumlah baris terbanyak dari kolom-kolom untuk dijadikan titik akhir perulangan
	$jmlBarisTerbanyak = max(count($kolom1Array), count($kolom2Array), count($kolom3Array));

	// Mendeklarasikan variabel untuk menampung kolom yang sudah di edit
	$hasilBaris = array();

	// Melakukan perulangan setiap baris (yang dibentuk wordwrap), untuk menggabungkan setiap kolom menjadi 1 baris 
	for ($i = 0; $i < $jmlBarisTerbanyak; $i++) {

		// memberikan spasi di setiap cell berdasarkan lebar kolom yang ditentukan, 
		$hasilKolom1 = str_pad((isset($kolom1Array[$i]) ? $kolom1Array[$i] : ""), $lebar_kolom_1, " ");
		$hasilKolom2 = str_pad((isset($kolom2Array[$i]) ? $kolom2Array[$i] : ""), $lebar_kolom_2, " ");

		// memberikan rata kanan pada kolom 3 dan 4 karena akan kita gunakan untuk harga dan total harga
		$hasilKolom3 = str_pad((isset($kolom3Array[$i]) ? $kolom3Array[$i] : ""), $lebar_kolom_3, " ", STR_PAD_LEFT);

		// Menggabungkan kolom tersebut menjadi 1 baris dan ditampung ke variabel hasil (ada 1 spasi disetiap kolom)
		$hasilBaris[] = $hasilKolom1 . " " . $hasilKolom2 . " " . $hasilKolom3 . " ";
	}

	// Hasil yang berupa array, disatukan kembali menjadi string dan tambahkan \n disetiap barisnya.
	return implode($hasilBaris, "\n") . "\n";
}

function getAutoNumber($table, $field, $pref, $length, $where = "") {
    $ci = &get_instance();
        $query = "SELECT IFNULL(MAX(CONVERT(MID($field," . (strlen($pref) + 1) . "," . ($length - strlen($pref)) . "),UNSIGNED INTEGER)),0)+1 AS NOMOR
                FROM $table WHERE LEFT($field," . (strlen($pref)) . ")='$pref' $where";
        $result = $ci->db->query($query)->row();
        $zero="";
        $num = $length - strlen($pref) - strlen($result->NOMOR);
        for ($i = 0; $i < $num; $i++) {
            $zero = $zero . "0";
        }
        return $pref . $zero . $result->NOMOR;
    }

function noRegistrasiotomatis($field, $table, $where)
{
    $ci = get_instance();
    $today = date('Y-m-d');
    // mencari kode barang dengan nilai paling besar
    $query = "SELECT max($field) as maxKode FROM $table where $where='$today'";
    $data = $ci->db->query($query)->row_array();
    $kode = $data['maxKode'];
    $noUrut = (int) substr($kode, 0, 6);
    $noUrut++;
    $kodeBaru = sprintf("%04s", $noUrut); //sprintf berfungsi untuk menampilkan kodebaru yang diambil
    //berdasarkan no_urut, "%04s" berfungsi untuk menampilkan berapa karakter yang ingin ditampilkan kalau %04s berarti yang ditampilkan hanya 4 karakter
    return $kodeBaru;
}

function activate_menu($menu){
    $ci = get_instance();
    $class = $ci->router->fetch_class();
    return $class==$menu?'active':'';
}

function is_logged_in($redirect){
    $ci = get_instance();
	if ( $ci->session->userdata('logged_in') != true ){
		redirect($redirect);
	}
}

function tanggal_indo($day){
	$day = explode ("-",$day);
	switch ($day[1]){
		case 1:
		$day[1] = "Januari";
		break;
		case 2:
		$day[1] = "Februari";
		break;
		case 3:
		$day[1] = "Maret";
		break;
		case 4:
		$day[1] = "April";
		break;
		case 5:
		$day[1] = "Mei";
		break;
		case 6:
		$day[1] = "Juni";
		break;
		case 7:
		$day[1] = "Juli";
		break;
		case 8:
		$day[1] = "Agustus";
		break;
		case 9:
		$day[1] = "September";
		break;
		case 10:
		$day[1] = "Oktober";
		break;
		case 11:
		$day[1] = "November";
		break;
		case 12:
		$day[1] = "Desember";
		break; 
	}
	$tgl_indo = $day[2]." ".$day[1]." ".$day[0];
	return $tgl_indo;
}

