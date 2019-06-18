<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ingredient".
 *
 * @property integer $id
 * @property string $ingredient
 * @property integer $datecreate
 * @property integer $lastupdate
 * @property integer $status
 *
 * @property TableBlud[] $tableBluds
 */
class Ingredient extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ingredient';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ingredient', 'datecreate', 'lastupdate', 'status'], 'required'],
            [['datecreate', 'lastupdate', 'status'], 'integer'],
            [['ingredient'], 'string', 'max' => 250],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'ingredient' => 'Ingredient',
            'datecreate' => 'Datecreate',
            'lastupdate' => 'Lastupdate',
            'status' => 'Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTableBluds()
    {
        return $this->hasMany(TableBlud::className(), ['id_ingredient' => 'id']);
    }
}
