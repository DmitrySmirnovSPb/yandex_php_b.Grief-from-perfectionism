<?php
  ini_set('memory_limit', '256M');

  $str = file_get_contents('input.txt');
  $ar = explode("\n", $str);
  $usl = explode(" ", $ar[0]);
  $sk = explode(" ", $ar[1]);
  $result =[];
  $ost = [];
  $strRes = '';
  foreach($sk as $key=>$value){
    if($value == $usl[1]) $result[$key+1] = 0;
    else
      $ost[$key+1] = abs($value - $usl[1]);
  }
  if(count($ost) != 0){
    asort($ost);
    $flag = $usl[2];
    foreach($ost as $key => $value){
      $flag -= $value;
      if($flag >= 0) $result[$key] = $flag;
      else break;
    }
  }
  if(count($result) == 0)$strRes = '0';
  else{
    $strRes = count($result)."\n";
    foreach($result as $key => $value) $strRes .= $key.' ';
  }
  
  file_put_contents('output.txt',$strRes);
?>