function submitWatchlist() {
	
	var wName = document.getElementById("wName");
	var wNameLabel = document.getElementById("wNameLabel");
	var submitForm = document.forms["watchlistForm"];
	var currencies = document.getElementsByClassName("currencies");
	var noCurrencySelected = true;

	for(i=0; i<currencies.length; i++) {
			if (currencies[i].checked) {
				noCurrencySelected = false;
			}
	}
	if (wName.value) {
		wNameLabel.style.color = "white";
	}
	
	if(!wName.value) {
		wNameLabel.style.color = "red";
	} else if (noCurrencySelected) {
		alert("Please select a currency");
	} else if (confirm("Make watchlist with selected items?")) {
		submitForm.submit();
	}
}