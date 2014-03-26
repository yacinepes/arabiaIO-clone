<?php

/**
 * Description of NotificationPresenterFactory
 *
 * @author mhamed
 */

namespace ArabiaIOClone\Presenters\Notifications;

use McCool\LaravelAutoPresenter\BasePresenter;
use Notification;

class NotificationPresenterProxy extends BasePresenter
{
    public $presenter = null;
    
    public function __construct(Notification $resource)
    {
        //parent::__construct($resource);
        
        $this->resource =  App('ArabiaIOClone.Notification.'.$resource->event_type,$resource);
        
        
    }
}
