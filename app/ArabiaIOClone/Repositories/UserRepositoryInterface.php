<?php



/**
 *
 * @author Hichem MHAMED
 */

namespace ArabiaIOClone\Repositories;

interface UserRepositoryInterface 
{
    public function getLoginForm();
    public function getAccountCreateForm();
    
    public function updateReputation($user);
    
    public function findByUsername($username);
    
    public function findByActivationCode($code);
    
//    
//    public function findByEmail($email);
//    
    public function create(array $data);
    public function setActivated($user);
}

?>
