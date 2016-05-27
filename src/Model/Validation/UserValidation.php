<?php

namespace App\Model\Validation;

use Cake\Validation;

class UserValidation implements UserValidationInterface
{
    //メソッドはstaticである必要あり
    public static function hoge($value, $context)
    {
        return false;
    }

    /**
     * 半角英数字
     *
     * @access public
     * @author lee
     */
    public static function isAlphaNumeric($value, $params)
    {
        if (preg_match("/^[0-9a-zA-Z]+$/u", $value)) {
            // 半角英数
            return true;
        } else {
            // 以外
            return false;
        }
    }



    /**
     * パスワードが同じかチェック
     *
     * @access public
     * @author lee
     */
    public static function isPasswordConfirm($password, $params)
    {
        if ($params['data']['password'] == $params['data']['password_confirm']){
            return true;
        } else {
            return false;
        }
    }

    /**
     * 案件IDが存在するかチェック
     *
     * @access public
     * @author lee
     */
    public static function exist_project_id($project_id)
    {
        $projects = TableRegistry::get('Projects')->find()
                                                  ->where(['id' => $project_id])
                                                  ->toArray();
        if (!empty($projects)) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * シートNoが存在するかチェック
     *
     * @access public
     * @author lee
     */
    public static function exist_sheet_no($sheet_no)
    {
        $sheets = TableRegistry::get('Sheets')->find()
                                              ->where(['no' => $sheet_no])
                                              ->toArray();

        if (!empty($sheets)) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * 会社IDが存在するかチェック
     *
     * @access public
     * @author lee
     */
    public static function exist_company_name($name)
    {
        $companies = TableRegistry::get('Companies')->find()
                                                    ->where(['name' => $name])
                                                    ->toArray();
        if (!empty($companies)) {
            return true;
        } else {
            return false;
        }
    }
    
}