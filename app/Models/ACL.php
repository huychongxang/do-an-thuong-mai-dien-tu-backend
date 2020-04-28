<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 28-Apr-20
 * Time: 2:57 PM
 */

namespace App\Models;


final class ACL
{
    // Product
    const PERMISSION_VIEW_MENU_PRODUCT = 'view menu quan ly san pham';
    const PERMISSION_CREATE_PRODUCT = 'them san pham';
    const PERMISSION_EDIT_PRODUCT = 'sua san pham';
    const PERMISSION_DELETE_PRODUCT = 'xoa san pham';

    // Product category
    const PERMISSION_VIEW_MENU_PRODUCT_CATEGORY = 'view menu quan ly danh muc san pham';
    const PERMISSION_CREATE_PRODUCT_CATEGORY = 'them danh muc san pham';
    const PERMISSION_EDIT_PRODUCT_CATEGORY = 'sua danh muc san pham';
    const PERMISSION_DELETE_PRODUCT_CATEGORY = 'xoa danh muc san pham';

    // Product Attribute
    const PERMISSION_VIEW_MENU_PRODUCT_ATTRIBUTE = 'view menu quan ly thuoc tinh san pham';
    const PERMISSION_CREATE_PRODUCT_ATTRIBUTE = 'them thuoc tinh san pham';
    const PERMISSION_EDIT_PRODUCT_ATTRIBUTE = 'sua thuoc tinh san pham';
    const PERMISSION_DELETE_PRODUCT_ATTRIBUTE = 'xoa thuoc tinh san pham';

    // Order
    const PERMISSION_VIEW_MENU_ORDER = 'view menu quan ly don hang';
    const PERMISSION_CREATE_ORDER = 'them don hang';
    const PERMISSION_EDIT_ORDER = 'sua don hang';
    const PERMISSION_DELETE_ORDER = 'xoa don hang';

    // Order Status
    const PERMISSION_VIEW_MENU_ORDER_STATUS = 'view menu quan ly trang thai don hang';
    const PERMISSION_CREATE_ORDER_STATUS = 'them trang thai don hang';
    const PERMISSION_EDIT_ORDER_STATUS = 'sua trang thai don hang';
    const PERMISSION_DELETE_ORDER_STATUS = 'xoa trang thai don hang';

    // Payment Status
    const PERMISSION_VIEW_MENU_PAYMENT_STATUS = 'view menu quan ly trang thai thanh toan';
    const PERMISSION_CREATE_PAYMENT_STATUS = 'them trang thai thanh toan';
    const PERMISSION_EDIT_PAYMENT_STATUS = 'sua trang thai thanh toan';
    const PERMISSION_DELETE_PAYMENT_STATUS = 'xoa trang thai thanh toan';

    // Shipping Status
    const PERMISSION_VIEW_MENU_SHIPPING_STATUS = 'view menu quan ly trang thai van chuyen';
    const PERMISSION_CREATE_SHIPPING_STATUS = 'them trang thai van chuyen';
    const PERMISSION_EDIT_SHIPPING_STATUS = 'sua trang thai van chuyen';
    const PERMISSION_DELETE_SHIPPING_STATUS = 'xoa trang thai van chuyen';

    // User
    const PERMISSION_VIEW_MENU_USER = 'view menu quan ly khach hang';
    const PERMISSION_CREATE_USER = 'them khach hang';
    const PERMISSION_EDIT_USER = 'sua khach hang';
    const PERMISSION_DELETE_USER = 'xoa khach hang';

    // Post
    const PERMISSION_VIEW_MENU_POST = 'view menu quan ly tin tuc';
    const PERMISSION_CREATE_POST = 'them bai viet';
    const PERMISSION_EDIT_OTHER_POST = 'sua bai viet nguoi khac';
    const PERMISSION_DELETE_OTHER_POST = 'xoa bai viet nguoi khac';

    // Post Category
    const PERMISSION_VIEW_MENU_POST_CATEGORY = 'view menu quan ly danh muc tin tuc';
    const PERMISSION_CREATE_POST_CATEGORY = 'them danh muc tin tuc';
    const PERMISSION_EDIT_POST_CATEGORY = 'sua danh muc tin tuc';
    const PERMISSION_DELETE_POST_CATEGORY = 'xoa danh muc tin tuc';

    // DEV
    const PERMISSION_VIEW_MENU_DEV = 'view menu quan ly lap trinh';

    // Admin
    const PERMISSION_VIEW_MENU_ADMIN = 'view menu quan ly quan tri vien';
    const PERMISSION_CREATE_ADMIN = 'them quan tri vien';
    const PERMISSION_EDIT_ADMIN = 'sua quan tri vien';
    const PERMISSION_DELETE_ADMIN = 'xoa quan tri vien';

    // Role
    const PERMISSION_VIEW_MENU_ROLE = 'view menu quan ly nhom quyen';
    const PERMISSION_CREATE_ROLE = 'them nhom quyen';
    const PERMISSION_EDIT_ROLE = 'sua nhom quyen';
    const PERMISSION_DELETE_ROLE = 'xoa nhom quyen';
}
