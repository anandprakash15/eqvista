<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\MatchSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="match-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'team_1') ?>

    <?= $form->field($model, 'team_2') ?>

    <?= $form->field($model, 'winner') ?>

    <?= $form->field($model, 'datetime') ?>

    <?php // echo $form->field($model, 'no_of_moves') ?>

    <?php // echo $form->field($model, 'black_moves') ?>

    <?php // echo $form->field($model, 'white_moves') ?>

    <?php // echo $form->field($model, 'winner_team_color') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
