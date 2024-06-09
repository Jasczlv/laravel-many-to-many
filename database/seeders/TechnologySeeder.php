<?php

namespace Database\Seeders;

use App\Models\Technology;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class TechnologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $technologies = ['css', 'js', 'vue', 'sql', 'php', 'laravel'];

        foreach ($technologies as $tech) {

            $new_tech = new Technology();
            $new_tech->tech = $tech;
            $new_tech->slug = Str::slug($tech);


            $new_tech->save();
        }
    }
}
