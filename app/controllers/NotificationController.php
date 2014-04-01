<?php

/**
 * Description of NotificationController
 *
 * @author mhamed
 */

class NotificationController extends BaseController
{
    public function getBrowse($perPage = 10)
    {
        $user = Auth::user();
        if($user)
        {
            $notifications = $this->notifications->findByUser($user, $perPage);
            
            $view =  View::make('notifications.browse')
                    ->with(compact('notifications'));
            $notifications->each(function($notification)
            {
                
                $this->notifications->updateRead($notification,1);
            });
            return $view;
        }else
        {
            return Response::route('default');
        }
        
        
        
        
    }
}
