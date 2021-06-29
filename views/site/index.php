<?php

use yii\helpers\Html;

/* @var $this yii\web\View */

$this->title = 'Links';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="link-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <a href="/" class="btn btn-success create-link">Create Link</a>
    </p>

    <table class="table table-striped table-bordered link-item-list">
        <thead>
            <tr>
                <th>ID</th>
                <th>Url</th>
                <th>Short Url</th>
                <th>Description</th>
                <th>Counter</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>

    <div id="templates" style="display: none;">
        <div class="link-item">
            <table>
                <tbody>
                    <tr>
                        <td class="link-item-id"></td>
                        <td>
                            <a href="" class="link-item-url" target="_blank"></a>
                        </td>
                        <td>
                            <a href="" class="link-item-short-url" target="_blank"></a>
                        </td>
                        <td class="link-item-description"></td>
                        <td class="link-item-counter"></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <div class="modal fade link-create-dialog" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Create Url</h4>
                </div>

                <div class="modal-body">
                    <form class="form-horizontal link-create-form">
                        <div class="form-group">
                            <label for="url" class="col-sm-2 control-label">Url</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="url" name="url" placeholder="Target Url">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" class="btn btn-success">Create Url</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
