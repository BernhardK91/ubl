<?php

namespace horstoeko\ubl\entities\cac;

/**
 * Class representing InvoiceLineType
 *
 * ABIE
 *  Invoice Line. Details
 *  Information about an Invoice Line.
 *  Invoice Line
 * XSD Type: InvoiceLineType
 */
class InvoiceLineType
{

    /**
     * BBIE
     *  Invoice Line. Identifier
     *  Identifies the Invoice Line.
     *  1
     *  Invoice Line
     *  Identifier
     *  Identifier
     *  Identifier. Type
     *
     * @var \horstoeko\ubl\entities\cbc\ID $iD
     */
    private $iD = null;

    /**
     * BBIE
     *  Invoice Line. UUID. Identifier
     *  A universally unique identifier for an instance of this ABIE.
     *  0..1
     *  Invoice Line
     *  UUID
     *  Identifier
     *  Identifier. Type
     *
     * @var \horstoeko\ubl\entities\cbc\UUID $uUID
     */
    private $uUID = null;

    /**
     * BBIE
     *  Invoice Line. Note. Text
     *  Free-form text applying to the Invoice Line. This element may contain notes or any other similar information that is not contained explicitly in another structure.
     *  0..1
     *  Invoice Line
     *  Note
     *  Text
     *  Text. Type
     *
     * @var \horstoeko\ubl\entities\cbc\Note $note
     */
    private $note = null;

    /**
     * BBIE
     *  Invoice Line. Invoiced_ Quantity. Quantity
     *  The quantity (of Items) on the Invoice Line.
     *  0..1
     *  Invoice Line
     *  Invoiced
     *  Quantity
     *  Quantity
     *  Quantity. Type
     *
     * @var \horstoeko\ubl\entities\cbc\InvoicedQuantity $invoicedQuantity
     */
    private $invoicedQuantity = null;

    /**
     * BBIE
     *  Invoice Line. Line Extension Amount. Amount
     *  The total amount for the Invoice Line, including Allowance Charges but net of taxes.
     *  1
     *  Invoice Line
     *  Line Extension Amount
     *  Amount
     *  Amount. Type
     *
     * @var \horstoeko\ubl\entities\cbc\LineExtensionAmount $lineExtensionAmount
     */
    private $lineExtensionAmount = null;

    /**
     * BBIE
     *  Invoice Line. Tax Point Date. Date
     *  The date of the Invoice Line, used to indicate the point at which tax becomes applicable.
     *  0..1
     *  Invoice Line
     *  Tax Point Date
     *  Date
     *  Date. Type
     *
     * @var \DateTime $taxPointDate
     */
    private $taxPointDate = null;

    /**
     * BBIE
     *  Invoice Line. Accounting Cost Code. Code
     *  The buyer's accounting code applied to the Invoice Line.
     *  0..1
     *  Invoice Line
     *  Accounting Cost Code
     *  Code
     *  Code. Type
     *
     * @var \horstoeko\ubl\entities\cbc\AccountingCostCode $accountingCostCode
     */
    private $accountingCostCode = null;

    /**
     * BBIE
     *  Invoice Line. Accounting Cost. Text
     *  The buyer's accounting code applied to the Invoice Line, expressed as text.
     *  0..1
     *  Invoice Line
     *  Accounting Cost
     *  Text
     *  Text. Type
     *
     * @var \horstoeko\ubl\entities\cbc\AccountingCost $accountingCost
     */
    private $accountingCost = null;

    /**
     * BBIE
     *  Invoice Line. Free Of Charge_ Indicator. Indicator
     *  Indicates whether the Invoice Line is Free Of Charge (default = false).
     *  0..1
     *  Invoice Line
     *  Free Of Charge
     *  Indicator
     *  Indicator
     *  Indicator. Type
     *
     * @var bool $freeOfChargeIndicator
     */
    private $freeOfChargeIndicator = null;

    /**
     * ASBIE
     *  Invoice Line. Order Line Reference
     *  An association to Order Line Reference.
     *  0..n
     *  Invoice Line
     *  Order Line Reference
     *  Order Line Reference
     *
     * @var \horstoeko\ubl\entities\cac\OrderLineReference[] $orderLineReference
     */
    private $orderLineReference = [
        
    ];

    /**
     * ASBIE
     *  Invoice Line. Despatch_ Line Reference. Line Reference
     *  An associative reference to Despatch Line.
     *  0..n
     *  Invoice Line
     *  Despatch
     *  Line Reference
     *  Line Reference
     *
     * @var \horstoeko\ubl\entities\cac\DespatchLineReference[] $despatchLineReference
     */
    private $despatchLineReference = [
        
    ];

    /**
     * ASBIE
     *  Invoice Line. Receipt_ Line Reference. Line Reference
     *  An associative reference to Receipt Line.
     *  0..n
     *  Invoice Line
     *  Receipt
     *  Line Reference
     *  Line Reference
     *
     * @var \horstoeko\ubl\entities\cac\ReceiptLineReference[] $receiptLineReference
     */
    private $receiptLineReference = [
        
    ];

    /**
     * ASBIE
     *  Invoice Line. Billing Reference
     *  An association to Billing Reference.
     *  0..n
     *  Invoice Line
     *  Billing Reference
     *  Billing Reference
     *
     * @var \horstoeko\ubl\entities\cac\BillingReference[] $billingReference
     */
    private $billingReference = [
        
    ];

