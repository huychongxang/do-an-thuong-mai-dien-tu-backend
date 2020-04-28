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
    const PERMISSION_VIEW_MENU_PRODUCT = 'view menu quan ly san pham';
    const PERMISSION_CREATE_PRODUCT = 'them san pham';
    const PERMISSION_EDIT_PRODUCT = 'sua san pham';
    const PERMISSION_DELETE_PRODUCT = 'xoa san pham';

    const PERMISSION_VIEW_MENU_PRODUCT_CATEGORY = 'view menu quan ly danh muc san pham';
    const PERMISSION_CREATE_PRODUCT_CATEGORY = 'them danh muc san pham';
    const PERMISSION_EDIT_PRODUCT_CATEGORY = 'sua danh muc san pham';
    const PERMISSION_DELETE_PRODUCT_CATEGORY = 'xoa danh muc san pham';

    const PERMISSION_VIEW_MENU_PRODUCT_ATTRIBUTE = 'view menu quan ly thuoc tinh san pham';
    const PERMISSION_CREATE_PRODUCT_ATTRIBUTE = 'them thuoc tinh san pham';
    const PERMISSION_EDIT_PRODUCT_ATTRIBUTE = 'sua thuoc tinh san pham';
    const PERMISSION_DELETE_PRODUCT_ATTRIBUTE = 'xoa thuoc tinh san pham';
}
