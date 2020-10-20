<?php

namespace App\Caller;

use App\Caller\ConfigExplorer;
use App\Traits\Util;


class weather
{
    use Util;
    
    
    public function getCurrentForecastMyLocation(){
        
    }
    
    
    public function getCurrentForecastByCity($cityCode,$countryCode,$status){
        $caller = new ConfigExplorer();
        $location = $caller->getConfigMethod();
        
        $avg = [];
        foreach ($location as $path){
            $Obj= (array)json_decode($caller->readFile($path),true);
            $dataObj = $Obj;
            
            foreach($Obj as $methodcall)
            {
                $composeapi = [];
                $attr = $methodcall[0]["attribute"];
                array_push($composeapi,$methodcall[0]["url"]);
                
                foreach($methodcall[0]["format"] as $key => $value){
                    
                    if($attr[$value]["isUse"] == "true"){
                        
                        
                        
                        if($value == "city"){
                            $dataObj = $this->dataAlign($attr[$value], $cityCode);
                            array_push($composeapi,$dataObj);
                            
                        }else if($value == "country"){
                            $dataObj = $this->dataAlign($attr[$value], $countryCode);
                            array_push($composeapi,$dataObj);
                            
                        }
                        else{
                            $dataObj = $this->dataAlign($attr[$value], $attr[$value]["value"]);
                            array_push($composeapi,$dataObj);
                        }
                        
                        
                        
                    }
                }
                
                
                $url = join("",$composeapi);
                $ch = curl_init();
                curl_setopt($ch,CURLOPT_URL,$url);
                curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
                $output=curl_exec($ch);
                curl_close($ch);
                
                $outdata = (array)json_decode($output,true);
                
                $temp = $this->jsonDataFinder($outdata, $methodcall[0]["targetResult"]);
                
                array_push($avg,$temp);
            }
        }
        $data = array(
            'temp'=>array_sum($avg)/count($avg),
            'day'=>date("l"),
            'daynum'=>date("d"),
            'month'=>date("F"),
            'templist'=>$avg,
            
        );
     
        return $data;
       
    }
    
    
    
    
    private function dataAlign($obj,$dataset){
        $title = $obj["isShow"] == "true"? $obj["title"]:"";
        
        return $obj["prefix"].$title.$obj["connector"].$dataset;
    }
    
    public function getCurrentForecastByCountry($countryCode){
        
    }
   

}







