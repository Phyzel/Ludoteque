<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Car;

class CarsController extends Controller
{
    public function index() {
        $cars = \App\Car::all();
        return view('cars', ['cars' => $cars]);
    }

    public function insert(Request $request) {
        $car = new Car;
        $car->brand = $request->input('brand');
        $car->model = $request->input('model');
        $car->color = $request->input('color');
        $car->price = $request->input('price');
        $car->speed = $request->input('speed');

        $car->save();
    }

    public function update() {
        $car = \App\Car::find(1);
        $car->color = 'Bleue';
        $car->save();
        //dd($car);
    }

    public function delete() {
        $car = \App\Car::find(3);
        $car->delete();
    }
}
