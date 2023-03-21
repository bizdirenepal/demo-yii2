<?php

namespace app\models;

use Yii;
use yii\base\Component;
use yii\web\IdentityInterface;
use yii\base\NotSupportedException;

/**
 * Identity class for "{{%user}}" table.
 */
class Identity extends Component implements IdentityInterface
{
    /**
     * Finds an identity by the given ID.
     *
     * @param  int|string $id The user id.
     * @return IdentityInterface|static
     */
    public static function findIdentity($id)
    {
        return static::findOne(['id' => $id]);
    }

    /**
     * Finds an identity by the given access token.
     *
     * @param  mixed $token
     * @param  null  $type
     * @return void|IdentityInterface
     *
     * @throws NotSupportedException
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        return static::findOne(['auth_key' => $token]);
    }

    /**
     * Returns an ID that can uniquely identify a user identity.
     *
     * @return int|mixed|string
     */
    public function getId()
    {
        return $this->getPrimaryKey();
    }

    /**
     * Returns a key that can be used to check the validity of a given
     * identity ID. The key should be unique for each individual user, and
     * should be persistent so that it can be used to check the validity of
     * the user identity. The space of such keys should be big enough to defeat
     * potential identity attacks.
     *
     * @return string
     */
    public function getAuthKey()
    {
        return $this->auth_key;
    }

    /**
     * Validates the given auth key.
     *
     * @param  string  $authKey The given auth key.
     * @return boolean          Whether the given auth key is valid.
     */
    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }
}