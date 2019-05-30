<?php

require("ado.php");

class VueInscription {
	public $ado;
	public $client;
	
	function __construct() {
		$this->ado = new Inscription_ADO();
	}
	
	function inscription($data){
		$this->ado->inscription($data);
	}
}

?>