<?php

namespace App\Http\Controllers;

use App\Http\Requests\KingmeatRequest;
use App\Models\Category;
use App\Models\Menu;
use Illuminate\Http\Request;

// use function PHPUnit\Framework\returnSelf;

class KingmeatController extends Controller
{
    public function index()
    {
        $menus = Menu::all();
        $categorys = Category::all();
        $param = [
            'menus' => $menus,
            'categorys' => $categorys
        ];
        return view('index', $param);
    }

    public function create(KingmeatRequest $request)
    {
        if ($request->image) {
            $filename = $request->image->getClientOriginalName();
        }
        $path = isset($filename) ? $request->file('image')->storeAs('images', $filename, 'public') : '';
        Menu::create([
            'name' => $request->name,
            'price' => $request->price,
            'calorie' => $request->calorie,
            'path' => $path,
            'category_id' => $request->category_id
        ]);
        return redirect('/');
    }

    public function delete(Request $request)
    {
        Menu::find($request->id)->delete();
        return back();
    }

    public function find()
    {
        $categorys = Category::all();
        $menus = [];
        return view('search', ['categorys' => $categorys, 'menus' => $menus]);
    }

    public function search(Request $request)
    {
        $categorys = Category::all();
        $name = $request['name'];
        $price_low = $request['price_low'];
        $price_heigh = $request['price_heigh'];
        $calorie_low = $request['calorie_low'];
        $calorie_heigh = $request['calorie_heigh'];
        $category_id = $request['category_id'];
        $menus = Menu::doSearch($name, $price_low, $price_heigh, $calorie_low, $calorie_heigh, $category_id);
        return view('search', ['categorys' => $categorys, 'menus' => $menus]);
    }

    public function return()
    {
        $menus = Menu::all();
        $categorys = Category::all();
        $param = [
            'menus' => $menus,
            'categorys' => $categorys
        ];
        return view('index', $param);
    }
}
