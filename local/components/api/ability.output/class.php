<?php 
use  OmegaMod\Entity\AbilityTable;
use  Bitrix\Main\Loader;
class output_ability extends \CBitrixComponent
{
    public function executeComponent()
    {
         $get = (array) $this->request->getQueryList()->toArray();

        Loader::includeModule('omega.mod');
        $ability =  AbilityTable::getList(array(
                        'select' => array('UF_TITLE','UF_ELEMENT'),
                         'filter' => ['ID'=>$get["ID"]]              
              ))->fetchAll();
              if(empty($ability))
              header('HTTP/1.1 204 No Content');
          header('Content-Type: application/json; charset=utf-8');
          echo json_encode($ability);
    }
}





// use  BlockMod\Entity\AuthorTable;
// use  Bitrix\Main\Loader;
// class Author extends \CBitrixComponent
// {

//     public function executeComponent()
//     {
//          $get = (array) $this->request->getQueryList()->toArray();

//         Loader::includeModule('block.mod');
//         $author =  AuthorTable::getList(array(
//                         'select' => array('UF_NAME','UF_SURNAME'),
//                         //   'filter' => ['UF_NAME'=>$get["name"]]
//               ))->fetchAll();
//               if(empty($author))
//               header('HTTP/1.1 204 No Content');
//           header('Content-Type: application/json; charset=utf-8');
//           echo json_encode($author);
//     }
// }


