<?php

class Main {
	public function __construct() { if(!php_Boot::$skip_constructor) {
		$this->getUrl("https://api.nasa.gov/planetary/apod?api_key=DEMO_KEY&date=" . _hx_string_or_null($this->getCurrentDate()), false);
	}}
	public function getUrl($url, $isPost = null) {
		if($isPost === null) {
			$isPost = false;
		}
		$_g = $this;
		$req = new haxe_Http($url);
		$req->onData = array(new _hx_lambda(array(&$_g, &$isPost, &$req, &$url), "Main_0"), 'execute');
		$req->onError = array(new _hx_lambda(array(&$_g, &$isPost, &$req, &$url), "Main_1"), 'execute');
		$req->onStatus = array(new _hx_lambda(array(&$_g, &$isPost, &$req, &$url), "Main_2"), 'execute');
		$req->request($isPost);
	}
	public function showImage($data) {
		php_Lib::hprint("<img src=\"" . _hx_string_or_null($data->hdurl) . "\" alt=\"" . _hx_string_or_null($data->title) . "\">");
	}
	public function getCurrentDate() {
		$date = Date::now();
		$year = $date->getFullYear();
		$month = $date->getMonth() + 1;
		$day = $date->getDate();
		return _hx_string_rec($year, "") . "-" . _hx_string_or_null(Main_3($this, $date, $day, $month, $year)) . "-" . _hx_string_or_null(Main_4($this, $date, $day, $month, $year));
	}
	static function main() {
		$main = new Main();
	}
	function __toString() { return 'Main'; }
}
function Main_0(&$_g, &$isPost, &$req, &$url, $data) {
	{
		try {
			$json = haxe_Json::phpJsonDecode($data);
			$_g->showImage($json);
		}catch(Exception $__hx__e) {
			$_ex_ = ($__hx__e instanceof HException) ? $__hx__e->e : $__hx__e;
			$e = $_ex_;
			{
				haxe_Log::trace($e, _hx_anonymous(array("fileName" => "Main.hx", "lineNumber" => 26, "className" => "Main", "methodName" => "getUrl")));
			}
		}
	}
}
function Main_1(&$_g, &$isPost, &$req, &$url, $error) {
	{
		haxe_Log::trace("error: " . _hx_string_or_null($error), _hx_anonymous(array("fileName" => "Main.hx", "lineNumber" => 32, "className" => "Main", "methodName" => "getUrl")));
	}
}
function Main_2(&$_g, &$isPost, &$req, &$url, $status) {
	{}
}
function Main_3(&$__hx__this, &$date, &$day, &$month, &$year) {
	{
		$s = Std::string($month);
		if(strlen("0") === 0 || strlen($s) >= 2) {
			return $s;
		} else {
			return str_pad($s, Math::ceil((2 - strlen($s)) / strlen("0")) * strlen("0") + strlen($s), "0", STR_PAD_LEFT);
		}
		unset($s);
	}
}
function Main_4(&$__hx__this, &$date, &$day, &$month, &$year) {
	{
		$s1 = Std::string($day);
		if(strlen("0") === 0 || strlen($s1) >= 2) {
			return $s1;
		} else {
			return str_pad($s1, Math::ceil((2 - strlen($s1)) / strlen("0")) * strlen("0") + strlen($s1), "0", STR_PAD_LEFT);
		}
		unset($s1);
	}
}
