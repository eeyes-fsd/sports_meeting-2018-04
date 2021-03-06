<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use sxxuz\OAuth2\Client\Provider\EeyesProvider;

class SessionController extends Controller
{

    /**
     * SessionController constructor.
     */
    public function __construct()
    {
        $this->middleware('guest',[
            'only' => ['login'],
        ]);
    }

    /**
     * Try to get user from oauth
     * If the user does not exist in database
     * Then create one
     * Auth the user through Auth Facade
     */
    public function login()
    {
        $scope = [
            'info-username.read',
            'info-user_id.read',
            'info-name.read',
        ];

        $client = new EeyesProvider([
            'clientId'     => config('oauth.app_id'),
            'clientSecret' => config('oauth.app_secret'),
            'redirectUri'  => config('oauth.redirect_uri'),
            'scope'        => $scope,
        ]);

        $query_user = $client->getUser();

        $exist_user = User::where('username',$query_user->getUsername())->first();

        if (!$exist_user)
        {
            $user = User::create([
                'username' => $query_user->getUsername(),
                'user_id'  => $query_user->getID(),
                'name'     => $query_user->getName(),
            ]);
        } else {
            $user = $exist_user;
        }

        Auth::login($user);
        session()->flash('success','登陆成功');
        return redirect()->intended('/');
    }

    /**
     * Logout through Auth Facade
     * Redirect to CAS logout
     */
    public function logout()
    {
        Auth::logout();
        Session::flush();
        Session::save();
        return redirect('https://account.eeyes.net/logout?url='.urlencode(url('/')));
    }
}
