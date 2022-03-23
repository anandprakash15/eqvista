<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Player */

$this->title = $model->player_name;
$this->params['breadcrumbs'][] = ['label' => 'Players', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
$status = Yii::$app->myhelper->getActiveInactive();
?>
<div class="player-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
//            'id',
            'player_name',
            [
                'label' => 'Team Id',
                'value' => function($model){
                    return Yii::$app->myhelper->getTeamId($model['team_id']);
                }
            ],
            [
                'label' => 'Status',
                'value' => function($model)use($status){
                    return $status[$model['status']];
                }
            ],
            [
                'attribute' => 'No of matches Played',
                'value' => function($model)use($status){
                    return count($model->team->totalParticipant);
                }
            ],
            [
                'attribute' => 'won played as white',
                'value' => function($model)use($status){
                   return  Yii::$app->myhelper->getCountWhiteMatches($model);
                }
            ],
            [
                'attribute' => 'won played as black',
                'value' => function($model){
                    return  Yii::$app->myhelper->getCountBlackMatches($model);
                }
            ],
            'created_at',
//            'updated_at',
        ],
    ]) ?>

</div>
<div class="form-group" >
    <button id="back_btn" class="btn btn-primary"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button>
</div>
