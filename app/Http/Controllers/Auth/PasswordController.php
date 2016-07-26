<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Controllers\RegistrationController;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Cartalyst\Sentry\Users\UserNotFoundException;
use Illuminate\Http\Request;
use Sentry;
//use Illuminate\Mail\Message;
//use Illuminate\Support\Facades\Password;

class PasswordController extends Controller {
    /*
      |--------------------------------------------------------------------------
      | Password Reset Controller
      |--------------------------------------------------------------------------
      |
      | This controller is responsible for handling password reset requests
      | and uses a simple trait to include this behavior. You're free to
      | explore this trait and override any methods you wish to tweak.
      |
     */

use ResetsPasswords;

    protected $redirectPath = "login";
    protected $subject = "Link para restablecer su contraseña en www.kentron.com.ve";

    /**
     * Create a new password controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('guest');
    }

    /**
     * Display the form to request a password reset link.
     *
     * @return \Illuminate\Http\Response
     */
    public function getEmail() {
        list($data['active_email']) = ['active'];
        return view('password.email', $data);
    }

    /**
     * Send a reset link to the given user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postEmail(Request $request) {
        $this->validate($request, ['email' => 'required|email']);
        try {
            if (($user_sentry = Sentry::findUserByLogin($request->email)) != null) {
                RegistrationController::enviarActivationReminderCode($user_sentry, 'reminder');
                list($type, $msg) = ['mensaje', 'passwords.sent'];
            } else {
                list($type, $msg) = ['error', 'passwords.user'];
            }
        } catch (UserNotFoundException $e) {
            list($type, $msg) = ['error', 'passwords.user'];
        }

        return redirect()->back()->with([$type => trans($msg)]);

//        $response = Password::sendResetLink($request->only('email'), function (Message $message) {
//                    $message->subject($this->getEmailSubject());
//                });
//
//        switch ($response) {
//            case Password::RESET_LINK_SENT:
//                list($type, $msg) = ['mensaje', 'passwords.sent'];
//
//            case Password::INVALID_USER:
//                list($type, $msg) = ['error', 'passwords.user'];
//        }
    }

    protected function getEmailSubject() {
        return isset($this->subject) ? $this->subject : 'Your Password Reset Link';
    }

    /**
     * Display the password reset view for the given token.
     *
     * @param  string  $token
     * @param  string  $id
     * @return \Illuminate\Http\Response
     */
    public function getReset($id = null, $token = null) {
        if (is_null($id)) {
            throw new NotFoundHttpException;
        } else if (is_null($token)) {
            throw new NotFoundHttpException;
        }
        list($active_reset) = ['active'];
        return view('password.index_reset')->with(['id' => $id, 'token' => $token, 'active_reset' => $active_reset]);
    }

    /**
     * Reset the given user's password.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postReset(Request $request) {
        $this->validate($request, [
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required_without:id|min:8|confirmed',
            'password_confirmation' => 'required_with:password|min:8',
        ]);
        try {
            $user = Sentry::findUserByLogin($request->email);
            if ($user->checkResetPasswordCode($request->token)) {
                $params = $this->resetearContraseña($user, $request);
                list($type, $msg, $redirect) = [$params['type'], $params['msg'], $params['redirect']];
            } else {
                list($type, $msg, $redirect) = ['error', 'auth.remindernotfound', 'back'];
            }
        } catch (UserNotFoundException $e) {
            list($type, $msg, $redirect) = ['error', 'auth.usernotfound', 'back'];
        }

        if ($redirect == 'login') {
            return redirect('login')->with($type, trans($msg));
        } else {
            return redirect()->back()->withInput($request->only('email'))->with([$type => trans($msg)]);
        }

//        $credentials = $request->only(
//                'email', 'password', 'password_confirmation', 'token', 'id'
//        );
//        $response = Password::reset($credentials, function ($user, $password) {
//                    $this->resetPassword($user, $password);
//                });
//
//        switch ($response) {
//            case Password::PASSWORD_RESET:
//                return redirect($this->redirectPath())
//                                ->withFlashMessage('Password Reset Successfully!');
//
//            default:
//                return redirect()->back()
//                                ->withInput($request->only('email'))
//                                ->withErrors(['email' => trans($response)]);
//        }
    }

    public function resetearContraseña($user, $request) {
        $params = [];
        if ($user->attemptResetPassword($request->token, $request->password)) {
            list($params['type'], $params['msg'], $params['redirect']) = ['mensaje', 'auth.reminder_success', 'login'];
        } else {
            list($params['type'], $params['msg'], $params['redirect']) = ['mensaje', 'auth.reminder_failed', 'back'];
        }
        return $params;
    }

    /**
     * Reset the given user's password.
     *
     * @param  \Illuminate\Contracts\Auth\CanResetPassword  $user
     * @param  string  $password
     * @return void
     */
    protected function resetPassword($user, $password) {
        $user->password = $password;

        $user->save();
    }

}
