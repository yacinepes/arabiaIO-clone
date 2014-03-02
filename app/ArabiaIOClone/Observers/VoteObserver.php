<?php

/**
 * Description of VoteObserver
 *
 * @author Hichem MHAMED
 */
namespace ArabiaIOClone\Observers;
use \Vote;
use \ArabiaIOClone\Repositories\UserRepositoryInterface;

class VoteObserver extends AbstractObserver
{
    protected $users;
    
    public function __construct(UserRepositoryInterface $users) 
    {
        $this->users = $users;
    }
    
    protected function updateUserReputation($model)
    {
        $user = $model->target()->first()->user();
        $this->users->updateReputation($user);
    }
    
    public function updated( $model) {
        parent::updated($model);
        
        $this->updateUserReputation($model);

    }
    
    public function saved( $model) {
        parent::saved($model);
        
        $this->updateUserReputation($model);

    }
    
    public function created( $model) {
        parent::created($model);

        $this->updateUserReputation($model);

    }
}

?>
