<?
namespace OmegaMod\Services;
use OmegaMod\Entity\AbilityTable;

class deleteAbility
{
    public function DelComponent($data)
    {
 
        var_dump($data['ID']);
     $result = AbilityTable::delete($data['ID']);

        if (empty($result)) {
            echo 'Ошибка!';
            die();
        }
        echo 'Способность успешно удалена!';
        return $result;
    }
}