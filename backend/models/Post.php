<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "post".
 *
 * @property integer $id
 * @property string $title
 * @property string $content
 * @property string $tags
 * @property integer $flag
 * @property integer $created_at
 * @property integer $updated_at
 * @property string $author_name
 * @property integer $type
 * @property integer $post_Users
 */
class Post extends \yii\db\ActiveRecord
{
    // 文章是否设置为推荐文章
    const FLAG_NORMAL = 1;
    const FLAG_NATIVE = 2;

    // 文章类型
    const TYPE_ART          = 1;        // 艺术新闻
    const TYPE_EXHIBIT      = 2;        // 展览信息
    const TYPE_SPECIAL      = 3;        // 专题报道

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'post';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'content', 'created_at', 'updated_at', 'type', 'flag'], 'required', 'message' => '{attribute}不能为空'],
            [['content', 'tags'], 'string'],
            [['flag', 'created_at', 'updated_at', 'type', 'post_Users'], 'integer'],
            [['title'], 'string', 'max' => 128],
            [['author_name'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => '标题',
            'content' => '内容',
            'tags' => '标签',
            'flag' => '推荐',
            'created_at' => '添加时间',
            'updated_at' => '更新时间',
            'author_name' => '来源',
            'type' => '文章类型',
            'post_Users' => '浏览数',
        ];
    }

    public function getFlag()
    {
        return array(
            self::FLAG_NORMAL => '正常文章',
            self::FLAG_NATIVE => '推荐文章'
        );
    }

    public function getFlagLabel($flag)
    {
        if ($flag === self::FLAG_NORMAL)
        {
            return '正常文章';
        } else {
            return '推荐文章';
        }
    }

    public function getType()
    {
        return array(
            self::TYPE_ART          => '艺术新闻',
            self::TYPE_EXHIBIT      => '展览信息',
            self::TYPE_SPECIAL      => '专题报道',
        );
    }

    public function getTypeLabel($type)
    {
        if ($type === self::TYPE_ART) {
            return '艺术新闻';
        } elseif ($type === self::TYPE_EXHIBIT) {
            return '展览信息';
        } else {
            return '专题报道';
        }
    }
}
