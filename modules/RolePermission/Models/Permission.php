<?php

namespace Modules\RolePermission\Models;

use Illuminate\Support\Str;
use Modules\User\Models\User;
use Spatie\Permission\Models\Permission as SpatiePermission;

class Permission extends SpatiePermission
{

    protected $appends = ['model', 'action'];

    const PERMISSION_MANAGE_ROLE_PERMISSIONS = 'manage role permissions';

    const PERMISSION_VIEW_ROLE_PERMISSIONS = 'view role permissions';


    /** @model User */
    const PERMISSION_MANAGE_MANAGERS = 'manage managers';
    const PERMISSION_VIEW_MANAGERS = 'view managers';
    const PERMISSION_MANAGE_VENDORS = 'manage vendors';
    const PERMISSION_VIEW_VENDORS = 'view vendors';
    const PERMISSION_MANAGE_CUSTOMERS = 'manage customers';
    const PERMISSION_VIEW_CUSTOMERS = 'view customers';
    const PERMISSION_VIEW_OWN_CUSTOMERS = 'view own customers';
    //Manage
    const PERMISSION_MANAGE_OWN_PROFILE = 'view manage own profile';

    /** @model Discount */
    const PERMISSION_MANAGE_DISCOUNTS = 'manage discounts';
    const PERMISSION_VIEW_DISCOUNTS = 'view discounts';
    const PERMISSION_MANAGE_OWN_DISCOUNTS = 'manage own discounts';
    const PERMISSION_VIEW_OWN_DISCOUNTS = 'view own discounts';


    /** @model Category */
    const PERMISSION_MANAGE_PRODUCT_CATEGORIES = 'manage product categories';
    const PERMISSION_VIEW_PRODUCT_CATEGORIES = 'view product categories';

    const PERMISSION_MANAGE_POST_CATEGORIES = 'manage post categories';
    const PERMISSION_VIEW_POST_CATEGORIES = 'manage post categories';


    /** @model Banner */
    const PERMISSION_MANAGE_BANNERS = 'manage banners';
    const PERMISSION_VIEW_BANNERS = 'view banners';

    /** @model Comment */
    const PERMISSION_MANAGE_COMMENTS = 'manage comments';
    const PERMISSION_VIEW_COMMENTS = 'view comments';
    const PERMISSION_MANAGE_OWN_COMMENTS = 'manage own comments';
    const PERMISSION_VIEW_OWN_COMMENTS = 'view own comments';

    /** @model Faq */
    const PERMISSION_MANAGE_FAQS = 'manage faqs';
    const PERMISSION_VIEW_FAQS = 'view faqs';

    /** @model Menu */
    const PERMISSION_MANAGE_MENUS = 'manage menus';
    const PERMISSION_VIEW_MENUS = 'view menus';

    /** @model Page */
    const PERMISSION_MANAGE_PAGES = 'manage pages';
    const PERMISSION_VIEW_PAGES = 'view pages';

    /** @model Post */
    const PERMISSION_MANAGE_POSTS = 'manage posts';
    const PERMISSION_VIEW_POSTS = 'view posts';


    /** @module Feature */
    const PERMISSION_MANAGE_FEATURES = 'manage features';
    const PERMISSION_VIEW_FEATURES = 'view features';


    /** @model Brand */
    const PERMISSION_MANAGE_BRANDS = 'manage brands';
    const PERMISSION_VIEW_BRANDS = 'view brands';

    /** @model DeliveryMethod */
    const PERMISSION_MANAGE_DELIVERY_METHODS = 'manage delivery methods';
    const PERMISSION_VIEW_DELIVERY_METHODS = 'view delivery methods';

    const PERMISSION_MANAGE_OWN_DELIVERY_METHODS = 'manage own delivery methods';
    const PERMISSION_VIEW_OWN_DELIVERY_METHODS = 'view own delivery methods';

    /** @model Guaranty */
    const PERMISSION_MANAGE_GUARANTIES = 'manage guaranties';
    const PERMISSION_VIEW_GUARANTIES = 'view guaranties';

    const PERMISSION_MANAGE_OWN_GUARANTIES = 'manage own guaranties';
    const PERMISSION_VIEW_OWN_GUARANTIES = 'view own guaranties';


    /** @model Order */
    const PERMISSION_MANAGE_ORDERS = 'manage orders';
    const PERMISSION_VIEW_ORDERS = 'view orders';

    const PERMISSION_MANAGE_OWN_ORDERS = 'manage own orders';
    const PERMISSION_VIEW_OWN_ORDERS = 'view own orders';

    /** @model Product */
    const PERMISSION_MANAGE_PRODUCTS = 'manage products';
    const PERMISSION_VIEW_PRODUCTS = 'view products';

    const PERMISSION_MANAGE_OWN_PRODUCTS = 'manage own products';
    const PERMISSION_VIEW_OWN_PRODUCTS = 'view own products';

    /** @model Notification */
    const PERMISSION_MANAGE_NOTIFICATIONS = 'manage notifications';
    const PERMISSION_VIEW_NOTIFICATIONS = 'view notifications';

    /** @model Post */
    const PERMISSION_MANAGE_PAYMENTS = 'manage payments';
    const PERMISSION_VIEW_PAYMENTS = 'view payments';

    const PERMISSION_MANAGE_OWN_PAYMENTS = 'manage own payments';
    const PERMISSION_VIEW_OWN_PAYMENTS = 'view own payments';

    /** @model Post */
    const PERMISSION_MANAGE_SETTINGS = 'manage settings';
    const PERMISSION_VIEW_SETTINGS = 'view settings';

    /** @model Ticket */
    const PERMISSION_MANAGE_TICKETS = 'manage tickets';
    const PERMISSION_VIEW_TICKETS = 'view tickets';

