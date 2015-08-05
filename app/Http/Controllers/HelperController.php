<?php namespace App\Http\Controllers;


class HelperController extends Controller {
	
	public static function Paginador($query , $count_items, $current_page){
		$total 			= count($query);
		$pages 			= ceil($total / $count_items);
		//print_r($query);
		if ($current_page>$pages){
			$current_page = 1;
		}		
		$index_start 	= ($current_page-1) * $count_items; 
		$consulta 		= array_slice($query, $index_start, $count_items);

		$data 			=(object) ["consulta"  		=> $consulta, 
								   "pages" 	 		=> $pages,
								   "current_page" 	=> $current_page,
									 ];
		return $data;
	}
}
