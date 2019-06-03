<?php

use App\Models\Management;
use App\Models\Departament;
use App\Models\Attendance;
use App\Models\Worker;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        User::truncate();
        Departament::truncate();
        Worker::truncate();
        Attendance::truncate();

        $departamentQuantity = 10;
        $workerQuantity = 50;
        $userQuantity = 1;
        $attendancesQuantity = 500;

        factory(User::class, $userQuantity)->create();
        factory(Departament::class, $departamentQuantity)->create();
        factory(Worker::class, $workerQuantity)->create();
        factory(Attendance::class, $attendancesQuantity)->create();



    }
}
