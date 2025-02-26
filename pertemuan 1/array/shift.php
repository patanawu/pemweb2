<?php
$rokok = ["samsu", "esse", "kretek", "marlong", "garpit"]

$awal = array_shift($rokok);

echo "rokok yang dihapus : $awal <br>";
echo "Array setelah shift <br>";
foreach ($rokok as $r){
    echo "$r <br>";
}
?>