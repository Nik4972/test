<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "history".
 *
 * @property integer $id
 * @property string $username
 * @property string $action
 * @property string $summa
 * @property string $created_at
 */
class History extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'history';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        
        return [
            [['username','username_b', 'summa'], 'required'],
            [['created_at'], 'safe'],
            [['username', 'username_b'], 'string', 'max' => 255],
            //[['summa'], 'match', 'pattern' => '/^[0-9]+([\.][0-9]{1,2})*$/i','message' =>'Incorrect value. Valid *****.**'],
            [['summa'], 'match', 'pattern' => '/^[0-9]*[.]?[0-9]{0,2}$/','message' =>'Incorrect value. Valid *****.**'],


//    ^ - начало строки
//    [0-9]* - 0 и более цифр
//    [.]? - одна или ноль точек 
//    [0-9]{0,2} - 0,1 или 2 цифры
//    $ - конец строки.

        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Payer',
            'username_b' => 'Recipient',
            'summa' => 'Summa',
            'created_at' => 'Created at',
        ];
    }
}
