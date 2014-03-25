<?php
/**
 * Description of UserController
 *
 * @author Hichem MHAMED
 */

use ArabiaIOClone\Repositories\UserRepositoryInterface;
use ArabiaIOClone\Repositories\PostRepositoryInterface ;
use ArabiaIOClone\Repositories\CommentRepositoryInterface ;

class UserController extends BaseController 
{
    /**
     *
     * @var users repository
     */
    
    
    public function __construct( UserRepositoryInterface $users,
                                 PostRepositoryInterface $posts,
                                 CommentRepositoryInterface $comments
            )
    {
        //parent::__construct();

        $this->user = Auth::user();
        
        $this->users = $users;
        $this->posts = $posts;
        $this->comments = $comments;
    }
    
    public function  getComments($username)
    {
        $user = $this->users->findByUsername($username);
        if($user)
        {
            $isSelf = false;
            if(Auth::check())
            {
                $isSelf = $this->user->id == $user->id;
            }
            $comments = $this->comments->findByUserWithEagerLoading($user);
            return View::make('user.index')
                    ->with('lists',View::make('partials.user.comments')->with(compact('comments')))
                    ->with(compact('user'))
                    ->with('isSelf',$isSelf);
        } 
        return App::abort(404);
    }
    
    public function getPosts($username)
    {
        $user = $this->users->findByUsername($username);
        if($user)
        {
            $isSelf = false;
            if(Auth::check())
            {
                $isSelf = $this->user->id == $user->id;
            }
            
            $posts = $this->posts->findByUser($user);
            
            return View::make('user.index')
                    ->with('lists',View::make('partials.user.posts')->with(compact('posts')))
                    ->with(compact('user'))
                    
                    ->with('isSelf',$isSelf);
        } 
        return App::abort(404);
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
