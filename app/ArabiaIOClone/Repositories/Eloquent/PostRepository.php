<?php


namespace ArabiaIOClone\Repositories\Eloquent;
use ArabiaIOClone\Repositories\Eloquent\AbstractRepository;
use ArabiaIOClone\Repositories\PostRepositoryInterface;
use Post;
/**
 * Description of PostRepository
 *
 * @author Hichem MHAMED
 */
class PostRepository extends AbstractRepository implements PostRepositoryInterface 
{
    public function __construct(Post $post) 
    {
        parent::__construct($post);
    }
    
    public function getPostSubmitForm() 
    {
        return  app('ArabiaIOClone\Services\Forms\PostSubmitForm');
    }
    
    public function create($data)
    {
        $post =  Post::create(array(
                'title' => $data['title'],
                'link' => $data['link'],
                'content'=>$data['content'],
                'user_id' => $data['user_id'],
                'community_id' => $data['community_id']
                
            ));
        return $post;
    }
}

?>
