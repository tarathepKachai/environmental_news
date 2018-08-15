<?php

class custom
{
    function ThaiDtm($format,$date){
		
		$year=substr($date,0,4);
		$m=substr($date,5,2);
		$d=substr($date,8,2);
		$Y=$year+543;
		$time=substr($date,11);
		
		if(empty($date)){
			return "-";
		}elseif($year=='0000' or $year=='0001'){
			return $date;
		}else{
			switch ($m) {
				case "01" : {
					$F="มกราคม";
					$M="ม.ค.";				
					$n="1";
				}break;
				case "02" : {				
					$F="กุมภาพันธ์";
					$M="ก.พ.";
					$n="2";
				}break;
				case "03" : {				
					$F="มีนาคม";
					$M="มี.ค.";
					$n="3";
				}break;
				case "04" : {
					$F="เมษายน";
					$M="เม.ย.";
					$n="4";
				}break;
				case "05" : {
					$F="พฤษภาคม";
					$M="พ.ค.";
					$n="5";
				}break;
				case "06" : {
					$F="มิถุนายน";
					$M="มิ.ย.";
					$n="6";
				}break;
				case "07" : {
					$F="กรกฎาคม";
					$M="ก.ค.";
					$n="7";
				}break;
				case "08" : {
					$F="สิงหาคม";
					$M="ส.ค.";
					$n="8";
				}break;
				case "09" : {
					$F="กันยายน";
					$M="ก.ย.";
					$n="9";
				}break;
				case "10" : {
					$F="ตุลาคม";
					$M="ต.ค.";
					$n="10";
				}break;
				case "11" : {
					$F="พฤศจิกายน";
					$M="พ.ย.";
					$n="11";
				}break;
				case "12" : {				
					$F="ธันวาคม";
					$M="ธ.ค.";
					$n="12";
				}break;			
			}
			$arrFormat=str_split($format);
			$thaiDate='';
			
			for($i=0;$i<count($arrFormat);$i++){
				switch($arrFormat[$i]){
					case "d":{
						$thaiDate.=$d;
					}break;
					case "j":{
						$j=$d*1;
						$thaiDate.=$j;
					}break;
					case "m":{
						$thaiDate.=$m;
					}break;
					case "M":{
						$thaiDate.=$M;
					}break;
					case "F":{
						$thaiDate.=$F;
					}break;
					case "n":{
						$thaiDate.=$n;
					}break;
					case "Y":{
						$thaiDate.=$Y;
					}break;
					case "y":{
						$y=substr($Y,2);
						$thaiDate.=$y;
					}break;
					default:{
						$thaiDate.=$arrFormat[$i];
					}
				}
				
			}
			if($time!=''){
				$thaiDate.=" ".$time;
			}		
			return $thaiDate;
		}
	}
    
    //=============== convert utf-8 to tis-620 =================
	function utf8tis620($string) {
	    $str = $string;
	    $res = "";
	    for ($i = 0; $i < strlen($str); $i++) {
	        if (ord($str[$i]) == 224) {
	            $unicode = ord($str[$i + 2]) & 0x3F;
	            $unicode |= (ord($str[$i + 1]) & 0x3F) << 6;
	            $unicode |= (ord($str[$i]) & 0x0F) << 12;
	            $res .= chr($unicode - 0x0E00 + 0xA0);
	            $i += 2;
	        } else {
	            $res .= $str[$i];
	        }
	    }
	    return $res;
	}

	//=============== convert tis-620 to utf-8 =================
	function tis2utf8($tis) {
	    $utf8 = "";
	    for ($i = 0; $i < strlen($tis); $i++) {
	        $s = substr($tis, $i, 1);
	        $val = ord($s);
	        if ($val < 0x80) {
	            $utf8 .= $s;
	        } elseif (( 0xA1 <= $val and $val <= 0xDA ) or ( 0xDF <= $val and $val <= 0xFB )) {
	            $unicode = 0x0E00 + $val - 0xA0;
	            $utf8 .= chr(0xE0 | ($unicode >> 12));
	            $utf8 .= chr(0x80 | (($unicode >> 6) & 0x3F));
	            $utf8 .= chr(0x80 | ($unicode & 0x3F));
	        }
	    }
	    return $utf8;
	}

	function convert_tis2utf8_2level($data){
		foreach ($data as $key => $value) {
       		foreach ($value as $keysub => $val) {
       			$value[$keysub] = tis2utf8($val);
       		}
       		$result[] = $value ;
       }
       return $result;
	}

	function convert_tis2utf8_3level($data){
		foreach ($data as $key => $value) {
       		foreach ($value as $keysub => $val) {
       			foreach ($val as $keysub1 => $val1) {
	       			$val[$keysub1] = tis2utf8($val1);
	       		}
	       		$value[$keysub] = $val ;
       		}
       		$result[] = $value ;
       }
	}
}