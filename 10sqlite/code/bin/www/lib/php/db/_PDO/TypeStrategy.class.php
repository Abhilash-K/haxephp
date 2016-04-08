<?php

class php_db__PDO_TypeStrategy {
	public function __construct() { if(!php_Boot::$skip_constructor) {
		$GLOBALS['%s']->push("php.db._PDO.TypeStrategy::new");
		$__hx__spos = $GLOBALS['%s']->length;
		$GLOBALS['%s']->pop();
	}}
	public function map($data) {
		$GLOBALS['%s']->push("php.db._PDO.TypeStrategy::map");
		$__hx__spos = $GLOBALS['%s']->length;
		throw new HException("must override");
		$GLOBALS['%s']->pop();
	}
	static function convert($v, $type) {
		$GLOBALS['%s']->push("php.db._PDO.TypeStrategy::convert");
		$__hx__spos = $GLOBALS['%s']->length;
		if($v === null) {
			$GLOBALS['%s']->pop();
			return $v;
		}
		switch($type) {
		case "bool":{
			$tmp = (bool)($v);
			$GLOBALS['%s']->pop();
			return $tmp;
		}break;
		case "int":{
			$tmp = intval($v);
			$GLOBALS['%s']->pop();
			return $tmp;
		}break;
		case "float":{
			$tmp = floatval($v);
			$GLOBALS['%s']->pop();
			return $tmp;
		}break;
		case "date":{
			$tmp = Date::fromString($v);
			$GLOBALS['%s']->pop();
			return $tmp;
		}break;
		case "blob":{
			$tmp = haxe_io_Bytes::ofString($v);
			$GLOBALS['%s']->pop();
			return $tmp;
		}break;
		default:{
			$GLOBALS['%s']->pop();
			return $v;
		}break;
		}
		$GLOBALS['%s']->pop();
	}
	function __toString() { return 'php.db._PDO.TypeStrategy'; }
}
