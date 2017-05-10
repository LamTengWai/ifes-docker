<script type="text/javascript" src="<?php echo HTTP_PLUGIN; ?>/js/edit-shortcut.js"></script>
<form id="form_1" class="std-form" enctype="multipart/form-data" method="post">
	<input type="hidden" id="submit_mode" name="submit_mode">
	<input type="hidden" id="mode" name="mode" value="<?php echo $mode; ?>">
	<table style="position: relative;">
		<tr>
			<td colspan="2" style="text-align: center;">
				<?php if($allowEdit){ ?>
					<input type="button" id="btn-edit" value="Edit" class="flat-button-default" rel="tooltip" data-original-title="<?php echo SHORTCUT_EDIT; ?>" data-placement="top" style="<?php if($mode == 'edit'){echo 'display: none;';}?>" onclick="javascript: toggleEditForm();">
					<span id="cancel-toolbar" style="<?php if($mode != 'edit'){echo 'display: none;';}?>">
						<input type="button" value="Save" class="flat-button-default" rel="tooltip" data-original-title="<?php echo SHORTCUT_SAVE; ?>" data-placement="top" onclick="javascript: submitForm('');">
						<input type="button" value="Cancel" class="flat-button-default" rel="tooltip" data-original-title="<?php echo SHORTCUT_CANCEL; ?>" data-placement="top" onclick="javascript: toggleEditForm();">
					</span>
				<?php } ?>
				<?php if($allowDelete){ ?><input type="button" id="btn-delete" value="Delete" class="flat-button-default" onclick="javascript: deleteCurrency('<?php echo urlencode($encryptKey); ?>');"><?php } ?>
				<input type="button" value="Back" class="flat-button-default" rel="tooltip" data-original-title="<?php echo SHORTCUT_BACK; ?>" data-placement="top" onclick="javascript: window.location='<?php echo getModuleURL('oz.system.settings.search_management.list'); ?>';">
			</td>
		</tr>
		<tr>
			<td colspan="2">
				<table id="view-table" style="<?php if($mode == 'edit'){echo 'display: none;';}?>">
					<tr>
						<td class="lbl-title" colspan="2">Search Management Information</td>
					</tr>
					<tr>
						<td colspan="2">
							<table class="form-spacer-solo">
								<tr>
									<td class="lbl-field">Module Name</td>
									<td class="lbl-gap">:</td>
									<td><?php echo $searchData['module_name']; ?></td>
								</tr>
							</table>
						</td>
					</tr>
				</table>
				<?php if($allowEdit){ ?>
				<table id="edit-table" style="<?php if($mode != 'edit'){echo 'display: none;';}?>">
					<tr>
						<td class="lbl-title" colspan="2">Currency Information<span class="compulsory-text"><span class="lbl-compulsory">*</span> Required Information</span></td>
					</tr>
					<tr>
						<td colspan="2">
							<table class="form-spacer-solo">
								<tr>
									<td class="lbl-field">Module Name</td>
									<td class="lbl-gap">:</td>
									<td><?php echo $searchData['module_name']; ?></td>
								</tr>
							</table>
						</td>
					</tr>
				</table>
				<?php } ?>
			</td>
		</tr>
		<tr>
			<td class="lbl-title" colspan="2"><span class="inner-grid-text" onclick="javsacript: innerGridToggle(this, 'ext-container-searchfields', 'collapse-searchfields');">Search Fields (<span id="grid-count-info-searchfields">0</span>)</span><span id="collapse-searchfields" class="inner-grid-button" onclick="javsacript: innerGridToggle(this, 'ext-container-searchfields', 'collapse-searchfields');">[+]</span></td>
		</tr>
		<tr>
			<td colspan="2">
				<br><div id="ext-searchfields-grid"></div>
				<link rel="stylesheet" type="text/css" href="<?php echo HTTP_CDN_PLUGIN; ?>/extjs4.2.1/examples/ux/grid/css/GridFilters.css" />
				<link rel="stylesheet" type="text/css" href="<?php echo HTTP_CDN_PLUGIN; ?>/extjs4.2.1/examples/ux/grid/css/RangeMenu.css" />                
				<script type="text/javascript" src="<?php echo HTTP_ACTIVE_THEME; ?>/oz.system/settings/search_management/list_search_fields.js"></script>
				<script type="text/javascript">
					Ext.Loader.setPath('Ext.ux', '<?php echo HTTP_CDN_PLUGIN; ?>/extjs4.2.1/examples/ux');
					Ext.require([
						'Ext.ux.ProgressBarPager',
						'Ext.ux.grid.FiltersFeature'
					]);
					Ext.namespace('SearchFields');
					SearchFields.app = function(){
						return{
							init: function(){
								var mask = new Ext.LoadMask(document.getElementById('ext-searchfields-grid'),{ msg: 'Loading...'});
								var listPanelOfSearchFields = new ListPanelOfSearchFields({
									'start': '<?php echo $searchfieldsStart; ?>',
									'itemsPerPage': '<?php echo $searchfieldsPerPage; ?>',
									'listFields': [<?php echo implode(",", $searchfieldsFields); ?>],
									'allowEdit': '<?php echo $allowEdit; ?>',
									'parent': '<?php echo $encryptKey; ?>',
									'search': '<?php echo $searchData['db']; ?>'
								});
								Ext.create('Ext.container.Container',{
									id: 'ext-container-searchfields',
									renderTo: 'ext-searchfields-grid',
									hidden: false,
									items:[listPanelOfSearchFields]
								});
							}
						}
					}();
					Ext.onReady(SearchFields.app.init, SearchFields.app);
				</script>				
			</td>
		</tr>
		<tr>
			<td colspan="2" style="text-align: center;">
				<br>
				<?php if($allowEdit){ ?>
					<input type="button" id="btn-edit1" value="Edit" class="flat-button-default" rel="tooltip" data-original-title="<?php echo SHORTCUT_EDIT; ?>" data-placement="top" style="<?php if($mode == 'edit'){echo 'display: none;';}?>" onclick="javascript: toggleEditForm();">
					<span id="cancel-toolbar1" style="<?php if($mode != 'edit'){echo 'display: none;';}?>">
						<input type="button" value="Save" class="flat-button-default" rel="tooltip" data-original-title="<?php echo SHORTCUT_SAVE; ?>" data-placement="top" onclick="javascript: submitForm('');">
						<input type="button" value="Cancel" class="flat-button-default" rel="tooltip" data-original-title="<?php echo SHORTCUT_CANCEL; ?>" data-placement="top" onclick="javascript: toggleEditForm();">
					</span>
				<?php } ?>
				<?php if($allowDelete){ ?><input type="button" value="Delete" class="flat-button-default" onclick="javascript: deleteCurrency('<?php echo urlencode($encryptKey); ?>');"><?php } ?>
				<input type="button" value="Back" class="flat-button-default" rel="tooltip" data-original-title="<?php echo SHORTCUT_BACK; ?>" data-placement="top" onclick="javascript: window.location='<?php echo getModuleURL('oz.system.settings.search_management.list'); ?>';">
			</td>
		</tr>
	</table>
