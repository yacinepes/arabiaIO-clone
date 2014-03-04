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
    
    public function getSortedByPost($post)
    {
        $result = \Baum\Extensions\Eloquent\Collection::make(array());
            
        // we use post to make use of eager loading done while retrieving the $post record
        $comments = $post->comments()
                ->where('depth', '=', 0)
                ->get();

        $comments = $this->sortNodes($comments);
        foreach($comments as $node)
        {

            $tree = $this->getHierarchy($node);

            $result = $result->merge($tree);
        }
        return $result;
    }
    
    protected function sortNodes($nodesCollection)
    {
         return $nodesCollection->sortBy(function($comment)
        {
          return -$comment->sumvotes.$comment->created_at;
        });
    }
    
    protected function getHierarchy($node)
    {
        $result = \Baum\Extensions\Eloquent\Collection::make(array());
        $result->push($node);
        $children = $node->children()->get();
        $this->sortNodes($children);
        if($children->count())
        {
            foreach($children as $child)
            {
                $result = $result->merge($this->getHierarchy($child));
            }   
        }
        return $result;
    }
}

?>
