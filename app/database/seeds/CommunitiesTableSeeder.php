<?php

/*

 */

/**
 * Description of CommunitiesTableSeeder
 *
 * @author Hichem MHAMED
 */
class CommunitiesTableSeeder extends Seeder
{
    public function run()
    {
        $communitiesArray = array(
            array(
                'name' => 'تطوير الويب',
                'slug'=> "webdev",
                'description' => 'webdev desc'
            ),
            array(
                'name' => 'برمجة عامة',
                'slug'=> "programming",
                'description' => 'programming desc'
            )
            
                    );
        foreach($communitiesArray as $entry)
        {
            Community::create($entry);
        }
        
    }
}

?>
