<?php


/**
 * Description of NotificationRepositoryInterface
 *
 * @author mhamed
 */
namespace ArabiaIOClone\Repositories;



interface NotificationRepositoryInterface 
{
    public function create(array $data);
    public function createCommentOnCommentNotification(Comment $comment);
    public function createCommentOnPostNotification(Comment $comment);
    
}
