{extends file="parent:frontend/register/personal_fieldset.tpl"}

{block name='frontend_register_personal_fieldset_input_title' append}
    <input name="register[personal][attribute][myColumn]"
           type="text"
           placeholder="User attribute"
           id=""
           value="{$form_data.attribute.myColumn}"
           class="register--field" />
{/block}
