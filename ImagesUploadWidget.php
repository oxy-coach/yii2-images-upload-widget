<?php
namespace oxycoach\imageswidget;

use Yii;
use yii\base\Widget;
use yii\helpers\Url;

class ImagesUploadWidget extends Widget
{
    
    public $form;
    public $name;
    public $model;
    public $sortAction = ['sort-images'];
    public $deleteAction = ['delete-image'];
    public $multiple = false;
    public $size = 'preview';

    private $_assetBundle;

    public function init()
    {
        parent::init();
        $this->_assetBundle = ImagesUploadAsset::register($this->getView());
        $this->sortAction = Url::to($this->sortAction);
        $this->deleteAction = Url::to($this->deleteAction);
    }

    public function run()
    {
        $view = $this->getView();
        $view->registerJs("jQuery('body').SortImagesHandler('{$this->sortAction}');");
        $view->registerJs("jQuery('body').DeleteImageHandler('{$this->deleteAction}');");

        return $this->render('index', [
            'form' => $this->form,
            'model' => $this->model,
            'name' => $this->name,
            'multiple' => $this->multiple,
            'size' => $this->size,
        ]);
    }
}
