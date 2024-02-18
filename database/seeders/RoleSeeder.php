<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Src\General\Role\Infrastructure\EloquentModels\RoleEloquentModel;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        RoleEloquentModel::factory()->create([
            'name' => 'Campo'
        ]);

        RoleEloquentModel::factory()->create([
            'name' => 'Superior'
        ]);

        RoleEloquentModel::factory()->create([
            'name' => 'Amateur'
        ]);

        RoleEloquentModel::factory()->create([
            'name' => 'Profesional'
        ]);

        RoleEloquentModel::factory()->create([
            'name' => 'Sub-Prime'
        ]);

        RoleEloquentModel::factory()->create([
            'name' => 'Prime'
        ]);

    }
}
