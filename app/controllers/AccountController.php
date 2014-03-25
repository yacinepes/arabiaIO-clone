<?php

use ArabiaIOClone\Repositories\UserRepositoryInterface;


/**
 * Description of AccountController
 *
 * @author Hichem MHAMED
 */
class AccountController extends BaseController
{
    protected $users;
    
    public function __construct(UserRepositoryInterface $users)
    {
        
        
        $this->users = $users;
    }
    
    public function getLogout()
    {
        Auth::logout();
        return Redirect::route('default');
    }
    
    public function getIndex()
    {
        return View::make('account.index');
    }
    
    public function postLogin()
    {
        $loginForm = $this->users->getLoginForm();
        
        // 1. validator fails
        if (!$loginForm->isValid())
        {
            return  Redirect::route('account-login')
                ->withErrors($loginForm->getErrors());
        }
        
        
        $credentials = Input::only([ 'username', 'password' ]);
        //$remember = Input::get('remember', false);
        $remember = true;

        if (str_contains($credentials['username'], '@')) 
        {
            $credentials['email'] = $credentials['username'];
            unset($credentials['username']);
        }else
        {
            $userByUsername = $this->users->findByUsername($credentials['username']);
            if($userByUsername)
            {
                $credentials['email'] = $userByUsername->email;
            }else
            {
                return Redirect::route('account-login')
                        ->withInput()
                        ->withErrors(Lang::get('errors.login_wrong_credentials'));
            }
        }
        
        $attempt = Auth::attempt(array(
            'email' => $credentials['email'],
            'password' => $credentials['password'],
            'active' => 1));
        
        if ($attempt) 
        {
            return Redirect::intended(route('default'));
        }
        
        return Redirect::route('account-login')
                    ->withInput()
                    ->withErrors(Lang::get('errors.login_wrong_credentials'));
    }
    
    public function getActivate($code)
    {
        $user = $this->users->findByActivationCode($code);
        if($user)
        {
            if($this->users->setActivated($user))
            {
                Auth::login($user);
                return Redirect::route('user-index',$user->username)
                        ->with('success',[Lang::get('success.account_activated')]);
            }
        }
        
        return Redirect::route('default')
                        ->withErrors(Lang::get('errors.account_activated'));
        
        
    }
    
    public function getRecoverPassword($code)
    {
        $user = $this->users->findByActivationCodeAndTempPassword($code);
        if ($user)
        {
            if($this->users->setRecoverPasswordCompleteState($user))
            {
                return Redirect::route('default')
                        ->with('success',[Lang::get('success.account_recover_password')]);
            }
        }
        return Redirect::route('account-login')
                ->withErrors([Lang::get('errors.account_recover_password')]);
    }
    
    public function postRecoverPassword()
    {
        $recoverPasswordForm = $this->users->getRecoverPasswordForm();
        if(!$recoverPasswordForm->isValid())
        {
            return Redirect::route('account-login')
                ->withInput()
                ->withErrors($recoverPasswordForm->getErrors());
        }
        $data = $recoverPasswordForm->getInputData();
        $email = $data['email'];
        $user = $this->users->findByEmail($email);
        if($user)
        {
            if($this->users->setRecoverPasswordRequestState($user))
            {
                Mail::send('emails.auth.recoverPassword',[
                    'link'=> URL::route('account-recover-password',[$user->code]),
                    'username'=> $user->username,
                    'password'=> $user->password_temp],
                        function($message) use ($user){
                            $message->to($user->email,$user->username)
                                    ->subject(Lang::get('reminders.recoverPasswordEmailTitle'));
                    });
            }
        }else
        {
            return Redirect::route('account-login')
                        ->withErrors(Lang::get('errors.account_email_notfound'))
                        ->withInput();
        }
        
    }
    
    public function postCreate()
    {
        
                        
        $accountCreateForm = $this->users->getAccountCreateForm();
        if (!$accountCreateForm->isValid())
        {
            return Redirect::route('account-register')
                ->withInput()
                ->withErrors($accountCreateForm->getErrors());
        }else 
        {
            if($user = $this->users->create($accountCreateForm->getInputData()))
            {
                Mail::send('emails.auth.activateAccount',[ 'link' => URL::route('account-activate',$user->code),'username'=>$user->username ],
                                function($message) use($user){
                                    $message->to($user->email,$user->username)->subject(Lang::get('reminders.activationEmailTitle'));
                                }
                            );
                return Redirect::route('default')
                    ->with('success',[Lang::get('success.account_register_email_sent')]);
            }
        }
        
    }


}

?>
