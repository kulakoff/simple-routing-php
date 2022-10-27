<?php

function response($http_res_code, $status, $message, $data)
{
    header("Content-Type: application/json; charset=UTF-8");
    http_response_code($http_res_code);
    $response = ["status" => $status, "message" => $message, "data" => $data];
    // if ($status) {
    //     $response = [...$status];
    // }
    echo json_encode($response);
};
