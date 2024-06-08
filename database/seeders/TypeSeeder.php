<?php

namespace Database\Seeders;

use App\Models\Type;
use Faker\Generator as Faker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        //

        // DB::table('types')->truncate();

        $types = [
            'Dev Ops', 'BackEnd', 'FrontEnd', 'Designer', 'Undefined'
        ];

        foreach ($types as $type) {

            $new_type = new Type();
            $new_type->type = $type;
            $new_type->slug = Str::slug($type);


            $new_type->save();
        }
    }
}
