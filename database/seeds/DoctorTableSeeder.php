<?php

use Illuminate\Database\Seeder;

class DoctorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $doctors = [
            [
             'doctor_name' => 'vishal',
             'licence_id' => '8uhj'
            
            ],
            [
                'doctor_name' => 'kamal',
                'licence_id' => '56fg'
               
               ],
               [
                'doctor_name' => 'raj',
                'licence_id' => '564rtygf'
               
               ],
               [
                'doctor_name' => 'kamal',
                'licence_id' => '85rt'
                
               
               ],
			
	];
         foreach($doctors as $doctor){
             App\Doctor::create($doctor);
         }
    }
    }

