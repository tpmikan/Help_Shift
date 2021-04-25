<?php

use Illuminate\Database\Seeder;
use App\Set;

class SetsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $first_sets = [
            ['base_year' => 5, 'grade' => '未就学児', 'magnification' => 0],
            ['base_year' => 6, 'grade' => '小学１年', 'magnification' => 1.0],
            ['base_year' => 7, 'grade' => '小学２年', 'magnification' => 2.0],
            ['base_year' => 8, 'grade' => '小学３年', 'magnification' => 3.0],
            ['base_year' => 9, 'grade' => '小学４年', 'magnification' => 4.0],
            ['base_year' => 10, 'grade' => '小学５年', 'magnification' => 5.0],
            ['base_year' => 11, 'grade' => '小学６年', 'magnification' => 6.0],
            ['base_year' => 12, 'grade' => '中学１年', 'magnification' => 10.0],
            ['base_year' => 13, 'grade' => '中学２年', 'magnification' => 12.0],
            ['base_year' => 14, 'grade' => '中学３年', 'magnification' => 15.0],
            ['base_year' => 15, 'grade' => '高校１年', 'magnification' => 30.0],
            ['base_year' => 16, 'grade' => '高校２年', 'magnification' => 40.0],
            ['base_year' => 17, 'grade' => '高校３年', 'magnification' => 50.0],
            ['base_year' => 18, 'grade' => '成人', 'magnification' => 0],
        ];
        
        foreach($first_sets as $first_set){
            $set = new Set;
            $set->base_year = $first_set['base_year'];
            $set->grade = $first_set['grade'];
            $set->magnification = $first_set['magnification'];
            $set->save();
        }
    }
}
