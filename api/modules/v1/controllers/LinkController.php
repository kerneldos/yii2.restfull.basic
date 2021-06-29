<?php


namespace api\modules\v1\controllers;

use app\models\Link;
use Yii;
use yii\rest\Controller;

/**
 * Class LinkController
 *
 * @package api\modules\v1\controllers
 */
class LinkController extends Controller {

    /**
     * @return array
     */
    public function actionIndex(): array {
        return Link::find()->all();
    }

    /**
     * @return array|Link
     */
    public function actionCreate() {
        $model = new Link(['url' => Yii::$app->request->post('url')]);

        return $model->save() ? $model : $model->errors;
    }

    /**
     * @param string $hash
     *
     * @return array|\yii\db\ActiveRecord
     */
    public function actionGet(string $hash) {
        return Link::find()->select(['url', 'counter'])->where(['hash' => $hash])->one();
    }

}