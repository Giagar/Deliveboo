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
        [ ['name'=>'Americano','img'=>'https://www.agrodolce.it/app/uploads/2015/06/shutterstock_129032666.jpg'],
        ['name'=>'Caffetteria','img'=>'https://enegabest.it/wp-content/uploads/2019/04/caffetteria-torino2.jpg'],
        ['name'=>'Cinese','img'=>'https://www.scattidigusto.it/wp-content/uploads/2013/11/Xiaolongbao-%C2%A9rfung8.jpg'],
        ['name'=>'Coreano','img'=>'https://www.marcotogni.it/v-2/33/cucina-coreana.jpg'],
        ['name'=>'Dessert','img'=>'https://www.buttalapasta.it/wp-content/uploads/2020/11/dolci-veloci.jpg'],
        ['name'=>'Gelato','img'=>'https://www.ilfaroonline.it/photogallery_new/images/2019/10/gelati-114260.660x368.jpg'],
        ['name'=>'Giapponese','img'=>'https://www.watabi.it/blog/wp-content/uploads/2019/09/udon-cibo-giapponese.jpg'],
        ['name'=>'Hamburger','img'=>'https://upload.wikimedia.org/wikipedia/commons/thumb/0/0b/RedDot_Burger.jpg/1200px-RedDot_Burger.jpg'],
        ['name'=>'Healthy','img'=>'http://cdn.shopify.com/s/files/1/0288/7738/9955/articles/5-Benefits-of-Healthy-Eating_1024x1024.jpg'],
        ['name'=>'Indiano','img'=>'https://www.2backpack.it/wp-content/uploads/2018/02/Migliore-Street-Food-Indiano-Delhi-Chandni-Chowk.jpg'],
        ['name'=>'Insalate','img'=>'https://farma-co.com/images/blog/Insalata-greca-classica.jpg'],
        ['name'=>'Italiano','img'=>'https://www.recipeselected.com/wp-content/uploads/2018/08/Recipes-Selected-Lasagna.jpg'],
        ['name'=>'Kebab','img'=>'https://cdn.ilclubdellericette.it/wp-content/uploads/2019/06/kebab-fatto-in-casa.jpg'],
        ['name'=>'Mediterraneo','img'=>'https://www.ricettasprint.it/wp-content/uploads/2019/06/Dieta-mediterranea-del-dottor-Calabrese-ricettasprint.it_-1280x720.jpg'],
        ['name'=>'Messicano','img'=>'https://www.agenziaformativaulisse.it/formazione/wp-content/uploads/2016/12/cucina-messicana.jpg'],
        ['name'=>'Pasta','img'=>'https://www.foodsworld.it/wp-content/uploads/2020/11/Ricetta-Pasta-alla-Carbonara-min-scaled.jpg'],
        ['name'=>'Pizza','img'=>'https://static.cookist.it/wp-content/uploads/sites/21/2018/03/pizza-3000274-960-720.jpg'],
        ['name'=>'Street food','img'=>'https://www.mangiaebevi.it/wp-content/uploads/2019/10/stree-food-italiano.jpg'],
        ['name'=>'Sushi','img'=>'https://cdn.ilclubdellericette.it/wp-content/uploads/2020/01/sushi.jpg'],
        ['name'=>'Thailandese','img'=>'https://www.2backpack.it/wp-content/uploads/2018/05/Migliori-Piatti-Cucina-Thailandese-Tradizionale6.jpg'],
        ];

        foreach ($categories as $category) {
            $newCategory=new Category();
            $newCategory->fill($category);
            $newCategory->save();
        }
    }
}
