<?php

/**
 * This file is a part of horstoeko/ubl.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace horstoeko\ubl;

use \DateTime;
use \horstoeko\ubl\entities\cbc\ID;
use \horstoeko\ubl\entities\cbc\Name;
use \horstoeko\ubl\entities\cbc\Note;
use \horstoeko\ubl\entities\cac\Party;
use \horstoeko\ubl\entities\main\Invoice;
use \horstoeko\ubl\entities\cac\TaxScheme;
use \horstoeko\ubl\entities\cac\PartyName;
use \horstoeko\ubl\entities\cac\PartyTaxScheme;
use \horstoeko\ubl\entities\cbc\InvoiceTypeCode;
use \horstoeko\ubl\entities\cac\PartyIdentification;
use \horstoeko\ubl\entities\cbc\DocumentCurrencyCode;
use \horstoeko\ubl\entities\cac\AccountingSupplierParty;
use horstoeko\ubl\entities\cac\Contact;
use horstoeko\ubl\entities\cac\CorporateRegistrationScheme;
use \horstoeko\ubl\entities\cac\PostalAddress;
use \horstoeko\ubl\entities\cbc\AdditionalStreetName;
use \horstoeko\ubl\entities\cbc\CityName;
use \horstoeko\ubl\entities\cbc\CompanyID;
use \horstoeko\ubl\entities\cbc\PostalZone;
use \horstoeko\ubl\entities\cbc\StreetName;
use \horstoeko\ubl\entities\cac\Country;
use horstoeko\ubl\entities\cac\PartyLegalEntity;
use horstoeko\ubl\entities\cbc\CoordinateSystemCode;
use \horstoeko\ubl\entities\cbc\CountrySubentity;
use horstoeko\ubl\entities\cbc\ElectronicMail;
use \horstoeko\ubl\entities\cbc\IdentificationCode;
use horstoeko\ubl\entities\cbc\RegistrationName;
use horstoeko\ubl\entities\cbc\Telefax;
use horstoeko\ubl\entities\cbc\Telephone;

/**
 * Class representing the ubl invoice builder
 *
 * @category UBL
 * @package  UBL
 * @author   D. Erling <horstoeko@erling.com.de>
 * @license  https://opensource.org/licenses/MIT MIT
 * @link     https://github.com/horstoeko/ubl
 */
class UblDocumentBuilder extends UblDocument
{
    /**
     * @internal
     * The internal invoice object
     * @var \horstoeko\ubl\entities\main\Invoice
     */
    protected $invoiceObject = null;

    /**
     * Constructor
     *
     * @codeCoverageIgnore
     */
    public function __construct()
    {
        parent::__construct();
        $this->initInvoiceObject();
    }

    /**
     * @inheritDoc
     */
    public function getInvoiceObject(): Invoice
    {
        return $this->invoiceObject;
    }

    /**
     * This method can be overridden in derived class
     * It is called before a XML is written
     *
     * @return void
     */
    protected function onBeforeGetContent(): void
    {
        // Do nothing
    }

    /**
     * Write the content of a UBL object to a string
     *
     * @return string
     */
    public function getContent(): string
    {
        $this->onBeforeGetContent();
        return $this->serializer->serialize($this->invoiceObject, 'xml');
    }

    /**
     * Write the content of a UBL object to a file
     *
     * @param string $xmlfilename
     * The filename to which the content of the UBL invoice object is
     * saved to as XML
     * @return UblDocument
     */
    public function writeFile(string $xmlfilename): UblDocument
    {
        file_put_contents($xmlfilename, $this->getContent());
        return $this;
    }

    /**
     * Set main information about this document
     *
     * @param string $documentno
     * The document no issued by the seller
     * @param string $documenttypecode
     * The type of the document, See \horstoeko\codelists\ZugferdInvoiceType for details
     * @param DateTime $documentdate Date of invoice
     * The date when the document was issued by the seller
     * @param string $invoiceCurrency Code for the invoice currency
     * The code for the invoice currency
     * @return UblDocumentBuilder
     */
    public function setDocumentInformation(string $documentno, string $documenttypecode, DateTime $documentdate, string $invoiceCurrency): UblDocumentBuilder
    {
        $this->invoiceObject->setID(new Id($documentno));
        $this->invoiceObject->setInvoiceTypeCode(new InvoiceTypeCode($documenttypecode));
        $this->invoiceObject->setIssueDate($documentdate);
        $this->invoiceObject->setDocumentCurrencyCode(new DocumentCurrencyCode($invoiceCurrency));
        return $this;
    }

    /**
     * Adds a note to the document
     *
     * @param string $note
     * The free-text to add as a document note
     * @return UblDocumentBuilder
     */
    public function addDocumentNote(string $note): UblDocumentBuilder
    {
        $this->invoiceObject->addToNote(new Note($note));
        return $this;
    }

