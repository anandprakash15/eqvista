<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\DateTimePicker;

/* @var $this yii\web\View */
/* @var $model frontend\models\Match */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="match-form">
     <div class="custumbox box box-info">
       <div class="box-body">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'team_1')->dropDownList(Yii::$app->myhelper->getActiveTeam(),['prompt'=>'Select Team 1'],['class'=>'form-control'])?>

    <?= $form->field($model, 'team_2')->dropDownList(Yii::$app->myhelper->getActiveTeam(),['prompt'=>'Select Team 2'],['class'=>'form-control'])?>

    <?= $form->field($model, 'match_name')->textInput() ?>
           
    <?= $form->field($model, 'winner')->dropDownList(Yii::$app->myhelper->getActiveTeam(),['prompt'=>'Select Team 2'],['class'=>'form-control'])?>

    <?php 
        if(!$model->isNewRecord){
            $delivery_date = date('d-m-Y',strtotime($model->datetime));
        }else{
            $delivery_date = '';
        }
    ?>    
    <?= $form->field($model, 'datetime')->widget(DateTimePicker::classname(), [
        'options' => ['placeholder' => 'Date Time','value'=>$delivery_date],
        'removeButton' => false,
        'pluginOptions' => [
          'autoclose'=>true,
          'startDate' => '+1d',
          'format' => 'yyyy-mm-dd hh:mm:ss'
        ]
    ]);?>

    <?= $form->field($model, 'no_of_moves')->textInput() ?>
    
    <?= $form->field($model, 'winner_team_color')->dropDownList(Yii::$app->myhelper->getTeamColor(),['prompt'=>'Select Winning Color Team'],['class'=>'form-control'])?>

    <div class="form-group" >
            <button id="back_btn" class="btn btn-default"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button>
         <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Submit') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary', 'id'=>'load' ,'data-loading-text'=>"<i class='fa fa-spinner fa-spin '></i> Processing"]) ?>
    </div>

    <?php ActiveForm::end(); ?>

    </div>
    </div>
</div>