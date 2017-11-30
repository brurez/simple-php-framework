<?php
/**
 * Created by PhpStorm.
 * User: Bruno
 * Date: 17/11/2017
 * Time: 15:41
 */

namespace App\Controllers;

use App\Flash;
use \Core\View;
use \App\Models\User;
use \App\Auth;

class Login extends \Core\Controller
{
    /**
     * Show the login page
     *
     * @return void
     */
    public function newAction()
    {
        View::renderTemplate('Login/new.twig');
    }

    /**
     * Log in a user
     *
     * @return void
     */
    public function createAction()
    {
        $user = User::authenticate($_POST['email'], $_POST['password']);

        if ($user) {

            Auth::login($user);

            Flash::addMessage('Login successful');

            static::redirect(Auth::getReturnToPage());
        } else {

            Flash::addMessage('Login unsuccessful, please try again', Flash::WARNING);

            View::renderTemplate('Login/new.twig', ['email' => $_POST['email']]);
        }
    }

    public function destroyAction()
    {
        Auth::logout();

        $this->redirect('/login/show-logout-message');

    }

    /**
     * Show a logout message. It's necessary because after logout session is destroyed
     * @return void
     */
    public function showLogoutMessageAction(): void
    {
        Flash::addMessage('Logout successful');

        $this->redirect('/');

    }
}