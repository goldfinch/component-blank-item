<?php

namespace Goldfinch\Component\BlankItem\Admin;

use Goldfinch\Component\BlankItem\Models\Nest\BlankItem;
use Goldfinch\Component\BlankItem\Blocks\BlanksBlock;
use Goldfinch\Component\BlankItem\Configs\BlankConfig;
use Goldfinch\Component\BlankItem\Models\Nest\BlankCategory;
use SilverStripe\Admin\ModelAdmin;
use JonoM\SomeConfig\SomeConfigAdmin;
use SilverStripe\Forms\GridField\GridFieldConfig;

class BlanksAdmin extends ModelAdmin
{
    use SomeConfigAdmin;

    private static $url_segment = 'blanks';
    private static $menu_title = 'Blanks';
    private static $menu_icon_class = 'bi-circle';
    // private static $menu_priority = -0.5;

    private static $managed_models = [
        BlankItem::class => [
            'title'=> 'Blanks',
        ],
        BlankCategory::class => [
            'title'=> 'Categories',
        ],
        BlanksBlock::class => [
            'title'=> 'Blocks',
        ],
        BlankConfig::class => [
            'title'=> 'Settings',
        ],
    ];

    // public $showImportForm = true;
    // public $showSearchForm = true;
    // private static $page_length = 30;

    public function getList()
    {
        $list = parent::getList();

        // ..

        return $list;
    }

    protected function getGridFieldConfig(): GridFieldConfig
    {
        $config = parent::getGridFieldConfig();

        // ..

        return $config;
    }

    public function getSearchContext()
    {
        $context = parent::getSearchContext();

        // ..

        return $context;
    }

    public function getEditForm($id = null, $fields = null)
    {
        $form = parent::getEditForm($id, $fields);

        // ..

        return $form;
    }

    // public function getExportFields()
    // {
    //     return [
    //         // 'Name' => 'Name',
    //         // 'Category.Title' => 'Category'
    //     ];
    // }
}
