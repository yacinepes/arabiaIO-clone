<?php

/**
 * Description of NotificationRepository
 *
 * @author mhamed
 */
namespace ArabiaIOClone\Repositories\Eloquent;

use ArabiaIOClone\Repositories\Eloquent\AbstractRepository;
use ArabiaIOClone\Repositories\NotificationRepositoryInterface;
use Notification;


class NotificationRepository extends AbstractRepository implements NotificationRepositoryInterface
{
    public function __construct(Notification $notification)
    {
        parent::__construct($notification);
        $this->model = $notification;
    }
    
    public function create(array $data) 
    {
        
    }
}
