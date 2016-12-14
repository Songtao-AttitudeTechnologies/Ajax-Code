<?php


	//这两句话很重要
	header("Content-Type: text/xml;charset=utf-8");//告诉浏览器返回的数据是xml格式
	header("Cache-Control: no-cache");//告诉浏览器不要缓存数据

	//接受数据
	$username = $_POST['username'];

	if($username == "daisongtao"){
		echo "用户名不可用！选个其他的吧";
	}else{
		echo "恭喜您！用户名可用！";
	}


?>
