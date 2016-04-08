<?php

class sys_db_TableCreate {
	public function __construct(){}
	static function autoInc($dbName) {
		$GLOBALS['%s']->push("sys.db.TableCreate::autoInc");
		$__hx__spos = $GLOBALS['%s']->length;
		if($dbName === "SQLite") {
			$GLOBALS['%s']->pop();
			return "PRIMARY KEY AUTOINCREMENT";
		} else {
			$GLOBALS['%s']->pop();
			return "AUTO_INCREMENT";
		}
		$GLOBALS['%s']->pop();
	}
	static function getTypeSQL($t, $dbName) {
		$GLOBALS['%s']->push("sys.db.TableCreate::getTypeSQL");
		$__hx__spos = $GLOBALS['%s']->length;
		switch($t->index) {
		case 0:{
			$tmp = "INTEGER " . _hx_string_or_null(sys_db_TableCreate::autoInc($dbName));
			$GLOBALS['%s']->pop();
			return $tmp;
		}break;
		case 2:{
			$tmp = "INTEGER UNSIGNED " . _hx_string_or_null(sys_db_TableCreate::autoInc($dbName));
			$GLOBALS['%s']->pop();
			return $tmp;
		}break;
		case 1:case 20:{
			$GLOBALS['%s']->pop();
			return "INTEGER";
		}break;
		case 3:{
			$GLOBALS['%s']->pop();
			return "INTEGER UNSIGNED";
		}break;
		case 24:{
			$GLOBALS['%s']->pop();
			return "TINYINT";
		}break;
		case 25:case 31:{
			$GLOBALS['%s']->pop();
			return "TINYINT UNSIGNED";
		}break;
		case 26:{
			$GLOBALS['%s']->pop();
			return "SMALLINT";
		}break;
		case 27:{
			$GLOBALS['%s']->pop();
			return "SMALLINT UNSIGNED";
		}break;
		case 28:{
			$GLOBALS['%s']->pop();
			return "MEDIUMINT";
		}break;
		case 29:{
			$GLOBALS['%s']->pop();
			return "MEDIUMINT UNSIGNED";
		}break;
		case 6:{
			$GLOBALS['%s']->pop();
			return "FLOAT";
		}break;
		case 7:{
			$GLOBALS['%s']->pop();
			return "DOUBLE";
		}break;
		case 8:{
			$GLOBALS['%s']->pop();
			return "TINYINT(1)";
		}break;
		case 9:{
			$n = _hx_deref($t)->params[0];
			{
				$tmp = "VARCHAR(" . _hx_string_rec($n, "") . ")";
				$GLOBALS['%s']->pop();
				return $tmp;
			}
		}break;
		case 10:{
			$GLOBALS['%s']->pop();
			return "DATE";
		}break;
		case 11:{
			$GLOBALS['%s']->pop();
			return "DATETIME";
		}break;
		case 12:{
			$GLOBALS['%s']->pop();
			return "TIMESTAMP DEFAULT 0";
		}break;
		case 13:{
			$GLOBALS['%s']->pop();
			return "TINYTEXT";
		}break;
		case 14:{
			$GLOBALS['%s']->pop();
			return "TEXT";
		}break;
		case 15:case 21:{
			$GLOBALS['%s']->pop();
			return "MEDIUMTEXT";
		}break;
		case 16:{
			$GLOBALS['%s']->pop();
			return "BLOB";
		}break;
		case 18:case 22:case 30:{
			$GLOBALS['%s']->pop();
			return "MEDIUMBLOB";
		}break;
		case 17:{
			$GLOBALS['%s']->pop();
			return "LONGBLOB";
		}break;
		case 5:{
			$GLOBALS['%s']->pop();
			return "BIGINT";
		}break;
		case 4:{
			$tmp = "BIGINT " . _hx_string_or_null(sys_db_TableCreate::autoInc($dbName));
			$GLOBALS['%s']->pop();
			return $tmp;
		}break;
		case 19:{
			$n1 = _hx_deref($t)->params[0];
			{
				$tmp = "BINARY(" . _hx_string_rec($n1, "") . ")";
				$GLOBALS['%s']->pop();
				return $tmp;
			}
		}break;
		case 23:{
			$auto = _hx_deref($t)->params[1];
			$fl = _hx_deref($t)->params[0];
			{
				$tmp = sys_db_TableCreate::getTypeSQL((($auto) ? (($fl->length <= 8) ? sys_db_RecordType::$DTinyUInt : (($fl->length <= 16) ? sys_db_RecordType::$DSmallUInt : (($fl->length <= 24) ? sys_db_RecordType::$DMediumUInt : sys_db_RecordType::$DInt))) : sys_db_RecordType::$DInt), $dbName);
				$GLOBALS['%s']->pop();
				return $tmp;
			}
		}break;
		case 33:case 32:{
			throw new HException("assert");
		}break;
		}
		$GLOBALS['%s']->pop();
	}
	static function create($manager, $engine = null) {
		$GLOBALS['%s']->push("sys.db.TableCreate::create");
		$__hx__spos = $GLOBALS['%s']->length;
		$quote = array(new _hx_lambda(array(&$engine, &$manager), "sys_db_TableCreate_0"), 'execute');
		$cnx = $manager->getCnx();
		if($cnx === null) {
			throw new HException("SQL Connection not initialized on Manager");
		}
		$dbName = $cnx->dbName();
		$infos = $manager->dbInfos();
		$sql = "CREATE TABLE " . _hx_string_or_null(call_user_func_array($quote, array($infos->name))) . " (";
		$decls = (new _hx_array(array()));
		$hasID = false;
		{
			$_g = 0;
			$_g1 = $infos->fields;
			while($_g < $_g1->length) {
				$f = $_g1[$_g];
				++$_g;
				{
					$_g2 = $f->t;
					switch($_g2->index) {
					case 0:{
						$hasID = true;
					}break;
					case 2:case 4:{
						$hasID = true;
						if($dbName === "SQLite") {
							throw new HException("S" . _hx_string_or_null(_hx_substr(Std::string($f->t), 1, null)) . " is not supported by " . _hx_string_or_null($dbName) . " : use SId instead");
						}
					}break;
					default:{}break;
					}
					unset($_g2);
				}
				$decls->push(_hx_string_or_null(call_user_func_array($quote, array($f->name))) . " " . _hx_string_or_null(sys_db_TableCreate::getTypeSQL($f->t, $dbName)) . _hx_string_or_null(((($f->isNull) ? "" : " NOT NULL"))));
				unset($f);
			}
		}
		if($dbName !== "SQLite" || !$hasID) {
			$decls->push("PRIMARY KEY (" . _hx_string_or_null(Lambda::map($infos->key, $quote)->join(",")) . ")");
		}
		$sql .= _hx_string_or_null($decls->join(","));
		$sql .= ")";
		if($engine !== null) {
			$sql .= "ENGINE=" . _hx_string_or_null($engine);
		}
		$cnx->request($sql);
		$GLOBALS['%s']->pop();
	}
	static function exists($manager) {
		$GLOBALS['%s']->push("sys.db.TableCreate::exists");
		$__hx__spos = $GLOBALS['%s']->length;
		$cnx = $manager->getCnx();
		if($cnx === null) {
			throw new HException("SQL Connection not initialized on Manager");
		}
		try {
			$cnx->request("SELECT * FROM `" . _hx_string_or_null($manager->dbInfos()->name) . "` LIMIT 1");
			{
				$GLOBALS['%s']->pop();
				return true;
			}
		}catch(Exception $__hx__e) {
			$_ex_ = ($__hx__e instanceof HException) ? $__hx__e->e : $__hx__e;
			$e = $_ex_;
			{
				$GLOBALS['%e'] = (new _hx_array(array()));
				while($GLOBALS['%s']->length >= $__hx__spos) {
					$GLOBALS['%e']->unshift($GLOBALS['%s']->pop());
				}
				$GLOBALS['%s']->push($GLOBALS['%e'][0]);
				{
					$GLOBALS['%s']->pop();
					return false;
				}
			}
		}
		$GLOBALS['%s']->pop();
	}
	function __toString() { return 'sys.db.TableCreate'; }
}
function sys_db_TableCreate_0(&$engine, &$manager, $v) {
	{
		$GLOBALS['%s']->push("sys.db.TableCreate::create@66");
		$__hx__spos2 = $GLOBALS['%s']->length;
		{
			$tmp = $manager->quoteField($v);
			$GLOBALS['%s']->pop();
			return $tmp;
		}
		$GLOBALS['%s']->pop();
	}
}
