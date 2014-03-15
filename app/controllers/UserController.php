<?php
/**
 * Description of UserController
 *
 * @author Hichem MHAMED
 */

use ArabiaIOClone\Repositories\UserRepositoryInterface;

class UserController extends BaseController 
{
    /**
     *
     * @var users repository
     */
    protected $users;
    
    public function __construct( UserRepositoryInterface $users)
    {
        //parent::__construct();

        $this->user = Auth::user();
        
        $this->users = $users;
    }
    
    public function getIndex($username)
    {
        $user = $this->users->findByUsername($username);
        
        if($user)
        {
            $isSelf = false;
            if(Auth::check())
            {
                $isSelf = $this->user->id == $user->id;
            }
            
            return View::make('user.index')
                    ->nest('lists','partials.user.communities')
                    ->with(compact('user'))
                    ->with('isSelf',$isSelf);
                    
        }
        
        return App::abort(404);
        
    }
}

?>
