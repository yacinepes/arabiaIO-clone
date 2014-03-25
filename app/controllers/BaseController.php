<?php

use ArabiaIOClone\Repositories\CommentRepositoryInterface;
use ArabiaIOClone\Repositories\CommunityRepositoryInterface;
use ArabiaIOClone\Repositories\PostRepositoryInterface;
use ArabiaIOClone\Repositories\UserRepositoryInterface;
use ArabiaIOClone\Repositories\VoteRepositoryInterface;

class BaseController extends Controller {

    protected $communities;
    protected $comments;
    protected $posts;
    protected $users;
    protected $votes;
    
    public function __construct(
            CommunityRepositoryInterface $communities,
            CommentRepositoryInterface $comments,
            PostRepositoryInterface $posts,
            UserRepositoryInterface $users,
            VoteRepositoryInterface $votes
                                ) 
    {
        $this->communities = $communities;
        $this->comments = $comments;
        $this->posts = $posts;
        $this->users = $users;
        $this->votes = $votes;
        
        $navLinks = $this->communities->findMostRecent();
        View::share(compact('navLinks'));
        
                
    }


    /**
     * Setup the layout used by the controller.
     *
     * @return void
     */
    protected function setupLayout()
    {
            if ( ! is_null($this->layout))
            {
                    $this->layout = View::make($this->layout);
            }
    }

}