<?php
/**
 * (c) 2012 Vespolina Project http://www.vespolina-project.org
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */
namespace Vespolina\CommonBundle\Model;

use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;

/** @ODM\EmbeddedDocument */
abstract class CreditCardProfile
{
    /** @ODM\EmbedOne(targetDocument="Vespolina\CommonBundle\Document\Address") */
    protected $address;

    /** @ODM\String */
    protected $persistedCardNumber;

    protected $activeCardNumber;

    /** @ODM\Hash */
    protected $expiration;

    /** @ODM\String */
    protected $cardType;

    public function setAddress($address)
    {
        $this->address = $address;
    }

    public function getAddress()
    {
        return $this->address;
    }

    public function setCardNumber($cardNumber)
    {

    }

    public function getCardNumber($type = null)
    {
        if ($type === 'active') {
            return $this->activeCardNumber;
        }
        return $this->persistedCardNumber;
    }

    public function setCardType($cardType)
    {
        $this->cardType = $cardType;
    }

    public function getCardType()
    {
        return $this->cardType;
    }

    public function setExpiration($month, $year)
    {
        $this->expiration = array('month' => $month, 'year' => $year);
    }

    public function getExpiration()
    {
        return $this->expiration;
    }

}