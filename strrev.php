<?php
//strrev和自定义函数反转字符串 遇到中文都会乱码

//one.自定义函数 可以反转数字英文，反转中文乱码
header("content-type:text/html;chartset=utf-8");
function  str_rev($str)
{
	$i=0;
	$o='';
	while(isset($str[$i])){
	$o=$str[$i++].$o;
	}
	return $o;
}

echo "自定义函数无中文反转结果 hello9989:".str_rev("hello9989")."</br>";
echo "自定义函数包含中文反转结果 hello中国9989:".str_rev("hello中国9989")."</br>";

function str_rev2($str)
{
	for($i=0;true;$i++){
		if(!isset($str[$i])){
			break;
		}
	}
	$row='';
	for($j=$i-1;$j>=0;$j--){
		$row.=$str[$j];
	}
	return $row;
}
echo "自定义函数反转结果 hello9989".strrev("hello9989")."</br>";
echo "自定义函数反转结果 hello中国9989:".str_rev2("hello中国9989")."</br>";

//two.内置函数strrev 反转中文也会报错
echo "系统函数反转无中文hello9989：".strrev("hello9989")."</br>";
echo "系统函数反转中文结果hello中国9989：".strrev("hello中国9989")."</br>";


//three 包含中文字符反转 mb_strlen统计中文字符占一位和mb_substr结合
function str_rev_gbk($str,$encodeing='utf-8'){
	if(!is_string($str)||!mb_check_encoding($str,"utf-8")){
		die("输入的不是utf-8类型字符串");
	}
	$len=mb_strlen($str);
	$row='';
	echo "统计长度:".$len."<br/>";
	for($i=$len-1;$i>=0;$i--){
		$row.=mb_substr($str,$i,1,$encodeing);
	}
	return $row;
}

echo "mb_strlen和mb_substr结合，反转无中文 \"你好hello中国9989\"：".str_rev_gbk("你好hello中国9989")."</br>";

//four 统计自然长度 同strlen()，说明长度不影响反转结果，关键是ms_substr()函数
function str_rev_gbk2($str,$encodeing='utf-8'){
	if(!is_string($str)||!mb_check_encoding($str,"utf-8")){
		die("输入的不是utf-8类型字符串");
	}
	//for循环等价于等价于$len=strlen($str);
	for($len=0;true;$len++){
		if(!isset($str[$len])){
			break;
		}
	}	
	echo "统计长度:".$len."<br/>";
	$row='';
	for($i=$len-1;$i>=0;$i--){
		$row.=mb_substr($str,$i,1,$encodeing);
	}
	return $row;
}
echo "mb_strlen和mb_substr结合，反转无中文 \"你好hello中国9989\"：".str_rev_gbk2("你好hello中国9989")."</br>";


//**five 递归实现反转 */
function str_rev_way5($str){	
    if(strlen($str)>0){
        str_rev_way5(mb_substr($str,1));		
    }   
	echo mb_substr($str,0,1);	
    return ;
}
echo "递归反转，反转无中文 \"你好hello中国9989\"：".str_rev_way5("你好hello中国9989")."</br>";


