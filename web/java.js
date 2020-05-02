var slideIndex = 1;

function plusDivs(n) {
    showDivs(slideIndex += n);
    }
function showDivs(n) {
    var i;
    var x = document.getElementsByClassName("mySlides");
    if (n > x.length) {
        slideIndex = 1
    }
    if (n < 1) {
        slideIndex = x.length
    }
    for (i = 0; i < x.length; i++) {
        x[i].style.display = "none";
    }
    x[slideIndex - 1].style.display = "block";
}


function arpCalculator() {
    let form1 = document.getElementById("phpForm");         
 }
 function getRandomInt(min, max) {
    min = Math.ceil(min);
    max = Math.floor(max);
    return Math.floor(Math.random() * (max - min + 1)) + min;
//The maximum is inclusive and the minimum is inclusive 
 }
 function calculate(random){
    if (random > 0){
       document.getElementById("term").value = getRandomInt(1,40);
       document.getElementById("amount").value = getRandomInt(1,2000000);
       document.getElementById("apr").value = getRandomInt(1,250).toFixed(2)/10;
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
       arpCalculator()
    }

 }