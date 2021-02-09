<?php

use App\Models\Auth\User\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class PermissionAndRoleAndUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        $permissions = [
            'barang-show',
            'barang-index',
            'barang-create',
            'barang-edit',
            'barang-delete',
            'barang-approve',

            'aktiva-show',
            'aktiva-index',
            'aktiva-create',
            'aktiva-edit',
            'aktiva-delete',

            'peminjaman-show',
            'peminjaman-self-show',
            'peminjaman-index',
            'peminjaman-self-index',
            'peminjaman-create',
            'peminjaman-edit',
            'peminjaman-self-edit',
            'peminjaman-delete',

            'konfigurasi-show',
            'konfigurasi-index',
            'konfigurasi-create',
            'konfigurasi-edit',
            'konfigurasi-delete',

            'user-show',
            'user-self-show',
            'user-index',
            'user-create',
            'user-edit',
            'user-self-edit',
            'user-delete'
        ];

        foreach ($permissions as $permission) {
            $db_permission = Permission::whereName($permission)->first();
            if(empty($db_permission)){
                Permission::create(['name' => $permission/*, 'guard_name' => 'web'*/]);
            }
        }

        $roles = [
            'sadmin',
            'admin',
            'karyawan',
            'umum',
            'keuangan',
            'system'
        ];

        foreach($roles as $role) {
            $db_roles = Role::whereName($role)->first();
            if (empty($db_roles)) {
                $created_role = Role::create(['name' => $role]);
                switch ($role) {
                    case 'sadmin':
                        (factory(User::class)->create([
                            'name' => 'Mr. Super Administrator',
                            'email' => 'sadmin@example.com'
                        ]))->assignRole($created_role);
                        break;
                    case 'admin':
                        $created_role->syncPermissions([
                            'user-show',
                            'user-self-show',
                            'user-index',
                            'user-create',
                            'user-edit',
                            'user-self-edit',
                            'user-delete'
                        ]);
                        (factory(User::class)->create([
                            'name' => 'Mr. Administrator',
                            'email' => 'admin@example.com'
                        ]))->assignRole($created_role);
                        break;
                    case 'karyawan':
                        $created_role->syncPermissions([
                            'barang-show',
                            'barang-index',

                            'peminjaman-self-show',
                            'peminjaman-self-index',
                            'peminjaman-create',
                            'peminjaman-self-edit',

                            'user-self-show',
                            'user-self-edit'
                        ]);
                        (factory(User::class)->create([
                            'name' => 'Karyawan Satu',
                            'email' => 'karyawan@example.com'
                        ]))->assignRole($created_role);
                        break;
                    case 'umum':
                        $created_role->syncPermissions([
                            'barang-show',
                            'barang-index',
                            'barang-create',
                            'barang-edit',
                            'barang-delete',

                            'aktiva-show',
                            'aktiva-index',
                            'aktiva-create',
                            'aktiva-edit',
                            'aktiva-delete',

                            'peminjaman-show',
                            'peminjaman-self-show',
                            'peminjaman-index',
                            'peminjaman-self-index',
                            'peminjaman-create',
                            'peminjaman-edit',
                            'peminjaman-self-edit',
                            'peminjaman-delete',

                            'user-self-show',
                            'user-self-edit'
                        ]);
                        (factory(User::class)->create([
                            'name' => 'Bagian Umum',
                            'email' => 'umum@example.com'
                        ]))->assignRole($created_role);
                        break;
                    case 'keuangan':
                        $created_role->syncPermissions([
                            'barang-show',
                            'barang-index',
                            'barang-approve',

                            'aktiva-show',
                            'aktiva-index',
                            'aktiva-create',
                            'aktiva-edit',
                            'aktiva-delete',

                            'peminjaman-self-show',
                            'peminjaman-self-index',
                            'peminjaman-create',
                            'peminjaman-self-edit',

                            'user-self-show',
                            'user-self-edit'
                        ]);
                        (factory(User::class)->create([
                            'name' => 'Bagian Keuangan',
                            'email' => 'keuangan@example.com'
                        ]))->assignRole($created_role);
                        break;
                    case 'system':
                        $created_role->syncPermissions([
                            'aktiva-edit',
                            'peminjaman-edit'
                        ]);
                        (factory(User::class)->create([
                            'name' => 'System',
                            'email' => 'system@example.com'
                        ]))->assignRole($created_role);
                        break;
                    default:
                        break;
                }
            }
        }
    }
}
