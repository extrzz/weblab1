<?php

const X_MIN = -5;
const X_MAX = 3;
const Y_MIN = -5;
const Y_MAX = 5;
const R_MIN = 1;
const R_MAX = 5;


function validate($x, $y, $r): bool
{
	if((!is_numeric($x)) || (!is_numeric($y))) {
		return false;
	}else {
		if (($x < X_MIN) || ($x > X_MAX)){
			return false;
		}
		if (($y < Y_MIN) || ($y > Y_MAX)){
			return false;
		}
        if (($r < R_MIN) || ($r > R_MAX)){
            return false;
        }
	} return true;
}

function validateTimezone($timezone){
    return isset($timezone);
}