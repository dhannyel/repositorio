<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Tool;

class ToolSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 */
	public function run(): void
	{
		Tool::firstOrCreate([
			'id' => 1,
		], [
			'title' => 'Título de la Aplicación',
			'email' => 'correo@example.com',
			'phone' => 123456789,
		]);
	}
}
