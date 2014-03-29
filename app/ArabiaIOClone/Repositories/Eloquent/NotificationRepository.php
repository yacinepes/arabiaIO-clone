<?php

/**
 * Description of NotificationRepository
 *
 * @author mhamed
 */
namespace ArabiaIOClone\Repositories\Eloquent;

use ArabiaIOClone\Repositories\Eloquent\AbstractRepository;
use ArabiaIOClone\Repositories\NotificationRepositoryInterface;
use Illuminate\Support\Facades\Response;
use Notification;




class NotificationRepository extends AbstractRepository implements NotificationRepositoryInterface
{
    public function __construct(Notification $notification)
    {
        parent::__construct($notification);
        $this->model = $notification;
    }
    
    public function findByUser($user, $perPage)
    {
        return $this->model->where('user_id','=',$user->id)
                ->paginate($perPage);
                
    }
    
    public function createCommentOnPostNotification( $comment)
    {
        $data = ['user_id'=>$comment->post()->user()->id,
                'event_type' => 'CommentOnPost',
                'properties' => json_encode([
                    'username'=> $comment->user()->username,
                    'post_id' => $comment->post_id,
                    'post_slug' => $comment->post()->slug,
                    'post_title' => $comment->post()->title
                        
                ])
            ];
        $this->create($data);
    }
    
    public function createCommentOnCommentNotification( $comment)
    {
        $data = ['user_id'=>$comment->parent()->get()->post()->user()->id,
                'event_type' => 'CommentOnComment',
                'properties' => json_encode([
                    'username'=> $comment->user()->username,
                    'comment_id' => $comment->parent()->get()->id,
                    'post_id' => $comment->post_id,
                    'post_slug' => $comment->post()->slug,
                    'post_title' => $comment->post()->title
                ])
            ];
        $this->create($data);
    }
    
    public function create(array $data) 
    {
        Notification::create(['user_id'=>$data['user_id'],
                'event_type' => $data['event_type'] ,
                'properties' => $data['properties'] ]);
    }
}
