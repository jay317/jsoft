<?php
function getCurrencyDouble($amount){
	return "<i class=\"fa fa-inr\"></i>".round($amount,2);
}

function getDateFormat_m($date){
	$newDate=date('M d, Y',strtotime($date));
	return $newDate;
}

function getDateFormat_d($date){
	$newDate=date('d/m/Y',strtotime($date));
	return $newDate;
}

function getDateFormat_dm($date){
    $newDate=date('d F Y',strtotime($date));
    return $newDate;
}

function getDateFormat_dt($date){
	date_default_timezone_set('Asia/Kolkata');
	$newDate=date('d/m/Y H:i:s A',strtotime($date));
	return $newDate;
}

