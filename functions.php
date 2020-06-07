<?php

function sanitize($input){
	//stripslashes buat hilangkan backslash (\)
	//htmlspecialchars buat jadikan tanda2 coding jd terbaca spy ndka error
	$output = htmlspecialchars(stripslashes($input));
    // $output = str_replace("script", "blocked", $output);
    return $output;
}

function repost($input){
	$output = htmlentities($input);
	return $output;
}

?>