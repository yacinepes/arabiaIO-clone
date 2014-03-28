<?php

namespace ArabiaIOClone\Providers;

use ArabiaIOClone\Observers\CommentObserver;
use ArabiaIOClone\Observers\VoteObserver;
use Comment;
use Illuminate\Support\ServiceProvider;
use Vote;

/**
 * Description of ObserverServiceProvider
 *
 * @author Hichem MHAMED
 */
class ObserverServiceProvider  extends ServiceProvider
{
    
    public function boot()
    {
        Vote::observe(new VoteObserver(
                app('ArabiaIOClone\Repositories\UserRepositoryInterface'),
                app('ArabiaIOClone\Repositories\CommentRepositoryInterface'),
                app('ArabiaIOClone\Repositories\PostRepositoryInterface')
                ));
        
        Comment::observe(new CommentObserver(
                app('ArabiaIOClone\Repositories\UserRepositoryInterface'),
                app('ArabiaIOClone\Repositories\CommentRepositoryInterface'),
                app('ArabiaIOClone\Repositories\PostRepositoryInterface'),
                app('ArabiaIOClone\Repositories\NotificationRepositoryInterface')
                ));
    }
    
    public function register()
    {
        
    }
}

?>
