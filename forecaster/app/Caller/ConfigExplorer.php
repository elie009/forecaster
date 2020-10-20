<?php

namespace App\Caller;

use App\Traits\Util;
use Illuminate\Contracts\Filesystem\FileNotFoundException;
use Illuminate\Support\Facades\Storage;
use App\Caller\FileConfig;
 

class ConfigExplorer implements FileConfig{

 
    use Util;
    
    
    private $completeConfig = true;
    private $DevConfigPath = "";
    private $configTarget = ["method","place"];
    private $configList = ["weatherbit","openweathermap"];
    private $d = "/";
    
    public $methodConfigList=[];
    public $placeConfigList=[];
    
    private function CheckConfigFile(){

        $this->d = $this->dilimiter();
        $this->DevConfigPath = "ForecastConfig" .$this->d. "API" .$this->d;
        
        
        
        try{
            foreach ($this->configTarget as $target){
                foreach ($this->configList as $list){
                    $path = $this->DevConfigPath.$target .$this->d. $list.".json\n"; 
                    if(!Storage::disk('public')->get($path, 'Contents'))
                        $this->completeConfig = false;
                    
                    if($target == "method" && $this->completeConfig)
                        array_push($this->methodConfigList,$path);
                    
                    if($target == "place" && $this->completeConfig)
                        array_push($this->placeConfigList,$path);
                    
                }
            }
            
        }catch (FileNotFoundException $e){
            error_log('Caught exception: '.  $e->getMessage(). "\n");
            $this->completeConfig = false;
        }
        return $this->completeConfig;   
    }

    function PlaceConfigReader(){
        $path = $this->DevConfigPath. "place" .$this->d. "weatherbit.json";
        return ($this->completeConfig)? (Storage::disk('public')->get($path, 'Contents')):[];
    }
    
    public function getConfigMethod()
    {
        return $this->methodConfigList;
    }

    public function getConfigPlaces()
    {
        return $this->placeConfigList;
    }

    public function __construct()
    {
        return $this->CheckConfigFile();
    }
    
    public function readFile($path)
    {
        return ($this->completeConfig)? (Storage::disk('public')->get($path, 'Contents')):[];
    }


    
    


    

    
}




