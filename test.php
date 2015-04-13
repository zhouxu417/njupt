<?php

include('njupt.php');


function get_td_array($table) {
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

$username='';//账号
$password='';//密码
$cookie_file =tempnam('./temp','cookie');   //创建临时文件保存cookie
$login_url = 'http://202.119.225.34/default2.aspx';//登陆地址
$post['__VIEWSTATE'] = getView($login_url);
$post['txtUserName'] = '';
$post['TextBox2'] = '';
$post['txtSecretCode'] = '';
$post['lbLanguage'] = '';
$post['RadioButtonList1'] = iconv('utf-8', 'gb2312', '学生');
$post['Button1'] = iconv('utf-8', 'gb2312', '登录');
//$post_fields = '__VIEWSTATE=dDwtMTk3MjM2MzU0MDs7Po+Vuw2g98nkvMhqN2OzPbC6DnbA&TextBox1=$username&TextBox2=$password';//POST参数
$ch = curl_init($login_url);//初始化
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
  $url='http://202.119.225.34/xskbcx.aspx?xh=B12050324';
  print_r(getView($url));
/*
//跳转到课表页面，原理同上
$url='http://202.119.225.34/xskbcx.aspx?xh=B12050324';
$post1['__VIEWSTATE'] = getView($url);
$post1['hidLanguage'] = '';
$post1['ddlXN'] = '';
$post1['ddlXQ'] = '';
$post1['Button1'] = iconv('utf-8', 'gb2312', '历年成绩');
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_HEADER, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie_file);
curl_setopt($ch, CURLOPT_POST, 1);//POST数据
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($post1));//加上POST变量
curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/40.0.2214.111');
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_AUTOREFERER, 1);
$contents = curl_exec($ch);//执行并获取HTML文档内容
iconv('GB2312', 'UTF-8', $contents);//编码转换

print_r($contents);


preg_match_all('/<table id="Table6" [^>]*>([\s\S]*?)<\/table>/',$contents,$table);//用正则表达式将课表的表格取出
 $arr = get_td_array($table[0][0]);//执行函数
 //按星期天数将课表保存到二维数组里
 for ($d=1;$d<=7;$d++){
    $shuzu[$d][1]=$arr[1][$d];
    $shuzu[$d][2]=$arr[2][$d+1];
    $shuzu[$d][3]=$arr[3][$d];
    $shuzu[$d][4]=$arr[4][$d];
    $shuzu[$d][5]=$arr[5][$d];
    $shuzu[$d][6]=$arr[6][$d];
    $shuzu[$d][7]=$arr[7][$d];
    $shuzu[$d][8]=$arr[8][$d];
    $shuzu[$d][9]=$arr[9][$d];
    $shuzu[$d][10]=$arr[10][$d];
    $shuzu[$d][11]=$arr[11][$d];
    $shuzu[$d][12]=$arr[12][$d];
    $shuzu[$d][13]=$arr[13][$d];
    $shuzu[$d][14]=$arr[14][$d];
    $shuzu[$d][15]=$arr[15][$d];
    }
 
    $xq=date('w');//取出星期几
    //根据星期几打印课表
    if($shuzu[w]==null){
    echo("你今天没有课哦！");
    }else
    print_r($shuzu[w]);
	
	
     
    curl_close($ch);//释放curl句柄
*/
?>
