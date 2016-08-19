{extends file="parent:frontend/register/billing_fieldset.tpl"}

{block name='frontend_register_billing_fieldset_input_street' append}
    <input name="register[billing][attribute][myAddressColumn]"
           type="text"
           placeholder="Address attribute"
           id=""
           value="{$form_data.attribute.myAddressColumn}"
           class="register--field" />
{/block}
