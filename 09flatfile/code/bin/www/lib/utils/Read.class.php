<?php

class utils_Read {
	public function __construct(){}
	static function json($folderName, $fileName) {
		$GLOBALS['%s']->push("utils.Read::json");
		$__hx__spos = $GLOBALS['%s']->length;
		$_path = _hx_string_or_null(Sys::getCwd()) . _hx_string_or_null(("/" . _hx_string_or_null($folderName) . "/"));
		$_filePath = _hx_string_or_null($_path) . "" . _hx_string_or_null($fileName) . ".json";
		$json = null;
		if(file_exists($_filePath)) {
			$text = sys_io_File::getContent($_filePath);
			$json = haxe_Json::phpJsonDecode($text);
		} else {
			$json = null;
		}
		{
			$GLOBALS['%s']->pop();
			return $json;
		}
		$GLOBALS['%s']->pop();
	}
	function __toString() { return 'utils.Read'; }
}
