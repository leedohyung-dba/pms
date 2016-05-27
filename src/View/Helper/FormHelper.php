<?php
namespace App\View\Helper;
use BootstrapUI\View\Helper\FormHelper as BootstrapUIFormHelper;
use Cake\ORM\TableRegistry;
class FormHelper extends BootstrapUIFormHelper
{
    protected $_templates = [
        'dateWidget' => '<ul class="list-inline"><li class="year">{{year}}</li><li class="month">{{month}}</li><li class="day">{{day}}</li><li class="hour">{{hour}}</li><li class="minute">{{minute}}</li><li class="second">{{second}}</li><li class="meridian">{{meridian}}</li></ul>',
        'error' => '<div class="help-block">{{content}}</div>',
        'help' => '<div class="help-block">{{content}}</div>',
        'inputContainer' => '<div class="form-group {{type}}{{required}}">{{content}}{{help}}</div>',
        'inputContainerError' => '<div class="form-group {{type}}{{required}} has-error col-sm-8">{{content}}{{error}}{{help}}</div>',
        'checkboxWrapper' => '<div class="checkbox"><label>{{input}}{{label}}</label></div>',
        'multipleCheckboxWrapper' => '<div class="checkbox">{{label}}</div>',
        'radioInlineFormGroup' => '{{label}}<div class="radio-inline-wrapper">{{input}}</div>',
        'radioNestingLabel' => '<div class="radio">{{hidden}}<label{{attrs}}>{{input}}{{text}}</label></div>',
        'staticControl' => '<p class="form-control-static">{{content}}</p>',
        'inputGroupAddon' => '<span class="{{class}}">{{content}}</span>',
        'inputGroupContainer' => '<div class="input-group">{{prepend}}{{content}}{{append}}</div>',
    ];
    // /**
    //  * errorBox.
    //  */
    // public function errorBox($field, $text = null, array $options = [])
    // {
    //     $error = $this->errorText($field, $text, $options);
    //     if ($error !== '') {
    //         $error = '<div class="alert alert-danger">'.$error.'</div>';
    //     }
    //     return $error;
    // }
    // /**
    //  * errorText.
    //  *
    //  * @SuppressWarnings(PHPMD.CyclomaticComplexity) FormHelperからのコピペを利用しているため
    //  * @SuppressWarnings(PHPMD.NPathComplexity) FormHelperからのコピペを利用しているため
    //  */
    // public function errorText($field, $text = null, array $options = [])
    // {
    //     if (substr($field, -5) === '._ids') {
    //         $field = substr($field, 0, -5);
    //     }
    //     $options += ['escape' => true];
    //     $context = $this->_getContext();
    //     if (!$context->hasError($field)) {
    //         return '';
    //     }
    //     $error = (array) $context->error($field);
    //     if (is_array($text)) {
    //         $tmp = [];
    //         foreach ($error as $e) {
    //             if (isset($text[$e])) {
    //                 $tmp[] = $text[$e];
    //             } else {
    //                 $tmp[] = $e;
    //             }
    //         }
    //         $text = $tmp;
    //     }
    //     if ($text !== null) {
    //         $error = $text;
    //     }
    //     if ($options['escape']) {
    //         $error = h($error);
    //         unset($options['escape']);
    //     }
    //     if (is_array($error)) {
    //         if (count($error) > 1) {
    //             $errorText = [];
    //             foreach ($error as $err) {
    //                 $errorText[] = $this->formatTemplate('errorItem', ['text' => $err]);
    //             }
    //             $error = $this->formatTemplate('errorList', [
    //                 'content' => implode('', $errorText),
    //             ]);
    //         } else {
    //             $error = array_pop($error);
    //         }
    //     }
    //     return $error;
    // }
    // /**
    //  * deletePostLink method.
    //  * 
    //  * @param string $title
    //  * @param array  $url
    //  * @param array  $options
    //  *
    //  * @return HTML
    //  */
    // public function deletePostLink($title, $url = null, array $options = [])
    // {
    //     $options = $this->buildDeleteLinkOptions($options);
    //     return parent::postLink($title, $url, $options);
    // }
    // /**
    //  * deleteLink method.
    //  * 
    //  * @param string $title
    //  * @param array  $url
    //  * @param array  $options
    //  *
    //  * @return HTML
    //  */
    // public function deleteLink($title, $url = null, array $options = [])
    // {
    //     $options = $this->buildDeleteLinkOptions($options);
    //     return $this->Html->link($title, $url, $options);
    // }
    // /**
    //  * buildDeleteLinkOptions.
    //  * 
    //  * @param array $options
    //  *
    //  * @return array
    //  */
    // private function buildDeleteLinkOptions(array $options = [])
    // {
    //     $options['confirm'] = __('Are you sure you want to delete ?');
    //     if (!isset($options['body'])) {
    //         return $options;
    //     }
    //     $tableName = $options['body']->source();
    //     $deleteDisplayField = TableRegistry::get($tableName)->listValue($options['body']);
    //     if (!empty($deleteDisplayField)) {
    //         $options['confirm'] = __('Are you sure you want to delete # {0}?', (string) $deleteDisplayField);
    //     }
    //     return $options;
    // }
}