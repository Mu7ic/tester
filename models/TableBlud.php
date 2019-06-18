<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "table_blud".
 *
 * @property integer $int
 * @property integer $id_bluda
 * @property integer $id_ingredient
 * @property integer $datecreate
 * @property integer $lastupdate
 * @property integer $status
 *
 * @property Bluda $idBluda
 * @property Ingredient $idIngredient
 */
class TableBlud extends \yii\db\ActiveRecord
{
    public $count;
    public $name;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'table_blud';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_bluda', 'id_ingredient', 'datecreate', 'lastupdate', 'status'], 'required'],
            [['id_bluda', 'id_ingredient', 'datecreate', 'lastupdate', 'status'], 'integer'],
            [['id_bluda'], 'exist', 'skipOnError' => true, 'targetClass' => Bluda::className(), 'targetAttribute' => ['id_bluda' => 'id']],
            [['id_ingredient'], 'exist', 'skipOnError' => true, 'targetClass' => Ingredient::className(), 'targetAttribute' => ['id_ingredient' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'int' => 'Int',
            'id_bluda' => 'Id Bluda',
            'id_ingredient' => 'Id Ingredient',
            'datecreate' => 'Datecreate',
            'lastupdate' => 'Lastupdate',
            'status' => 'Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdBluda()
    {
        return $this->hasOne(Bluda::className(), ['id' => 'id_bluda']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDishes()
    {
        return $this->hasOne(Ingredient::className(), ['id' => 'id_ingredient']);
    }
}
