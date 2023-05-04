<?php

class Book {
	private $title;
	private $author;
	private $year;
	private $jenre;
	
	public function __construct($title, $author, $year, $jenre){
		$this->title = $title;
		$this->author = $author;
		$this->year = $year;
		$this->jenre = $jenre;
		
	}
	
	public function getAge(){
		return date('Y')-$this->year;
	}
	
	public function getSummary(){
		return $this->title.', '.$this->author.', '.$this->jenre.', '.$this->year;
	}
}

$objBook1 = new Book('Shadowghast', 'Thomas Taylor', '2021', 'Children\'s literature');
$objBook2 = new Book('Piranesi', 'Susanna Klark', '2020', 'Fantasy');

echo $objBook1->getAge();
echo $objBook1->getSummary();

echo $objBook2->getAge();
echo $objBook2->getSummary();
