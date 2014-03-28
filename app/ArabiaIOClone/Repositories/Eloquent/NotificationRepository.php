<?php

/**
 * Description of NotificationRepository
 *
 * @author mhamed
 */
namespace ArabiaIOClone\Repositories\Eloquent;

use ArabiaIOClone\Repositories\Eloquent\AbstractRepository;
use ArabiaIOClone\Repositories\NotificationRepositoryInterface;
use Notification;


class NotificationRepository extends AbstractRepository implements NotificationRepositoryInterface
{
    public function __construct(Notification $notification)
    {
        parent::__construct($notification);
        $this->model = $notification;
    }
    
    public function createCommentOnPostNotification(Comment $comment)
    {
        $data = ['user_id'=>$comment->post()->user()->id,
                'event_type' => 'CommentOnPost',
                'properties' => Response::json([
                    'username'=> $comment->username,
                    'post_id' => $comment->post_id,
                    'post_slug' => $comment->post()->slug
                        
                ])
            ];
        $this->notifications->create($data);
    }
    
    public function createCommentOnCommentNotification(Comment $comment)
    {
        $data = ['user_id'=>$comment->parent()->get()->post()->user()->id,
                'event_type' => 'CommentOnComment',
                'properties' => Response::json([
                    'username'=> $comment->username,
                    'comment_id' => $comment->parent()->get()->id
                ])
            ];
        $this->notifications->create($data);
    }
    
    public function create(array $data) 
    {
        
    }
}
