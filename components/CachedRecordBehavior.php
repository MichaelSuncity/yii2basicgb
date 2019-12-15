<?php


namespace app\components;


use app\models\Activity;
use yii\base\Behavior;
use Yii;
use yii\db\ActiveRecord;

class CachedRecordBehavior extends Behavior
{
    public $prefix;

    public function events()
    {
        return [
            ActiveRecord::EVENT_AFTER_UPDATE => 'clearCache',
            ActiveRecord::EVENT_AFTER_DELETE => 'clearCache',
            ActiveRecord::EVENT_AFTER_INSERT => 'clearCache'
        ];
    }

    private function buildKey()
    {
        return "{$this->prefix}_{$this->owner->id}";
    }

    public function clearCache()
    {
        Yii::$app->cache->delete($this->buildKey());
    }

    public function cache()
    {
        if(Yii::$app->cache->exists($this->buildKey())){
            return Yii::$app->cache->get($this->buildKey());
        } else {
         Yii::$app->cache->set($this->buildKey(), $this->owner);
         return $this->owner;
        }
    }
}