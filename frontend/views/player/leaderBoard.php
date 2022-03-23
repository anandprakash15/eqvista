<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\PlayerSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Leader';
$this->params['breadcrumbs'][] = $this->title;
$status = Yii::$app->myhelper->getActiveInactive();
$team = Yii::$app->myhelper->getActiveTeam();
echo Yii::$app->message->display();
?>
<div class="player-index">
    <div class="custumbox box box-info">
        <div class="box-body">

    <?= GridView::widget([
                'striped'=>false,
                'hover'=>true,
                'panel'=>['type'=>'default', 'heading'=>'Leader Dashboard','after'=>false],
                'toolbar'=> [
                    '{export}',
                    '{toggleData}',
                ],
                 'rowOptions' => function ($model, $key, $index, $grid) {
                    $url = Url::to(['view','id'=> $model['id']]);
                    return ['onclick' => 'location.href="'.$url.'"'];
                },
                'dataProvider' => $dataProvider,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],
                    'player_name',
                    [
                        'attribute' => 'team_id',
//                        'filter' => $team,
                        'value' => function($model)use ($team){                  
                            return $team[$model['team_id']];
                        }
                    ],
                    [
                        'label' => 'No of wins', 
                        'attribute' => 'created_at',  
                        'value' => function($model){
                                return  count($model->team->winmatches);
                        }
                    ],
                    [
                        'label' => 'No of Looses',  
                        'value' => function($model){        
                                return  count($model->team->totalParticipant) -  count($model->team->winmatches);
                        }
                    ],
                    [
                        'label' => 'Raito of wins W/B',
                        'value' => function($model){        
                                return Yii::$app->myhelper->getWinRatio($model);
                        }
                    ],
                    ['label' => 'Best Game',
                        'value' => function($model){        
                                return  Yii::$app->myhelper->getBestGame($model);
                        }
                    ],
                        ],
                        'exportConfig'=> [
                                GridView::CSV=>[
                                    'label' => 'CSV',
                                ],
                                GridView::EXCEL=>[
                                    'label' => 'Excel',
                                ],
                            ],
                    ]); ?>
        </div>
    </div>
</div>
<style>
    
    .w0{
        cursor: pointer;
			margin: 15px 0;
    }
</style>
