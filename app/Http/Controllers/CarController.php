<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;
use App\Car;
use App\Admin;

class CarController extends Controller
{


        public function __construct() {
            $this->middleware('admin')->except('index', 'show');
        }


       

        public function imageDelete($image_url) {
            $oldPath = str_replace('storage', '/public', $image_url);
            Storage::delete($oldPath);
        }

        private function validation(Request $request) {
            $request->validate([
                'pavadinimas' => 'required|max:300|string',
                'klase' => 'required|max:300|string',
                'kaina' => 'required|numeric|min:0|max:100000',
                'kuras' => 'required|max:300|string',
                'deze' => 'required|max:300|string',
                'aprasymas' => 'required|max:1000',
                'image_url' => 'image',
            ], [
                'required' => 'laukas :attribute privalomas',
                'numeric' => 'turi būti skaičius'
            ]);
        }

        public function destroy(Car $car) {
            $this->imageDelete($car->image_url);
            $car->delete();
            return redirect()->route('cars.index');
        }


        public function edit(Car $car) {
            return view('cars/edit', ['car' => $car]);
        }

        public function update(Request $request, Car $car) {

            $this->validation($request);

            if ($request->image_url) {
                $path = $request->file('image_url')->store('public/cars');
                $path = str_replace('public', 'storage', $path);
                $this->imageDelete($car->image_url);
                $car->image_url = $path;
            }

            $car->pavadinimas = $request->pavadinimas;
            $car->klase = $request->klase;
            $car->kaina = $request->kaina;
            $car->kuras = $request->kuras; 
            $car->deze = $request->deze;
            $car->aprasymas = $request->aprasymas;

            return redirect()->route('cars.index');
        }


        public function create() {
            return view('cars/create');
        }

        public function store(Request $request) {

            $this->validation($request);

            $path = $request->file('image_url')->store('public/cars');
            $path = str_replace('public', 'storage', $path);

            //dar reikia sukurti symlinka: php artisan storage:link




            $car = new Car;
            $car->pavadinimas = $request->pavadinimas;
            $car->klase = $request->klase;
            $car->kaina = $request->kaina;
            $car->kuras = $request->kuras; 
            $car->deze = $request->deze;
            $car->aprasymas = $request->aprasymas;
            $car->image_url = $path;
            $car->save();

           

            return redirect()->route('cars.index');
        }

        public function index()
        {
            $cars = Car::all();
            return view('cars/index', ['cars' => $cars]);
        }

        /**
         * Show the form for creating a new resource.
         *
         * @return \Illuminate\Http\Response
         */


        public function show(Car $car) {
            return view('cars/show', ['car' => $car]);

        }


    }
