<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace SprykerEco\Shared\Loggly;

/**
 * Declares global environment configuration keys. Do not use it for other class constants.
 */
interface LogglyConstants
{
    /**
     * Specification:
     * - Token for your loggly account.
     *
     * @api
     *
     * @var string
     */
    public const TOKEN = 'LOGGLY:TOKEN';

    /**
     * Specification:
     * - Name of your Loggly log queue (default: loggly-log-queue).
     *
     * @api
     *
     * @var string
     */
    public const QUEUE_NAME = 'LOGGLY:QUEUE_NAME';

    /**
     * Specification:
     * - Name of your Loggly log error queue (default: loggly-log-queue-error).
     *
     * @api
     *
     * @var string
     */
    public const ERROR_QUEUE_NAME = 'LOGGLY:ERROR_QUEUE_NAME';

    /**
     * Specification:
     * - Chunk size for messages to be processed from queue (default: 50).
     *
     * @api
     *
     * @var string
     */
    public const QUEUE_CHUNK_SIZE = 'LOGGLY:QUEUE_CHUNK_SIZE';
}
