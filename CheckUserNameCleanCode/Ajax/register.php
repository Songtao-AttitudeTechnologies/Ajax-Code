<!doctype html>
<html lang="en" xmlns="http://www.w3.org/1999/html" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script type="text/javascript">
        /**
         * Created by PC2 on 15/12/2016.
         */


        /**  Create xmlHttpRequest Object            */
        function getXmlHttpObject() {

            var xmlHttpRequest;
            if(window.ActiveXObject){          //if the user's web browser is IE core
                xmlHttpRequest = new ActiveXObject("Microsoft.XMLHTTP");
            }else{
                xmlHttpRequest = new XMLHttpRequest();
            }
            return xmlHttpRequest;
        }

        var myXmlHttpRequest = "";

        /** Check if the email address is exist or not */
        function checkEmail() {

            myXmlHttpRequest = getXmlHttpObject();
            if(myXmlHttpRequest){
                var url = "/Ajax-Check-Username-Clean-Code/Ajax/registerProcess.php";
                var data = "email="+$('email').value;
                myXmlHttpRequest.open("POST",url,true);
                myXmlHttpRequest.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
                myXmlHttpRequest.onreadystatechange = process;        //process is a function
                myXmlHttpRequest.send(data);
            }else{
                window.alert("Create Ajax Engine Fail!");
            }
        }

        /** function to change the visibility of the div     */
        function process() {


            if(myXmlHttpRequest.readyState == 4){
                var mes = myXmlHttpRequest.responseText;
                var mes_obj = eval("(" + mes + ")");
                var mes_status = mes_obj.status;
            }

            if(mes_status == "ok"){

                $('message').style = "color:green;margin-top:20px;"
                $('message').textContent = "Congratukation! This email address is avaliable!";

            }else if(mes_status == "error"){
                
                $('message').style = "color:red;margin-top:20px";
                $('message').textContent = "Sorry! This email has been registered!";

            }
        }

        function $(id) {
            return document.getElementById(id);
        }

    </script>
    <style>
        .email-exist{
            color: red;
            visibility: hidden;
        }
        .email-available{
            color:green;
            visibility: hidden;
        }
    </style>
    <title>Check Username</title>
</head>
<body>
    <section>
        <form class="register-form">
            <div class="register">
                <h2>Email:</h2><input type="text" id="email" name="email-input" onkeyup="checkEmail();"><div class="text" id = "message"></div>
                <h2>Password</h2><input type="password" class="password-input"><br/><br/>
                <button class="submit">Sign Up</button>
            </div>
        </form>
    </section>
</body>
</html>
