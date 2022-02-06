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
class RealArrayType extends Type
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
        return 'RealArray';
    }

    /**
     * {@inheritdoc}
     */
    public function getSQLDeclaration(array $fieldDeclaration, AbstractPlatform $platform)
    {
        return 'real[]';
    }

    /**
     * {@inheritdoc}
     */
    public function requiresSQLCommentHint(AbstractPlatform $platform)
    {
        return true;
    }
}
