<?php

/**
 * Description of CommunityRepositoryInterface
 *
 * @author Hichem MHAMED
 */
namespace ArabiaIOClone\Repositories;



interface CommunityRepositoryInterface  
{
    public function findAll($orderColumn = 'created_at', $orderDir='desc');
    
    public function findMostRecent($take=8);
    
    public function findBySlug($slug);
}

?>
