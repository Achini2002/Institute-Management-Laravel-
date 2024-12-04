
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('results', function (Blueprint $table) {
            $table->unsignedBigInteger('stu_id')->after('exam_exam_id');
            $table->unsignedBigInteger('sub_id')->after('stu_id');

            // Add foreign keys if necessary
            $table->foreign('stu_id')->references('stu_id')->on('students')->onDelete('cascade');
            $table->foreign('sub_id')->references('sub_id')->on('subjects')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('results', function (Blueprint $table) {
            $table->dropForeign(['stu_id']);
            $table->dropForeign(['sub_id']);
            $table->dropColumn(['stu_id', 'sub_id']);
        });
    }
};
