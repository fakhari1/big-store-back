<?php

namespace Modules\RolePermission\Models;

use Illuminate\Support\Str;
use Modules\User\Models\User;
use Spatie\Permission\Models\Permission as SpatiePermission;

class Permission extends SpatiePermission
{
    const PERMISSION_MANAGE_ROLE_PERMISSIONS = 'مدیریت نقش کاربری و مجوز ها';

    const PERMISSION_VIEW_ROLE_PERMISSIONS = 'مشاهده نقش کاربری و مجوز ها';


    /** @model User */
    const PERMISSION_MANAGE_MANAGERS = 'مدیریت مدیران';
    const PERMISSION_VIEW_MANAGERS = 'مشاهده مدیران';
    const PERMISSION_MANAGE_VENDORS = 'مدیریت فروشندگان';
    const PERMISSION_VIEW_VENDORS = 'مشاهده فروشندگان';
    const PERMISSION_MANAGE_CUSTOMERS = 'مدیریت مشتریان';
    const PERMISSION_VIEW_CUSTOMERS = 'مشاهده مشتریان';
    const PERMISSION_VIEW_OWN_CUSTOMERS = 'مشاهده مشتریان خود';
    //Manage
    const PERMISSION_MANAGE_OWN_PROFILE = 'مدیریت پروفایل خود';

    /** @model Discount */
    const PERMISSION_MANAGE_DISCOUNTS = 'مدیریت تخفیف ها';
    const PERMISSION_VIEW_DISCOUNTS = 'مشاهده تخفیف ها';
    const PERMISSION_MANAGE_OWN_DISCOUNTS = 'مدیریت تخفیف های خود';
    const PERMISSION_VIEW_OWN_DISCOUNTS = 'مشاهده تخفیف های خود';


    /** @model Category */
    const PERMISSION_MANAGE_PRODUCT_CATEGORIES = 'مدیریت دسته بندی محصول';
    const PERMISSION_VIEW_PRODUCT_CATEGORIES = 'مشاهده دسته بندی محصول';

    const PERMISSION_MANAGE_POST_CATEGORIES = 'مدیریت دسته بندی محتوا';
    const PERMISSION_VIEW_POST_CATEGORIES = 'مدیریت دسته بندی محتوا';


    /** @model Banner */
    const PERMISSION_MANAGE_BANNERS = 'مدیریت بنرها';
    const PERMISSION_VIEW_BANNERS = 'مشاهده بنرها';

    /** @model Comment */
    const PERMISSION_MANAGE_COMMENTS = 'مدیریت نظرات';
    const PERMISSION_VIEW_COMMENTS = 'مشاهده نظرات';
    const PERMISSION_MANAGE_OWN_COMMENTS = 'مدیریت نظرات خود';
    const PERMISSION_VIEW_OWN_COMMENTS = 'مشاهده نظرات خود';

    /** @model Faq */
    const PERMISSION_MANAGE_FAQS = 'مدیریت سوالات متداول';
    const PERMISSION_VIEW_FAQS = 'مشاهده سوالات متداول';

    /** @model Menu */
    const PERMISSION_MANAGE_MENUS = 'مدیریت منوها';
    const PERMISSION_VIEW_MENUS = 'مشاهده منوها';

    /** @model Page */
    const PERMISSION_MANAGE_PAGES = 'مدیریت صفحات';
    const PERMISSION_VIEW_PAGES = 'مشاهده صفحات';

    /** @model Post */
    const PERMISSION_MANAGE_POSTS = 'مدیریت مقالات';
    const PERMISSION_VIEW_POSTS = 'مشاهده مقالات';


    /** @module Feature */
    const PERMISSION_MANAGE_FEATURES = 'مدیریت ویژگی های فروشگاه';
    const PERMISSION_VIEW_FEATURES = 'مشاهده ویژگی های فروشگاه';


