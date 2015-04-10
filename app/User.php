<?php namespace App;

class User{
	public static function all(){
		
		return DB::query('SELECT * FROM users');
	}
}