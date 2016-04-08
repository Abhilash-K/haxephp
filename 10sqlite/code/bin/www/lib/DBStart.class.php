<?php

class DBStart {
	public function __construct() { if(!php_Boot::$skip_constructor) {
		$GLOBALS['%s']->push("DBStart::new");
		$__hx__spos = $GLOBALS['%s']->length;
		$cnx = sys_db_Sqlite::open("mybase.ddb");
		sys_db_Manager::set_cnx($cnx);
		sys_db_Manager::initialize();
		if(!sys_db_TableCreate::exists(User::$manager)) {
			sys_db_TableCreate::create(User::$manager, null);
		}
		{
			$_g = 0;
			while($_g < 10) {
				$i = $_g++;
				$user = $this->createRandomUser();
				$user->insert();
				unset($user,$i);
			}
		}
		sys_db_Manager::cleanup();
		$cnx->close();
		$GLOBALS['%s']->pop();
	}}
	public function createRandomUser() {
		$GLOBALS['%s']->push("DBStart::createRandomUser");
		$__hx__spos = $GLOBALS['%s']->length;
		$_name = _hx_string_or_null(DBStart::$FIRST_NAMES[Std::random(DBStart::$FIRST_NAMES->length)]) . " " . _hx_string_or_null(DBStart::$SUR_NAMES[Std::random(DBStart::$SUR_NAMES->length)]);
		$_phone = "020 - " . _hx_string_rec(Std::random(10), "") . _hx_string_rec(Std::random(10), "") . _hx_string_rec(Std::random(10), "") . " " . _hx_string_rec(Std::random(10), "") . _hx_string_rec(Std::random(10), "") . " " . _hx_string_rec(Std::random(10), "") . _hx_string_rec(Std::random(10), "");
		$_birthday = new Date(Std::random(100) + 1900, Std::random(12), Std::random(30), 0, 0, 0);
		$user = new User();
		$user->name = $_name;
		$user->phoneNumber = $_phone;
		$user->birthday = $_birthday;
		{
			$GLOBALS['%s']->pop();
			return $user;
		}
		$GLOBALS['%s']->pop();
	}
	static $FIRST_NAMES;
	static $SUR_NAMES;
	function __toString() { return 'DBStart'; }
}
DBStart::$FIRST_NAMES = (new _hx_array(array("Elina", "Martin", "Lowell", "Corazon", "Diedre", "Slyvia", "Latrice", "Chantell", "Jeff", "Zulma", "Deonna", "Kortney", "Sunshine", "Alysa", "Zane", "Shaina", "Queenie", "Ingeborg", "Jarrod", "Angle")));
DBStart::$SUR_NAMES = (new _hx_array(array("De Jong", "Jansen", "De Vries", "Van den Berg ", "Van Dijk", "Bakker", "Janssen", "Visser", "Smit", "Meijer", "De Boer", "Mulder", "De Groot", "Bos", "Vos", "Peters", "Hendriks", "Van Leeuwen", "Dekker", "Brouwer", "De Wit", "Dijkstra", "Smits", "De Graaf", "Van der Meer")));
