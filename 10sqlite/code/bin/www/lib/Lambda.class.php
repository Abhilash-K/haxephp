<?php

class Lambda {
	public function __construct(){}
	static function map($it, $f) {
		$GLOBALS['%s']->push("Lambda::map");
		$__hx__spos = $GLOBALS['%s']->length;
		$l = new HList();
		if(null == $it) throw new HException('null iterable');
		$__hx__it = $it->iterator();
		while($__hx__it->hasNext()) {
			unset($x);
			$x = $__hx__it->next();
			$l->add(call_user_func_array($f, array($x)));
		}
		{
			$GLOBALS['%s']->pop();
			return $l;
		}
		$GLOBALS['%s']->pop();
	}
	function __toString() { return 'Lambda'; }
}
