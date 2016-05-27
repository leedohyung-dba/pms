<?php
namespace App\Model\Validation;


interface UserValidationInterface
{
    // チェックメソッドを定義する
    public static function hoge($value, $context);

    // チェックメソッドを定義する
    public static function isAlphaNumeric($value, $params);

    // チェックメソッドを定義する
    public static function isPasswordConfirm($password, $params);

    // チェックメソッドを定義する
    public static function exist_project_id($project_id);

    // チェックメソッドを定義する
    public static function exist_sheet_no($sheet_no);

    // チェックメソッドを定義する
    public static function exist_company_name($name);
}