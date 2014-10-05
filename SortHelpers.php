<?php

namespace TopBooks;

class SortHelpers
{
	public static function sortArray($array)
	{
		$order = array_map(function () { return mt_rand(); }, $array);
		array_multisort($order, $array);
		return $array;
	}
}


