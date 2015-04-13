<?php
include('njupt.php');

function getView($url){
     $res;
     //$url = 'http://202.119.225.34/default2.aspx';
	 $obj = new njupt();
     $result = $obj->curl_request($url);
     $pattern = '/<input type="hidden" name="__VIEWSTATE" value="(.*?)" \/>/is';
     preg_match_all($pattern, $result, $matches);
     $res = $matches[1][0];
     //$pattern = '/<input type="hidden" name="__VIEWSTATEGENERATOR" value="(.*?)" \/>/is';
     //preg_match_all($pattern, $result, $matches);
     //$res[1] = $matches[1][0];
     return $res;
}
$url = 'http://202.119.225.34/default2.aspx';
$stuid='B12050324';
$stupwd='Zx5845215974';
$cookie_jar = tempnam('./tmp','cookie'); 
$ch = curl_init();
$post1['__VIEWSTATE'] = getView($url);
$post1['txtUserName'] = '';
$post1['TextBox2'] = '';
$post1['txtSecretCode'] = '';
$post1['lbLanguage'] = '';
$post1['RadioButtonList1'] = iconv('utf-8', 'gb2312', '学生');
$post1['Button1'] = iconv('utf-8', 'gb2312', '登录');

curl_setopt($ch, CURLOPT_URL,'http://202.119.225.34/default2.aspx'); //地址
curl_setopt($ch, CURLOPT_POST, 1); 
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($post1)); 
curl_setopt($ch, CURLOPT_COOKIEJAR, $cookie_jar); 
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
curl_setopt($ch, CURLOPT_HEADER, 0); 
curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows; U; Windows NT 5.1; zh-CN; rv:1.9.1.5) Gecko/20091102 Firefox/3.5.5');
curl_setopt($ch, CURLOPT_FOLLOWLOCATION,1);
curl_setopt($ch, CURLOPT_NOBODY, false); 
curl_exec($ch); 
curl_close($ch); 

//print_r($orders);

$ch0 = curl_init();


curl_setopt($ch0, CURLOPT_URL,"http://202.119.225.34/xscj_gc.aspx?xh=B12050324"); 
curl_setopt($ch0, CURLOPT_HEADER, 0); 
curl_setopt($ch0, CURLOPT_RETURNTRANSFER, 1); 
curl_setopt($ch0, CURLOPT_COOKIEFILE, $cookie_jar); 
$orders = curl_exec($ch0); 
	/*
	$orders=preg_replace("/\r\n/","",$orders);
	$orders=preg_replace("/\r/","",$orders);
	$orders=preg_replace("/\n/","",$orders);
	$orders=preg_replace("/\t/","",$orders);
	$orders=preg_replace("/ /","",$orders);
	preg_match_all('/__VIEWSTATE"value="(.+?)"\/>/',$orders,$viewstate);
	$viewstate=$viewstate[1][0];

	*/
	//get data after login 
