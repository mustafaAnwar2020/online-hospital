<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Profession;
class professionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $Professions = [
            'Internal Medicine',
            'Cardiology',
            'Gastroenterology',
            'Ophthalmology',
            'Pediatrics',
            'Neurology',
            'nephrology',
            'Oncology',
            'Hematology',
            'Obstetrics and Gynecology',
            'ENT',
            'Emergency medicine',

            ];
            foreach ($Professions as $prof) {
            Profession::create(['name' => $prof]);
            }
    }
}
