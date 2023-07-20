<?php

namespace imarc\craftentrytoc\models;

use Craft;
use craft\base\Model;

/**
 * Entry TOC settings
 */
class Settings extends Model
{

    /**
     * @var array
     */
    public $fieldsToIndex = [];

    /**
     * @inheritdoc
     */
    public function rules(): array
    {
        return [
            [['fieldsToIndex'], 'required'],
            [['fieldsToIndex'], 'array'],
        ];
    }
}
