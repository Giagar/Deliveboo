<?php

use App\Dish;
use Illuminate\Database\Seeder;

class DishSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

//Ristorante1 hamburger americano specialità carne

        $types1 = ['secondo','secondo','contorno'];

        $names1 = ["CheeseBurger classico", "Tagliata di carne", "Insalata"];
        $images1 = ["https://wips.plug.it/cips/buonissimo.org/cms/2019/03/hamburger.jpg","https://cdn.ilclubdellericette.it/wp-content/uploads/2019/02/Tagliata-di-Carne-con-Salsa-al-Gorgonzola.jpg","https://static.cookist.it/wp-content/uploads/sites/21/2019/05/insalata-di-cetrioli-638x425.jpg"];
        $descriptions1=['Il nostro Cheeseburger ha ricevuto commenti entusiastici da parte di varie stelle del cinema mondiale','La nostra carne alla griglia ti farà impazzire','Un\'insalata tradizionale per tenere a bada il colesterolo'];
        for ($i=0; $i < 3; $i++) {
            $newDish = new Dish;
            $newDish->name = $names1[$i];
            $newDish->img = $images1[$i];
            $newDish->description = $descriptions1[$i];
            $newDish->price = number_format(rand(100, 1000) / 100, 2);
            $newDish->visible = rand(0,1);
            $newDish->vegan = 1;
            $newDish->gluten = 1;
            $newDish->type= $types1[$i];
            $newDish->user_id = 1;
            $newDish->save();
            $newDish->orders()->attach(rand(1,20));
            $newDish->orders()->attach(rand(1,20));
    }


 //ristorante 2 caffe dolci e dessert

        $types2 = ['dessert', 'dessert', 'dessert'];

        $names2 = ["Tiramisù", "Torta Paradiso", "Cheesecake ricotta e pere"];
        $images2 = ["https://dpv87w1mllzh1.cloudfront.net/alitalia_discover/attachments/data/000/002/587/original/la-ricetta-classica-del-tiramisu-con-uova-savoiardi-e-mascarpone-1920x1080.jpg","https://www.giallozafferano.it/images/178-17873/Torta-paradiso_650x433_wm.jpg","https://www.dolcidee.it/media/uploads/recipe/5e540bbf61c90_tmp2fc340af79fd4090803a19fe89d8ef23.jpg"];
        $descriptions2=['Il dolce  più famoso della tradizione italiana leggermente rivisitato in una chiave moderna','Una delle torte più semplici e gustose, i bambini ne vanno matti','La torta ricotta e pere è una specialità tutta nostra: una volta provata non potrai più farne a meno'];
        for ($i=0; $i < 3; $i++) {
            $newDish = new Dish;
            $newDish->name = $names2[$i];
            $newDish->img = $images2[$i];
            $newDish->description = $descriptions2[$i];
            $newDish->price = number_format(rand(100, 1000) / 100, 2);
            $newDish->visible = rand(0,1);
            $newDish->vegan = 1;
            $newDish->gluten = 1;
            $newDish->type= $types2[$i];
            $newDish->user_id = 2;
            $newDish->save();
            $newDish->orders()->attach(rand(1,20));
            $newDish->orders()->attach(rand(1,20));
    }
 //ristorante 3 panini hamburger street food

       $types3 = ['secondo','secondo','secondo','contorno', 'dessert'];
       $names3 = ["CheeseBurger", "Double CheeseBurger","Crispy Burger","Patatine","Tiramisù"];
        $images3 = ["https://www.agrodolce.it/app/uploads/2016/12/cheeseburger.jpg","https://i.ytimg.com/vi/-f3xtWvOopg/maxresdefault.jpg","https://theburgergirlorg.files.wordpress.com/2020/07/img_8505.jpg","https://www.donnamoderna.com/content/uploads/2005/03/Patatine-fritte-ricetta-classica-830x625.jpg","https://dpv87w1mllzh1.cloudfront.net/alitalia_discover/attachments/data/000/002/587/original/la-ricetta-classica-del-tiramisu-con-uova-savoiardi-e-mascarpone-1920x1080.jpg"];
       $descriptions3=['Il nostro cheeseburger classico è così come lo vedi:conciso, diretto.Praticamente una foto tessera','Se proprio sei un animale questo è quello che fa al caso tuo','Se ami il bacon amerai il gusto deciso del nostro Crispy Bacon','Un cult per grandi e piccini, immergile nella maionese o nel ketchup e ti fermerai solo quando saranno finite','Il dolce tipico della tradizione italiana'];

        for ($i=0; $i < 5; $i++) {

            $newDish = new Dish;
            $newDish->name = $names3[$i];
            $newDish->img = $images3[$i];
            $newDish->description = $descriptions3[$i];
            $newDish->price = number_format(rand(100, 1000) / 100, 2);
            $newDish->visible = rand(0,1);
            $newDish->vegan = 0;
            $newDish->gluten = 1;
            $newDish->type= $types3[$i];
            $newDish->user_id = 3;
            $newDish->save();
            $newDish->orders()->attach(rand(1,20));
            $newDish->orders()->attach(rand(1,20));


        }

 //ristorante 4 napoletano pizza

