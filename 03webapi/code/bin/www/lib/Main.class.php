<?php

class Main {
	public function __construct() { if(!php_Boot::$skip_constructor) {
		$params = php_Web::getParams();
		$state = null;
		if($params->exists("state")) {
			$state = $params->get("state");
		} else {
			$state = "home";
		}
		new ViewManager($state);
	}}
	static function main() {
		$main = new Main();
	}
	function __toString() { return 'Main'; }
}
