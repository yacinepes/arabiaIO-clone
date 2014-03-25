<?php

/**
 * Description of CommunitiesController
 *
 * @author Hichem MHAMED
 */
use ArabiaIOClone\Repositories\CommunityRepositoryInterface;


class CommunityController extends BaseController
{
    
    
   
    
    public function getBrowse()
    {
        $communitiesCollection = $this->communities->findAll();
        
        return var_dump($communitiesCollection);
    }
}

?>
