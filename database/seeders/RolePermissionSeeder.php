<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;

class RolePermissionSeeder extends Seeder
{
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Create permissions
        $permissions = [
            // User Management
            'view users', 'create users', 'edit users', 'delete users',
            // Customer Service
            'view enquiries', 'respond enquiries', 'close enquiries',
            // Production Management
            'view jobs', 'update job status', 'assign jobs', 'view production reports',
            // Record Management
            'view services', 'update service prices', 'update material costs', 'view pricing reports',
            // Marketing
            'manage blog', 'create coupons', 'delete coupons', 'view analytics',
            'manage promotions', 'send newsletters',
            // Admin Management
            'manage admin users', 'view system logs', 'manage system settings',
            // Job Management
            'create jobs', 'edit jobs', 'delete jobs', 'export jobs',
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission, 'guard_name' => 'web']);
        }

        // Create roles and assign permissions
        $superAdmin = Role::create(['name' => 'Super Admin']);
        $superAdmin->givePermissionTo(Permission::all());

        $customerService = Role::create(['name' => 'Customer Service']);
        $customerService->givePermissionTo([
            'view users', 'view enquiries', 'respond enquiries', 'close enquiries',
            'view jobs', 'create jobs', 'edit jobs',
        ]);

        $productionManager = Role::create(['name' => 'Production Manager']);
        $productionManager->givePermissionTo([
            'view jobs', 'update job status', 'assign jobs', 'view production reports',
            'create jobs', 'edit jobs',
        ]);

        $recordManager = Role::create(['name' => 'Record Manager']);
        $recordManager->givePermissionTo([
            'view services', 'update service prices', 'update material costs', 'view pricing reports',
        ]);

        $marketingManager = Role::create(['name' => 'Marketing Manager']);
        $marketingManager->givePermissionTo([
            'view enquiries', 'respond enquiries',
            'view services', 'update service prices',
            'manage blog', 'create coupons', 'delete coupons', 'view analytics',
            'manage promotions', 'send newsletters',
        ]);

        // Create a super admin user
        $admin = User::create([
            'firstName' => 'Super',
            'lastName' => 'Admin',
            'email' => 'admin@aletinspirationz.com',
            'password' => bcrypt('admin123'),
            'is_admin' => true,
            'status' => 'active',
        ]);

        $admin->assignRole('Super Admin');
    }
}