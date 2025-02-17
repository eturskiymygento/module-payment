<?php

/**
 * @author Mygento Team
 * @copyright 2016-2019 Mygento (https://www.mygento.ru)
 * @package Mygento_Payment
 */

namespace Mygento\Payment\Gateway\Config;

class CanVoidHandler implements \Magento\Payment\Gateway\Config\ValueHandlerInterface
{
    /**
     * Retrieve method configured value
     *
     * @param array $subject
     * @param int|null $storeId
     *
     * @return mixed
     * @SuppressWarnings(PHPMD.UnusedFormalParameter)
     */
    public function handle(array $subject, $storeId = null)
    {
        $payment = $subject['payment']->getPayment();
        if (!$payment) {
            return false;
        }

        return $payment->getAuthorizationTransaction() &&
          (bool) $payment->getAmountAuthorized() &&
          !(bool) $payment->getAmountPaid();
    }
}
