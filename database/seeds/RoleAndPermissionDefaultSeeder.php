<?php

use Illuminate\Database\Seeder;

class RoleAndPermissionDefaultSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            [
                'name' => 'admin',
                'label' => 'Admin'
            ],
            [
                'name' => 'content collaborator',
                'label' => 'Cộng tác viên viết bài'
            ],
        ];
        foreach ($roles as $role) {
            \Spatie\Permission\Models\Role::firstOrCreate([
                'name' => $role['name']
            ], $role);
        }


        // Permissions
        $permissions = [
            [
                'name' => 'view menu quan ly san pham',
                'label' => 'Xem menu quản lý sản phẩm'
            ],
            [
                'name' => 'view menu quan ly don hang',
                'label' => 'Xem menu quản lý đơn hàng'
            ],
            [
                'name' => 'view menu quan ly khach hang',
                'label' => 'Xem menu quản lý khách hàng'
            ],
            [
                'name' => 'view menu quan ly tin tuc',
                'label' => 'Xem menu quản lý tin tức'
            ],
            [
                'name' => 'view menu quan ly lap trinh',
                'label' => 'Xem menu quản lý lập trình'
            ],
        ];

        foreach ($permissions as $permission) {
            \Spatie\Permission\Models\Permission::firstOrCreate([
                'name' => $permission['name']
            ], $permission);
        }

    }
}