    /**
     * ASBIE
     *  Invoice Line. Document Reference
     *  An association to Document Reference.
     *  0..n
     *  Invoice Line
     *  Document Reference
     *  Document Reference
     *
     * @var \horstoeko\ubl\entities\cac\DocumentReference[] $documentReference
     */
    private $documentReference = [
        
    ];

    /**
     * ASBIE
     *  Invoice Line. Pricing Reference
     *  An association to Pricing Reference.
     *  0..1
     *  Invoice Line
     *  Pricing Reference
     *  Pricing Reference
     *
     * @var \horstoeko\ubl\entities\cac\PricingReference $pricingReference
     */
    private $pricingReference = null;

    /**
     * ASBIE
     *  Invoice Line. Originator_ Party. Party
     *  The party who originated the Order to which the Invoice is related.
     *  0..1
     *  Invoice Line
     *  Originator
     *  Party
     *  Party
     *
     * @var \horstoeko\ubl\entities\cac\OriginatorParty $originatorParty
     */
    private $originatorParty = null;

    /**
     * ASBIE
     *  Invoice Line. Delivery
     *  An association to Delivery.
     *  0..n
     *  Invoice Line
     *  Delivery
     *  Delivery
     *
     * @var \horstoeko\ubl\entities\cac\Delivery[] $delivery
     */
    private $delivery = [
        
    ];

    /**
     * ASBIE
     *  Invoice Line. Payment Terms
     *  An association to Payment Terms.
     *  0..n
     *  Invoice Line
     *  Payment Terms
     *  Payment Terms
     *
     * @var \horstoeko\ubl\entities\cac\PaymentTerms[] $paymentTerms
     */
    private $paymentTerms = [
        
    ];

    /**
     * ASBIE
     *  Invoice Line. Allowance Charge
     *  An association to Allowance Charge.
     *  0..n
     *  Invoice Line
     *  Allowance Charge
     *  Allowance Charge
     *
     * @var \horstoeko\ubl\entities\cac\AllowanceCharge[] $allowanceCharge
     */
    private $allowanceCharge = [
        
    ];

    /**
     * ASBIE
     *  Invoice Line. Tax Total
     *  An association to Tax Total.
     *  0..n
     *  Invoice Line
     *  Tax Total
     *  Tax Total
     *
     * @var \horstoeko\ubl\entities\cac\TaxTotal[] $taxTotal
     */
    private $taxTotal = [
        
    ];

    /**
     * ASBIE
     *  Invoice Line. Item
     *  An association to Item.
     *  1
     *  Invoice Line
     *  Item
     *  Item
     *
     * @var \horstoeko\ubl\entities\cac\Item $item
     */
    private $item = null;

    /**
     * ASBIE
     *  Invoice Line. Price
     *  An association to Price.
     *  0..1
     *  Invoice Line
     *  Price
     *  Price
     *
     * @var \horstoeko\ubl\entities\cac\Price $price
     */
    private $price = null;

    /**
     * ASBIE
     *  Invoice Line. Delivery Terms
     *  An association to Delivery Terms.
     *  0..1
     *  Invoice Line
     *  Delivery Terms
     *  Delivery Terms
     *
     * @var \horstoeko\ubl\entities\cac\DeliveryTerms $deliveryTerms
     */
    private $deliveryTerms = null;

    /**
     * Gets as iD
     *
     * BBIE
     *  Invoice Line. Identifier
     *  Identifies the Invoice Line.
     *  1
     *  Invoice Line
     *  Identifier
     *  Identifier
     *  Identifier. Type
     *
     * @return \horstoeko\ubl\entities\cbc\ID
     */
    public function getID()
    {
        return $this->iD;
    }

    /**
     * Sets a new iD
     *
     * BBIE
     *  Invoice Line. Identifier
     *  Identifies the Invoice Line.
     *  1
     *  Invoice Line
     *  Identifier
     *  Identifier
     *  Identifier. Type
     *
     * @param \horstoeko\ubl\entities\cbc\ID $iD
     * @return self
     */
    public function setID(\horstoeko\ubl\entities\cbc\ID $iD)
    {
        $this->iD = $iD;
        return $this;
    }

    /**
     * Gets as uUID
     *
     * BBIE
     *  Invoice Line. UUID. Identifier
     *  A universally unique identifier for an instance of this ABIE.
     *  0..1
     *  Invoice Line
     *  UUID
     *  Identifier
     *  Identifier. Type
     *
     * @return \horstoeko\ubl\entities\cbc\UUID
     */
    public function getUUID()
    {
        return $this->uUID;
    }

    /**
     * Sets a new uUID
     *
     * BBIE
     *  Invoice Line. UUID. Identifier
     *  A universally unique identifier for an instance of this ABIE.
     *  0..1
     *  Invoice Line
     *  UUID
     *  Identifier
     *  Identifier. Type
     *
     * @param \horstoeko\ubl\entities\cbc\UUID $uUID
     * @return self
     */
    public function setUUID(\horstoeko\ubl\entities\cbc\UUID $uUID)
    {
        $this->uUID = $uUID;
        return $this;
    }

    /**
     * Gets as note
     *
     * BBIE
     *  Invoice Line. Note. Text
     *  Free-form text applying to the Invoice Line. This element may contain notes or any other similar information that is not contained explicitly in another structure.
     *  0..1
     *  Invoice Line
     *  Note
     *  Text
     *  Text. Type
     *
     * @return \horstoeko\ubl\entities\cbc\Note
     */
    public function getNote()
    {
        return $this->note;
    }

