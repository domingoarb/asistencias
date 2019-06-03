<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */
use Carbon\Carbon;
use App\Models\Worker;
use App\Models\Departament;

use App\Models\Attendance;
use App\Models\User;

use Faker\Generator as Faker;

$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => 'admin',
        'email' => $faker->unique()->safeEmail,
        'password' => bcrypt('admin'),
        'remember_token' => Str::random(10),
    ];
});


$factory->define(Departament::class, function (Faker $faker) {

    return [
         'name' =>$faker->unique()->word,
        'description' =>$faker->paragraph(1)
    ];
});


$factory->define(Worker::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'lastname'  => $faker->lastName,
        'email' => $faker->unique()->safeEmail,
        'phone' => $faker->phoneNumber,
        'status' => $faker->randomElement([Worker::ACTIVE_WORKER, Worker::UNACTIVE_WORKER]),
        'departament_id' => Departament::All()->random()->id
    ];
});

$factory->define(Attendance::class, function (Faker $faker) {
    foreach(range(1, 120) as $index)
        {
            $year = 2019;
            $month = date('m');
            $day = rand(1, 28);

            $hora = rand(5, 10);
            $date = Carbon::create($year,$month ,$day , $hora, 0, 0);

            return [
                'date' => $date->format('Y-m-d'),
                'check_in' =>$date->format('Y-m-d H:i:s'),
                'check_out' => $date->addHours(rand(1, 12))->format('Y-m-d H:i:s'),
                'worker_id'=> Worker::All()->random()->id,
            ];
        }

});


