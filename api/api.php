<?php

session_start();

require "helpers/functions.php";

$routes = [];

$routes["/api/applications/create"] = array("controller" =>"Applications",
                                      "method" => "create");
$routes["/api/accounts/create"] = array("controller" => "Accounts",
                                "method" => "create");
$routes["/api/accounts/login"] = array("controller" => "Accounts",
                                "method" => "login");
$routes["/api/users/update"] =  array("controller" => "Users",
                                "method" => "updateUsers");
$routes["/api/users/listUsers"] = array("controller" => "Users",
                                "method" => "listUsers");  
$routes["/api/offers/create"] = array("controller" => "Offers",
                                "method" => "createOffers");  
$routes["/api/users/get"] = array("controller" => "Users",
                                "method" => "getUser");
$routes["/api/applications/search"] = array("controller" => "Applications",
                                "method" => "search");


$routes["/api/applications/listApplications"] = array("controller" => "Applications",
                                "method" => "listApplications");
$routes["/api/accounts/getProfileData"] = array("controller" => "Accounts",
                                "method" => "getProfileData");                                 
$routes["/api/session"] = array("controller" => "Accounts",
                                "method" => "checkSession");  
if (isset($_SERVER["REDIRECT_URL"])) {
    $key = rtrim($_SERVER['REDIRECT_URL'], '/');
    //$key = $_SERVER["REDIRECT_URL"];
    if (array_key_exists($key, $routes)) {
        require "controllers/" . $routes[$key]["controller"] . ".php"; 
        $controller = new $routes[$key]["controller"]();
        $response = $controller->$routes[$key]["method"]();
   
        // Print response for XHR|AJAX JS
        api_response($response, http_response_code());
    }
    else {
        api_response(array("error"=>"Page not found"), 404);
    }
}
else {
    api_response(array("error"=>"Access Forbidden"), 403);
}
