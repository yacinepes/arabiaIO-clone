<?php

/**
 * Description of CommunityPresenter
 *
 * @author Hichem MHAMED
 */

namespace ArabiaIOClone\Presenters;

use McCool\LaravelAutoPresenter\BasePresenter;
use \Community;

class CommunityPresenter extends BasePresenter
{
    public function __construct(Community $community)
    {
        $this->resource = $community;
    }
    
    public function name()
    {
        return $this->resource->name;
    }
    
   
}

?>
