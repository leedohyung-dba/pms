<?php
namespace App\View\Helper;
use BootstrapUI\View\Helper\HtmlHelper as BootstrapUIHtmlHelper;
class HtmlHelper extends BootstrapUIHtmlHelper
{
	// テンプレートを変更する
	protected $_defaultConfig = [
        'templates' => [
            'meta' => '<meta{{attrs}}/>',
            'metalink' => '<link href="{{url}}"{{attrs}}/>',
            'link' => '<a href="{{url}}"{{attrs}}>{{icon}}{{content}}</a>',
            'linkicon' => '<i class="{{attrs}}">&nbsp;</i>',
            'mailto' => '<a href="mailto:{{url}}"{{attrs}}>{{content}}</a>',
            'image' => '<img src="{{url}}"{{attrs}}/>',
            'tableheader' => '<th{{attrs}}>{{content}}</th>',
            'tableheaderrow' => '<tr{{attrs}}>{{content}}</tr>',
            'tablecell' => '<td{{attrs}}>{{content}}</td>',
            'tablerow' => '<tr{{attrs}}>{{content}}</tr>',
            'block' => '<div{{attrs}}>{{content}}</div>',
            'blockstart' => '<div{{attrs}}>',
            'blockend' => '</div>',
            'tag' => '<{{tag}}{{attrs}}>{{content}}</{{tag}}>',
            'tagstart' => '<{{tag}}{{attrs}}>',
            'tagend' => '</{{tag}}>',
            'tagselfclosing' => '<{{tag}}{{attrs}}/>',
            'para' => '<p{{attrs}}>{{content}}</p>',
            'parastart' => '<p{{attrs}}>',
            'css' => '<link rel="{{rel}}" href="{{url}}"{{attrs}}/>',
            'style' => '<style{{attrs}}>{{content}}</style>',
            'charset' => '<meta http-equiv="Content-Type" content="text/html; charset={{charset}}"/>',
            'ul' => '<ul{{attrs}}>{{content}}</ul>',
            'ol' => '<ol{{attrs}}>{{content}}</ol>',
            'li' => '<li{{attrs}}>{{content}}</li>',
            'javascriptblock' => '<script{{attrs}}>{{content}}</script>',
            'javascriptstart' => '<script>',
            'javascriptlink' => '<script src="{{url}}"{{attrs}}></script>',
            'javascriptend' => '</script>'
        ]
    ];

// 親のBootstrapUIHtmlHelperがコアのHtmlHelperから生成者を再定義しなかったので・・・使えない！
	// public function __construct(View $View, array $config = [])
 //    {
 //        // テンプレートを変更する
 //        $config['templates'] = 'Templates/Html';

 //        parent::__construct($View, $config);

 //        $this->initialize();
 //    }

 //    /**
 //     * 初期化処理
 //     *
 //     * @access public
 //     * @author lee
 //     */
 //    public function initialize()
 //    {

 //    }

	/**
     * a hrefにアイコンを付与する
     *
     * @author lee
     */
    public function link($title, $url = null, array $options = [], $icon = null)
    {
        $escapeTitle = true;
        if ($url !== null) {
            $url = $this->Url->build($url);
        } else {
            $url = $this->Url->build($title);
            $title = htmlspecialchars_decode($url, ENT_QUOTES);
            $title = h(urldecode($title));
            $escapeTitle = false;
        }

        if (isset($options['escapeTitle'])) {
            $escapeTitle = $options['escapeTitle'];
            unset($options['escapeTitle']);
        } elseif (isset($options['escape'])) {
            $escapeTitle = $options['escape'];
        }

        if ($escapeTitle === true) {
            $title = h($title);
        } elseif (is_string($escapeTitle)) {
            $title = htmlentities($title, ENT_QUOTES, $escapeTitle);
        }

        $confirmMessage = null;
        if (isset($options['confirm'])) {
            $confirmMessage = $options['confirm'];
            unset($options['confirm']);
        }
        if ($confirmMessage) {
            $options['onclick'] = $this->_confirm($confirmMessage, 'return true;', 'return false;', $options);
        }

        $templater = $this->templater();

        $iconTag = '';
        if (!empty($icon)){
            $iconTag = $templater->format('linkicon', [
                'attrs' => $icon,
            ]);
        }

        return $templater->format('link', [
            'url' => $url,
            'attrs' => $templater->formatAttributes($options),
            'content' => $title,
            'icon' => $iconTag,
        ]);
    }
}