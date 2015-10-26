<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Car;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $this->call(CarTableSeeder::class);

        Model::reguard();
    }
}

class UserTableSeeder extends Seeder
{

    public function run()
    {
        DB::table('users')->delete();
        User::create(array(
            'firstName'     => 'Ricardo',
            'lastName'     => 'Beas',
            'username' => 'sl249',
            'password' => Hash::make('1409papi'),
        ));
    }

}

class CarTableSeeder extends Seeder
{

    public function run()
    {   

        //luxury

        DB::table('cars')->delete();
        Car::create(array(
            'manufacturer' => 'Ford',
            'model'     => 'Mustang',
            'year'     => '2015',
            'type' => 'Luxury',
            'mileage' => '50000',
        ));
        Car::create(array(
            'manufacturer' => 'Bugatti',
            'model'     => 'Veyron 16.4',
            'year'     => '2015',
            'type' => 'Luxury',
            'mileage' => '30000',
        ));
        Car::create(array(
            'manufacturer'     => 'Lamborghini',
            'model'     => 'Aventador',
            'year'     => '2015',
            'type' => 'Luxury',
            'mileage' => '20000',
        ));
        Car::create(array(
            'manufacturer'     => 'Tesla',
            'model'     => 'Model X',
            'year'     => '2015',
            'type' => 'Luxury',
            'mileage' => '10000',
        ));

        //standard

        Car::create(array(
            'manufacturer'     => 'Ford',
            'model'     => 'Escape',
            'year'     => '2015',
            'type' => 'Standard',
            'mileage' => '60000',
        ));

        Car::create(array(
            'manufacturer'     => 'Kia',
            'model'     => 'Optima',
            'year'     => '2015',
            'type' => 'Standard',
            'mileage' => '40000',
        ));

        Car::create(array(
            'manufacturer'     => 'Mitsubishi',
            'model'     => 'Lancer',
            'year'     => '2015',
            'type' => 'Standard',
            'mileage' => '20000',
        ));

        Car::create(array(
            'manufacturer'     => 'Chevrolet',
            'model'     => 'Malibu',
            'year'     => '2015',
            'type' => 'Standard',
            'mileage' => '50000',
        ));

        //compact

        Car::create(array(
            'manufacturer'     => 'Kia',
            'model'     => 'Soul',
            'year'     => '2015',
            'type' => 'Compact',
            'mileage' => '10000',
        ));

        Car::create(array(
            'manufacturer'     => 'Honda',
            'model'     => 'Fit',
            'year'     => '2015',
            'type' => 'Compact',
            'mileage' => '30000',
        ));

        Car::create(array(
            'manufacturer'     => 'Ford',
            'model'     => 'Fiesta',
            'year'     => '2015',
            'type' => 'Compact',
            'mileage' => '40000',
        ));

        Car::create(array(
            'manufacturer'     => 'Toyota',
            'model'     => 'Yaris',
            'year'     => '2015',
            'type' => 'Compact',
            'mileage' => '60000',
        ));

    }

}
