<?php

namespace Database\Seeders;

use App\Enums\Permissions;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach (Permissions::all() as $permission)
        {
            Permission::create(['name' => $permission->value]);
        }
    }
}
