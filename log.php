<?php
/*
 *   Created by: A.J.N.M. Jaliyagoda
 *   Update: 2016-11-28
 */

function logFile($rtn){
	$f=fopen("log.txt","a");
	fwrite($f, $rtn . "\n");
	fclose($f);
}

?>