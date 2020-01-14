
{if !$isCustomerFavoriteProduct && $isLogged}
<button id="favoriteproducts_block_extra_add" class="btn  btn-default">
	<a href="?action=add&id_product={$id_product}"   class="btn  btn default">{l s='Add this product to my list of favorites.' mod='ns_favoriteproducts'}</a>
</button>
{/if}
{if $isCustomerFavoriteProduct && $isLogged}
<button id="favoriteproducts_block_extra_remove"  class="btn  btn-default">
	<a href="?action=remove&id_product={$id_product}" >{l s='Remove this product from my favorite\'s list. ' mod='ns_favoriteproducts'}</a>
</button>
{/if}

