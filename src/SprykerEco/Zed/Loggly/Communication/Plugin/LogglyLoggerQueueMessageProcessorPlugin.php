<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace SprykerEco\Zed\Loggly\Communication\Plugin;

use Exception;
use Monolog\Handler\Curl\Util;
use Spryker\Zed\Kernel\Communication\AbstractPlugin;
use Spryker\Zed\Queue\Dependency\Plugin\QueueMessageProcessorPluginInterface;

/**
 * @method \SprykerEco\Zed\Loggly\LogglyConfig getConfig()
 */
class LogglyLoggerQueueMessageProcessorPlugin extends AbstractPlugin implements QueueMessageProcessorPluginInterface
{
    /**
     * {@inheritDoc}
     *
     * @api
     *
     * @param array<\Generated\Shared\Transfer\QueueReceiveMessageTransfer> $queueMessageTransfers
     *
     * @return array<\Generated\Shared\Transfer\QueueReceiveMessageTransfer>
     */
    public function processMessages(array $queueMessageTransfers): array
    {
        try {
            $data = '';
            foreach ($queueMessageTransfers as $queueMessageTransfer) {
                /** @var \Generated\Shared\Transfer\QueueSendMessageTransfer $message */
                $message = $queueMessageTransfer->getQueueMessage();
                $data .= $message->getBody() . PHP_EOL;
            }
            $url = $this->getConfig()->getEndpoint();

            $headers = ['Content-Type: application/json'];

            $curlHandler = curl_init();

            curl_setopt($curlHandler, CURLOPT_URL, $url);
            curl_setopt($curlHandler, CURLOPT_POST, true);
            curl_setopt($curlHandler, CURLOPT_POSTFIELDS, $data);
            curl_setopt($curlHandler, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($curlHandler, CURLOPT_RETURNTRANSFER, true);

            Util::execute($curlHandler);

            foreach ($queueMessageTransfers as $queueMessageTransfer) {
                $queueMessageTransfer->setAcknowledge(true);
            }
        } catch (Exception $e) {
            foreach ($queueMessageTransfers as $queueMessageTransfer) {
                $queueMessageTransfer->setHasError(true);
            }
        }

        return $queueMessageTransfers;
    }

    /**
     * {@inheritDoc}
     *
     * @api
     *
     * @return int
     */
    public function getChunkSize(): int
    {
        return $this->getConfig()->getQueueChunkSize();
    }
}