</form>
<?php if($allowEdit){ ?>
<script type="text/javascript">	
	function submitForm(mode){
		$('#submit_mode').val(mode);
		clearValidation('form_1');
		// if(!validateExtEmpty('modulesearch', 'module name')){return;}
		$('#form_1').submit();
	}
</script>
<?php } ?>
<?php if($allowDelete){ ?>
<script type="text/javascript">	
	function deleteCurrency(key){
		Ext.MessageBox.confirm('Confirm', 'Are you sure you want to delete selected currency?', function(btn){
			if(btn == 'yes'){
				var request = $.ajax({
					url: HTTP_AJAX,
					type: 'POST',
					dataType: 'json',
					data:{
						opt: 'delete_search_management',
						id: key
					}
				}).done(function(msg){
					if(msg.success){
						$('#oz-noty').oznoty([{
							'type': 'message',
							'title': 'Message',
							'content': 'Search Management successfully deleted.',
							'position': 'right',
							'autoclose': true
						}]);
						window.location = '<?php echo getModuleURL('oz.system.settings.search_management.list'); ?>';
					}else{
						$('#oz-noty').oznoty([{
							'type': 'error',
							'title': 'Error',
							'content': msg.message,
							'position': 'right',
							'autoclose': true
						}]);
					}
				}).fail(function(jqXHR, textStatus){
					$('#oz-noty').oznoty([{
						'type': 'error',
						'title': 'Error',
						'content': 'Could not connect with server. Please refresh browser and try again.',
						'position': 'right',
						'autoclose': true
					}]);
				});
			}
		});
	}
</script>
<?php } ?>