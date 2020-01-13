{**
 * Creative Elements - Elementor based PageBuilder
 *
 * @author    WebshopWorks.com
 * @copyright 2019 WebshopWorks
 * @license   One domain support license
 *}

{extends file="helpers/form/form.tpl"}

{block name="input_row"}
	{$smarty.block.parent}
	{if $input.name == 'type'}
		<script>
		$('#type').select2({
			tags: true,
			placeholder: 'Select or type a Position',
			createTag: function(params) {
				return {
					id: params.term,
					text: params.term,
					newTag: true
				};
			},
			templateResult: function(data) {
				var $result = $('<span>').text(data.text);

				if (data.newTag) {
					$result.append(" <i>(custom)</i>");
				}
				return $result;
			}
		});
		</script>
	{elseif $input.name == 'pages[]'}
		<script>
		var $pages = $('.ce-pages'),
			pagesHtml = $pages.find('[value=pagenotfound] ~ *').each(function() {
				this.disabled = true;
				$pages.append(this);
			}).prevObject.html(),
			pagesData = {},
			pagesDef = {
				tags: true,
				placeholder: $pages.parent().prev().css('opacity', 0).text().trim()
			},
			getPagesVal = function() {
				return this.value
			},
			openPageItems = function(parent) {
				var $selected = $pages.find('option:selected'),
					selected = $selected.map(getPagesVal).toArray(),
					prev = null
				;
				$pages
					.select2('destroy')
					.empty()
					.select2( $.extend({}, pagesDef, { data: pagesData[parent] }) )
				;
				$selected.each(function() {
					if (!$pages.find('[value="'+ this.value +'"]').length) {
						this.disabled = true;
						prev ? $(this).insertAfter(prev) : $pages.prepend(this);
						prev = this;
					}
				});
				$pages.val(selected).triggerHandler('change.select2');
				$pages.data().select2.$results.attr('data-type', parent);
				$pages.data('type', parent).select2('open');
			}
		;

		$pages.select2(pagesDef);

		$($pages[0].form).on('submit.ce', function onSubmitForm() {
			$pages.find(':disabled').prop('disabled', false);
		});

		$pages.on('select2:selecting.ce', function onSelectingPage(e) {
			var id = e.params.args.data.id;
			if (!$pages.data('type') && ~['product', 'category'].indexOf(id)) {
				e.preventDefault();
				pagesData[id] ? openPageItems(id) : $.getJSON(
					currentIndex +'&ajax=1&action=get'+ id +'List&token='+ token,
					function onAjaxSuccess(data) {
						pagesData[id] = data;
						openPageItems(id);
					}
				);
			}
		});

		$pages.on('select2:select.ce', function onSelectPage(e) {
			var $option = $pages.find('[value="'+ e.params.data.id +'"]');
			if ($option.data('select2-tag')) {
				$option.attr('disabled', true);
				$pages.select2(pagesDef);
			}
		});

		$pages.on('select2:close.ce', function onClosePages(e) {
			$pages.data('type') && setTimeout(function() {
				var $selected = $pages.find('option:selected'),
					selected = $selected.map(getPagesVal).toArray()
				;
				$pages
					.select2('destroy')
					.html(pagesHtml)
					.select2(pagesDef)
				;
				$selected.each(function() {
					if (!$pages.find('[value="'+ this.value +'"]').length) {
						this.disabled = true;
						$pages.append(this);
					}
				});
				$pages.val(selected).triggerHandler('change.select2');
				$pages.data().select2.$results.removeAttr('data-type');
				$pages.data('type', '');
			}, 1);
		});

		// handle condition
		$('#assignment').on('change.ce', function onChangeAssignment() {
			var display = !!+$(this).val();
			$pages.closest('.form-group').toggle(display);
		}).triggerHandler('change.ce');
		</script>
	{/if}
{/block}
