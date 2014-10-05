<?php

namespace TopBooks;

class RepeatableRandomExecutor 
{
	public function __construct($seed)
	{
		if (is_string($seed)) {
			$seed = self::getSeedFromString($seed);
		}

		$this->seed = $seed;
	}

	public function execute($targetFunction)
	{
		$currentSeed = mt_rand();
		mt_srand($this->seed);

		$args = func_get_args();
		$innerArgs = array_splice($args, 1);
		$result = call_user_func_array($targetFunction, $innerArgs);

		mt_srand($currentSeed);

		return $result;
	}

	private static function getSeedFromString($string)
	{
		return crc32($string);
	}
}
