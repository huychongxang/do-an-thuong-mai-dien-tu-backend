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
        $product = [
            [
                'name' => 'view menu quan ly san pham',
                'label' => 'Xem menu quản lý sản phẩm',
                'group' => 'Sản phẩm',
            ],
            [
                'name' => 'them san pham',
                'label' => 'Thêm mới sản phẩm',
                'group' => 'Sản phẩm',
            ],
            [
                'name' => 'sua san pham',
                'label' => 'Sửa sản phẩm',
                'group' => 'Sản phẩm',
            ],
            [
                'name' => 'xoa san pham',
                'label' => 'Xóa sản phẩm',
                'group' => 'Sản phẩm',
            ],

        ];
        $categoryProduct = [
            [
                'name' => 'view menu quan ly danh muc san pham',
                'label' => 'Xem menu quản lý danh mục sản phẩm',
                'group' => 'Danh mục Sản phẩm',
            ],
            [
                'name' => 'them danh muc san pham',
                'label' => 'Thêm mới danh mục sản phẩm',
                'group' => 'Danh mục Sản phẩm',
            ],
            [
                'name' => 'sua danh muc san pham',
                'label' => 'Sửa danh mục sản phẩm',
                'group' => 'Danh mục Sản phẩm',
            ],
            [
                'name' => 'xoa danh muc san pham',
                'label' => 'Xóa danh mục sản phẩm',
                'group' => 'Danh mục Sản phẩm',
            ],
        ];
        $order = [
            [
                'name' => 'view menu quan ly don hang',
                'label' => 'Xem menu quản lý đơn hàng',
                'group' => 'Đơn hàng',
            ],
            [
                'name' => 'them don hang',
                'label' => 'Thêm mới đơn hàng',
                'group' => 'Đơn hàng',
            ],
            [
                'name' => 'sua don hang',
                'label' => 'Sửa đơn hàng',
                'group' => 'Đơn hàng',
            ],
            [
                'name' => 'xoa don hang',
                'label' => 'Xóa đơn hàng',
                'group' => 'Đơn hàng',
            ],
        ];
        $user = [
            [
                'name' => 'view menu quan ly khach hang',
                'label' => 'Xem menu quản lý khách hàng',
                'group' => 'Khách hàng',
            ],
            [
                'name' => 'them khach hang',
                'label' => 'Thêm mới khách hàng',
                'group' => 'Khách hàng',
            ],
            [
                'name' => 'sua khach hang',
                'label' => 'Sửa khách hàng',
                'group' => 'Khách hàng',
            ],
            [
                'name' => 'xoa khach hang',
                'label' => 'Xóa khách hàng',
                'group' => 'Khách hàng',
            ],
        ];
        $post = [
            [
                'name' => 'view menu quan ly tin tuc',
                'label' => 'Xem menu quản lý tin tức',
                'group' => 'Bài viết',
            ],
            [
                'name' => 'them bai viet',
                'label' => 'Thêm mới bài viết',
                'group' => 'Bài viết',
            ],
            [
                'name' => 'sua bai viet nguoi khac',
                'label' => 'Sửa bài viết nguoi khac',
                'group' => 'Bài viết',
            ],
            [
                'name' => 'xoa bai viet nguoi khac',
                'label' => 'Xóa bài viết người khác',
                'group' => 'Bài viết',
            ],
        ];
        $code = [
            [
                'name' => 'view menu quan ly lap trinh',
                'label' => 'Xem menu quản lý lập trình',
                'group' => 'Lập trình',
            ]
        ];

        $permissions = array_merge($product, $categoryProduct, $order, $user, $post, $code);
        foreach ($permissions as $permission) {
            \Spatie\Permission\Models\Permission::firstOrCreate([
                'name' => $permission['name']
            ], $permission);
        }

    }
}
