<?php

/**
 * Description of NotificationPresenterFactory
 *
 * @author mhamed
 */

namespace ArabiaIOClone\Presenters\Notifications;

use McCool\LaravelAutoPresenter\BasePresenter;
use Notification;

class NotificationPresenterProxy extends BasePresenter implements NotificationPresenterInterface
{
    public $presenter = null;
    
    
    public function __construct(Notification $resource)
    {
        parent::__construct($resource);
        
        $this->presenter =  App('ArabiaIOClone.Notification.'.$resource->event_type);
        $this->presenter->resource = $this->resource;
        
    }
    
    public function getHTML()
    {
        return $this->presenter->getHTML();
    }
    
    
}
