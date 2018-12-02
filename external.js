

function passwordMatch(){
	if (document.forms["signUpForm"]["password"].value === document.forms["signUpForm"]["rePassword"].value){
		return true;
	} else {
		alert("Ensure passwords match.");
		return false;
	}
}

