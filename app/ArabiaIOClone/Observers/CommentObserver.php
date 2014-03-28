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
use Comment;


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
    
    public function createCommentOnPostNotification(Comment $comment)
    {
        $data = ['user_id'=>$comment->post()->user()->id,
                'event_type' => 'CommentOnPost',
                'properties' => Response::json([
                    'user_id'=> $comment->user_id,
                    'post_id' => $comment->post_id
                ])
            ];
        $this->notifications->create($data);
    }
    
    public function createCommentOnCommentNotification(Comment $comment)
    {
        $data = ['user_id'=>$comment->parent()->get()->post()->user()->id,
                'event_type' => 'CommentOnComment',
                'properties' => Response::json([
                    'user_id'=> $comment->user_id,
                    'comment_id' => $comment->parent()->get()->id
                ])
            ];
        $this->notifications->create($data);
    }
    
    public function created($comment) 
    {
        parent::created($comment);
        
        if($comment->isRoot())
        {
            $this->createCommentOnPostNotification($comment);
        }else if($comment->isChild())
        {
            $this->createCommentOnCommentNotification($comment);
        }
        

    }
            
            
          
}
