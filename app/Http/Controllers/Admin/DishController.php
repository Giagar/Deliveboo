<?php
namespace App\Http\Controllers\Admin;
use App\Dish;
use Faker\Generator as Faker;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DishController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = $request->all();
            if (!empty($data["search-type"])) {
                $dishes=Dish::where('user_id', Auth::id())->where("type", "like", '%'.$data["search-type"].'%')->get();
            }
            if (!empty($data['search-vegan'])) {
                $dishes=Dish::where('user_id', Auth::id())->where("vegan", "1")->get();
            }
            if (!empty($data['search-gluten'])) {
                $dishes=Dish::where('user_id', Auth::id())->where("gluten", "0")->get();
            }
            if (!empty($data['search-price'])) {
                $dishes=Dish::where('user_id', Auth::id())->orderBy('price','asc')->get();
            }
            if(empty($data["search-type"]) && empty($data['search-gluten']) && empty($data["search-vegan"]) && empty($data['search-price'])){
            $dishes=Dish::where('user_id',Auth::user()->id)->get();
            }
        //   id() è alternativo a user()->id
        return view('user.dishes.index', compact('dishes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('user.dishes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $this->validateForm($request);
        $data=$request->all();
        $data['user_id']=Auth::id();
        $dish= new Dish();
        $dish->fill($data);
        $dish->img = $request->file('image')->store('images');
        $dish->save();
        return redirect()->route('dishes.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Dish $dish)
    {
        return view('user.dishes.show',compact('dish'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Dish $dish)
    {
     return view('user.dishes.edit',compact('dish'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Dish $dish)
    {
        $this->validateForm($request);
        $data= $request->all();
        $dish->img = $request->file('image')->store('images');
        $dish->update($data);
        return redirect()->route('dishes.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dish $dish)
    {
        //  $dish->user()->dissociate();
        $dish->delete();
        return redirect()->route('dishes.index');
    }
    protected function validateForm(Request $request){
        $request->validate([
            'name'=>'required|max:100',
            'description'=>'required|max:100',
            'type'=>'required|in:antipasto,primo,secondo,contorno,dessert',
            'price'=>'required|numeric|between:0,999.99',
            'vegan'=>'required|boolean',
            'gluten'=>'required|boolean',
            'visible'=>'required|boolean',
            'image'=>'required|image|mimes:jpg,png,jpeg,gif,svg',
            // |max:1500|dimensions:min_width=100,min_height=100,max_width=1000,max_height=1000
          ]);
    }

}
