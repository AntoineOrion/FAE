<?php

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.
// Returns the private 'console.command.form_debug' shared service.

$this->services['console.command.form_debug'] = $instance = new \Symfony\Component\Form\Command\DebugCommand(${($_ = isset($this->services['form.registry']) ? $this->services['form.registry'] : $this->load('getForm_RegistryService.php')) && false ?: '_'}, [0 => 'Symfony\\Component\\Form\\Extension\\Core\\Type', 1 => 'Symfony\\Bridge\\Doctrine\\Form\\Type', 2 => 'PrestaShopBundle\\Form\\Admin\\Type', 3 => 'PrestaShopBundle\\Form\\Admin\\Category', 4 => 'PrestaShopBundle\\Form\\Admin\\Feature', 5 => 'PrestaShopBundle\\Form\\Admin\\Product', 6 => 'PrestaShopBundle\\Form\\Admin\\Sell\\Order\\Invoices', 7 => 'PrestaShopBundle\\Form\\Admin\\AdvancedParameters\\Performance', 8 => 'PrestaShopBundle\\Form\\Admin\\Configure\\ShopParameters\\General', 9 => 'PrestaShopBundle\\Form\\Admin\\Configure\\AdvancedParameters\\Administration', 10 => 'PrestaShopBundle\\Form\\Admin\\Improve\\Shipping\\Preferences', 11 => 'PrestaShopBundle\\Form\\Admin\\Configure\\ShopParameters\\ProductPreferences', 12 => 'PrestaShopBundle\\Form\\Admin\\Configure\\ShopParameters\\CustomerPreferences', 13 => 'PrestaShopBundle\\Form\\Admin\\Configure\\ShopParameters\\OrderPreferences', 14 => 'PrestaShopBundle\\Form\\Admin\\Configure\\AdvancedParameters\\Import', 15 => 'PrestaShopBundle\\Form\\Admin\\Sell\\Order\\Delivery', 16 => 'PrestaShopBundle\\Form\\Admin\\Improve\\International\\Localization', 17 => 'PrestaShopBundle\\Form\\Admin\\Improve\\International\\Geolocation', 18 => 'PrestaShopBundle\\Form\\Admin\\Improve\\Payment\\Preferences', 19 => 'PrestaShopBundle\\Form\\Admin\\Configure\\AdvancedParameters\\Email', 20 => 'PrestaShopBundle\\Form\\Admin\\Improve\\International\\Translations', 21 => 'PrestaShopBundle\\Form\\Admin\\Configure\\ShopParameters\\TrafficSeo\\Meta'], [0 => 'Symfony\\Component\\Form\\Extension\\Core\\Type\\FormType', 1 => 'Symfony\\Component\\Form\\Extension\\Core\\Type\\ChoiceType', 2 => 'Symfony\\Bridge\\Doctrine\\Form\\Type\\EntityType', 3 => 'PrestaShopBundle\\Form\\Admin\\Type\\DatePickerType', 4 => 'PrestaShopBundle\\Form\\Admin\\Category\\SimpleCategory', 5 => 'PrestaShopBundle\\Form\\Admin\\Type\\ChoiceCategoriesTreeType', 6 => 'PrestaShopBundle\\Form\\Admin\\Type\\TranslateType', 7 => 'PrestaShopBundle\\Form\\Admin\\Feature\\ProductFeature', 8 => 'PrestaShopBundle\\Form\\Admin\\Product\\ProductAttachement', 9 => 'PrestaShopBundle\\Form\\Admin\\Product\\ProductCombination', 10 => 'PrestaShopBundle\\Form\\Admin\\Product\\ProductCustomField', 11 => 'PrestaShopBundle\\Form\\Admin\\Product\\ProductInformation', 12 => 'PrestaShopBundle\\Form\\Admin\\Product\\ProductOptions', 13 => 'PrestaShopBundle\\Form\\Admin\\Product\\ProductPrice', 14 => 'PrestaShopBundle\\Form\\Admin\\Product\\ProductQuantity', 15 => 'PrestaShopBundle\\Form\\Admin\\Product\\ProductSeo', 16 => 'PrestaShopBundle\\Form\\Admin\\Product\\ProductShipping', 17 => 'PrestaShopBundle\\Form\\Admin\\Product\\ProductSpecificPrice', 18 => 'PrestaShopBundle\\Form\\Admin\\Product\\ProductSupplierCombination', 19 => 'PrestaShopBundle\\Form\\Admin\\Product\\ProductVirtual', 20 => 'PrestaShopBundle\\Form\\Admin\\Product\\ProductWarehouseCombination', 21 => 'PrestaShopBundle\\Form\\Admin\\Type\\TypeaheadProductCollectionType', 22 => 'PrestaShopBundle\\Form\\Admin\\Type\\TypeaheadProductPackCollectionType', 23 => 'PrestaShopBundle\\Form\\Admin\\Type\\TypeaheadCustomerCollectionType', 24 => 'PrestaShopBundle\\Form\\Admin\\Product\\ProductCombinationBulk', 25 => 'PrestaShopBundle\\Form\\Admin\\Product\\ProductCategories', 26 => 'PrestaShopBundle\\Form\\Admin\\Sell\\Order\\Invoices\\GenerateByDateType', 27 => 'PrestaShopBundle\\Form\\Admin\\Sell\\Order\\Invoices\\GenerateByStatusType', 28 => 'PrestaShopBundle\\Form\\Admin\\Sell\\Order\\Invoices\\InvoiceOptionsType', 29 => 'PrestaShopBundle\\Form\\Admin\\AdvancedParameters\\Performance\\SmartyType', 30 => 'PrestaShopBundle\\Form\\Admin\\AdvancedParameters\\Performance\\DebugModeType', 31 => 'PrestaShopBundle\\Form\\Admin\\AdvancedParameters\\Performance\\OptionalFeaturesType', 32 => 'PrestaShopBundle\\Form\\Admin\\AdvancedParameters\\Performance\\CombineCompressCacheType', 33 => 'PrestaShopBundle\\Form\\Admin\\AdvancedParameters\\Performance\\MediaServersType', 34 => 'PrestaShopBundle\\Form\\Admin\\AdvancedParameters\\Performance\\MemcacheServerType', 35 => 'PrestaShopBundle\\Form\\Admin\\AdvancedParameters\\Performance\\CachingType', 36 => 'PrestaShopBundle\\Form\\Admin\\Configure\\ShopParameters\\General\\PreferencesType', 37 => 'PrestaShopBundle\\Form\\Admin\\Configure\\ShopParameters\\General\\MaintenanceType', 38 => 'PrestaShopBundle\\Form\\Admin\\Configure\\AdvancedParameters\\Administration\\GeneralType', 39 => 'PrestaShopBundle\\Form\\Admin\\Configure\\AdvancedParameters\\Administration\\UploadQuotaType', 40 => 'PrestaShopBundle\\Form\\Admin\\Configure\\AdvancedParameters\\Administration\\NotificationsType', 41 => 'PrestaShopBundle\\Form\\Admin\\Improve\\Shipping\\Preferences\\HandlingType', 42 => 'PrestaShopBundle\\Form\\Admin\\Improve\\Shipping\\Preferences\\CarrierOptionsType', 43 => 'PrestaShopBundle\\Form\\Admin\\Configure\\ShopParameters\\ProductPreferences\\GeneralType', 44 => 'PrestaShopBundle\\Form\\Admin\\Configure\\ShopParameters\\ProductPreferences\\StockType', 45 => 'PrestaShopBundle\\Form\\Admin\\Configure\\ShopParameters\\CustomerPreferences\\GeneralType', 46 => 'PrestaShopBundle\\Form\\Admin\\Configure\\ShopParameters\\OrderPreferences\\GeneralType', 47 => 'PrestaShopBundle\\Form\\Admin\\Configure\\ShopParameters\\OrderPreferences\\GiftOptionsType', 48 => 'PrestaShopBundle\\Form\\Admin\\Configure\\AdvancedParameters\\Import\\ImportType', 49 => 'PrestaShopBundle\\Form\\Admin\\Sell\\Order\\Delivery\\SlipOptionsType', 50 => 'PrestaShopBundle\\Form\\Admin\\Improve\\International\\Localization\\LocalizationConfigurationType', 51 => 'PrestaShopBundle\\Form\\Admin\\Improve\\International\\Localization\\ImportLocalizationPackType', 52 => 'PrestaShopBundle\\Form\\Admin\\Improve\\International\\Geolocation\\GeolocationOptionsType', 53 => 'PrestaShopBundle\\Form\\Admin\\Improve\\Payment\\Preferences\\PaymentModulePreferencesType', 54 => 'PrestaShopBundle\\Form\\Admin\\Configure\\AdvancedParameters\\Email\\EmailConfigurationType', 55 => 'PrestaShopBundle\\Form\\Admin\\Improve\\International\\Translations\\ModifyTranslationsType', 56 => 'PrestaShopBundle\\Form\\Admin\\Improve\\International\\Translations\\AddUpdateLanguageType', 57 => 'PrestaShopBundle\\Form\\Admin\\Improve\\International\\Translations\\ExportThemeLanguageType', 58 => 'PrestaShopBundle\\Form\\Admin\\Improve\\International\\Translations\\CopyLanguageType', 59 => 'PrestaShopBundle\\Form\\Admin\\Configure\\ShopParameters\\TrafficSeo\\Meta\\SetUpUrlType', 60 => 'PrestaShopBundle\\Form\\Admin\\Configure\\ShopParameters\\TrafficSeo\\Meta\\ShopUrlType', 61 => 'PrestaShopBundle\\Form\\Admin\\Configure\\ShopParameters\\TrafficSeo\\Meta\\UrlSchemaType', 62 => 'PrestaShopBundle\\Form\\Admin\\Configure\\ShopParameters\\TrafficSeo\\Meta\\MetaType'], [0 => 'Symfony\\Component\\Form\\Extension\\Core\\Type\\TransformationFailureExtension', 1 => 'Symfony\\Component\\Form\\Extension\\HttpFoundation\\Type\\FormTypeHttpFoundationExtension', 2 => 'Symfony\\Component\\Form\\Extension\\Validator\\Type\\FormTypeValidatorExtension', 3 => 'Symfony\\Component\\Form\\Extension\\Validator\\Type\\RepeatedTypeValidatorExtension', 4 => 'Symfony\\Component\\Form\\Extension\\Validator\\Type\\SubmitTypeValidatorExtension', 5 => 'Symfony\\Component\\Form\\Extension\\Validator\\Type\\UploadValidatorExtension', 6 => 'Symfony\\Component\\Form\\Extension\\Csrf\\Type\\FormTypeCsrfExtension', 7 => 'Symfony\\Component\\Form\\Extension\\DataCollector\\Type\\DataCollectorTypeExtension', 8 => 'PrestaShopBundle\\Form\\Admin\\Type\\CustomMoneyType'], [0 => 'Symfony\\Component\\Form\\Extension\\Validator\\ValidatorTypeGuesser', 1 => 'Symfony\\Bridge\\Doctrine\\Form\\DoctrineOrmTypeGuesser']);

$instance->setName('debug:form');

return $instance;
