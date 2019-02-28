<?php
$str = "https://www.somehost.com/test/index.html?param1=4&param2=3&param3=2&param4=1&param5=3";

function getStr($str) {
   $params = [];
   $paramsStr = "";  
   $url = parse_url($str);
   $paramsTmp = explode("&", $url["query"]); 

   /**
    * Отделение параметров, заполнение массива $params    
    */
   foreach ($paramsTmp as $param) {
      $paramTmp = explode("=", $param, 2);
      if ($paramTmp[1] != 3) {
         $params[$paramTmp[0]] = $paramTmp[1];   
      }      
   }

   /**
    * Сортировка массива $params    
    */
   asort($params);   

   /**
    * Формирование выходной строки с параметрами    
    */  
   $params["url"] = $url["path"];
   return $url["scheme"] . "://" . $url["host"] . "/?" . http_build_query($params);    
}

echo "<a href='" . getStr($str) . "'>Ссылка</a>";
