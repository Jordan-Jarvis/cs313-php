window.onload = function(){
    document.getElementById("form1").addEventListener('submit', submi);
}

function submi(event){
    event.preventDefault;

    if (!reportValidity()) {
        return;
    }
    else{
        formElement.submit();
    }
}
function calculate(){
    temp = getRandomInt(0,1)
    if (temp == 1){
        document.getElementById("item1").checked = true;
    }
    else{ 
        document.getElementById("item1").checked = false;
    }
    temp = getRandomInt(0,1)
    if (temp == 1){
        document.getElementById("item2").checked = true;
    }
    else{
        document.getElementById("item2").checked = false;
    }
    temp = getRandomInt(0,1)
    if (temp == 1){
        document.getElementById("item3").checked = true;
    }
    else{
        document.getElementById("item3").checked = false;
    }
    temp = getRandomInt(0,1)
    if (temp == 1){
        document.getElementById("item4").checked = true;
    }
    else{
        document.getElementById("item4").checked = false;
    }
    temp = getRandomInt(0,1)
    if (temp == 1){
        document.getElementById("item5").checked = true;
    }
    else{
        document.getElementById("item5").checked = false;
    }
    temp = getRandomInt(0,1)
    if (temp == 1){
        document.getElementById("item6").checked = true;
    }
    else{
        document.getElementById("item6").checked = false;
    }
    temp = getRandomInt(0,1)
    if (temp == 1){
        document.getElementById("item7").checked = true;
    }
    else{
        document.getElementById("item7").checked = false;
    } 
    price()
    document.getElementById("first").value = "Jordan";
    document.getElementById("last_name").value = "Gongo";
    document.getElementById("address").value = "3229 pilf lane, Rexburg, ID"
    document.getElementById("card").value = "Visa";
    temp = getRandomInt(1000,9999)
    temp1 = getRandomInt(1000,9999)
    temp2 = getRandomInt(1000,9999)
    temp3 = getRandomInt(1000,9999)
    var tempString = '';
    tempString.concat(temp.toString(), ' ', temp1.toString(), ' ', temp2.toString(), ' ', temp3.toString())
    document.getElementById("credit_card").value = "test";




}
function getRandomInt(min, max) {
    min = Math.ceil(min);
    max = Math.floor(max);
    return Math.floor(Math.random() * (max - min + 1)) + min;
}
function phoneN(element){
    let num = element.value;
    let numPattern = /^\d\d\d-\d\d\d-\d\d\d\d$/;

    if(numPattern.test(num)){
        document.getElementById("change1").innerHTML = "";
        return true;
    }
    else{
        document.getElementById("change1").innerHTML = "Please Enter a Valid Phone Number";
        return false;
    } 
}


function cardN(element){
    let card = element.value;
    let cardPattern = /^\d\d\d\d \d\d\d\d \d\d\d\d \d\d\d\d$/;

    if(cardPattern.test(card)){
        document.getElementById("change2").innerHTML = "";
    }
    else{
        document.getElementById("change2").innerHTML = "Please Enter a Credit Card Number";
    }
}

function expir(element){
    let exp = element.value;
    let expPattern = /^(\d|0[1-9])\/(20[2-9]\d|2[1-9]\d\d)$/;

    if(expPattern.test(exp)){
        document.getElementById("change3").innerHTML = "";
    }
    else{
        document.getElementById("change3").innerHTML = "Please Enter a Valid Expiration Date";
    }
}

let tot = 0;
function price(){
    tot = 50;
    if(document.getElementById("item1").checked == true){
        tot += 30;
    }
    if(document.getElementById("item2").checked == true){
        tot += 20;
    }
    if(document.getElementById("item3").checked == true){
        tot += 50;
    }
    if(document.getElementById("item4").checked == true){
        tot += 100;
    }
    if(document.getElementById("item5").checked == true){
        tot += 40;
    }
    if(document.getElementById("item6").checked == true){
        tot += 300;
    }
    if(document.getElementById("item7").checked == true){
        tot += 120;
    }
    document.getElementById("total").value = tot;

}
