<?php

class Main {
	public function __construct() { if(!php_Boot::$skip_constructor) {
		$GLOBALS['%s']->push("Main::new");
		$__hx__spos = $GLOBALS['%s']->length;
		$json = utils_Read::json("_data", "test");
		if($json === null) {
			$json = _hx_anonymous(array("update" => Date::now(), "created" => Date::now(), "counter" => 0));
		} else {
			$_counter = $json->counter + 1;
			$_created = $json->created;
			$json = _hx_anonymous(array("update" => Date::now(), "created" => $_created, "counter" => $_counter));
		}
		utils_Write::json("_data", "test", $json);
		php_Lib::hprint($json);
		$GLOBALS['%s']->pop();
	}}
	static function main() {
		$GLOBALS['%s']->push("Main::main");
		$__hx__spos = $GLOBALS['%s']->length;
		$main = new Main();
		$GLOBALS['%s']->pop();
	}
	function __toString() { return 'Main'; }
}
