<?php

use Bitrix\Main\Localization\Loc;
use Bitrix\Main\Application;
use Bitrix\Main\EventManager;

Loc::loadMessages(__FILE__);

class omega_mod extends CModule
{
    /** @var string*/
    public $MODULE_ID = 'omega.mod';           /**clix.apidb*/

    /** @var string*/
    public $MODULE_GROUP_RIGHTS = 'Y';

    /** @var string*/
    public $MODULE_VERSION;

    /** @var string*/
    public $MODULE_VERSION_DATE;

    /** @var string*/
    public $MODULE_NAME;

    /** @var string*/
    public $MODULE_DESCRIPTION;

    /** @var string*/
    public $PARTNER_NAME;

    /** @var string*/
    public $PARTNER_URI;

    public function __construct()
    {
        $this->MODULE_NAME = 'Mod';
        $this->MODULE_DESCRIPTION = 'Модуль для работы с бд для api';
        $this->PARTNER_NAME = 'Zaharov';
        $this->MODULE_PATH = $this->getModulePath();

        $arModuleVersion = array();
        $path = str_replace("\\", "/", __FILE__);
		$path = substr($path, 0, strlen($path) - strlen("/index.php"));
		include($path."/version.php");

        $this->MODULE_VERSION = $arModuleVersion['VERSION'];
        $this->MODULE_VERSION_DATE = $arModuleVersion['VERSION_DATE'];

        $this->connection = Application::getConnection();
        $this->eventManager = EventManager::getInstance();
    }

    /**
     * Return path module
     * @return string
     */
    protected function getModulePath()
    {
        $modulePath = explode('/', __FILE__);
        $modulePath = array_slice($modulePath, 0, array_search($this->MODULE_ID, $modulePath) + 1);

        return join('/', $modulePath);
    }

    /**
     * Install module
     * @return void
     */
    public function doInstall()
    {
        RegisterModule($this->MODULE_ID);
    }

    /**
     * Remove module
     * @return void
     */
    public function doUninstall()
    {
        UnRegisterModule($this->MODULE_ID);
    }

}
