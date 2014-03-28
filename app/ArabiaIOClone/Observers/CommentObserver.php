<?php
/**
 * Description of CommentObserver
 *
 * @author mhamed
 */

namespace ArabiaIOClone\Observers;

use ArabiaIOClone\Repositories\CommentRepositoryInterface;
use ArabiaIOClone\Repositories\NotificationRepositoryInterface;
use ArabiaIOClone\Repositories\PostRepositoryInterface;
use ArabiaIOClone\Repositories\UserRepositoryInterface;


class CommentObserver extends AbstractObserver 
{
    
    protected $users;
    protected $posts;
    protected $comments;
    protected $notifications;
    
    public function __construct(
                                UserRepositoryInterface $users,
                                CommentRepositoryInterface $comments,    
                                PostRepositoryInterface $posts,
                                NotificationRepositoryInterface $notifications
                                ) 
    {
        $this->users = $users;
        $this->posts = $posts;
        $this->comments = $comments;
        $this->notifications = $notifications;
    }
    
    
    
    public function created($comment) 
    {
        parent::created($comment);
        
        if($comment->isRoot())
        {
            if ($comment->user_id != $comment->post()->user_id)
            {
                $this->notifications->createCommentOnPostNotification($comment);
            }
            
        }else if($comment->isChild())
        {
            if($comment->user_id != $comment->parent()->get()->user_id)
            {
                $this->notifications->createCommentOnCommentNotification($comment);
            }
            
        }
        

    }
            
            
          
}
