<?php

class LoginController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        // if user is logged in redirect to dashboard, if not show the login view
        if (LoginModel::isUserLoggedIn()) {
            Redirect::to('dashboard/index');
        } else {
            $data = array('redirect' => Request::get('redirect') ? Request::get('redirect') : null);
            $this->View->render('login/index', $data);
        }
    }

    public function login()
    {
        // check if csrf token is valid
        if (!Csrf::isTokenValid()) {
            LoginModel::logout();
            Redirect::home();
            exit();
        }

        // perform the login method, put result (true or false) into $login_successful
        $login_successful = LoginModel::login(
            Request::post('user_name'), 
            Request::post('user_password'),
            Request::post('set_remember_me_cookie')
        );

        // check login status: if true, then redirect user to dashboard, if false, then to login form again
        if ($login_successful) {
            Session::init();
            Session::set('user_logged_in', true);
            Session::set('user_id', LoginModel::getCurrentUserId());
            Session::set('user_account_type', LoginModel::getUserAccountType());
            
            header('Location: ' . Config::get('URL') . 'dashboard/index');
            exit();
        } else {
            Redirect::to('login/index');
            exit();
        }
    }

    public function logout()
    {
        LoginModel::logout();
        Redirect::home();
        exit();
    }

    public function loginWithCookie()
    {
        $login_successful = LoginModel::loginWithCookie(Request::cookie('remember_me'));

        if ($login_successful) {
            Redirect::to('dashboard/index');
        } else {
            LoginModel::deleteCookie();
            Redirect::to('login/index');
        }
    }

    public function requestPasswordReset()
    {
        $this->View->render('login/requestPasswordReset');
    }

    public function requestPasswordReset_action()
    {
        PasswordResetModel::requestPasswordReset(Request::post('user_name_or_email'), Request::post('captcha'));
        Redirect::to('login/index');
    }

    public function verifyPasswordReset($user_name, $verification_code)
    {
        if (PasswordResetModel::verifyPasswordReset($user_name, $verification_code)) {
            $this->View->render('login/resetPassword', array(
                'user_name' => $user_name,
                'user_password_reset_hash' => $verification_code
            ));
        } else {
            Redirect::to('login/index');
        }
    }

    public function setNewPassword()
    {
        PasswordResetModel::setNewPassword(
            Request::post('user_name'),
            Request::post('user_password_reset_hash'),
            Request::post('user_password_new'),
            Request::post('user_password_repeat')
        );
        Redirect::to('login/index');
    }
}