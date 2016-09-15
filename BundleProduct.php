<?php
namespace Product;

class BundleProduct extends Product implements \IAddProduct
{
	const DISCOUNT = 0.1;
	
	use \AddProductTrait
	{
		getPrice as getPriceFromTrait;	
	}
	
	public function __construct($name, $quantity)
	{
		$this->products = [];
		parent::__construct($name, 0, $quantity);	
	}
	
	
	public function getPrice()
	{
		return $this->getPriceFromTrait() * (1 - self::DISCOUNT);
	}
	/**
	 * 
	 * @param unknown $name
	 * @param unknown $quantity
	 * @param unknown $products
	 * [
	 * 		'quantity' => 5,
	 * 		'product' => Product
	 * ]
	 */
	public static function factory($name, $quantity, $products)
	{
		$bundle = new BundleProduct($name, $quantity);
		
		foreach ($products as $value) {
			$quantity = $value['quantity'];
			$product = $value['product'];
			
			$bundle->addProduct($product, $quantity);
		}
		
		return $bundle;
	}
}