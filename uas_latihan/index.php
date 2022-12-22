<?php
require_once './api/init.php';

// Mengambil data mahasiswa.
$students = queryMany("SELECT * FROM students");

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Daftar Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
  </head>
  <body>
    <div class="container mt-5">
        
        <div class="row">
            <div class="col">
                <h2 class="mb-3">Data Mahasiswa</h2>
            </div>
            <div class="col text-end">
                <button class="btn btn-primary">Tambah Mahasiswa</button>
            </div>
        </div>

        <table class="table table-striped table-centered">
            <thead>
                <tr>
                    <th scope="col">No.</th>
                    <th scope="col">NIM</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Program Studi</th>
                    <th scope="col" class="text-center">#</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($students as $key => $student) { ?>
                <tr>
                    <th class="align-middle" scope="row"><?= $key + 1 ?></th>
                    <td class="align-middle"><?= $student->nim ?></td>
                    <td class="align-middle"><?= $student->name ?></td>
                    <td class="align-middle"><?= $student->prodi ?></td>
                    <td class="align-middle text-center">
                        <a href="api/students/delete.php?id=<?= $student->id ?>" class="btn btn-xs btn-danger">Hapus</a>
                    </td>
                </tr>
                <?php } ?>
                <tr>
                   <td colspan="5" class="text-center">
                        <i>Tidak ada data!</i>
                   </td> 
                </tr>
            </tbody>
        </table>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
  </body>
</html>