<?php

namespace modules\main\controllers;

use Craft;
use craft\elements\Entry;
use craft\web\Controller;
use wsydney76\blade\View;
use yii\web\Response;

/**
 * Guestbook controller
 */
class GuestbookController extends Controller
{
    public $defaultAction = 'index';
    protected array|int|bool $allowAnonymous = true;

    /**
     * main/guestbook action
     */
    public function actionIndex(): string
    {
        return View::renderTemplate('entries.guestbook', [
            'entry' => Craft::$app->urlManager->getMatchedElement(),
            'postSection' => Craft::$app->entries->getSectionByHandle(
                'guestbookPosts',
            ),
            ...View::paginate(
                Entry::find()
                    ->section('guestbookPosts')
                    ->limit(3)
                    ->orderBy('postDate DESC'),
                'posts',
            ),
        ]);
    }
}
