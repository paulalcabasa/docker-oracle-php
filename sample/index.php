<?php

echo 'test';


//ORACLE CONNECTION STRING
$user = 'APPS';
$pass = 'APPS';
$db = '(DESCRIPTION =
		(ADDRESS_LIST =
		  (ADDRESS = (PROTOCOL = TCP)(HOST = 172.16.1.86)(PORT = 1521))
		 )
		(CONNECT_DATA =
		  (SERVICE_NAME = PROD)
		 )
	    )';

$con = oci_connect($user, $pass, $db);

// Check connection oracle
if (!$con){
    echo "not connected";
	$e = oci_error();
	print htmlentities($e['message']);
	exit;
	}

    $sql =  "SELECT * FROM ap_suppliers WHERE ROWNUM <= 10";
    $stid = oci_parse($con, $sql);
    oci_execute($stid);

    while ($row = oci_fetch_array($stid, OCI_ASSOC + OCI_RETURN_NULLS)) {
        echo "<pre>";
        print_r($row);
        
    }