
{if !$isCustomerFavoriteProduct && $isLogged}
<button id="favoriteproducts_block_extra_add" class="btn  btn-default">
	<a href="?action=add&id_product={$id_product}"   class="btn  btn default"><img src="{$urls.img_url}add2favorite_red.png" alt="Ajouter à mes favoris"></a>
</button>
{/if}
{if $isCustomerFavoriteProduct && $isLogged}
<button id="favoriteproducts_block_extra_remove"  class="btn  btn-default">
	<a href="?action=remove&id_product={$id_product}" ><img src="{$urls.img_url}remove_from_favorite_red.png" alt="Supprimer de mes favoris"></a>
</button>
{/if}

