<?php

use Illuminate\Database\Seeder;

class ParentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('parent_admins')->insert([
            'name' => 'parent',
            'email' => 'parent@help.com',
            'password' => Hash::make('parent'),
        ]);
        
    }
}
