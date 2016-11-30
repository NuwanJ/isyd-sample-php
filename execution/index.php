<?php
/*
 *   Created by: A.J.N.M. Jaliyagoda
 *   Update: 2016-11-28
 */

ini_set('error_log', 'error.log');
error_reporting(E_ERROR);
ini_set('display_errors', 1);

include_once '../log.php';
date_default_timezone_set('Asia/Colombo');

$time = date("y-m-d H:i:s");

$out = array(
    "activeStatus"=>1,
    "outputObject"=>array(),
    "inputObject"=>array(),
    "connectToken"=>"",
    "notifyURL"=>"",
    "sessionId"=>"",
    "userId"=>""
);



$executionURL = "";
sendResponse($executionURL, $out);


function sendResponse($server, $json)
{
    $json = json_encode($json,true);

    $ch = curl_init($server);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
    curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $res = curl_exec($ch);

    return $res;
}

