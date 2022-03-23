<?php
require_once 'model/Peserta.php';

if(adaPermintaanProsesUpdate()){
    $peserta = Peserta::get($_POST['email']);
    $peserta->save($_POST['new_email'],$_POST['new_nama']);
    kirimKeHalamanUtama("Data berhasil diperbarui.");
} else {
    $peserta = Peserta::get($_GET['email']);
    tampilkanFormulirUpdate($peserta);
}

function adaPermintaanProsesUpdate(){
    if(isset($_POST['email'])){
        return true;
    } else return false;
}

function kirimKeHalamanUtama($pesan){
    header("Location: index.php?pesan=$pesan");
}

function tampilkanFormulirUpdate($peserta){
    require_once 'view/view-ubah-peserta.php';
}
