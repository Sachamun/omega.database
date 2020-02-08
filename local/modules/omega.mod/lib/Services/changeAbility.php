<?
namespace OmegaMod\Services;
use OmegaMod\Entity\AbilityTable;

class changeAbility
{
    public function abilityPutComponent($putdata)
    {

        $ab = [
            'UF_TITLE' => $putdata['TITLE'],
            'UF_ELEMENT' => $putdata['ELEMENT']
        ];

        $result = AbilityTable::update($putdata['ID'], $ab);
        if (empty($result)) {
            echo'Ошибка!';
            die();
        }
        echo'Данные о способности успешно изменены!';
        return $result;
    }
}
