<?php
$arUrlRewrite=array (
   
  array (
    'CONDITION' => '#^/rest/#',
    'RULE' => '',
    'ID' => NULL,
    'PATH' => '/bitrix/services/rest/index.php',
    'SORT' => 100,
  ),

  array (
    'CONDITION' => '#^/api/#',
    'RULE' => '',
    'ID' => NULL,
    'PATH' => '/api/ability.output/output.php',
  ),

  array (
    'CONDITION' => '#^/api/#',
    'RULE' => '',
    'ID' => NULL,
    'PATH' => '/api/ability.addition/addition.php',
  ),


);
