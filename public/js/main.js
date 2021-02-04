
var amount = 20;

function myFunction(amount) {
	

	let x = document.getElementById("mycurrency");

	let selected = x.options[x.selectedIndex].value;

	switch(selected) {

	  case'USD' :
	   
	 	let result  =( 0.96 * 20) ;

	 	console.log(result);

	    break;

	  case 'KES':
	    
	    console.log ('KES');

	    break;

	  default:
	    
	    console.log('I do not know');
	}
}