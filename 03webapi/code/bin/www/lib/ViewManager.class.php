<?php

class ViewManager {
	public function __construct($state) { if(!php_Boot::$skip_constructor) {
		$_g = strtolower($state);
		switch($_g) {
		case "home":{
			new view_HomeView();
		}break;
		case "about":{
			new view_AboutView();
		}break;
		case "contact":{
			new view_ContactView();
		}break;
		default:{
			new view_HomeView();
		}break;
		}
	}}
	function __toString() { return 'ViewManager'; }
}
