<?php
/**
 * @filesource modules/index/controllers/loginpage.php
 *
 * @copyright 2016 Goragod.com
 * @license http://www.kotchasan.com/license/
 *
 * @see http://www.kotchasan.com/
 */

namespace Index\Loginpage;

use Gcms\Login;
use Kotchasan\Html;
use Kotchasan\Http\Request;
use Kotchasan\Language;

/**
 * module=index-loginpage
 *
 * @author Goragod Wiriya <admin@goragod.com>
 *
 * @since 1.0
 */
class Controller extends \Gcms\Controller
{
    /**
     * ตั้งค่าหน้า login (loginpage.php)
     *
     * @param Request $request
     *
     * @return string
     */
    public function render(Request $request)
    {
        // ข้อความ title bar
        $this->title = Language::trans('{LNG_Settings} {LNG_Login page}');
        // เลือกเมนู
        $this->menu = 'settings';
        // สมาชิก
        $login = Login::isMember();
        // สามารถแก้ไขข้อความได้
        if (Login::checkPermission($login, 'can_edit_loginpage')) {
            // แสดงผล
            $section = Html::create('section', array(
                'class' => 'content_bg'
            ));
            // breadcrumbs
            $breadcrumbs = $section->add('div', array(
                'class' => 'breadcrumbs'
            ));
            $ul = $breadcrumbs->add('ul');
            $ul->appendChild('<li><span class="icon-calendar">{LNG_Settings}</span></li>');
            $ul->appendChild('<li><span>{LNG_Login page}</span></li>');
            $section->add('header', array(
                'innerHTML' => '<h2 class="icon-settings">'.$this->title.'</h2>'
            ));
            // menu
            $section->appendChild(\Index\Tabmenus\View::render($request, 'settings', 'loginpage'));
            // แสดงฟอร์ม
            $section->appendChild(\Index\Loginpage\View::create()->render());
            // คืนค่า HTML
            return $section->render();
        }
        // 404
        return \Index\Error\Controller::execute($this, $request->getUri());
    }
}
