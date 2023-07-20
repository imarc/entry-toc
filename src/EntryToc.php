<?php

namespace imarc\craftentrytoc;

use Craft;
use craft\base\Model;
use craft\base\Plugin;
use craft\base\Element;
use craft\elements\Entry;
use craft\events\DefineHtmlEvent;
use craft\events\ElementEvent;
use craft\services\Elements;
use imarc\craftentrytoc\models\Settings;

use yii\base\Event;

/**
 * Entry TOC plugin
 *
 * @method static EntryToc getInstance()
 * @method Settings getSettings()
 * @author Linnea Hartsuyker <engineering@imarc.com>
 * @copyright Linnea Hartsuyker
 * @license MIT
 */
class EntryToc extends Plugin
{
    public string $schemaVersion = '1.0.0';
    public bool $hasCpSettings = true;

    public static function config(): array
    {
        return [
            'components' => [
                // Define component configs here...
            ],
        ];
    }

    public function init(): void
    {
        parent::init();

        // Defer most setup tasks until Craft is fully initialized
        Craft::$app->onInit(function() {
            $this->attachEventHandlers();
            // ...
        });
    }

    protected function createSettingsModel(): ?Model
    {
        return Craft::createObject(Settings::class);
    }

    protected function settingsHtml(): ?string
    {
        return Craft::$app->view->renderTemplate('entry-toc/_settings.twig', [
            'plugin' => $this,
            'settings' => $this->getSettings(),
        ]);
    }

    private function attachEventHandlers(): void
    {
        Event::on(
            Element::class,
            Element::EVENT_DEFINE_SIDEBAR_HTML,
            function (DefineHtmlEvent $event) {
                $element = $event->sender;
                if ($element instanceof Entry) {
                    $event->html = Craft::$app->view->renderTemplate(
                        'entry-toc/_sidebar.twig',
                        [
                            'entry' => $element,
                            'settings' => $this->getSettings()
                        ]
                    ) . $event->html;
                }
            }
        );
    }
}
