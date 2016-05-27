<?php
namespace App\Statics;
use Symfony\Component\Yaml\Yaml;
use Cake\Utility\Inflector;
class QherpAcl
{
    public static $cache = [];
    const ANY = 'any'; // 誰でも編集可能
    const ADMINISTRATOR = 'administrator'; // 管理者権限で編集できる
    const EXECUTIVE = 'executive'; // 経営者権限で編集できる
    const SENIOR = 'senior'; // 上長権限で編集できる
    const CONSULTING = 'consulting'; // コンサルタントグループは編集できる
    const ACCOUNTANT = 'accountant'; // 経理グループは編集できる
    const MANUFACTURER = 'manufacturer'; // 制作グループは編集できる
    /**
     * check.
     */
    public static function check(array $controllerAndAction)
    {
        $controller = $controllerAndAction['controller'];
        $action = $controllerAndAction['action'];
        $acls = self::loadAclYaml();
        if (empty($acls[$controller][$action])) {
            return true;
        }
        $acl = $acls[$controller][$action];
        // ANY
        if (in_array(self::ANY, $acl)) {
            return true;
        }
        //ADMINISTRATOR
        //EXECUTIVE
        //SENIOR
        //CONSULTING
        //ACCOUNTANT
        //MANUFACTURER
        if (UserInfo::isAny($acl)) {
            return true;
        }
        return false;
    }
    /**
     * errorMessage.
     */
    public static function errorMessage(array $controllerAndAction)
    {
        $controller = $controllerAndAction['controller'];
        $action = $controllerAndAction['action'];
        $acls = self::loadAclYaml();
        if (empty($acls[$controller][$action])) {
            return;
        }
        $acl = $acls[$controller][$action];
        $acl = collection($acl)->map(function ($a) {
            return __('UserInfo '.Inflector::camelize($a));
        })->toArray();
        return __('権限がないためアクセスできません (必要な権限は以下のいずれか: {0})', implode(',', $acl));
    }
    /**
     * loadAclYaml.
     */
    public static function loadAclYaml()
    {
        if (!empty(self::$cache)) {
            return self::$cache;
        }
        $path = CONFIG.'Permissions/acl.yml';
        self::$cache = Yaml::parse(file_get_contents($path));
        return self::$cache;
    }
}