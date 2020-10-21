<div class="hero" data-bg-image="images/banner.png">
	<div class="container">

		<form action="" class="find-location">
			<input type="text" placeholder="Find your location..."  name="country" id="country" ng-model="country" ng-keyup="complete(country)">
			<!-- <input type="text" placeholder="Find your location..."> -->
		</form>
		<!-- <ul class="list-group">
			<li class="list-group-item" ng-repeat="countrydata in filterCountry" ng-click="fillTextbox(countrydata)">[[countrydata]]</li>
		</ul> -->
		
		<option value="" ng-repeat="countrydata in filterCountry" ng-click="fillTextbox(countrydata)">[[countrydata.name]]</option>
			
	</div>
</div>