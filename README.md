# yii2-images-upload-widget
Images upload widget **working with [ImageBehavior](https://github.com/oxy-coach/yii2-image-behavior)**  with sorting and deleting images via ajax.

## Installation via Composer

Run the following command

```bash
$ composer require oxy-coach/yii2-images-upload-widget "*"
```

or add

```bash
$ "oxy-coach/yii2-images-upload-widget": "*"
```

to the require section of your `composer.json` file.

## Configuring

Add action in the controller, for example:

```php
use oxycoach\imageswidget\SortImagesAction;
use oxycoach\imageswidget\DeleteImagesAction;

\\ ...

    public function actions()
    {
        return [
            'sort-images' => [
                'class' => SortImagesAction::class,
                'modelName' => DiscountItems::class,
            ],
            'delete-image' => [
                'class' => DeleteImagesAction::class,
                'modelName' => DiscountItems::class,
            ],
        ];
    }
```
## Usage

```php 
use oxycoach\imageswidget\ImagesUploadWidget;

<?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

\\ ...

<?= ImagesUploadWidget::widget([
        'form' => $form,
        'model' => $model,
        'name' => 'files',
        'multiple' => true,
        'size' => 'preview',
        'sortAction' => ['sort-images'],
        'deleteAction' => ['delete-image'],
    ]) ?>
```

### Properties

| Property     | Type    | Default            | Description                                                                                                          |
|--------------|---------|--------------------|----------------------------------------------------------------------------------------------------------------------|
| name         | string  |                    | model images property name                                                                                              |
| sortAction   | array   | `['sort-images']`  | route for image sorting url                                                                                          |
| deleteAction | array   | `['delete-image']` | route for delete image url                                                                                           |
| multiple     | boolean | `false`            | flag for multiple images field                                                                                       |
| size         | string  | `'preview'`        | displaying images size - for more information checkout [ImageBehavior](https://github.com/oxy-coach/yii2-image-behavior) |