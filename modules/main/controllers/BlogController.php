<?php

namespace modules\main\controllers;

use Craft;
use craft\elements\Entry;
use craft\web\Controller;
use wsydney76\blade\View;
use function in_array;

class BlogController extends Controller
{
    protected array|bool|int $allowAnonymous = true;

    public function actionIndex()
    {
        return View::renderTemplate('entries.blog', [
            'entry' => Craft::$app->urlManager->getMatchedElement(),
            ...View::paginate(
                Entry::find()
                    ->section('blogPosts')
                    ->limit(Craft::$app->config->custom->perPage),
                'posts',
            ),
        ]);
    }

    public function actionPost()
    {
        $config = Craft::$app->config->custom;
        return View::renderTemplate('entries.blog-post', [
            'entry' => ($entry = Craft::$app->urlManager->getMatchedElement()),
            'showMeta' => in_array($entry->section->handle, $config->showMeta),
            'otherPosts' => Entry::find()
                ->section('blogPosts')
                ->id(['not', $entry->id])
                ->limit($config->otherPostsLimit)
                ->all(),
        ]);
    }
}
