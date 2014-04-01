<?php

/**
 * Description of CommunitiesController
 *
 * @author Hichem MHAMED
 */
use ArabiaIOClone\Repositories\CommunityRepositoryInterface;


class CommunityController extends BaseController
{
    
    
   public function getViewCommunity($communitySlug)
   {
       $community = $this->communities->findBySlug($communitySlug);
       
       if($community)
       {
           $posts = $this->posts->findMostPopularByCommunity($community);
           return View::make('communities.view')
                   ->with(compact('community','posts'));
       }
   }
   
   public function getViewCommunityRecent($communitySlug)
   {
       $community = $this->communities->findBySlug($communitySlug);
       
       if($community)
       {
           $posts = $this->posts->findMostRecentByCommunity($community);
           return View::make('communities.view')
                   ->with(compact('community','posts'));
       }
   }
   
   public function getViewCommunityTop($communitySlug)
   {
       $community = $this->communities->findBySlug($communitySlug);
       
       if($community)
       {
           $posts = $this->posts->findTopByCommunity($community);
           return View::make('communities.view')
                   ->with(compact('community','posts'));
       }
   }
    
    public function getBrowse()
    {
        if(Auth::check())
        {
            $communities = $this->communities->findByUserPaginated(Auth::user(),$perPage = 10);
        }else
        {
            $communities = $this->communities->findMostActivePaginated($perPage = 10);
        }
        return View::make('communities.index')
                ->with(compact('communities'));
    }
    
    public function getMostActive()
    {
        $communities = $this->communities->findMostActivePaginated($perPage = 10);
        return View::make('communities.index')
                ->with(compact('communities'));
    }
    
    public function getMostRecent()
    {
        $communities = $this->communities->findMostRecentPaginated($perPage = 10);
        return View::make('communities.index')
                ->with(compact('communities'));
    }
}

?>
