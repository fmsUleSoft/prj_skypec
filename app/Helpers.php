<?php
	function arrStr2Int($array) {
		foreach($array as $key => $value){
			$array[$key] = intval($value);
		}
		return $array;
	}
	
	function StrArr2Arr($string) {
		$string = str_replace('"', '', substr($string, 1, strlen($string) - 2));
		$array = explode(',', $string);
		foreach($array as $key => $value){
			$array[$key] = intval($value);
		}
		return $array;
	}