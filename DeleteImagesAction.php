<?php
namespace oxycoach\imageswidget;

use Yii;
use yii\base\Action;
use yii\web\BadRequestHttpException;
use yii\helpers\Json;
use yii\base\InvalidConfigException;

class DeleteImagesAction extends Action
{
    public $modelName;

    public function run()
    {
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

        $request = Yii::$app->request;
        $id = $request->post('itemId', 0);
        $photoId = $request->post('photoId', 0);

        $result = [
            'errors' => false,
            'status' => false,
        ];

        $modelClass = $this->modelName;
        $model = $modelClass::findOne($id);

        if (!$model) {
            $result['errors'] = true;
            return Json::encode($result);
        }

        if (!$model->hasMethod('deleteImage')) {
            throw new InvalidConfigException(
                "Not found right `ImagesBehavior` behavior in `{$this->modelName}`."
            );
        }

        $model->deleteImage($photoId);

        $result['status'] = true;

        return Json::encode($result);
    }
}