    const PERMISSION_MANAGE_OWN_TICKETS = 'manage own tickets';
    const PERMISSION_VIEW_OWN_TICKETS = 'view own tickets';


    /** @model Invoice */
    const PERMISSION_MANAGE_INVOICES = 'manage invoices';

    const PERMISSION_VIEW_INVOICES = 'view invoices';

    const PERMISSION_MANAGE_OWN_INVOICES = 'manage own invoices';
    const PERMISSION_VIEW_OWN_INVOICES = 'view own invoices';

    /** model permission */
    public static array $permissions = [
        self::PERMISSION_SUPER_ADMIN,
        self::PERMISSION_MANAGER,

        self::PERMISSION_MANAGE_POST_CATEGORIES,
        self::PERMISSION_MANAGE_PRODUCT_CATEGORIES,
        self::PERMISSION_VIEW_POST_CATEGORIES,
        self::PERMISSION_VIEW_PRODUCT_CATEGORIES,

        self::PERMISSION_MANAGE_ROLE_PERMISSIONS,
        self::PERMISSION_VIEW_ROLE_PERMISSIONS,



        self::PERMISSION_MANAGE_DISCOUNTS,
        self::PERMISSION_VIEW_DISCOUNTS,
        self::PERMISSION_MANAGE_OWN_DISCOUNTS,
        self::PERMISSION_VIEW_OWN_DISCOUNTS,

        self::PERMISSION_MANAGE_INVOICES,
        self::PERMISSION_VIEW_INVOICES,
        self::PERMISSION_MANAGE_OWN_INVOICES,
        self::PERMISSION_VIEW_OWN_INVOICES,

        self::PERMISSION_MANAGE_TICKETS,
        self::PERMISSION_VIEW_TICKETS,
        self::PERMISSION_MANAGE_OWN_TICKETS,
        self::PERMISSION_VIEW_OWN_TICKETS,

        self::PERMISSION_MANAGE_COMMENTS,
        self::PERMISSION_VIEW_COMMENTS,
        self::PERMISSION_MANAGE_OWN_COMMENTS,
        self::PERMISSION_VIEW_OWN_COMMENTS,

        self::PERMISSION_MANAGE_PAYMENTS,
        self::PERMISSION_VIEW_PAYMENTS,
        self::PERMISSION_MANAGE_OWN_PAYMENTS,
        self::PERMISSION_VIEW_OWN_PAYMENTS,

        self::PERMISSION_MANAGE_MANAGERS,
        self::PERMISSION_VIEW_MANAGERS,
        self::PERMISSION_MANAGE_VENDORS,
        self::PERMISSION_VIEW_VENDORS,
        self::PERMISSION_MANAGE_CUSTOMERS,
        self::PERMISSION_VIEW_CUSTOMERS,

        self::PERMISSION_MANAGE_OWN_PROFILE,

        self::PERMISSION_MANAGE_BANNERS,
        self::PERMISSION_VIEW_BANNERS,

        self::PERMISSION_MANAGE_FAQS,
        self::PERMISSION_VIEW_FAQS,

        self::PERMISSION_MANAGE_MENUS,
        self::PERMISSION_VIEW_MENUS,

        self::PERMISSION_MANAGE_PAGES,
        self::PERMISSION_VIEW_PAGES,

        self::PERMISSION_MANAGE_POSTS,
        self::PERMISSION_VIEW_POSTS,

        self::PERMISSION_MANAGE_FEATURES,
        self::PERMISSION_VIEW_FEATURES,

        self::PERMISSION_MANAGE_BRANDS,
        self::PERMISSION_VIEW_BRANDS,

        self::PERMISSION_MANAGE_DELIVERY_METHODS,
        self::PERMISSION_VIEW_DELIVERY_METHODS,
        self::PERMISSION_MANAGE_OWN_DELIVERY_METHODS,
        self::PERMISSION_VIEW_OWN_DELIVERY_METHODS,

        self::PERMISSION_MANAGE_GUARANTIES,
        self::PERMISSION_VIEW_GUARANTIES,
        self::PERMISSION_MANAGE_OWN_GUARANTIES,
        self::PERMISSION_VIEW_OWN_GUARANTIES,

        self::PERMISSION_MANAGE_ORDERS,
        self::PERMISSION_VIEW_ORDERS,
        self::PERMISSION_MANAGE_OWN_ORDERS,
        self::PERMISSION_VIEW_OWN_ORDERS,

        self::PERMISSION_MANAGE_PRODUCTS,
        self::PERMISSION_VIEW_PRODUCTS,
        self::PERMISSION_MANAGE_OWN_PRODUCTS,
        self::PERMISSION_VIEW_OWN_PRODUCTS,

        self::PERMISSION_MANAGE_NOTIFICATIONS,
        self::PERMISSION_VIEW_NOTIFICATIONS,

        self::PERMISSION_MANAGE_SETTINGS,
        self::PERMISSION_VIEW_SETTINGS,

    ];

    const PERMISSION_SUPER_ADMIN = 'super admin';
    const PERMISSION_MANAGER = 'manager';

    public static function getPermissionsByModels()
    {
        $permissions = [];
        foreach (self::$permissions as $permission) {
            $arrayOfWords = explode(' ', $permission);
            $lastWordOfString = array_pop($arrayOfWords);
            $permissions[Str::singular($lastWordOfString)] =
                implode(' ', $arrayOfWords);
        }

        return $permissions;
    }

    public function getModelAttribute()
    {
        $arrayOfWords = explode(' ', $this->name);

        return Str::singular(last($arrayOfWords));
    }

    public function getActionAttribute()
    {
        $arrayOfWords = explode(' ', $this->name);
        array_pop($arrayOfWords);

        return implode(' ', $arrayOfWords);
    }
}
