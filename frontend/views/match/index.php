<?php

use yii\helpers\Html;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\MatchSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Matches';
$this->params['breadcrumbs'][] = $this->title;
$status = Yii::$app->myhelper->getActiveInactive();
$team = Yii::$app->myhelper->getActiveTeam();
$teamColor = Yii::$app->myhelper->getTeamColor();
echo Yii::$app->message->display();
?>
<div class="match-index">
    <div class="custumbox box box-info">
        <div class="box-body">
            <p>
                <?= Html::a('Enter Dummy data ', ['create'], ['class' => 'btn btn-success']) ?>
            </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
                'striped'=>false,
                'hover'=>true,
                'panel'=>['type'=>'default', 'heading'=>'Match List','after'=>false],
                'toolbar'=> [
                    '{export}',
                    '{toggleData}',
                ],
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute' => 'team_1',
                 'filter' => $team,
                'value' => function($model)use ($team){                  
                    return $team[$model['team_1']];
                }
            ],
            [
                'attribute' => 'team_2',
                 'filter' => $team,
                'value' => function($model)use ($team){                  
                    return $team[$model['team_2']];
                }
            ],
            'match_name',
            [
                'attribute' => 'winner',
                 'filter' => $team,
                'value' => function($model)use ($team){                  
                    return $team[$model['winner']];
                }
            ],
                           
            'datetime',
            'no_of_moves',
            [
                'attribute' => 'winner_team_color',
                 'filter' => $teamColor,
                'value' => function($model)use ($teamColor){                  
                    return $teamColor[$model['winner_team_color']];
                }
            ],
[
                        'class' => 'yii\grid\ActionColumn',
                        'template' => '{update}'
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