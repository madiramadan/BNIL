<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'home/welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['id'] 						= "home";
$route['id/penghargaan'] 						= "awards";
$route['id/perlindungan-jiwa'] 						= "perlindungan/main/individu/jiwa";
$route['id/perlindungan-kesehatan'] 						= "perlindungan/main/individu/kesehatan";
$route['id/perlindungan-pendidikan'] 						= "perlindungan/main/individu/pendidikan";
$route['id/perlindungan-investasi'] 						= "perlindungan/main/individu/investasi";
$route['id/perlindungan-hari-tua'] 						= "perlindungan/main/individu/hari-tua";
$route['id/perlindungan-telemarketing'] 						= "perlindungan/main/individu/telemarketing";
$route['id/perlindungan/individu'] 						= "perlindungan/main/individu";
$route['id/perlindungan/kumpulan'] 						= "perlindungan/main/kumpulan";
$route['id/perlindungan/syariah'] 						= "perlindungan/main/syariah";
$route['id/perlindungan/(:any)/(:any)/(:any)'] 						= "perlindungan/detail/$2";
$route['id/manajemen/direksi'] 						= "manajemen/main/4";
$route['id/manajemen/dewan-komisaris'] 						= "manajemen/main/3";
$route['id/manajemen/dewan-pengawas-syariah'] 						= "manajemen/main/2";
$route['id/lifeblog'] 						= "blog";
$route['id/lifeblog/mulai-bekerja'] 						= "blog/main/1";
$route['id/lifeblog/merencanakan-masa-depan'] 						= "blog/main/2";
$route['id/lifeblog/menjaga-kesehatan'] 						= "blog/main/3";
$route['id/lifeblog/menjadi-orang-tua'] 						= "blog/main/4";
$route['id/lifeblog/investasi'] 						= "blog/main/5";
$route['id/lifeblog/menikah-berkeluarga'] 						= "blog/main/6";
$route['id/lifeblog/(:any)'] 						= "blog/detail/$1";
$route['id/ruangmedia/berita-perusahaan'] 						= "ruangmedia/main/1";
$route['id/ruangmedia/siaran-pers'] 						= "ruangmedia/main/2";
$route['id/ruangmedia/(:any)'] 						= "ruangmedia/detail/$1";
$route['id/ruang-media/berita-perusahaan'] 						= "ruangmedia/main/1";
$route['id/ruang-media/berita-perusahaan/(:any)'] 						= "ruangmedia/detail/$1";
$route['id/ruang-media/siaran-pers'] 						= "ruangmedia/main/2";
$route['id/ruang-media/siaran-pers/(:any)'] 						= "ruangmedia/detail/$1";
$route['id/ruang-media/(:any)'] 						= "ruangmedia/detail/$1";
$route['id/unit-link'] 						= "sheet_unit_link";
$route['id/kinerja-dana'] 						= "sheet_kinerja_dana";
$route['id/karir/(:any)'] 						= "karir/detail/$1";
$route['id/hubungi-kami'] 						= "customer_care";
$route['id/layanan/formulir'] 						= "formulir";
$route['id/promo/(:any)'] 						= "promo/detail/$1";
$route['id/layanan-1-hari'] 						= "klaim/layanan_1_hari";
$route['id/product/individu/jiwa'] 						= "perlindungan/main/individu";

$route['id/thankyoupage/(:any)/(:any)/(:any)/(:any)'] 						= "thankyoupage/detail/$1";
$route['en/thankyoupage/(:any)/(:any)/(:any)/(:any)'] 						= "thankyoupage/detail/$1";


