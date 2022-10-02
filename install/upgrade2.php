<?php
if (defined('ROOT_PATH')) {
    if (empty($_POST['username']) || empty($_POST['password'])) {
        include ROOT_PATH.'install/upgrade1.php';
    } else {
        $error = false;
        // Database Class
        include ROOT_PATH.'install/db.php';
        // ค่าติดตั้งฐานข้อมูล
        $db_config = include ROOT_PATH.'settings/database.php';
        try {
            $db_config = $db_config['mysql'];
            // เขื่อมต่อฐานข้อมูล
            $db = new Db($db_config);
        } catch (\Exception $e) {
            $error = true;
            echo '<h2>ความผิดพลาดในการเชื่อมต่อกับฐานข้อมูล</h2>';
            echo '<p class=warning>ไม่สามารถเชื่อมต่อกับฐานข้อมูลของคุณได้ในขณะนี้</p>';
            echo '<p>อาจเป็นไปได้ว่า</p>';
            echo '<ol>';
            echo '<li>เซิร์ฟเวอร์ของฐานข้อมูลของคุณไม่สามารถใช้งานได้ในขณะนี้</li>';
            echo '<li>ค่ากำหนดของฐานข้อมูลไม่ถูกต้อง (ตรวจสอบไฟล์ settings/database.php)</li>';
            echo '<li>ไม่พบฐานข้อมูลที่ต้องการติดตั้ง กรุณาสร้างฐานข้อมูลก่อน หรือใช้ฐานข้อมูลที่มีอยู่แล้ว</li>';
            echo '<li class="incorrect">'.$e->getMessage().'</li>';
            echo '</ol>';
            echo '<p>หากคุณไม่สามารถดำเนินการแก้ไขข้อผิดพลาดด้วยตัวของคุณเองได้ ให้ติดต่อผู้ดูแลระบบเพื่อขอข้อมูลที่ถูกต้อง หรือ ลองติดตั้งใหม่</p>';
            echo '<p><a href="index.php?step=1" class="button large pink">กลับไปลองใหม่</a></p>';
        }
        if (!$error) {
            // เชื่อมต่อฐานข้อมูลสำเร็จ
            $content = array('<li class="correct">เชื่อมต่อฐานข้อมูลสำเร็จ</li>');
            try {
                // ตาราง user
                $table = $db_config['prefix'].'_user';
                if (empty($config['password_key'])) {
                    // อัปเดตข้อมูลผู้ดูแลระบบ
                    $config['password_key'] = uniqid();
                }
                // ตรวจสอบการ login
                updateAdmin($db, $table, $_POST['username'], $_POST['password'], $config['password_key']);
                if (!$db->fieldExists($table, 'social')) {
                    $db->query("ALTER TABLE `$table` CHANGE `fb` `social` TINYINT(1) NOT NULL DEFAULT 0");
                }
                if (!$db->fieldExists($table, 'country')) {
                    $db->query("ALTER TABLE `$table` ADD `country` VARCHAR(2)");
                }
                if (!$db->fieldExists($table, 'province')) {
                    $db->query("ALTER TABLE `$table` ADD `province` VARCHAR(50)");
                }
                if (!$db->fieldExists($table, 'token')) {
                    $db->query("ALTER TABLE `$table` ADD `token` VARCHAR(50) NULL AFTER `password`");
                }
                $db->query("ALTER TABLE `$table` CHANGE `address` `address` VARCHAR(150) DEFAULT NULL");
                $db->query("ALTER TABLE `$table` CHANGE `password` `password` VARCHAR(50) NOT NULL");
                $db->query("ALTER TABLE `$table` CHANGE `username` `username` VARCHAR(50) DEFAULT NULL");
                if (!$db->indexExists($table, 'phone')) {
                    $db->query("ALTER TABLE `$table` ADD INDEX (`phone`)");
                }
                if (!$db->indexExists($table, 'id_card')) {
                    $db->query("ALTER TABLE `$table` ADD INDEX (`id_card`)");
                }
                if (!$db->indexExists($table, 'token')) {
                    $db->query("ALTER TABLE `$table` ADD INDEX (`token`)");
                }
                if (!$db->fieldExists($table, 'line_uid')) {
                    $db->query("ALTER TABLE `$table` ADD `line_uid` VARCHAR(33) DEFAULT NULL");
                }
                if (!$db->fieldExists($table, 'activatecode')) {
                    $db->query("ALTER TABLE `$table` ADD `activatecode` VARCHAR(32) NOT NULL DEFAULT '', ADD INDEX (`activatecode`)");
                }
                $content[] = '<li class="correct">ปรับปรุงตาราง `'.$table.'` สำเร็จ</li>';
                // dms_meta
                $table = $db_config['prefix'].'_dms_meta';
                $table_dms = $db_config['prefix'].'_dms';
                if (!$db->tableExists($table)) {
                    $db->query("CREATE TABLE `$table` (`dms_id` int(11) NOT NULL,`type` varchar(20) COLLATE utf8_unicode_ci NOT NULL,`value` text COLLATE utf8_unicode_ci NOT NULL) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci");
                    $db->query("ALTER TABLE `$table` ADD KEY `dms_id` (`dms_id`)");
                    $db->query("INSERT INTO `$table` SELECT `id`,'department',`department` FROM `$table_dms`");
                    $db->query("INSERT INTO `$table` SELECT `id`,'cabinet',`cabinet` FROM `$table_dms`");
                    $db->query("ALTER TABLE `$table_dms` DROP `department`");
                    $db->query("ALTER TABLE `$table_dms` DROP `cabinet`");
                    $db->query("ALTER TABLE `$table_dms` ADD `url` VARCHAR(255) NOT NULL");
                }
                if (!$db->indexExists($table, 'type')) {
                    $db->query("ALTER TABLE `$table` ADD INDEX (`type`)");
                }
                $content[] = '<li class="correct">ปรับปรุงตาราง `'.$table.'` สำเร็จ</li>';
                $table = $db_config['prefix'].'_dms_download';
                if (!$db->indexExists($table, 'dms_id')) {
                    $db->query("ALTER TABLE `$table` ADD INDEX (`dms_id`)");
                }
                if (!$db->indexExists($table, 'member_id')) {
                    $db->query("ALTER TABLE `$table` ADD INDEX (`member_id`)");
                }
                $content[] = '<li class="correct">ปรับปรุงตาราง `'.$table.'` สำเร็จ</li>';
                $table = $db_config['prefix'].'_dms_files';
                if (!$db->indexExists($table, 'dms_id')) {
                    $db->query("ALTER TABLE `$table` ADD INDEX (`dms_id`)");
                }
                $content[] = '<li class="correct">ปรับปรุงตาราง `'.$table.'` สำเร็จ</li>';
                // ตาราง category
                $table_category = $db_config['prefix'].'_category';
                $db->query("DELETE FROM `$table_category` WHERE `type` IN ('unit')");
                $db->query("ALTER TABLE `$table_category` CHANGE `category_id` `category_id` VARCHAR(10) NOT NULL DEFAULT '0'");
                $content[] = '<li class="correct">ปรับปรุงตาราง `'.$table_category.'` สำเร็จ</li>';
                // บันทึก settings/config.php
                $config['version'] = $new_config['version'];
                if (isset($new_config['default_icon'])) {
                    $config['default_icon'] = $new_config['default_icon'];
                }
                $f = save($config, ROOT_PATH.'settings/config.php');
                $content[] = '<li class="'.($f ? 'correct' : 'incorrect').'">บันทึก <b>config.php</b> ...</li>';
                // นำเข้าภาษา
                include ROOT_PATH.'install/language.php';
            } catch (\PDOException $e) {
                $content[] = '<li class="incorrect">'.$e->getMessage().'</li>';
                $error = true;
            } catch (\Exception $e) {
                $content[] = '<li class="incorrect">'.$e->getMessage().'</li>';
                $error = true;
            }
            if (!$error) {
                echo '<h2>ปรับรุ่นเรียบร้อย</h2>';
                echo '<p>การปรับรุ่นได้ดำเนินการเสร็จเรียบร้อยแล้ว หากคุณต้องการความช่วยเหลือในการใช้งาน คุณสามารถ ติดต่อสอบถามได้ที่ <a href="https://www.kotchasan.com" target="_blank">https://www.kotchasan.com</a></p>';
                echo '<ul>'.implode('', $content).'</ul>';
                echo '<p class=warning>กรุณาลบไดเร็คทอรี่ <em>install/</em> ออกจาก Server ของคุณ</p>';
                echo '<p>คุณควรปรับ chmod ให้ไดเร็คทอรี่ <em>datas/</em> และ <em>settings/</em> (และไดเร็คทอรี่อื่นๆที่คุณได้ปรับ chmod ไว้ก่อนการปรับรุ่น) ให้เป็น 644 ก่อนดำเนินการต่อ (ถ้าคุณได้ทำการปรับ chmod ไว้ด้วยตัวเอง)</p>';
                echo '<p><a href="../index.php" class="button large admin">เข้าระบบ</a></p>';
            } else {
                echo '<h2>ปรับรุ่นไม่สำเร็จ</h2>';
                echo '<p>การปรับรุ่นยังไม่สมบูรณ์ ลองตรวจสอบข้อผิดพลาดที่เกิดขึ้นและแก้ไขดู หากคุณต้องการความช่วยเหลือการติดตั้ง คุณสามารถ ติดต่อสอบถามได้ที่ <a href="https://www.kotchasan.com" target="_blank">https://www.kotchasan.com</a></p>';
                echo '<ul>'.implode('', $content).'</ul>';
                echo '<p><a href="." class="button large admin">ลองใหม่</a></p>';
            }
        }
    }
}