$ch2 = curl_init(); 
$url="http://202.119.225.34/xscj_gc.aspx?xh=B12050324&";
//$post['__VIEWSTATE'] = 'dDwxODI2NTc3MzMwO3Q8cDxsPHhoOz47bDxCMTIwNTAzMjQ7Pj47bDxpPDE+Oz47bDx0PDtsPGk8MT47aTwzPjtpPDU+O2k8Nz47aTw5PjtpPDExPjtpPDEzPjtpPDE2PjtpPDI2PjtpPDI3PjtpPDI4PjtpPDM1PjtpPDM3PjtpPDM5PjtpPDQxPjtpPDQ1Pjs+O2w8dDxwPHA8bDxUZXh0Oz47bDzlrablj7fvvJpCMTIwNTAzMjQ7Pj47Pjs7Pjt0PHA8cDxsPFRleHQ7PjtsPOWnk+WQje+8muWRqOaXrTs+Pjs+Ozs+O3Q8cDxwPGw8VGV4dDs+O2w85a2m6Zmi77ya6Ieq5Yqo5YyW5a2m6ZmiOz4+Oz47Oz47dDxwPHA8bDxUZXh0Oz47bDzkuJPkuJrvvJo7Pj47Pjs7Pjt0PHA8cDxsPFRleHQ7PjtsPOiHquWKqOWMljs+Pjs+Ozs+O3Q8cDxwPGw8VGV4dDs+O2w86KGM5pS/54+t77yaQjEyMDUwMzs+Pjs+Ozs+O3Q8cDxwPGw8VGV4dDs+O2w8MjAxMjE2MDE7Pj47Pjs7Pjt0PHQ8O3Q8aTwxNj47QDxcZTsyMDAxLTIwMDI7MjAwMi0yMDAzOzIwMDMtMjAwNDsyMDA0LTIwMDU7MjAwNS0yMDA2OzIwMDYtMjAwNzsyMDA3LTIwMDg7MjAwOC0yMDA5OzIwMDktMjAxMDsyMDEwLTIwMTE7MjAxMS0yMDEyOzIwMTItMjAxMzsyMDEzLTIwMTQ7MjAxNC0yMDE1OzIwMTUtMjAxNjs+O0A8XGU7MjAwMS0yMDAyOzIwMDItMjAwMzsyMDAzLTIwMDQ7MjAwNC0yMDA1OzIwMDUtMjAwNjsyMDA2LTIwMDc7MjAwNy0yMDA4OzIwMDgtMjAwOTsyMDA5LTIwMTA7MjAxMC0yMDExOzIwMTEtMjAxMjsyMDEyLTIwMTM7MjAxMy0yMDE0OzIwMTQtMjAxNTsyMDE1LTIwMTY7Pj47Pjs7Pjt0PHA8O3A8bDxvbmNsaWNrOz47bDx3aW5kb3cucHJpbnQoKVw7Oz4+Pjs7Pjt0PHA8O3A8bDxvbmNsaWNrOz47bDx3aW5kb3cuY2xvc2UoKVw7Oz4+Pjs7Pjt0PHA8cDxsPFZpc2libGU7PjtsPG88dD47Pj47Pjs7Pjt0PEAwPDs7Ozs7Ozs7Ozs+Ozs+O3Q8QDA8Ozs7Ozs7Ozs7Oz47Oz47dDxAMDw7Ozs7Ozs7Ozs7Pjs7Pjt0PDtsPGk8MD47aTwxPjtpPDI+O2k8ND47PjtsPHQ8O2w8aTwwPjtpPDE+Oz47bDx0PDtsPGk8MD47aTwxPjs+O2w8dDxAMDw7Ozs7Ozs7Ozs7Pjs7Pjt0PEAwPDs7Ozs7Ozs7Ozs+Ozs+Oz4+O3Q8O2w8aTwwPjtpPDE+Oz47bDx0PEAwPDs7Ozs7Ozs7Ozs+Ozs+O3Q8QDA8Ozs7Ozs7Ozs7Oz47Oz47Pj47Pj47dDw7bDxpPDA+Oz47bDx0PDtsPGk8MD47PjtsPHQ8QDA8Ozs7Ozs7Ozs7Oz47Oz47Pj47Pj47dDw7bDxpPDA+O2k8MT47PjtsPHQ8O2w8aTwwPjs+O2w8dDxAMDxwPHA8bDxWaXNpYmxlOz47bDxvPGY+Oz4+Oz47Ozs7Ozs7Ozs7Pjs7Pjs+Pjt0PDtsPGk8MD47PjtsPHQ8QDA8cDxwPGw8VmlzaWJsZTs+O2w8bzxmPjs+Pjs+Ozs7Ozs7Ozs7Oz47Oz47Pj47Pj47dDw7bDxpPDA+Oz47bDx0PDtsPGk8MD47PjtsPHQ8cDxwPGw8VGV4dDs+O2w8WkpVOz4+Oz47Oz47Pj47Pj47Pj47dDxAMDw7Ozs7Ozs7Ozs7Pjs7Pjs+Pjs+Pjs+8Gevuw7sDTK3XFzFQeRbnLVFgvc=';
$post['__VIEWSTATE'] = getView($url);
$post['hidLanguage'] = '';
$post['ddlXN'] = '';
$post['ddlXQ'] = '';
$post['Button1'] = iconv('utf-8', 'gb2312', '历年成绩');

//$url="http://202.119.225.34/xscj_gc.aspx?xh=B12050324&xm=周旭&gnmkdm=N121605";
curl_setopt($ch2, CURLOPT_URL,$url); 
curl_setopt($ch2, CURLOPT_POST,1); 
curl_setopt($ch2, CURLOPT_POSTFIELDS,  http_build_query($post)); 
curl_setopt($ch2, CURLOPT_COOKIEJAR, $cookie_jar); 
curl_setopt($ch2, CURLOPT_COOKIEFILE, $cookie_jar); 
curl_setopt($ch2, CURLOPT_RETURNTRANSFER,1); 
curl_setopt($ch2, CURLOPT_HEADER, 0); 
$orders = curl_exec($ch2); 
print_r($orders);
curl_close($ch2);

?>
