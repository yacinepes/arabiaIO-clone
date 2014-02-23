<?php

/**
 * Description of CommunitiesController
 *
 * @author Hichem MHAMED
 */
use ArabiaIOClone\Repositories\CommunityRepositoryInterface;


class CommunityController extends BaseController
{
    protected $communities;
    
    public function __construct(
            CommunityRepositoryInterface $communities
            ) 
    {
        //parent::__construct();
        $this->communities = $communities;
        
    }
    
    public function getBrowseNewest()
    {
        $communitiesCollection = $this->communities->findAll();
        
        return var_dump($communitiesCollection);
    }
}

?>
