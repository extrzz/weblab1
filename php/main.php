<?php

require_once 'validator.php';
require_once 'result.php';

session_start();
if (!isset($_SESSION['data']))
    $_SESSION['data'] = array();
$x = @$_POST["X_value"];
$y = @$_POST["Y_value"];
$r = @$_POST["R_value"];
$timezone= @$_POST["timezone"];

if(validate($x, $y, $r) && validateTimezone($timezone)){
    $is_inside = result($x, $y, $r);
    $hit_fact = $is_inside ? "Hit": "Miss";
    $current_time = date("j M o G:i:s", time()-$timezone*60);
    $execution_time = round(((microtime(true)) - $_SERVER['REQUEST_TIME_FLOAT'])*1000, 5);
    $answer = array("x"=>$x, "y"=>$y, "r"=>$r, "hit_fact"=>$hit_fact, "execution_time"=>$execution_time, "current_time"=>$current_time);
    $_SESSION['data'][] = $answer;
}

foreach ($_SESSION['data'] as $elem){
    echo "<tr class='columns'>";
    echo "<td>" . $elem['x'] . "</td>";
    echo "<td>" . $elem['y'] . "</td>";
    echo "<td>" . $elem['r'] . "</td>";
    echo "<td>" . $elem['hit_fact']  . "</td>";
    echo "<td>" . $elem['execution_time'] . "ms" . "</td>";
    echo "<td>" . $elem['current_time'] . "</td>";
    echo "</tr>";
}
?>