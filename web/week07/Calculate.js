
//The following function is from developer.mozilla.com with slight modification
function getRandomInt(min, max) {
  min = Math.ceil(min);
  max = Math.floor(max);
  return Math.floor(Math.random() * (max - min + 1)) + min;
  //The maximum is inclusive and the minimum is inclusive 
}

function calculate(random){
   if (random > 0){
      document.getElementById("years").value = getRandomInt(1,40);
      document.getElementById("amount").value = getRandomInt(1,2000000);
      document.getElementById("annualRate").value = getRandomInt(1,250).toFixed(2)/10;
      }
   
   var years = parseInt(document.getElementById("years").value);
   var amount = parseInt(document.getElementById("amount").value);
   var annualRate = parseFloat(document.getElementById("annualRate").value);
   
    var years = years *12;

    
    if (amount == "" ){
       result = window.confirm("Please enter an amount.");
    }
    else if (annualRate == "" ){
       result = window.confirm("Please enter a rate.");
    }
    else if (years == "") {
        result = window.confirm("Please enter a value for number of years.");
    }
    else if(years > 480 || years < 12)
    {
        result = window.confirm("Number of years should be between 1 and 40");
    }
    
    else if(annualRate <= 0 || annualRate > 25)
    {
        result = window.confirm("Annual rate should be between 1 and 25%");
    }
    
    else {
     
    var result = amount*((annualRate/1200)*Math.pow((1+annualRate/1200),years))/(Math.pow((1+annualRate/1200), years) -1);
    document.getElementById("payment").innerHTML = (result.toFixed(2));
    }

}

    
