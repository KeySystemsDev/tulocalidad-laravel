<?php namespace App;

class Reset_Clave {
	private $cadena;
	private $longitud;
	private $pass;
	public function __construct(){
		$this->cadena = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
		$this->pass   = '';
	}

	public function NuevaPass($long){
		$long_cadena=strlen($this->cadena);//retorna el numero de caracteres que le pasas a strlen
		$this->longitud = $long;
		for ($i=0; $i <$this->longitud; $i++) { 
			$aleatorio  = mt_rand(0,$long_cadena);//genera un numero aleatorio en el rango descrito en el mt_rand
			$this->pass .=substr($this->cadena, $aleatorio,1);//funcion que retorna N caracteres en la posicion N  
		}
		return $this->pass;
	}
}