<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\History */
?>
<div class="history-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'username',
            'username_b',
            'summa',
            'created_at',
        ],
    ]) ?>

</div>
