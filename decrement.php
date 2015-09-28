<?php

$dir = scandir( getcwd() );
$newdir = [];
$olddir = [];

$disallowed = [".DS_Store","..","."];

$dir = scandir( getcwd() );
foreach($dir as $k => &$file) {

	if(stristr($file,'.php') || in_array($file,$disallowed) || is_dir($file)) {
		continue;
	}

	// decrement all filenames, maintaining length of integer name
	$olddir[] = $file;
	$bits = explode('.',$file);
	$length = strlen($bits[0]);
	$num = (int) $bits[0] - 1;
	$bits[0] = str_pad($num, $length, 0, STR_PAD_LEFT);
	$newfile = implode($bits, '.');
	$newdir[] = $newfile;

}

$target = 'renamed_' . time();
mkdir($target);

foreach($newdir as $k => $v) {
	echo "{$olddir[$k]} to {$newdir[$k]}\n";
	copy($olddir[$k], "$target/{$newdir[$k]}");
}
