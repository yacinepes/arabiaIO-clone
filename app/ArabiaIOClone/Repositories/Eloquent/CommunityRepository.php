<?php

/**
 * Description of CommunityRepository
 *
 * @author Hichem MHAMED
 */
namespace ArabiaIOClone\Repositories\Eloquent;

use ArabiaIOClone\Repositories\CommunityRepositoryInterface;
use \Community;

class CommunityRepository extends AbstractRepository implements CommunityRepositoryInterface
{
    public function __construct(Community $community)
    {
        parent::__construct($community);
        
        $this->model = $community;
        
    }
    
    public function findAll($orderColumn = 'created_at', $orderDir='desc')
    {
        $communities = $this->model
                           ->orderBy($orderColumn, $orderDir)
                           ->get();

        return $communities;
    }
    
    public function findMostRecent($take = 8)
    {
        $communities = $this->model
                           ->orderBy('created_at', 'desc')
                           ->take($take)
                           ->get();
    }
}

?>
