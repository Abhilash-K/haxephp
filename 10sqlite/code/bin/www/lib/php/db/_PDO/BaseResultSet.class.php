<?php

class php_db__PDO_BaseResultSet implements sys_db_ResultSet{
	public function __construct($pdo, $typeStrategy) {
		if(!php_Boot::$skip_constructor) {
		$GLOBALS['%s']->push("php.db._PDO.BaseResultSet::new");
		$__hx__spos = $GLOBALS['%s']->length;
		$this->pdo = $pdo;
		$this->typeStrategy = $typeStrategy;
		$this->_fields = $pdo->columnCount();
		$this->_columnNames = (new _hx_array(array()));
		$this->_columnTypes = (new _hx_array(array()));
		$this->feedColumns();
		$GLOBALS['%s']->pop();
	}}
	public $pdo;
	public $typeStrategy;
	public $_fields;
	public $_columnNames;
	public $_columnTypes;
	public function feedColumns() {
		$GLOBALS['%s']->push("php.db._PDO.BaseResultSet::feedColumns");
		$__hx__spos = $GLOBALS['%s']->length;
		$_g1 = 0;
		$_g = $this->_fields;
		while($_g1 < $_g) {
			$i = $_g1++;
			$data = $this->pdo->getColumnMeta($i);
			$this->_columnNames->push($data["name"]);
			$this->_columnTypes->push($this->typeStrategy->map($data));
			unset($i,$data);
		}
		$GLOBALS['%s']->pop();
	}
	public function hasNext() {
		$GLOBALS['%s']->push("php.db._PDO.BaseResultSet::hasNext");
		$__hx__spos = $GLOBALS['%s']->length;
		throw new HException("must override");
		$GLOBALS['%s']->pop();
	}
	public function nextRow() {
		$GLOBALS['%s']->push("php.db._PDO.BaseResultSet::nextRow");
		$__hx__spos = $GLOBALS['%s']->length;
		throw new HException("must override");
		$GLOBALS['%s']->pop();
	}
	public function next() {
		$GLOBALS['%s']->push("php.db._PDO.BaseResultSet::next");
		$__hx__spos = $GLOBALS['%s']->length;
		$row = $this->nextRow();
		$o = _hx_anonymous(array());
		{
			$_g1 = 0;
			$_g = $this->_fields;
			while($_g1 < $_g) {
				$i = $_g1++;
				$value = php_db__PDO_TypeStrategy::convert($row[$i], $this->_columnTypes[$i]);
				$o->{$this->_columnNames[$i]} = $value;
				unset($value,$i);
			}
		}
		{
			$GLOBALS['%s']->pop();
			return $o;
		}
		$GLOBALS['%s']->pop();
	}
	public function results() {
		$GLOBALS['%s']->push("php.db._PDO.BaseResultSet::results");
		$__hx__spos = $GLOBALS['%s']->length;
		$list = new HList();
		while($this->hasNext()) {
			$list->add($this->next());
		}
		{
			$GLOBALS['%s']->pop();
			return $list;
		}
		$GLOBALS['%s']->pop();
	}
	public function __call($m, $a) {
		if(isset($this->$m) && is_callable($this->$m))
			return call_user_func_array($this->$m, $a);
		else if(isset($this->__dynamics[$m]) && is_callable($this->__dynamics[$m]))
			return call_user_func_array($this->__dynamics[$m], $a);
		else if('toString' == $m)
			return $this->__toString();
		else
			throw new HException('Unable to call <'.$m.'>');
	}
	function __toString() { return 'php.db._PDO.BaseResultSet'; }
}
