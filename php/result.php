<?php

function isTriangle($x, $y, $r): bool
{
	return ($x<=0 && $y >= 0 && $y<=$x+$r/2);
}
function isRectangle($x, $y, $r): bool
{
	return ($x>=0 && $y <= 0 && $x<=$r && $y<=$r/2);
}
function isQuarterOfACircle($x, $y, $r): bool
{
	return ($x<=0 && $y<=0 && sqrt($x*$x+$y*$y)<=$r/2);
}

function result($x, $y, $r): bool
{
	return isTriangle($x, $y, $r) || isRectangle($x, $y, $r) || isQuarterOfACircle($x, $y, $r);
}