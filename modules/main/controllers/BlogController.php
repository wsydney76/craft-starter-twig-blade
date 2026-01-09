<?php

namespace modules\main\controllers;

use Craft;
use craft\elements\Entry;
use craft\web\Controller;
use wsydney76\blade\View;

class BlogController extends Controller
{
    protected array|bool|int $allowAnonymous = true;

    public function actionIndex()
    {
        return View::renderTemplate('entries.blog', [
            'entry' => Craft::$app->urlManager->getMatchedElement(),
            ...View::paginate(
                Entry::find()->section('blogPosts')->limit(4),
                'posts',
            ),
        ]);
    }

    public function actionPost()
    {
        return View::renderTemplate('entries.blog-post', [
            'entry' => ($entry = Craft::$app->urlManager->getMatchedElement()),
            'posts' => Entry::find()
                ->section('blogPosts')
                ->id(['not', $entry->id])
                ->limit(3)
                ->all(),
        ]);
    }
}
