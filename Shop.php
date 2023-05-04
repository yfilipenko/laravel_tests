<?php 
class Shop {
	private $shop_name;
	private $address;
	private $products = array();
	
	public function __construct($shop_name, $address, $products){
		$this->shop_name = $shop_name;
		$this->address = $address;
		$this->products = $products;
	}
	
	public function addProduct($product){
		$this->products[] = $product;
	}
	
	public function removeProduct($product){
		if( in_array($product, $this->products) ):
			unset($this->products[array_search($product,$this->products)]);
		endif;
	}
	
	public function getProducts(){
		return $this->products;
	}
}

$objShop = new Shop('Books Shop', '54 Baker Street, London, W1U 7BU', array('Book1', 'Book2', 'Book3'));

$objShop->addProduct('Book4');
$objShop->addProduct('Book5');
$objShop->removeProduct('Book3');
$products = $objShop->getProducts();

foreach( $products as $item ):
	echo $item;
endforeach;
