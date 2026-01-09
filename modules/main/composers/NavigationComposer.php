<?php

namespace modules\main\composers;

use Craft;
use craft\elements\Entry;

class NavigationComposer
{
    public function compose($view): void
    {
        $view
            ->with('pages', Entry::find()->section('pages')->level(1)->all())
            ->with('segment1', Craft::$app->getRequest()->getSegment(1));
    }
}
