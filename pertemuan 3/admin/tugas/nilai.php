<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container mt-5">

        <?php
        
        if ($_SERVER["REQUEST_METHOD"] == "GET") {
            $nama = isset($_GET['nama']) ? $_GET['nama'] : '';
            $mata_kuliah = ($_GET['mataKuliah']) ? $_GET['mataKuliah'] : '';
            $nilai_uts = isset($_GET['nilaiuts']) ? $_GET['nilaiuts'] : '';
            $nilai_uas = isset($_GET['nilaiuas']) ? $_GET['nilaiuas'] : '';
            $nilai_tugas = isset($_GET['nilaitugas']) ? $_GET['nilaitugas'] : '';

            $dataNilaiMahasiswa = array(
                'nama : ' => $nama,
                'mata kuliah : ' => $mata_kuliah,
                'nilai uts : ' => $nilai_uts,
                'nilai uas : ' => $nilai_uas,
                'nilai tugas : ' => $nilai_tugas
            );

            function nilaiHuruf($nilai)
            {

                if ($nilai > 84) {
                    $grade = 'A';
                } elseif ($nilai > 69) {
                    $grade = 'B';
                } elseif ($nilai > 55) {
                    $grade = 'C';
                } elseif ($nilai > 35) {
                    $grade = 'D';
                } else {
                    $grade = 'E';
                }
                return $grade;
            }

            $nilai_huruf_uts = !empty($nilai_uts) ? nilaiHuruf($nilai_uts) : 'Nilai kosong';
            $nilai_huruf_uas = !empty($nilai_uas) ? nilaiHuruf($nilai_uas) : 'Nilai kosong';
            $nilai_huruf_Tugas = !empty($nilai_tugas) ? nilaiHuruf($nilai_tugas) : 'Nilai kosong';

            $NilaiHuruf = array(
                'nilai uts : ' => $nilai_huruf_uts,
                'nilai uas : ' => $nilai_huruf_uas,
                'nilai tugas : ' => $nilai_huruf_Tugas
            );

            echo "<h1>Nilai Mahasiswa</h1>";
            echo "<h2>Nilai Angka</h2>";

            foreach ($dataNilaiMahasiswa as $key => $value) {
                if (!empty($value)) {
                    echo "<p>" . ucfirst($key) . htmlspecialchars($value) .  "</p>";
                    // echo "<p>Mata Kuliah : " . htmlspecialchars($mata_kuliah) . "</p>";
                    // echo "<p>Nilai UTS : " . $nilai_uts . "</p>";
                    // echo "<p>Nilai UAS : " . $nilai_uas . "</p>";
                    // echo "<p>Nilai Tugas/Praktikum : " . $nilai_tugas . "</p>";
                } else {
                    echo "<p>" . ucfirst($key) . " Data kosong</p>";
                }
            }

            echo "<h2>Nilai Huruf</h2>";
            foreach ($NilaiHuruf as $key => $value) {
                if (!empty($value)) {
                    echo "<p>" . $key . $value . "</p>";
                } else {
                    echo "<p>" . $key . " Data kosong</p>";
                }
            }
        }

        ?>
    </div>

  
</body>

</html>