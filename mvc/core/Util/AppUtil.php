<?php

class AppUtil {
	public static function isInvalidString($value) {
		if ($value == trim($value) && strpos($value, ' ') == false) {
			return true;
		}
		return false;
	}
}