<?php

namespace Goldfinch\Component\BlankItem\Models\Nest;

use Goldfinch\Component\BlankItem\Pages\Nest\Blanks;
use SilverStripe\Assets\Image;
use SilverStripe\Forms\TextField;
use SilverStripe\TagField\TagField;
use Goldfinch\Component\BlankItem\Models\Nest\BlankCategory;
use Goldfinch\Nest\Models\NestedObject;
use Goldfinch\ImageEditor\Forms\EditableUploadField;

class BlankItem extends NestedObject
{
    public static $nest_up = null;
    public static $nest_up_children = [];
    public static $nest_down = Blanks::class;
    public static $nest_down_parents = [];

    private static $table_name = 'BlankItem';
    private static $singular_name = 'blank';
    private static $plural_name = 'blanks';

    private static $db = [];

    private static $many_many = [
        'Categories' => BlankCategory::class,
    ];

    private static $many_many_extraFields = [
        'Categories' => [
            'SortExtra' => 'Int',
        ],
    ];

    private static $has_one = [
        'Image' => Image::class,
    ];

    private static $owns = [
        'Image',
        'Categories',
    ];

    private static $summary_fields = [
        'Image.CMSThumbnail' => 'Image',
    ];

    // private static $has_one = [];
    // private static $belongs_to = [];
    // private static $has_many = [];
    // private static $belongs_many_many = [];
    // private static $default_sort = null;
    // private static $indexes = null;
    // private static $owns = [];
    // private static $casting = [];
    // private static $defaults = [];

    // private static $summary_fields = [];
    // private static $field_labels = [];
    // private static $searchable_fields = [];

    // private static $cascade_deletes = [];
    // private static $cascade_duplicates = [];

    // * goldfinch/helpers
    private static $field_descriptions = [];
    private static $required_fields = [
        'Title',
    ];

    public function getCMSFields()
    {
        $fields = parent::getCMSFields();

        $fields->addFieldsToTab(
            'Root.Main',
            [
                ...EditableUploadField::create('Image', 'Image', $fields, $this)->getFields(),
                ...[
                    TextField::create('Title', 'Title'),
                    TagField::create('Categories', 'Categories', BlankCategory::get())
                ],
            ]
        );

        $fields->dataFieldByName('Image')->setFolderName('blank');

        return $fields;
    }

    // public function validate()
    // {
    //     $result = parent::validate();

    //     // $result->addError('Error message');

    //     return $result;
    // }

    // public function onBeforeWrite()
    // {
    //     // ..

    //     parent::onBeforeWrite();
    // }

    // public function onBeforeDelete()
    // {
    //     // ..

    //     parent::onBeforeDelete();
    // }

    // public function canView($member = null)
    // {
    //     return Permission::check('CMS_ACCESS_Company\Website\MyAdmin', 'any', $member);
    // }

    // public function canEdit($member = null)
    // {
    //     return Permission::check('CMS_ACCESS_Company\Website\MyAdmin', 'any', $member);
    // }

    // public function canDelete($member = null)
    // {
    //     return Permission::check('CMS_ACCESS_Company\Website\MyAdmin', 'any', $member);
    // }

    // public function canCreate($member = null, $context = [])
    // {
    //     return Permission::check('CMS_ACCESS_Company\Website\MyAdmin', 'any', $member);
    // }
}
