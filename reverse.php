<?php

$dir = scandir( getcwd() );
$newdir = array();

$disallowed = array(".DS_Store","..",".");


$dir = scandir( getcwd() );
foreach($dir as &$file) {

	if(stristr($file,'.php') || in_array($file,$disallowed) || is_dir($file)) {
		continue;
	}
	$newdir[] = $file;

}

$revdir = $newdir;
$revdir = array_reverse($revdir);

$target = 'renamed_' . time();
mkdir($target);

foreach($newdir as $k => $v) {
	echo "$k $v to {$revdir[$k]}\n";
	copy($v, "$target/{$revdir[$k]}");
}
