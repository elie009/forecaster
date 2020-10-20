

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

	$.each(data.country, function( index, value ) {
		console.log(value)
		dataCompose = {
				name:value.city_name,
				code: value.city_id,
				countrycode:value.city
		}
		cityarray.push(dataCompose)
	});
	return cityarray
}