    /**
     * Sets a new note
     *
     * BBIE
     *  Invoice Line. Note. Text
     *  Free-form text applying to the Invoice Line. This element may contain notes or any other similar information that is not contained explicitly in another structure.
     *  0..1
     *  Invoice Line
     *  Note
     *  Text
     *  Text. Type
     *
     * @param \horstoeko\ubl\entities\cbc\Note $note
     * @return self
     */
    public function setNote(\horstoeko\ubl\entities\cbc\Note $note)
    {
        $this->note = $note;
        return $this;
    }

    /**
     * Gets as invoicedQuantity
     *
     * BBIE
     *  Invoice Line. Invoiced_ Quantity. Quantity
     *  The quantity (of Items) on the Invoice Line.
     *  0..1
     *  Invoice Line
     *  Invoiced
     *  Quantity
     *  Quantity
     *  Quantity. Type
     *
     * @return \horstoeko\ubl\entities\cbc\InvoicedQuantity
     */
    public function getInvoicedQuantity()
    {
        return $this->invoicedQuantity;
    }

    /**
     * Sets a new invoicedQuantity
     *
     * BBIE
     *  Invoice Line. Invoiced_ Quantity. Quantity
     *  The quantity (of Items) on the Invoice Line.
     *  0..1
     *  Invoice Line
     *  Invoiced
     *  Quantity
     *  Quantity
     *  Quantity. Type
     *
     * @param \horstoeko\ubl\entities\cbc\InvoicedQuantity $invoicedQuantity
     * @return self
     */
    public function setInvoicedQuantity(\horstoeko\ubl\entities\cbc\InvoicedQuantity $invoicedQuantity)
    {
        $this->invoicedQuantity = $invoicedQuantity;
        return $this;
    }

    /**
     * Gets as lineExtensionAmount
     *
     * BBIE
     *  Invoice Line. Line Extension Amount. Amount
     *  The total amount for the Invoice Line, including Allowance Charges but net of taxes.
     *  1
     *  Invoice Line
     *  Line Extension Amount
     *  Amount
     *  Amount. Type
     *
     * @return \horstoeko\ubl\entities\cbc\LineExtensionAmount
     */
    public function getLineExtensionAmount()
    {
        return $this->lineExtensionAmount;
    }

    /**
     * Sets a new lineExtensionAmount
     *
     * BBIE
     *  Invoice Line. Line Extension Amount. Amount
     *  The total amount for the Invoice Line, including Allowance Charges but net of taxes.
     *  1
     *  Invoice Line
     *  Line Extension Amount
     *  Amount
     *  Amount. Type
     *
     * @param \horstoeko\ubl\entities\cbc\LineExtensionAmount $lineExtensionAmount
     * @return self
     */
    public function setLineExtensionAmount(\horstoeko\ubl\entities\cbc\LineExtensionAmount $lineExtensionAmount)
    {
        $this->lineExtensionAmount = $lineExtensionAmount;
        return $this;
    }

    /**
     * Gets as taxPointDate
     *
     * BBIE
     *  Invoice Line. Tax Point Date. Date
     *  The date of the Invoice Line, used to indicate the point at which tax becomes applicable.
     *  0..1
     *  Invoice Line
     *  Tax Point Date
     *  Date
     *  Date. Type
     *
     * @return \DateTime
     */
    public function getTaxPointDate()
    {
        return $this->taxPointDate;
    }

    /**
     * Sets a new taxPointDate
     *
     * BBIE
     *  Invoice Line. Tax Point Date. Date
     *  The date of the Invoice Line, used to indicate the point at which tax becomes applicable.
     *  0..1
     *  Invoice Line
     *  Tax Point Date
     *  Date
     *  Date. Type
     *
     * @param \DateTime $taxPointDate
     * @return self
     */
    public function setTaxPointDate(\DateTime $taxPointDate)
    {
        $this->taxPointDate = $taxPointDate;
        return $this;
    }

    /**
     * Gets as accountingCostCode
     *
     * BBIE
     *  Invoice Line. Accounting Cost Code. Code
     *  The buyer's accounting code applied to the Invoice Line.
     *  0..1
     *  Invoice Line
     *  Accounting Cost Code
     *  Code
     *  Code. Type
     *
     * @return \horstoeko\ubl\entities\cbc\AccountingCostCode
     */
    public function getAccountingCostCode()
    {
        return $this->accountingCostCode;
    }

    /**
     * Sets a new accountingCostCode
     *
     * BBIE
     *  Invoice Line. Accounting Cost Code. Code
     *  The buyer's accounting code applied to the Invoice Line.
     *  0..1
     *  Invoice Line
     *  Accounting Cost Code
     *  Code
     *  Code. Type
     *
     * @param \horstoeko\ubl\entities\cbc\AccountingCostCode $accountingCostCode
     * @return self
     */
    public function setAccountingCostCode(\horstoeko\ubl\entities\cbc\AccountingCostCode $accountingCostCode)
    {
        $this->accountingCostCode = $accountingCostCode;
        return $this;
    }

