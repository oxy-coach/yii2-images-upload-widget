<?php
namespace oxycoach\imageswidget;

use Yii;
use yii\base\Action;
use yii\base\InvalidConfigException;
use yii\helpers\Json;
use yii\web\BadRequestHttpException;

class SortImagesAction extends Action
{
    public $modelName;

    public function run()
    {
        $request = Yii::$app->request;

        $id = $request->post('itemId', 0);
        $items = $request->post('items', false);

        $modelClass = $this->modelName;
        $model = $modelClass::findOne($id);

        if (!$items) {
            throw new BadRequestHttpException('Don\'t received POST param `items`.');
        }

        if (!$model) {
            throw new BadRequestHttpException("No model was found with id = {$id}");
        }

        if (!$model->hasMethod('sortImages')) {
            throw new InvalidConfigException(
                "Not found right `ImagesBehavior` behavior in `{$this->modelName}`."
            );
        }

        $model->sortImages($items);
    }
}
