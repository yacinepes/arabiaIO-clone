<?php

/**
 * Description of Post
 *
 * @author Hichem MHAMED
 */
class Post extends Eloquent
{
    protected $table = 'posts';
    
    public $presenter = 'ArabiaIOClone\Presenters\PostPresenter';
    
    protected $fillable = array('title','slug', 'user_id','community_id', 'content', 'link','sumvotes');
    
    public function users() 
    {
        return $this->belongsTo('User','user_id');
    }
    
    public function user()
    {
        return $this->users()->get()->first();
    }
    
    public function communities() 
    {
        return $this->belongsTo('Community','community_id');
    }
    
    public function community()
    {
        return $this->communities()->get()->first();
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
