<?php

namespace App\Enums;

enum PermissionEnum: string
{
    case READ_DASHBOARD = 'dashboard_read';

    case CREATE_USER = 'users_create';
    case READ_USER = 'users_read';
    case UPDATE_USER = 'users_update';
    case DELETE_USER = 'users_delete';

    case CREATE_ROLE = 'roles_create';
    case READ_ROLE = 'roles_read';
    case UPDATE_ROLE = 'roles_update';
    case DELETE_ROLE = 'roles_delete';
    case UPDATE_ROLE_PERMISSION = 'roles_update_permission';

    public static function all(): array
    {
        return array_column(self::cases(), 'value');
    }
}
