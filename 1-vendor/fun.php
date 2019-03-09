<?php


function email_exist($email){
	$sql = "SELECT id FROM users WHERE email = '$email'";
	$result = query($sql);
	if(row_count($result) ==1){
		return true;
	}else{
		return false;
	}
}

function name($name){
	$sql = "SELECT id FROM users WHERE name = '$name'";
	$result = query($sql);
	if(row_count($result) ==1){
		return true;
	}else{
		return false;
	}
}



?>