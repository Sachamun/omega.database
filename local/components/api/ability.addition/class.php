<?
use OmegaMod\Entity\AbilityTable;
use Bitrix\Main\Loader;

class add_ability extends \CBitrixComponent
{
    public function executeComponent()
    {
        Loader::includeModule("omega.mod");
        $post = (array) $this->request->getPostList()->toArray();
        
        $arFields = [
        "UF_TITLE" => $post["TITLE"],
        "UF_ELEMENT" => $post["ELEMENT"]
        ];  
        
        if(empty($post["TITLE"])){
            header('HTTP/1.1 400 Bad Request');
            echo "Не введено название. Это обязательное поле!";
            die();
        }

        if(empty($post["ELEMENT"])){
            header('HTTP/1.1 400 Bad Request');
            echo "Не введен элемент. Это обязательное поле!";
            die();
        }

        $result = AbilityTable::add($arFields);

        if(empty($result)){
            echo"Ошибка при сохранении данных!";
            die();
        }
        
        echo"Способность успешно добавлена!";
    }
}