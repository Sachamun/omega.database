<?

namespace OmegaMod\Entity;

use Bitrix\Main\Entity\DataManager;
use Bitrix\Main\Entity\IntegerField;
use Bitrix\Main\Entity\StringField;

class AbilityTable extends DataManager
{
    public static function getTableName()
    {
        return 'table_ability';
    }

    public static function getMap()
    {
        return [
            new IntegerField(
                'ID',
                [
                    'primary'      => true,
                    'autocomplete' => true,
                    'column_name'  => 'ID'
                ]
            ),

            new StringField(
                'UF_TITLE',
                [
                    'required'    => true,
                    'column_name' => 'UF_TITLE',
                    'title'       => 'Название'
                ]
            ),

            new StringField(
                'UF_ELEMENT',
                [
                    'required'    => true,
                    'column_name' => 'UF_ELEMENT',
                    'title'       => 'Стихия'
                ]
            ),
        ];
    }
};