    /**
     * Mark document as a copy from the original one
     *
     * @return UblDocumentBuilder
     */
    public function setIsDocumentCopy(): UblDocumentBuilder
    {
        $this->invoiceObject->setCopyIndicator(true);
        return $this;
    }

    /**
     * An identifier assigned by the buyer and used for internal routing.
     *
     * __Note__: The reference is specified by the buyer (e.g. contact details, department, office ID, project code),
     * but stated by the seller on the invoice.
     *
     * __Note__: The route ID must be specified in the Buyer Reference (BT-10) in the XRechnung. According to the XRechnung
     * standard, two syntaxes are permitted for displaying electronic invoices: Universal Business Language (UBL) and UN/CEFACT
     * Cross Industry Invoice (CII).
     *
     * @param string $buyerreference
     * An identifier assigned by the buyer and used for internal routing
     * @return UblDocumentBuilder
     */
    public function setDocumentBuyerReference(string $buyerreference): UblDocumentBuilder
    {
        $this->invoiceObject->setBuyerReference($buyerreference);
        return $this;
    }

    /**
     * Detailed information about the seller (=service provider)
     *
     * @param string $name The full formal name under which the seller is registered in the
     * National Register of Legal Entities, Taxable Person or otherwise acting as person(s)
     * @param string|null $id
     * An identifier of the seller. In many systems, seller identification
     * is key information. Multiple seller IDs can be assigned or specified. They can be differentiated
     * by using different identification schemes. If no scheme is given, it should be known to the buyer
     * and seller, e.g. a previously exchanged, buyer-assigned identifier of the seller
     * @param string|null $description
     * Further legal information that is relevant for the seller
     * @return UblDocumentBuilder
     */
    public function setDocumentSeller(string $name, ?string $id = null, ?string $description = null): UblDocumentBuilder
    {
        $accountingSupplierParty = $this->getAccountingSupplierParty();
        $party = $accountingSupplierParty->getParty();
        $party->addToPartyName((new PartyName())->setName((new Name($name))));
        $party->addToPartyIdentification((new PartyIdentification())->setID(new Id($id)));
        return $this;
    }

    /**
     * Add a global id for the seller
     *
     * __Notes__
     *
     * - The Seller's ID identification scheme is a unique identifier
     *   assigned to a seller by a global registration organization
     *
     * @param string|null $globalID
     * The seller's identifier identification scheme is an identifier uniquely assigned to a seller by a
     * global registration organization.
     * @param string|null $globalIDType
     * If the identifier is used for the identification scheme, it must be selected from the entries in
     * the list published by the ISO / IEC 6523 Maintenance Agency.
     * @return UblDocumentBuilder
     */
    public function addDocumentSellerGlobalId(?string $globalID = null, ?string $globalIDType = null): UblDocumentBuilder
    {
        $accountingSupplierParty = $this->getAccountingSupplierParty();
        $party = $accountingSupplierParty->getParty();
        $party->addToPartyIdentification((new PartyIdentification())->setID((new Id($globalID))->setSchemeID($globalIDType)));
        return $this;
    }

    /**
     * Add detailed information on the seller's tax information
     *
     * The local identification (defined by the seller's address) of the seller for tax purposes or a reference that enables the seller
     * to indicate his reporting status for tax purposes The sales tax identification number of the seller
     * Note: This information may affect how the buyer the invoice settled (such as in relation to social security contributions). So
     * e.g. In some countries, if the seller is not reported for tax, the buyer will withhold the tax amount and pay it on behalf of the
     * seller. Sales tax number with a prefixed country code. A supplier registered as subject to VAT must provide his sales tax
     * identification number, unless he uses a tax agent.
     *
     * @param string|null $taxregtype Type of tax number of the seller
     * @param string|null $taxregid Tax number of the seller or sales tax identification number of the (FC = Tax number, VA = Sales tax number)
     * @return UblDocumentBuilder
     */
    public function addDocumentSellerTaxRegistration(?string $taxregtype = null, ?string $taxregid = null): UblDocumentBuilder
    {
        $accountingSupplierParty = $this->getAccountingSupplierParty();
        $party = $accountingSupplierParty->getParty();
        $party->addToPartyTaxScheme((new PartyTaxScheme())->setCompanyID((new CompanyID($taxregid)))->setTaxScheme((new TaxScheme())->setId(new Id($taxregtype))));
        return $this;
    }

