<?php

class Main {
	public function __construct() { if(!php_Boot::$skip_constructor) {
		$GLOBALS['%s']->push("Main::new");
		$__hx__spos = $GLOBALS['%s']->length;
		$html = "";
		if(!file_exists("mybase.ddb")) {
			new DBStart();
		}
		$cnx = sys_db_Sqlite::open("mybase.ddb");
		sys_db_Manager::set_cnx($cnx);
		sys_db_Manager::initialize();
		$this->createList();
		sys_db_Manager::cleanup();
		$cnx->close();
		$GLOBALS['%s']->pop();
	}}
	public function createList() {
		$GLOBALS['%s']->push("Main::createList");
		$__hx__spos = $GLOBALS['%s']->length;
		$html = "";
		$html .= "<table style=\"width:100%\">";
		$html .= "<tr><th>id</th><th>name</th><th>birthday</th><th>phoneNumber</th></tr>";
		{
			$_g1 = 0;
			$_g = User::$manager->all(null)->length;
			while($_g1 < $_g) {
				$i = $_g1++;
				$_user = User::$manager->unsafeGet($i, true);
				if($_user === null) {
					continue;
				}
				$html .= "<tr>";
				$html .= "<td>" . _hx_string_rec($_user->id, "") . "</td>";
				$html .= "<td>" . _hx_string_or_null($_user->name) . "</td>";
				$html .= "<td>" . Std::string($_user->birthday) . "</td>";
				$html .= "<td>" . _hx_string_or_null($_user->phoneNumber) . "</td>";
				$html .= "</tr>";
				unset($i,$_user);
			}
		}
		$html .= "</table>";
		php_Lib::hprint($html);
		$GLOBALS['%s']->pop();
	}
	static function main() {
		$GLOBALS['%s']->push("Main::main");
		$__hx__spos = $GLOBALS['%s']->length;
		$main = new Main();
		$GLOBALS['%s']->pop();
	}
	function __toString() { return 'Main'; }
}
