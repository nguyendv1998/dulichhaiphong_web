<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "xaphuong".
 *
 * @property int $id
 * @property string $TenXaPhuong
 * @property string|null $Code
 * @property int $QuanHuyen_id
 */
class XaPhuong extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'xaphuong';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['TenXaPhuong', 'QuanHuyen_id'], 'required'],
            [['QuanHuyen_id'], 'integer'],
            [['TenXaPhuong', 'Code'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'TenXaPhuong' => 'Tên xã - phường',
            'Code' => 'Code',
            'QuanHuyen_id' => 'Quan Huyen ID',
        ];
    }
    public function beforeSave($insert)
    {
        $this->TenXaPhuong=trim($this->TenXaPhuong);
        $this->Code=API_H17::createCode( $this->TenXaPhuong);
        return parent::beforeSave($insert); // TODO: Change the autogenerated stub
    }
}
