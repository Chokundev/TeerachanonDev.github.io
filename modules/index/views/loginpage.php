<?php
/**
 * @filesource modules/index/views/loginpage.php
 *
 * @copyright 2016 Goragod.com
 * @license http://www.kotchasan.com/license/
 *
 * @see http://www.kotchasan.com/
 */

namespace Index\Loginpage;

use Kotchasan\Html;
use Kotchasan\Language;

/**
 * module=index-loginpage
 *
 * @author Goragod Wiriya <admin@goragod.com>
 *
 * @since 1.0
 */
class View extends \Gcms\View
{
    /**
     * ฟอร์มตั้งค่า
     *
     * @return string
     */
    public function render()
    {
        $form = Html::create('form', array(
            'id' => 'setup_frm',
            'class' => 'setup_frm',
            'autocomplete' => 'off',
            'action' => 'index.php/index/model/loginpage/submit',
            'onsubmit' => 'doFormSubmit',
            'ajax' => true,
            'token' => true
        ));
        $fieldset = $form->add('fieldset', array(
            'titleClass' => 'icon-signin',
            'title' => '{LNG_Login page}'
        ));
        // login_show_title_logo
        $fieldset->add('checkbox', array(
            'id' => 'login_show_title_logo',
            'itemClass' => 'subitem',
            'label' => '{LNG_Show web title with logo}',
            'value' => 1,
            'checked' => !empty(self::$cfg->login_show_title_logo)
        ));
        // new_line_title
        $fieldset->add('checkbox', array(
            'id' => 'new_line_title',
            'itemClass' => 'subitem',
            'label' => '{LNG_Start a new line with the web name}',
            'value' => 1,
            'checked' => !empty(self::$cfg->new_line_title)
        ));
        // login_header_color
        $fieldset->add('color', array(
            'id' => 'login_header_color',
            'labelClass' => 'g-input icon-color',
            'itemClass' => 'item',
            'label' => '{LNG_Header font color}',
            'value' => self::$cfg->login_header_color
        ));
        // login_footer_color
        $fieldset->add('color', array(
            'id' => 'login_footer_color',
            'labelClass' => 'g-input icon-color',
            'itemClass' => 'item',
            'label' => '{LNG_Footer font color}',
            'value' => self::$cfg->login_footer_color
        ));
        $fieldset = $form->add('fieldset', array(
            'titleClass' => 'icon-comments',
            'title' => '{LNG_Message displayed on login page}'
        ));
        // login_message
        $fieldset->add('textarea', array(
            'id' => 'login_message',
            'labelClass' => 'g-input icon-file',
            'itemClass' => 'item',
            'label' => '{LNG_Message}',
            'rows' => 5,
            'value' => isset(self::$cfg->login_message) ? self::$cfg->login_message : ''
        ));
        // login_message_style
        $fieldset->add('select', array(
            'id' => 'login_message_style',
            'labelClass' => 'g-input icon-color',
            'itemClass' => 'item',
            'label' => '{LNG_Style}',
            'options' => array('hidden' => Language::find('BOOLEANS', 'Disabled', 0), 'tip' => 'Tip', 'warning' => 'Warning', 'message' => 'Message'),
            'value' => self::$cfg->login_message_style
        ));
        $fieldset = $form->add('fieldset', array(
            'class' => 'submit'
        ));
        // submit
        $fieldset->add('submit', array(
            'class' => 'button save large icon-save',
            'value' => '{LNG_Save}'
        ));
        // คืนค่า HTML
        return $form->render();
    }
}