/**
 * @param Db $db
 * @param string $table_name
 * @param string $username
 * @param string $password
 * @param string $password_key
 */
function updateAdmin($db, $table_name, $username, $password, $password_key)
{
    include ROOT_PATH.'Kotchasan/Text.php';
    $username = \Kotchasan\Text::username($username);
    $password = \Kotchasan\Text::password($password);
    $result = $db->first($table_name, array(
        'username' => $username,
        'status' => 1
    ));
    if (!$result || $result->id > 1) {
        throw new \Exception('ชื่อผู้ใช้ไม่ถูกต้อง หรือไม่ใช่ผู้ดูแลระบบสูงสุด');
    } elseif ($result->password === sha1($password.$result->salt)) {
        // password เวอร์ชั่นเก่า
        $password = sha1($password_key.$password.$result->salt);
        $db->update($table_name, array('id' => $result->id), array('password' => $password));
    } elseif ($result->password != sha1($password_key.$password.$result->salt)) {
        throw new \Exception('รหัสผ่านไม่ถูกต้อง');
    }
}

/**
 * @param array $config
 * @param string $file
 */
function save($config, $file)
{
    $f = @fopen($file, 'wb');
    if ($f !== false) {
        if (!preg_match('/^.*\/([^\/]+)\.php?/', $file, $match)) {
            $match[1] = 'config';
        }
        fwrite($f, '<'."?php\n/* $match[1].php */\nreturn ".var_export((array) $config, true).';');
        fclose($f);
        return true;
    } else {
        return false;
    }
}
