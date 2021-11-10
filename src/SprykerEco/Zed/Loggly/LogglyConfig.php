<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace SprykerEco\Zed\Loggly;

use Spryker\Zed\Kernel\AbstractBundleConfig;
use SprykerEco\Shared\Loggly\LogglyConstants;

class LogglyConfig extends AbstractBundleConfig
{
    /**
     * @var string
     */
    public const DEFAULT_QUEUE_NAME = 'loggly-log-queue';

    /**
     * @var string
     */
    public const DEFAULT_ERROR_QUEUE_NAME = 'loggly-log-queue.error';

    /**
     * @var string
     */
    public const HOST = 'logs-01.loggly.com';

    /**
     * @var string
     */
    public const ENDPOINT_BULK = 'bulk';

    /**
     * @api
     *
     * @return string
     */
    public function getLogglyToken(): string
    {
        return $this->get(LogglyConstants::TOKEN);
    }

    /**
     * @api
     *
     * @return string
     */
    public function getEndpoint(): string
    {
        return sprintf('https://%s/%s/%s/', static::HOST, static::ENDPOINT_BULK, $this->getLogglyToken());
    }

    /**
     * @api
     *
     * @return string
     */
    public function getQueueName(): string
    {
        return $this->get(LogglyConstants::QUEUE_NAME, static::DEFAULT_QUEUE_NAME);
    }

    /**
     * @api
     *
     * @return int
     */
    public function getQueueChunkSize(): int
    {
        return $this->get(LogglyConstants::QUEUE_CHUNK_SIZE, 50);
    }
}
