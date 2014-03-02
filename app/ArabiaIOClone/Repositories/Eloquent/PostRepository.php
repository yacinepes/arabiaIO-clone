<?php


namespace ArabiaIOClone\Repositories\Eloquent;
use ArabiaIOClone\Repositories\Eloquent\AbstractRepository;
use ArabiaIOClone\Repositories\PostRepositoryInterface;
use Post;
use Slug\Slugifier;
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
        $this->model =$post;
    }
    
    public function findById($postId)
    {
        return $this->model->find($postId);
    }
    
    public function findTop($perPage = 15)
    {
        return $this->model
                    ->orderBy('sumvotes','desc')
                    ->with('users')
                    ->with('comments')
                    ->with('communities')
                    ->paginate($perPage);
    }
    
    public function findMostRecent($perPage = 15 )
    {
        return $this->model
                    ->orderBy('created_at','desc')
                    ->with('users')
                    ->with('comments')
                    ->with('communities')
                    ->paginate($perPage);
    }
    
    public function findMostPopular($perPage = 15)
    {
        return $this->model
                    ->orderByRaw('(sumvotes) / POW(((UNIX_TIMESTAMP(NOW()) - UNIX_TIMESTAMP(created_at))/3600)+2, 1.8) DESC')
                    ->with('users')
                    ->with('comments')
                    ->with('communities')
                    ->paginate($perPage);
    }
    
    public function getPostSubmitForm() 
    {
        return  app('ArabiaIOClone\Services\Forms\PostSubmitForm');
    }
    
    public function create($data)
    {
        $slugifier = new Slugifier;
        $slug = $slugifier->slugify($data['title']);
        $post =  Post::create(array(
                'title' => $data['title'],
                'slug' => $slug,
                'link' => $data['link'],
                'content'=>$data['content'],
                'user_id' => $data['user_id'],
                'community_id' => $data['community_id']
                
            ));
        return $post;
    }
}

?>