    /**
     * Sets detailed information on the business address of the seller
     *
     * @param string|null $lineone
     * The main line in the sellers address. This is usually the street name and house number or
     * the post office box
     * @param string|null $linetwo
     * Line 2 of the seller's address. This is an additional address line in an address that can be
     * used to provide additional details in addition to the main line
     * @param string|null $linethree
     * Line 3 of the seller's address. This is an additional address line in an address that can be
     * used to provide additional details in addition to the main line
     * @param string|null $postcode
     * Identifier for a group of properties, such as a zip code
     * @param string|null $city
     * Usual name of the city or municipality in which the seller's address is located
     * @param string|null $country
     * Code used to identify the country. If no tax agent is specified, this is the country in which the sales tax
     * is due. The lists of approved countries are maintained by the EN ISO 3166-1 Maintenance Agency “Codes for the
     * representation of names of countries and their subdivisions”
     * @param string|null $subdivision
     * The sellers state
     * @return UblDocumentBuilder
     */
    public function setDocumentSellerAddress(?string $lineone = null, ?string $linetwo = null, ?string $linethree = null, ?string $postcode = null, ?string $city = null, ?string $country = null, ?string $subdivision = null): UblDocumentBuilder
    {
        $accountingSupplierParty = $this->getAccountingSupplierParty();
        $party = $accountingSupplierParty->getParty();

        $postalAddress = new PostalAddress();
        $postalAddress->setStreetName(new StreetName($lineone));
        $postalAddress->setAdditionalStreetName(new AdditionalStreetName($linetwo));
        $postalAddress->setPostalZone(new PostalZone($postcode));
        $postalAddress->setCityName(new CityName($city));
        $postalAddress->setCountry((new Country())->setIdentificationCode(new IdentificationCode($country)));
        $postalAddress->setCountrySubentity(new CountrySubentity($subdivision));

        $party->setPostalAddress($postalAddress);

        return $this;
    }

    /**
     * Set Organization details
     *
     * @param string|null $legalorgid
     * An identifier issued by an official registrar that identifies the
     * seller as a legal entity or legal person. If no identification scheme ($legalorgtype) is provided,
     * it should be known to the buyer and seller
     * @param string|null $legalorgtype
     * The identifier for the identification scheme of the legal
     * registration of the seller. If the identification scheme is used, it must be selected from
     * ISO/IEC 6523 list
     * @param string|null $legalorgname
     * A name by which the seller is known, if different from the seller's name (also known as
     * the company name). Note: This may be used if different from the seller's name.
     * @return UblDocumentBuilder
     */
    public function setDocumentSellerLegalOrganisation(?string $legalorgid, ?string $legalorgtype, ?string $legalorgname): UblDocumentBuilder
    {
        $accountingSupplierParty = $this->getAccountingSupplierParty();
        $party = $accountingSupplierParty->getParty();

        $partyLegalEntity = new PartyLegalEntity();
        $partyLegalEntity->setCompanyID((new CompanyID($legalorgid))->setSchemeID($legalorgtype));
        $partyLegalEntity->setRegistrationName(new RegistrationName($legalorgname));

        $party->addToPartyLegalEntity($partyLegalEntity);

        return $this;
    }

    /**
     * Set detailed information on the seller's contact person
     *
     * @param string|null $contactpersonname
     * Contact point for a legal entity,
     * such as a personal name of the contact person
     * @param string|null $contactdepartmentname
     * Contact point for a legal entity, such as a name of the department or office
     * @param string|null $contactphoneno
     * Detailed information on the seller's phone number
     * @param string|null $contactfaxno
     * Detailed information on the seller's fax number
     * @param string|null $contactemailadd
     * Detailed information on the seller's email address
     * @return UblDocumentBuilder
     */
    public function setDocumentSellerContact(?string $contactpersonname, ?string $contactdepartmentname, ?string $contactphoneno, ?string $contactfaxno, ?string $contactemailadd): UblDocumentBuilder
    {
        $accountingSupplierParty = $this->getAccountingSupplierParty();
        $party = $accountingSupplierParty->getParty();

        $contact = new Contact();
        $contact->setName(new Name($contactpersonname));
        $contact->setTelephone(new Telephone($contactphoneno));
        $contact->setTelefax(new Telefax($contactfaxno));
        $contact->setElectronicMail(new ElectronicMail($contactemailadd));

        $party->setContact($contact);

        return $this;
    }

    /**
     * Creates a new instance of the invoice class
     *
     * @return UblDocumentBuilder
     */
    private function initInvoiceObject(): UblDocumentBuilder
    {
        $this->invoiceObject = new Invoice();
        return $this;
    }

    /**
     * Returns wether an existing supplier or creates a new supplier
     *
     * @return AccountingSupplierParty
     */
    private function getAccountingSupplierParty(): AccountingSupplierParty
    {
        $accountingSupplierParty = $this->invoiceObject->getAccountingSupplierParty();

        if ($accountingSupplierParty === null) {
            $accountingSupplierParty = new AccountingSupplierParty();
            $accountingSupplierParty->setParty(new Party());
            $this->invoiceObject->setAccountingSupplierParty($accountingSupplierParty);
        }

        return $accountingSupplierParty;
    }
}
