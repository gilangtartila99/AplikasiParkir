<?php

namespace common\models;

class PTotal {
public static function pageTotal($provider, $fieldName)
{
    $total=0;
    foreach($provider as $item){
        $total+=$item[$fieldName];
    }
    return $total;
}
$provider = new ActiveDataProvider([
'query' => $query,
'sort' => $sort,
]);
}