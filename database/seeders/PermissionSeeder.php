<?php

namespace Database\Seeders;

use App\Enums\RoleEnum;
use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Str;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach (RoleEnum::cases() as $roleEnum) {
            $role = Role::firstOrNew(['name' => $roleEnum->value]);
            
            if (!$role->exists) {
                $role->slug = Str::slug($roleEnum->value);
                $role->save();
            }

            foreach ($roleEnum->permissions() as $permissionEnum) {
                $permission = Permission::firstOrCreate(['name' => $permissionEnum->value]);
                $role->givePermissionTo($permission);
            }
        }

        $this->command->info('Roles and permissions seeded successfully.');
    }
}
