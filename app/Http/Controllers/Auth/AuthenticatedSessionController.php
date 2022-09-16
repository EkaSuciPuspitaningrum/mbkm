<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\Jurusan;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.login');
    }

    public function sso(){
        return view('auth.sso');
    }

    public function redirect_to_sso(){
        return Socialite::driver('pnj')->redirect();
    }

    public function sso_cb(){
        $pnj_user = Socialite::driver('pnj')->user();

        $user = User::where('ident', $pnj_user['ident'])->first();

        if($user){
            Auth::login($user);
            return redirect()->intended(RouteServiceProvider::HOME);
        }else{
            $new_user = new User();

            $new_user->name = $pnj_user['name'];
            $new_user->jurusan_id = self::return_jurusan_id($pnj_user['department_and_level'][0]['department']);
            $new_user->email = $pnj_user['email'];
            $new_user->ident = $pnj_user['ident'];

            switch ($pnj_user['department_and_level'][0]['access_level_name']){
                case 'Admin':
                    $new_user->assignRole('Super Admin');
                    break;
                case 'Dosen' :
                    $new_user->assignRole('dosen');
                    break;
                default :
                    $new_user->assignRole('mhsw');
            }

            $new_user->save();

            Auth::login($new_user);
            return redirect()->intended(RouteServiceProvider::HOME);
        }
    }

    /**
     * Handle an incoming authentication request.
     *
     * @param  \App\Http\Requests\Auth\LoginRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(LoginRequest $request)
    {
        $request->authenticate();

        $request->session()->regenerate();

        return redirect()->intended(RouteServiceProvider::HOME);
    }

    /**
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    public static function return_jurusan_id(string $jurusan_string){
        $jurusan_res = Jurusan::where('jurusan_name', $jurusan_string)->first();

        if($jurusan_res){
            return $jurusan_res->id;
        }else{
            return null;
        }
    }
}
