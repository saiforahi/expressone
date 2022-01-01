<?php

use App\CmsPage;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCmsPagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cms_pages', function (Blueprint $table) {
            $table->id();
			$table->string('title')->unique();
			$table->string('slug');
			$table->text('description');
			//$table->tinyInteger('status')->default(1)->comment('0 Inactive 1 Active');
			$table->timestamps();
        });
        CmsPage::create(['title' => 'Verify','slug'=> 'verify','description'=>'description']);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cms_pages');
    }
}
