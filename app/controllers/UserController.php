<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of UserController
 *
 * @author Hichem MHAMED
 */
class UserController extends BaseController 
{
    /**
     *
     * @var users repository
     */
    protected $users;
    
    public function __construct( UserRepositoryInterface $users)
    {
        parent::__construct();

        $this->user = Auth::user();
        
        $this->users = $users;
    }
}

?>
