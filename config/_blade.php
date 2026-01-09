<?php

use craft\elements\Entry;

return [
    'bladeShared' => [
        'global' => Entry::find()->section('global')->one(),
    ],
    'bladeViewComposers' => [
        'components.partials.navigation' => function ($view) {
            $view->with('pages', Entry::find()->section('pages')->level(1)->all());
        },
    ],
];