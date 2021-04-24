<?php

use App\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories =
        [ ['name'=>'Americano','img'=>'https://www.coasttocoastdelivery.it/wp-content/uploads/2020/04/hotdog.jpg'],
        ['name'=>'Caffetteria','img'=>'https://mokito.it/wp-content/uploads/2015/06/11391134_839946586059074_7759288229776778296_n-e1435672955177.jpg'],
        ['name'=>'Cinese','img'=>'https://www.puntarellarossa.it/wp/wp-content/uploads/2020/10/tenoha-ramen-500x500_c.jpg'],
        ['name'=>'Coreano','img'=>'https://www.lovemysalad.com/sites/default/files/styles/recipe_schema_image/public/korean_spicy_carrot_salad.jpg?itok=KfQ0ZJzp'],
        ['name'=>'Dessert','img'=>'https://www.4leoni.it/wp-content/uploads/2020/05/Cheese-cake-salsa-di-lamponi-Trattoria-4-Leoni-Firenze-500x500.jpg'],
        ['name'=>'Gelato','img'=>'https://www.biancolatte.it/wp-content/uploads/2021/01/GELATERIA_01-500x500.jpeg'],
        ['name'=>'Giapponese','img'=>'https://www.mangioquindisono.it/wp-content/uploads/2014/05/gyoza3-500x500.jpg'],
        ['name'=>'Hamburger','img'=>'https://healthylittlecravings.com/wp-content/uploads/2019/08/Grilled-salmon-burgers-1-1-500x500.jpg'],
        ['name'=>'Healthy','img'=>'https://kangarooislandoats.com.au/wp-content/uploads/2019/01/healthy-porridge-500x500.jpg'],
        ['name'=>'Indiano','img'=>'https://static.sscontent.com/prodimg/thumb/500/500/products/124/v730281_prozis_indian-chicken-tikka-masala_newin.jpg'],
        ['name'=>'Insalate','img'=>'https://www.cosebellemagazine.it/wp-content/uploads/2020/02/insalata-fagiolini-feta-cov-500x500.jpg'],
        ['name'=>'Italiano','img'=>'https://dinnerthendessert.com/wp-content/uploads/2016/04/Ultimate-Meat-Lasagna-3-1-500x500.jpg'],
        ['name'=>'Kebab','img'=>'https://i2.wp.com/buonissimopizzakebabudine.it/wp-content/uploads/2019/09/13508935_1619820344975197_4750521157122972628_n-500x500.jpg'],
        ['name'=>'Mediterraneo','img'=>'https://cibochepassioneblog.it/wp-content/uploads/2020/07/Pita-pane-greco-piatto-e-rotondo-veloce-da-preparare-500x500.jpg'],
        ['name'=>'Messicano','img'=>'https://www.melarossa.it/wp-content/uploads/2020/12/tacos-ricetta.jpg'],
        ['name'=>'Pasta','img'=>'https://www.informacibo.it/wp-content/uploads/2018/04/carbonara-500x500.jpg'],
        ['name'=>'Pizza','img'=>'https://www.puntarellarossa.it/wp/wp-content/uploads/2021/04/iQuintili-Roma-pizza-delivery2-500x500_c.jpg'],
        ['name'=>'Street','img'=>'https://www.puntarellarossa.it/wp/wp-content/uploads/2020/10/Panini-di-pesce-Milano-500x500_c.png'],
        ['name'=>'Sushi','img'=>'https://www.escoffieronline.com/wp-content/uploads/2017/01/Make-sure-your-rice-isnt-packed-together_1107_40149705_1_14113885_500.jpg'],
        ['name'=>'Thailandese','img'=>'https://www.scambiaricette.it/wp-content/uploads/2018/11/Pad-Thai-970x555.png'],
        ];

        foreach ($categories as $category) {
            $newCategory=new Category();
            $newCategory->fill($category);
            $newCategory->save();
        }
    }
}
