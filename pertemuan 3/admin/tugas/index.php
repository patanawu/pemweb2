<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container px-5 my-5">
        <form id="contactForm" action="nilai.php" method="get">
            <div class="mb-3">
                <label class="form-label" for="namaLengkap">Nama Lengkap</label>
                <input class="form-control" name="nama" id="namaLengkap" type="text" placeholder="Nama Lengkap" data-sb-validations="required" required />
                <div class="invalid-feedback" data-sb-feedback="namaLengkap:required">Nama Lengkap is required.</div>
            </div>
            <div class="mb-3">
                <label class="form-label" for="mataKuliah">Mata Kuliah</label>
                <select class="form-select" name="mataKuliah" id="mataKuliah" aria-label="Mata Kuliah" required>
                    <option value="">-- pilih Mata Kuliah --</option>
                    <option value="Dasar Dasar Pemprograman">Dasar Dasar Pemprograman</option>
                    <option value="Pemrograman Web 1">Pemrograman Web 1</option>
                    <option value="Basis Data">Basis Data</option>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label" for="nilaiUts">Nilai UTS</label>
                <input class="form-control" name="nilaiuts" id="nilaiUts" type="number" placeholder="Nilai UTS" data-sb-validations="required" required />
                <div class="invalid-feedback" data-sb-feedback="nilaiUts:required">Nilai UTS is required.</div>
            </div>
            <div class="mb-3">
                <label class="form-label" for="nilaiUas">Nilai UAS</label>
                <input class="form-control" name="nilaiuas" id="nilaiUas" type="number" placeholder="Nilai UAS" data-sb-validations="required" required />
                <div class="invalid-feedback" data-sb-feedback="nilaiUas:required">Nilai UAS is required.</div>
            </div>
            <div class="mb-3">
                <label class="form-label" for="nilaiTugasPraktikum">Nilai Tugas/praktikum </label>
                <input class="form-control" name="nilaitugas" id="nilaiTugasPraktikum" type="number" placeholder="Nilai Tugas/praktikum " data-sb-validations="required" required />
                <div class="invalid-feedback" data-sb-feedback="nilaiTugasPraktikum:required">Nilai Tugas/praktikum is required.</div>
            </div>

            <div class="d-grid">
                <button class="btn btn-primary btn-lg" id="submitButton" type="submit">Submit</button>
            </div>
        </form>
    </div>
</body>

</html>