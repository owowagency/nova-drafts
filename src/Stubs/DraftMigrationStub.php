<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Migrations\Migration;

class :className extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $user_table = ':tableName';
        Schema::table($user_table, function ($table) use ($user_table) {
            $table->string('preview_token')->nullable();
            $table->boolean('published')->default(true);

            // It's recommended to replace your current unique constraint and add published field to it.

            // Example:  $table->dropUnique("your_unique_index_name");
            //           $table->unique(['your_unique_fields', 'published'], "example_unique_name_with_published_field_added");

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $user_table = ':tableName';
        Schema::table($user_table, function ($table) use ($user_table) {
            $table->dropColumn('published');
            $table->dropColumn('preview_token');

            // If you added a new unique constraint in up() function, drop it here.

            // Example:  $table->dropUnique("example_unique_name_with_published_field_added");
            //           $table->unique(['your_unique_fields'], "your_unique_index_name");
        });
    }
}
