<?php
$_CONFIG['site_name'] 			= "Project Monitoring and Management Information System (PMIS)";
$_CONFIG['site_short_name'] 	= "PMIS";

 if($_SERVER['HTTP_HOST'] == "localhost")
{# For local
	$_CONFIG['site_url'] 		= "http://".$_SERVER['HTTP_HOST']."/PMIS/";
	$_CONFIG['site_path'] 		= $_SERVER['DOCUMENT_ROOT'] . "/PMIS/";
}

$_CONFIG['crop_year'] 	= "2020";
$_CONFIG['nc_code'] 	= "NC0101";
?>