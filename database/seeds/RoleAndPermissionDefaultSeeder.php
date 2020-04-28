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
                'label' => 'Admin',
                'guard_name' => 'admin'
            ],
            [
                'name' => 'content collaborator',
                'label' => 'Cộng tác viên viết bài',
                'guard_name' => 'admin'
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
        $productAttribute = [
            [
                'name' => 'view menu quan ly thuoc tinh san pham',
                'label' => 'Xem menu quản lý thuộc tính sản phẩm',
                'group' => 'Thuộc tính sản phẩm',
            ],
            [
                'name' => 'them thuoc tinh san pham',
                'label' => 'Thêm mới thuộc tính sản phẩm',
                'group' => 'Thuộc tính sản phẩm',
            ],
            [
                'name' => 'sua thuoc tinh san pham',
                'label' => 'Sửa thuộc tính sản phẩm',
                'group' => 'Thuộc tính sản phẩm',
            ],
            [
                'name' => 'xoa thuoc tinh san pham',
                'label' => 'Xóa thuộc tính sản phẩm',
                'group' => 'Thuộc tính sản phẩm',
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
        $orderStatus = [
            [
                'name' => 'view menu quan ly trang thai don hang',
                'label' => 'Xem menu quản lý trạng thái đơn hàng',
                'group' => 'Trạng thái đơn hàng',
            ],
            [
                'name' => 'them trang thai don hang',
                'label' => 'Thêm mới trạng thái đơn hàng',
                'group' => 'Trạng thái đơn hàng',
            ],
            [
                'name' => 'sua trang thai don hang',
                'label' => 'Sửa trạng thái đơn hàng',
                'group' => 'Trạng thái đơn hàng',
            ],
            [
                'name' => 'xoa trang thai don hang',
                'label' => 'Xóa trạng thái đơn hàng',
                'group' => 'Trạng thái đơn hàng',
            ],];
        $paymentStatus = [
            [
                'name' => 'view menu quan ly trang thai thanh toan',
                'label' => 'Xem menu quản lý trạng thái thanh toán',
                'group' => 'Trạng thái thanh toán',
            ],
            [
                'name' => 'them trang thai thanh toan',
                'label' => 'Thêm mới trạng thái thanh toán',
                'group' => 'Trạng thái thanh toán',
            ],
            [
                'name' => 'sua trang thai thanh toan',
                'label' => 'Sửa trạng thái thanh toán',
                'group' => 'Trạng thái thanh toán',
            ],
            [
                'name' => 'xoa trang thai thanh toan',
                'label' => 'Xóa trạng thái thanh toán',
                'group' => 'Trạng thái thanh toán',
            ],
        ];
        $shippingStatus = [
            [
                'name' => 'view menu quan ly trang thai van chuyen',
                'label' => 'Xem menu quản lý trạng thái vận chuyển',
                'group' => 'Trạng thái vận chuyển',
            ],
            [
                'name' => 'them trang thai van chuyen',
                'label' => 'Thêm mới trạng thái vận chuyển',
                'group' => 'Trạng thái vận chuyển',
            ],
            [
                'name' => 'sua trang thai van chuyen',
                'label' => 'Sửa trạng thái vận chuyển',
                'group' => 'Trạng thái vận chuyển',
            ],
            [
                'name' => 'xoa trang thai van chuyen',
                'label' => 'Xóa trạng thái vận chuyển',
                'group' => 'Trạng thái vận chuyển',
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
                'label' => 'Sửa bài viết người khác',
                'group' => 'Bài viết',
            ],
            [
                'name' => 'xoa bai viet nguoi khac',
                'label' => 'Xóa bài viết người khác',
                'group' => 'Bài viết',
            ],
        ];
        $postCategory = [
            [
                'name' => 'view menu quan ly danh muc tin tuc',
                'label' => 'Xem menu quản lý danh mục tin tức',
                'group' => 'Danh mục tin tức',
            ],
            [
                'name' => 'them danh muc tin tuc',
                'label' => 'Thêm mới danh mục tin tức',
                'group' => 'Danh mục tin tức',
            ],
            [
                'name' => 'sua danh muc tin tuc',
                'label' => 'Sửa danh mục tin tức',
                'group' => 'Danh mục tin tức',
            ],
            [
                'name' => 'xoa danh muc tin tuc',
                'label' => 'Xóa danh mục tin tức',
                'group' => 'Danh mục tin tức',
            ],
        ];
        $code = [
            [
                'name' => 'view menu quan ly lap trinh',
                'label' => 'Xem menu quản lý lập trình',
                'group' => 'Lập trình',
            ]
        ];

        $admin = [
            [
                'name' => 'view menu quan ly quan tri vien',
                'label' => 'Xem menu quản lý quản trị viên',
                'group' => 'Quản trị viên',
            ],
            [
                'name' => 'them quan tri vien',
                'label' => 'Thêm mới quản trị viên',
                'group' => 'Quản trị viên',
            ],
            [
                'name' => 'sua quan tri vien',
                'label' => 'Sửa quản trị viên',
                'group' => 'Quản trị viên',
            ],
            [
                'name' => 'xoa quan tri vien',
                'label' => 'Xóa quản trị viên',
                'group' => 'Quản trị viên',
            ],
        ];
        $role = [
            [
                'name' => 'view menu quan ly nhom quyen',
                'label' => 'Xem menu quản lý nhóm quyền',
                'group' => 'Nhóm quyền',
            ],
            [
                'name' => 'them nhom quyen',
                'label' => 'Thêm mới nhóm quyền',
                'group' => 'Nhóm quyền',
            ],
            [
                'name' => 'sua nhom quyen',
                'label' => 'Sửa nhóm quyền',
                'group' => 'Nhóm quyền',
            ],
            [
                'name' => 'xoa nhom quyen',
                'label' => 'Xóa nhóm quyền',
                'group' => 'Nhóm quyền',
            ],
        ];

        $permissions = array_merge($product, $categoryProduct, $productAttribute, $order, $orderStatus, $paymentStatus, $shippingStatus, $user, $post, $postCategory,
            $code, $admin, $role);
        foreach ($permissions as $permission) {
            $permission['guard_name'] = 'admin';
            \Spatie\Permission\Models\Permission::firstOrCreate([
                'name' => $permission['name']
            ], $permission);
        }

    }
}
