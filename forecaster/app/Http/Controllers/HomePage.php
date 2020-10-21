<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Caller\ConfigExplorer;
use App\Caller\weather;


class HomePage extends Controller
{
    
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $caller = new ConfigExplorer();
         $status = ($caller)? "OK": "ecounter an internal error";
         return view('home',['status'=>$status]);
    }
    
    
    public function places(){
        $caller = new ConfigExplorer();
        return $caller->PlaceConfigReader();
    }
    
    public function forecast(request $params){
        
        $weather = new weather();
        return $weather->getCurrentForecastByCity($params->city,$params->country, $params->status);
    }
  
}
