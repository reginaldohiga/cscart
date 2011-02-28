{* $Id: pagseguro.tpl 0001 2010-04-27 15:29:24 ldmotta $ *}

<div class="form-field">
	<label>Token (Informe o seu token no PagSeguro):</label>
	<input type="text" name="payment_data[processor_params][token]" id="username" value="{$processor_params.token}" class="input-text" />
</div>

<div class="form-field">
	<label>E-mail (Seu e-mail no PagSeguro):</label>
	<input type="text" name="payment_data[processor_params][email]" id="password" value="{$processor_params.email}" class="input-text" />
</div>
<!--
<div class="form-field">
	<label>Tipo de frete:</label>
	<div class="select-field">
	
		<input class="radio" type="radio" value="EN" name="payment_data[processor_params][tipo_frete]" {if $processor_params.tipo_frete == "EN" || !$processor_params.tipo_frete} checked="checked"{/if}/>
		<label>Encomenda Normal</label>
		
		<input class="radio" type="radio" value="SD" name="payment_data[processor_params][tipo_frete]" {if $processor_params.tipo_frete == "SD"} checked="checked"{/if}/>
		<label>SEDEX</label>
	</div>
</div>
-->
