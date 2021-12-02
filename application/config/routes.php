<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'dashboard';

// routes ######################################################
// ================= route auth ==============================
$route['login'] = 'Auth/index';
$route['proses'] = 'Auth/proses_login';
$route['logout'] = 'Auth/logout';
// ================= akhir route auth ========================
// ================= route kategori produk ===================
$route['list-kategori'] = 'kategori/index';
$route['save-kategori'] = 'kategori/add';
$route['update-kategori'] = 'kategori/update';
$route['delete-kategori'] = 'kategori/delete';
// ================= akhir route kategori produk =============
// ================= route tabungan ===================
$route['list-tabungan'] = 'tabungan/index';
$route['save-tabungan'] = 'tabungan/add';
$route['update-tabungan'] = 'tabungan/update';
$route['search-tabungan'] = 'tabungan/search';
$route['delete-tabungan'] = 'tabungan/delete';
// ================= akhir route tabungan =============
// ================= route produk ===================
$route['list-produk'] = 'produk/index';
$route['save-produk'] = 'produk/add';
$route['update-produk'] = 'produk/update';
$route['delete-produk'] = 'produk/delete';
// ================= akhir route produk =============
// ================= route pembelian ===================
$route['stok'] = 'stok_in/index';
$route['form-list-stok'] = 'stok_in/form_list';
$route['tampil'] = 'stok_in/tampil';
$route['list-stok'] = 'stok_in/list_stok';
$route['add-stok'] = 'stok_in/form_add';
$route['save-stok'] = 'stok_in/add';
$route['edit-stok'] = 'stok_in/form_edit';
$route['update-stok'] = 'stok_in/update';
$route['delete-stok'] = 'stok_in/delete';
// ================= akhir route pembelian =============
// ================= route transaksi ===================
$route['transaksi'] = 'transaksi/index';
$route['add-cart'] = 'transaksi/add_to_cart';
$route['show-cart'] = 'transaksi/show_cart';
$route['simpan-transaksi'] = 'transaksi/save';
// ================= akhir route transaksi =============
// ================= route laporan ===================
$route['laporan'] = 'laporan/index';
$route['simpan-laporan'] = 'laporan/save';
// ================= akhir route laporan =============
// ================= route user ===================
$route['list-user'] = 'user/index';
$route['save-user'] = 'user/save';
$route['update-user'] = 'user/update';
$route['delete-user'] = 'user/delete';
// ================= akhir route user =============
// akhir routes ################################################
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
