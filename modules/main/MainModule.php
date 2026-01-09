<?php

namespace modules\main;

use Craft;
use craft\elements\Entry;
use modules\main\composers\NavigationComposer;
use wsydney76\blade\View;
use yii\base\Module as BaseModule;

/**
 * MainModule module
 *
 * @method static MainModule getInstance()
 */
class MainModule extends BaseModule
{
    public function init(): void
    {
        Craft::setAlias('@modules/main', __DIR__);

        // Set the controllerNamespace based on whether this is a console or web request
        if (Craft::$app->request->isConsoleRequest) {
            $this->controllerNamespace = 'modules\\main\\console\\controllers';
        } else {
            $this->controllerNamespace = 'modules\\main\\controllers';
        }

        parent::init();

        $this->attachEventHandlers();

        Craft::$app->onInit(function () {
            if (Craft::$app->getRequest()->getIsSiteRequest()) {
                $this->initBlade();
            }
        });
    }

    private function attachEventHandlers(): void
    {
        // Register event handlers here ...
        // (see https://craftcms.com/docs/5.x/extend/events.html to get started)
    }

    private function initBlade()
    {
        View::share('global', Entry::find()->section('global')->one());

        View::composer('components.layouts.default', function ($view) {
            $view->with('language', Craft::$app->language);
        });

        View::composer('components.partials.navigation', NavigationComposer::class);

        View::composer('components.partials.flashes', function ($view) {
            $view->with('flashes', Craft::$app->getSession()->getAllFlashes());
        });

        View::stringable(\DateTime::class, function ($dateTime) {
            return Craft::$app->getFormatter()->asDate($dateTime, 'medium');
        });
    }
}
