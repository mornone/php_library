<?php
//var_dump($_SERVER);exit;
$cookie_file = tempnam('./temp', 'cookie');  //创建cookie文件保存的位置
//echo $cookie_file;exit;
function  curl($url, $data = array(), $method, $setcooke = false, $cookie_file = false)
{
    $ch = curl_init();     //1.初始化
    curl_setopt($ch, CURLOPT_URL, $url); //2.请求地址
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);//3.请求方式
    //4.参数如下    禁止服务器端的验证
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
    //伪装请求来源，绕过防盗
    //curl_setopt($ch,CURLOPT_REFERER,"http://wthrcdn.etouch.cn/");
    //配置curl解压缩方式（默认的压缩方式）
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Accept-Encoding:gzip'));
    curl_setopt($ch, CURLOPT_ENCODING, "gzip");

    curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:44.0) Gecko/20100101 Firefox/44.0'); //指明以哪种方式进行访问
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ch, CURLOPT_AUTOREFERER, 1);
    if ($method == "POST") {//5.post方式的时候添加数据
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    }
    if ($setcooke == true) {
        //如果设置要请求的cookie，那么把cookie值保存在指定的文件中
        curl_setopt($ch, CURLOPT_COOKIEJAR, $cookie_file);
    } else {
        //就从文件中读取cookie的信息
        curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie_file);
    }
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $tmpInfo = curl_exec($ch);

    if (curl_errno($ch)) {
        return curl_error($ch);
    }
    curl_close($ch);
    return $tmpInfo;
}


//模拟get请求
$url="http://www.baidu.com/";
$str=curl($url,array(),'GET');
//echo $str;exit;
//post请求
$url="http://test.vmware/interview/test1.php";
$data=array('username'=>'abc');
$str=curl($url,$data,'POST');
echo $str;

//模拟登陆
//登陆保存用户信息到cookie中
/*
$url = "http://www.ecshop.com/user.php";
$data = array('username' => 'ecshop', 'password' => 'ecshop', 'remember' => '1', 'act' => 'act_login', 'back_act' => './index.php', 'submit' => '');
//post提交
curl($url, $data, 'POST', true, $cookie_file);
//get获取
$url = "http://www.ecshop.com/user.php?act=order_list";
$str = curl($url, array(), 'GET', false, $cookie_file);
echo $str;*/
