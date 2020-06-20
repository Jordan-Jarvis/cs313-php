function LSCalc(weight) {

    var result;
  
    if(weight <= 1){
      return result = 0.55;
    }
    if (weight <= 2) {
      return result = 0.70;
    }
    if (weight <= 3) {
      return result = 0.85;
    }
    if (weight <= 3.5) {
      return result = 1.00;
    }
    else {
      return result = -1;
    }
  }
  
  function LMCalc(weight) {
  
    var result;
  
    if(weight <= 1){
      return result = 0.50;
    }
    if (weight <= 2) {
      return result = 0.65;
    }
    if (weight <= 3) {
      return result = 0.80;
    }
    if (weight <= 3.5) {
      return result = 0.95;
    }
    else {
      return result = -1;
    }
  
  }
  
  function eCalc(weight) {
  
    var result;
  
    if(weight <= 1){
      return result = 1.00;
    }
    if (weight <= 2) {
      return result = 1.20;
    }
    if (weight <= 3) {
      return result = 1.40;
    }
    if (weight <= 4) {
      return result = 1.60;
    }
    if (weight <= 5) {
      return result = 1.80;
    }
    if (weight <= 6) {
      return result = 2.00;
    }
    if (weight <= 7) {
      return result = 2.20;
    }
    if (weight <= 8) {
      return result = 2.40;
    }
    if (weight <= 9) {
      return result = 2.60;
    }
    if (weight <= 10) {
      return result = 2.80;
    }
    if (weight <= 11) {
      return result = 3.00;
    }
    if (weight <= 12) {
      return result = 3.20;
    }
    if (weight <= 13) {
      return result = 3.40;
    }
    else {
      return result = -1;
    }
  }
  
  function pCalc(weight) {
  
      var result;
  
      if(weight <= 4){
        return result = 2.80;
      }
      if (weight <= 5) {
        return result = 3.33;
      }
      if (weight <= 6) {
        return result = 3.86;
      }
      if (weight <= 7) {
        return result = 4.39;
      }
      if (weight <= 8) {
        return result = 4.92;
      }
      if (weight <= 9) {
        return result = 5.45;
      }
      if (weight <= 10) {
        return result = 5.98;
      }
      if (weight <= 11) {
        return result = 6.52;
      }
      if (weight <= 12) {
        return result = 7.06;
      }
      if (weight <= 13) {
        return result = 7.60;
      }
      else {
        return result = -1;
      }
  }
var express = require('express');
var app = express();
var url = require('url');

app.set('port', (process.env.PORT || 5000));

app.use(express.static(__dirname + '/public'));

// views is directory for all template files
app.set('views', __dirname + '/views');
app.set('view engine', 'ejs');

app.get('/', function(request, response) {
  response.render('pages/index');
});

app.get('/postalRequest', function(request, response) {
  response.render('pages/postalRequest');
});

app.get('/postageDisplay', function(request, response) {

  var requestUrl = url.parse(request.url, true);

  console.log("Query parameters: " + JSON.stringify(requestUrl.query));

  var postageType = requestUrl.query.postageType;      
  var weight      = Number(requestUrl.query.weight); 

  var result = 0;

  if(postageType == "lettersS") {
    result = LSCalc(weight);
  }
  else if (postageType == "lettersM") {
    result = LMCalc(weight);
  }
  else if (postageType == "envelopes") {
    result = eCalc(weight);
  }
  else if (postageType == "parcels") {
    result = pCalc(weight);
  }

  // Set up a JSON object of the values we want to pass along to the EJS result page
  var params = {postageType: postageType, weight: weight, result: result};

  response.render('pages/postageDisplay', params);
});

app.listen(app.get('port'), function() {
  console.log('Node app is running on port', app.get('port'));
});
