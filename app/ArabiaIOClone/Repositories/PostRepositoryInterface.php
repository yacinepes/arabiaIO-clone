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
    
    
    public function findById($postId);
}

?>
