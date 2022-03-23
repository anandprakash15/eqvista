<?php

use yii\helpers\Html;
use kartik\grid\GridView;
/* @var $this yii\web\View */
/* @var $searchModel frontend\models\TeamSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Teams';
$this->params['breadcrumbs'][] = $this->title;
$status = Yii::$app->myhelper->getActiveInactive();
echo Yii::$app->message->display();
?>
<div class="team-index">
    <div class="custumbox box box-info">
        <div class="box-body">
            <p>
                <?= Html::a('Create Team', ['create'], ['class' => 'btn btn-success']) ?>
            </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
             <?= GridView::widget([
                'striped'=>false,
                'hover'=>true,
                'panel'=>['type'=>'default', 'heading'=>'Team List','after'=>false],
                'toolbar'=> [
                    '{export}',
                    '{toggleData}',
                ],
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],
                    'team_name',
                     'created_at',
//                      'updated_at',
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