    /**
     * Gets as accountingCost
     *
     * BBIE
     *  Invoice Line. Accounting Cost. Text
     *  The buyer's accounting code applied to the Invoice Line, expressed as text.
     *  0..1
     *  Invoice Line
     *  Accounting Cost
     *  Text
     *  Text. Type
     *
     * @return \horstoeko\ubl\entities\cbc\AccountingCost
     */
    public function getAccountingCost()
    {
        return $this->accountingCost;
    }

    /**
     * Sets a new accountingCost
     *
     * BBIE
     *  Invoice Line. Accounting Cost. Text
     *  The buyer's accounting code applied to the Invoice Line, expressed as text.
     *  0..1
     *  Invoice Line
     *  Accounting Cost
     *  Text
     *  Text. Type
     *
     * @param \horstoeko\ubl\entities\cbc\AccountingCost $accountingCost
     * @return self
     */
    public function setAccountingCost(\horstoeko\ubl\entities\cbc\AccountingCost $accountingCost)
    {
        $this->accountingCost = $accountingCost;
        return $this;
    }

    /**
     * Gets as freeOfChargeIndicator
     *
     * BBIE
     *  Invoice Line. Free Of Charge_ Indicator. Indicator
     *  Indicates whether the Invoice Line is Free Of Charge (default = false).
     *  0..1
     *  Invoice Line
     *  Free Of Charge
     *  Indicator
     *  Indicator
     *  Indicator. Type
     *
     * @return bool
     */
    public function getFreeOfChargeIndicator()
    {
        return $this->freeOfChargeIndicator;
    }

    /**
     * Sets a new freeOfChargeIndicator
     *
     * BBIE
     *  Invoice Line. Free Of Charge_ Indicator. Indicator
     *  Indicates whether the Invoice Line is Free Of Charge (default = false).
     *  0..1
     *  Invoice Line
     *  Free Of Charge
     *  Indicator
     *  Indicator
     *  Indicator. Type
     *
     * @param bool $freeOfChargeIndicator
     * @return self
     */
    public function setFreeOfChargeIndicator($freeOfChargeIndicator)
    {
        $this->freeOfChargeIndicator = $freeOfChargeIndicator;
        return $this;
    }

    /**
     * Adds as orderLineReference
     *
     * ASBIE
     *  Invoice Line. Order Line Reference
     *  An association to Order Line Reference.
     *  0..n
     *  Invoice Line
     *  Order Line Reference
     *  Order Line Reference
     *
     * @return self
     * @param \horstoeko\ubl\entities\cac\OrderLineReference $orderLineReference
     */
    public function addToOrderLineReference(\horstoeko\ubl\entities\cac\OrderLineReference $orderLineReference)
    {
        $this->orderLineReference[] = $orderLineReference;
        return $this;
    }

    /**
     * isset orderLineReference
     *
     * ASBIE
     *  Invoice Line. Order Line Reference
     *  An association to Order Line Reference.
     *  0..n
     *  Invoice Line
     *  Order Line Reference
     *  Order Line Reference
     *
     * @param int|string $index
     * @return bool
     */
    public function issetOrderLineReference($index)
    {
        return isset($this->orderLineReference[$index]);
    }

    /**
     * unset orderLineReference
     *
     * ASBIE
     *  Invoice Line. Order Line Reference
     *  An association to Order Line Reference.
     *  0..n
     *  Invoice Line
     *  Order Line Reference
     *  Order Line Reference
     *
     * @param int|string $index
     * @return void
     */
    public function unsetOrderLineReference($index)
    {
        unset($this->orderLineReference[$index]);
    }

    /**
     * Gets as orderLineReference
     *
     * ASBIE
     *  Invoice Line. Order Line Reference
     *  An association to Order Line Reference.
     *  0..n
     *  Invoice Line
     *  Order Line Reference
     *  Order Line Reference
     *
     * @return \horstoeko\ubl\entities\cac\OrderLineReference[]
     */
    public function getOrderLineReference()
    {
        return $this->orderLineReference;
    }

    /**
     * Sets a new orderLineReference
     *
     * ASBIE
     *  Invoice Line. Order Line Reference
     *  An association to Order Line Reference.
     *  0..n
     *  Invoice Line
     *  Order Line Reference
     *  Order Line Reference
     *
     * @param \horstoeko\ubl\entities\cac\OrderLineReference[] $orderLineReference
     * @return self
     */
    public function setOrderLineReference(array $orderLineReference)
    {
        $this->orderLineReference = $orderLineReference;
        return $this;
    }

    /**
     * Adds as despatchLineReference
     *
     * ASBIE
     *  Invoice Line. Despatch_ Line Reference. Line Reference
     *  An associative reference to Despatch Line.
     *  0..n
     *  Invoice Line
     *  Despatch
     *  Line Reference
     *  Line Reference
     *
     * @return self
     * @param \horstoeko\ubl\entities\cac\DespatchLineReference $despatchLineReference
     */
    public function addToDespatchLineReference(\horstoeko\ubl\entities\cac\DespatchLineReference $despatchLineReference)
    {
        $this->despatchLineReference[] = $despatchLineReference;
        return $this;
    }

    /**
     * isset despatchLineReference
     *
     * ASBIE
     *  Invoice Line. Despatch_ Line Reference. Line Reference
     *  An associative reference to Despatch Line.
     *  0..n
     *  Invoice Line
     *  Despatch
     *  Line Reference
     *  Line Reference
     *
     * @param int|string $index
     * @return bool
     */
    public function issetDespatchLineReference($index)
    {
        return isset($this->despatchLineReference[$index]);
    }

