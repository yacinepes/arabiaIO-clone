<?php



/**
 *
 * @author Hichem MHAMED
 */

namespace ArabiaIOClone\Repositories;

interface UserRepositoryInterface 
{
    
    public function findByUsername($username);
    
    public function findByEmail($email);
    
    public function create(array $data);
}

?>
