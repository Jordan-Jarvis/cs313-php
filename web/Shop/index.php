<?php
    //name this file "index.php"

    //now keep in mind. I'm not going to fancy this up, so it's gonna look pretty ugly.
    //i'm also going to use javascript and jQuery (a javascript library) because I love the two. :)

    //lets name and start a session
    session_name("rexthing");
    session_start();

    //this string is arbitrary, but i like it for debugging
    $errorqueue = '';

    //we need to add our login details and products!
    include("users.php");
    include("products.php");

    //now in a normal php application of logging in or handling of login requests, i don't suggest doing this, but this is quick and easy(ish)
    $action = (isset($_GET['action'])) ? $_GET['action']: ""; //Ternary operator asking if there is an inputted action
    switch($action)
    {
        case "login":
            if(isset($_SESSION['username'])) //check if we're already logged in
            {
                $errorqueue['Login'] = "We've already logged in!";
            } else {
                $errorqueue['login'] = "Invalid username/password";
                $username = (isset($_POST['username'])) ? $_POST['username']: ""; //check if there is a username supplied, if not then leave it blank
                $password = (isset($_POST['password'])) ? $_POST['password']: ""; //check for password
                foreach($accounts as $value) //this is our login attempt
                {
                    if(($username == $value['username']) && ($password == $value['password']))
                    {
                        //please please please, never ever use this as a real login validation method!!! I'm just using it because i'm doing this quickly!
                        $_SESSION['username'] = $username;
                        $_SESSION['cart'] = ''; //this is our cart for the user this session
                        unset($errorqueue['login']);
                    }
                }
            }
            break;
        case "logout":
            session_unset(); //deletes all session variables/cookies
            break;
        case "additem":
            //this is a quick and dirty way to make a cart! plz if you're ever going to make a cart... don't do this!
            $itemid = (isset($_GET['itemid'])) ? $_GET['itemid']: "";
            if($itemid != "")
            {
                if($_SESSION['cart'] == "")
                {
                    $_SESSION['cart'] = array($products[$itemid]);
                } else {
                    array_push($_SESSION['cart'], $products[$itemid]);
                }
            }
            break;
        case "clearcart":
            $_SESSION['cart'] = "";
            break;
    }

    //we can now dynamically load our data knowing if we're logged in or not.
    //I'll even throw in some neat little effects because i'm bored
    echo <<<DISP
    <html>
        <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
        <html xmlns="http://www.w3.org/1999/xhtml">
        <meta http-equiv="X-UA-Compatible" content="IE=9" />
        <head>
            <title>Rex's awesome thing</title>

            <script type="text/javascript" language="javascript" src="http://code.jquery.com/jquery-1.7.1.min.js"> </script>
            <script type="text/javascript" language="javascript">
                $(function() {
                    $('.button').mouseover(function() {
                        $(this).animate({opacity:1},200);
                    })
                    .mouseleave(function() {
                        $(this).animate({opacity:.6},200);
                    });
                    $('#login_button').click(function() {
                        $('#login_form').submit();
                    });
                    $('.disp_item').click(function() {
                        var itemid = $(this).attr("id");
                        var location = "index.php?action=additem&itemid="+itemid;
                        window.location.href = location;
                    });
                    $('.disp_item').mouseover(function() {
                        $(this).css("background-color","#CCC");
                    })
                    .mouseleave(function() {
                        $(this).css("background-color","transparent");
                    });
                    $('#clearcart').click(function() {
                        window.location.href= "index.php?action=clearcart";
                    });
                });
            </script>

            <style type="text/css">
                body {
                    background-color:#000;
                    -moz-user-select: -moz-none;
                    -khtml-user-select: none;
                    -webkit-user-select: none;
                    user-select: none;
                    min-width:1000px;
                }
                #wrapper {
                    position:absolute;
                    top:10px;
                    right:50px;
                    left:50px;
                    min-height:500px;
                    background-color:#333;
                    border-radius: 15px;
                    padding: 10px 20px;
                }
                .button {
                    display:inline-block;
                    padding: 2px 20px;
                    background-color:#FFF;
                    border: 1px solid #999;
                    opacity:.6;
                    cursor:pointer;
                    border-radius:7px;
                }
                #logout {
                    color:#FFF;
                }
                .lololol {
                    display:inline-block;
                    width:150px;
                }
                .di_desc {
                    width:600px !important;
                }
                .disp_item {
                    cursor:pointer;
                }
            </style>
        </head>
        <body>
        <div id="wrapper">
DISP;
//the "DISP;" line must be on the far left with nothing after it. don't ask why. It just must.


        //now check to see if we're logged in or not
        if(isset($_SESSION['username'])) //now i'm using the true/false return of the "isset" function to determine if we've set (logged in) this variable
        {
            //yes we're logged in! lets show some stuff!
            $dUsername = $_SESSION['username'];

            echo <<<DISP
            Welcome $dUsername!<br />
            It's nice to see you back! <br />
            Click <a href="index.php?action=logout" id="logout">here</a> to logout!<br />
            <br />
DISP;
//this disp, same as above
            //lets display the stuff we have in our cart already
            echo "Stuff we have in our cart:<br />\n";
            $cart_total = 0;
            if($_SESSION['cart'] != '') {
            foreach($_SESSION['cart'] as $key => $value)
            {
                $cart_total = $cart_total + $value['price'];
                $name = $value['name'];
                $price = $value['price'];
                $desc = $value['description'];
                echo <<<DISP
                <div class="ahahahaha">
                    <span class="di_name lololol">$name</span>
                    <span class="di_price lololol">\$$price</span>
                    <span class="di_desc lololol">$desc</span>
                </div>
DISP;
            } }
            echo "Cart total: $".$cart_total;
            echo '<br /><span class="button" id="clearcart">Clear Cart</span>';
            echo "<br /> <br/>\n"; //some space
            //lets display stuff not in our cart
            echo "Click an item to add it to your cart:<br />\n";
            foreach($products as $key => $value)
            {
                $name = $value['name'];
                $price = $value['price'];
                $desc = $value['description'];
                echo <<<DISP
                <div id="$key" class="disp_item">
                    <span class="di_name lololol">$name</span>
                    <span class="di_price lololol">\$$price</span>
                    <span class="di_desc lololol">$desc</span>
                </div>
DISP;
//you know the drill...
            }
        } else { //isset if
            //no we're not logged in, show our login form
            echo <<<HAHA
            <form method="post" action="index.php?action=login" id="login_form">
            Username:<br />
            <input type="text" placeholder="Username" name="username" id="login_username" /><br />
            <br />
            Password:<br />
            <input type="password" placeholder="Password" name="password" id="login_password" /><br />
            <br />
            </form>
            <span class="button" id="login_button">Login</span>
HAHA;
//the "HAHA;" line must be on the far left.
        } //isset if

        //show our errors
        echo "<br /> <br />\n";
        if($errorqueue != "") {
        foreach($errorqueue as $key => $value)
        {
            echo $key . " error: " . $value . "! <br />\n";
        }}
        echo <<<FINI
        </div>
    </body>
</html>
FINI;
?>