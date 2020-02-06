<?php
use Bitrix\Main\Loader;
Loader::registerAutoLoadClasses('omega.mod', [
    'OmegaMod\Entity\AbilityTable' => 'lib/Entity/AbilityTable.php',
    'OmegaMod\Entity\CharacterTable' => 'lib/Entity/CharacterTable.php',
    'OmegaMod\Entity\CharacteristicsTable' => 'lib/Entity/CharacteristicsTable.php',
    'OmegaMod\Services\deleteAbility' => 'lib/Services/deleteAbility.php',
    'OmegaMod\Services\changeAbility' => 'lib/Services/changeAbility.php',
]); 
?>


