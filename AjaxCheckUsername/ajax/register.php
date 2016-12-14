<!DOCTYPE html>
<html>
<head>
    <title>User Register</title>
    <script type="text/javascript">
        //创建ajax引擎
        function getXmlHttpObject(){

            var xmlHttpRequest;

            //不同的浏览器创建xmlhttprequest对象的方法是不一样的
            if (window.ActiveXObject) {
                //判断用户的浏览器是ie内核的浏览器
                    //创建xmlHttpRequest对象
                    xmlHttpRequest = new ActiveXObject("Microsoft.XMLHTTP");
            }else{
                //判断用户的浏览器是非ie内核
                    //创建xmlHttpRequest对象
                    xmlHttpRequest = new XMLHttpRequest();
            }
            //返回对象
            return xmlHttpRequest;
        }

        var myXmlHttpRequest=""; //1号线，创建ajax引擎对象

        //验证用户名是否存在
        function checkName(){

             myXmlHttpRequest = getXmlHttpObject();

            //判断对象是否创建成功
            if(myXmlHttpRequest){
                //对象创建成功，通过对象发送请求到服务器的某个页面(第一个参数表示请求的方式get／post，第二个参数指定url即对哪个页面发出请求，第三个参数ture表示使用异步机制，false表示不使用)
                var url = "/AjaxCheckUsername/ajax/registerProcess.php";
                //这是要发送的数据 
                var data = "username="+$('username').value;                                                                
                //打开请求
                myXmlHttpRequest.open("post",url,true);
                //这句代码必须要带上
                myXmlHttpRequest.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
                //指定回调函数(process代表一个函数名)
                myXmlHttpRequest.onreadystatechange = process;
                //真的发送请求(如果是get请求，则填入空即可，如果是post请求，则填入实际的数据)
                myXmlHttpRequest.send(data); //2号线，发送http请求

            }else{
                window.alert("创建失败");
            }
        }


        //回调函数
        function process(){
            
            //window.alert("处理函数被调用"+myXmlHttpRequest.readyState);

            //取出从registerProcess.php返回的数据
            if(myXmlHttpRequest.readyState == 4){

                //取出值，根据返回信息的格式而定
                //window.alert("服务器返回了"+myXmlHttpRequest.responseText);//4号线，取出值
                
                /*
                if (myXmlHttpRequest.responseText == "恭喜您！用户名可用！"){

                    document.getElementById("checkUsernameRes").value = myXmlHttpRequest.responseText;
                    document.getElementById("checkUsernameRes").style = "border-width:0; color:green;margin-left:20px";
                } else if(myXmlHttpRequest.responseText == "用户名不可用！选个其他的吧"){
                    document.getElementById("checkUsernameRes").value = myXmlHttpRequest.responseText;
                    document.getElementById("checkUsernameRes").style = "border-width:0;color:red;margin-left:20px;width:300px";
                }
                */
                
                //取出xml格式数据中的值
                var mes = myXmlHttpRequest.responseXML.getElementsByTagName("mes");//获取mes节点
                var mes_val = mes[0].childNodes[0].nodeValue; //mes[0]表示取出第一个mes节点，childNodes[0]表示取出第一个mes节点的第一个子节点

                    if (mes_val == "恭喜，用户名可用！"){
                
                        document.getElementById("checkUsernameRes").value = mes_val;
                        document.getElementById("checkUsernameRes").style = "border-width:0; color:green;margin-left:20px";
                    } else if(mes_val == "对不起，用户名已存在！"){
                        document.getElementById("checkUsernameRes").value = mes_val;
                        document.getElementById("checkUsernameRes").style = "border-width:0;color:red;margin-left:20px;width:300px";
                    }

            
            }
        }

        //
        function $(id){
            return document.getElementById(id);
        }
    </script>

    <style type="text/css">
        .check-username{
            width: 150px;
            margin-left: 10px;
            border: 0px;
            background-color: lightblue;
        }

    </style>
</head>
<body>
    <form>
        <div class="sign-up-form">
            <h2>WELCOME TO TERRAN STALKER TRACKING SYSTEM</h2>
                <span>Please enter your details.</span>
            <h3>E-mail Address:</h3>
                <input type="email" class="email">
            <h3>Password:</h3>
                <input type="password" class="password">
            <h3>Confirm Password:</h3>
                <input type="password" class="password">
            <h3>Username:</h3>
                <input type="text" class="user-name" id="username" onkeyup="checkName();"><input style="border-width: 0 ;" type="text" id = "checkUsernameRes" ></br>
            </br><button class="sign-up-button">Sign Up</button>  
        </div>
    </form>
</body>
</html>
        
    
