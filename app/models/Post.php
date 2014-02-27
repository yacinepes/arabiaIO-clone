<?php

/**
 * Description of Post
 *
 * @author Hichem MHAMED
 */
class Post extends Eloquent
{
    protected $fillable = array('title', 'user_id','community_id', 'content', 'link','sumvotes');
}

?>
