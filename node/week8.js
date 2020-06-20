 
const http = require('http')
const fs = require('fs')

var jsonObj;
var jsonArr;

const server = http.createServer(function(req, response) {

    switch (req.url) {
        case '/home':
            response.writeHead(200, { 'Content-Type': 'text/html' });
            response.write("<h1>Welcome to the Home Page</h1>");
            response.end();
            break;

        case '/getData':
            jsonObj = fs.readFileSync("data.json");
            jsonArr = JSON.parse(jsonObj);

            response.writeHead(200, { 'Content-Type': 'application/json' });
            response.write("Name: " + jsonArr.name + "\n");
            response.write("Class: " + jsonArr.class + "\n");
            response.write("JSON Object: " + JSON.stringify(jsonArr));
            response.end();
            break;

        default:
            response.writeHead(404, { "Content-Type": "text/html" });
            response.write('404: Page Not Found');
            response.end();
    }

}).listen(8888);
