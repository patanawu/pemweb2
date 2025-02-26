<?php
$siswa = ["tian", "asep", "lutpi", "gondrong"]

echo "Array awal :<br>";
print_r($siswa);

$orang_terakhir = array_pop($siswa);

echo "<br>Elemen yang akan dihapus" .$orang_terkahir. "<br>";

echo"Array setelah penghapusan :";
print_r($siswa);

?>