    /**
     * unset despatchLineReference
     *
     * ASBIE
     *  Invoice Line. Despatch_ Line Reference. Line Reference
     *  An associative reference to Despatch Line.
     *  0..n
     *  Invoice Line
     *  Despatch
     *  Line Reference
     *  Line Reference
     *
     * @param int|string $index
     * @return void
     */
    public function unsetDespatchLineReference($index)
    {
        unset($this->despatchLineReference[$index]);
    }

    /**
     * Gets as despatchLineReference
     *
     * ASBIE
     *  Invoice Line. Despatch_ Line Reference. Line Reference
     *  An associative reference to Despatch Line.
     *  0..n
     *  Invoice Line
     *  Despatch
     *  Line Reference
     *  Line Reference
     *
     * @return \horstoeko\ubl\entities\cac\DespatchLineReference[]
     */
    public function getDespatchLineReference()
    {
        return $this->despatchLineReference;
    }

    /**
     * Sets a new despatchLineReference
     *
     * ASBIE
     *  Invoice Line. Despatch_ Line Reference. Line Reference
     *  An associative reference to Despatch Line.
     *  0..n
     *  Invoice Line
     *  Despatch
     *  Line Reference
     *  Line Reference
     *
     * @param \horstoeko\ubl\entities\cac\DespatchLineReference[] $despatchLineReference
     * @return self
     */
    public function setDespatchLineReference(array $despatchLineReference)
    {
        $this->despatchLineReference = $despatchLineReference;
        return $this;
    }

    /**
     * Adds as receiptLineReference
     *
     * ASBIE
     *  Invoice Line. Receipt_ Line Reference. Line Reference
     *  An associative reference to Receipt Line.
     *  0..n
     *  Invoice Line
     *  Receipt
     *  Line Reference
     *  Line Reference
     *
     * @return self
     * @param \horstoeko\ubl\entities\cac\ReceiptLineReference $receiptLineReference
     */
    public function addToReceiptLineReference(\horstoeko\ubl\entities\cac\ReceiptLineReference $receiptLineReference)
    {
        $this->receiptLineReference[] = $receiptLineReference;
        return $this;
    }

    /**
     * isset receiptLineReference
     *
     * ASBIE
     *  Invoice Line. Receipt_ Line Reference. Line Reference
     *  An associative reference to Receipt Line.
     *  0..n
     *  Invoice Line
     *  Receipt
     *  Line Reference
     *  Line Reference
     *
     * @param int|string $index
     * @return bool
     */
    public function issetReceiptLineReference($index)
    {
        return isset($this->receiptLineReference[$index]);
    }

    /**
     * unset receiptLineReference
     *
     * ASBIE
     *  Invoice Line. Receipt_ Line Reference. Line Reference
     *  An associative reference to Receipt Line.
     *  0..n
     *  Invoice Line
     *  Receipt
     *  Line Reference
     *  Line Reference
     *
     * @param int|string $index
     * @return void
     */
    public function unsetReceiptLineReference($index)
    {
        unset($this->receiptLineReference[$index]);
    }

    /**
     * Gets as receiptLineReference
     *
     * ASBIE
     *  Invoice Line. Receipt_ Line Reference. Line Reference
     *  An associative reference to Receipt Line.
     *  0..n
     *  Invoice Line
     *  Receipt
     *  Line Reference
     *  Line Reference
     *
     * @return \horstoeko\ubl\entities\cac\ReceiptLineReference[]
     */
    public function getReceiptLineReference()
    {
        return $this->receiptLineReference;
    }

    /**
     * Sets a new receiptLineReference
     *
     * ASBIE
     *  Invoice Line. Receipt_ Line Reference. Line Reference
     *  An associative reference to Receipt Line.
     *  0..n
     *  Invoice Line
     *  Receipt
     *  Line Reference
     *  Line Reference
     *
     * @param \horstoeko\ubl\entities\cac\ReceiptLineReference[] $receiptLineReference
     * @return self
     */
    public function setReceiptLineReference(array $receiptLineReference)
    {
        $this->receiptLineReference = $receiptLineReference;
        return $this;
    }

    /**
     * Adds as billingReference
     *
     * ASBIE
     *  Invoice Line. Billing Reference
     *  An association to Billing Reference.
     *  0..n
     *  Invoice Line
     *  Billing Reference
     *  Billing Reference
     *
     * @return self
     * @param \horstoeko\ubl\entities\cac\BillingReference $billingReference
     */
    public function addToBillingReference(\horstoeko\ubl\entities\cac\BillingReference $billingReference)
    {
        $this->billingReference[] = $billingReference;
        return $this;
    }

    /**
     * isset billingReference
     *
     * ASBIE
     *  Invoice Line. Billing Reference
     *  An association to Billing Reference.
     *  0..n
     *  Invoice Line
     *  Billing Reference
     *  Billing Reference
     *
     * @param int|string $index
     * @return bool
     */
    public function issetBillingReference($index)
    {
        return isset($this->billingReference[$index]);
    }

    /**
     * unset billingReference
     *
     * ASBIE
     *  Invoice Line. Billing Reference
     *  An association to Billing Reference.
     *  0..n
     *  Invoice Line
     *  Billing Reference
     *  Billing Reference
     *
     * @param int|string $index
     * @return void
     */
    public function unsetBillingReference($index)
    {
        unset($this->billingReference[$index]);
    }