$types4 = ['primo','primo','primo','primo'];
   $names4=['Pizza Marinara','Pizza Margherita','Pizza Cacio e Pepe','Pizza Diavola'];
        $images4 = ["https://wips.plug.it/cips/buonissimo.org/cms/2012/05/pizza-marinara-5.jpg","https://primochef.it/wp-content/uploads/2019/07/SH_pizza_napoletana-640x350.jpg","https://media-cdn.tripadvisor.com/media/photo-s/08/86/bc/1c/i-dodici-gatti.jpg","https://i.ytimg.com/vi/S1__vdNiuGQ/maxresdefault.jpg"];
     $descriptions4=['Per chi ama le acciughe questa è una pizza assolutamente irrinunciabile ','La pizza regina della tradizione partenopea','La pizza che ordina sempre Alessandro Borghese','La pizza per chi ha un animo inquieto'];

        for ($i=0; $i < 4; $i++) {

            $newDish = new Dish;
            $newDish->name = $names4[$i];
            $newDish->img = $images4[$i];
            $newDish->description = $descriptions4[$i];
            $newDish->price = number_format(rand(100, 1000) / 100, 2);
            $newDish->visible = rand(0,1);
            $newDish->vegan = 0;
            $newDish->gluten = 1;
            $newDish->type= $types4[$i];
            $newDish->user_id = 4;
            $newDish->save();
            $newDish->orders()->attach(rand(1,20));
            $newDish->orders()->attach(rand(1,20));


        }



 //ristorante 5 street food pizza italiano

$types5 = ['primo','primo','contorno','contorno'];
   $names5=['Pizza Margherita','Pizza Wurstel e patatine','Patatine','Crocchette'];
        $images5 = ["https://primochef.it/wp-content/uploads/2019/07/SH_pizza_napoletana-640x350.jpg","https://www.scattidigusto.it/wp-content/uploads/2015/11/pizza-wurstel-patatine-pomodoro.jpg","https://www.buttalapasta.it/wp-content/uploads/2012/02/patatine-fritte.jpg","https://static.cookist.it/wp-content/uploads/sites/21/2017/09/crocchette-di-patate1.jpg"];
     $descriptions5=['La pizza tipica della tradizione italiana, provala nella nostra versione con olio di semi','La pizza più amata dai bambini, ma a cui anche i grandi ritornano di tanto in tanto: come biasimarli?','Una tira l\'altra','Non puoi non provare le nostre crocchette con cuore filante di mozzarella.Le prepariamo in varie versioni:con prosciutto, salsiccia,friarielli. Quale sceglierai'];

        for ($i=0; $i < 4; $i++) {

            $newDish = new Dish;
            $newDish->name = $names5[$i];
            $newDish->img = $images5[$i];
            $newDish->description = $descriptions5[$i];
            $newDish->price = number_format(rand(100, 1000) / 100, 2);
            $newDish->visible = rand(0,1);
            $newDish->vegan = 0;
            $newDish->gluten = 1;
            $newDish->type= $types5[$i];
            $newDish->user_id = 5;
            $newDish->save();
            $newDish->orders()->attach(rand(1,20));
            $newDish->orders()->attach(rand(1,20));


        }


//ristorante 6 street food italiano (cotoletta)

