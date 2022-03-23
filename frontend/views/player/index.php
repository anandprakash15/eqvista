<?php

use yii\helpers\Html;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\PlayerSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Players';
$this->params['breadcrumbs'][] = $this->title;
$status = Yii::$app->myhelper->getActiveInactive();
$team = Yii::$app->myhelper->getActiveTeam();
echo Yii::$app->message->display();
?>
<div class="player-index">
    <div class="custumbox box box-info">
        <div class="box-body">
            <p>
                <?= Html::a('Create Players', ['create'], ['class' => 'btn btn-success']) ?>
            </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
                'striped'=>false,
                'hover'=>true,
                'panel'=>['type'=>'default', 'heading'=>'Players List','after'=>false],
                'toolbar'=> [
                    '{export}',
                    '{toggleData}',
                ],
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],
                    'player_name',
                    [
                        'attribute' => 'team_id',
                         'filter' => $team,
                        'value' => function($model)use ($team){                  
                            return $team[$model['team_id']];
                        }
                    ],
                    ['label' => 'Member Joined', 'attribute' => 'created_at'],
                    [
                        'attribute' => 'status',
                        'filter' => $status,
                        'value' => function($model)use($status){
                            return $status[$model['status']];
                        }
                    ],
                    
                    [
                        'class' => 'yii\grid\ActionColumn',
                        'template' => '{update} {delete}'
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