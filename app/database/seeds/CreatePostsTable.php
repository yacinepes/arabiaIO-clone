<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('posts', function($table)
                {
                    //Question's ID
                    $table->increments('id');

                    //title of the post
                    $table->string('title')->default('');
                    //author's id
                    $table->integer('user_id')->unsigned()->default(0);
                    $table->integer('community_id')->unsigned()->default(0);
                    //post details
                    $table->mediumText('content')->default('');
                    
                    $table->string('link')->default('');


                    //Foreign key to match user_id  to users
                    $table->foreign('user_id')->references('id')->on('users');
                    $table->foreign('community_id')->references('id')->on('communities');
                    //we will get asking time from the created_at column
                    $table->timestamps();
                });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('posts');
	}
        
        

}
