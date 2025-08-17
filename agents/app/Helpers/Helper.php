<?php // Code within app\Helpers\Helper.php

namespace App\Helpers;

use App\Models\Agent;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class Helper
{
    public static function combansw($str)
	{
		$str1 = "";
		  switch ($str) {		  
			case 'rchtrains':
			  $str1 = "сервис недоступен";
			  break;			  
			case 'мест нет.':
			  $str1 = "мест нет";
			  break;
			case 'не ходит.':
			  $str1 = "не ходит";
			  break;
			case 'корректно':
			  $str1 = "нет данных";
			  break;
			case '---------':
			  $str1 = "";
			  break;	
			default:
			  $str1 = $str;		  
		  }
		  return $str1;
	}	
    public static function mark($var)
	{
		// является ли переданное число четным
		return !($var & 1);
	}
    public static function mark2($var)
	{
		// является ли переданное число четным
		return !($var % 2);
	}	
    public static function numer($str)
	{
		// оставить только цифры
		$strWithoutChars = preg_replace('/[^0-9]/', '', $str);
		return (int) $strWithoutChars;
	}
    public static function talgon($str)
	{
		$str1 = "";
		  switch ($str) {
			case '97С':
			  $str1 = "Тальго";
			  break;
			case '106С':
			  $str1 = "Тальго";
			  break;
			case '71К':
			  $str1 = "Тальго Турист";
			  break;
			case '85К':
			  $str1 = "Тальго Турист";
			  break;
			case '31Л':
			  $str1 = "Тальго Бизнес";
			  break;
			case '41Л':
			  $str1 = "Тальго Бизнес";
			  break;	
			case '27Л':
			  $str1 = "Тальго Гранд";
			  break;
			case '37Л':
			  $str1 = "Тальго Гранд";
			  break;
			case '72К':
			  $str1 = "Тальго Гранд PMR (с душем)";
			  break;		
			default:
			  $str1 = "";		  
		  }
		  return $str1;
	}	
    public static function vag_class($str)
	{
		$str1 = 0;
		  switch ($str) {
			case '3Я':
			  $str1 = 333;
			  break;			  
			case '1С':
			  $str1 = 11;
			  break;
			case '2С':
			  $str1 = 11;
			  break;			  
			case '3С':
			  $str1 = 11;
			  break;			  
			default:
			  $str1 = 5;		  
		  }
		  return $str1;
	}		
    public static function vag_types($str)
	{
		$str1 = 0;
		  switch ($str) {			  
			case '01Л':
			  $str1 = 1;
			  break;			  			  			  
			case '18М':
			  $str1 = 2;
			  break;			  			  
			case '71К':
			  $str1 = 2;
			  break;
			case '85К':
			  $str1 = 2;
			  break;			  
			case '31Л':
			  $str1 = 2;
			  break;
			case '41Л':
			  $str1 = 2;
			  break;			  
			case '27Л':
			  $str1 = 2;
			  break;
			case '37Л':
			  $str1 = 2;
			  break;			  
			case '72К':
			  $str1 = 2;
			  break;  
			case '97С':
			  $str1 = 11;
			  break;
			case '106С':
			  $str1 = 11;
			  break;
			case '79К':
			  $str1 = 2;
			  break;
			case '44П':
			  $str1 = 2;
			  break;
			case '77К':
			  $str1 = 2;
			  break;
			case '66К':
			  $str1 = 2;
			  break;	
			case '67К':
			  $str1 = 2;
			  break;
			case '1К':
			  $str1 = 2;
			  break;
			case '40К':
			  $str1 = 2;
			  break;
			case '41П':
			  $str1 = 2;
			  break;
			case '61П':
			  $str1 = 3;
			  break;	
			case '1Л':
			  $str1 = 1;
			  break;
			case '4Л':
			  $str1 = 1;
			  break;
			case '83О':
			  $str1 = 333;
			  break;	
			case '84К':
			  $str1 = 2;
			  break;
			case '73К':
			  $str1 = 33;
			  break;
			case '83К':
			  $str1 = 2;
			  break;
			case '69К':
			  $str1 = 2;
			  break;
			case '32К':
			  $str1 = 2;
			  break;	
			case '68К':
			  $str1 = 2;
			  break;  
			default:
			  $str1 = 5;		  
		  }
		  return $str1;
	}	
    public static function place_types333($str)
	{
		$a =  array(1, 4, 7, 10, 13, 16, 19, 22, 25, 28, 31, 34, 37, 40, 43, 46, 49, 52);							
		$b =  array(2, 5, 8, 11, 14, 17, 20, 23, 26, 29, 32, 35, 38, 41, 44, 47, 50, 53);							
		$c =  array(3, 6, 9, 12, 15, 18, 21, 24, 27, 30, 33, 36, 39, 42, 45, 48, 51, 54);
		
		$d1 =  array(55, 57, 59, 61, 63, 65, 67, 69, 71, 73, 75, 77, 79, 81);	
		$d2 =  array(56, 58, 60, 62, 64, 66, 68, 70, 72, 74, 76, 78, 80, 82);		
		
		if (in_array($str, $a)) return 'v';
		if (in_array($str, $b)) return 's';
		if (in_array($str, $c)) return 'n';
		if (in_array($str, $d1)) return 'd1';		
		if (in_array($str, $d2)) return 'd2';			
		return '';
	}		
    public static function place_types3($str)
	{
		$a =  array(1, 4, 7, 10, 13, 16, 19, 22, 25, 28, 31, 34, 37, 40, 43, 46, 49, 52, 55, 58, 61, 64, 67, 70, 73, 76, 79, 82, 85, 88, 91, 94, 97, 100, 103, 106, 109, 112);							
		$b =  array(2, 5, 8, 11, 14, 17, 20, 23, 26, 29, 32, 35, 38, 41, 44, 47, 50, 53, 56, 59, 62, 65, 68, 71, 74, 77, 80, 83, 86, 89, 92, 95, 98, 101, 104, 107, 110, 113);							
		$c =  array(3, 6, 9, 12, 15, 18, 21, 24, 27, 30, 33, 36, 39, 42, 45, 48, 51, 54, 57, 60, 63, 66, 69, 72, 75, 78, 81, 84, 87, 90, 93, 96, 99, 102, 105, 108, 111, 114);
		
		if (in_array($str, $a)) return 'n';
		if (in_array($str, $b)) return 's';
		if (in_array($str, $c)) return 'v';
		return '';
	}		
    public static function place_types33($str)
	{
		$a =  array(11, 12, 21, 22, 31, 32, 41, 42, 51, 52);							
		$b =  array(13, 14, 23, 24, 33, 34, 43, 44, 53, 54);							
		$c =  array(15, 16, 25, 26, 35, 36, 45, 46, 55, 56);
		
		if (in_array($str, $a)) return 'n';
		if (in_array($str, $b)) return 's';
		if (in_array($str, $c)) return 'v';
		return '';		
	}	
    public function agent_prof(){

        $user = Auth::user();
        $agent = Agent::find($user->agent_id);
		if ($agent != null)
		{   
			$commission = $agent->commission; 
			$own_commission = $agent->own_commission; 			
		}
		else 
		{ 
			$commission = 0;
			$own_commission = 0; 			
		}

        return [$commission, $own_commission];
    }	
}