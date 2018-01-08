<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Parkir;

/**
 * ParkirSearch represents the model behind the search form about `common\models\Parkir`.
 */
class ParkirSearch extends Parkir
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID_PARKIR'], 'number'],
            [['TANGGAL_PARKIR', 'BULAN_PARKIR', 'TAHUN_PARKIR', 'PLAT_NOMOR','WAKTU_MASUK','HARI_PARKIR','HARGA'], 'safe'],
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
        $query = Parkir::find();

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
            'ID_PARKIR' => $this->ID_PARKIR,
        ]);

        $query->andFilterWhere(['like', 'TANGGAL_PARKIR', $this->TANGGAL_PARKIR])
            ->andFilterWhere(['like', 'HARI_PARKIR', $this->HARI_PARKIR])
            ->andFilterWhere(['like', 'BULAN_PARKIR', $this->BULAN_PARKIR])
            ->andFilterWhere(['like', 'TAHUN_PARKIR', $this->TAHUN_PARKIR])
            ->andFilterWhere(['like', 'PLAT_NOMOR', $this->PLAT_NOMOR])
            ->andFilterWhere(['like', 'WAKTU_MASUK', $this->WAKTU_MASUK])
            ->andFilterWhere(['like', 'HARGA', $this->HARGA]);

        return $dataProvider;
    }
}
