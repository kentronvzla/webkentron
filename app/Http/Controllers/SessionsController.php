<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginFormRequest;
use Sentry;

class SessionsController extends Controller {

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('sentry.auth', ['only' => 'getLogout']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function getIndex() {
        list($data['active_login']) = ['active'];
        return view('login.index_login', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function postIndex(LoginFormRequest $request) {
        $input = $request->only('email', 'password');
        try {
            Sentry::authenticate($input, \Input::has('remember'));
        } catch (\Cartalyst\Sentry\Users\UserNotFoundException $e) {
            return redirect()->back()->withInput()->with('error', 'Credenciales Invalidas.');
        } catch (\Cartalyst\Sentry\Users\UserNotActivatedException $e) {
            return redirect()->back()->withInput()->with('error', 'Disculpe su usuario no se encuentra activo, por favor comuniquese con nosotros.');
        }
        return redirect()->intended('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function getLogout($id = null) {
        Sentry::logout();
        return redirect()->route('home');
    }

}
