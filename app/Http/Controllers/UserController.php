<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use \Validator;
use \Redirect;
use App\User;
use Auth;
use DB;
use Hash;

use Illuminate\Http\Request;

class UserController extends Controller {

    public function getLogin()
    {
        if(!Auth::user()) {
            //show form
            return View('login');
        }
        return redirect('/');
    }

    public function postLogin(Request $request)
    {
        if(!Auth::user()){
//        //Request::input(''); or Input::get('');
            $username = $request->input('username');
            $pass = $request->input('password');
            $remember = $request->input('remember');
            //var_dump($username.' /|\ '.$pass);

            $logAttempt = DB::select("CALL Authentication('$username','$pass')");

            if($logAttempt[0]->id >= 0)
            {
                Auth::loginUsingId($logAttempt[0]->id);

                return redirect('/');
            }
            else {
            //echo'niet bestaande gebruiker';
                return redirect('/');
            }
        }
        else{
            return redirect('/');
        }
    }

    public function logOut()
    {
        if (Auth::user()) {
            Auth::logout();
        }
        return redirect('/');
    }

    public function getRegister()
    {
        return view('register');
    }

    public function postRegister(Request $request){

        User::where('username', '=', $request->input('username'))->first();

        if(true) {
            $user = new User();
            $user->username = $request->input('username');
            $user->password = $request->input('password');
            $user->role_roleId = 3;

            $user->save();

            $this->postLogin($request);
        }
        else{
            return Redirect::back();
        }
        return ;
//        return Redirect::to('/', $username);
    }

}
