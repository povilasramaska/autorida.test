<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\User;


class UserController extends Controller
{
    use RegistersUsers;

    public function __construct() {
        $this->middleware('admin')->except('edit', 'show', 'update');
    }

    protected function validation(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'birthday' => 'required|date|after:1910-01-01|before:now',
            // 'email' => 'required|string|email|max:255|unique:users',
            'phone' =>'required|string|max:255',
            // 'password' => 'required|string|min:6|confirmed',
            'address' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'zipcode' => 'required|string|max:255',
            'country' => 'required|string|max:255',
        ], [
            'required' => 'laukas :attribute privalomas',
            'numeric' => 'turi būti skaičius',
            'date' => 'turi būti data',
            'max:255' => 'turi būti ne ilgesnis kaip 255 simboliai',
            'after:1910-01-01' => 'data turi būti ne ankstesnė kaip 1910-01-01',
            'before:now' => 'data turi būti ne vėlesnė negu šios dienos data'
        ]);
    }



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('users/index', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function edit(User $user)
     {
         if ($user->id == Auth::id() || Auth::user()->role == 'admin') {
             return view('users/edit', ['user' => $user]);
         } else {
             return redirect()->route('home');
         }
     }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $this->validation($request);

        $user->name = $request->name;
        $user->surname = $request->surname;
        $user->birthday = $request->birthday;
        // $user->email = $request->email;
        $user->phone = $request->phone;
        $user->city = $request->city;
        $user->address = $request->address;
        $user->zipcode = $request->zipcode;
        $user->country = $request->country;

        $user->save();
        return redirect()->route('home');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index');
    }
}
