<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\History;

/**
 * HistorySearch represents the model behind the search form about `app\models\History`.
 */
class HistorySearch extends History
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['username','username_b', 'created_at'], 'safe'],
            [['summa'], 'number'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = History::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {

            return $dataProvider;
        }

        $query->andWhere(['or', ['username' => Yii::$app->user->identity->username], ['username_b' => Yii::$app->user->identity->username]]);

        $query->andFilterWhere([
            'id' => $this->id,
            'summa' => $this->summa,
            'created_at' => $this->created_at,
        ]);

        $query->andFilterWhere(['like', 'username', $this->username])
              ->andFilterWhere(['like', 'username_b', $this->username_b]);


        return $dataProvider;
    }
}
