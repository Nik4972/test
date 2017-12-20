<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\History */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="history-form">


<?php
 $form = ActiveForm::begin(); 
 
     $params = [];
     
     if ($model->isNewRecord) {
        echo $form->field($model, 'username')->hiddenInput(['value' => Yii::$app->user->identity->username])->label(false);

        $params = ['prompt' => '-- Select user --'];
        $params['options'] = [$model->username_b => ['Selected' => true]];
        
        $options = Yii::$app->db->createCommand('SELECT `username`, `username` FROM `users` WHERE `username`<>'."'".
                   Yii::$app->user->identity->username."'")->queryAll(\PDO::FETCH_KEY_PAIR);

        echo $form->field($model, 'username_b')->dropDownList($options, $params);
        echo $form->field($model, 'summa')->textInput();
        echo $form->field($model, 'created_at')->hiddenInput(['readonly' => true, 'value' => date('Y-m-d H:i:s')])->label(false);

     } else {

        echo $form->field($model, 'username')->textInput(['readonly' => true]);
        echo $form->field($model, 'username_b')->textInput(['readonly' => true]);
        echo $form->field($model, 'summa')->textInput();
        echo $form->field($model, 'created_at')->textInput();
    }
?>

  
	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>
