<?php

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        if(DB::table('sections')->get()->count() == 0){
            $this->call(SectionsTableSeeder::class);
        }
        if(DB::table('questions')->get()->count() == 0){
            $this->call(QuestionsTableSeeder::class);
        }
        Model::reguard();
    }
}
