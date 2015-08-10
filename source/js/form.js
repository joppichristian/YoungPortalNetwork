if( $('.floating-labels').length > 0 ) floatLabels();

function floatLabels() {
	var inputFields = $('.floating-labels .cd-label').next();

	inputFields.each(function(){
		var singleInput = $(this);

		singleInput.keyup(function(){
			checkVal(singleInput);
		});
	});
}
