<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model artsoft\seo\models\Seo */

$this->title = Yii::t('art/seo', 'Update SEO Record');
$this->params['breadcrumbs'][] = ['label' => Yii::t('art/seo', 'SEO'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="seo-update">
    <h3 class="lte-hide-title"><?= Html::encode($this->title) ?></h3>
    <?= $this->render('_form', compact('model')) ?>
</div>


