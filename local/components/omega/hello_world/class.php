<?php if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
    class Nam extends \CBitrixComponent
    {
        public function executeComponent()
        {
            echo "Hello, world!";
            echo "<br>";
        }
    }
?>

<?php
        use Bitrix\Highloadblock\HighloadBlockTable as HLBT;

        const MY_HL_BLOCK_CHARACTER = 1;
        const MY_HL_BLOCK_ABILITY = 2;
        const MY_HL_BLOCK_CHARACTERISTICS = 3;

        CModule::IncludeModule('highloadblock');

        function GetEntityDataClass($HlBlockId) {
                if (empty($HlBlockId) || $HlBlockId < 1)
                {
                    return false;
                }
                $hlblock = HLBT::getById($HlBlockId)->fetch();   
                $entity = HLBT::compileEntity($hlblock);
                $entity_data_class = $entity->getDataClass();
                return $entity_data_class;
        }

        $char_class = GetEntityDataClass(MY_HL_BLOCK_CHARACTER);

        $characteristics_class = GetEntityDataClass(MY_HL_BLOCK_CHARACTERISTICS);
        $characterisitics = $characteristics_class::getList([
            'select' => [
                '*',
                'CHAR' => 'CHAR_DATA'
            ],
            'runtime' => [
                new \Bitrix\Main\Entity\ReferenceField(
                    'CHAR_DATA',
                    $char_class,
                    array('=this.UF_CHARACTER' => 'ref.ID')
                )
                ],
        ]);

        $ab_class = GetEntityDataClass(MY_HL_BLOCK_ABILITY);
        $ability = $ab_class::getList([
            'select' => [
              '*',
              'CHAR' => 'CHAR_DATA'
            ],
            'runtime' => [
              new \Bitrix\Main\Entity\ReferenceField(
                          'CHAR_DATA',
                          $char_class,
                          array('=this.UF_CHARACTER' => 'ref.ID')
                      )
            ],
        ]);    

        echo "<table>";
            echo "<tr>";
                echo "<td> ID </td>";
                echo "<td> Персонаж </td>";
                echo "<td> Сила </td>";
                echo "<td> Скорость </td>";
                echo "<td> Интеллект </td>";
                echo "<td> Ниндзюцу </td>";
                echo "<td> Тайдзюцу </td>";
                echo "<td> Гендзюцу </td>";
            echo "</tr>";
            while($el_2 = $characterisitics->fetch()){
                echo "<tr>";
                    echo "<td>" .$el_2['ID'] ."</td>";
                    echo "<td>" .$el_2['CHARUF_NAME'] ." " .$el_2['CHARUF_SURNAME'] ."</td>";
                    echo "<td>" .$el_2['UF_STRENGTH'] ."</td>";
                    echo "<td>" .$el_2['UF_SPEED'] ."</td>";
                    echo "<td>" .$el_2['UF_INTELLIGENCE'] ."</td>";
                    echo "<td>" .$el_2['UF_NIN'] ."</td>";
                    echo "<td>" .$el_2['UF_TAI'] ."</td>";
                    echo "<td>" .$el_2['UF_GEN'] ."</td>";
                echo "</tr>";  
            }
        echo "</table>";
        echo "<br>";
        
        echo "<table>";
            echo "<tr>";
                echo "<td> Персонаж </td>";
                echo "<td> Стихия </td>";
                echo "<td> Техника </td>";
            echo "</tr>";
            while($el = $ability->fetch()){
                echo "<tr>";
                    echo "<td>" .$el['CHARUF_NAME'] ." " .$el['CHARUF_SURNAME'] ."</td>";
                    echo "<td>" .$el['UF_ELEMENT'] ."</td>";
                    echo "<td>" .$el['UF_NAME'] ."</td>";
                echo "</tr>";  
            }
        echo "</table>";
        echo "<br><br>";
?>
