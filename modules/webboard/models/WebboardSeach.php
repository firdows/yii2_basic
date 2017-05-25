<?php

namespace app\modules\webboard\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\webboard\models\Webboard;

/**
 * WebboardSeach represents the model behind the search form about `app\modules\webboard\models\Webboard`.
 */
class WebboardSeach extends Webboard
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'webboard_category_id', 'user_id', 'view', 'date_post'], 'integer'],
            [['topic', 'detail', 'file'], 'safe'],
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
        $query = Webboard::find();

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
            'id' => $this->id,
            'webboard_category_id' => $this->webboard_category_id,
            'user_id' => $this->user_id,
            'view' => $this->view,
            'date_post' => $this->date_post,
        ]);

        $query->andFilterWhere(['like', 'topic', $this->topic])
            ->andFilterWhere(['like', 'detail', $this->detail])
            ->andFilterWhere(['like', 'file', $this->file]);

        return $dataProvider;
    }
}
