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
        return $this->model->findOrFail($postId);
    }
    
    public function findByIdAndSlug($postId, $postSlug)
    {
        return $this->model->whereSlug($postSlug)
                ->whereId($postId)
                ->with('users')
                ->with('votes')
                ->with('comments')
                ->first();
    }
    
    public function findTopByCommunity($community, $perPage = 15)
    {
        return $this->model
                    ->where('community_id','=',$community->id)
                    ->orderBy('sumvotes','desc')
                    ->with('users')
                    ->with('comments')
                    ->with('communities')
                    ->paginate($perPage);
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
    
    public function findMostRecentByCommunity($community, $perPage = 15 )
    {
        return $this->model
                ->where('community_id','=',$community->id)
                ->orderBy('created_at','desc')
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
    
    public function findByUser($user,$perPage = 15)
    {
        return $this->model
                ->where('user_id','=',$user->id)
                ->orderBy('created_at','desc')
                ->with('users')
                ->with('comments')
                ->with('communities')
                ->paginate($perPage);
                
    }
    
    public function findMostPopularByCommunity($community, $perPage = 15)
    {
        return $this->model
                ->where('community_id','=',$community->id)
                ->orderByRaw('(sumvotes) / POW(((UNIX_TIMESTAMP(NOW()) - UNIX_TIMESTAMP(created_at))/3600)+2, 1.8) DESC')
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
    
    public function findTopByUserSubscriptions($user, $perPage = 15 )
    {
        return $this->model
                    ->whereHas('communities',function( $community) use ($user){
                        $community->whereHas('subscribers',function($subscriber) use($user){
                            $subscriber->where('id','=',$user->id);
                        });
                    })
                    ->orderBy('sumvotes','desc')
                    ->with('users')
                    ->with('comments')
                    ->with('communities')
                    ->paginate($perPage);
    }
    public function findMostRecentByUserSubscriptions($user, $perPage = 15 )
    {
        return $this->model
                    ->whereHas('communities',function( $community) use ($user){
                        $community->whereHas('subscribers',function($subscriber) use($user){
                            $subscriber->where('id','=',$user->id);
                        });
                    })
                    ->orderBy('created_at','desc')
                    ->with('users')
                    ->with('comments')
                    ->with('communities')
                    
                    ->paginate($perPage);
        
    }
    public function findMostPopularByUserSubscriptions($user,$perPage = 15)
    {
        return $this->model
                ->whereHas('communities',function( $community) use ($user){
                        $community->whereHas('subscribers',function($subscriber) use($user){
                            $subscriber->where('id','=',$user->id);
                        });
                    })
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
    
    public function updateVoteSum($post)
    {
        $post->sumvotes = $post->votes()->sum('vote');
        $post->save();
    }
}

?>
