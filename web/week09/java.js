        function populatePage() {
            let url = document.getElementById("filename").value;
            let xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    let response = JSON.parse(this.responseText);
                    showStudentInfo(response);
                }
            };
            xhr.open("GET", url, true);
            xhr.send();
        }

        function Canada() {
            let xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("info").innerHTML = this.responseText;
                }
            };
            xhttp.open("GET", "canada.txt", true);
            xhttp.send();
        }
        
        function Mexico() {
            let xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("info").innerHTML = this.responseText;
                }
            };
            xhttp.open("GET", "mexico.txt", true);
            xhttp.send();
        }
        
        function Russia() {
            let xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("info").innerHTML = this.responseText;
                }
            };
            xhttp.open("GET", "russia.txt", true);
            xhttp.send();
        }
        
        function USA() {
            let xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("info").innerHTML = this.responseText;
                }
            };
            xhttp.open("GET", "usa.txt", true);
            xhttp.send();
        }

        function showStudentInfo(json) {
            var info = "";
            for (students of json.students) {
                info += "<p>" + students.first + " " + students.last + "<br>" + students.address.city + " " + students.address.state + "<br>" + students.address.zip + "<br>Major: " + students.major + "<br>GPA: " + students.gpa + "</p>";
            }
            document.getElementById("information").innerHTML = info;


        }





