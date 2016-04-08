<?php

interface sys_db_Connection {
	function request($s);
	function close();
	function addValue($s, $v);
	function lastInsertId();
	function dbName();
}