$route['en'] 						= "home";
$route['en/penghargaan'] 						= "awards";
$route['en/perlindungan-jiwa'] 						= "perlindungan/main/individu/jiwa";
$route['en/perlindungan-kesehatan'] 						= "perlindungan/main/individu/kesehatan";
$route['en/perlindungan-pendidikan'] 						= "perlindungan/main/individu/pendidikan";
$route['en/perlindungan-investasi'] 						= "perlindungan/main/individu/investasi";
$route['en/perlindungan-hari-tua'] 						= "perlindungan/main/individu/hari-tua";
$route['en/perlindungan-telemarketing'] 			= "perlindungan/main/individu/telemarketing";
$route['en/perlindungan/individu'] 						= "perlindungan/main/individu";
$route['en/perlindungan/kumpulan'] 						= "perlindungan/main/kumpulan";
$route['en/perlindungan/syariah'] 						= "perlindungan/main/syariah";
$route['en/perlindungan/(:any)/(:any)/(:any)'] 						= "perlindungan/detail/$2";
$route['en/manajemen/direksi'] 						= "manajemen/main/4";
$route['en/manajemen/dewan-komisaris'] 						= "manajemen/main/3";
$route['en/manajemen/dewan-pengawas-syariah'] 						= "manajemen/main/2";
$route['en/lifeblog'] 						= "blog";
$route['en/lifeblog/mulai-bekerja'] 						= "blog/main/1";
$route['en/lifeblog/merencanakan-masa-depan'] 						= "blog/main/2";
$route['en/lifeblog/menjaga-kesehatan'] 						= "blog/main/3";
$route['en/lifeblog/menjadi-orang-tua'] 						= "blog/main/4";
$route['en/lifeblog/investasi'] 						= "blog/main/5";
$route['en/lifeblog/menikah-berkeluarga'] 						= "blog/main/6";
$route['en/lifeblog/(:any)'] 						= "blog/detail/$1";
$route['en/ruangmedia/berita-perusahaan'] 						= "ruangmedia/main/1";
$route['en/ruangmedia/siaran-pers'] 						= "ruangmedia/main/2";
$route['en/ruangmedia/(:any)'] 						= "ruangmedia/detail/$1";
$route['en/ruang-media/berita-perusahaan'] 						= "ruangmedia/main/1";
$route['en/ruang-media/berita-perusahaan/(:any)'] 						= "ruangmedia/detail/$1";
$route['en/ruang-media/siaran-pers'] 						= "ruangmedia/main/2";
$route['en/ruang-media/siaran-pers/(:any)'] 						= "ruangmedia/detail/$1";
$route['en/ruang-media/(:any)'] 						= "ruangmedia/detail/$1";
$route['en/unit-link'] 						= "sheet_unit_link";
$route['en/kinerja-dana'] 						= "sheet_kinerja_dana";
$route['en/karir/(:any)'] 						= "karir/detail/$1";
$route['en/hubungi-kami'] 						= "customer_care";
$route['en/layanan/formulir'] 						= "formulir";
$route['en/promo/(:any)'] 						= "promo/detail/$1";
$route['en/layanan-1-hari'] 						= "klaim/layanan_1_hari";

$route['id/(:any)'] 						= "$1";
$route['id/(:any)/(:any)'] 					= "$1/$2";
$route['id/(:any)/(:any)/(:any)'] 			= "$1/$2/$3";
$route['id/(:any)/(:any)/(:any)/(:any)'] 	= "$1/$2/$3/$4";
$route['id/(:any)/(:any)/(:any)/(:any)/(:any)'] 	= "$1/$2/$3/$4/$5";
$route['id/(:any)/(:any)/(:any)/(:any)/(:any)/(:any)'] 	= "$1/$2/$3/$4/$5/$6";

$route['en/(:any)'] 						= "$1";
$route['en/(:any)/(:any)'] 					= "$1/$2";
$route['en/(:any)/(:any)/(:any)'] 			= "$1/$2/$3";
$route['en/(:any)/(:any)/(:any)/(:any)'] 	= "$1/$2/$3/$4";
$route['en/(:any)/(:any)/(:any)/(:any)/(:any)'] 	= "$1/$2/$3/$4/$5";
$route['en/(:any)/(:any)/(:any)/(:any)/(:any)/(:any)'] 	= "$1/$2/$3/$4/$5/$6";


