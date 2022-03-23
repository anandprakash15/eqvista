<?php

namespace common\components;

use yii\base\Component;
use frontend\models\Team;
use yii\helpers\ArrayHelper;

class MyHelpers extends Component{

    public static function getActiveInactive()
    {
        return [1 => 'Active', 0=>'Inactive'];
    }
    
     public static function getTeamColor()
    {
        return [0 => 'Black', 1=>'White'];
    }
    
    public function getActiveTeam()
    {
        $result = '';
        $model = Team::find()
        ->where(['status'=>'1'])
        ->orderBy([ 'team_name' => SORT_ASC])
        ->all();
        if(!empty($model)){
            $result = ArrayHelper::map($model, 'id', 'team_name');
        }   
        return $result;
    }
    
    public function getWinRatio($data) {
        $result = '0';
        $model = \frontend\models\Match::find()
        ->where('winner = :winner', [':winner' => $data['team_id']])
        ->andWhere('winner_team_color = :winner_team_color', [':winner_team_color' => 1])
        ->count();
        if ($model) {
            $result= @($model / count($data->team->winmatches))*100;
        }
        return number_format((float)$result, 2, '.', '').'%';
    }
    
    public function getBestGame($data) {
          
          $model = \frontend\models\Match::find()
            ->select('*')
            ->where('winner = :winner', [':winner' => $data['team_id']])
            ->orderBy([ 'no_of_moves' => SORT_ASC])
            ->limit(1)
            ->one();
         return isset($model['match_name'])?$model['match_name']:'no win'; 
    }
    
    public function getTeamId($team){
        $model = Team::find()
        ->where(['id' => $team])
        ->one();
        return $model['team_name']; 
    }
    
    public function getCountWhiteMatches($data) {
       return $model = \frontend\models\Match::find()
        ->where('winner = :winner', [':winner' => $data['team_id']])
        ->andWhere('winner_team_color = :winner_team_color', [':winner_team_color' => 1])
        ->count();
    }
    
    public function getCountBlackMatches($data) {
       return $model = \frontend\models\Match::find()
        ->where('winner = :winner', [':winner' => $data['team_id']])
        ->andWhere('winner_team_color = :winner_team_color', [':winner_team_color' => 0])
        ->count();
    }
}
