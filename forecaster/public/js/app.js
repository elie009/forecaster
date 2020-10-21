



window.fn = {};
fn.timezone = "";
window.appName = document.getElementsByTagName("html")[0].getAttribute("ng-app");

console.log("angular app name: " + window.appName);
window.appDependencies = [];

for (var i = 0; i < document.scripts.length; i++) {
    var moduleName = document.scripts[i].getAttribute("data-angular");


    if (moduleName)
        window.appDependencies.push(moduleName);
}

console.log("angular app deps: " + window.appDependencies);

if (!window.appName)
    window.alert("Angular app name undefined!");

if (window.appDependencies.length === 0)
    window.alert("Angular app deps undefined!");

window.app = angular.module(window.appName, window.appDependencies, function($interpolateProvider){    
    
    $interpolateProvider.startSymbol('[[');
    $interpolateProvider.endSymbol(']]');
});



window.app.controller('AppBase', function ($scope, $http, $window) {
    console.log('Your machine is running good');
    
    
    
    
    
    $scope.findValue = function(src, input) {   
    	cities = []
    	src = src? src:[]  
    	
    	for(i=0;i < src.length;i++){
    		
    		if (src[i].country_code === input) {
    	    	cities = src[i].city;
    	    	return cities;
    	    	break;
    	    }
    	}  	
    	return [];
    };
    
    
    
    
    
    
});







