<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class UserController extends Controller {

    public function getLogin()
    {
        //show form
        return View('login');
    }

    public function postLogin(){

        //process form
        return Redirect::to('/');
    }

    public function authenticate(){
        if(Auth::attempt(['usrEmail' => $email, 'usrPassword' => $password])){
            return redirect()->intended('login');
        }
    }

    public function getRegister()
    {
        return view('register');
    }

    public function postRegister(){


        return Redirect::to('/');
    }
}
