<?php

class Sys {
	public function __construct(){}
	static function getCwd() {
		$GLOBALS['%s']->push("Sys::getCwd");
		$__hx__spos = $GLOBALS['%s']->length;
		$cwd = getcwd();
		$l = _hx_substr($cwd, -1, null);
		{
			$tmp = _hx_string_or_null($cwd) . _hx_string_or_null(((($l === "/" || $l === "\\") ? "" : "/")));
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
	function __toString() { return 'Sys'; }
}
