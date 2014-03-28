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
    protected $properties ;
    
    public function __construct(Notification $resource)
    {
        parent::__construct($resource);
        $this->properties = json_decode($resource->properties);
    }
    
    public function getHTML()
    {
        
       
        //return '<a href="'.route('user-index',['username'=> $this->properties->username]).'">يوسف محمود</a> علّق على موضوعك: <a href="/webdev/5609-%D9%85%D8%B4%D8%B1%D9%88%D8%B9-%D9%86%D8%B3%D8%AE%D8%A9-%D9%85%D9%81%D8%AA%D9%88%D8%AD%D8%A9-%D8%A7%D9%84%D9%85%D8%B5%D8%AF%D8%B1-%D9%85%D9%86-arabia-io">مشروع نسخة مفتوحة المصدر من arabia.io</a>'
    }
}
