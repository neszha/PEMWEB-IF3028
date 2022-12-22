<?php

function query($query) {
    global $connection;
    $query_result = mysqli_query($connection, $query);
    return $query_result;
}

function queryMany($query) {
    $array = [];
    $query_result = query($query);
    while ($data = mysqli_fetch_object($query_result)) {
        $array[] = $data;
    }
    return $array;
}

function queryOne($query) {
    $query_result = query($query);
    $data = mysqli_fetch_object($query_result);
    return $data;
}

function apiResponse($data) {
    $res = (object) ['data' => $data];
    echo json_encode($res);
    exit();
}

function redirect($location) {
    header('Location: ' . $location);
    exit();
}