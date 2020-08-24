<?php
function dd($value){
    dump($value);
    exit;
}
function dump($value){
    echo "<pre>";
    var_dump($value);
    echo "</pre>";
}
/*
get sesssion name
*/
function getUserNameHelper()
{
	$CI = & get_instance();
    $user_name = $CI->session->userdata('user_name') ?? '';
    return $user_name;
}

/*
show alert flash session
*/
function showAlertHelper()
{	
	$CI = & get_instance();
	if ($CI->session->flashdata('errors')){
            echo '<div class="alert alert-danger">';
            echo  $CI->session->flashdata('errors');
            echo  "</div>";
        }elseif ($CI->session->flashdata('success')){
            echo  '<div class="alert alert-success">';
            echo  $CI->session->flashdata('success');
            echo  "</div>";
        }if ($CI->session->flashdata('error')){
            echo '<div class="alert alert-warning">';
            echo  $CI->session->flashdata('error');
            echo  "</div>";
        }


}
/*
get full path url
*/

function getFullPath()
{
	$actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
	return $actual_link;
}