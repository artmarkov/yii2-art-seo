<?php

use artsoft\grid\GridPageSize;
use artsoft\grid\GridView;
use artsoft\helpers\Html;
use artsoft\models\User;
use artsoft\seo\models\Seo;
use yii\helpers\Url;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel artsoft\seo\models\search\SeoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('art/seo', 'Search Engine Optimization');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="seo-index">

    <div class="row">
        <div class="col-sm-12">
            <h3 class="page-title"><?= Html::encode($this->title) ?></h3>
            <?= Html::a(Yii::t('art', 'Add New'), ['/seo/default/create'], ['class' => 'btn btn-sm btn-success']) ?>
        </div>
    </div>

    <div class="panel panel-default">
        <div class="panel-body">

            <div class="row">
                <div class="col-sm-12 text-right">
                    <?= GridPageSize::widget(['pjaxId' => 'seo-grid-pjax']) ?>
                </div>
            </div>

            <?php Pjax::begin(['id' => 'seo-grid-pjax']) ?>

            <?=
            GridView::widget([
                'id' => 'seo-grid',
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'bulkActionOptions' => [
                    'gridId' => 'seo-grid',
                    'actions' => [
                        Url::to(['bulk-delete']) => Yii::t('yii', 'Delete'),
                    ]
                ],
                'columns' => [
                    ['class' => 'artsoft\grid\CheckboxColumn', 'options' => ['style' => 'width:10px']],
                    [
                        'attribute' => 'url',
                        'class' => 'artsoft\grid\columns\TitleActionColumn',
                        'controller' => '/seo/default',
                        'title' => function (Seo $model) {
                            return $model->url;
                        },
                        'buttonsTemplate' => '{update} {delete}',
                    ],
                    'title',
                    //'author',
                    //'keywords',
                    //'description',
                    [
                        'class' => 'artsoft\grid\columns\StatusColumn',
                        'attribute' => 'index',
                        'options' => ['style' => 'width:30px'],
                    ],
                    [
                        'class' => 'artsoft\grid\columns\StatusColumn',
                        'attribute' => 'follow',
                        'options' => ['style' => 'width:30px'],
                    ],
                ],
            ]);
            ?>

            <?php Pjax::end() ?>
        </div>
    </div>
</div>


