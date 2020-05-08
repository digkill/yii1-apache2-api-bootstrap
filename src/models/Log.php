<?php

class Log extends CActiveRecord
{
    /**
     * Returns the static model of the specified AR class.
     * @return static the static model class
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return 'log';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array();
    }

    /**
     * @return array relational rules.
     */
    public function relations()
    {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(//	'posts' => array(self::HAS_MANY, 'Post', 'author_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array();
    }

    public static function create($data)
    {
        if (empty($data)) return null;

        foreach ($data as $attributes) {
            $model = new self();
            array_map(function ($key, $attribute) use ($model) {
                $model->{$key} = $attribute;
            }, array_keys($attributes), $attributes);
            $model->save();
        }
        return true;
    }

    /**
     * @param $sortBy
     * @param $groupBy
     * @param $dateStart
     * @param $dateEnd
     * @return array
     */
    public static function search($sortBy, $groupBy, $dateStart, $dateEnd)
    {
        $criteria = new CDbCriteria;

        if (!empty($dateStart) && !empty($dateEnd)) {
            $dateStart = date("Y-m-d", strtotime($dateStart));
            $dateEnd = date("Y-m-d", strtotime($dateEnd));
            $criteria->condition = "date between '{$dateStart}' and '{$dateEnd}'";
        }

        $criteria->order = $sortBy;
        $criteria->group = $groupBy;

        $logs = Log::model()->findAll($criteria);
        if (empty($logs)) {
            return [];
        }

        $rows = array();
        foreach ($logs as $model) {
            $rows[] = $model->attributes;
        }
        return $rows;
    }
}
