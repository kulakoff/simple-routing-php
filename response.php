<?php

function response($code, $message)
{
    header("Content-Type: application/json; charset=UTF-8");
    http_response_code($code);
    echo json_encode(["message" => $message]);
};
