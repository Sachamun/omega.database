<?

namespace OmegaMod\Entity;

use Bitrix\Main\Entity\DataManager;
use Bitrix\Main\Entity\IntegerField;
use Bitrix\Main\Entity\StringField;

class CharacterTable extends DataManager
{
    public static function getTableName()
    {
        return 'table_character';
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

            new IntegerField(
                'UF_CHAR_AB',
                [
                    'primary'      => true,
                    'autocomplete' => true,
                    'column_name'  => 'ID способности'
                ]
            ),

            new IntegerField(
                'UF_CHAR_PAR',
                [
                    'primary'      => true,
                    'autocomplete' => true,
                    'column_name'  => 'ID характеристики'
                ]
            ),

            new StringField(
                'UF_NAME',
                [
                    'required'    => true,
                    'column_name' => 'UF_NAME',
                    'title'       => 'Имя'
                ]
            ),

            new StringField(
                'UF_SURNAME',
                [
                    'required'    => true,
                    'column_name' => 'UF_SURNAME',
                    'title'       => 'Фамилия'
                ]
            ),

            new ReferenceField(
                'table_ability',
                'OmegaMod\Main\AbilityTable',
                [
                    'this.UF_CHAR_AB' => 'ref.ID'
                ]
            ),

            new ReferenceField(
                'table_characteristics',
                'OmegaMod\Main\CharacteristicsTable',
                [
                    'this.UF_CHAR_PAR' => 'ref.ID'
                ]
            ),
        ];
    }
};