<?php

namespace ArabiaIOClone\Providers;

use Illuminate\Support\ServiceProvider;
use \Vote;
use ArabiaIOClone\Observers\VoteObserver;

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
                app('ArabiaIOClone\Repositories\PostRepositoryInterface')
                ));
    }
    
    public function register()
    {
        
    }
}

?>
