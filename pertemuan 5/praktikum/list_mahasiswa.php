<?php
require_once 'dbkoneksi.php'

//definisi query
$sql = "SELECT * FROM mahasiswa ORDER BY thn_masuk DESC";

//jalankan query
$rs = $dbh->query($sql)

//tampilkan hasil query
foreach($rs as $row){
    echo "<br>".$row->nim.'-'.$row->nama;
}
?>