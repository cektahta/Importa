<?php
namespace Customer;

abstract class AbstractCustomer implements \IAddProduct
{
	const TYPE_RETAIL_CUSTOMER = 1;
	const TYPE_WHOLESALE_CUSTOMER = 2;
	
	use \AddProductTrait;
	
	protected $name;
	
	protected $money;
	
	public function __construct($name, $money = 0)
	{
		$this->products = [];
		$this->name = $name;
		$this->money = $money;
	}
	
	public function getName()
	{
		return $this->name;
	}
	
	public function getMoney()
	{
		return $this->money;
	}
	
	public function spend($amount)
	{
		$this->money -= $amount;
	}
	
	public static function factory($name, $type, $money)
	{
		if ($type == self::TYPE_RETAIL_CUSTOMER) {
			return new Customer($name, $money);
		} 
		
		if ($type == self::TYPE_WHOLESALE_CUSTOMER) {
			return new WholeSaleCustomer($name);
		}
		
		throw new \Exception('Unknow customer type');
	}
	
	abstract public function getType();
}