<?php
namespace App\Caller;


interface FileConfig{
    
    function __construct();
    public function readFile($path);
    public function getConfigPlaces();
    public function getConfigMethod();
    
}


