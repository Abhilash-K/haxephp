<?php

class view_HomeView {
	public function __construct() { if(!php_Boot::$skip_constructor) {
		$str = haxe_Resource::getString("bootstrap_basic");
		$t = new haxe_Template($str);
		$output = $t->execute(_hx_anonymous(array("title" => "Home")), null);
		php_Lib::hprint($output);
	}}
	function __toString() { return 'view.HomeView'; }
}
