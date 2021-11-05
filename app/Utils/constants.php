<?php

use BenSampo\Enum\Enum;

/**
 * Class ConstUserStatus
 */
class ConstUserStatus extends Enum
{
    const INACTIVE = 0;
    const ACTIVE = 1;
}

/**
 * Class ConstCustomerStatus
 */
class ConstCustomerStatus extends Enum
{
    const INACTIVE = 0;
    const ACTIVE = 1;
    const SUSPENDED = 2;
}

/**
 * Class ConstStorageDisks
 */
class ConstStorageDisks extends Enum
{
    const PUBLIC = 1;
    const LOCAL = 2;
    const S3 = 3;
}

/**
 * Class ConstBlockCategoriesStatus
 */
class ConstBlockCategoriesStatus extends Enum
{
    const SUSPENDED = 0;
    const ACTIVE = 1;
}

/**
 * Class ConstBlocksStatus
 */
class ConstBlocksStatus extends Enum
{
    const SUSPENDED = 0;
    const ACTIVE = 1;
}

/**
 * Class ConstTemplateStatus
 */
class ConstTemplateStatus extends Enum
{
    const SUSPENDED = 0;
    const ACTIVE = 1;
}

/**
 * Class ConstTemplateCategories
 */
class ConstTemplateCategories extends Enum
{
    const PRODUCT = 1;
    const BLOG = 2;
    const COLLECTION = 3;
    const STANDARD = 4;
}

/**
 * Class ConstAiConvertStatus
 */
class ConstAiConvertStatus extends Enum
{
    const NEW = 0;
    const IN_PROGRESS = 1;
    const PARSED = 2;
    const COMPLETED = 3;
    const FAILED = 4;
}

/**
 * Class ConstAiConvertPageTypes
 */
class ConstAiConvertPageTypes extends Enum
{
    const HOME = 1;
    const COLLECTION = 2;
    const PRODUCT = 3;
}

/**
 * Class ConstPageStatus
 */
class ConstPageStatus extends Enum
{
    const SUSPENDED = 0;
    const ACTIVE = 1;
}

/**
 * Class ConstAiConvertStatus
 */
class ConstPageIncludeFooterAndHeader extends Enum
{
    const NO = 0;
    const YES = 1;
}

