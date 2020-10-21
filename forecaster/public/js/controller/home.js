app.controller('HomeController', function($scope,$http) {
	
	

	$scope.forecast = {
			city:'',
			country:'',
			status:'current',
	}
	
	$scope.result ={
			temp:0,
			day:'',
			daynum:'',
			month:'',
			templist:[]
	}
	
	$scope.cityList = []
	$scope.countryList = []
	$scope.locationList = []
	$scope.selectedCountry=""

	
	$http.get("/place")
	  .then(function(response) {
		  $scope.locationList = response.data;
		  $scope.cityList = cityFormat(response.data)
		  $scope.countryList = countryFormat(response.data)
		 
		  
	}).catch(function (data) {
		console.log(data)
	});
	
	
	$scope.getForcast=function(){
		console.log($scope.forecast)
		

	
		
		if(!$scope.forecast.city || !$scope.forecast.status){
			alert('Please provide valid information')
			return;
		}
		
			
		$http.post("/forecast",$scope.forecast)
		  .then(function(response) {
			  console.log(response)
			  $scope.result.temp = response.data.temp;
			  $scope.result.day = response.data.day;
			  $scope.result.daynum = response.data.daynum;
			  $scope.result.month = response.data.month;
			  $scope.result.templist = response.data.templist
		
			  
		}).catch(function (data) {
			console.log(data)
		});
		
	}
	

	$scope.pulldownCountryChange=function(){
		
	
		
		$scope.citySelectList = $scope.findValue($scope.locationList.country,$scope.forecast.country)
		console.log($scope.citySelectList);
		
	}
	
	$scope.pulldownCityChange=function(){
		//TO DO
	}
	
	$scope.complete=function(string){
		
		var output=[];
		angular.forEach($scope.cityList,function(country){			
			if(country.name.toLowerCase().indexOf(string.toLowerCase())>=0){
				output.push(country);
			}
		});
		$scope.filterCountry=output;
	}
	$scope.fillTextbox=function(string){

		

		$scope.forecast.city=string.name;
		$scope.forecast.country=string.countrycode;
		
		
		$scope.country=string.name;
		$scope.filterCountry=null;
	}
	
	
})