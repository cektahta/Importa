<?php

use Product\Product;
use Product\BundleProduct;
use Customer\Customer;
use CashDesk\CashDesk;
use Customer\AbstractCustomer;
class Shop
{
	protected static $instance;
	
	protected $name;
	
	protected $products;
	
	protected $soldProducts;
	
	protected $customers;
	
	protected $cashDesks;
	
	protected function __construct($name)
	{
		$this->products = [];
		$this->customers = [];
		$this->cashDesks = [
			new CashDesk('Kasa 1', $this),	
			new CashDesk('Kasa 2', $this),
			new CashDesk('Kasa 3', $this),
		];
		
		$this->soldProducts = [];
	}
	
	public static function getInstance()
	{
		if (is_null(self::$instance)) {
			self::$instance = new self('Billa');
		}
		
		return self::$instance;
	}
	
	public function getName()
	{
		return $this->name;
	}
	
	public function addProduct(Product $product)
	{
		if (isset($this->products[$product->getName()])) {
			$existing = $this->products[$product->getName()];
			$existing->setQuantity($existing->getQuantity() + $product->getQuantity());
		} else {
			$this->products[$product->getName()] = $product;			
		}
	}
	
	public function addProducts($products) 
	{
		foreach ($products as $product) {
			$this->addProduct($product);
		}
	}
	
	public function getProduct($name) 
	{
		if (empty($this->products[$name])) {
			throw new Exception('Invalid product name ' . $name);
		}
		
		return $this->products[$name];
	}
	
	public function getInventory() 
	{
		echo str_repeat('-', 10), 'Inventory', str_repeat('-', 10), PHP_EOL;
		$this->listProducts($this->products);
	}
	
	protected function listProducts($products)
	{
		foreach ($products as $product) {
			echo sprintf('%s %05d %05d %05d',
					str_pad($product->getName(), 20, ' ', STR_PAD_RIGHT),
					$product->getPrice(),
					$product->getQuantity(),
					$product->getTotalPrice()
			), PHP_EOL;
		}
	}
	/**
	 * 
	 * @param array $products - ['name' => 'Cheese', 'quantity' => 1]
	 * @param unknown $quantity 
	 */
	public function makeBundle($name, $products, $quantity) 
	{
		foreach ($products as $key => $value) {
			$products[$key]['product'] = 
				$this->getProduct($value['name']);
		}
		
		$bundle = BundleProduct::factory($name, $quantity, $products);
		
		$this->addProduct($bundle);
	}
	
	public function addCustomer($name, $customerType, $money = 0)
	{
		$customer = AbstractCustomer::factory($name, $customerType, $money);
		
		$this->customers[$customer->getName()] = $customer;
	}
	
	public function makeCustomersBuy()
	{
		foreach ($this->customers as $key => $customer) {
			$product = $this->getRandomProduct();
			$quantity = $this->getRandomQuantity($product->getQuantity());
			
			$customer->addProduct($product, $quantity);
			
			$desk = $this->getRandomCasheDesk();
			try {
				$desk->makePayment($customer);				
			} catch (Exception $e) {
				echo $e->getMessage(), PHP_EOL;
				$this->addProducts($customer->getProducts());
			}
			
			unset($this->customers[$key]);
		}

	}
	
	protected function getRandomProduct()
	{
		$key = array_rand($this->products, 1);
		
		return $this->products[$key];
	}
	
	protected function getRandomQuantity($max)
	{
		return rand(1, $max);
	}
	
	protected function getRandomCasheDesk()
	{
		$key = array_rand($this->cashDesks, 1);
		
		return $this->cashDesks[$key];
	}
	
	public function addSoldProduct(Product $product)
	{
		if (isset($this->soldProducts[$product->getName()])) {
			$existingProduct = $this->soldProducts[$product->getName()];
			$existingProduct->setQuantity($existingProduct->getQuantity() + $product->getQuantity());
		} else {
			$this->soldProducts[$product->getName()] = $product;
		}
	}
	
	public function makeRevision()
	{
		echo str_repeat('-', 10), 'Revision', str_repeat('-', 10), PHP_EOL;
		$this->listProducts($this->soldProducts);
	}
	
	public function cacheDeskRevision()
	{
		echo str_repeat('-', 10), 'Desk Revision', str_repeat('-', 10), PHP_EOL;
		foreach ($this->cashDesks as $cashDesk) {
			echo $cashDesk->getInfo(), PHP_EOL;
		}
	}
}