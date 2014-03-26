<?php
/**
 * Description of CommentOnPostNotificationPresenter
 *
 * @author mhamed
 */

namespace ArabiaIOClone\Presenters\Notifications;

use McCool\LaravelAutoPresenter\BasePresenter;
use Notification;


class CommentOnPostNotificationPresenter extends BasePresenter
{
    public function __construct(Notification $resource)
    {
        parent::__construct($resource);
    }
}
