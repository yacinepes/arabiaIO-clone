<?php

/**
 * Description of PostRepositoryInterface
 *
 * @author Hichem MHAMED
 */

namespace ArabiaIOClone\Repositories;


interface  PostRepositoryInterface 
{
    public function getPostSubmitForm();
    
    public function create($data);
    
    public function findMostPopular($perPage);
    
    public function findMostRecent($perPage);
    
    public function findTop($perPage);
    
    public function findByUser($user,$perPage);
    
    public function findById($postId);
    
    public function findByIdAndSlug($postId, $postSlug);
    
    public function updateVoteSum($post);
    
    //by community
    public function findTopByCommunity($community, $perPage );
    public function findMostRecentByCommunity($community, $perPage );
    public function findMostPopularByCommunity($perPage);
    
    //by subscriptions
    public function findTopByUserSubscriptions($user, $perPage );
    public function findMostRecentByUserSubscriptions($user, $perPage );
    public function findMostPopularByUserSubscriptions($usern,$perPage); 
}

?>
