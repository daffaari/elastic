<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use Faker\Factory as Faker;
class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('en_US');

        for($i = 1; $i <= 1000; $i++){

            // insert data ke table pegawai menggunakan Faker
          DB::table('articles')->insert([
              'title' => $faker->catchPhrase,
              'type' => $faker->word,
              'content' => $faker->text
          ]);

      }
    }
}
