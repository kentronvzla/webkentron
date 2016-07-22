<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Repositories\UserRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Mail\Message;
use Illuminate\Support\Facades\Mail;
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
        list($data['active_register']) = ['active'];
        return view('registration.index_register', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request) {
        $usuario = new Usuario();
        $inputs = $request->all();
        $usuario->fill($inputs);
        if ($usuario->validate()) {
            $this->registrarPorSentry($request->only('email', 'password', 'first_name', 'last_name'));
        } else {
            return back()->withInput()->withErrors($usuario->getErrors());
        }
    }

    public function registrarPorSentry($inputs) {
        try {
            $user = Sentry::register($inputs);
            if (!empty($user)) {
                $usersGroup = Sentry::findGroupById(1);
                $user->addGroup($usersGroup);
                $this->enviarActivationReminderCode($user, 'activation');
                return redirect('login')->with('mensaje', 'Se registró el usuario correctamente');
            } else {
                return back()->withInput()->withErrors($user->getErrors());
            }
        } catch (Cartalyst\Sentry\Users\LoginRequiredException $e) {
            return back()->withInput()->withErrors($e->getErrors());
        } catch (Cartalyst\Sentry\Users\PasswordRequiredException $e) {
            return back()->withInput()->withErrors($e->getErrors());
        } catch (Cartalyst\Sentry\Users\UserExistsException $e) {
            return back()->withInput()->withErrors($e->getErrors());
        }
    }

    public static function enviarActivationReminderCode($user, $metodo) {
        list($object, $code, $view, $msg, $subject) = [null, null, null, null, null];
        if ($metodo == 'activation') {
            $object = $user;
            $code = $object->getActivationCode();
            $view = 'emails.activate';
            $msg = 'auth.notemailactivate';
            $subject = 'Link para validar su email en www.kentron.com.ve';
        } else {
            $object = $user;
            $code = $object->getResetPasswordCode();
            $view = 'emails.reminder';
            $msg = 'auth.notemailreminder';
            $subject = "Link para restablecer su contraseña en www.kentron.com.ve";
        }

        $sent = Mail::send($view, ['user' => $user, 'code' => $code], function(Message $message) use ($user, $subject) {
                    $message->to($user->email, $user->first_name . ' ' . $user->last_name)->subject($subject);
                });     
        $hubo_error = ($sent === 1) ? false : true;   
        return ($hubo_error === true) ?  back()->with('error', trans($msg)) :  false;        
    }

}
