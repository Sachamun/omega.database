<?
use OmegaMod\Services\deleteAbility;
use Bitrix\Main\Loader;

Loader::includeModule("omega.mod");
class delAbility extends \CBitrixComponent
{
    protected $usDel;
    function __construct(\CBitrixComponent $component = null)
    {
        parent::__construct($component);
        $this->$usDel = new deleteAbility();
    }

    public function executeComponent()
    {
        $get = (array) $this->request->getQueryList()->toArray();

        $peremen = $this->$usDel->DelComponent($get);
        header('Content-Type: application/json; charset=utf-8');
        //echo json_encode($peremen);
    }
}

