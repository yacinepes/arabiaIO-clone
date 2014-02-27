<?php

/**
 * Description of PostSubmitForm
 *
 * @author Hichem MHAMED
 */
namespace ArabiaIOClone\Services\Forms;

class PostSubmitForm extends AbstractForm
{
    protected $rules = array(
        'title'=>'required|min:5',
        'link'=>'required_without:content|url',
        'content'=>'required_without:link|min:5',
        'community_id'=>'required',
        'confirm'=>'required'
            
        
        );
    
    public function __construct() {
        parent::__construct();
    }
}

?>
