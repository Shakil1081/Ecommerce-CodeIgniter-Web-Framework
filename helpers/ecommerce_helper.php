<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function RandString($num){
    $str = array("A", "B", "C", "D", "a", "b", "c", 0, 1, 2);
    $data = "";
    for($i=1; $i <= $num; $i++){
        $data .= $str[rand(0, count($str)-1)];
    }
    return $data;
}
function Replace($data){
    $data = str_replace(" ", "-", $data);
    $data = str_replace("!", "", $data);
    return strtolower($data);
}















