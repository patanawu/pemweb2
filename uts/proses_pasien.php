<?php
require_once 'dbkoneksi.php';

session_start();

// Fungsi untuk membersihkan input (mencegah XSS dan masalah lainnya)
function clean_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

try {
    $_proses = $_POST['proses'] ?? '';
    $redirect = 'data_pasien.php';

    if ($_proses == "Tambah") {
        // Validasi Server-Side (Sangat Penting!)
        $kode = clean_input($_POST['kode']);
        $nama = clean_input($_POST['nama']);
        $tmp_lahir = clean_input($_POST['tmp_lahir']);
        $tgl_lahir = clean_input($_POST['tgl_lahir']);
        $gender = clean_input($_POST['gender']);
        $email = clean_input($_POST['email'] ?? ''); // Boleh kosong
        $alamat = clean_input($_POST['alamat']);
        $kelurahan_id = clean_input($_POST['kelurahan_id'] ?? null); // Boleh kosong

        // Validasi Wajib Isi
        if (empty($kode) || empty($nama) || empty($tmp_lahir) || empty($tgl_lahir) || empty($gender) || empty($alamat)) {
            $_SESSION['message'] = 'Semua field yang bertanda bintang (*) wajib diisi.';
            $_SESSION['status'] = 'gagal';
            header('Location: form_pasien.php'); // Kembali ke form
            exit();
        }

        // Validasi Format Kode (Contoh)
        if (strlen($kode) < 3 || strlen($kode) > 10 || !preg_match('/^[A-Z0-9]+$/', $kode)) {
            $_SESSION['message'] = 'Kode pasien tidak valid (3-10 karakter, huruf kapital dan angka).';
            $_SESSION['status'] = 'gagal';
            header('Location: form_pasien.php');
            exit();
        }

        // Validasi Format Email (Contoh)
        if (!empty($email) && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $_SESSION['message'] = 'Format email tidak valid.';
            $_SESSION['status'] = 'gagal';
            header('Location: form_pasien.php');
            exit();
        }

        // Validasi Tanggal Lahir (Contoh)
        $tanggal_sekarang = date('Y-m-d');
        if ($tgl_lahir > $tanggal_sekarang) {
            $_SESSION['message'] = 'Tanggal lahir tidak boleh melebihi tanggal sekarang.';
            $_SESSION['status'] = 'gagal';
            header('Location: form_pasien.php');
            exit();
        }

        // Jika semua validasi lolos, lakukan INSERT
        $sql = "INSERT INTO pasien (kode, nama, tmp_lahir, tgl_lahir, gender, email, alamat, kelurahan_id)
                VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $data = [
            $kode,
            $nama,
            $tmp_lahir,
            $tgl_lahir,
            $gender,
            $email,
            $alamat,
            $kelurahan_id
        ];
        $stmt = $dbh->prepare($sql);

        if ($stmt->execute($data)) {
            $_SESSION['message'] = 'Data pasien berhasil ditambahkan.';
            $_SESSION['status'] = 'sukses';
            header('Location: data_pasien.php'); // Kembali ke daftar pasien
            exit();
        } else {
            $_SESSION['message'] = 'Gagal menambahkan data pasien.';
            $_SESSION['status'] = 'gagal';
            header('Location: form_pasien.php'); // Kembali ke form
            exit();
        }

    } elseif ($_proses == "Ubah") {
        // ... (Kode "Ubah" Anda, dengan validasi serupa)

    } elseif (isset($_GET['delete'])) {
        // ... (Kode "Delete" Anda)
    }

} catch (PDOException $e) {
    $_SESSION['message'] = 'Terjadi kesalahan database: ' . $e->getMessage();
    $_SESSION['status'] = 'gagal';
    error_log('Database Error: ' . $e->getMessage());
    header('Location: data_pasien.php');
    exit();

} finally {
    // Opsional: Tutup koneksi (PDO biasanya menutup otomatis saat skrip selesai)
    if ($stmt ?? null) { 
        $stmt = null;
    }
    if ($dbh ?? null) {
        $dbh = null;
    }
}
?>