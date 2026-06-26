<?php

namespace Database\Seeders;

use App\Models\Client;
use App\Models\ExpenseCategory;
use App\Models\Lead;
use App\Models\Machine;
use App\Models\Material;
use App\Models\MaterialCategory;
use App\Models\Supplier;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DemoDataSeeder extends Seeder
{
    public function run(): void
    {
        $admin = User::where('email', 'admin@aletinspirationz.com')->first();

        // Staff users
        $staffData = [
            ['firstName' => 'Amaka', 'lastName' => 'Okafor', 'email' => 'amaka@aletinspirationz.com', 'role' => 'Front Desk'],
            ['firstName' => 'Chidi', 'lastName' => 'Nwosu', 'email' => 'chidi@aletinspirationz.com', 'role' => 'Production Supervisor'],
            ['firstName' => 'Funmi', 'lastName' => 'Adeyemi', 'email' => 'funmi@aletinspirationz.com', 'role' => 'Accountant'],
            ['firstName' => 'Emeka', 'lastName' => 'Ugwu', 'email' => 'emeka@aletinspirationz.com', 'role' => 'Store Officer'],
            ['firstName' => 'Tunde', 'lastName' => 'Bello', 'email' => 'tunde@aletinspirationz.com', 'role' => 'Dispatch Officer'],
        ];

        foreach ($staffData as $data) {
            $user = User::firstOrCreate(
                ['email' => $data['email']],
                [
                    'firstName'         => $data['firstName'],
                    'lastName'          => $data['lastName'],
                    'password'          => Hash::make('Alet@2026!'),
                    'status'            => 'active',
                    'email_verified_at' => now(),
                ]
            );
            $user->assignRole($data['role']);
        }

        // Sample clients
        $clients = [
            ['name' => 'Zenith Corporate Ltd', 'email' => 'info@zenithcorp.ng', 'phone' => '08011111111', 'company' => 'Zenith Corporate Ltd', 'lead_source' => 'referral', 'segment' => 'corporate'],
            ['name' => 'Lagos Events House', 'email' => 'bookings@lagosevents.ng', 'phone' => '08022222222', 'company' => 'Lagos Events House', 'lead_source' => 'social', 'segment' => 'event'],
            ['name' => 'Greenfield Academy', 'email' => 'admin@greenfield.edu.ng', 'phone' => '08033333333', 'company' => 'Greenfield Academy', 'lead_source' => 'website', 'segment' => 'education'],
            ['name' => 'Mr. Babatunde Adeyinka', 'email' => 'btadeyinka@gmail.com', 'phone' => '08044444444', 'company' => null, 'lead_source' => 'walk_in', 'segment' => 'personal'],
            ['name' => 'Eagle Printing Resellers', 'email' => 'eagle@printnigeria.com', 'phone' => '08055555555', 'company' => 'Eagle Printing Resellers', 'lead_source' => 'referral', 'segment' => 'reseller'],
            ['name' => 'Nova Tech Solutions', 'email' => 'contact@novatech.ng', 'phone' => '08066666666', 'company' => 'Nova Tech Solutions', 'lead_source' => 'website', 'segment' => 'corporate'],
            ['name' => 'City Chapel International', 'email' => 'info@citychapel.org', 'phone' => '08077777777', 'company' => 'City Chapel International', 'lead_source' => 'referral', 'segment' => 'corporate'],
            ['name' => 'Mrs. Ngozi Eze', 'email' => 'ngozi.eze@gmail.com', 'phone' => '08088888888', 'company' => null, 'lead_source' => 'walk_in', 'segment' => 'personal'],
        ];

        foreach ($clients as $c) {
            Client::firstOrCreate(['email' => $c['email']], array_merge($c, ['assigned_to' => $admin->id]));
        }

        // Sample leads
        $leadSources = ['walk_in', 'referral', 'social', 'website', 'phone'];
        $leadStatuses = ['new', 'contacted', 'qualified', 'quoted', 'converted'];
        $jobTypes = ['Flyer Printing', 'Branding Package', 'Packaging Design', 'Banner Printing', 'Yearbook', 'Corporate Gifts'];

        for ($i = 1; $i <= 12; $i++) {
            Lead::firstOrCreate(
                ['lead_number' => 'ALET/LEAD/2026/' . str_pad($i, 4, '0', STR_PAD_LEFT)],
                [
                    'name'        => 'Lead Client ' . $i,
                    'email'       => 'lead' . $i . '@example.com',
                    'phone'       => '0801234' . str_pad($i, 4, '0', STR_PAD_LEFT),
                    'source'      => $leadSources[array_rand($leadSources)],
                    'status'      => $leadStatuses[array_rand($leadStatuses)],
                    'job_type'    => $jobTypes[array_rand($jobTypes)],
                    'requirements'=> 'Sample lead requirement for demo purposes.',
                    'assigned_to' => $admin->id,
                ]
            );
        }

        // Machines
        $machines = [
            ['name' => 'HP Indigo 7K', 'type' => 'digital_press'],
            ['name' => 'Komori Lithrone', 'type' => 'offset'],
            ['name' => 'Roland 1300mm', 'type' => 'large_format'],
            ['name' => 'Polar 115 Cutter', 'type' => 'cutting'],
            ['name' => 'Laminator Pro 650', 'type' => 'lamination'],
            ['name' => 'Perfect Binder', 'type' => 'binding'],
        ];

        foreach ($machines as $m) {
            Machine::firstOrCreate(['name' => $m['name']], $m);
        }

        // Suppliers
        $suppliers = [
            ['name' => 'Paperworld Nigeria Ltd', 'email' => 'sales@paperworld.ng', 'phone' => '08091111111', 'contact_person' => 'Mr. Oluwaseun', 'active' => true],
            ['name' => 'Ink Masters Lagos', 'email' => 'orders@inkmasters.ng', 'phone' => '08092222222', 'contact_person' => 'Mrs. Chioma', 'active' => true],
            ['name' => 'PrintSupply Hub', 'email' => 'supply@printhub.ng', 'phone' => '08093333333', 'contact_person' => 'Engr. Adamu', 'active' => true],
        ];

        foreach ($suppliers as $s) {
            Supplier::firstOrCreate(['email' => $s['email']], $s);
        }

        // Material categories and materials
        $catPaper = MaterialCategory::firstOrCreate(['name' => 'Paper & Substrates'], ['description' => 'All paper types and print substrates']);
        $catInk   = MaterialCategory::firstOrCreate(['name' => 'Inks & Toners'], ['description' => 'Printing inks, toners and UV coatings']);
        $catFinish = MaterialCategory::firstOrCreate(['name' => 'Finishing Materials'], ['description' => 'Lamination film, binding materials, foil']);
        $catVinyl  = MaterialCategory::firstOrCreate(['name' => 'Vinyl & Signage'], ['description' => 'Vinyl rolls, mesh, canvas']);

        $paperSupplier = Supplier::where('email', 'sales@paperworld.ng')->first();
        $inkSupplier   = Supplier::where('email', 'orders@inkmasters.ng')->first();
        $printSupplier = Supplier::where('email', 'supply@printhub.ng')->first();

        $materials = [
            ['category_id' => $catPaper->id, 'supplier_id' => $paperSupplier->id, 'name' => 'Art Paper 130gsm A3', 'sku' => 'PAP-130-A3', 'unit' => 'ream', 'unit_cost_kobo' => 450000, 'current_stock' => 85, 'reorder_threshold' => 20],
            ['category_id' => $catPaper->id, 'supplier_id' => $paperSupplier->id, 'name' => 'Art Paper 170gsm SRA3', 'sku' => 'PAP-170-SRA3', 'unit' => 'ream', 'unit_cost_kobo' => 680000, 'current_stock' => 12, 'reorder_threshold' => 15], // below threshold!
            ['category_id' => $catPaper->id, 'supplier_id' => $paperSupplier->id, 'name' => 'Tracing Paper 90gsm A3', 'sku' => 'PAP-TRACE-A3', 'unit' => 'ream', 'unit_cost_kobo' => 380000, 'current_stock' => 40, 'reorder_threshold' => 10],
            ['category_id' => $catInk->id, 'supplier_id' => $inkSupplier->id, 'name' => 'CMYK Ink Set (HP Indigo)', 'sku' => 'INK-HP-CMYK', 'unit' => 'set', 'unit_cost_kobo' => 3500000, 'current_stock' => 4, 'reorder_threshold' => 2],
            ['category_id' => $catInk->id, 'supplier_id' => $inkSupplier->id, 'name' => 'Offset Ink Black 1kg', 'sku' => 'INK-OFF-BK', 'unit' => 'kg', 'unit_cost_kobo' => 120000, 'current_stock' => 8, 'reorder_threshold' => 3],
            ['category_id' => $catFinish->id, 'supplier_id' => $printSupplier->id, 'name' => 'Matte Lamination Film 650mm', 'sku' => 'LAM-MATTE-650', 'unit' => 'm', 'unit_cost_kobo' => 25000, 'current_stock' => 200, 'reorder_threshold' => 50],
            ['category_id' => $catFinish->id, 'supplier_id' => $printSupplier->id, 'name' => 'Gloss Lamination Film 650mm', 'sku' => 'LAM-GLOSS-650', 'unit' => 'm', 'unit_cost_kobo' => 22000, 'current_stock' => 7, 'reorder_threshold' => 50], // below threshold!
            ['category_id' => $catVinyl->id, 'supplier_id' => $printSupplier->id, 'name' => 'Self-Adhesive Vinyl (White) 1.27m', 'sku' => 'VNL-WHT-127', 'unit' => 'm', 'unit_cost_kobo' => 35000, 'current_stock' => 120, 'reorder_threshold' => 30],
        ];

        foreach ($materials as $m) {
            Material::firstOrCreate(['sku' => $m['sku']], $m);
        }

        // Expense categories
        $expenseCategories = [
            'Utilities (Power / Water)',
            'Rent & Facilities',
            'Staff Salaries',
            'Logistics & Delivery',
            'Equipment Maintenance',
            'Office Supplies',
            'Marketing & Advertising',
            'Miscellaneous',
        ];

        foreach ($expenseCategories as $cat) {
            ExpenseCategory::firstOrCreate(['name' => $cat]);
        }
    }
}
