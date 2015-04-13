<?php

include('njupt.php');

function get_td_array($table) {
        $pattern =  '/<table class="datelist" cellspacing="0" cellpadding="3" border="0" id="Datagrid1" width="100%">(.*?)<\/table>/is';


        $table = preg_replace("'<table[^>]*?>'si","",$table);
        $table = preg_replace("'<tr[^>]*?>'si","",$table);
        $table = preg_replace("'<td[^>]*?>'si","",$table);
        $table = str_replace("</tr>","{tr}",$table);
        $table = str_replace("</td>","{td}",$table);
        //去掉 HTML 标记
        $table = preg_replace("'<[/!]*?[^<>]*?>'si","",$table);
        //去掉空白字符
        $table = preg_replace("'([rn])[s]+'","",$table);
        $table = preg_replace('/&nbsp;/',"",$table);
        $table = str_replace(" ","",$table);
        $table = str_replace(" ","",$table);
        $table = explode('{tr}', $table);
        array_pop($table);
        foreach ($table as $key=>$tr) {
                $td = explode('{td}', $tr);
                array_pop($td);
            $td_array[] = $td;
        }
        return $td_array;
}


function getView(){
     $res;
     $url = 'http://202.119.225.34/default2.aspx';
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


#print_r(getView());


     $url = 'http://202.119.225.34/default2.aspx';
     $post['__VIEWSTATE'] = getView();
     $post['txtUserName'] = '';
     $post['TextBox2'] = '';
     $post['txtSecretCode'] = '';
     $post['lbLanguage'] = '';
     $post['RadioButtonList1'] = '%D1%A7%C9%FA';
     $post['Button1'] = '';
	 $post['hidPdrs'] = '';
	 $post['hidsc'] = '';
$cookie_file =tempnam('./temp','cookie'); 
$ch = curl_init($url);//初始化
curl_setopt($ch, CURLOPT_HEADER, 1);//0显示
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);//1不显示
curl_setopt($ch, CURLOPT_POST, 1);//POST数据
curl_setopt($ch, CURLOPT_COOKIEJAR, $cookie_file);//保存cookie
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($post));//加上POST变量
curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/40.0.2214.111');
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_AUTOREFERER, 1);
curl_exec($ch);
curl_close($ch);

//print_r($post['__VIEWSTATE']);

//$lurl = 'http://202.119.225.34/xscj_gc.aspx?xh=B12050324&xm=%D6%DC%D0%F1&gnmkdm=N121605';
$lurl = 'http://202.119.225.34/xskbcx.aspx?xh=B12050324&xm=%D6%DC%D0%F1&gnmkdm=N121603';
$ch1 = curl_init($lurl);//初始化
curl_setopt($ch1, CURLOPT_HEADER, 1);//0显示
curl_setopt($ch1, CURLOPT_RETURNTRANSFER, 1);//1不显示
curl_setopt($ch1, CURLOPT_POST, 0);//POST数据
curl_setopt($ch1, CURLOPT_COOKIEJAR, $cookie_file);//保存cookie
curl_setopt($ch1, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/40.0.2214.111');
curl_setopt($ch1, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch1, CURLOPT_COOKIEFILE, $cookie_file); 
curl_setopt($ch1, CURLOPT_REFERER, "http://202.119.225.34/xs_main.aspx?xh=B12050324");
//curl_setopt($ch1 CURLOPT_AUTOREFERER, 1);
$res = curl_exec($ch1);
curl_close($ch1);
//print_r($res);

     $pattern = '/name="__VIEWSTATE" value="(.*?)" \/>/is';
     preg_match_all($pattern, $res, $matches);
	 
	  $vie = $matches[1][0];



//$rescook = login();
//print_r($vie);


     $post1['__VIEWSTATE'] = $vie;
     $post1['__EVENTTARGET'] = 'xqd';
	 $post1['__EVENTARGUMENT'] = '';
	 $post1['xnd'] = '2014-2015';
	 $post1['xqd'] = '2';

$ch2 = curl_init($lurl);//初始化
curl_setopt($ch2, CURLOPT_HEADER, 1);//0显示
curl_setopt($ch2, CURLOPT_RETURNTRANSFER, 1);//1不显示
curl_setopt($ch2, CURLOPT_POST, 1);//POST数据
curl_setopt($ch2, CURLOPT_COOKIEJAR, $cookie_file);//保存cookie
curl_setopt($ch2, CURLOPT_POSTFIELDS, http_build_query($post1));//加上POST变量
curl_setopt($ch2, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/40.0.2214.111');
curl_setopt($ch2, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch2, CURLOPT_COOKIEFILE, $cookie_file); 
curl_setopt($ch2, CURLOPT_REFERER, "http://202.119.225.34/xskbcx.aspx?xh=B12050324&xm=%D6%DC%D0%F1&gnmkdm=N121603");

$res1 = curl_exec($ch2);
curl_close($ch2);
//print_r($res1);

$pattern1 =  '/<table id="Table1" class="blacktab" bordercolor="Black" border="0" width="100%">(.*?)<\/table>/is';
preg_match_all($pattern1, $res1, $matches1);
print_r($matches1[1][0]);

?>
