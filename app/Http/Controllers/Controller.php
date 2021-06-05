<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    
    //base_yearの算出
    public function gradeCalculation($day){
      $today = date("Ymd");
      $birthday = date('Ymd',strtotime($day));
      $base_day = date('Y',strtotime($birthday)) . date('md',strtotime('0000-04-02')); //学年の境目を指定
      $date = $base_day - $birthday;
      $criteria = 0;
      
      //早生まれかどうかの計算
      if ($date > 0){
        $criteria = date('Y',strtotime($birthday)) . date('md',strtotime('0000-04-01'));
      } elseif ($date <= 0) {
        $criteria = date('Y',strtotime($birthday. "+1 year")) . date('md',strtotime('0000-04-01'));
      }
      
      //入学年度の計算
      $base_year = number_format(floor(($today - $criteria)/10000));
      
      if ($base_year <= 5){
        $base_year = 5;
      } elseif ($base_year >= 18){
        $base_year = 18;
      } 
      
      return $base_year;
    }
}
