<?php
namespace App\Statics;
use Cake\ORM\TableRegistry;
use Cake\Collection\Collection;
/**
 * @SuppressWarnings(PHPMD.TooManyPublicMethods) 必要なメソッドのため
 */
class UserInfo
{
    /* ユーザーID */
    public static $id;
    const ADMINISTRATOR = 'administrator';
    const EXECUTIVE = 'executive';
    const SENIOR = 'senior';
    const CONSULTING = 'consulting';
    const ACCOUNTANT = 'accountant';
    const MANUFACTURER = 'manufacturer';
    private static function getUserData()
    {
        if (empty(self::$id)) {
            return;
        }
        return TableRegistry::get('Users')->get(self::$id, ['contain' => ['Groups']]);
    }
    /**
     * isAny
     * 指定権限のどれかかどうかを取得する.
     */
    public static function isAny($permisisons)
    {
        $permisisons = new Collection((array) $permisisons);
        return !$permisisons->filter(function ($permisison) {
            if (!method_exists(__CLASS__, 'is'.ucfirst($permisison))) {
                return false;
            }
            return UserInfo::{'is'.ucfirst($permisison)}();
        })->isEmpty();
    }
    //=========================================
    // 申請関連
    //=========================================
    public static function manufactureManagerUserId()
    {
        $userData = self::getUserData();
        if (empty($userData)) {
            return;
        }
        return $userData->manufacture_manager_user_id;
    }
    public static function expenseManagerUserId()
    {
        $userData = self::getUserData();
        if (empty($userData)) {
            return;
        }
        return $userData->expense_manager_user_id;
    }
    public static function haveManufactureManager()
    {
        return (bool) self::manufactureManagerUserId();
    }
    public static function haveExpenseManager()
    {
        return (bool) self::expenseManagerUserId();
    }
    //=========================================
    // usersテーブル関連
    //=========================================
    /* 管理者権限の有無 */
    public static function isAdministrator()
    {
        $userData = self::getUserData();
        if (empty($userData)) {
            return false;
        }
        return (bool) $userData->is_administrator;
    }
    /* 役員権限の有無 */
    public static function isExecutive()
    {
        $userData = self::getUserData();
        if (empty($userData)) {
            return false;
        }
        return (bool) $userData->is_executive;
    }
    /* 上長権限の有無 */
    public static function isSenior()
    {
        $userData = self::getUserData();
        if (empty($userData)) {
            return false;
        }
        return (bool) $userData->is_senior;
    }
    //=========================================
    // groupsテーブル関連
    //=========================================
    /* コンサル権限の有無 */
    public static function isConsulting()
    {
        $userData = self::getUserData();
        if (empty($userData)) {
            return false;
        }
        return (bool) $userData->group->is_consulting;
    }
    /* 経理権限の有無 */
    public static function isAccountant()
    {
        $userData = self::getUserData();
        if (empty($userData)) {
            return false;
        }
        return (bool) $userData->group->is_accountant;
    }
    /* 制作権限の有無 */
    public static function isManufacturer()
    {
        $userData = self::getUserData();
        if (empty($userData)) {
            return false;
        }
        return (bool) $userData->group->is_manufacturer;
    }
}