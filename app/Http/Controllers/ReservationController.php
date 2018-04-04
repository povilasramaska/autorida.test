<?php

namespace App\Http\Controllers;

use App\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     private function validation(Request $request) {
         $request->validate([
             'name' => 'required|string|max:255',
             'people_amount' => 'required|integer|min:1|max:120',
             'date' => 'required|date|after:now|before:+12 week',
             'time'=> 'required|date_format:"H:i"',
             'phone'=>'required|string|max:255',
         ], [
             'required' => 'laukas :attribute privalomas',
             'integer' => 'turi būti skaičius'
         ]);
     }

    public function index()
    {
        if(Auth::user()->role == 'admin'){
            $reservations = Reservation::all();
        }else{
            $reservations = Reservation::where('user_id', Auth::user()->id)->get();
        }

        return view('reservations/index', ['reservations' => $reservations]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user= User::find(Auth::user()->id);
        return view('reservations/create', ['user'=>$user]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validation($request);
        $reservation = new Reservation;
        $reservation->name = $request->name;
        $reservation->people_amount = $request->people_amount;
        $reservation->date = $request->date;
        $reservation->time = $request->time;
        $reservation->phone = $request->phone;
        $reservation->user_id = Auth::id();
        $reservation->save();
        return redirect()->route('reservations.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function show(Reservation $reservation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function edit(Reservation $reservation)
    {
        if ($reservation->user_id == Auth::id()) {
            return view('reservations/edit', ['reservation' => $reservation]);
        } else {
            return redirect()->route('reservations.index');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reservation $reservation)
    {

        $this->validation($request);
        $reservation->name = $request->name;
        $reservation->people_amount = $request->people_amount;
        $reservation->date = $request->date;
        $reservation->time = $request->time;
        $reservation->phone = $request->phone;
        $reservation->user_id = Auth::id();
        $reservation->save();

        $reservation->save();

        return redirect()->route('reservations.index', $reservation->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reservation $reservation)
    {
        $reservation->delete();
        return redirect()->route('reservations.index');
    }
}
