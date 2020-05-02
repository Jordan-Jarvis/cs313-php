
function resetFields() {
   document.getElementById('errorSecondState').innerHTML = "";
   document.getElementById('content').innerHTML = "";
   document.getElementById('transportationModes').innerHTML = "";
   document.getElementById('errorFirstState').innerHTML = "";


}

function validateStartState() {

   var startingState = document.getElementById("startState").value;
   var startingStatePattern = /^\w\w$/;
   if ((startingState.match(startingStatePattern) || startingState.length == 0)) {
      document.getElementById('errorFirstState').innerHTML = "";
   }
   else {
      document.getElementById('errorFirstState').innerHTML = "Input for the starting state is invalid! You done messed up A-A-ron!";
      document.getElementById('content').innerHTML = "";
   }
}

function AJAXLoad() {
   var start_city = document.getElementById("startCity").value;
   var start_state = document.getElementById("startState").value;
   var end_city = document.getElementById("endCity").value;
   var end_state = document.getElementById("endState").value;
   const myUrl = `/cgi-bin/cs213/mileageAjaxJSON?startCity=${start_city}&startState=${start_state}&endCity=${end_city}&endState=${end_state}`;
   
   let xhr = new XMLHttpRequest();                      
   xhr.onreadystatechange = function () {               
      if (this.readyState == 4 && this.status == 200) {
         let response = JSON.parse(this.responseText);

         console.log(response);

         document.getElementById('content').innerHTML = "<p>The Distance between: " + response.trip.startcity + ", " +
            response.trip.startstate + " and " + response.trip.endcity + ", " +
            response.trip.endstate + " is " + response.trip.miles + " miles</p>";
         var modeOfTransportation;
         var modeString = "";
         var i = 1;
         if (response.trip.tmode != undefined) {
            modeString += "Modes of Transportation : <br>";
            for (modeOfTransportation of response.trip.tmode) {
               modeString += i + ". " + modeOfTransportation + "<br>";
               i++;
            }
         }
         document.getElementById('transportationModes').innerHTML = modeString;
         validateStartState();
         validateEndState();
      }
   };

   xhr.open("GET", myUrl, true);
   xhr.send(); 
}

function checkFields() {
   if (!form1.reportValidity()) {
      document.getElementById("content").value = "";
   }
   else {
      AJAXLoad();
   }
}

function validateEndState() {

   var startingState = document.getElementById("endState").value;
   var startingStatePattern = /^\w\w$/;

   if ((startingState.match(startingStatePattern) || startingState.length == 0)) {
      document.getElementById('errorSecondState').innerHTML = "";
   }
   else {
      document.getElementById('errorSecondState').innerHTML = "Input for the destination state is invalid!";
      document.getElementById('content').innerHTML = "";
   }
}
