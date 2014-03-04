<?php

namespace ArabiaIOClone\Repositories\Eloquent;

use ArabiaIOClone\Repositories\CommentRepositoryInterface;
use ArabiaIOClone\Repositories\Eloquent\AbstractRepository;
use \Comment;
/**
 * Description of CommentRepository
 *
 * @author Hichem MHAMED
 */
class CommentRepository extends AbstractRepository implements CommentRepositoryInterface 
{
    public function __construct(Comment $comment) 
    {
        parent::__construct($comment);
        $this->model =$comment;
    }
    
    public function getPostSubmitForm() 
    {
        return  app('ArabiaIOClone\Services\Forms\CommentSubmitForm');
    }
    
    public function create($data,$parentId=null)
    {
        
        $comment =  Comment::create(array(
                'content' => $data['comment_content'],
                'user_id' => $data['user_id'],
                'post_id' => $data['post_id']
                
            ));
        if ($parentId)
        {
            $parentComment = Comment::find($parentId);
            $comment->makeChildOf($parentComment);
        }
        
        return $comment;
    }
}

?>
