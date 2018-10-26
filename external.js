/*
Hey guys - sorry for all these weird commits.  Work is slow and I'm just adding to some things right now.  
*/

function passwordMatch(){
	if (document.forms["signUpForm"]["password"].value === document.forms["signUpForm"]["rePassword"].value){
		return true;
	} else {
		alert("Ensure passwords match.");
		return false;
	}
}

/*
Once we have database we will need:

-Check if username exists
-Add new user to database
-Create session object to check if user is logged in with each page navigation

*/

