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
abstract class UblDocument
{
    /**
     * @internal
     * Serializer builder
     * @var SerializerBuilder
     */
    protected $serializerBuilder;

    /**
     * @internal
     * Serializer
     * @var SerializerInterface
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
     * Returns the invoice object generated by derived classes
     *
     * @return \horstoeko\ubl\entities\main\Invoice
     */
    abstract public function getInvoiceObject(): Invoice;

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
        $this->serializerBuilder->configureHandlers(function (HandlerRegistryInterface $handler) use ($serializerBuilder) {
            $serializerBuilder->addDefaultHandlers();
            $handler->registerSubscribingHandler(new BaseTypesHandler());
            $handler->registerSubscribingHandler(new XmlSchemaDateHandler());
        });

        $this->serializer = $this->serializerBuilder->build();

        return $this;
    }
}
