<?php

/**
 * This file is a part of horstoeko/ubl.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace horstoeko\ubl;

use \GoetasWebservices\Xsd\XsdToPhpRuntime\Jms\Handler\BaseTypesHandler;
use \GoetasWebservices\Xsd\XsdToPhpRuntime\Jms\Handler\XmlSchemaDateHandler;
use \JMS\Serializer\Handler\HandlerRegistryInterface;
use \JMS\Serializer\SerializerBuilder;
use \JMS\Serializer\SerializerInterface;
use \horstoeko\ubl\entities\main\Invoice;

/**
 * Class representing the document basics
 *
 * @category UBL
 * @package  UBL
 * @author   D. Erling <horstoeko@erling.com.de>
 * @license  https://opensource.org/licenses/MIT MIT
 * @link     https://github.com/horstoeko/ubl
 */
class UblDocument
{
    /**
     * @internal
     * The internal invoice object
     * @var      \horstoeko\ubl\entities\main\Invoice
     */
    protected $invoiceObject = null;

    /**
     * @internal
     * Serializer builder
     * @var      SerializerBuilder
     */
    protected $serializerBuilder;

    /**
     * @internal
     * Serializer
     * @var      SerializerInterface
     */
    protected $serializer;

    /**
     * Constructor
     *
     * @codeCoverageIgnore
     */
    public function __construct()
    {
        $this->initSerialzer();
    }

    /**
     * @internal
     *
     * Build the internal serialzer
     * @codeCoverageIgnore
     *
     * @return UblDocument
     */
    private function initSerialzer(): UblDocument
    {
        $serializerBuilder = SerializerBuilder::create();
        $this->serializerBuilder = $serializerBuilder;
        $this->serializerBuilder->addMetadataDir(dirname(__FILE__) . '/../src/yaml/cac', 'horstoeko\ubl\entities\cac');
        $this->serializerBuilder->addMetadataDir(dirname(__FILE__) . '/../src/yaml/cbc', 'horstoeko\ubl\entities\cbc');
        $this->serializerBuilder->addMetadataDir(dirname(__FILE__) . '/../src/yaml/cct', 'horstoeko\ubl\entities\cct');
        $this->serializerBuilder->addMetadataDir(dirname(__FILE__) . '/../src/yaml/csc', 'horstoeko\ubl\entities\csc');
        $this->serializerBuilder->addMetadataDir(dirname(__FILE__) . '/../src/yaml/ds', 'horstoeko\ubl\entities\ds');
        $this->serializerBuilder->addMetadataDir(dirname(__FILE__) . '/../src/yaml/ext', 'horstoeko\ubl\entities\ext');
        $this->serializerBuilder->addMetadataDir(dirname(__FILE__) . '/../src/yaml/main', 'horstoeko\ubl\entities\main');
        $this->serializerBuilder->addMetadataDir(dirname(__FILE__) . '/../src/yaml/qdt', 'horstoeko\ubl\entities\qdt');
        $this->serializerBuilder->addMetadataDir(dirname(__FILE__) . '/../src/yaml/sac', 'horstoeko\ubl\entities\sac');
        $this->serializerBuilder->addMetadataDir(dirname(__FILE__) . '/../src/yaml/sbc', 'horstoeko\ubl\entities\sbc');
        $this->serializerBuilder->addMetadataDir(dirname(__FILE__) . '/../src/yaml/udt', 'horstoeko\ubl\entities\udt');
        $this->serializerBuilder->addMetadataDir(dirname(__FILE__) . '/../src/yaml/xades', 'horstoeko\ubl\entities\xades');
        $this->serializerBuilder->addDefaultListeners();
        $this->serializerBuilder->configureHandlers(
            function (HandlerRegistryInterface $handler) use ($serializerBuilder) {
                $serializerBuilder->addDefaultHandlers();
                $handler->registerSubscribingHandler(new BaseTypesHandler());
                $handler->registerSubscribingHandler(new XmlSchemaDateHandler());
            }
        );

        $this->serializer = $this->serializerBuilder->build();

        return $this;
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
     * @param  string $xmlfilename
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
     * Read XML content from string
     *
     * @param  string $xmlcontent
     * The XML content to deserialize
     * @return UblDocument
     */
    public function readContent(string $xmlcontent): UblDocument
    {
        $this->invoiceObject = $this->serializer->deserialize($xmlcontent, 'horstoeko\ubl\entities\main\Invoice', 'xml');
        return $this;
    }

    /**
     * Read XML content from file
     *
     * @param  string $xmlfilename
     * The filename which contains the XML content
     * @return UblDocument
     */
    public function readFile(string $xmlfilename): UblDocument
    {
        $this->readContent(file_get_contents($xmlfilename));
        return $this;
    }
}
