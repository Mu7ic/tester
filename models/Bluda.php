<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "bluda".
 *
 * @property integer $id
 * @property string $name
 * @property integer $datecreate
 * @property integer $lastupdate
 * @property integer $status
 *
 * @property TableBlud[] $tableBluds
 */
class Bluda extends \yii\db\ActiveRecord
{
    public $ingredient;
    /**
     * @inheritdoc
     *
     */
    public static function tableName()
    {
        return 'bluda';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'ingredient','datecreate', 'lastupdate', 'status'], 'required'],
            [['datecreate', 'lastupdate', 'status'], 'integer'],
            [['name'], 'string', 'max' => 250],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
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
        return $this->hasMany(TableBlud::className(), ['id_bluda' => 'id']);
    }

    public function getStyleList(){
        $styles=[];
        $tag=Ingredient::find()->where(['status'=>1])->all();
        foreach ($tag as $t) {
            $styles[$t->id]=$t->ingredient;
        }
        return $styles;
    }
}
