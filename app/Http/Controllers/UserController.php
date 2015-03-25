<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use \Validator;
use Auth;

use Illuminate\Http\Request;

class UserController extends Controller {

    public function getLogin()
    {
        //show form
        return View('login');
    }

    public function postLogin(Request $request)
    {
        //Request::input(''); or Input::get('');
        $username = $request->input('username');
        $pass = $request->input('password');
        $remember = $request->input('remember');


       // $this->validate($request, ['usrName' => 'required', 'password' => 'required']);
        //validate messes something up

//        $pass = ;
        Auth::loginUsingId(1);

//        if(Auth::attempt(['username'=> $username, 'password' => $pass], $remember)){
//
//            return redirect::to('/');
//        }
        return redirect('/');
    }

    public function logOut(){

        Auth::logout();

        return redirect()->back();
    }

    public function authorize(){

        //only allow logged in users
        //return \Auth::check();
        //allows all users in
        if(!Auth::check()){
            return false;
        }

        return true;
    }

    public function authenticate(){
//        if(Auth::attempt(['usrEmail' => $email, 'usrPassword' => $password])){
//            return redirect()->intended('login');
//        }
    }

    public function getRegister()
    {
        return view('register');
    }

    public function postRegister(){


        return Redirect::to('/');
    }

}
