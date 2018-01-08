<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Users;

/**
 * UsersSearch represents the model behind the search form of `common\models\Users`.
 */
class UsersSearch extends Users
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID', 'STATUS', 'CREATED_AT', 'UPDATED_AT', 'ROLE'], 'number'],
            [['USERNAME', 'AUTH_KEY', 'PASSWORD_HASH', 'PASSWORD_RESET_TOKEN', 'EMAIL', 'NO_IDENTITAS', 'NAMA', 'JENIS_KELAMIN', 'ALAMAT'], 'safe'],
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
        $query = Users::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'ID' => $this->ID,
            'STATUS' => $this->STATUS,
            'CREATED_AT' => $this->CREATED_AT,
            'UPDATED_AT' => $this->UPDATED_AT,
            'ROLE' => $this->ROLE,
        ]);

        $query->andFilterWhere(['like', 'USERNAME', $this->USERNAME])
            ->andFilterWhere(['like', 'AUTH_KEY', $this->AUTH_KEY])
            ->andFilterWhere(['like', 'PASSWORD_HASH', $this->PASSWORD_HASH])
            ->andFilterWhere(['like', 'PASSWORD_RESET_TOKEN', $this->PASSWORD_RESET_TOKEN])
            ->andFilterWhere(['like', 'EMAIL', $this->EMAIL])
            ->andFilterWhere(['like', 'NO_IDENTITAS', $this->NO_IDENTITAS])
            ->andFilterWhere(['like', 'NAMA', $this->NAMA])
            ->andFilterWhere(['like', 'JENIS_KELAMIN', $this->JENIS_KELAMIN])
            ->andFilterWhere(['like', 'ALAMAT', $this->ALAMAT]);

        return $dataProvider;
    }
}
