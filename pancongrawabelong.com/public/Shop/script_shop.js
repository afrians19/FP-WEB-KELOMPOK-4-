(function() {
"use strict";
var test = 100;
var state = document.getElementById('s-state');

document.addEventListener('DOMContentLoaded', function() {
	document.getElementById('cart-pancong').addEventListener('submit', estimateTotal);
	
	var btnEstimate = document.getElementById('btn-estimate');
	
	btnEstimate.disabled = true;
	
	state.addEventListener('change', function() {
	
		if (state.value === '') {
			btnEstimate.disabled = true;
		} else {
			btnEstimate.disabled = false;
		}
	
	});
});

function estimateTotal(event) {
	event.preventDefault();
	
	if (state.value === '') {
		alert('Please choose your shipping state.');
		
		state.focus();
	}
	
	var pancong_ = parseInt(document.getElementById('pancong')
							 .value, 10) || 0,
		rotiPanggang = parseInt(document.getElementById('roti-panggang')
							 .value, 10) || 0,
		pisangBakar = parseInt(document.getElementById('pisang-bakar')
							 .value, 10) || 0,
		indomie_ = parseInt(document.getElementById('indomie')
							 .value, 10) || 0,
		shippingState = state.value,
		shippingMethod = document.querySelector('[name=r_method]:checked')
						     .value || "";
		
	var totalQty = pancong_ + rotiPanggang + pisangBakar + indomie_,
		shippingCostPer,
		shippingCost,
		charge = 0,
		estimate,
		totalItemPrice = (5000 * pancong_) + (6000 * rotiPanggang) +
						 (7000 * pisangBakar) + (4000 * indomie_);
	
	if (shippingState === 'JT') {
		charge = 10000;
	} else if (shippingState === 'JU') {
		charge = 8000;
	}else if (shippingState === 'JS') {
		charge = 0;
	}else if (shippingState === 'JB') {
		charge = 0;
	}else if (shippingState === 'JP') {
		charge = 0;
	}
	
	switch(shippingMethod) {
		case 'pd' :
			shippingCostPer = 10000;
			break;
		case 'to' :
			shippingCostPer = 15000;
			break;
		default :
			shippingCostPer = 0;
			break;
	}
	
	shippingCost = shippingCostPer;
		
	estimate = 'Rp' + ((totalItemPrice + charge) + shippingCost).toFixed(2);
    
	document.getElementById('txt-estimate').value = estimate;
	
	var results = document.getElementById('results');
	
	results.innerHTML = 'Total items: ' + totalQty + '<br>';
	results.innerHTML += 'Total shipping: Rp' + shippingCost.toFixed(2) + '<br>';
	results.innerHTML += 'Charge: ' + charge + ' (' + shippingState + ')';
    
}

})();