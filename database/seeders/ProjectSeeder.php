<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Str;

use Faker\Generator as Faker;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for($i = 0; $i < 6; $i++) {
            $newproject = new Project();

            $newproject->title = $faker->sentence(3);
            $newproject->link = $faker->word();
            $newproject->description = $faker->text();
            $newproject->slug = Str::slug($newproject->title, '-');

            $newproject->save();
        }
    }
}
