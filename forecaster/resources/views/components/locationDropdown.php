
<div class="fullwidth-block">
	<div class="container">
		<div class="filter">
			<div class="country filter-control">
				<label for="">Country</label>
				<span class="select control">
					<select id="countcode" ng-change="pulldownCountryChange()" ng-model="forecast.country">
						<option value="" disabled="" selected="true" class="ng-binding">Select Country</option>
						<option style="color:gray" ng-repeat="countrydata in countryList" value="[[countrydata.code]]">[[countrydata.name]]</option>
					</select>
				</span>
			</div>
			<div class="count filter-control">
				<label for="">City</label>
				<span class="select control">
					<select id="citycode" ng-change="pulldownCityChange()" ng-model="forecast.city">
						<option style="color:gray" value="" disabled="" selected="true" class="ng-binding">Select City</option>
						<option style="color:gray" ng-repeat="citydata in citySelectList" value="[[citydata.city_id]]">[[citydata.city_name]]</option>
					
					</select>
				</span>
			</div>
			<div class="quality filter-control">
				<label for="">Weather Status</label>
				<span class="select control">
					<select name="" id="" ng-model="forecast.status">
						<option style="color:gray" value="">Select status</option>
						<option style="color:gray" value="current">Current</option>
					</select>
				</span>
			</div>
			
			<div class="quality filter-control" style="border: transparent">
				<div class="text-right">
    				<button ng-click='getForcast()' type="button" class="btn btn-primary">Submit</button>
    			</div>
			</div>
			
			
			
			
		</div>
	</div>
</div>
		