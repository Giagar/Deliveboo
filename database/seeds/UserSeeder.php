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

//questo che segue lo fai nello UserSeeder nella public function run (il faker non serve)

        /* ristorante 1  */

        // $newUser = new User;
        // $newUser->name = "";
        // $newUser->surname = "";
        // $newUser->restaurant_name = ""
        // $newUser->restaurant_description = "Siamo lieti di darvi il benvenuto...Il Ristorante è immerso nella natura,copia da internet";
        // $newUser->img = "immagineristorante.img";
        // $newUser->phone_number = 11numeri;
        // $newUser->address="";
        // $newUser->p_iva= 11caratteri;
        // $newUser->password=Hash::make('password');
        // $newUser->save();
        // $newUser->categories()->attach(19);  //vedendo che categoria è quella con id 19 e associarla al ristorante se c'azzecca
        // $newUser->categories()->attach(12); //vedendo che categoria è quella con id 19 e associarla al ristorante se c'azzecca

        // e cosi per altri ristoranti


// questo che segue lo fai nel DishSeeder (il faker non serve)


        /* Piatti ristorante 1 */

        // $names1 = ["Pennette panna e salmone", "Carbonara", "Insalata"];
        // $images1 = ["immaginedipennette.jpg",'immaginedicarbonara.jpg',"imgdiinsalata.png"];
        // $descriptions1=['descrizione1','descrizione2','descrizione3'];
        // for ($i=0; $i < 10; $i++) {
        //     $newDish = new Dish;
        //     $newDish->name = $names1[$i];
        //     $newDish->img = $images1[$i];
        //     $newDish->description = $ingred1[$i];
        //     $newDish->price = number_format(rand(100, 1000) / 100, 2);
        //     $newDish->visible = rand(0,1);
        //     $newDish->vegan = mettere o 0 o 1 ;
        //     $newDish->gluten = mettere o 0 o 1;
        //     $newDish->type=mettere o primo o secondo o antipasto o dessert;
        //     $newDish->user_id = 1;
            //    $newDish->save();
        //     $newDish->orders()->attach(rand(1,20));
       //      $newDish->orders()->attach(rand(1,20));
        // }

        //     /* Piatti ristorante 2 */

        // $names2 = ["Pennette panna e salmone", "Carbonara", "Insalata"];
        // $images2 = ["immaginedipennette.jpg",'immaginedicarbonara.jpg',"imgdiinsalata.png"];

        // for ($i=0; $i < 10; $i++) {
        //     $newDish = new Dish;
        //     $newDish->name = $names2[$i];
        //     $newDish->img = $images2[$i];
        //     $newDish->price = number_format(rand(100, 1000) / 100, 2);
         //     $newDish->visible = rand(0,1);
        //     $newDish->vegan = mettere o 0 se non vegano o 1 se vegano;
        //     $newDish->gluten = mettere o 0 se non glutine o 1 se glutine;
        //     $newDish->type=mettere o primo o secondo o antipasto o dessert;
        //     $newDish->user_id = 2;
        //     $newDish->save();
        //     $newDish->orders()->attach(rand(1,20));
       //      $newDish->orders()->attach(rand(1,20));
        //
        // }

        // e cosi via

        // alla fine lanci php artisan migrate:refresh
        // poi il seeder categorie,poi il seeder order,poi il seeder user e infine il seeder dish
