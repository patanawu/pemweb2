<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pertemuan 1</title>
</head>
<body>
    <div class="container mt-5">
        <h1>Data yang dikirim</h1>
        <?php
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $nama = isset($_POST['nama'])
            ? $_POST['nama'] : '';
            $email = isset($_POST['email'])
            ? $_POST['email'] : '';
            $tugas = isset($_POST['tugas'])
            ? $_POST['tugas'] : '';
            $datauser = array(
                "nama" => $nama,
                "email" => $email,
                "tugas" => $tugas            );

        echo "<h2> Data yang dikirim melalui POST : </h2>";
        echo '<ul class="list-group">';

        foreach ($datauser as $key =>$value){
            if (!empty($value)){
                echo '<li class="list-group-item"><strong>'
                .ucfirst($key) . ':</strong>' 
                .htmlspecialchars($value) . '</li>';
            }else{
                echo '<li class="list-group-item"><strong>'
                .ucfirst($key) . '</strong>Data Kosong</li>';
            }
        }
        }
        
        ?>
    </div>
    
</body>
</html>