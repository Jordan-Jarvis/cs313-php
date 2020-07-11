function getAlbum(request, response) {
	// First get the person's id
	const id = request.query.id;

	// TODO: We should really check here for a valid id before continuing on...

	// use a helper function to query the DB, and provide a callback for when it's done
	getAlbumFromDb(id, function(error, result) {
		// This is the callback function that will be called when the DB is done.
		// The job here is just to send it back.

		// Make sure we got a row with the person, then prepare JSON to send back
		if (error || result == null || result.length != 1) {
			response.status(500).json({success: false, data: error});
		} else {
			const person = result[0];
			response.status(200).json(person);
		}
	});
}
function getSonglist(request, response)
{
  const id = request.query.id; 

	// TODO: We should really check here for a valid id before continuing on...

	// use a helper function to query the DB, and provide a callback for when it's done
	getSonglistFromDb(id, function(error, result) {
		// This is the callback function that will be called when the DB is done.
		// The job here is just to send it back.

		// Make sure we got a row with the person, then prepare JSON to send back
		if (error || result == null) {
      response.status(500).json({success: false, data: error});
      console.log("Error in query: Nothing returned")
		} else {
      const person = result;
			response.status(200).json(person);
		}
	});
}

function getSonglistFromDb(id, callback) {
  console.log("Getting list of songs from playlist");
  const sql = "SELECT * FROM song";

  pool.query(sql, function(err, result) {
		// If an error occurred...
		if (err) {
			console.log("Error in query: ")
			console.log(err);
			callback(err, null);
		}
    console.log("Found result: " + JSON.stringify(result.rows));
    callback(null, result.rows);
		// Log this to the console for debugging purposes.
  });
}

function getAlbumFromDb(id, callback) {
	console.log("Getting list of songs from DB with id: " + id);

	// Set up the SQL that we will use for our query. Note that we can make
	// use of parameter placeholders just like with PHP's PDO.
	const sql = "SELECT * FROM album where id = $1::int";

	// We now set up an array of all the parameters we will pass to fill the
	// placeholder spots we left in the query.
	const params = [id];

	// This runs the query, and then calls the provided anonymous callback function
	// with the results.
	pool.query(sql, params, function(err, result) {
		// If an error occurred...
		if (err) {
			console.log("Error in query: ")
			console.log(err);
			callback(err, null);
		}

		// Log this to the console for debugging purposes.
		console.log("Found result: " + JSON.stringify(result.rows));


		// When someone else called this function, they supplied the function
		// they wanted called when we were all done. Call that function now
		// and pass it the results.

		// (The first parameter is the error variable, so we will pass null.)
		callback(null, result.rows);
	});

} // end of getPersonFromDb

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
const { Pool } = require('pg');
var app = express();
var url = require('url');
const { response } = require('express');
const connectionString = process.env.DATABASE_URL || "postgres://lgmrmmnoxogtev:57cf1be7f238a3268dc3c894e310cb802337fcd3cecb5a118c7aa7bc8b539de1@ec2-23-20-129-146.compute-1.amazonaws.com:5432/d4q1a015ls1bcv?ssl=true";
const pool = new Pool({connectionString: connectionString});
var sql = "SELECT * FROM album";

pool.query(sql, function(err, result) {
    // If an error occurred...
    if (err) {
        console.log("Error in query: ")
        console.log(err);
    }

    // Log this to the console for debugging purposes.
    console.log("Back from DB with result:");
    console.log(result.rows);
  });

app.set('port', (process.env.PORT || 5000));

app.use('/public',express.static(__dirname +'/public'));
// views is directory for all template files
app.set('views', __dirname + '/views');
app.set('view engine', 'ejs');

app.get('/', function(request, response) {
  response.render('pages/index');
});

app.get('/AboutMe', function(request, response)
{
  response.render('pages/AboutMe');
})
app.get('/getAlbum', getAlbum);

app.get('/getSonglist', getSonglist)

app.get('/playMusic', function(request, response) {
  response.render('pages/playMusic');
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
