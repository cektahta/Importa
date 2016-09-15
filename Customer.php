<?php

namespace Customer;

use Product\Product;
class Customer extends AbstractCustomer
{
	public function getType() 
	{
		return AbstractCustomer::TYPE_RETAIL_CUSTOMER;	
	}
}