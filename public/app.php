<?
//微信QQ自动跳转源码[一个域名跳转版本]
error_reporting(0);
header('Content-Type: text/html; charset=UTF-8');
header('Cache-Control: no-store, no-cache');
$geturl = 'https://2pzd3.zfvsjn.com/y5wh1';
$shebeiid = get_device_type();
if(strpos($_SERVER['HTTP_USER_AGENT'], 'QQ/')!==false){
if($shebeiid == 'android'){
echo '<!DOCTYPE html>
<html>
 <head>
  <title>正在打开浏览器...</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">	  
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">	
	<style>
		body{background-color:#333;}
		img{width:100%;}
	</style>  
 </head>
 <body><img src="1.png" /></body>
</html>';
exit;	
}else{
echo '<!DOCTYPE html>
<html>
<head>
    <title>正在打开浏览器...</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">	
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">	
	<style>
		body{background-color:#333;}
		img{width:100%;}
	</style>
</head>
<body>
<img src="2.png" />
</body>
</html>';
exit;	
}
}elseif(strpos($_SERVER['HTTP_USER_AGENT'], 'MicroMessenger')!==false){
if($shebeiid == 'android'){	
echo '<!DOCTYPE html>
<html>
 <head>
  <title>正在打开浏览器...</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">	  
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">	
	<style>
		body{background-color:#333;}
		img{width:100%;}
	</style>  
 </head>
 <body><img src="1.png" /></body>
</html>';
exit; 
}else{
echo '<!DOCTYPE html>
<html>
<head>
    <title>正在打开浏览器...</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">	
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">	
	<style>
		body{background-color:#333;}
		img{width:100%;}
	</style>
</head>
<body>
<img src="2.png" />
<!--风格1<img src="2.png" />-->
<!--风格2<img src="1.png" />
根据自己选择;正式使用请把这些注释删除即可-->
</body>
</html>';
exit;
}
}else{
	exit('<script>window.location.href="'.$geturl.'";</script>');
}
function get_device_type()
{
 $agent = strtolower($_SERVER['HTTP_USER_AGENT']);
 $type ='other';
 if(strpos($agent,'iphone') || strpos($agent,'ipad'))
 {
 $type ='ios';
 }
 if(strpos($agent,'android'))
 {
 $type ='android';
 }
 return $type;
}
?>