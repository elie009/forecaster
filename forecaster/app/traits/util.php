<?php
namespace App\Traits;


trait Util{
    
    public function dilimiter(){
        return (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN')? "\\":"/";
    }
    
    
    public function jsonDataFinder(array $arr, $key,$title){
      
        error_log("key is :".$key);
        $pieces = strpos($key,'/')?(explode("/", $key)):$key;
        $arrResut=$arr;
        for ($x=0; count($pieces) > $x; $x++) {
            $arrResut= $arrResut[$pieces[$x]];
        }
        
        return $arrResut;
    }
    
    
    
    
}