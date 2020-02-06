<?
use Bitrix\Main\Loader;
use OmegaMod\Services\changeAbility;

Loader::includeModule("omega.mod");
class chngAbility extends \CBitrixComponent
{
    protected $usPT;
    function __construct(\CBitrixComponent $component= null)
    {
        parent::__construct($component);
        $this->$usPT = new changeAbility();
    }

    public function executeComponent()
    {
        $putdata = json_decode($this->request->getInput(), true);
        $visPT = $this->$usPT->abilityPutComponent($putdata);
        header('Content-Type: application/json; charset=utf-8');
        //echo json_encode($visPT);
    }
}