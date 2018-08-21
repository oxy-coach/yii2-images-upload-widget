<?php

use yii\helpers\Html;

$fieldName = ($multiple) ? $name . '[]' : $name;
$pk = $model::primaryKey()[0];

?>

<?php if (!$model->isNewRecord) { ?>
    <div id="imagesContainer">
        <?php
        $images = $model->getAllImages($size);
        $class = ($multiple) ? 'multiple' : '';
        foreach ($images as $id => $path) {
            if ($id !== 0) {
                echo Html::beginTag('div', ['class' => 'image-holder ' . $class]);
                echo Html::img($path, [
                    'class' => 'preview-image',
                    'data' => [
                        'itemId' => $model->{$pk},
                        'id' => $id,
                    ],
                ]);
                echo Html::tag('i', '', ['class' => 'glyphicon glyphicon-trash delete-icon']);
                echo Html::endTag('div');
            }
        } ?>
    </div>
<?php } ?>

<?= $form->field($model, $fieldName)->fileInput(['multiple' => $multiple, 'accept' => 'image/*']) ?>
