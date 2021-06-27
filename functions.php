<?php
function decryptPassword($s) {
    $arrayOfNumbers = array();
    $arrayOfRest = array();
	$stringArray = str_split($s,1);
	
    for($i=0; $i<count($stringArray); $i++){
        if(is_numeric($stringArray[$i]) && $stringArray[$i] > 0){
            array_push($arrayOfNumbers, $stringArray[$i]);
        }else{
            array_push($arrayOfRest,$stringArray[$i]);
		}
    } 
	
    for($i=0; $i<count($arrayOfRest);$i++){
        if($arrayOfRest[$i] == "*"){
			$firstSwap = $arrayOfRest[$i-1];
			$secondSwap = $arrayOfRest[$i-2];
			$arrayOfRest[$i-1] = $secondSwap;
			$arrayOfRest[$i-2] = $firstSwap;
        }
        if($arrayOfRest[$i]=="0" && count($arrayOfNumbers) > 0 ){
            $k = count($arrayOfNumbers)-1;
            $arrayOfRest[$i] = $arrayOfNumbers[$k];
            unset($arrayOfNumbers[$k]);
        }    
    }
        $myPassWord = implode("",$arrayOfRest);
        $myPassWord = str_replace("*", "",$myPassWord);
        return $myPassWord; 
}
?>
