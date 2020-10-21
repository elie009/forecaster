

function countryFormat(data){
	
	countarray = []
	
	$.each(data.country, function( index, value ) {
		dataCompose = {
				name:value.country_full,
				code: value.country_code
		}
		countarray.push(dataCompose)
	});
	
	return countarray

}


function cityFormat(data){
	cityarray = []
	
	
	$.each(data.country, function( indexCountry, valueCountry ) {
			
			$.each(valueCountry, function( indexCity, valueCity ){
				if(Array.isArray(valueCity)){
					
					$.each(valueCity, function( indexObj, valueObj ){
						
						dataCompose = {
							name:valueObj.city_name,
							code: valueObj.city_id,
							countrycode:valueCountry.country_code
						}
						cityarray.push(dataCompose)
					});
				}
			});
	});
	return cityarray
}







