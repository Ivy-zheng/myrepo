<?php

$heap = new SplMinHeap();
$heap->insert("data1");
$heap->insert("data2");
echo $heap->extract();
echo $heap->extract();
//输出结果为
//data1</span>

$stack = new SplStack();
$stack->push('data1');
$stack->push('data2');
$stack->push('data3');
echo '-------<br/>';
echo $stack->pop();
echo '-------<br/>';
echo $stack->pop();
echo '-------<br/>';
echo $stack->pop();
echo '-------<br/>';
 
//输出结果为
//data3</span><span style="font-size:24px;font-weight: bold;">

function releative_path($path1,$path2){
	echo dirname($path1).'<br/>';
	echo basename($path1).'<br/>';

        $arr1 = explode("/",dirname($path1));
        $arr2 = explode("/",dirname($path2));
 
        for ($i=0,$len = count($arr2); $i < $len; $i++) {
            if ($arr1[$i]!=$arr2[$i]) {
                break;
            }
        }
        echo $i.'<br/>';
        // 不在同一个根目录下
        if ($i==1) {
            $return_path = array();
        }
 
        // 在同一个根目录下
        if ($i != 1 && $i < $len) {
            $return_path = array_fill(0, $len - $i,"..");
        }
 
        // 在同一个目录下
        if ($i == $len) {
            $return_path = array('./');
        }
        echo '--------------'.'<br/>';
        var_dump($arr1);
        var_dump(array_slice($arr1,$i));
        $return_path = array_merge($return_path,array_slice($arr1,$i));
        return implode('/',$return_path);
    }
 
    $a = '/a/b/c/d/e.php';
    $b = '/a/b/12/34/c.php';
    $c = '/e/b/c/d/f.php';
    $d = '/a/b/c/d/g.php';
 
    echo releative_path($a,$b);//结果是../../c/d
    echo "<br />";
    echo releative_path($a,$c);//结果是a/b/c/d
    echo "<br />";
    echo releative_path($a,$d);//结果是./
    echo "<br />";

//获取上个月第一天
 echo date('Y-m-01',strtotime('-1 month'));
 
 //获取上个月最后一天
 echo date('Y-m-t',strtotime('-1 month'));
 exit;


function writeLock()
{
	$fp = fopen("lock.txt","a+");
	if(flock($fp,LOCK_EX))
	{
		fwrite($fp,"lock");

		flock($fp,LOCK_UN);
	}else
	{
		echo "file is locking";
	}
	fclose($fp);
}

function getExt($url)
{
    echo pathinfo(parse_url($url)['path'])['extension'];
}

getExt("https://www.cnblogs.com/ivy-zheng/p/10925451.html");die;

function getFile($dir)
{
	if(!is_dir($dir)) return false;
	$handle = @opendir($dir);
	$path = array();
	while(($file = readdir($handle)) !== false)
	{
		if($file != "." && $file == "..")
		{
			if(is_dir($dir.'/'.$file))
			{
				$path = getFile($dir.'/'.$file);
			}
			else
			{
				$path[$file] = $dir.'/'.$file;
			}
		}
	}
	return $path;
}

function set($str){
    //转化为数组
    $arr = str_split($str);
    var_dump($arr);
    //去除重复
    $arr = array_flip(array_flip($arr));
    //排序
    sort($arr);
    //返回字符串
    return implode('', $arr);
}
$str = "jsfsfagsaf22229911dfhdf";

var_dump(set($str));die;

function king($n, $m){
    $monkeys = range(1, $n);         //创建1到n数组
	$i=0;
	while (count($monkeys)>1) {	 //循环条件为猴子数量大于1
		if(($i+1)%$m==0) {	 //$i为数组下标;$i+1为猴子标号
			unset($monkeys[$i]);	//余数等于0表示正好第m个，删除，用unset删除保持下标关系
		} else {
			array_push($monkeys,$monkeys[$i]);     //如果余数不等于0，则把数组下标为$i的放最后，形成一个圆形结构
			unset($monkeys[$i]);
		}
			$i++;//$i 循环+1，不断把猴子删除，或 push到数组 
	}
	return current($monkeys);	//猴子数量等于1时输出猴子标号，得出猴王
}
echo king(6,3);die;


//二维数组排序
$data = array(
  array(
    'id' => 5698,
    'first_name' => 'Bill',
    'last_name' => 'Gates',
  ),
  array(
    'id' => 4767,
    'first_name' => 'Steve',
    'last_name' => 'Aobs',
  ),
  array(
    'id' => 3809,
    'first_name' => 'Mark',
    'last_name' => 'Zuckerberg',
  )
);
//根据字段last_name对数组$data进行降序排列
// $last_names = array_column($data,'last_name');
// array_multisort($last_names,SORT_DESC,$data);

// var_dump($data);die;

function array_sort($arr,$key,$order)
{
	$columns = array_column($arr,$key);
	$o = $order == 0?SORT_ASC:SORT_DESC;
	array_multisort($columns,$o,$arr);
	return $arr;
}
var_dump(array_sort($data,"id",1));die;


$array = [3,7,9,13,34,77,88,90,300];
function  binarySearch($arr, $val, $st, $et){
    $m_ind = floor(($st + $et) / 2);
    $max_idx = count($arr)-1;
    $min_idx = 0;
         
    if($arr[$min_idx]>$val || $arr[$max_idx]<$val || ($et-$st==1 && $arr[$et]!=$val && $arr[$st]!=$val)){
            return -1;
    }
   
    if($arr[$m_ind]==$val){
            return $m_ind;
    } else if($arr[$m_ind] > $val){
        $et = $m_ind - 1;
        return binarySearch($arr, $val, $st, $et);
    } else {
        $st = $m_ind + 1;
        return binarySearch($arr, $val, $st, $et);
    }
}
$cnt = count($array);
$t = 77;
var_dump(binarySearch($array,$t,0,$cnt));die;

$array = [77,8,33,2,6,90,43];
//快速排序（数组排序）
function quick_sort($arr)
{
	if(count($arr) <= 1) return $arr;
	$key = $arr[0];
	$left = [];
	$right = [];
	for($i =1;$i < count($arr);$i++)
	{
		if($arr[$i] <= $key)
		{
			$left[] = $arr[$i];
		}
		else
		{
			$right[] = $arr[$i];
		}
	}
	$left = quick_sort($left);
	$right = quick_sort($right);

	return array_merge($left,array($key),$right);
}
var_dump(quick_sort($array));die;

//冒泡排序
function bubble($array)
{
	$cnt = count($array);
	if($cnt <= 0) return $array;
	for($i =1;$i < $cnt;$i++)
	{
		for($j = 0;$j < $cnt-$i;$j ++)
		{
			if($array[$j] > $array[$j+1])
			{
				$tmp = $array[$j];
				$array[$j] = $array[$j+1];
				$array[$j+1] = $tmp;
			}

		}
	} 
	return $array;
} 

var_dump(bubble($array));