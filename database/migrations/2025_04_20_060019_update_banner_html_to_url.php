<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
	/**
	 * Run the migrations.
	 */
	public function up(): void
	{
		Schema::table('banners', function (Blueprint $table) {
			$table->dropColumn('html_file');
			$table->string('url')->nullable()->after('subcategory_id');
		});
	}

	/**
	 * Reverse the migrations.
	 */
	public function down(): void
	{
		Schema::table('banners', function (Blueprint $table) {
			//$table->dropColumn('url');
			$table->text('html_file')->nullable(); // si decides volver atrás
		});
	}
};
