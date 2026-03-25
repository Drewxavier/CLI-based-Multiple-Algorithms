<?php

function binarysearch($arr, $target){
    $left = 0;
    $right = count($arr);

    while ($left < $right){
        $mid = floor(($left + $right)/ 2);
        if($arr[$mid] == $target){
            return $mid;
        }elseif ($arr[$mid] < $target)
        {
            $left = $arr[$mid] + 1;//moving the left boundary foward
        }else{
            $right = $arr[$mid]- 1; //move the right boundary backwords since the value is smaller than the mid
        }
    }
    return -1;
}
$exam = [1,2,3,4,56,77,99];
$result = binarysearch($exam, 99);
echo "Index for the number 99\n" .$result;

//Binary search with recursion
function facturial($my_list, $low, $high, $elem){
    if ($high>=$low){
        $mid = intval(($high + $low)/2);
        if ($my_list[$mid]==$elem){
            return $mid;
        }
        elseif($my_list[$mid]< $elem){
            return facturial($my_list,$mid + 1, $high, $elem);
        }
        else{
            return facturial($my_list, $low, $mid -1, $elem);
        }
    }
    return -1;
}
$arrs= [1, 4, 5, 7, 90, 100, 560];
$result_2= facturial($arrs, 0, count($arrs) - 1, 90 );
echo "\nResult for binary search using recursion: " . $result_2;

//Linear search using recursion method
function recursivelinear($arr, $target, $elemt){//elemt in this instance replaces the need for i in a forloop so as to allow recursion
    if ($arr[$elemt] == $target){ //just going straight into it, no need for loops or anything extra
        return $elemt;
    }else{
        return recursivelinear($arr,$target,$elemt + 1);// this is to add the index, so from index 0 it goes to index 1
    }
}
$arrs_2 =[21 ,4 ,55 ,67 ,8 ,10 ,45];
$result_3=  recursivelinear($arrs_2, 10, 0);
echo "\n Recursive for linear search: " . $result_3;

//quicksort algorithm using recursive functions
function partitionRecursive($array, $pivot, $index=0, $left= [], $right= []){
    if ($index>= count($array)){
        return [$left, $right];// this is to make sure it returns the sorted arrays, if the index of the array, say it is 6 and it goes searcing for 7, it stops, and returns the values
    }
    if($array[$index] < $pivot){
        $left[]=$array[$index];
    }
    else{
        $right[]=$array[$index];
    }
    return partitionRecursive($array, $pivot, $index+1, $left, $right);
}
function recursiveQuick($array){
    $length = count($array);
    if ($length <= 1){
        return $array;
    }
    $pivot = $array[0];
    list($left, $right) = partitionRecursive(array_slice($array, 1), $pivot);
    return array_merge(recursiveQuick($left), [$pivot], recursiveQuick($right));
}

$arr_3= [23,3,5,6,77,67,45,34,64,75];
$result_4 = recursiveQuick($arr_3);

echo "\nResults for the array: ". implode(", ", $arr_3). " are: \n" . implode(", ", $result_4);

//Recursion in bubblesort array
function element(&$array, $index_1,  $index= 0){
    if ($index>=$index_1 - 1)//if there are no more values to stop
        return;
    if ($array[$index]> $array[$index+1]){
        $temp = $array[$index];
        $array[$index]= $array[$index+1];
        $array[$index+1]=$temp;     
    }
    element($array,$index_1, $index+1);//do not return
}
function recursiveBubble($array, $n=null){
    if ($n  === null) $n = count($array);//initialize n to the array length if it wasn't provided
    
    if($n == 1) return $array;//checks if the problem size has shrunk to 1 element, to stop recursion
    
    element($array, $n);
    return recursiveBubble($array, $n -1);
}
$arr_4 =[21, 42 ,33 ,55 ,45 ,57 ,76 ,7 ,98 , 8];
echo "\nBefore sort for Bubble sort: " . implode(", ", $arr_4) . "\n";
$result_5 =recursiveBubble($arr_4);
echo "After sort: " . implode( ", ", $result_5);