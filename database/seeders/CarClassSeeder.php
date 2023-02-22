<?php

namespace Database\Seeders;

use App\Models\CarClass;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CarClassSeeder extends Seeder
{
    public function run(): void
    {
        $vehicleClasses = [
            'A — мини-автомобили',
            'B — маленькие автомобили',
            'C — среднеразмерные автомобили',
            'D — полноразмерные автомобили',
            'E — автомобили бизнес-класса',
            'F — представительские автомобили',
            'S — спортивные купе',
            'M — минивэны и коммерческие автомобили',
            'J — кроссоверы и внедорожники'
        ];

        foreach ($vehicleClasses as $vehicleClass) {
            CarClass::factory([
                'name' => $vehicleClass
                ])->create();
        }
    }
}
