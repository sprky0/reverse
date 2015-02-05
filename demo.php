<?php

for($i = 1; $i <= 100; $i++) {

	$filename = sprintf('%06d', $i) . '.txt';
	file_put_contents($filename,"test $i");

}
