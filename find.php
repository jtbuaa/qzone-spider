#http://bbs.csdn.net/topics/390909070

#模拟浏览器查找好友列表
$url="http://cgi.find.qq.com/qqfind/buddy/search_v3"
$header=array(
'POST /qqfind/buddy/search_v3 HTTP/1.1
Host: cgi.find.qq.com
Connection: keep-alive
Content-Length: 172
Accept: application/json, text/javascript, */*; q=0.01
Origin: http://find.qq.com
User-Agent: Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/29.0.1547.66 Safari/537.36 LBBROWSER
Content-Type: application/x-www-form-urlencoded; charset=UTF-8
Referer: http://find.qq.com/index.html?version=2&width=1200&height=610&search_target=0
Accept-Encoding: gzip,deflate,sdch
Accept-Language: zh-CN,zh;q=0.8
Cookie: pvid=6624798504; province=BJ; RK=wgU7Gb0xOU; isVideo_DC=0; ptui_loginuin=1416125030; pt2gguin=o1416125030; uin=o1416125030; skey=@W2LDjGYAD; ptisp=cnc; ptcz=7516da239c7cfa4bae5b6e7c7e5577294ba11ffbd92355b9669fcbbb27d57a93; pgv_info=ssid=s4991867251; pgv_pvid=7864940460; o_cookie=1416125030; uid=27864008; itkn=2346846038'
);
$params = "num=20&page=0&sessionid=0&keyword=&agerg=0&sex=2&firston=1&video=0&country=0&province=0&city=0&district=0&hcountry=0&hprovince=0&hcity=0&hdistrict=0&online=1&ldw=1946652269";
$ch = curl_init($url);
curl_setopt($ch, curlOPT_RETURNTRANSFER,1);
curl_setopt( $ch,CURLOPT_HEADER,$header );
curl_setopt ( $ch, CURLOPT_POST, 1 );
curl_setopt ( $ch, CURLOPT_POSTFIELDS, $params );
//curl_setopt($ch,curlOPT_proxy,$proxy);
//curl_setopt($ch,curlOPT_proxyPORT,$proxyport);
curl_setopt ($ch, CURLOPT_TIMEOUT, 120);
$result = curl_exec($ch);
$tmp = json_decode($result);
print_r($tmp);
