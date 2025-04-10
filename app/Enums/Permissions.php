<?php

namespace App\Enums;

enum Permissions: string
{
    case Can_View_Roles = 'مشاهده لیست نقش ها';
    case Can_Create_Roles = 'افزودن نقش';
    case Can_Edit_Roles = 'ویرایش نقش';
    case Can_Delete_Roles = 'حذف نقش';

    public static function all(): array
    {
        return self::cases();
    }
}
