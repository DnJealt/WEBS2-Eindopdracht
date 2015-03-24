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
        $email = $request->input('email');
        $pass = $request->input('password');
        $remember = $request->input('remember');
//        $credentials = [];
//        $credentials['email'] = Request::input('email');
//        $credentials['password'] = Request::input('password');

//        $remember = false;
//        if( Input::get($remember)){
//            $remember = true;
//        }
       $this->validate($request, ['email' => 'required', 'password' => 'required']);

        if(Auth::attempt(['email'=> $email, 'password' => $pass], $remember)){
            return redirect('/');
        }
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
