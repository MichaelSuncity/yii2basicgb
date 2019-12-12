<?php


namespace app\commands;


use yii\console\Controller;

class GeekController extends Controller
{
    public $user ='John';
    public $needToShowUserName = false;

    public $force = false;

    private $hours = [
        '20', '21', '22'
    ];

    public function options($actionID)
    {
        return ['user', 'needToShowUserName', 'force'];
    }

    public function optionAliases()
    {
        return[
            'v' => 'needToShowUserName', //verbose
            'f' => 'force'
        ];
    }

    private function canRun()
    {
        $currentTime = date('H');
        if(in_array($currentTime, $this->hours)){
            return true;
        }
        return false;
    }

    public function actionIndex(int $times = 1)
    {
        if(!$this->force && !$this->canRun()){
            return;
        }

        for ($i=0; $i < $times; $i++){
            if ($this->needToShowUserName){
                echo "Hello {$this->user} - {$i} \n";
            } else {
                echo "Hello {$i} \n";
            }
        }
    }
}