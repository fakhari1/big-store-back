<?php

namespace Modules\RolePermission\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Spatie\Permission\Models\Role as SpatieRole;

class Role extends SpatieRole
{
    const ROLE_SUPER_ADMIN = 'مدیریت کل';

    const ROLE_CUSTOMER = 'مشتری';

    const ROLE_VENDOR = 'فروشنده';

    const ROLE_MANAGER = 'مدیر';
    const ROLE_OBSERVER = 'ناظر';

    public static $roles = [

        self::ROLE_SUPER_ADMIN => [
            Permission::PERMISSION_SUPER_ADMIN,
            Permission::PERMISSION_MANAGER,

            Permission::PERMISSION_MANAGE_POST_CATEGORIES,
            Permission::PERMISSION_MANAGE_PRODUCT_CATEGORIES,
            Permission::PERMISSION_VIEW_POST_CATEGORIES,
            Permission::PERMISSION_VIEW_PRODUCT_CATEGORIES,

            Permission::PERMISSION_MANAGE_ROLE_PERMISSIONS,
            Permission::PERMISSION_VIEW_ROLE_PERMISSIONS,


            Permission::PERMISSION_MANAGE_DISCOUNTS,
            Permission::PERMISSION_VIEW_DISCOUNTS,
            Permission::PERMISSION_MANAGE_OWN_DISCOUNTS,
            Permission::PERMISSION_VIEW_OWN_DISCOUNTS,

            Permission::PERMISSION_MANAGE_INVOICES,
            Permission::PERMISSION_VIEW_INVOICES,
            Permission::PERMISSION_MANAGE_OWN_INVOICES,
            Permission::PERMISSION_VIEW_OWN_INVOICES,

            Permission::PERMISSION_MANAGE_TICKETS,
            Permission::PERMISSION_VIEW_TICKETS,
            Permission::PERMISSION_MANAGE_OWN_TICKETS,
            Permission::PERMISSION_VIEW_OWN_TICKETS,

            Permission::PERMISSION_MANAGE_COMMENTS,
            Permission::PERMISSION_VIEW_COMMENTS,
            Permission::PERMISSION_MANAGE_OWN_COMMENTS,
            Permission::PERMISSION_VIEW_OWN_COMMENTS,

            Permission::PERMISSION_MANAGE_PAYMENTS,
            Permission::PERMISSION_VIEW_PAYMENTS,
            Permission::PERMISSION_MANAGE_OWN_PAYMENTS,
            Permission::PERMISSION_VIEW_OWN_PAYMENTS,

            Permission::PERMISSION_MANAGE_MANAGERS,
            Permission::PERMISSION_VIEW_MANAGERS,
            Permission::PERMISSION_MANAGE_VENDORS,
            Permission::PERMISSION_VIEW_VENDORS,
            Permission::PERMISSION_MANAGE_CUSTOMERS,
            Permission::PERMISSION_VIEW_CUSTOMERS,

            Permission::PERMISSION_MANAGE_OWN_PROFILE,

            Permission::PERMISSION_MANAGE_BANNERS,
            Permission::PERMISSION_VIEW_BANNERS,

            Permission::PERMISSION_MANAGE_FAQS,
            Permission::PERMISSION_VIEW_FAQS,

            Permission::PERMISSION_MANAGE_MENUS,
            Permission::PERMISSION_VIEW_MENUS,

            Permission::PERMISSION_MANAGE_PAGES,
            Permission::PERMISSION_VIEW_PAGES,

            Permission::PERMISSION_MANAGE_POSTS,
            Permission::PERMISSION_VIEW_POSTS,

            Permission::PERMISSION_MANAGE_FEATURES,
            Permission::PERMISSION_VIEW_FEATURES,

            Permission::PERMISSION_MANAGE_BRANDS,
            Permission::PERMISSION_VIEW_BRANDS,

            Permission::PERMISSION_MANAGE_DELIVERY_METHODS,
            Permission::PERMISSION_VIEW_DELIVERY_METHODS,
            Permission::PERMISSION_MANAGE_OWN_DELIVERY_METHODS,
            Permission::PERMISSION_VIEW_OWN_DELIVERY_METHODS,

            Permission::PERMISSION_MANAGE_GUARANTIES,
            Permission::PERMISSION_VIEW_GUARANTIES,
            Permission::PERMISSION_MANAGE_OWN_GUARANTIES,
            Permission::PERMISSION_VIEW_OWN_GUARANTIES,

            Permission::PERMISSION_MANAGE_ORDERS,
            Permission::PERMISSION_VIEW_ORDERS,
            Permission::PERMISSION_MANAGE_OWN_ORDERS,
            Permission::PERMISSION_VIEW_OWN_ORDERS,

            Permission::PERMISSION_MANAGE_PRODUCTS,
            Permission::PERMISSION_VIEW_PRODUCTS,
            Permission::PERMISSION_MANAGE_OWN_PRODUCTS,
            Permission::PERMISSION_VIEW_OWN_PRODUCTS,

            Permission::PERMISSION_MANAGE_NOTIFICATIONS,
            Permission::PERMISSION_VIEW_NOTIFICATIONS,

            Permission::PERMISSION_MANAGE_SETTINGS,
            Permission::PERMISSION_VIEW_SETTINGS,

        ],

        self::ROLE_MANAGER => [
            Permission::PERMISSION_SUPER_ADMIN,
            Permission::PERMISSION_MANAGER,

            Permission::PERMISSION_MANAGE_POST_CATEGORIES,
            Permission::PERMISSION_MANAGE_PRODUCT_CATEGORIES,
            Permission::PERMISSION_VIEW_POST_CATEGORIES,
            Permission::PERMISSION_VIEW_PRODUCT_CATEGORIES,

            Permission::PERMISSION_MANAGE_ROLE_PERMISSIONS,
            Permission::PERMISSION_VIEW_ROLE_PERMISSIONS,


            Permission::PERMISSION_MANAGE_DISCOUNTS,
            Permission::PERMISSION_VIEW_DISCOUNTS,
            Permission::PERMISSION_MANAGE_OWN_DISCOUNTS,
            Permission::PERMISSION_VIEW_OWN_DISCOUNTS,

            Permission::PERMISSION_MANAGE_INVOICES,
            Permission::PERMISSION_VIEW_INVOICES,
            Permission::PERMISSION_MANAGE_OWN_INVOICES,
            Permission::PERMISSION_VIEW_OWN_INVOICES,

            Permission::PERMISSION_MANAGE_TICKETS,
            Permission::PERMISSION_VIEW_TICKETS,
            Permission::PERMISSION_MANAGE_OWN_TICKETS,
            Permission::PERMISSION_VIEW_OWN_TICKETS,

            Permission::PERMISSION_MANAGE_COMMENTS,
            Permission::PERMISSION_VIEW_COMMENTS,
            Permission::PERMISSION_MANAGE_OWN_COMMENTS,
            Permission::PERMISSION_VIEW_OWN_COMMENTS,

            Permission::PERMISSION_MANAGE_PAYMENTS,
            Permission::PERMISSION_VIEW_PAYMENTS,
            Permission::PERMISSION_MANAGE_OWN_PAYMENTS,
            Permission::PERMISSION_VIEW_OWN_PAYMENTS,

            Permission::PERMISSION_MANAGE_MANAGERS,
            Permission::PERMISSION_VIEW_MANAGERS,
            Permission::PERMISSION_MANAGE_VENDORS,
            Permission::PERMISSION_VIEW_VENDORS,
            Permission::PERMISSION_MANAGE_CUSTOMERS,
            Permission::PERMISSION_VIEW_CUSTOMERS,

            Permission::PERMISSION_MANAGE_OWN_PROFILE,

            Permission::PERMISSION_MANAGE_BANNERS,
            Permission::PERMISSION_VIEW_BANNERS,

            Permission::PERMISSION_MANAGE_FAQS,
            Permission::PERMISSION_VIEW_FAQS,

            Permission::PERMISSION_MANAGE_MENUS,
            Permission::PERMISSION_VIEW_MENUS,

            Permission::PERMISSION_MANAGE_PAGES,
            Permission::PERMISSION_VIEW_PAGES,

            Permission::PERMISSION_MANAGE_POSTS,
            Permission::PERMISSION_VIEW_POSTS,

            Permission::PERMISSION_MANAGE_FEATURES,
            Permission::PERMISSION_VIEW_FEATURES,

            Permission::PERMISSION_MANAGE_BRANDS,
            Permission::PERMISSION_VIEW_BRANDS,

            Permission::PERMISSION_MANAGE_DELIVERY_METHODS,
            Permission::PERMISSION_VIEW_DELIVERY_METHODS,
            Permission::PERMISSION_MANAGE_OWN_DELIVERY_METHODS,
            Permission::PERMISSION_VIEW_OWN_DELIVERY_METHODS,

            Permission::PERMISSION_MANAGE_GUARANTIES,
            Permission::PERMISSION_VIEW_GUARANTIES,
            Permission::PERMISSION_MANAGE_OWN_GUARANTIES,
            Permission::PERMISSION_VIEW_OWN_GUARANTIES,

            Permission::PERMISSION_MANAGE_ORDERS,
            Permission::PERMISSION_VIEW_ORDERS,
            Permission::PERMISSION_MANAGE_OWN_ORDERS,
            Permission::PERMISSION_VIEW_OWN_ORDERS,

            Permission::PERMISSION_MANAGE_PRODUCTS,
            Permission::PERMISSION_VIEW_PRODUCTS,
            Permission::PERMISSION_MANAGE_OWN_PRODUCTS,
            Permission::PERMISSION_VIEW_OWN_PRODUCTS,

            Permission::PERMISSION_MANAGE_NOTIFICATIONS,
            Permission::PERMISSION_VIEW_NOTIFICATIONS,

            Permission::PERMISSION_MANAGE_SETTINGS,
            Permission::PERMISSION_VIEW_SETTINGS,
        ],

        self::ROLE_CUSTOMER => [
            Permission::PERMISSION_MANAGE_OWN_DISCOUNTS,
            Permission::PERMISSION_VIEW_OWN_DISCOUNTS,

            Permission::PERMISSION_MANAGE_OWN_INVOICES,
            Permission::PERMISSION_VIEW_OWN_INVOICES,

            Permission::PERMISSION_MANAGE_OWN_TICKETS,
            Permission::PERMISSION_VIEW_OWN_TICKETS,

            Permission::PERMISSION_MANAGE_OWN_COMMENTS,
            Permission::PERMISSION_VIEW_OWN_COMMENTS,

            Permission::PERMISSION_MANAGE_OWN_PAYMENTS,
            Permission::PERMISSION_VIEW_OWN_PAYMENTS,

            Permission::PERMISSION_MANAGE_OWN_PROFILE,

            Permission::PERMISSION_MANAGE_OWN_ORDERS,
            Permission::PERMISSION_VIEW_OWN_ORDERS,

        ],

        self::ROLE_VENDOR => [
            Permission::PERMISSION_VIEW_CUSTOMERS,
            Permission::PERMISSION_VIEW_OWN_CUSTOMERS,

            Permission::PERMISSION_MANAGE_OWN_PROFILE,

            Permission::PERMISSION_MANAGE_OWN_DISCOUNTS,
            Permission::PERMISSION_VIEW_OWN_DISCOUNTS,

            Permission::PERMISSION_MANAGE_OWN_INVOICES,
            Permission::PERMISSION_VIEW_OWN_INVOICES,

            Permission::PERMISSION_MANAGE_OWN_TICKETS,
            Permission::PERMISSION_VIEW_OWN_TICKETS,

            Permission::PERMISSION_MANAGE_OWN_COMMENTS,
            Permission::PERMISSION_VIEW_OWN_COMMENTS,

            Permission::PERMISSION_MANAGE_OWN_PAYMENTS,
            Permission::PERMISSION_VIEW_OWN_PAYMENTS,

            Permission::PERMISSION_MANAGE_OWN_DELIVERY_METHODS,
            Permission::PERMISSION_VIEW_OWN_DELIVERY_METHODS,

            Permission::PERMISSION_MANAGE_OWN_GUARANTIES,
            Permission::PERMISSION_VIEW_OWN_GUARANTIES,

            Permission::PERMISSION_MANAGE_OWN_ORDERS,
            Permission::PERMISSION_VIEW_OWN_ORDERS,
        ],

    ];

    public function getNameAttribute()
    {
        return Attribute::make(function () {
            return trans($this->name);
        });
    }
}
