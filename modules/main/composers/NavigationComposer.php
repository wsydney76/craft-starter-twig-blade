<?php

namespace modules\main\composers;

use Craft;
use craft\elements\Entry;

class NavigationComposer
{
    public function compose($view): void
    {
        $pages = collect([
            Entry::find()->section('blog')->one(),
            Entry::find()->section('guestbook')->one(),
        ]);

        $pages = $pages->merge(Entry::find()->section('pages')->level(1)->collect());

        $view->with('pages', $pages)->with('segment1', Craft::$app->getRequest()->getSegment(1));
    }
}
