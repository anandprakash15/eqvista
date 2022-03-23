<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Player */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="player-form">
    <div class="custumbox box box-info">
       <div class="box-body">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'player_name')->textInput(['maxlength' => true]) ?>
           
    <?= $form->field($model, 'contact_number')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'team_id')->dropDownList(Yii::$app->myhelper->getActiveTeam(),['prompt'=>'Select Team'],['class'=>'form-control'])?>

    <?= $form->field($model, 'status')->dropDownList(Yii::$app->myhelper->getActiveInactive(),['class'=>'form-control'])?>

    <div class="form-group" >
            <button id="back_btn" class="btn btn-default"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button>
         <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Submit') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary', 'id'=>'load' ,'data-loading-text'=>"<i class='fa fa-spinner fa-spin '></i> Processing"]) ?>
    </div>

    <?php ActiveForm::end(); ?>

    </div>
    </div>
</div>