<?php
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use app\models\Users;

/* @var $this yii\web\View */
/* @var $model app\models\History */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="history-form">


<?php
/*
$script = <<< JS
function newuser(value) {
    if(value == 'newuser' ) {
        jQuery("#add_new_user").show();
    }
}
JS;
//маркер конца строки, обязательно сразу, без пробелов и табуляции

$this->registerJs($script, yii\web\View::POS_READY);
*/
 $form = ActiveForm::begin(); 
 
     $params = [];
     
     if ($model->isNewRecord) {
        echo $form->field($model, 'username')->hiddenInput(['value' => Yii::$app->user->identity->username])->label(false);

        $params = ['prompt' => '-- Select user --'];

        //$params = ['prompt' => '-- Select user --','onchange' => 'newuser(this.value)'];        
        
        $params['options'] = [$model->username_b => ['Selected' => true]];
        
        $options = ArrayHelper::map(Users::find()->select(['username','username'])->asArray()
                       ->where(['<>','username',Yii::$app->user->identity->username])->all(), 'username', 'username');
        
        //$options = array_merge(['newuser'=>'newuser'], $options);
        

        echo $form->field($model, 'username_b')->dropDownList($options, $params);
        
//        echo '<div id="add_new_user" hidden>';
  //      echo $form->field($model, 'username_b')->textInput();
    //    echo '</div>';

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
