<?php

namespace Database\Seeders;

use App\Enum\CommonEnum;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleAndPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        $this->createRoles();

        // create permissions
        $permissions = [
            Permission::create(['name' => 'create']),
            Permission::create(['name' => 'edit']),
            Permission::create(['name' => 'view']),
            Permission::create(['name' => 'show-toggle']),
        ];

        foreach ($this->createRoles() as $role) {
            $role->syncPermissions($permissions);
        }
    }

    public function createRoles()
    {
        $arrayRoles = [];
        Role::create(['name' => CommonEnum::PARTNER_LEVEL_ONE]);
        Role::create(['name' => CommonEnum::PARTNER_LEVEL_TWO]);
        Role::create(['name' => CommonEnum::PARTNER_LEVEL_THREE]);
        foreach ($this->roleList() as $role) {
            $role = Role::create(['name' => $role]);
            array_push($arrayRoles, $role);
        }

        return $arrayRoles;
    }

    public function roleList()
    {
        return [
            CommonEnum::PARTNER_LEVEL_ONE,
            CommonEnum::PARTNER_LEVEL_TWO,
            CommonEnum::PARTNER_LEVEL_THREE,
            CommonEnum::ADMIN,
            CommonEnum::SUPER_ADMIN
        ];
    }
}
