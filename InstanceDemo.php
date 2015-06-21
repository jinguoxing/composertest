<?php namespace KingNet\ComposerTest;

/**
* $_instance必须声明为静态的私有变量
* 构造函数和析构函数必须声明为私有,防止外部程序new
* 类从而失去单例模式的意义
* getInstance()方法必须设置为公有的,必须调用此方法
* 以返回实例的一个引用
* ::操作符只能访问静态变量和静态函数
* new对象都会消耗内存
* 使用场景:最常用的地方是数据库连接。 
* 使用单例模式生成一个对象后，
* 该对象可以被其它众多对象所使用。 
*/
class InstanceDemo {
 
	//保存类实例的静态成员变量
	private static $_instance;
	 
	//private标记的构造方法
	private function __construct()
	{
		echo 'This is a Constructed method;';
	}
	 
	//创建__clone方法防止对象被复制克隆
	public function __clone(){
		trigger_error('Clone is not allow!',E_USER_ERROR);
	}
	 
	//单例方法,用于访问实例的公共的静态方法
	public static function getInstance(){
		if(!(self::$_instance instanceof self)){
			self::$_instance = new self;
		}
		return self::$_instance;
	}
	 
	public function test(){
		echo '调用方法成功';
	}
 
}

//调用方法
//正确方法,用双冒号::操作符访问静态方法获取实例
$demo = InstanceDemo::getInstance();
$demo->test();