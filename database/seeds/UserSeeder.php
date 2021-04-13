<?php

use App\Dish;
use App\User;
use Faker\Generator as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
      $dishTypes=array('primo','secondo','contorno','antipasto','dessert');
      for ($i=0; $i < 20 ; $i++) {
        $newUser=new User();
        $newUser->name=$faker->name();
        $newUser->surname=$faker->name();
        $newUser->restaurant_name=$faker->name();
        $newUser->restaurant_description=$faker->text(100);
        $newUser->email=$faker->email();
        $newUser->phone_number=''.rand(0000000000,9999999999).'';
        $newUser->address= $faker->address();
        $newUser->p_iva= $faker->text(11);
        $newUser->password=Hash::make('password');
        $newUser->img='https://picsum.photos/seed/'.rand(0, 1000).'/200/300';
        $newUser->save();
        $newUser->categories()->attach(rand(1,20));
        $newUser->categories()->attach(rand(1,20));

        for ($v=0; $v < rand(0,10) ; $v++) {
            $newDish=new Dish();
            $newDish->name = $faker->name();
            $newDish->description = $faker->text(500);
            $newDish->price= rand(0,50000) * 0.01;
            $newDish->visible = rand(0,1);
            $newDish->vegan = rand(0,1);
            $newDish->gluten = rand(0,1);
            $newDish->type=$dishTypes[array_rand($dishTypes)];
            $newDish->img = 'https://picsum.photos/seed/'.rand(0, 1000).'/200/300';
            $newUser->dishes()->save($newDish);
            $newDish->orders()->attach(rand(1,20));
            $newDish->orders()->attach(rand(1,20));
        }
      }
    }
}
