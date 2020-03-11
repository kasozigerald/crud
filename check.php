<?php

	static $val = array();
	for($i = 0; $i < 3; $i++){
	$val[$i] = "?";

	}

	var_dump($val);
	echo implode(',', $val);



