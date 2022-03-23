<?php
require_once 'model/Peserta.php';

if(adaPermintaanHapus()){
    Peserta::delete($_POST['email']);
    $pesan = "Data berhasil dihapus.";
} else $pesan = "";

kirimKeHalamanUtama($pesan);

function adaPermintaanHapus(){
    if(isset($_POST['email'])){
        return true;
    } else return false;
}

function kirimKeHalamanUtama($pesan){
    header("Location: index.php?pesan=$pesan");
}
