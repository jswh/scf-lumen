<?php
namespace Database\Seeders;

use Encore\Admin\Models\Menu;
use Illuminate\Database\Seeder;

class AdminTablesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // base tables
        Menu::truncate();
        Menu::insert(
            [
                [
                    "parent_id" => 0,
                    "order" => 1,
                    "title" => "Dashboard",
                    "icon" => "fas fa-chart-pie",
                    "uri" => "/",
                    "group" => NULL
                ],
                [
                    "parent_id" => 0,
                    "order" => 11,
                    "title" => "Admin",
                    "icon" => "fas fa-user-secret",
                    "uri" => NULL,
                    "group" => NULL
                ],
                [
                    "parent_id" => 2,
                    "order" => 13,
                    "title" => "Users",
                    "icon" => "fas fa-user",
                    "uri" => "auth/users",
                    "group" => NULL
                ],
                [
                    "parent_id" => 2,
                    "order" => 14,
                    "title" => "Menu",
                    "icon" => "fas fa-tree",
                    "uri" => "auth/menu",
                    "group" => NULL
                ],
                [
                    "parent_id" => 2,
                    "order" => 12,
                    "title" => "ProductUnits",
                    "icon" => "fab fa-codiepie",
                    "uri" => "product-units",
                    "group" => NULL
                ],
                [
                    "parent_id" => 10,
                    "order" => 5,
                    "title" => "SKU管理",
                    "icon" => "fas fa-align-center",
                    "uri" => "stock-units",
                    "group" => NULL
                ],
                [
                    "parent_id" => 0,
                    "order" => 4,
                    "title" => "供应链",
                    "icon" => "fas fa-ambulance",
                    "uri" => NULL,
                    "group" => NULL
                ],
                [
                    "parent_id" => 10,
                    "order" => 6,
                    "title" => "供应商",
                    "icon" => "fas fa-bars",
                    "uri" => "suppliers",
                    "group" => NULL
                ],
                [
                    "parent_id" => 10,
                    "order" => 7,
                    "title" => "采购单",
                    "icon" => "fas fa-shopping-cart",
                    "uri" => "purchase-orders",
                    "group" => NULL
                ],
                [
                    "parent_id" => 0,
                    "order" => 2,
                    "title" => "销售",
                    "icon" => "fab fa-sellsy",
                    "uri" => NULL,
                    "group" => NULL
                ],
                [
                    "parent_id" => 13,
                    "order" => 3,
                    "title" => "订单",
                    "icon" => "fab fa-first-order",
                    "uri" => "/shop-orders",
                    "group" => NULL
                ],
                [
                    "parent_id" => 10,
                    "order" => 8,
                    "title" => "仓库管理",
                    "icon" => "fas fa-warehouse",
                    "uri" => "/warehouses",
                    "group" => NULL
                ],
                [
                    "parent_id" => 17,
                    "order" => 10,
                    "title" => "省市区",
                    "icon" => "fas fa-city",
                    "uri" => "china-areas",
                    "group" => NULL
                ],
                [
                    "parent_id" => 0,
                    "order" => 9,
                    "title" => "其他",
                    "icon" => "fas fa-circle",
                    "uri" => NULL,
                    "group" => NULL
                ]
            ]
        );
        // finish
    }
}
