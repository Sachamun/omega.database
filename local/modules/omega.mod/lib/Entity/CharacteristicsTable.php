<?

namespace OmegaMod\Entity;

use Bitrix\Main\Entity\DataManager;
use Bitrix\Main\Entity\IntegerField;
use Bitrix\Main\Entity\StringField;

class CharacteristicsTable extends DataManager
{
    public static function getTableName()
    {
        return 'table_characteristics';
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
                'UF_STRENGTH',
                [
                    'required'    => true,
                    'column_name' => 'UF_STRENGTH',
                    'title'       => 'Сила'
                ]
            ),

            new StringField(
                'UF_ABILITY',
                [
                    'required'    => true,
                    'column_name' => 'UF_ABILITY',
                    'title'       => 'Ловкость'
                ]
            ),

            new StringField(
                'UF_INTELLIGENCE',
                [
                    'required'    => true,
                    'column_name' => 'UF_INTELLIGENCE',
                    'title'       => 'Интеллект'
                ]
            ),
        ];
    }
};