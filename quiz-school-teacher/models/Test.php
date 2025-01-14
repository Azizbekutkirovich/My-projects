<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "test".
 *
 * @property int $id
 * @property int $tests_id
 * @property string $question
 * @property string $a
 * @property string $b
 * @property string $c
 * @property string $d
 * @property string $correct
 */
class Test extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'test';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tests_id', 'question', 'a', 'b', 'c', 'd', 'correct'], 'required'],
            [['tests_id'], 'integer'],
            [['question', 'a', 'b', 'c', 'd', 'correct'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'tests_id' => 'Tests ID',
            'question' => 'Question',
            'a' => 'A',
            'b' => 'B',
            'c' => 'C',
            'd' => 'D',
            'correct' => 'Correct',
        ];
    }
}
