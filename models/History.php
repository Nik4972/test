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
            [['summa'], 'number'],
            [['created_at'], 'safe'],
            [['username', 'username_b'], 'string', 'max' => 255],
            
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
