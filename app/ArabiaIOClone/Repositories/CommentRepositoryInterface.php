<?php

/**
 *
 * @author Hichem Mhamed
 */
namespace ArabiaIOClone\Repositories;

interface CommentRepositoryInterface 
{
    public function getPostSubmitForm();
    
    public function create($data,$parentId=null);
    
    public function getSortedByPost($post);
    
    public function updateVoteSum($comment);
}

?>
