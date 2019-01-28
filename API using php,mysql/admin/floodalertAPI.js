var hr = new XMLHttpRequest();
    
    hr.open("GET", "http://10.84.7.161/floodalert/connection.php", true);
    
   
    hr.onreadystatechange = function() {
	    if(hr.readyState === 4 && hr.status === 200) {
//		       var JSON3 = new json3();
 
			 var data = JSON.parse(hr.responseText);
                         
			 document.getElementById("city").innerHTML = data.City_name;
			 document.getElementById("River_name").innerHTML = data.River_name;
			 
			document.getElementById("Increase").innerHTML = data.increase;
			document.getElementById("Warning").innerHTML = data.warning;
			document.getElementById("Danger").innerHTML = data.danger;
			
		
		
		
			


	    }
    }
    
    hr.send(null); 
//   results.innerHTML = "requesting...";