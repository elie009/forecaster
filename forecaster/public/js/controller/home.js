app.controller('HomeController', function($scope,$http) {
	
	
	$scope.countryList = ["Selec Country","Afghanistan","Albania","Algeria","Andorra","Angola","Anguilla","Antigua &amp; Barbuda","Argentina","Armenia","Aruba","Australia","Austria","Azerbaijan","Bahamas","Bahrain","Bangladesh","Barbados","Belarus","Belgium","Belize","Benin","Bermuda","Bhutan","Bolivia","Bosnia &amp; Herzegovina","Botswana","Brazil","British Virgin Islands","Brunei","Bulgaria","Burkina Faso","Burundi","Cambodia","Cameroon","Cape Verde","Cayman Islands","Chad","Chile","China","Colombia","Congo","Cook Islands","Costa Rica","Cote D Ivoire","Croatia","Cruise Ship","Cuba","Cyprus","Czech Republic","Denmark","Djibouti","Dominica","Dominican Republic","Ecuador","Egypt","El Salvador","Equatorial Guinea","Estonia","Ethiopia","Falkland Islands","Faroe Islands","Fiji","Finland","France","French Polynesia","French West Indies","Gabon","Gambia","Georgia","Germany","Ghana","Gibraltar","Greece","Greenland","Grenada","Guam","Guatemala","Guernsey","Guinea","Guinea Bissau","Guyana","Haiti","Honduras","Hong Kong","Hungary","Iceland","India","Indonesia","Iran","Iraq","Ireland","Isle of Man","Israel","Italy","Jamaica","Japan","Jersey","Jordan","Kazakhstan","Kenya","Kuwait","Kyrgyz Republic","Laos","Latvia","Lebanon","Lesotho","Liberia","Libya","Liechtenstein","Lithuania","Luxembourg","Macau","Macedonia","Madagascar","Malawi","Malaysia","Maldives","Mali","Malta","Mauritania","Mauritius","Mexico","Moldova","Monaco","Mongolia","Montenegro","Montserrat","Morocco","Mozambique","Namibia","Nepal","Netherlands","Netherlands Antilles","New Caledonia","New Zealand","Nicaragua","Niger","Nigeria","Norway","Oman","Pakistan","Palestine","Panama","Papua New Guinea","Paraguay","Peru","Philippines","Poland","Portugal","Puerto Rico","Qatar","Reunion","Romania","Russia","Rwanda","Saint Pierre &amp; Miquelon","Samoa","San Marino","Satellite","Saudi Arabia","Senegal","Serbia","Seychelles","Sierra Leone","Singapore","Slovakia","Slovenia","South Africa","South Korea","Spain","Sri Lanka","St Kitts &amp; Nevis","St Lucia","St Vincent","St. Lucia","Sudan","Suriname","Swaziland","Sweden","Switzerland","Syria","Taiwan","Tajikistan","Tanzania","Thailand","Timor L'Este","Togo","Tonga","Trinidad &amp; Tobago","Tunisia","Turkey","Turkmenistan","Turks &amp; Caicos","Uganda","Ukraine","United Arab Emirates","United Kingdom","Uruguay","Uzbekistan","Venezuela","Vietnam","Virgin Islands (US)","Yemen","Zambia","Zimbabwe"];
	
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
	
	$scope.countryList = []
	$scope.cityList = []
	$scope.locationList = []
	$scope.selectedCountry=""

	
	$http.get("/place")
	  .then(function(response) {
		  $scope.locationList = response.data;
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
		$scope.cityList = $scope.findValue($scope.locationList.country,$scope.forecast.country)
		
	}
	
	$scope.pulldownCityChange=function(){
		//TO DO
	}
	
	


	
	$scope.complete=function(string){
		var output=[];
		angular.forEach($scope.countryList,function(country){
			if(country.toLowerCase().indexOf(string.toLowerCase())>=0){
				output.push(country);
			}
		});
		$scope.filterCountry=output;
	}
	
	$scope.fillTextbox=function(string){
		$scope.country=string;
		$scope.filterCountry=null;
	}
	
	
})