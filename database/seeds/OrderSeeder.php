<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Order;
class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
      for ($i=0; $i < 20; $i++) {
        $newOrder = new Order();
        $newOrder->customer_name=$faker->firstname();
        $newOrder->customer_surname= $faker->lastname();
        $newOrder->customer_email= $faker->email();
        $newOrder->order_active=rand(0,1);
        $newOrder->customer_address= $faker->address();
        $newOrder->notes= $faker->text();
        $newOrder->save();
      }
    }
}
