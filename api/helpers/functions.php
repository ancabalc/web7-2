<?php
function api_response($response, $status = 200) {
    header("Content-Type: application/json");
    header("HTTP/1.1 " . $status . $response);
    echo json_encode($response);
}

function validate_request() {
    if (!isset($_SESSION["isLogged"]) && $_SESSION["isLogged"] != TRUE) {
        http_response_code(401);  
        return array("error"=>"UNAUTHORIZED");
    }
}
