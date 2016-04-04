<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegistrationFormRequest;
use App\Repositories\UserRepositoryInterface;
use Illuminate\Http\Request;
use App\Usuario;
use Sentry;

class RegistrationController extends Controller {

    /**
     * @var $user
     */
    protected $user;

    public function __construct(UserRepositoryInterface $user) {
        $this->user = $user;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create() {
//        return view('registration.create');
        list($data['active_register']) = ['active'];
        return view('login.index_register', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request) {
        $usuario = new Usuario();
        $input = $request->all();
//        $input = array_add($input, 'activated', true);
        $usuario->fill($input);
        $validacion = $usuario->validate();
        if ($validacion) {
            if ($usuario->save()) {
                $usersGroup = Sentry::findGroupById(1);
                $user = Sentry::findUserById($usuario->id);
                $user->addGroup($usersGroup);
                return redirect('login')->with('mensaje', 'Se registró el usuario correctamente');
            } else {
                return back()->withInput()->withErrors($usuario->getErrors());
            }
        } else {
            return back()->withInput()->withErrors($usuario->getErrors());
        }
    }

//    public function store(RegistrationFormRequest $request) {
//        $input = $request->only('email', 'password', 'first_name', 'last_name');
//        $input = array_add($input, 'activated', true);
//
//        $user = $this->user->create($input);
//
//        // Find the group using the group name
//        $usersGroup = \Sentry::findGroupByName('Users');
//
//        // Assign the group to the user
//        $user->addGroup($usersGroup);
//        return redirect('login')->with('mensaje', 'Se registró el usuario correctamente');
//    }

}
