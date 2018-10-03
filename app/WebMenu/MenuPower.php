<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/3
 * Time: 10:51
 */

namespace App\WebMenu;

use App\MyCommon\Menu;

class MenuPower
{
    private $menuHtml = ''; // 菜单html

    private $menu = array(); // 菜单数组

    private $menuUrl = array(); // 菜单路径地址

    public function __construct()
    {
        $this->menu = Menu::master;

        $this->menuUrl = Menu::masterUrl;
    }

    public function render()
    {
        return $this->menuHtml;
    }

    public function __toString()
    {
        // TODO: Implement __toString() method.
        return $this->render();
    }


}