<?php
//约瑟夫环问题

function monkeyKing($n,$m)
{
	$arr=range(1,$n);
	$i=1;
	while(count($arr)>1){//只留一个活口
		if($i%$m<>0){
			$arr[]=$arr[$i-1];
		}
		unset($arr[$i-1]);
		$i++;
	}
	//$arr[0]=$i;
	return $arr[$i-1];
}
//echo "猴子大王是".monkeyKing(1000000,3);

//留存活口数量约瑟夫环
function monkeyKing1($n,$m,$s)
{
	$arr=range(1,$n);
	$i=1;
	while(count($arr)>$s){
		if($i%$m<>0){
			$arr[]=$arr[$i-1];
		}
		unset($arr[$i-1]);
		$i++;
	}
	//$arr[0]=$i;
	return $arr;
}
echo "猴子大王是";
//var_dump(monkeyKing1(1000000,3,2));



//约瑟夫环，栈理解
function ysf($n,$m,$s)
{
	$arr=range(1,$n);
	$i=0;
	while(count($arr)>$s){ //保留几个人留几个人
		++$i;
		$survive=array_shift($arr);
		if($i%$m!=0){
			array_push($arr,$survive);			
		}
	}
	return $arr;
}

echo "猴子大王是";var_dump(ysf(1000000,3,2));

function yuesefu($n,$m)
{
	$r=0;
	for($i=2;$i<=$n;$i++){
		$r=($r+$m)%$i;
	}
	return $r+1;		
}

echo "<br/>猴子大王是".yuesefu(1000000,3);

//数组随机取得
function arr_rand($n,$m){
	$arr=array_rand(range(1,10000),100);
	var_dump($arr);
}




