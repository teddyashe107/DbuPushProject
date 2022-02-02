<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class BlogsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('blogs')->insert([
         [
             'title'=>'My first blog post',
             'body' =>'hello this is also the body of my first db '

         ],
         [
             'title'=>'Secound blog post',
             'body'=> 'hello this is the secound blog body'
         ]
        ]);
    }
}
