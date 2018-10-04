<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/3
 * Time: 10:51
 */

namespace App\WebMenu;

use App\MyTrait\CompetenceTrait;
use App\MyCommon\Menu;

class MenuPower
{
    use CompetenceTrait;

    private $menuHtml = ''; // 菜单html

    private $menu = array(); // 菜单数组

    private $menuUrl = array(); // 菜单路径地址

    private $menuIconClass = array(); // 菜单图标样式

    private $url = ''; // 当前地址

    private $menuShowUl = false; // 当前地址

    public function __construct()
    {
        $this->menu = Menu::master;

        $this->menuUrl = Menu::masterUrl;

        $this->menuIconClass = Menu::masterIconClass;

        $this->checkCompetence();

        $this->setShowUl();

        $this->install();
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
    /*
     * 判断权限
     * */
    public function checkCompetence()
    {
        $admin = $this->getAdmin();
        if ($admin->roles->competence == '*') {
            return true;
        }
        $comIdStr = trim($admin->roles['competence'], ',');
        $competence = $this->getCompetenceList($comIdStr)->toArray();
        $competence = array_column($competence, 'competence');
        $competence = ',' . implode(',', $competence) . ',';
        $this->menu = $this->getMenu($competence, $this->menu);
    }
    /*
     * 递归获取左侧菜单
     * */
    public function getMenu($competence, $array = array(), $menu = 'submenu')
    {
        $arr = array();
        foreach ($array as $key => $val) {
            if (strpos($competence,',' . $key . ',', 0) !== false || $competence == '*') {
                if (is_array($val)) {
                    $arr[$key] = array('name' => $val['name'], 'submenu' => array());
                    $arr[$key]['submenu'] = $this->getMenu($competence, $val[$menu], $menu);
                } else {
                    $arr[$key] = $val;
                }
            }
        }
        return $arr;
    }
    /*
     * 菜单初始化
     * */
    public function install()
    {
        $html = '';
        foreach ($this->menu as $key => $value) {
            $this->menuShowUl = false;
            $childHtml = '';
            if (is_array($value)) {
                $childHtml = $this->setChildHtml($value['submenu']);
            }
            $html .= $this->setMenuHtml($value['name'], $key, $childHtml);
        }
        return $this->menuHtml = $html;
    }

    /*
     * 是否设置参数
     * */
    public function is_set(String $string, String $default = '')
    {
        return isset($string) ? $string : $default;
    }
    /*
     * 是否设置参数
     * */
    public function issetMenuUrl(String $string, String $default = '')
    {
        return isset($this->menuUrl[$string]) ? '/'.$this->menuUrl[$string] : $default;
    }
    /*
    * 是否设置参数
    * */
    public function issetMenuIconClass(String $string, String $default = '')
    {
        return isset($this->menuIconClass[$string]) ? $this->menuIconClass[$string] : $default;
    }
    /*
     * 获取地址展示二级菜单
     * */
    public function setShowUl()
    {
        $url = \Request::getRequestUri();
        $this->url = trim($url,'/');
    }
    /*
     * 生成子菜单的html
     * */
    public function setChildHtml($submenu = array())
    {
        $startHtml = '<ul class="tpl-left-nav-sub-menu">';
        $html = '';
        foreach ($submenu as $key => $value) {
            $html .= '<li>';
            $html .= '<a href="' . $this->issetMenuUrl($key, 'javascript:;') . '"';
            if (strpos('/' . $this->url, $this->issetMenuUrl($key, 'javascript:;'), 0) !== false) {
                $startHtml = '<ul class="tpl-left-nav-sub-menu" style="display: block;">';
                $this->menuShowUl = true;
                $html .= ' class="active" ';
            }
            $html .= '>';
//            $html .= '<i class="'. $this->issetMenuIconClass($key) .'"></i>';
            $html .= '<i class="am-icon-angle-right"></i>';
            $html .= '<span>'. $value .'</span>';
//            $html .= '<i class="am-icon-star tpl-left-nav-content-ico am-fr am-margin-right"></i>';
            $html .= '</a>';
            $html .= '</li>';
        }
        $html .= '</ul>';
        return $startHtml . $html;
    }
    /*
     * 生成菜单html
     * */
    public function setMenuHtml($name, $enName, $childHtml = '')
    {
        $html = '';
        $html .= '<li class="tpl-left-nav-item">';
        $html .= '<a href="'. $this->issetMenuUrl($enName, 'javascript:;') .'" class="nav-link tpl-left-nav-link-list">';
        $html .= '<i class="'. $this->issetMenuIconClass($enName) .'"></i>';
        $html .= '<span>'. $name .'</span>';
        $html .= '<i class="am-icon-angle-right tpl-left-nav-more-ico am-fr am-margin-right';
        if ($this->menuShowUl) {
            $html .= ' tpl-left-nav-more-ico-rotate';
        }
        $html .= '"></i>';
        $html .= '</a>';
        $html .= $childHtml;
        $html .= '</li>';
        return $html;
    }
    /*
     * 返回管理员信息
     * */
    public function getAdmin()
    {
        return session('admin');
    }
}