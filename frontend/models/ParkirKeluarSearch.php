<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\ParkirKeluar;

/**
 * ParkirKeluarSearch represents the model behind the search form of `common\models\ParkirKeluar`.
 */
class ParkirKeluarSearch extends ParkirKeluar
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID_PARKIR_KELUAR', 'PARKIR_ID', 'WAKTU_KELUAR'], 'number'],
            ['TANGGAL_KELUAR', 'safe'],
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
        $query = ParkirKeluar::find();

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
            'ID_PARKIR_KELUAR' => $this->ID_PARKIR_KELUAR,
            'PARKIR_ID' => $this->PARKIR_ID,
            'WAKTU_KELUAR' => $this->WAKTU_KELUAR,
            'TANGGAL_KELUAR' => $this->TANGGAL_KELUAR,
        ]);

        return $dataProvider;
    }
}