$types6 = ['primo','secondo', 'secondo', 'dessert'];
   $names6=['Risotto allo zafferano','Cotoletta alla milanese','Osso buco','Mousse al cioccolato'];
        $images6 = ["https://www.cucchiaio.it/content/cucchiaio/it/ricette/2009/11/ricetta-risotto-alla-milanese/jcr:content/header-par/image_single.img10.jpg/1442680114700.jpg","https://assets.tmecosys.com/image/upload/t_web767x639/img/recipe/ras/Assets/AE8115F7-712B-4C91-BCF2-584227E5D73D/Derivates/B0FDA22A-3F79-430C-9825-AACFEA6A4DF6.jpg","https://static.cookist.it/wp-content/uploads/sites/21/2017/10/ossobuco-alla-milanese.jpg","https://www.cucchiaio.it/content/cucchiaio/it/ricette/2018/01/mousse-al-cioccolato-senza-uova/jcr:content/imagePreview.img10.jpg/1560173302329.jpg"];
     $descriptions6=['Il risotto allo zafferano è un primo piatto semplice e saporito, caratterizzato da un gusto e un colore unici e inconfondibili!','La cotoletta alla milanese è un secondo piatto tipico della tradizione culinaria lombarda, una pietanza simbolo, conosciuta in tutto il mondo.La nostra è stata votata da Alessandro Borghese nel programma Quattro Ristoranti come la migliore di Milano','L\'ossobuco alla milanese è un piatto speciale, un fiore all\'occhiello della cucina lombarda.
Si tratta di una ricetta molto antica, fonti storiche infatti testimoniano che già nel 700 era preparato per i nobili che lo amavano molto. In realtà ci sono molti modi di prepararlo e in base a come lo si fa si può parlare di secondo piatto di carne o di piatto unico.','La mousse al cioccolato è un dolce al cucchiaio davvero goloso, perfetto come fine pasto, che piace da sempre a tutti, grandi e piccini'];

        for ($i=0; $i < 4; $i++) {

            $newDish = new Dish;
            $newDish->name = $names6[$i];
            $newDish->img = $images6[$i];
            $newDish->description = $descriptions6[$i];
            $newDish->price = number_format(rand(100, 1000) / 100, 2);
            $newDish->visible = rand(0,1);
            $newDish->vegan = 0;
            $newDish->gluten = 1;
            $newDish->type= $types6[$i];
            $newDish->user_id = 6;
            $newDish->save();
            $newDish->orders()->attach(rand(1,20));
            $newDish->orders()->attach(rand(1,20));


        }





//ristorante7 sushi giapponese

$types7 = ['primo','primo','contorno', 'dessert'];
   $names7=['Nigiri','Uramaki','Edamame','Biscotto della fortuna'];
        $images7 = ["https://assets.tmecosys.com/image/upload/t_web767x639/img/recipe/ras/Assets/64EF898D-2EDD-4B47-A456-E6A7D137AC91/Derivates/00f76cac-64f6-4573-be4f-e604a7d99143.jpg","https://loves.cucchiaio.it/wp-content/uploads/2017/02/1466425275386.jpg","https://assets.tmecosys.com/image/upload/t_web767x639/img/recipe/vimdb/205193_424-0-2697-2697.jpg","https://images.lacucinaitaliana.it/wp-content/uploads/2018/09/04112123/Biscotti-della-fortuna-1600x800.jpg"];
     $descriptions7=['I nigiri, o nigirizushi, sono una tipologia di sushi, costituita da polpettine di riso guarnite in superficie con una fettina di pesce crudo. Provali al salmone, pesce spada e tonno','Gli uramaki, con alga all\'interno e riso all\'esterno, sono i roll più amati della cucina giapponese.Noi li prepariamo in mille varianti, con ripieni che vanno dal classico avocado e philadelfia a versioni più strong','I nostri baccelli di soia non hanno nulla a che vedere con i piselli: hanno un sapore unico ed irresistible','Aprilo e scopri il futuro che ti è stato riservato'];

        for ($i=0; $i < 4; $i++) {

            $newDish = new Dish;
            $newDish->name = $names7[$i];
            $newDish->img = $images7[$i];
            $newDish->description = $descriptions7[$i];
            $newDish->price = number_format(rand(100, 1000) / 100, 2);
            $newDish->visible = rand(0,1);
            $newDish->vegan = 0;
            $newDish->gluten = 0;
            $newDish->type= $types7[$i];
            $newDish->user_id = 7;
            $newDish->save();
            $newDish->orders()->attach(rand(1,20));
            $newDish->orders()->attach(rand(1,20));


        }




//ristorante 8 messicano americano

$types8 = ['antipasto','primo', 'secondo', 'dessert'];
   $names8=['Tortillas','Pozole','Burrito','Frutta di jicama'];
        $images8 = ["https://i.pinimg.com/originals/43/16/22/431622a44e7b68d3ea0ffde992d3b05c.jpg","https://thumbs.dreamstime.com/b/piatto-messicano-di-pozole-16597711.jpg","https://d1e3z2jco40k3v.cloudfront.net/-/media/mccormick-us/recipes/frenchs/c/800/cheeseburger-burrito3.jpg","https://static.agrodolce.it/app/uploads/2018/07/jicama-2-640x427.jpg"];
     $descriptions8=['Realizziamo le nostre tortillas in molteplici varianti, con o senza olio, con farina di mais o di frumento: provale tutte per capire quale preferisci.','La nostra zuppa è un trionfo di sapori e fragranze legate a tradizioni antichissime:te ne innamorerai alla prima cucchiaiata','Tortillas farcite di carne e verdure, da mangiare rigorosamente con le mani!','Noi sulla frutta mettiamo sale e peperoncino: può sembrare un accostamento folle, ma solo a chi non l\'ha ancora provato'];

        for ($i=0; $i < 4; $i++) {

            $newDish = new Dish;
            $newDish->name = $names8[$i];
            $newDish->img = $images8[$i];
            $newDish->description = $descriptions8[$i];
            $newDish->price = number_format(rand(100, 1000) / 100, 2);
            $newDish->visible = rand(0,1);
            $newDish->vegan = 0;
            $newDish->gluten = 1;
            $newDish->type= $types8[$i];
            $newDish->user_id = 8;
            $newDish->save();
            $newDish->orders()->attach(rand(1,20));
            $newDish->orders()->attach(rand(1,20));


        }

//ristorante 9 street food italiano  healty


$types9= ['primo','secondo', 'secondo', 'dessert'];
   $names9=['Penne con crema di zucchine','Crema di zucca','Filetto di salmone','Brownies al cioccolato'];
        $images9 = ["https://wips.plug.it/cips/buonissimo.org/cms/2011/10/pasta-zucchine.jpg","https://wips.plug.it/cips/buonissimo.org/cms/2011/11/crema-zucca.jpg","https://mangiarebene.s3.amazonaws.com/uploads/recipe/image/1885/standard_filetti-di-salmone-bbq.jpg","https://www.dolcisenzarinunce.com/wp-content/uploads/2017/10/Brownies-al-cioccolato-senza-zucchero.jpg"];
     $descriptions9=['La pasta con zucchine è un primo piatto classico,semplice e velocissimo con le zucchine fresche. In questo modo il condimento abbraccia la pasta insaporendola di tutto il gusto e profumo.La più buona pasta con le zucchine di sempre!','La crema di zucca èun delicato comfort food, una zuppa preparata con polpa di zucca gialla. La nostra al suo interno haun ingrediente segreto:riesci a indovinarlo?','Il filetto di salmone al BBQ è un\'idea di ricetta con salmone che vi stupirà, un\'alternativa rispetto al salmone al forno. Con verdure e senape','Biscotti senza zucchero, per rimanere in forma senza rinunciare al gusto'];

        for ($i=0; $i < 4; $i++) {

            $newDish = new Dish;
            $newDish->name = $names9[$i];
            $newDish->img = $images9[$i];
            $newDish->description = $descriptions9[$i];
            $newDish->price = number_format(rand(100, 1000) / 100, 2);
            $newDish->visible = rand(0,1);
            $newDish->vegan = 1;
            $newDish->gluten = 0;
            $newDish->type= $types9[$i];
            $newDish->user_id = 9;
            $newDish->save();
            $newDish->orders()->attach(rand(1,20));
            $newDish->orders()->attach(rand(1,20));


        }



//ristorante 10 kebab pizza street food

$types10 = ['primo','primo', 'secondo', 'secondo'];
   $names10=['Kebab','Pizza Margherita','patatine','crocchette'];
        $descriptions10 = ["Piatto tipico della cucina mediorientale, costituito da grossi pezzi di carne sovrapposti, infilzati e arrostiti su uno spiedo verticale e poi tagliati longitudinalmente in modo da ottenere delle strisce sottili per imbottire panini o pite.","La pizza regina della tradizione italiana", "Provale con ketchup o maionese", "Prepariamo le nostre crocchette con varie farciture, dal prosciutto ai funghi.Provale tutte, non saprai decidere quale preferisci!"];
     $images10=['https://www.agrodolce.it/app/uploads/2019/04/shutterstock-529626445-980x400.jpg','https://primochef.it/wp-content/uploads/2019/08/SH_pizza_fatta_in_casa-1200x800.jpg','https://www.daziamina.it/wp-content/uploads/2018/05/patate-fritte-.jpg','https://www.cucchiaio.it/content/cucchiaio/it/ricette/2017/08/crocchette-di-riso/jcr:content/header-par/image-single.img10.jpg/1503301549177.jpg'];

        for ($i=0; $i < 4; $i++) {

            $newDish = new Dish;
            $newDish->name = $names10[$i];
            $newDish->img = $images10[$i];
            $newDish->description = $descriptions10[$i];
            $newDish->price = number_format(rand(100, 1000) / 100, 2);
            $newDish->visible = rand(0,1);
            $newDish->vegan = 0;
            $newDish->gluten = 1;
            $newDish->type= $types10[$i];
            $newDish->user_id = 10;
            $newDish->save();
            $newDish->orders()->attach(rand(1,20));
            $newDish->orders()->attach(rand(1,20));

        }
    }
    }




