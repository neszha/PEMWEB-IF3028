<?php
require_once 'koneksi.php';

function queryMany($query) {
    global $connection;
    $array = [];
    $query_result = mysqli_query($connection, $query);
    while ($data = mysqli_fetch_object($query_result)) {
        $array[] = $data;
    }
    return $array;
}

function response($data) {
    $res = (object) ['data' => $data];
    echo json_encode($res);
    exit();
}

// API: Get daftar prodi.
if(isset($_GET['prodi-list'])) {
    $res_prodi_list = queryMany("SELECT prodi FROM mahasiswa");
    $all_prodi_list = [];
    foreach($res_prodi_list as $data) {
        $all_prodi_list[] = $data->prodi;
    }
    $prodi_list = [];
    foreach(array_unique($all_prodi_list) as $data) {
        $prodi_list[] = $data;
    }
    response($prodi_list);
}

// API: Get daftar mahasiswa berdasarkan prodi || all.
if(isset($_GET['prodi']) && $_GET['prodi']) {
    $prodi = $_GET['prodi'];
    if($prodi === 'all') {
        $mahasiswa = queryMany("SELECT * FROM mahasiswa");
    }else {
        $mahasiswa = queryMany("SELECT * FROM mahasiswa WHERE prodi = '{$prodi}'");
    }
    response($mahasiswa);
}

response([]);
exit(0);