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
    public function run()
    {
        $ratings = array(1,2,3,4,5);
        $newUser = new User;
        $newUser->name = "Mario";
        $newUser->surname = "Rossi";
        $newUser->email = "mariorossi15@gmail.com";
        $newUser->restaurant_name = "Berton";
        $newUser->restaurant_description = "Siamo lieti di darvi il benvenuto, la specialità del nostro ristorante è la carne di qualità";
        $newUser->img = "https://www.ilgiornaledelcibo.it/wp-content/uploads/2008/06/tagliata-di-manzo-alle-erbe-mediterranee.jpg";
        $newUser->phone_number = '3334514548';
        $newUser->address="Via Barbaria 3";
        $newUser->p_iva= '54963789512';
        $newUser->rating=$ratings[array_rand($ratings, 1)];
        $newUser->password=Hash::make('password');
        $newUser->save();
        $newUser->categories()->attach(8);  //vedendo che categoria è quella con id 19 e associarla al ristorante se c'azzecca
        $newUser->categories()->attach(1); //vedendo che categoria è quella con id 19 e associarla al ristorante se c'azzecca


        $newUser = new User;
        $newUser->name = "Guendalina";
        $newUser->surname = "Russo";
        $newUser->email = "guerusso@gmail.com";
        $newUser->restaurant_name = "Laite";
        $newUser->restaurant_description = "Il nostro bar è il migliore in fatto di aroma del caffè";
        $newUser->img = "https://www.medicalfacts.it/wp-content/uploads/2020/07/bigstock-Close-up-And-Top-View-Of-Hot-B-350989136-900x580.jpg";
        $newUser->phone_number = '3338549634';
        $newUser->address="Via Miola";
        $newUser->p_iva= '10324579630';
        $newUser->rating=$ratings[array_rand($ratings, 1)];
        $newUser->password=Hash::make('password');
        $newUser->save();
        $newUser->categories()->attach(2);  //vedendo che categoria è quella con id 19 e associarla al ristorante se c'azzecca
        $newUser->categories()->attach(5); //vedendo che categoria è quella con id 19 e associarla al ristorante se c'azzecca


        $newUser = new User;
        $newUser->name = "Marco";
        $newUser->surname = "Greco";
        $newUser->email = "marcogr@gmail.com";
        $newUser->restaurant_name = "Devero";
        $newUser->restaurant_description = "I migliori panini li facciamo noi";
        $newUser->img = "https://www.schaer.com/sites/default/files/styles/header_large/public/1975_Deli%20Style%20Panini.webp?itok=-OJbLWMi";
        $newUser->phone_number = '3382549534';
        $newUser->address="Via Vinazzi";
        $newUser->p_iva= '78945874296';
        $newUser->rating=$ratings[array_rand($ratings, 1)];
        $newUser->password=Hash::make('password');
        $newUser->save();
        $newUser->categories()->attach(8);  //vedendo che categoria è quella con id 19 e associarla al ristorante se c'azzecca
        $newUser->categories()->attach(18); //vedendo che categoria è quella con id 19 e associarla al ristorante se c'azzecca


        $newUser = new User;
        $newUser->name = "Ciro";
        $newUser->surname = "Esposito";
        $newUser->email = "maradona10@gmail.com";
        $newUser->restaurant_name = "Bella Napoli";
        $newUser->restaurant_description = "La vera pizza napoletana solo per voi";
        $newUser->img = "https://www.wondernetmag.com/wp-content/uploads/2020/06/pizza-960x727.png";
        $newUser->phone_number = '3398559663';
        $newUser->address="Via Napoli";
        $newUser->p_iva= '63784591235';
        $newUser->rating=$ratings[array_rand($ratings, 1)];
        $newUser->password=Hash::make('password');
        $newUser->save();
        $newUser->categories()->attach(12);  //vedendo che categoria è quella con id 19 e associarla al ristorante se c'azzecca
        $newUser->categories()->attach(17); //vedendo che categoria è quella con id 19 e associarla al ristorante se c'azzecca


        $newUser = new User;
        $newUser->name = "Bruno";
        $newUser->surname = "Conti";
        $newUser->email = "contibr@gmail.com";
        $newUser->restaurant_name = "I sapori della terra";
        $newUser->restaurant_description = "La miglior pizza al taglio";
        $newUser->img = "http://cdn.cook.stbm.it/thumbnails/ricette/142/142771/hd750x421.jpg";
        $newUser->phone_number = '3378565674';
        $newUser->address="Piazza Uccelli";
        $newUser->p_iva= '85479632145';
        $newUser->rating=$ratings[array_rand($ratings, 1)];
        $newUser->password=Hash::make('password');
        $newUser->save();
        $newUser->categories()->attach(18);  //vedendo che categoria è quella con id 19 e associarla al ristorante se c'azzecca
        $newUser->categories()->attach(12); //vedendo che categoria è quella con id 19 e associarla al ristorante se c'azzecca
        $newUser->categories()->attach(17); //vedendo che categoria è quella con id 19 e associarla al ristorante se c'azzecca


        $newUser = new User;
        $newUser->name = "Sara";
        $newUser->surname = "Ricci";
        $newUser->email = "sararicci@gmail.com";
        $newUser->restaurant_name = "Duomo";
        $newUser->restaurant_description = "La vera cotoletta alla milanese";
        $newUser->img = "https://wips.plug.it/cips/paginegialle.it/magazine/cms/2018/10/98367409_s-1.jpg?w=744&h=418&a=c";
        $newUser->phone_number = '3374562784';
        $newUser->address="Via Santa";
        $newUser->rating=$ratings[array_rand($ratings, 1)];
        $newUser->p_iva= '14572396657';
        $newUser->password=Hash::make('password');
        $newUser->save();
        $newUser->categories()->attach(18);  //vedendo che categoria è quella con id 19 e associarla al ristorante se c'azzecca
        $newUser->categories()->attach(12); //vedendo che categoria è quella con id 19 e associarla al ristorante se c'azzecca


        $newUser = new User;
        $newUser->name = "Wu";
        $newUser->surname = "Zhyang";
        $newUser->email = "uwangzhy@gmail.com";
        $newUser->restaurant_name = "Sapporo";
        $newUser->restaurant_description = "Il sushi migliore d'Italia";
        $newUser->img = "https://www.romatoday.it/~media/horizontal-hi/21276864781105/sushi-2853382_640-2.jpg";
        $newUser->phone_number = '3388574674';
        $newUser->address="Via Roma";
        $newUser->rating=$ratings[array_rand($ratings, 1)];
        $newUser->p_iva= '78465989744';
        $newUser->password=Hash::make('password');
        $newUser->save();
        $newUser->categories()->attach(19);  //vedendo che categoria è quella con id 19 e associarla al ristorante se c'azzecca
        $newUser->categories()->attach(7); //vedendo che categoria è quella con id 19 e associarla al ristorante se c'azzecca


        $newUser = new User;
        $newUser->name = "Elmundo";
        $newUser->surname = "Espirito";
        $newUser->email = "espirito1@gmail.com";
        $newUser->restaurant_name = "La Peca";
        $newUser->restaurant_description = "I sapori del massico per voi";
        $newUser->img = "https://www.ristorantemessicanosantafe.it/wp-content/uploads/2018/05/Piatto-Tacos-de-pastor-3-845x684.jpeg";
        $newUser->phone_number = '3378565674';
        $newUser->address="Via Orbaga";
        $newUser->p_iva= '78566554321';
        $newUser->rating=$ratings[array_rand($ratings, 1)];
        $newUser->password=Hash::make('password');
        $newUser->save();
        $newUser->categories()->attach(15);  //vedendo che categoria è quella con id 19 e associarla al ristorante se c'azzecca
        $newUser->categories()->attach(1); //vedendo che categoria è quella con id 19 e associarla al ristorante se c'azzecca


        $newUser = new User;
        $newUser->name = "Giorgio";
        $newUser->surname = "Vanni";
        $newUser->email = "vannigio@gmail.com";
        $newUser->restaurant_name = "Cesar Salad";
        $newUser->restaurant_description = "Solo cibo genuino e salutare";
        $newUser->img = "https://www.negroni.com/sites/negroni.com/files/styles/scale__1440_x_1440_/public/insalata-di-primavera.jpg?itok=Ubbkj7qB";
        $newUser->phone_number = '3376483274';
        $newUser->address="Viale Pratello";
        $newUser->p_iva= '89602100230';
        $newUser->rating=$ratings[array_rand($ratings, 1)];
        $newUser->password=Hash::make('password');
        $newUser->save();
        $newUser->categories()->attach(18);  //vedendo che categoria è quella con id 19 e associarla al ristorante se c'azzecca
        $newUser->categories()->attach(9); //vedendo che categoria è quella con id 19 e associarla al ristorante se c'azzecca
        $newUser->categories()->attach(11); //vedendo che categoria è quella con id 19 e associarla al ristorante se c'azzecca


        $newUser = new User;
        $newUser->name = "Mustafa";
        $newUser->surname = "Turan";
        $newUser->email = "turanat10@gmail.com";
        $newUser->restaurant_name = "Demir Kebab";
        $newUser->restaurant_description = "Il kebab migliore";
        $newUser->img = "https://assets.eatintime.it/eatintime/img/media/2097-da-demir-kebab-carne-piemontese-torino-md.jpg";
        $newUser->phone_number = '3389597674';
        $newUser->address="Via Rialto";
        $newUser->p_iva= '00102549965';
        $newUser->rating=$ratings[array_rand($ratings, 1)];
        $newUser->password=Hash::make('password');
        $newUser->save();
        $newUser->categories()->attach(17);  //vedendo che categoria è quella con id 19 e associarla al ristorante se c'azzecca
        $newUser->categories()->attach(18); //vedendo che categoria è quella con id 19 e associarla al ristorante se c'azzecca
        $newUser->categories()->attach(13); //vedendo che categoria è quella con id 19 e associarla al ristorante se c'azzecca


    }
}
