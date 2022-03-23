<?php
require_once 'model/Peserta.php';

if(adaPesan()){
    $pesan = $_GET['pesan'];
} else $pesan = "";

$daftarPeserta = Peserta::getAll();
tampilkanHalamanIndex($pesan,$daftarPeserta);

function adaPesan(){
    if(isset($_GET['pesan'])){
        return true;
    } else return false;
}

function tampilkanHalamanIndex($pesan,$daftarPeserta){
    require_once 'view/view-index.php';
}

