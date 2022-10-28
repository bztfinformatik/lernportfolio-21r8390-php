<?php
header("Content-Type:application/json");
if (isset($_GET['names'])) {
    response(200, "okay");
} else if (isset($_GET['add'])) {
    add($_GET['add']);
} else {
    responseEmpty(400, "Invalid Request");
}

function responseEmpty($response_code, $response_desc)
{
    $response['response_code'] = $response_code;
    $response['response_desc'] = $response_desc;

    $json_response = json_encode($response);
    echo $json_response;
}

function response($response_code, $response_desc)
{
    if (!file_exists('datei.txt')) {
        responseEmpty(500, "Datei nicht gefunden");
        return;
    }

    $content = file('datei.txt');
    for ($i = 0; $i < count($content); $i++) {
        $response[strval($i)] = str_replace(PHP_EOL, '', $content[$i]);
    }

    $response['response_code'] = $response_code;
    $response['response_desc'] = $response_desc;

    $json_response = json_encode($response);
    echo $json_response;
}

function IsNullOrEmptyString($str)
{
    return ($str === null || trim($str) === '');
}

function add($content)
{
    if (IsNullOrEmptyString($content)) {
        responseEmpty(400, "Invalid Request");
        return;
    }

    file_put_contents('datei.txt', $content . "\n", FILE_APPEND);
}
