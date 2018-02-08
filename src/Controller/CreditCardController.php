<?php

namespace App\Controller;

use App\Model\CreditCard;
use App\Validator\CreditCardValidator;
use App\Validator\Interfaces\ValidatorInterface;

class CreditCardController
{
    private $creditCardValidator;

    /**
     * Constructor.
     *
     * @param ValidatorInterface $creditCardValidator
     */
    public function __construct(ValidatorInterface $creditCardValidator)
    {
        $this->creditCardValidator = $creditCardValidator;
    }

    /**
     * Render the credit card validation view
     *
     * @return string
     */
    public function renderCreditCardView()
    {
        return (include __DIR__ . '/../View/validation_view.php');
    }

    /**
     * Main method for validating a credit card object
     *
     * @param CreditCard $creditCard
     *
     * @return bool
     */
    public function validateCreditCard(CreditCard $creditCard)
    {
        return $this->isValidCreditCardNumber($creditCard->getCardNumber());
    }

    /**
     * Method to check if the argument it's a valid credit card number
     * This method can be re-used for other functions in different parts of the application
     *
     * @param string $creditCardNumber
     *
     * @return bool
     */
    public function isValidCreditCardNumber($creditCardNumber)
    {
        return $this->creditCardValidator->validate($creditCardNumber);
    }
}