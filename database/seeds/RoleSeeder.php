<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role1 = Role::create(['name' => 'Admin']);
        $role2 = Role::create(['name' => 'Client']);

        Permission::create(['name' => 'home'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'categories.index'])->assignRole($role1);
        Permission::create(['name' => 'categories.store'])->assignRole($role1);
        Permission::create(['name' => 'categories.show'])->assignRole($role1);
        Permission::create(['name' => 'categories.update'])->assignRole($role1);
        Permission::create(['name' => 'categories.destroy'])->assignRole($role1);

        Permission::create(['name' => 'skus.index'])->assignRole($role1);
        Permission::create(['name' => 'skus.create'])->assignRole($role1);
        Permission::create(['name' => 'skus.store'])->assignRole($role1);
        Permission::create(['name' => 'skus.edit'])->assignRole($role1);
        Permission::create(['name' => 'skus.update'])->assignRole($role1);
        Permission::create(['name' => 'skus.destroy'])->assignRole($role1);

        Permission::create(['name' => 'prices.index'])->assignRole($role1);
        Permission::create(['name' => 'prices.store'])->assignRole($role1);
        Permission::create(['name' => 'prices.update'])->assignRole($role1);
        Permission::create(['name' => 'prices.destroy'])->assignRole($role1);

        Permission::create(['name' => 'rental.detailPdf'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'rental.detail'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'rental.pay'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'rental.store'])->syncRoles([$role1, $role2]);
    }
}
