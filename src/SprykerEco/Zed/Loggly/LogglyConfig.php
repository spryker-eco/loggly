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

    const QUEUE_NAME_DEFAULT = 'loggly-log-queue';

    const HOST = 'logs-01.loggly.com';
    const ENDPOINT_BULK = 'bulk';

    /**
     * @return \Spryker\Shared\Config\Config
     */
    public function getLogglyToken()
    {
        return $this->get(LogglyConstants::TOKEN);
    }

    /**
     * @return string
     */
    public function getEndpoint()
    {
        return sprintf('https://%s/%s/%s/', static::HOST, static::ENDPOINT_BULK, $this->getLogglyToken());
    }

    /**
     * @return string
     */
    public function getQueueName()
    {
        return $this->get(LogglyConstants::QUEUE_NAME, static::QUEUE_NAME_DEFAULT);
    }

    /**
     * @return string
     */
    public function getQueueChunkSize()
    {
        return $this->get(LogglyConstants::QUEUE_CHUNK_SIZE, 50);
    }

}
