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

/*
Sample delete request
{
   "settingsObject":{},
   "notifyURL":"https://ideabiz.lk/apicall/isayyoudo/1.0/invokeDeleteConfirmation",
   "sessionId":223652,
   "userId":0,
   "activeStatus":403,
   "outputObject":{},
   "inputObject":{}
}
 */

$jsonIn = file_get_contents('php://input');
logFile($jsonIn);

$in = json_decode($jsonIn, true);

$connectionToken  = $in['connectionToken'];
$notifyURL =  $in['notifyURL'];
$sessionId = $in['sessionId'];
$userId = $in['userId'];
$activeStatus = $in['activeStatus'];

$outputObj = $in['outputObject'];
$inputObj = $in['inputObject'];

// Your code here




// invokeDeleteConfirmation
$invokeDeleteConfirmation = $in['notifyURL'];

$out = $in;
$out['activeStatus'] = 404;
$out['notifyURL'] = "";

sendResponse($invokeDeleteConfirmation, $out);

function sendResponse($server,$json ){
    $ch = curl_init($server);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
    curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $res = curl_exec($ch);

    return $res;
}