    /**
     * Gets as billingReference
     *
     * ASBIE
     *  Invoice Line. Billing Reference
     *  An association to Billing Reference.
     *  0..n
     *  Invoice Line
     *  Billing Reference
     *  Billing Reference
     *
     * @return \horstoeko\ubl\entities\cac\BillingReference[]
     */
    public function getBillingReference()
    {
        return $this->billingReference;
    }

    /**
     * Sets a new billingReference
     *
     * ASBIE
     *  Invoice Line. Billing Reference
     *  An association to Billing Reference.
     *  0..n
     *  Invoice Line
     *  Billing Reference
     *  Billing Reference
     *
     * @param \horstoeko\ubl\entities\cac\BillingReference[] $billingReference
     * @return self
     */
    public function setBillingReference(array $billingReference)
    {
        $this->billingReference = $billingReference;
        return $this;
    }

    /**
     * Adds as documentReference
     *
     * ASBIE
     *  Invoice Line. Document Reference
     *  An association to Document Reference.
     *  0..n
     *  Invoice Line
     *  Document Reference
     *  Document Reference
     *
     * @return self
     * @param \horstoeko\ubl\entities\cac\DocumentReference $documentReference
     */
    public function addToDocumentReference(\horstoeko\ubl\entities\cac\DocumentReference $documentReference)
    {
        $this->documentReference[] = $documentReference;
        return $this;
    }

    /**
     * isset documentReference
     *
     * ASBIE
     *  Invoice Line. Document Reference
     *  An association to Document Reference.
     *  0..n
     *  Invoice Line
     *  Document Reference
     *  Document Reference
     *
     * @param int|string $index
     * @return bool
     */
    public function issetDocumentReference($index)
    {
        return isset($this->documentReference[$index]);
    }

    /**
     * unset documentReference
     *
     * ASBIE
     *  Invoice Line. Document Reference
     *  An association to Document Reference.
     *  0..n
     *  Invoice Line
     *  Document Reference
     *  Document Reference
     *
     * @param int|string $index
     * @return void
     */
    public function unsetDocumentReference($index)
    {
        unset($this->documentReference[$index]);
    }

    /**
     * Gets as documentReference
     *
     * ASBIE
     *  Invoice Line. Document Reference
     *  An association to Document Reference.
     *  0..n
     *  Invoice Line
     *  Document Reference
     *  Document Reference
     *
     * @return \horstoeko\ubl\entities\cac\DocumentReference[]
     */
    public function getDocumentReference()
    {
        return $this->documentReference;
    }

    /**
     * Sets a new documentReference
     *
     * ASBIE
     *  Invoice Line. Document Reference
     *  An association to Document Reference.
     *  0..n
     *  Invoice Line
     *  Document Reference
     *  Document Reference
     *
     * @param \horstoeko\ubl\entities\cac\DocumentReference[] $documentReference
     * @return self
     */
    public function setDocumentReference(array $documentReference)
    {
        $this->documentReference = $documentReference;
        return $this;
    }

    /**
     * Gets as pricingReference
     *
     * ASBIE
     *  Invoice Line. Pricing Reference
     *  An association to Pricing Reference.
     *  0..1
     *  Invoice Line
     *  Pricing Reference
     *  Pricing Reference
     *
     * @return \horstoeko\ubl\entities\cac\PricingReference
     */
    public function getPricingReference()
    {
        return $this->pricingReference;
    }

    /**
     * Sets a new pricingReference
     *
     * ASBIE
     *  Invoice Line. Pricing Reference
     *  An association to Pricing Reference.
     *  0..1
     *  Invoice Line
     *  Pricing Reference
     *  Pricing Reference
     *
     * @param \horstoeko\ubl\entities\cac\PricingReference $pricingReference
     * @return self
     */
    public function setPricingReference(\horstoeko\ubl\entities\cac\PricingReference $pricingReference)
    {
        $this->pricingReference = $pricingReference;
        return $this;
    }

    /**
     * Gets as originatorParty
     *
     * ASBIE
     *  Invoice Line. Originator_ Party. Party
     *  The party who originated the Order to which the Invoice is related.
     *  0..1
     *  Invoice Line
     *  Originator
     *  Party
     *  Party
     *
     * @return \horstoeko\ubl\entities\cac\OriginatorParty
     */
    public function getOriginatorParty()
    {
        return $this->originatorParty;
    }

    /**
     * Sets a new originatorParty
     *
     * ASBIE
     *  Invoice Line. Originator_ Party. Party
     *  The party who originated the Order to which the Invoice is related.
     *  0..1
     *  Invoice Line
     *  Originator
     *  Party
     *  Party
     *
     * @param \horstoeko\ubl\entities\cac\OriginatorParty $originatorParty
     * @return self
     */
    public function setOriginatorParty(\horstoeko\ubl\entities\cac\OriginatorParty $originatorParty)
    {
        $this->originatorParty = $originatorParty;
        return $this;
    }

    /**
     * Adds as delivery
     *
     * ASBIE
     *  Invoice Line. Delivery
     *  An association to Delivery.
     *  0..n
     *  Invoice Line
     *  Delivery
     *  Delivery
     *
     * @return self
     * @param \horstoeko\ubl\entities\cac\Delivery $delivery
     */
    public function addToDelivery(\horstoeko\ubl\entities\cac\Delivery $delivery)
    {
        $this->delivery[] = $delivery;
        return $this;
    }

