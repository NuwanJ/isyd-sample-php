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
Sample Create Request
{
   "connectToken":"",
   "settingsObject":{},
   "notifyURL":"https://ideabiz.lk/apicall/isayyoudo/1.0/invokeUserCondition",
   "sessionId":223638,
   "userId":174,
   "activeStatus":200,
   "outputObject":{},
   "inputObject":{
      "filterCriteria":"test"
   }
}
 */

// Reading JSON Data
$jsonIn = file_get_contents('php://input');
$in = json_decode($jsonIn, true);

$connectionToken = $in['connectionToken'];
$notifyURL = $in['notifyURL'];
$sessionId = $in['sessionId'];
$userId = $in['userId'];
$activeStatus = $in['activeStatus'];

$outputObj = $in['outputObject'];
$inputObj = $in['inputObject'];

// Your code here




// Send invokeUserCondition
$out = $in;
$out['activeStatus'] = 1;
$out['notifyURL'] = "";
$invokeUserCondition = $in['notifyURL'];

sendResponse($invokeUserCondition, $out);


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