<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesAndPermissionsSeeder extends Seeder
{
    public function run(): void
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Define all permissions per module
        $permissions = [
            // CRM
            'crm.view', 'crm.create', 'crm.edit', 'crm.delete',
            // Leads
            'leads.view', 'leads.create', 'leads.edit', 'leads.delete',
            // Quotations
            'quotations.view', 'quotations.create', 'quotations.edit', 'quotations.delete', 'quotations.send',
            // Job Orders
            'jobs.view', 'jobs.create', 'jobs.edit', 'jobs.delete',
            'jobs.advance_stage', 'jobs.dispatch_override',
            // Production
            'production.view', 'production.update',
            // ERM / Inventory
            'inventory.view', 'inventory.create', 'inventory.edit', 'inventory.delete',
            'stock.in', 'stock.out', 'stock.adjust',
            'purchase_orders.view', 'purchase_orders.create', 'purchase_orders.receive',
            // Invoices
            'invoices.view', 'invoices.create', 'invoices.edit', 'invoices.delete', 'invoices.send',
            // Payments
            'payments.view', 'payments.record',
            // Finance
            'finance.view', 'expenses.create', 'expenses.edit', 'payroll.view', 'payroll.create',
            // Dispatch
            'dispatch.view', 'dispatch.manage',
            // Staff / Admin
            'staff.view', 'staff.create', 'staff.edit', 'staff.delete',
            'reports.view', 'settings.manage',
        ];

        foreach ($permissions as $perm) {
            Permission::firstOrCreate(['name' => $perm]);
        }

        // Define roles with their permission sets
        $roles = [
            'Super Admin' => array_merge($permissions), // all
            'Operations Manager' => [
                'crm.view', 'crm.edit',
                'leads.view', 'leads.edit',
                'quotations.view', 'quotations.create', 'quotations.edit', 'quotations.send',
                'jobs.view', 'jobs.create', 'jobs.edit', 'jobs.advance_stage', 'jobs.dispatch_override',
                'production.view', 'production.update',
                'inventory.view', 'inventory.edit', 'stock.in', 'stock.out', 'stock.adjust',
                'purchase_orders.view', 'purchase_orders.create', 'purchase_orders.receive',
                'invoices.view', 'invoices.create', 'invoices.edit', 'invoices.send',
                'payments.view',
                'finance.view', 'expenses.create',
                'dispatch.view', 'dispatch.manage',
                'staff.view', 'reports.view',
            ],
            'Front Desk' => [
                'crm.view', 'crm.create', 'crm.edit',
                'leads.view', 'leads.create', 'leads.edit',
                'quotations.view', 'quotations.create', 'quotations.edit', 'quotations.send',
                'jobs.view', 'jobs.create',
                'invoices.view',
                'payments.view',
                'dispatch.view',
            ],
            'Production Supervisor' => [
                'jobs.view', 'jobs.advance_stage',
                'production.view', 'production.update',
                'inventory.view', 'stock.out',
            ],
            'Operator' => [
                'jobs.view',
                'production.view', 'production.update',
            ],
            'Accountant' => [
                'invoices.view', 'invoices.create', 'invoices.edit', 'invoices.send',
                'payments.view', 'payments.record',
                'finance.view', 'expenses.create', 'expenses.edit',
                'payroll.view', 'payroll.create',
                'reports.view',
            ],
            'Store Officer' => [
                'inventory.view', 'inventory.create', 'inventory.edit',
                'stock.in', 'stock.out', 'stock.adjust',
                'purchase_orders.view', 'purchase_orders.create', 'purchase_orders.receive',
            ],
            'Dispatch Officer' => [
                'jobs.view',
                'dispatch.view', 'dispatch.manage',
            ],
        ];

        foreach ($roles as $roleName => $rolePermissions) {
            $role = Role::firstOrCreate(['name' => $roleName]);
            $role->syncPermissions($rolePermissions);
        }

        // Create Super Admin user if it doesn't exist
        $superAdmin = User::firstOrCreate(
            ['email' => 'admin@aletinspirationz.com'],
            [
                'firstName'   => 'Super',
                'lastName'    => 'Admin',
                'password'    => Hash::make('Alet@2026!'),
                'is_admin'    => true,
                'status'      => 'active',
                'email_verified_at' => now(),
            ]
        );

        $superAdmin->assignRole('Super Admin');

        // Create Operations Manager demo user
        $opsManager = User::firstOrCreate(
            ['email' => 'ops@aletinspirationz.com'],
            [
                'firstName'   => 'Ops',
                'lastName'    => 'Manager',
                'password'    => Hash::make('Alet@2026!'),
                'is_admin'    => false,
                'status'      => 'active',
                'email_verified_at' => now(),
            ]
        );
        $opsManager->assignRole('Operations Manager');
    }
}
