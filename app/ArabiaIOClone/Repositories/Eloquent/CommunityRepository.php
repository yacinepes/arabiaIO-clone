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
}

?>
