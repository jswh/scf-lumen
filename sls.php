<?php
$app = require_once('../bootstrap/app.php');

function main_handler($event, $context) {
    try {
        initQueryData($event);
        global $app;
        $request = \Laravel\Lumen\Http\Request::capture();
        $response = $app->handle($request);
        $response->headers->set('Content-Type', 'application/json');
        $headers = [];
        foreach ($response->headers->allPreserveCase() as $k => $v) {
            $headers[$k] = current($v);
        }
        return [
            "isBase64Encoded" => false,
            "statusCode" =>  200,
            "headers" =>  $headers,
            "body" =>  $response->getContent()
        ];
    } catch(\Throwable $e) {
        var_dump($e->getMessage(), $e->getTraceAsString());
    }
}

function initQueryData($event) {
    if (isset($event->body)) {
        $_POSTbody = @json_decode($event->body, True);
        if ($_POSTbody) {
            foreach ($_POSTbody as $key => $value){
                $_POST[$key]=$value;
            }
        }

    }
    $pathes = explode('?', $event->path);
    $_SERVER['REQUEST_URI'] = current($pathes);
    $_SERVER['REQUEST_METHOD'] = $event->httpMethod;
    parse_str(end($pathes), $_GET);
}