    /** @model Brand */
    const PERMISSION_MANAGE_BRANDS = 'مدیریت برندها';
    const PERMISSION_VIEW_BRANDS = 'مشاهده برندها';

    /** @model DeliveryMethod */
    const PERMISSION_MANAGE_DELIVERY_METHODS = 'مدیریت روش های ارسال';
    const PERMISSION_VIEW_DELIVERY_METHODS = 'مشاهده روش های ارسال';

    const PERMISSION_MANAGE_OWN_DELIVERY_METHODS = 'مدیریت روش های ارسال خود';
    const PERMISSION_VIEW_OWN_DELIVERY_METHODS = 'مشاهده روش های ارسال خود';

    /** @model Guaranty */
    const PERMISSION_MANAGE_GUARANTIES = 'مدیریت گارانتی ها';
    const PERMISSION_VIEW_GUARANTIES = 'مشاهده گارانتی ها';

    const PERMISSION_MANAGE_OWN_GUARANTIES = 'مدیریت گارانتی های خود';
    const PERMISSION_VIEW_OWN_GUARANTIES = 'مشاهده گارانتی های خود';


    /** @model Order */
    const PERMISSION_MANAGE_ORDERS = 'مدیریت سفارشات';
    const PERMISSION_VIEW_ORDERS = 'مشاهده سفارشات';

    const PERMISSION_MANAGE_OWN_ORDERS = 'مدیریت سفارشات خود';
    const PERMISSION_VIEW_OWN_ORDERS = 'مشاهده سفارشات خود';

    /** @model Product */
    const PERMISSION_MANAGE_PRODUCTS = 'مدیریت محصولات';
    const PERMISSION_VIEW_PRODUCTS = 'مشاهده محصولات';

    const PERMISSION_MANAGE_OWN_PRODUCTS = 'مدیریت محصولات خود';
    const PERMISSION_VIEW_OWN_PRODUCTS = 'مشاهده محصولات خود';

    /** @model Notification */
    const PERMISSION_MANAGE_NOTIFICATIONS = 'مدیریت اطلاع رسانی ها';
    const PERMISSION_VIEW_NOTIFICATIONS = 'مشاهده اطلاع رسانی ها';

    /** @model Post */
    const PERMISSION_MANAGE_PAYMENTS = 'مدیریت پرداخت ها';
    const PERMISSION_VIEW_PAYMENTS = 'مشاهده پرداخت ها';

    const PERMISSION_MANAGE_OWN_PAYMENTS = 'مدیریت پرداخت های خود';
    const PERMISSION_VIEW_OWN_PAYMENTS = 'مشاهده پرداخت های خود';

    /** @model Post */
    const PERMISSION_MANAGE_SETTINGS = 'مدیریت تنظیمات';
    const PERMISSION_VIEW_SETTINGS = 'مشاهده تنظیمات';

    /** @model Ticket */
    const PERMISSION_MANAGE_TICKETS = 'مدیریت تیکت ها';
    const PERMISSION_VIEW_TICKETS = 'مشاهده تیکت ها';

    const PERMISSION_MANAGE_OWN_TICKETS = 'مدیریت تیکت های خود';
    const PERMISSION_VIEW_OWN_TICKETS = 'مشاهده تیکت های خود';


    /** @model Invoice */
    const PERMISSION_MANAGE_INVOICES = 'مدیریت فاکتورها';

    const PERMISSION_VIEW_INVOICES = 'مشاهده فاکتورها';

    const PERMISSION_MANAGE_OWN_INVOICES = 'مدیریت فاکتورهای خود';
    const PERMISSION_VIEW_OWN_INVOICES = 'مشاهده فاکتورهای خود';

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
        self::PERMISSION_VIEW_OWN_CUSTOMERS,

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
    const PERMISSION_SUPER_ADMIN = 'مدیریت کل فروشگاه';
    const PERMISSION_MANAGER = 'مدیر';
}
