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
