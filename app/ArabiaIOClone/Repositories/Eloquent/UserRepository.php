<?php

/*
 
 */

namespace ArabiaIOClone\Repositories\Eloquent;

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
    
    public function findByUsername($username)
    {
        return $this->model->whereUsername($username)->first();
    }
}

?>
