<?php

class haxe_io_Path {
	public function __construct(){}
	static function escape($path, $allowSlashes = null) {
		if($allowSlashes === null) {
			$allowSlashes = false;
		}
		$regex = null;
		if($allowSlashes) {
			$regex = new EReg("[^A-Za-z0-9_/\\\\\\.]", "g");
		} else {
			$regex = new EReg("[^A-Za-z0-9_\\.]", "g");
		}
		return $regex->map($path, array(new _hx_lambda(array(&$allowSlashes, &$path, &$regex), "haxe_io_Path_0"), 'execute'));
	}
	function __toString() { return 'haxe.io.Path'; }
}
function haxe_io_Path_0(&$allowSlashes, &$path, &$regex, $v) {
	{
		return "-x" . _hx_string_rec(_hx_char_code_at($v->matched(0), 0), "");
	}
}