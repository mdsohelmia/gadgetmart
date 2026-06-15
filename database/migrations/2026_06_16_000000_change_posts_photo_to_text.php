<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * posts.photo stores a JSON array of image filenames. VARCHAR(255) is too
     * small for several filenames and, with MySQL strict mode off, the JSON was
     * silently truncated into invalid JSON. TEXT removes that ceiling.
     */
    public function up(): void
    {
        DB::statement('ALTER TABLE `posts` MODIFY `photo` TEXT NULL');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement('ALTER TABLE `posts` MODIFY `photo` VARCHAR(255) NULL');
    }
};
