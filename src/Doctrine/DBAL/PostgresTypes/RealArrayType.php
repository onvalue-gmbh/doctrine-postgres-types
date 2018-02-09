<?php

/**
 * This file is part of Opensoft Doctrine Postgres Types.
 *
 *
 */
namespace Doctrine\DBAL\PostgresTypes;

use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\Type;

/**
 * Only supports single dimensional arrays like real[].
 */
class IntArrayType extends Type
{
    /**
     * {@inheritdoc}
     */
    public function convertToPHPValue($value, AbstractPlatform $platform)
    {
        $value = trim($value, '{}');

        if ($value === '') {
            return array();
        }

        return array_map('floatval', explode(',', $value));
    }

    /**
     * {@inheritdoc}
     */
    public function convertToDatabaseValue($value, AbstractPlatform $platform)
    {
        return '{'.implode(',', $value).'}';
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'real_array';
    }

    /**
     * {@inheritdoc}
     */
    public function getSQLDeclaration(array $fieldDeclaration, AbstractPlatform $platform)
    {
        return '_real';
    }
}
