<?php

namespace Database\Seeders;

use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
USE Illuminate\Support\Str;

class TypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = ['Front End', 'Back End', 'Full Stack'];
        foreach ($types as $type) {
            $newType = new Type();
            $newType->name = $type;
            $newType->slug = Str::slug($type); 

            $newType->save();
        }
    }
}
