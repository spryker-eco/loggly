<?php

/**
 * MIT License
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace SprykerEcoTest\Zed\Loggly\Commmunination\Plugin;

use Codeception\Test\Unit;
use SprykerEco\Zed\Loggly\Communication\Plugin\LogglyLoggerQueueMessageProcessorPlugin;

/**
 * Auto-generated group annotations
 *
 * @group SprykerTest
 * @group Zed
 * @group Business
 * @group Model
 * @group Exchange
 * @group Filter
 * @group ExchangeFilterByNameTest
 * Add your own group annotations below this line
 */
class LogglyLoggerQueueMessageProcessorPluginTest extends Unit
{
    /**
     * @return void
     */
    public function testProcessMessagesEmpty(): void
    {
        $plugin = new LogglyLoggerQueueMessageProcessorPlugin();
        $result = $plugin->processMessages([]);
        $this->assertSame([], $result);
    }
}