    /**
     * isset delivery
     *
     * ASBIE
     *  Invoice Line. Delivery
     *  An association to Delivery.
     *  0..n
     *  Invoice Line
     *  Delivery
     *  Delivery
     *
     * @param int|string $index
     * @return bool
     */
    public function issetDelivery($index)
    {
        return isset($this->delivery[$index]);
    }

    /**
     * unset delivery
     *
     * ASBIE
     *  Invoice Line. Delivery
     *  An association to Delivery.
     *  0..n
     *  Invoice Line
     *  Delivery
     *  Delivery
     *
     * @param int|string $index
     * @return void
     */
    public function unsetDelivery($index)
    {
        unset($this->delivery[$index]);
    }

    /**
     * Gets as delivery
     *
     * ASBIE
     *  Invoice Line. Delivery
     *  An association to Delivery.
     *  0..n
     *  Invoice Line
     *  Delivery
     *  Delivery
     *
     * @return \horstoeko\ubl\entities\cac\Delivery[]
     */
    public function getDelivery()
    {
        return $this->delivery;
    }

    /**
     * Sets a new delivery
     *
     * ASBIE
     *  Invoice Line. Delivery
     *  An association to Delivery.
     *  0..n
     *  Invoice Line
     *  Delivery
     *  Delivery
     *
     * @param \horstoeko\ubl\entities\cac\Delivery[] $delivery
     * @return self
     */
    public function setDelivery(array $delivery)
    {
        $this->delivery = $delivery;
        return $this;
    }

    /**
     * Adds as paymentTerms
     *
     * ASBIE
     *  Invoice Line. Payment Terms
     *  An association to Payment Terms.
     *  0..n
     *  Invoice Line
     *  Payment Terms
     *  Payment Terms
     *
     * @return self
     * @param \horstoeko\ubl\entities\cac\PaymentTerms $paymentTerms
     */
    public function addToPaymentTerms(\horstoeko\ubl\entities\cac\PaymentTerms $paymentTerms)
    {
        $this->paymentTerms[] = $paymentTerms;
        return $this;
    }

    /**
     * isset paymentTerms
     *
     * ASBIE
     *  Invoice Line. Payment Terms
     *  An association to Payment Terms.
     *  0..n
     *  Invoice Line
     *  Payment Terms
     *  Payment Terms
     *
     * @param int|string $index
     * @return bool
     */
    public function issetPaymentTerms($index)
    {
        return isset($this->paymentTerms[$index]);
    }

    /**
     * unset paymentTerms
     *
     * ASBIE
     *  Invoice Line. Payment Terms
     *  An association to Payment Terms.
     *  0..n
     *  Invoice Line
     *  Payment Terms
     *  Payment Terms
     *
     * @param int|string $index
     * @return void
     */
    public function unsetPaymentTerms($index)
    {
        unset($this->paymentTerms[$index]);
    }

    /**
     * Gets as paymentTerms
     *
     * ASBIE
     *  Invoice Line. Payment Terms
     *  An association to Payment Terms.
     *  0..n
     *  Invoice Line
     *  Payment Terms
     *  Payment Terms
     *
     * @return \horstoeko\ubl\entities\cac\PaymentTerms[]
     */
    public function getPaymentTerms()
    {
        return $this->paymentTerms;
    }

    /**
     * Sets a new paymentTerms
     *
     * ASBIE
     *  Invoice Line. Payment Terms
     *  An association to Payment Terms.
     *  0..n
     *  Invoice Line
     *  Payment Terms
     *  Payment Terms
     *
     * @param \horstoeko\ubl\entities\cac\PaymentTerms[] $paymentTerms
     * @return self
     */
    public function setPaymentTerms(array $paymentTerms)
    {
        $this->paymentTerms = $paymentTerms;
        return $this;
    }

    /**
     * Adds as allowanceCharge
     *
     * ASBIE
     *  Invoice Line. Allowance Charge
     *  An association to Allowance Charge.
     *  0..n
     *  Invoice Line
     *  Allowance Charge
     *  Allowance Charge
     *
     * @return self
     * @param \horstoeko\ubl\entities\cac\AllowanceCharge $allowanceCharge
     */
    public function addToAllowanceCharge(\horstoeko\ubl\entities\cac\AllowanceCharge $allowanceCharge)
    {
        $this->allowanceCharge[] = $allowanceCharge;
        return $this;
    }

    /**
     * isset allowanceCharge
     *
     * ASBIE
     *  Invoice Line. Allowance Charge
     *  An association to Allowance Charge.
     *  0..n
     *  Invoice Line
     *  Allowance Charge
     *  Allowance Charge
     *
     * @param int|string $index
     * @return bool
     */
    public function issetAllowanceCharge($index)
    {
        return isset($this->allowanceCharge[$index]);
    }

    /**
     * unset allowanceCharge
     *
     * ASBIE
     *  Invoice Line. Allowance Charge
     *  An association to Allowance Charge.
     *  0..n
     *  Invoice Line
     *  Allowance Charge
     *  Allowance Charge
     *
     * @param int|string $index
     * @return void
     */
    public function unsetAllowanceCharge($index)
    {
        unset($this->allowanceCharge[$index]);
    }

