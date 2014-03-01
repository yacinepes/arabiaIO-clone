<?php

/**
 * Description of Post
 *
 * @author Hichem MHAMED
 */
class Post extends Eloquent
{
    protected $table = 'posts';
    
    protected $fillable = array('title', 'user_id','community_id', 'content', 'link','sumvotes');
    
    protected function users() 
    {
        return $this->belongsTo('User','user_id');
    }
    
    public function user()
    {
        return $this->users()->get()->first();
    }
    
    protected function communities() 
    {
        return $this->belongsTo('Community','community_id');
    }
    
    public function community()
    {
        return $this->users()->get()->first();
    }
    
    
    
    public function votes()
    {
       return $this->morphMany('Vote', 'target');
    }
    
    public function comments()
    {
       return $this->hasMany('Comment','post_id');
    }
}

?>
