<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Notification
 *
 * @author mhamed
 */
class Notification extends Eloquent
{
    public $presenter = 'ArabiaIOClone\Presenters\Notifications\NotificationPresenterProxy';
    
    public $event_type = "CommentOnPost";
    
    public $label = "Hello";
}