    /**
     * Gets as allowanceCharge
     *
     * ASBIE
     *  Invoice Line. Allowance Charge
     *  An association to Allowance Charge.
     *  0..n
     *  Invoice Line
     *  Allowance Charge
     *  Allowance Charge
     *
     * @return \horstoeko\ubl\entities\cac\AllowanceCharge[]
     */
    public function getAllowanceCharge()
    {
        return $this->allowanceCharge;
    }

    /**
     * Sets a new allowanceCharge
     *
     * ASBIE
     *  Invoice Line. Allowance Charge
     *  An association to Allowance Charge.
     *  0..n
     *  Invoice Line
     *  Allowance Charge
     *  Allowance Charge
     *
     * @param \horstoeko\ubl\entities\cac\AllowanceCharge[] $allowanceCharge
     * @return self
     */
    public function setAllowanceCharge(array $allowanceCharge)
    {
        $this->allowanceCharge = $allowanceCharge;
        return $this;
    }

    /**
     * Adds as taxTotal
     *
     * ASBIE
     *  Invoice Line. Tax Total
     *  An association to Tax Total.
     *  0..n
     *  Invoice Line
     *  Tax Total
     *  Tax Total
     *
     * @return self
     * @param \horstoeko\ubl\entities\cac\TaxTotal $taxTotal
     */
    public function addToTaxTotal(\horstoeko\ubl\entities\cac\TaxTotal $taxTotal)
    {
        $this->taxTotal[] = $taxTotal;
        return $this;
    }

    /**
     * isset taxTotal
     *
     * ASBIE
     *  Invoice Line. Tax Total
     *  An association to Tax Total.
     *  0..n
     *  Invoice Line
     *  Tax Total
     *  Tax Total
     *
     * @param int|string $index
     * @return bool
     */
    public function issetTaxTotal($index)
    {
        return isset($this->taxTotal[$index]);
    }

    /**
     * unset taxTotal
     *
     * ASBIE
     *  Invoice Line. Tax Total
     *  An association to Tax Total.
     *  0..n
     *  Invoice Line
     *  Tax Total
     *  Tax Total
     *
     * @param int|string $index
     * @return void
     */
    public function unsetTaxTotal($index)
    {
        unset($this->taxTotal[$index]);
    }

    /**
     * Gets as taxTotal
     *
     * ASBIE
     *  Invoice Line. Tax Total
     *  An association to Tax Total.
     *  0..n
     *  Invoice Line
     *  Tax Total
     *  Tax Total
     *
     * @return \horstoeko\ubl\entities\cac\TaxTotal[]
     */
    public function getTaxTotal()
    {
        return $this->taxTotal;
    }

    /**
     * Sets a new taxTotal
     *
     * ASBIE
     *  Invoice Line. Tax Total
     *  An association to Tax Total.
     *  0..n
     *  Invoice Line
     *  Tax Total
     *  Tax Total
     *
     * @param \horstoeko\ubl\entities\cac\TaxTotal[] $taxTotal
     * @return self
     */
    public function setTaxTotal(array $taxTotal)
    {
        $this->taxTotal = $taxTotal;
        return $this;
    }

    /**
     * Gets as item
     *
     * ASBIE
     *  Invoice Line. Item
     *  An association to Item.
     *  1
     *  Invoice Line
     *  Item
     *  Item
     *
     * @return \horstoeko\ubl\entities\cac\Item
     */
    public function getItem()
    {
        return $this->item;
    }

    /**
     * Sets a new item
     *
     * ASBIE
     *  Invoice Line. Item
     *  An association to Item.
     *  1
     *  Invoice Line
     *  Item
     *  Item
     *
     * @param \horstoeko\ubl\entities\cac\Item $item
     * @return self
     */
    public function setItem(\horstoeko\ubl\entities\cac\Item $item)
    {
        $this->item = $item;
        return $this;
    }

    /**
     * Gets as price
     *
     * ASBIE
     *  Invoice Line. Price
     *  An association to Price.
     *  0..1
     *  Invoice Line
     *  Price
     *  Price
     *
     * @return \horstoeko\ubl\entities\cac\Price
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Sets a new price
     *
     * ASBIE
     *  Invoice Line. Price
     *  An association to Price.
     *  0..1
     *  Invoice Line
     *  Price
     *  Price
     *
     * @param \horstoeko\ubl\entities\cac\Price $price
     * @return self
     */
    public function setPrice(\horstoeko\ubl\entities\cac\Price $price)
    {
        $this->price = $price;
        return $this;
    }

    /**
     * Gets as deliveryTerms
     *
     * ASBIE
     *  Invoice Line. Delivery Terms
     *  An association to Delivery Terms.
     *  0..1
     *  Invoice Line
     *  Delivery Terms
     *  Delivery Terms
     *
     * @return \horstoeko\ubl\entities\cac\DeliveryTerms
     */
    public function getDeliveryTerms()
    {
        return $this->deliveryTerms;
    }

    /**
     * Sets a new deliveryTerms
     *
     * ASBIE
     *  Invoice Line. Delivery Terms
     *  An association to Delivery Terms.
     *  0..1
     *  Invoice Line
     *  Delivery Terms
     *  Delivery Terms
     *
     * @param \horstoeko\ubl\entities\cac\DeliveryTerms $deliveryTerms
     * @return self
     */
    public function setDeliveryTerms(\horstoeko\ubl\entities\cac\DeliveryTerms $deliveryTerms)
    {
        $this->deliveryTerms = $deliveryTerms;
        return $this;
    }


}
