<?php



/**
 *
 * @author Hichem MHAMED
 */

namespace ArabiaIOClone\Repositories;

interface UserRepositoryInterface 
{
    public function getLoginForm();
    
    public function updateReputation($user);
    
    public function findByUsername($username);
    
//    
//    public function findByEmail($email);
//    
//    public function create(array $data);
}

?>
