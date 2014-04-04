<?php

/**
 * Description of CommunityRepository
 *
 * @author Hichem MHAMED
 */
namespace ArabiaIOClone\Repositories\Eloquent;

use ArabiaIOClone\Repositories\CommunityRepositoryInterface;
use Community;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Paginator;

class CommunityRepository extends AbstractRepository implements CommunityRepositoryInterface
{
    public function __construct(Community $community)
    {
        parent::__construct($community);
        
        $this->model = $community;
        
    }
    
    public function subscribeToAllSuperCommunities($user)
    {
        $superCommunities = $this->model->where('createdbyuser','=',0)->get();
        foreach($superCommunities as $community)
        {
            if(!$community->subscribers->contains($user->id))
            {
                $community->subscribers()->attach($user->id);
            }
            
        }
                
    }
    public function unsubscribeFromAllSuperCommunities($user)
    {
        $superCommunities = $this->model->where('createdbyuser','=',0)->get();
        foreach($superCommunities as $community)
        {
            if($community->subscribers->contains($user->id))
            {
                $community->subscribers()->detach($user->id);
            }
            
        }
    }
    
    public function findBySlug($slug) 
    {
        return $this->model
                ->whereSlug($slug)
                ->first();
        
    }
    
    public function findById($id)
    {
        return $this->model->find($id);
    }
    
    public function findAll($orderColumn = 'created_at', $orderDir='desc')
    {
        return  $this->model
                           ->orderBy($orderColumn, $orderDir)
                           ->get();

        
    }
    
    public function findMostRecent($take = 8)
    {
        return $this->model->orderBy('created_at', 'desc')
                           ->take($take)
                           ->get();
    }
    
    public function findByUserPaginated($user, $perPage)
    {
        return $this->model->with('subscribers')
                ->with('posts')
                ->whereHas('subscribers',function  ($subscriber) use ($user){$subscriber->where('id','=',$user->id);})
                ->paginate($perPage);
    }
    
    public function findMostRecentPaginated($perPage)
    {
        return $this->model->with('subscribers')
                
                ->with('posts')
                ->orderBy('created_at', 'desc')
                ->paginate($perPage);
    }
    public function findMostActivePaginated($perPage)
    {
        $items= $this->model->leftJoin('posts', 'posts.community_id', '=', 'communities.id')
                           ->groupBy('communities.slug')
                           ->orderBy('post_count', 'desc')
                           ->get([
                               'communities.*',
                               DB::raw('COUNT(posts.id) as post_count')
                           ]);
        
        $paginator = Paginator::make($items->all(), count($items),$perPage);
        return $paginator;
    }
    
    public function create(array $data)
    {
        return Community::create([
            'name'=>$data['community_title'],
            'slug'=>$data['community_slug'],
            'description'=>$data['community_description'],
            'creator_id'=>$data['creator_id'],
            'createdbyuser'=>$data['createdbyuser']
        ]);
    }
    
    public function getCommunityCreateForm() 
    {
        return  app('ArabiaIOClone\Services\Forms\CommunityCreateForm');
    }
}

?>
