<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => 1,
                'title' => 'user_management_access',
            ],
            [
                'id'    => 2,
                'title' => 'permission_create',
            ],
            [
                'id'    => 3,
                'title' => 'permission_edit',
            ],
            [
                'id'    => 4,
                'title' => 'permission_show',
            ],
            [
                'id'    => 5,
                'title' => 'permission_delete',
            ],
            [
                'id'    => 6,
                'title' => 'permission_access',
            ],
            [
                'id'    => 7,
                'title' => 'role_create',
            ],
            [
                'id'    => 8,
                'title' => 'role_edit',
            ],
            [
                'id'    => 9,
                'title' => 'role_show',
            ],
            [
                'id'    => 10,
                'title' => 'role_delete',
            ],
            [
                'id'    => 11,
                'title' => 'role_access',
            ],
            [
                'id'    => 12,
                'title' => 'user_create',
            ],
            [
                'id'    => 13,
                'title' => 'user_edit',
            ],
            [
                'id'    => 14,
                'title' => 'user_show',
            ],
            [
                'id'    => 15,
                'title' => 'user_delete',
            ],
            [
                'id'    => 16,
                'title' => 'user_access',
            ],
            [
                'id'    => 17,
                'title' => 'basic_c_r_m_access',
            ],
            [
                'id'    => 18,
                'title' => 'crm_status_create',
            ],
            [
                'id'    => 19,
                'title' => 'crm_status_edit',
            ],
            [
                'id'    => 20,
                'title' => 'crm_status_show',
            ],
            [
                'id'    => 21,
                'title' => 'crm_status_delete',
            ],
            [
                'id'    => 22,
                'title' => 'crm_status_access',
            ],
            [
                'id'    => 23,
                'title' => 'crm_customer_create',
            ],
            [
                'id'    => 24,
                'title' => 'crm_customer_edit',
            ],
            [
                'id'    => 25,
                'title' => 'crm_customer_show',
            ],
            [
                'id'    => 26,
                'title' => 'crm_customer_delete',
            ],
            [
                'id'    => 27,
                'title' => 'crm_customer_access',
            ],
            [
                'id'    => 28,
                'title' => 'crm_note_create',
            ],
            [
                'id'    => 29,
                'title' => 'crm_note_edit',
            ],
            [
                'id'    => 30,
                'title' => 'crm_note_show',
            ],
            [
                'id'    => 31,
                'title' => 'crm_note_delete',
            ],
            [
                'id'    => 32,
                'title' => 'crm_note_access',
            ],
            [
                'id'    => 33,
                'title' => 'crm_document_create',
            ],
            [
                'id'    => 34,
                'title' => 'crm_document_edit',
            ],
            [
                'id'    => 35,
                'title' => 'crm_document_show',
            ],
            [
                'id'    => 36,
                'title' => 'crm_document_delete',
            ],
            [
                'id'    => 37,
                'title' => 'crm_document_access',
            ],
            [
                'id'    => 38,
                'title' => 'product_management_access',
            ],
            [
                'id'    => 39,
                'title' => 'product_category_create',
            ],
            [
                'id'    => 40,
                'title' => 'product_category_edit',
            ],
            [
                'id'    => 41,
                'title' => 'product_category_show',
            ],
            [
                'id'    => 42,
                'title' => 'product_category_delete',
            ],
            [
                'id'    => 43,
                'title' => 'product_category_access',
            ],
            [
                'id'    => 44,
                'title' => 'product_tag_create',
            ],
            [
                'id'    => 45,
                'title' => 'product_tag_edit',
            ],
            [
                'id'    => 46,
                'title' => 'product_tag_show',
            ],
            [
                'id'    => 47,
                'title' => 'product_tag_delete',
            ],
            [
                'id'    => 48,
                'title' => 'product_tag_access',
            ],
            [
                'id'    => 49,
                'title' => 'product_create',
            ],
            [
                'id'    => 50,
                'title' => 'product_edit',
            ],
            [
                'id'    => 51,
                'title' => 'product_show',
            ],
            [
                'id'    => 52,
                'title' => 'product_delete',
            ],
            [
                'id'    => 53,
                'title' => 'product_access',
            ],
            [
                'id'    => 54,
                'title' => 'audit_log_show',
            ],
            [
                'id'    => 55,
                'title' => 'audit_log_access',
            ],
            [
                'id'    => 56,
                'title' => 'user_alert_create',
            ],
            [
                'id'    => 57,
                'title' => 'user_alert_delete',
            ],
            [
                'id'    => 58,
                'title' => 'user_alert_access',
            ],
            [
                'id'    => 59,
                'title' => 'page_access',
            ],
            [
                'id'    => 60,
                'title' => 'item_create',
            ],
            [
                'id'    => 61,
                'title' => 'item_edit',
            ],
            [
                'id'    => 62,
                'title' => 'item_delete',
            ],
            [
                'id'    => 63,
                'title' => 'item_access',
            ],
            [
                'id'    => 64,
                'title' => 'gabarit_create',
            ],
            [
                'id'    => 65,
                'title' => 'gabarit_edit',
            ],
            [
                'id'    => 66,
                'title' => 'gabarit_show',
            ],
            [
                'id'    => 67,
                'title' => 'gabarit_delete',
            ],
            [
                'id'    => 68,
                'title' => 'gabarit_access',
            ],
            [
                'id'    => 69,
                'title' => 'gestion_page_create',
            ],
            [
                'id'    => 70,
                'title' => 'gestion_page_edit',
            ],
            [
                'id'    => 71,
                'title' => 'gestion_page_show',
            ],
            [
                'id'    => 72,
                'title' => 'gestion_page_delete',
            ],
            [
                'id'    => 73,
                'title' => 'gestion_page_access',
            ],
            [
                'id'    => 74,
                'title' => 'config_create',
            ],
            [
                'id'    => 75,
                'title' => 'config_edit',
            ],
            [
                'id'    => 76,
                'title' => 'config_show',
            ],
            [
                'id'    => 77,
                'title' => 'config_delete',
            ],
            [
                'id'    => 78,
                'title' => 'config_access',
            ],
            [
                'id'    => 79,
                'title' => 'gestion_des_configuration_access',
            ],
            [
                'id'    => 80,
                'title' => 'menu_create',
            ],
            [
                'id'    => 81,
                'title' => 'menu_edit',
            ],
            [
                'id'    => 82,
                'title' => 'menu_show',
            ],
            [
                'id'    => 83,
                'title' => 'menu_delete',
            ],
            [
                'id'    => 84,
                'title' => 'menu_access',
            ],
            [
                'id'    => 85,
                'title' => 'commande_create',
            ],
            [
                'id'    => 86,
                'title' => 'commande_edit',
            ],
            [
                'id'    => 87,
                'title' => 'commande_show',
            ],
            [
                'id'    => 88,
                'title' => 'commande_delete',
            ],
            [
                'id'    => 89,
                'title' => 'commande_access',
            ],
            [
                'id'    => 90,
                'title' => 'profile_password_edit',
            ],
        ];

        Permission::insert($permissions);
    }
}
