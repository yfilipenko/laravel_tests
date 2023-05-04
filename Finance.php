<?php 
class Finance {
	private $transactions;
	private $user_name;
	private $date_from;
	private $date_to;
	
	public function __construct($transactions, $user_name, $date_from='0', $date_to='0'){
		$this->transactions = $transactions;
		$this->user_name = $user_name;
		$this->date_from = $date_from;
		$this->date_to = $date_to;
	}
	
	public function checkDate($date){
		$date = date('Ymd', strtotime($date));
		if( $this->date_to == 0 ):
			$date_to = date('Ymd');
		else:
			$date_to = date('Ymd', strtotime($this->date_to));
		endif;
		$date_from = date('Ymd', strtotime($this->date_from));
		
		if( $date >= $date_from and $date <= $date_to ):
			return true;
		else:
			return false;
		endif;
	}
	
	public function getUserTransactions(){
		$user_transactions = array(); 
		foreach( $this->transactions as $item ): 
			if( $this->checkDate($item['date']) ):
				if( isset($item['user']) and $item['user'] == $this->user_name ):
					$user_transactions[] = $item;
				endif;
			endif;
		endforeach;
		if( !empty($user_transactions) ):
			return $user_transactions;
		else:
			return false;
		endif;
	}
	
	public function getIncome(){
		$user_transactions = $this->getUserTransactions();
		$income = '';
		if( !empty($user_transactions) ):
			foreach( $user_transactions as $item ):
				if( isset($item['type']) and  $item['type'] == 'income'):
					$income = $income + $item['value']; 
				endif;
			endforeach;
		endif;
		return $income;
	}
	
	public function getConsumption(){
		$user_transactions = $this->getUserTransactions();
		$consumption = '';
		foreach( $user_transactions as $item ):
			if( isset($item['type']) and $item['type'] == 'consumption'):
				$consumption = $consumption + $item['value'];
			endif;
		endforeach;
		return $consumption;
	}
	
	public function getBalance(){
		return ($this->getIncome() - $this->getConsumption());
	}
}
