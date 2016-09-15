<?php

use Product\Product;
use Customer\AbstractCustomer;
require_once 'autoload.php';

$cheese = new Product('Cheese', 10, 100);
$milk = new Product('Milk', 2, 100);
$bread = new Product('Bread', 1, 100);

Shop::getInstance()->addProducts([$cheese, $milk, $bread]);

Shop::getInstance()->getInventory();
$poparaProducts = [
	[
		'name' => 'Cheese',
		'quantity' => 1
	],
	[
		'name' => 'Bread',
		'quantity' => 1,
	],
	[
		'name' => 'Milk',
		'quantity' => 1,
	],
];

Shop::getInstance()->makeBundle('Popara', $poparaProducts, 5);

Shop::getInstance()->addCustomer('Ivan Ivanov', AbstractCustomer::TYPE_RETAIL_CUSTOMER, 10);
Shop::getInstance()->addCustomer('Georgi Georgiev', AbstractCustomer::TYPE_WHOLESALE_CUSTOMER, 10);

Shop::getInstance()->makeCustomersBuy();
Shop::getInstance()->makeRevision();
Shop::getInstance()->cacheDeskRevision();
Shop::getInstance()->getInventory();
