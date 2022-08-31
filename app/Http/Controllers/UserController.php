<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    public function login()
    {
        return view('pages.login.login');
    }

    public function postLogin(Request $request)
    {
        $datas = $request->only('email', 'password');
 
        if (Auth::attempt($datas)) {
            return redirect()->route('home')->with('alert', 'Successfully sign in');
        }

        return redirect()->back()->withInput()->with('alert', 'Login failed');
    }

    public function register()
    {
        return view('pages.login.register');
    }

    public function postRegister(Request $request)
    {
        $datas = $request->only('username','first_name','last_name', 'email', 'password');
        $datas['password'] = Hash::make($datas['password']);
        $datas['isAdmin'] = 0;
        $user = User::create($datas);
        if ($user) {
            return redirect()->route('login');
        }    

        return redirect()->back()->withInput()->with('alert', 'Registration failed');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $users = User::all();
       
       return view('pages.user.index', compact('users'));
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
        $user = User::find($id);

        return view('pages.user.show', ['user' => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($user)
    {
        DB::beginTransaction();

        try {
            $user = User::find($user);
            $user->delete();
            DB::commit();

            return redirect()->route('users.index')->with('alert', trans('messages.alert.delete_success'));
        } catch (Exception $e) {
            DB::rollBack();
            Log::error($e->getMessage());
            
            return redirect()->route('users.index')->with('alert', trans('messages.alert.delete_error'));
        }
    }

    public function logout() 
    {
        Auth::logout();
     
        return redirect(route('login.form'));
    }
}
