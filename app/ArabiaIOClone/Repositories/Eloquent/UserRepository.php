<?php

/*
 
 */

namespace ArabiaIOClone\Repositories\Eloquent;
use Illuminate\Support\Facades\Hash;

use ArabiaIOClone\Repositories\UserRepositoryInterface;
use User;

/**
 * Description of UserRepository
 *
 * @author Hichem MHAMED
 */
class UserRepository extends AbstractRepository implements UserRepositoryInterface 
{
    public function __construct(User $user)
    {
        parent::__construct($user);
        $this->model = $user;
    }
    
    public function updateReputation($user)
    {
        //$user = $this->model->find($userId);
        $postVotes = 0;
        foreach($user->posts()->get() as $post)
        {
            $postVotes +=  $post->sumvotes;
        }

        $commentVotes = 0;
        foreach($user->comments()->get() as $comment)
        {
            $commentVotes += $comment->sumvotes;
        }

        $reputation = $postVotes + $commentVotes; 

        $user->reputation = $reputation;
        //$user->reputation = 150;
        $user->save();
        
        
    }
    
    public function getLoginForm()
    {
        return app('ArabiaIOClone\Services\Forms\LoginForm');
    }
    
    public function getAccountCreateForm()
    {
        return app('ArabiaIOClone\Services\Forms\AccountCreateForm');
    }
    
    public function findByUsername($username)
    {
        return $this->model->whereUsername($username)->first();
    }
    
     public function findByActivationCode($code)
     {
         return $this->model
                 ->where('code','=',$code)
                 ->where('active','=',0)
                 ->first();
     }
     
    public function setActivated($user)
    {
        $user->active = 1;
        $user->code = '';
        return $user->save();
    }
    
    public function create(array $data)
    {
        $user = User::create(array(
            'email'=> e($data['email']),
            'username' => e($data['username']),
            'password' => Hash::make($data['password']),
            'code' => str_random(60),
            'active' => 0
        ));
        return $user;
    }
            
    
    
}

?>
