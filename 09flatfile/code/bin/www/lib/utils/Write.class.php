<?php

class utils_Write {
	public function __construct(){}
	static function json($folderName, $fileName, $data) {
		$GLOBALS['%s']->push("utils.Write::json");
		$__hx__spos = $GLOBALS['%s']->length;
		$_path = _hx_string_or_null(Sys::getCwd()) . _hx_string_or_null(("/" . _hx_string_or_null($folderName) . "/"));
		if(!file_exists($_path)) {
			$path = haxe_io_Path::addTrailingSlash($_path);
			$_p = null;
			$parts = (new _hx_array(array()));
			while($path !== ($_p = haxe_io_Path::directory($path))) {
				$parts->unshift($path);
				$path = $_p;
			}
			{
				$_g = 0;
				while($_g < $parts->length) {
					$part = $parts[$_g];
					++$_g;
					if(_hx_char_code_at($part, strlen($part) - 1) !== 58 && !file_exists($part)) {
						@mkdir($part, 493);
					}
					unset($part);
				}
			}
		}
		if(!file_exists($_path)) {
			try {
				throw new HException("Error");
			}catch(Exception $__hx__e) {
				$_ex_ = ($__hx__e instanceof HException) ? $__hx__e->e : $__hx__e;
				if(is_string($msg = $_ex_)){
					$GLOBALS['%e'] = (new _hx_array(array()));
					while($GLOBALS['%s']->length >= $__hx__spos) {
						$GLOBALS['%e']->unshift($GLOBALS['%s']->pop());
					}
					$GLOBALS['%s']->push($GLOBALS['%e'][0]);
					haxe_Log::trace("Error occurred: " . _hx_string_or_null($msg), _hx_anonymous(array("fileName" => "Write.hx", "lineNumber" => 23, "className" => "utils.Write", "methodName" => "json")));
				} else throw $__hx__e;;
			}
		}
		$_fileName = _hx_string_or_null($fileName) . ".json";
		$_filePath = _hx_string_or_null($_path) . "" . _hx_string_or_null($_fileName);
		$f = sys_io_File::write($_filePath, false);
		$f->writeString(haxe_Json::phpJsonEncode($data, null, null));
		$f->close();
		$GLOBALS['%s']->pop();
	}
	function __toString() { return 'utils.Write'; }
}
