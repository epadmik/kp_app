<?php

    $filename = "pgn.csv";
    $exists = (file_exists($filename));
 	$handle = fopen($filename, 'a');
 	$msg = "PGN Information\n" .
	"\nYour Name is: " . $_POST['name'] . 
 	"\nYour Email is: " . $_POST['email'] . 
 	"\nYor Phone Number is " . $_POST['phone'] . 
	"\nYour Message is: " . $_POST['message'];

	$stringToAdd="";	

	if (!$exists){
		foreach($_POST as $name => $value) {
			$stringToAdd.="$name,";
		}
		$stringToAdd.="\n";
		$new=False;
		fwrite($handle, $stringToAdd);
	}
	$stringToAdd="";

	foreach($_POST as $name => $value) {
		$msg .="$name : $value\n";
		$stringToAdd.="$value,";
	}
	$stringToAdd.="\n";

	fwrite($handle, $stringToAdd);
	fclose($handle);

	$msg = $_POST['message'];
	$headers = "From: ". $_POST["name"] ."<".$_POST["email"]. ">\r\n";	
	mail("pgnexecboard@umich.edu", 'PGN Website', $msg, $headers);
?>