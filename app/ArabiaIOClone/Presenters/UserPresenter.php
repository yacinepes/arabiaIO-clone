<?php

/**
 * Description of UserPresenter
 *
 * @author Hichem MHAMED
 */
namespace ArabiaIOClone\Presenters;

use McCool\LaravelAutoPresenter\BasePresenter;
use User;
use ArabiaIOClone\Helpers\ArabicDateDiffForHumans;

class UserPresenter extends BasePresenter 
{
    public function __construct(User $user)
    {
        $this->resource = $user;
    }
    
    public function getFullName()
    {
        if($this->resource->fullname)
        {
            return "(".$this->resource->fullname.')';
        }else
        {
            return '';
        }
    }
    
    public function getCreationDateDiffForHumans()
    {
        
        return ArabicDateDiffForHumans::translateFromEnglish($this->resource->created_at->diffForHumans());
    }
}

?>
