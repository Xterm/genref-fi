<?php

class Reference {

	var $number;

	public function __construct($number) {
		$number = str_pad($number, 3, "0");
		$this->number = $number;
	}

	public function generate() {
		$result = '';
		
		foreach (str_split($this->number . $this->countReference($this->number), 5) as $part) {
			$result = $result . $part;
		}
		return $result;
	}

	private function countReference($refnumber) {
		$multipliers = array(7,3,1);
		$length = strlen($refnumber);
		$refnumber = str_split($refnumber);
		$sum = 0;
		for ($i = $length - 1; $i >= 0; --$i) {
		  $sum += $refnumber[$i] * $multipliers[($length - 1 - $i) % 3];
		}
		return (10 - $sum % 10) % 10;
	}

}
