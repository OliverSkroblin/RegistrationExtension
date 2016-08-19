<?php

namespace Registration;

use Shopware\Bundle\AccountBundle\Form\Account\AddressFormType;
use Shopware\Bundle\AccountBundle\Form\Account\PersonalFormType;
use Shopware\Components\Plugin;
use Shopware\Components\Plugin\Context\InstallContext;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Form;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\NotBlank;

class Registration extends Plugin
{
    public function install(InstallContext $context)
    {
        $this->addAttributes();
        parent::install($context);
    }

    public static function getSubscribedEvents()
    {
        return [
            'Enlight_Controller_Action_PostDispatchSecure_Frontend_Register' => 'addTemplateDir'
        ];
    }

    /**
     * @param \Enlight_Event_EventArgs $args
     */
    public function addTemplateDir(\Enlight_Event_EventArgs $args)
    {
        /** @var \Enlight_Controller_Action $controller */
        $controller = $args->getSubject();
        $controller->View()->addTemplateDir(__DIR__ . '/Resources/Views/');
    }


    private function addAttributes()
    {
        $this->container->get('shopware_attribute.crud_service')->update(
            's_user_attributes',
            'my_column',
            'string',
            ['displayInBackend' => true],
            null,
            true
        );

        $this->container->get('shopware_attribute.crud_service')->update(
            's_user_addresses_attributes',
            'my_address_column',
            'string',
            ['displayInBackend' => true],
            null,
            true
        );
        $this->container->get('models')->generateAttributeModels(['s_user_attributes', 's_user_addresses_attributes', 's_user_billingaddress_attributes', 's_user_shippingaddress_attributes']);
    }
}