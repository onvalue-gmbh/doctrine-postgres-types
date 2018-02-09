Provides Common Postgres Types for Doctrine
-------------------------------------------

Provides Doctrine Type classes for common postgres types

### Installation

### Usage

#### Using with Symfony2 Doctrine Configuration

```
    # Doctrine Configuration
    doctrine:
        dbal:
            types:
                text_array: "Doctrine\\DBAL\\PostgresTypes\\TextArrayType"
                int_array: "Doctrine\\DBAL\\PostgresTypes\\IntArrayType"
                real_array: "Doctrine\\DBAL\\PostgresTypes\\RealArrayType"
            mapping_types:
                _text: text_array
                _int4: int_array
                _readl: real_array
```

#### Using with Doctrine

```
    <?php

    use Doctrine\DBAL\Types\Type;

    Type::addType('text_array', "Doctrine\\DBAL\\PostgresTypes\\TextArrayType");
    Type::addType('int_array', "Doctrine\\DBAL\\PostgresTypes\\IntArrayType");
    Type::addType('real_array', "Doctrine\\DBAL\\PostgresTypes\\RealArrayType");

```

