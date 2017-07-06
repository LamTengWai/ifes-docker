<div class="custom-ferdie-carousel">
	<?php foreach($listCustomBanner AS $bannerData){ ?>
	<div class="form-container" style="background-image: url('<?php echo HTTP_MEDIA.'/site-image/custom-banner'.$bannerData['image'];?>'); background-size: cover;">
		<div class="container" style="position: relative;">
			<div class="page-title-content" style="position: relative; top: 230px;"><?php echo $bannerData['page_title']; ?></div>
			<div class="gift-upper-box">
				<p class="page-title-content"><?php echo $bannerData['box_title']; ?></p>
				<p class="page-title-content"><?php echo $bannerData['box_title_1']; ?></p>
				<div class="input-group currency-box">
					<span class="input-group-addon currency-symbol"><?php echo $formCurrencySymbol; ?></span>
					<input type="number" min="0" class="form-control gift-custom-banner-currency gift-catalog-currency-value" aria-label="..." placeholder="0.00" onfocus="flagTimerFerdieCarousel = false;" onblur="flagTimerFerdieCarousel = true;">
					<div class="input-group-btn">
						<button type="button" class="btn btn-default dropdown-toggle currency-code" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $formCurrencyCode; ?> <span class="caret"></span></button>
						<?php echo $formCurrencyToogle; ?>
						<button type="button" class="btn btn-default btn-ifes" style="z-index: 99;" onclick='addGift(this, "<?php echo $bannerData['box_type']; ?>", "search", "<?php echo $bannerData['box_item_description']; ?>", "<?php echo $bannerData['box_item_code']; ?>");'>ADD GIFT</button>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php } ?>
</div>
<div>
<div class="container" style="position: relative; top: -60px; margin-top: -220px;">
	<img src="<?php echo HTTP_MEDIA.'/site-image/ifes-logo.png';?>" width="131" style="margin-bottom: 15px;">
	<p class="page-title">GIVING PAGE</p>
</div>
<script type="text/javascript">
	var flagFerdieCarousel = 0;
	var flagTimerFerdieCarousel = true;
	var flagTimerFerdieCarouselIncrement = 0;
	function changeFerdieCarousel(index){
		flagFerdieCarousel = index;
		flagTimerFerdieCarouselIncrement = 0;
		$('.custom-ferdie-carousel .form-container').each(function(index){
			$(this).css({
				top: 0
			})
		});
		if(index != 0){
			for(var i=0; i<index; i++){
				$('.custom-ferdie-carousel .form-container').each(function(index){
					$(this).css({
						top: "-="+$('.custom-ferdie-carousel').height()
					})
				});
			}
		}
		$('.custom-ferdie-carousel-dot div').removeClass('active');
		$($('.custom-ferdie-carousel-dot div')[index]).addClass('active');
	}
	function slideFerdieCarousel(){
		$('.custom-ferdie-carousel-dot div').removeClass('active');
		if(flagFerdieCarousel <= $('.custom-ferdie-carousel .form-container').length - 2){
			$('.custom-ferdie-carousel .form-container').each(function(index){
				$(this).animate({
					top: "-="+$('.custom-ferdie-carousel').height()
				})
			});
			flagFerdieCarousel++;
		}else{
			$('.custom-ferdie-carousel .form-container').each(function(index){
				$(this).animate({
					top: 0
				})
			});
			flagFerdieCarousel = 0;
		}
		$($('.custom-ferdie-carousel-dot div')[flagFerdieCarousel]).addClass('active');
	}
	function timerFerdieCarousel(){
		if(flagTimerFerdieCarousel){
			if(flagTimerFerdieCarouselIncrement >= 6){
				slideFerdieCarousel();
				flagTimerFerdieCarouselIncrement = 0;
			}else{
				flagTimerFerdieCarouselIncrement ++;
			}
		}
	}
	$(document).ready(function(){
		window.setInterval(timerFerdieCarousel, 1000);
	});
</script>
<div class="container gift-center-link">
	<a>LEGACY GIVING</a> | <a>NON-CASH GIFTS</a> | <a>GIVE BY PHONE OR MAIL</a> | <a>FAQ</a> | <a>PAYMENT PAGE</a> | <a>HELP</a>
</div>
<div class="container custom-ferdie-carousel-dot">
	<?php foreach($listCustomBanner AS $bannerKey => $bannerData){ ?>
	<div <?php if($bannerKey == 0){ ?>class="active"<?php } ?> onclick="changeFerdieCarousel(<?php echo $bannerKey; ?>);">&nbsp;</div>
	<?php } ?>
</div>
<style>
	.custom-ferdie-carousel-dot{
		z-index: 9999999;
		text-align: center;
		position: relative;
		top: -55px;
		margin-bottom: -40px;
	}

	.custom-ferdie-carousel-dot div{
		width: 12px; height: 12px; border-radius: 12px; background-color: #cdcecd; display: inline-block; cursor: pointer;
	}

	.custom-ferdie-carousel-dot div.active{
		background-color: #ffffff;
	}
</style>
<?php if(REGION == "ca"){ ?>
<form id="gift-submit-form" role="form" method="post" onsubmit="return validateForm();">
	<div class="container">
		<table class="gift-catalog-table gift-canada">
			<tr>
				<td style="padding: 20px; text-align: center;">
					<span style="font-weight: bold;">Are you a resident of Canada? Do you need a tax receipt?</span>
					<br><br>
					<p style="text-align: justify; padding: 0 90px;">Gifts may be made to IFES ministry and staff throughout the world by giving through our member movement in Canada, <a href="https://www.ivcf.ca/">Inter-Varsity Christian Fellowship of Canada</a>. You can donate by mail, electronic funds transfer or using your credit card.</p>
					<p style="text-align: justify; padding: 0 90px;">Inter-Varsity does not charge any overheads and are able to issue tax receipts where appropriate.</p>
					<br><br>
					Make your gift via Inter-Varsity Canada:
					<br><br>
					<button type="button" class="btn btn-default btn-ifes" onclick="window.location = 'https://www.ivcf.ca/donate/home';">IVCF.CA/DONATE</button>
					<br><br>
					Not a Canadian resident?
					<br><br>
					<div style="width: 250px; margin: auto;">
						<select id="canada-select-region" name="canada-select-region" class="selectpicker" data-size="8" placeholder="I live/pay tax in...">
							<option value="" data-hidden="true">I live/pay tax in...</option>
							<option value="uk">UK</option>
							<option value="us">USA</option>
							<option value="row">ROW</option>
						</select>
					</div>
					<br>
					<button type="button" class="btn btn-default btn-ifes" onclick="$('#gift-submit-form').submit();">CONTINUE</button>
				</td>
			</tr>
		</table>
		<br><br>
	</div>
</form>
<script type="text/javascript">
	function validateForm(){
		if($('#canada-select-region').val() == ''){
			noty({text: "Please select a region where you are reside in.", type: 'error'});
			return false;
		}
	}
</script>
<?php }else{ ?>
<div class="container">
	<br>
	<p class="gift-title">IFES Gift Catalog</p>
	<br>
	<table class="gift-catalog-table">
		<tr class="header">
			<td id="toggle-gift-header-ministry" onclick="toggleGiftCatalogHeader('ministry');">IFES Ministry</td>
			<td id="toggle-gift-header-staff" onclick="toggleGiftCatalogHeader('staff');">Staff Worker</td>
			<td id="toggle-gift-header-movement" onclick="toggleGiftCatalogHeader('movement');">National Movement</td>
			<?php if(REGION == 'us'){ ?>
			<td id="toggle-gift-header-offering" onclick="toggleGiftCatalogHeader('offering');">Offerings</td>
			<?php } ?>
		</tr>
		<tr>
			<td id="gift-header-blank-space" colspan="<?php if(REGION == 'us'){echo '4';}else{echo '3';} ?>" style="padding: 25px; height: 500px; vertical-align: top;">
				<div id="gift-catalog-ministry" style="display: none;">
					<label class="radio-inline"><input type="radio" id="gift-catalog-ministry-search" name="radio-gift-catalog-ministry" checked onclick="toggleGiftCatalog('ministry', 'search');">Search</label>
					<label class="radio-inline"><input type="radio" id="gift-catalog-ministry-manual" name="radio-gift-catalog-ministry" onclick="toggleGiftCatalog('ministry', 'manual');">Enter an IFES Ministry</label>
					<br><br>
					<div id="gift-catalog-ministry-search-form" style="display: none;">
						<span class="gift-catalog-title">Your partnership with IFES ministry shapes lives and develops Christian leaders who engage the university and impact the world.</span>
						<div class="input-group" style="margin-top: 10px;">
							<input type="text" id="gift-catalog-ministry-search-query" class="form-control" placeholder="Search IFES programs and events">
							<span class="input-group-btn">
								<button class="btn btn-default btn-search" type="button" onclick="searchGiftCatalog('ministry', 0);">SEARCH</button>
							</span>
						</div>
						<div id="gift-catalog-ministry-search-container" class="gift-catalog-default-search-container">
							<p id="gift-catalog-ministry-search-label" class="gift-catalog-default-search-label" ></p>
							<div id="gift-catalog-ministry-search-result" class="gift-catalog-default-search-result"></div>
						</div>
					</div>
					<div id="gift-catalog-ministry-manual-form" style="display: none;">
						<span class="gift-catalog-title">Ministry program or event may not appear in search due to security or technical reasons. If desired designation is not listed, please enter name in the field below.</span>
						<div style="margin-top: 10px;">
							<div class="col-xs-8" style="padding-left: 0;"><input type="text" id="gift-catalog-search-ministry-manual-input" class="form-control" placeholder="Enter ministry name"></div>
							<div class="col-xs-4" style="padding-right: 0;">
								<div class="input-group currency-box">
									<span class="input-group-addon currency-symbol"><?php echo $formCurrencySymbol; ?></span>
									<input type="number" min="0" class="form-control gift-catalog-currency-value" aria-label="..." placeholder="0.00">
									<div class="input-group-btn">
										<button type="button" class="btn btn-default dropdown-toggle currency-code" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $formCurrencyCode; ?> <span class="caret"></span></button>
										<?php echo $formCurrencyToogle; ?>
										<button type="button" class="btn btn-default btn-ifes" onclick="addGift(this, 'ministry', 'manual', $('#gift-catalog-search-ministry-manual-input').val(), '');">ADD GIFT</button>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div id="gift-catalog-staff" style="display: none;">
					<label class="radio-inline"><input type="radio" id="gift-catalog-staff-search" name="radio-gift-catalog-staff" checked onclick="toggleGiftCatalog('staff', 'search');">Search</label>
					<label class="radio-inline"><input type="radio" id="gift-catalog-staff-manual" name="radio-gift-catalog-staff" onclick="toggleGiftCatalog('staff', 'manual');">Enter Staff Name</label>
					<br><br>
					<div id="gift-catalog-staff-search-form" style="display: none;">
						<span class="gift-catalog-title">Your commitment to staff allows them to focus on serving students through their ministry.</span>
						<div class="input-group" style="margin-top: 10px;">
							<input type="text" id="gift-catalog-staff-search-query" class="form-control" placeholder="Staff name and country or ministry">
							<span class="input-group-btn">
								<button class="btn btn-default btn-search" type="button" onclick="searchGiftCatalog('staff', 0);">SEARCH</button>
							</span>
						</div>
						<div id="gift-catalog-staff-search-container" class="gift-catalog-default-search-container">
							<p id="gift-catalog-staff-search-label" class="gift-catalog-default-search-label" ></p>
							<div id="gift-catalog-staff-search-result" class="gift-catalog-default-search-result"></div>
						</div>
					</div>
					<div id="gift-catalog-staff-manual-form" style="display: none;">
						<span class="gift-catalog-title">Staff in sensitive locations may not appear in search. If the staff is not listed, please enter their name and country of service in the field below.</span>
						<div style="margin-top: 10px;">
							<div class="col-xs-8" style="padding-left: 0;"><input type="text" id="gift-catalog-search-manual-input" class="form-control" placeholder="Enter staff name"></div>
							<div class="col-xs-4" style="padding-right: 0;">
								<div class="input-group currency-box">
									<span class="input-group-addon currency-symbol"><?php echo $formCurrencySymbol; ?></span>
									<input type="number" min="0" class="form-control gift-catalog-currency-value" aria-label="..." placeholder="0.00">
									<div class="input-group-btn">
										<button type="button" class="btn btn-default dropdown-toggle currency-code" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $formCurrencyCode; ?> <span class="caret"></span></button>
										<?php echo $formCurrencyToogle; ?>
										<button type="button" class="btn btn-default btn-ifes" onclick="addGift(this, 'staff', 'manual', $('#gift-catalog-search-manual-input').val(), '');">ADD GIFT</button>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div id="gift-catalog-movement" style="display: none;">
					<label class="radio-inline"><input type="radio" id="gift-catalog-movement-search" name="radio-gift-catalog-movement" checked onclick="toggleGiftCatalog('movement', 'search');">Search</label>
					<label class="radio-inline"><input type="radio" id="gift-catalog-movement-manual" name="radio-gift-catalog-movement" onclick="toggleGiftCatalog('movement', 'manual');">Enter a National Movement</label>
					<br><br>
					<div id="gift-catalog-movement-search-form" style="display: none;">
						<span class="gift-catalog-title">Your gift will equip students to share and live out the good news of Jesus Christ in their own culture and context.</span>
						<div class="input-group" style="margin-top: 10px;">
							<input type="text" id="gift-catalog-movement-search-query" class="form-control" placeholder="Student Ministry in...">
							<span class="input-group-btn">
								<button class="btn btn-default btn-search" type="button" onclick="searchGiftCatalog('movement', 0);">SEARCH</button>
							</span>
						</div>
						<div id="gift-catalog-movement-search-container" class="gift-catalog-default-search-container">
							<p id="gift-catalog-movement-search-label" class="gift-catalog-default-search-label" ></p>
							<div id="gift-catalog-movement-search-result" class="gift-catalog-default-search-result"></div>
						</div>
					</div>
					<div id="gift-catalog-movement-manual-form" style="display: none;">
						<span class="gift-catalog-title">Sensitive countries may not appear in search. If national movement is not listed, please enter its name in the field below.</span>
						<div style="margin-top: 10px;">
							<div class="col-xs-8" style="padding-left: 0;"><input type="text" id="gift-catalog-search-movement-manual-input" class="form-control" placeholder="Enter national movement"></div>
							<div class="col-xs-4" style="padding-right: 0;">
								<div class="input-group currency-box">
									<span class="input-group-addon currency-symbol"><?php echo $formCurrencySymbol; ?></span>
									<input type="number" min="0" class="form-control gift-catalog-currency-value" aria-label="..." placeholder="0.00">
									<div class="input-group-btn">
										<button type="button" class="btn btn-default dropdown-toggle currency-code" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $formCurrencyCode; ?> <span class="caret"></span></button>
										<?php echo $formCurrencyToogle; ?>
										<button type="button" class="btn btn-default btn-ifes" onclick="addGift(this, 'movement', 'manual', $('#gift-catalog-search-movement-manual-input').val(), '');">ADD GIFT</button>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<?php if(REGION == 'us'){ ?>
				<div id="gift-catalog-offering" style="display: none;">
					<label class="radio-inline"><input type="radio" id="gift-catalog-offering-search" name="radio-gift-catalog-offering" checked onclick="toggleGiftCatalog('offering', 'search');">Search</label>
					<label class="radio-inline"><input type="radio" id="gift-catalog-offering-manual" name="radio-gift-catalog-offering" onclick="toggleGiftCatalog('offering', 'manual');">Enter an Offering</label>
					<br><br>
					<div id="gift-catalog-offering-search-form" style="display: none;">
						<span class="gift-catalog-title">Select the event you’re attending from the dropdown menu.</span>
						<div style="margin-top: 10px;">
							<div class="col-xs-8" style="padding-left: 0;">
								<select id="gift-catalog-offering-select" class="selectpicker" data-live-search="true" data-size="8" placeholder="The event I’m attending">
									<option value="" data-hidden="true">The event I’m attending</option>
									<?php foreach($listOfferingEvents AS $eventData){ ?>
									<option data-subtext="<?php echo $eventData['sourcecode']; ?>" value="<?php echo $eventData['sourcecode']; ?>"><?php echo $eventData['sourcedescription']; ?></option>
									<?php } ?>
								</select>
							</div>
							<div class="col-xs-4" style="padding-right: 0;">
								<div class="input-group currency-box">
									<span class="input-group-addon currency-symbol"><?php echo $formCurrencySymbol; ?></span>
									<input type="number" min="0" class="form-control gift-catalog-currency-value" aria-label="..." placeholder="0.00">
									<div class="input-group-btn">
										<button type="button" class="btn btn-default dropdown-toggle currency-code" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $formCurrencyCode; ?> <span class="caret"></span></button>
										<?php echo $formCurrencyToogle; ?>
										<button type="button" class="btn btn-default btn-ifes" onclick="addGift(this, 'offering', 'search', $('#gift-catalog-offering-select option:selected').text(), $('#gift-catalog-offering-select').val());">ADD GIFT</button>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div id="gift-catalog-offering-manual-form" style="display: none;">
						<span class="gift-catalog-title">Can’t find your event? Please enter the name of the event you’re attending or the gift designation in the field below.</span>
						<div style="margin-top: 10px;">
							<div class="col-xs-8" style="padding-left: 0;"><input id="gift-catalog-offering-manual-input" type="text" class="form-control" placeholder="Enter event or designation name"></div>
							<div class="col-xs-4" style="padding-right: 0;">
								<div class="input-group currency-box">
									<span class="input-group-addon currency-symbol"><?php echo $formCurrencySymbol; ?></span>
									<input type="number" min="0" class="form-control gift-catalog-currency-value" aria-label="..." placeholder="0.00">
									<div class="input-group-btn">
										<button type="button" class="btn btn-default dropdown-toggle currency-code" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $formCurrencyCode; ?> <span class="caret"></span></button>
										<?php echo $formCurrencyToogle; ?>
										<button type="button" class="btn btn-default btn-ifes" onclick="addGift(this, 'offering', 'manual', $('#gift-catalog-offering-manual-input').val(), '');">ADD GIFT</button>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<?php } ?>
			</td>
		</tr>
	</table>
	<div class="gift-catalog-template" style="display: none;">
		<div class="result-container">
			<div class="col-xs-8 result-label">%templateDescriptionLabel%</div>
			<div class="col-xs-4 result-form">
				<div class="input-group currency-box">
					<span class="input-group-addon currency-symbol"><?php echo $formCurrencySymbol; ?></span>
					<input type="number" min="0" class="form-control gift-catalog-currency-value" aria-label="..." placeholder="0.00">
					<div class="input-group-btn">
						<button type="button" class="btn btn-default dropdown-toggle currency-code" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $formCurrencyCode; ?> <span class="caret"></span></button>
						<?php echo $formCurrencyToogle; ?>
						<button type="button" class="btn btn-default btn-ifes" style="margin-left: 10px;" onclick='addGift(this, "%templateSearchType%", "search", "%templateDescription%", "%templateCode%")'>ADD GIFT</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<hr class="gift-catalog-linebreak" style="<?php if(empty($_POST)){echo "display: none;";} ?>">
<div class="gift-list-outer-container container" style="<?php if(empty($_POST)){echo "display: none;";} ?>">
	<table class="gift-list-table">
		<tr>
			<td class="gift-title">Your Gift List</td>
		</tr>
		<tr>
			<td>
				<div class="gift-list-master">There is no any gift in your list yet.</div>
				<div class="gift-list-template" style="display: none;">
					<div id="gift-list-container-%templateId%" class="gift-list-container">
						<div class="gift-list-container-view" style="display: block;">
							<div class="col-xs-8" style="padding-left: 0;">
								<div style="padding: 6px 0;">%templateDescription%</div>
								<div class="gift-list-view-comment">%templateCommentFormat%</div>
								<div class="gift-list-view-anonymous" style="%templateAnonymousStyle%">Anonymous Gift <img src="<?php echo HTTP_MEDIA; ?>/site-image/tooltip-info.png" class="gift-list-tooltip" data-toggle="tooltip" title="IFES will not reveal your identity to the gift recipient. However, IFES will save your contact details and issue you an official receipt."></div>
							</div>
							<div class="col-xs-4" style="padding-right: 0; text-align: right;">
								<div style="padding: 6px 0;"><span class="currency-symbol"><?php echo $formCurrencySymbol; ?></span> <span class="currency-value">%templateAmountFormat%</span></div>
								<div style="padding: 5px 0; clear: both;">
									<div class="input-group date datetimepicker gift-list-datepicker">
										<input type="text" class="form-control gift-list-input-recurring gift-list-input-recurring-view" value="%templateRecurring%" onchange="changeRecurringDate('%templateId%', this.value);" />
										<span class="input-group-addon" style="padding-bottom: 7px;">
											<span class="glyphicon glyphicon-calendar"></span>
										</span>
									</div>
									<div class="gift-list-label-recurring">Monthly Gift on the</div>
									<input type="checkbox" class="gift-list-input-recurring-check-view" onclick="toggleRecurring('%templateId%', this);" style="position: relative; top: 5px;">
								</div>
								<div style="padding: 6px 0; float: right;">
									<div><a onclick="modifiyGiftList('%templateId%');">Modify</a> | <a onclick="removeGiftList('%templateId%');">Remove</a></div>
								</div>
							</div>
						</div>
						<div class="gift-list-container-edit" style="display: none;">
							<div class="col-xs-8" style="padding-left: 0;">
								<div style="padding: 6px 0;">%templateDescription%</div>
								<div style="padding: 5px 0;"><input type="text" class="form-control gift-list-input-comment" placeholder="Add comment or instructions for the finance office." value="%templateComment%"></div>
								<div><label class="checkbox-inline" style="font-size: 16px;"><input type="checkbox" class="gift-list-input-anonymous" %templateAnonymous%>Anonymous Gift</label><img src="<?php echo HTTP_MEDIA; ?>/site-image/tooltip-info.png" style="top: 0;" class="gift-list-tooltip" data-toggle="tooltip" title="IFES will not reveal your identity to the gift recipient. However, IFES will save your contact details and issue you an official receipt."></div>	
							</div>
							<div class="col-xs-4" style="padding-right: 0; text-align: right;">
								<div class="input-group currency-box" style="float:right; width: 260px;">
									<span class="input-group-addon currency-symbol"><?php echo $formCurrencySymbol; ?></span>
									<input type="number" min="0" class="form-control gift-list-currency-value" aria-label="..." placeholder="0.00" value='%templateAmount%'>
									<div class="input-group-btn">
										<button type="button" class="btn btn-default dropdown-toggle currency-code" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $formCurrencyCode; ?> <span class="caret"></span></button>
										<?php echo $formCurrencyToogle; ?>
									</div>
								</div>
								<div style="padding: 5px 0; clear: both;">
									<div class="input-group date datetimepicker gift-list-datepicker">
										<input type="text" class="form-control gift-list-input-recurring gift-list-input-recurring-edit" value="%templateRecurring%" onchange="changeRecurringDate('%templateId%', this.value);"/>
										<span class="input-group-addon" style="padding-bottom: 7px;">
											<span class="glyphicon glyphicon-calendar"></span>
										</span>
									</div>
									<div class="gift-list-label-recurring">Monthly Gift on the</div>
									<input type="checkbox" class="gift-list-input-recurring-check-edit" onclick="toggleRecurring('%templateId%', this);" style="position: relative; top: 5px;">
								</div>
								<div class="gift-list-save-container">
									<div><a class="gift-list-input-save" onclick="saveGiftList('%templateId%');">Save</a> | <a onclick="cancelGiftList('%templateId%');">Cancel</a></div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</td>
		</tr>
		<tr>
			<td class="gift-total">Total monthly gift:&nbsp;<span class="currency-symbol"><?php echo $formCurrencySymbol; ?></span>&nbsp;<span class="total-recurring">0.00</span></td>
		</tr>
		<tr>
			<td class="gift-total">Total one-time gift:&nbsp;<span class="currency-symbol"><?php echo $formCurrencySymbol; ?></span>&nbsp;<span class="total-onetime">0.00</span></td>
		</tr>
		<?php if(!matchCookieSession()){ ?>
		<tr>
			<td class="gift-list-login">
				<div class="login-container">
					<div class="col-xs-6" style="padding-left: 0; padding-right: 10px;">
						<input type="text" class="form-control" placeholder="User Name" id="login-username">
					</div>
					<div class="col-xs-6" style="padding-left: 10px; padding-right: 0;">
						<input type="password" class="form-control" placeholder="Password" id="login-password">
					</div>
					<div class="col-xs-12" style="padding: 10px; padding-right: 0;">
						<a style="font-size: 14px;" onclick="resetPasswordDialog.open();">Forget your password?</a>
					</div>
					<div class="col-xs-12 paddingless">
						<button type="button" class="btn btn-default btn-ifes" style="margin-right: 15px;" onclick="login();">LOG IN</button>
						<button type="button" class="btn btn-default btn-ifes" onclick="revealPayment();">GIVE AS GUEST</button>
					</div>
				</div>
			</td>
		</tr>
		<?php } ?>
		<tr><td style="padding-bottom: 20px;"></td></tr>
	</table>
</div>
<form id="gift-submit-form" role="form" method="post" onsubmit="return validateForm();">
	<div class="gift-payment" style="<?php if(empty($_POST)){echo "display: none;";} ?>">
		<div class="container">
			<table class="gift-payment-table">
				<tr>
					<td class="gift-title">Secure Payment Information</td>
				</tr>
				<?php if(REGION == 'us'){ ?>
				<tr>
					<td style="text-align: center; padding-top: 10px;">
						<button type="button" id="btn-us-payment-cc" class="btn btn-default btn-ifes <?php if($formPaymentUSPaymode == "cc"){echo 'btn-ifes-active';} ?>" style="margin-right: 15px;" onclick="toggleUSPayment('cc', this);">GIVE BY CREDIT OR DEBIT CARD</button>
						<button type="button" id="btn-us-payment-check" class="btn btn-default btn-ifes <?php if($formPaymentUSPaymode == "check"){echo 'btn-ifes-active';} ?>" onclick="toggleUSPayment('check', this);">GIVE BY eCHECK</button>
						<input type="hidden" id="payment-us-paymode" name="payment-us-paymode" value="<?php echo $formPaymentUSPaymode; ?>">
					</td>
				</tr>
				<?php }else if(REGION == 'uk'){ ?>
				<tr>
					<td style="padding: 12px 15px;">
						<label class="checkbox-inline"><input type="checkbox" id="gift-uk-extra-aid" name="payment-uk-extra-aid" onclick="toggleUKExtraAid();" <?php if($formPaymentUKExtraAid == "on"){echo 'checked';} ?>>Gift Aid my donation to add an extra <span class="currency-symbol"><?php echo $formCurrencySymbol; ?></span> 15.00</label>
						<div id="gift-uk-extra-aid-form" style="<?php if($formPaymentUKExtraAid == "on"){echo 'display: block;';}?>">
							I want to Gift Aid my donation to IFES, any donations that I have made in the last four years, or from 
							<div style="display: inline-block; max-width: 140px;">
								<div class="input-group date datetimepicker1 gift-extra-aid-datepicker" style="top: 10px;">
									<input type="text" id="payment-uk-extra-aid-date" class="form-control" name="payment-uk-extra-aid-date" value="<?php echo $formPaymentUKExtraAidDate; ?>" />
									<span class="input-group-addon" style="padding-bottom: 7px;">
										<span class="glyphicon glyphicon-calendar"></span>
									</span>
								</div>
							</div> and all donations I make in the future.<br><br>
							I am a UK taxpayer and understand that if I pay less Income Tax and/or Capital Gains Tax than the amount of Gift Aid claimed on all my donations in that tax year it is my responsibility to pay any difference. IFES will claim 25p for each &pound; 1 I’ve given. I will notify IFES if I want to cancel this declaration, change my name or home address or no longer pay sufficient Income and/or Capital Gains Tax.
						</div>
					</td>
				</tr>
				<?php } ?>
				<tr id="gift-echeck-form" style="display: none;">
					<td>
						<div class="col-xs-12" style="padding-bottom: 10px;">
							<input type="text" id="gift-echeck-input-acc-no" name="payment-echeck-acc-no" class="form-control" placeholder="Account Number">
						</div>
						<div class="col-xs-12" style="padding-bottom: 10px;">
							<input type="text" id="gift-echeck-input-route-no" name="payment-echeck-router-no" class="form-control" placeholder="Route Number">
						</div>
						<div class="col-xs-12" style="padding-bottom: 10px;">
							<input type="text" id="gift-echeck-input-bank-name" name="payment-echeck-bank-name" class="form-control" placeholder="Bank Name">
						</div>
						<div class="col-xs-6" style="padding-right: 5px; padding-bottom: 10px;">
							<input type="text" id="gift-echeck-input-name" name="payment-echeck-name" class="form-control" placeholder="Name on Account">
						</div>
						<div class="col-xs-6" style="padding-left: 5px; padding-bottom: 10px;">
							<select id="gift-echeck-input-type" name="payment-echeck-type" class="selectpicker" data-size="8" data-none-selected-text="Checking">
								<option value="checking">Checking</option>
								<option value="savings">Savings</option>
							</select>
						</div>
					</td>
				</tr>
				<?php if(!empty($listCreditCards)){ ?>
				<tr id="gift-cc-form-select">
					<td>
						<div class="col-xs-12">
							<select id="gift-cc-select" class="selectpicker" data-size="8" name="payment-cc-select" data-none-selected-text="Please select a credit card">
								<?php foreach($listCreditCards AS $creditCardData){ ?>
								<option value="<?php echo $creditCardData['id']; ?>"><?php echo ccMasking($creditCardData['number']); ?></option>
								<?php } ?>	
							</select>
						</div>
						<div class="col-xs-12" style="text-align: right; padding-top: 10px;">
							<?php if(!empty($listCreditCards)){ ?><button type="button" class="btn btn-default btn-ifes" onclick="toggleCardPayment('edit');" style="margin-right: 15px;">EDIT CARD</button><?php } ?>
							<button type="button" class="btn btn-default btn-ifes" onclick="toggleCardPayment('new');">NEW CARD</button>
						</div>
					</td>
				</tr>
				<?php } ?>
				<tr id="gift-cc-form-new" style="<?php if(!empty($listCreditCards)){echo "display: none;";} ?>">
					<td>
						<div class="col-xs-12" style="padding-bottom: 10px;">
							<input type="hidden" id="gift-cc-input-mode" name="payment-cc-mode" value="<?php if(empty($listCreditCards)){echo "new";}else{echo "select";} ?>">
							<input type="text" id="gift-cc-input-number" name="payment-cc-number" class="form-control" placeholder="Card Number" value="<?php echo $formPaymentCCNumber; ?>">
						</div>
						<div class="col-xs-12" style="padding-bottom: 10px;">
							<input type="text" id="gift-cc-input-name" name="payment-cc-name" class="form-control" placeholder="Name on Card" value="<?php echo $formPaymentCCName; ?>">
						</div>
						<div class="col-xs-6" style="padding-right: 5px;">
							<input type="text" id="gift-cc-input-expiration" name="payment-cc-expiration" class="form-control" placeholder="Expiration MM/YY" value="<?php echo $formPaymentCCExpiration; ?>">
						</div>
						<div class="col-xs-6" style="padding-left: 5px;">
							<input type="text" id="gift-cc-input-cvv" name="payment-cc-cvv" class="form-control" placeholder="CVV">
							<img src="<?php echo HTTP_MEDIA; ?>/site-image/tooltip-info.png" class="gift-cvv-tooltip" data-toggle="tooltip" title="<img src='<?php echo HTTP_MEDIA; ?>/site-image/cvv-tooltip.png' width='140'>">
						</div>
						<?php if(!empty($listCreditCards)){ ?>
						<div class="col-xs-12" style="text-align: right; padding-top: 10px;">
							<button type="button" class="btn btn-default btn-ifes" onclick="toggleCardPayment('select');">CANCEL</button>
						</div>
						<?php } ?>
					</td>
				</tr>
				<tr id="gift-cc-form-process-fee">
					<td>
						<label class="checkbox-inline"><input type="checkbox" id="gift-cc-input-process-fee" name="payment-cc-process-fee" onclick="calcGiftList();" <?php if($formPaymentCCProcessFee != ""){echo 'checked';} ?>>I’d like to increase my donation by <span class='currency-symbol'><?php echo $formCurrencySymbol; ?></span> 5.00 to help towards the cost of online transactions. <img src="<?php echo HTTP_MEDIA; ?>/site-image/tooltip-info.png" class="gift-list-tooltip" data-toggle="tooltip" title="IFES pays a transaction cost on each donation we receive to cover the cost of processing. By ticking this box you will offset all or nearly all of these costs, allowing IFES to spend more of our income on student ministry. Thank you!"></label>
					</td>
				</tr>
				<tr>
					<td class="gift-total">Total monthly gift:&nbsp;<span class="currency-symbol"><?php echo $formCurrencySymbol; ?></span>&nbsp;<span class="total-recurring">0.00</span></td>
				</tr>
				<tr>
					<td class="gift-total">Total one-time gift:&nbsp;<span class="currency-symbol"><?php echo $formCurrencySymbol; ?></span>&nbsp;<span class="total-onetime">0.00</span></td>
				</tr>
				<tr>
					<td class="gift-title" style="padding-top: 40px;">Billing Information</td>
				</tr>
				<tr id="gift-cc-form-billing">
					<td style="text-align: center; padding-top: 20px;">
						<div class="col-xs-12" style="padding-bottom: 10px;">
							<input type="text" id="gift-billing-input-name" name="payment-billing-name" class="form-control" placeholder="Full Name" value="<?php echo $formPaymentBillingName; ?>">
						</div>
						<div class="col-xs-12" style="padding-bottom: 10px;">
							<input type="text" id="gift-billing-input-address1" name="payment-billing-address1" class="form-control" placeholder="Address 1" value="<?php echo $formPaymentBillingAddress1; ?>">
						</div>
						<div class="col-xs-12" style="padding-bottom: 10px;">
							<input type="text" id="gift-billing-input-address2" name="payment-billing-address2" class="form-control" placeholder="Address 2" value="<?php echo $formPaymentBillingAddress2; ?>">
						</div>
						<div class="col-xs-6" style="padding-bottom: 10px; padding-right: 5px;">
							<input type="text" id="gift-billing-input-city" name="payment-billing-city" class="form-control" placeholder="City" value="<?php echo $formPaymentBillingCity; ?>">
						</div>
						<div class="col-xs-6" style="padding-bottom: 10px; padding-left: 5px;">
							<input type="text" id="gift-billing-input-state" name="payment-billing-state" class="form-control" placeholder="State/Provice" value="<?php echo $formPaymentBillingState; ?>">
						</div>
						<div class="col-xs-6" style="padding-bottom: 10px; padding-right: 5px;">
							<input type="text" id="gift-billing-input-zipcode" name="payment-billing-zipcode" class="form-control" placeholder="Zip/Postal Code" value="<?php echo $formPaymentBillingZipcode; ?>">
						</div>
						<div class="col-xs-6" style="padding-bottom: 10px; padding-left: 5px;">
							<select id="gift-billing-input-country" name="payment-billing-country" class="selectpicker" data-size="8" data-none-selected-text="Country">
								<?php foreach($listCountries AS $countryData){ ?>
								<option value="<?php echo $countryData['iso']; ?>" <?php if($countryData['iso'] == $formPaymentBillingCountry){echo 'selected';}?>><?php echo $countryData['name']; ?></option>
								<?php } ?>
							</select>
						</div>
						<div class="col-xs-6" style="padding-bottom: 10px; padding-right: 5px;">
							<input type="text" id="gift-billing-input-email" name="payment-billing-email" class="form-control" placeholder="Email" value="<?php echo $formPaymentBillingEmail; ?>">
						</div>
						<div class="col-xs-6" style="padding-bottom: 10px; padding-left: 5px;">
							<input type="text" id="gift-billing-input-phone" name="payment-billing-phone" class="form-control" placeholder="Phone" value="<?php echo $formPaymentBillingPhone; ?>">
						</div>
					</td>
				</tr>
				<tr>
					<td style="padding: 12px 15px;">
						<label class="checkbox-inline"><input type="checkbox" id="gift-add-mailing" name="payment-add-mailing-address" onclick="$('#gift-cc-form-mailing').toggle();" <?php if($formPaymentAddMailing != ''){echo 'checked';} ?>>Add a preferred mailing address</label>
					</td>
				</tr>
				<tr id="gift-cc-form-mailing" style="<?php if($formPaymentAddMailing == ''){echo 'display: none;';} ?>">
					<td style="text-align: center; padding-top: 20px; font-family: 'Muli', Helvetica;">
						<div class="col-xs-12" style="padding-bottom: 10px;">
							<input type="text" id="gift-mailing-input-name" name="payment-mailing-name" class="form-control" placeholder="Full Name" value="<?php echo $formPaymentMailingName; ?>">
						</div>
						<div class="col-xs-12" style="padding-bottom: 10px;">
							<input type="text" id="gift-mailing-input-address1" name="payment-mailing-address1" class="form-control" placeholder="Address 1" value="<?php echo $formPaymentMailingAddress1; ?>">
						</div>
						<div class="col-xs-12" style="padding-bottom: 10px;">
							<input type="text" id="gift-mailing-input-address2" name="payment-mailing-address2" class="form-control" placeholder="Address 2" value="<?php echo $formPaymentMailingAddress2; ?>">
						</div>
						<div class="col-xs-6" style="padding-bottom: 10px; padding-right: 5px;">
							<input type="text" id="gift-mailing-input-city" name="payment-mailing-city" class="form-control" placeholder="City" value="<?php echo $formPaymentMailingCity; ?>">
						</div>
						<div class="col-xs-6" style="padding-bottom: 10px; padding-left: 5px;">
							<input type="text" id="gift-mailing-input-state" name="payment-mailing-state" class="form-control" placeholder="State/Provice" value="<?php echo $formPaymentMailingState; ?>">
						</div>
						<div class="col-xs-6" style="padding-bottom: 10px; padding-right: 5px;">
							<input type="text" id="gift-mailing-input-zipcode" name="payment-mailing-zipcode" class="form-control" placeholder="Zip/Postal Code" value="<?php echo $formPaymentMailingZipcode; ?>">
						</div>
						<div class="col-xs-6" style="padding-bottom: 10px; padding-left: 5px;">
							<select id="gift-mailing-input-country" name="payment-mailing-country" class="selectpicker" data-size="8" data-none-selected-text="Country">
								<?php foreach($listCountries AS $countryData){ ?>
								<option value="<?php echo $countryData['iso']; ?>" <?php if($countryData['iso'] == $formPaymentMailingCountry){echo 'selected';}?>><?php echo $countryData['name']; ?></option>
								<?php } ?>
							</select>
						</div>
						<div class="col-xs-6" style="padding-bottom: 10px; padding-right: 5px;">
							<input type="text" id="gift-mailing-input-email" name="payment-mailing-email" class="form-control" placeholder="Email" value="<?php echo $formPaymentMailingEmail; ?>">
						</div>
						<div class="col-xs-6" style="padding-bottom: 10px; padding-left: 5px;">
							<input type="text" id="gift-mailing-input-phone" name="payment-mailing-phone" class="form-control" placeholder="Phone" value="<?php echo $formPaymentMailingPhone; ?>">
						</div>
					</td>
				</tr>
				<?php if(!$isLogin){ ?>
				<tr id="gift-create-account-form-1">
					<td>
						<label class="checkbox-inline"><input type="checkbox" id="gift-create-account" name="payment-create-account" onclick="toggleCreateAccount();" <?php if($formPaymentCreateAccount != ""){echo 'checked';} ?>><a style="text-decoration: underline;">Create an account</a> for quick and easy giving, access to your giving history, and to edit and customize your settings.</label>
					</td>
				</tr>
				<tr id="gift-create-account-form-2" style="display: none;">
					<td style="text-align: center;">
						<div class="col-xs-6" style="padding-bottom: 10px; padding-right: 5px;">
							<input type="password" id="gift-save-password" name="payment-account-password" class="form-control" placeholder="Password">
						</div>
						<div class="col-xs-6" style="padding-bottom: 10px; padding-left: 5px;">
							<input type="password" id="gift-save-confirm-password" name="payment-account-confirm-password" class="form-control" placeholder="Confirm Password">
						</div>
					</td>
				</tr>
				<?php } ?>
				<tr id="gift-payment-save-details" style="<?php if(!$isLogin){ ?>display: none;<?php } ?>">
					<td>
						<label class="checkbox-inline"><input type="checkbox" id="gift-save-payment" name="payment-save-information" <?php if($formPaymentSaveInformation != ""){echo 'checked';} ?>>Save payment method information on my account</label>
					</td>
				</tr>
				<?php if(REGION == 'us'){ ?>
				<tr id="gift-payment-us-receipt">
					<td><label class="radio-inline"><input type="radio" name="payment-preferred-receipt" value="email" <?php if($formPaymentPreferredReceipt == 'email'){echo 'checked';} ?>>Email Receipt</label> <label class="radio-inline"><input type="radio" name="payment-preferred-receipt" value="paper" <?php if($formPaymentPreferredReceipt == 'paper'){echo 'checked';} ?>>Paper Receipt</label></td>
				</tr>
				<?php } ?>
			</table>
		</div>
	</div>
	<div class="gift-newsletter" style="<?php if(empty($_POST)){echo "display: none;";} ?>">
		<div class="container">
			<table>
				<tr>
					<td>
						<?php if(REGION == "us"){ ?>
						I want to stay connected with IFES updates<br>
						<label class="checkbox-inline"><input type="checkbox" name="newsletter-us-weekly" <?php if($formNewsletterUSWeekly == "on"){echo 'checked';}?>>Prayerline emails (weekly)</label><br>
						<label class="checkbox-inline"><input type="checkbox" name="newsletter-us-bimonthly" <?php if($formNewsletterUSBimonthly == "on"){echo 'checked';}?>>Praise &amp; Prayer (bimonthly)</label> <label class="radio-inline"><input type="radio" name="newsletter-us-bimonthly-mode" value="email" <?php if($formNewsletterUSBimonthlyMode == "email"){echo 'checked';} ?>>By Email</label><label class="radio-inline"><input type="radio" name="newsletter-us-bimonthly-mode" value="mail" <?php if($formNewsletterUSBimonthlyMode == "mail"){echo 'checked';} ?>>By Mail</label><br>
						<?php }else if(REGION == "uk"){ ?>
							IFES would love to keep you up to date with student ministry news and prayer information (6-8 per year) by post.<br>
							<label class="checkbox-inline"><input type="checkbox" name="newsletter-uk-email" <?php if($formNewsletterUKEmail == "on"){echo 'checked';} ?>>Please send me these updates by EMAIL</label><br>
							<label class="checkbox-inline"><input type="checkbox" name="newsletter-uk-not" <?php if($formNewsletterUKNot == "on"){echo 'checked';} ?>>Please do NOT send me these updates</label><br>
							<label class="checkbox-inline"><input type="checkbox" name="newsletter-uk-email-weekly" <?php if($formNewsletterUKEmailWeekly == "on"){echo 'checked';} ?>>Please also send me Prayerline emails (weekly)</label><br>
							<span>I am happy to be contacted by </span><label class="checkbox-inline" name="newsletter-uk-contact"><input type="checkbox" name="newsletter-uk-contact-email" <?php if($formNewsletterUKContactEmail == 'on'){echo 'checked';} ?>>Email</label> <label class="checkbox-inline"><input type="checkbox" name="newsletter-uk-contact-post" <?php if($formNewsletterUKContactPost == 'on'){echo 'checked';} ?>>Post </label><label class="checkbox-inline"><input type="checkbox" name="newsletter-uk-contact-phone" <?php if($formNewsletterUKContactPhone == 'on'){echo 'checked';} ?>>Phone</label>
						<?php }else{ ?>
						I want to stay connected with IFES updates<br>
						<label class="checkbox-inline"><input type="checkbox" name="newsletter-row-weekly" <?php if($formNewsletterROWWeekly == "on"){echo 'checked';} ?>>Prayerline emails (weekly)</label><br>
						<label class="checkbox-inline"><input type="checkbox" name="newsletter-row-yearly" <?php if($formNewsletterROWYearly == "on"){echo 'checked';} ?>>News and prayer updates by email (6-8 per year)</label><br><br>
						<span>I am happy to be contacted by </span><label class="checkbox-inline"><input type="checkbox" name="newsletter-row-email" <?php if($formNewsletterROWEmail == "on"){echo 'checked';} ?>>Email</label> <label class="checkbox-inline"><input type="checkbox" name="newsletter-row-post" <?php if($formNewsletterROWPost == 'on'){echo 'checked';}?>>Post</label> <label class="checkbox-inline"><input type="checkbox" name="newsletter-row-phone" <?php if($formNewsletterROWPhone == 'on'){echo 'checked';}?>>Phone</label>
						<?php } ?>
					</td>
				</tr>
				<tr>
					<td class="gift-total">Total monthly gift:&nbsp;<span class="currency-symbol"><?php echo $formCurrencySymbol; ?></span>&nbsp;<span class="total-recurring">0.00</span></td>
				</tr>
				<tr>
					<td class="gift-total">Total one-time gift:&nbsp;<span class="currency-symbol"><?php echo $formCurrencySymbol; ?></span>&nbsp;<span class="total-onetime">0.00</span></td>
				</tr>
				<tr>
					<td>
						<div class="col-xs-6" style="padding-left: 0; padding-top: 4px; font-family: 'Muli-Bold', Helvetica; font-size: 18px;">
							Thank you for your gift!
						</div>
						<div class="col-xs-6" style="text-align: right; padding-right: 0;">
							<button type="button" class="btn btn-default btn-ifes" onclick="$('#gift-submit-form').submit();">GIVE NOW</button>
						</div>
					</td>
				</tr>
				<?php if(REGION == 'us'){ ?>
				<tr>
					<td>
						<table class="gift-newsletter-us-footer" style="width: 100%;">
							<tr>
								<td style="width: 60px;"><img src="<?php echo HTTP_MEDIA;?>/site-image/ecfa_logo.jpg"></td>
								<td style="width: 60px;"><img src="<?php echo HTTP_MEDIA;?>/site-image/guidestar.jpg"></td>
								<td>This contribution is made with the understanding that IFES/USA has complete discretion and control over the use of the donated funds. If IFES cannot honor your preference, your gift will be used where most needed.</td>
							</tr>
						</table>
					</td>
				</tr>
				<?php } ?>
			</table>
		</div>
	</div>
	<div id="submit-variable" style="display: none;"></div>
</form>
<br><br>
<script type="text/javascript">
	var giftLists = [];
	var giftCurrencySymbol = '<?php echo $formCurrencySymbol; ?>';
	var giftCurrencyCode = '<?php echo $formCurrencyCode; ?>';

	<?php if(!$isLogin){ ?>
	$("#login-username").on('keyup', function (e){
		if(e.keyCode === 13){
			$('#login-password').focus();
		}
	});

	$("#login-password").on('keyup', function (e){
		if(e.keyCode === 13){
			login();
		}
	});

	function login(){
		if(!bootstrapValidateEmpty("login-username", "")){
			noty({text: "Please fill in username.", type: 'error'});
			return false;
		}

		if(!bootstrapValidateEmpty("login-password", "")){
			noty({text: "Please fill in password.", type: 'error'});
			return false;
		}

		$('.gift-list-outer-container').ploading({action: 'show'});
		$.ajax({
			url: HTTP_AJAX,
			type: 'POST',
			dataType: 'json',
			data:{
				opt: 'login',
				username: $('#login-username').val(),
				password: $('#login-password').val()
			}
		}).done(function(msg){
			if(msg.success){
				if(msg.login){
					for(var i=0; i<giftLists.length; i++){
						$('<input>').attr({name: 'catalog-value-type[]', value: giftLists[i].type}).appendTo('#submit-variable');
						$('<input>').attr({name: 'catalog-value-mode[]', value: giftLists[i].mode}).appendTo('#submit-variable');
						$('<input>').attr({name: 'catalog-value-code[]', value: giftLists[i].code}).appendTo('#submit-variable');
						$('<input>').attr({name: 'catalog-value-description[]', value: giftLists[i].description}).appendTo('#submit-variable');
						$('<input>').attr({name: 'catalog-value-comment[]', value: giftLists[i].comment}).appendTo('#submit-variable');
						$('<input>').attr({name: 'catalog-value-anonymous[]', value: giftLists[i].anonymous}).appendTo('#submit-variable');
						$('<input>').attr({name: 'catalog-value-amount[]', value: giftLists[i].amount}).appendTo('#submit-variable');
						$('<input>').attr({name: 'catalog-value-recurring[]', value: giftLists[i].recurring}).appendTo('#submit-variable');
						$('<input>').attr({name: 'catalog-value-recurring-check[]', value: giftLists[i].recurring_check}).appendTo('#submit-variable');
					}

					$('<input>').attr({name: 'submit-currency-code', value: $('.currency-code').html().substr(0, 3)}).appendTo('#submit-variable');
					$('<input>').attr({name: 'submit-currency-symbol', value: $('.currency-symbol').html()}).appendTo('#submit-variable');
					$('<input>').attr({name: 'login-mode', value: '1'}).appendTo('#submit-variable');
 					$('#gift-submit-form').attr('onsubmit', 'return true;');
					$('#gift-submit-form').submit();
				}else{
					noty({text: msg.message, type: 'error'});
				}
			
			}else{
				noty({text: "Could not get data from server. Please try again.", type: 'error'});
			}
			$('.gift-list-outer-container').ploading({action: 'hide'});
		}).fail(function(jqXHR, textStatus){
			$('.gift-list-outer-container').ploading({action: 'hide'});
			noty({text: "Could not connect with server. Please refresh your browser and try again.", type: 'error'});
		});
	}
	<?php } ?>

	function toggleCurrency(code, symbol){
		$('.currency-code').html(code+' <span class="caret"></span>');
		$('.currency-symbol').html(symbol);
		giftCurrencySymbol = symbol;
		giftCurrencyCode = code;
	}

	function toggleGiftCatalogHeader(type){
		$('#toggle-gift-header-ministry, #toggle-gift-header-staff, #toggle-gift-header-movement, #toggle-gift-header-offering').removeClass('active');
		$('#toggle-gift-header-'+type).addClass('active');
		$('#gift-catalog-ministry, #gift-catalog-staff, #gift-catalog-movement, #gift-catalog-offering').hide();
		$('#gift-catalog-'+type).show();
		toggleGiftCatalog(type, 'search');
		$("#gift-catalog-"+type+"-search").prop("checked", true);
		if(type == 'offering'){
			$('#gift-header-blank-space').height(100);
		}else{
			$('#gift-header-blank-space').height(500);
		}
	}

	function toggleGiftCatalog(type, mode){
		$('#gift-catalog-'+type+'-search-form').hide();
		$('#gift-catalog-'+type+'-manual-form').hide();
		$('#gift-catalog-'+type+'-'+mode+'-form').show();
	}

	function searchGiftCatalog(type, page){
		var searchQuery = $('#gift-catalog-'+type+'-search-query').val();
		if(searchQuery.length >= 3){
			$('#gift-catalog-'+type+'-search-container').ploading({action: 'show'});
			$.ajax({
				url: HTTP_AJAX,
				type: 'POST',
				dataType: 'json',
				data:{
					opt: 'search_gift_catalog',
					type: type,
					query: searchQuery,
					page: page
				}
			}).done(function(msg){
				if(msg.success){
					var searchStartOf = ((page+1)*50);
					if(searchStartOf > msg.total_all){
						searchStartOf = msg.total_all;
					}
					if(msg.total_all === undefined){
						var searchHeaderResult = 'Showing most relevant results for '+searchQuery+' (0 of 0 results)';
					}else{
						var searchHeaderResult = 'Showing most relevant results for '+searchQuery+' ('+searchStartOf+' of '+msg.total_all+' results)';
					}
					searchHeaderResult += '<div class="gift-list-header-pagination">';
					if(page > 0){
						searchHeaderResult += '<a onclick="searchGiftCatalog('+"'"+type+"'"+', '+(page-1)+');">PREVIOUS</a>';
					}
					if(((page+1)*50) < msg.total_all){
						searchHeaderResult += '<a onclick="searchGiftCatalog('+"'"+type+"'"+', '+(page+1)+');">NEXT</a>';
					}
					searchHeaderResult += '</div>';
					$('#gift-catalog-'+type+'-search-label').html(searchHeaderResult);
					var tmpTemplates = "";
					var catalogTemplate = $('.gift-catalog-template').html();
					for(var i=0; i<msg.total; i++){
						var tmpTemplate = catalogTemplate;
						tmpTemplate = tmpTemplate.replace(/%templateDescription%/g, msg.result[i].destinationdescription);
						tmpTemplate = tmpTemplate.replace(/%templateDescriptionLabel%/g, msg.result[i].destinationdescription+' <span class="gift-catalog-search-desc">'+msg.result[i].destinationgroup+'</span>');
						tmpTemplate = tmpTemplate.replace(/%templateCode%/g, msg.result[i].destinationcode);
						tmpTemplate = tmpTemplate.replace(/%templateSearchType%/g, type);
						tmpTemplates += tmpTemplate;
					}
					$('#gift-catalog-'+type+'-search-result').html(tmpTemplates);
					rebind();
				}else{
					noty({text: "Could not get data from server. Please try again.", type: 'error'});
				}
				$('#gift-catalog-'+type+'-search-container').ploading({action: 'hide'});
			}).fail(function(jqXHR, textStatus){
				$('#gift-catalog-'+type+'-search-container').ploading({action: 'hide'});
				noty({text: "Could not connect with server. Please refresh your browser and try again.", type: 'error'});
			});
		}else{
			$('#gift-catalog-'+type+'-search-label').html('');
			$('#gift-catalog-'+type+'-search-result').html('');
			noty({text: "Please search with at least 3 characters.", type: 'error'});
		}
	}

	function addGift(obj, type, mode, desc, code){
		$('.gift-catalog-linebreak, .gift-list-outer-container').show();
		<?php if($isLogin){ ?>revealPayment();<?php } ?>
		var objCurrency = $(obj).parent().parent();
		var giftValue = objCurrency.find('.gift-catalog-currency-value').val();
		if(giftValue == "" || giftValue <= 0){
			noty({text: "Please enter an amount of more than 0 for the selected gift.", type: 'error'});
			obj.focus();
		}else{
			if(desc == ""){
				noty({text: "Please set a description for selected gift.", type: 'error'});
			}else{
				var exist = false;
				for(var i=0; i<giftLists.length; i++){
					if(giftLists[i].mode == mode && giftLists[i].type == type && giftLists[i].code == code && giftLists[i].description == desc && giftLists[i].recurring == ''){
						exist = true;
						giftLists[i].amount += Number(giftValue);
						$('#gift-list-container-'+giftLists[i].id).find('.currency-value').html(number_format(giftLists[i].amount, 2, ".", ","));
						$('#gift-list-container-'+giftLists[i].id).find('.gift-list-currency-value').val(giftLists[i].amount);
						noty({text: "Your gift list has been updated.", type: 'information'});
						rebind();
						calcGiftList();
						break;
					}
				}

				if(!exist){
					var giftList = new Object();
					giftList.id = Math.round((new Date()).getTime() / 1000);
					giftList.type = type;
					giftList.mode = mode;
					giftList.code = code;
					giftList.description = desc;
					giftList.comment = '';
					giftList.amount = Number(giftValue);
					giftList.anonymous = false;
					giftList.recurring = '';
					giftList.recurring_check = false;
					giftLists.push(giftList);

					renderGiftLists(giftLists.length-1);
					noty({text: "Your gift list has been updated.", type: 'information'});
					rebind();
					calcGiftList();
					$('.gift-list-tooltip').tooltip();
				}
			}
		}
	}

	function removeGiftList(index){
		for(var i=0; i<giftLists.length; i++){
			if(giftLists[i].id == index){
				giftLists.splice(i, 1);
				break;
			}
		}
		$('#gift-list-container-'+index).remove();
		if(giftLists.length == 0){
			$('.gift-list-master').html('There is no any gift in your list yet.');
		}
		calcGiftList();
		$('.gift-list-tooltip').tooltip();
	}

	function toggleRecurring(index, obj){
		for(var i=0; i<giftLists.length; i++){
			if(giftLists[i].id == index){
				if($(obj).prop('checked')){
					giftLists[i].recurring_check = true;
				}else{
					giftLists[i].recurring_check = false;
				}
				$('#gift-list-container-'+index).find('.gift-list-input-recurring-check-view').prop('checked', giftLists[i].recurring_check);
				$('#gift-list-container-'+index).find('.gift-list-input-recurring-check-edit').prop('checked', giftLists[i].recurring_check);
				break;
			}
		}
		calcGiftList();
	}

	function changeRecurringDate(index, val){
		for(var i=0; i<giftLists.length; i++){
			if(giftLists[i].id == index){
				giftLists[i].recurring = val;
				break;
			}
		}
		calcGiftList();
	}

	function renderGiftLists(index){
		var tmpTemplate = $('.gift-list-template').html();
		tmpTemplate = tmpTemplate.replace(/%templateId%/g, giftLists[index].id);
		tmpTemplate = tmpTemplate.replace(/%templateDescription%/g, giftLists[index].description);
		tmpTemplate = tmpTemplate.replace(/%templateComment%/g, giftLists[index].comment);
		if(giftLists[index].comment != ""){
			tmpTemplate = tmpTemplate.replace(/%templateCommentFormat%/g, giftLists[index].comment);
		}else{
			tmpTemplate = tmpTemplate.replace(/%templateCommentFormat%/g, '&nbsp;');
		}
		tmpTemplate = tmpTemplate.replace(/%templateAmount%/g, giftLists[index].amount);
		tmpTemplate = tmpTemplate.replace(/%templateAmountFormat%/g, number_format(giftLists[index].amount, 2, ".", ","));
		tmpTemplate = tmpTemplate.replace(/%templateRecurring%/g, giftLists[index].recurring);
		if(giftLists[index].recurring == ""){
			tmpTemplate = tmpTemplate.replace(/%templateRecurringFormat%/g, 'One-time gift');
		}else{
			tmpTemplate = tmpTemplate.replace(/%templateRecurringFormat%/g, 'Monthly Gift on the '+giftLists[index].recurring);
		}

		if(giftLists[index].anonymous){
			tmpTemplate = tmpTemplate.replace(/%templateAnonymous%/g, 'checked');
			tmpTemplate = tmpTemplate.replace(/%templateAnonymousStyle%/g, 'display: block;');
		}else{
			tmpTemplate = tmpTemplate.replace(/%templateAnonymous%/g, '');
			tmpTemplate = tmpTemplate.replace(/%templateAnonymousStyle%/g, '');
		}

		if(giftLists.length == 1){
			$('.gift-list-master').html(tmpTemplate);
		}else{
			$('.gift-list-master').append(tmpTemplate);
		}
	}

	function modifiyGiftList(index){
		for(var i=0; i<giftLists.length; i++){
			if(giftLists[i].id == index){
				$('#gift-list-container-'+index).find('.gift-list-currency-value').val(giftLists[i].amount);
				$('#gift-list-container-'+index).find('.gift-list-input-anonymous').prop('checked', giftLists[i].anonymous);
				$('#gift-list-container-'+index).find('.gift-list-input-comment').val(giftLists[i].comment);
				giftLists[i].recurring = $('#gift-list-container-'+index).find('.gift-list-input-recurring-view').val();
				$('#gift-list-container-'+index).find('.gift-list-input-recurring').val(giftLists[i].recurring);
				break;
			}
		}
		$('#gift-list-container-'+index).children('.gift-list-container-view').hide();
		$('#gift-list-container-'+index).children('.gift-list-container-edit').show();
	}

	function cancelGiftList(index){
		$('#gift-list-container-'+index).children('.gift-list-container-view').show();
		$('#gift-list-container-'+index).children('.gift-list-container-edit').hide();
	}

	function saveGiftList(index){
		var inputCurrency = $('#gift-list-container-'+index).find('.gift-list-currency-value').val();
		if(inputCurrency == "" || inputCurrency <= 0){
			noty({text: "Please enter an amount of more than 0 for the selected gift.", type: 'error'});
			return;
		}else{
			$('#gift-list-container-'+index).find('.currency-value').html(number_format(inputCurrency, 2, ".", ","));
		}

		var inputAnonymous = $('#gift-list-container-'+index).find('.gift-list-input-anonymous');
		if(inputAnonymous.prop('checked')){
			$('#gift-list-container-'+index).find('.gift-list-view-anonymous').show();
		}else{
			$('#gift-list-container-'+index).find('.gift-list-view-anonymous').hide();
		}

		var inputComment = $('#gift-list-container-'+index).find('.gift-list-input-comment').val();
		if(inputComment == ""){
			$('#gift-list-container-'+index).find('.gift-list-view-comment').html('&nbsp;');
		}else{
			$('#gift-list-container-'+index).find('.gift-list-view-comment').html(inputComment);
		}

		var inputRecurringCheck = $('#gift-list-container-'+index).find('.gift-list-input-recurring-check-view').val();
		var inputRecurring = $('#gift-list-container-'+index).find('.gift-list-input-recurring-edit').val();
		$('#gift-list-container-'+index).find('.gift-list-input-recurring-view').val(inputRecurring);

		$('#gift-list-container-'+index).children('.gift-list-container-view').show();
		$('#gift-list-container-'+index).children('.gift-list-container-edit').hide();

		for(var i=0; i<giftLists.length; i++){
			if(giftLists[i].id == index){
				giftLists[i].amount = Number(inputCurrency);
				giftLists[i].recurring = inputRecurring;
				giftLists[i].recurring_check = inputRecurringCheck;
				giftLists[i].comment = inputComment;
				giftLists[i].anonymous = inputAnonymous.prop('checked');
				break;
			}
		}
		calcGiftList();
		noty({text: "Your gift list has been updated.", type: 'information'});
		$('.gift-list-tooltip').tooltip();
	}

	function calcGiftList(){
		var tmpRecurring = 0;
		var tmpOnetime = 0;
		for(var i=0; i<giftLists.length; i++){
			if(giftLists[i].recurring == '' && !giftLists[i].recurring_check){
				tmpOnetime += giftLists[i].amount;
			}else{
				tmpRecurring += giftLists[i].amount;
			}
		}

		if($('#payment-us-paymode').val() != 'check'){
			if($('#gift-cc-input-process-fee').prop('checked')){
				if(tmpOnetime > 0){
					tmpOnetime += 5;
				}
				if(tmpRecurring > 0){
					tmpRecurring += 5;
				}
			}
		}

		if($('#gift-uk-extra-aid').prop('checked')){
			if(tmpOnetime > 0){
				tmpOnetime += 15;
			}
			if(tmpRecurring > 0){
				tmpRecurring += 15;
			}
		}

		$('.total-recurring').html(number_format(tmpRecurring, 2, ".", ","));
		$('.total-onetime').html(number_format(tmpOnetime, 2, ".", ","));
	}

	$(document).ready(function(){
		$('.gift-list-tooltip').tooltip();
		$('.gift-cvv-tooltip').tooltip({html: 'true'});

		toggleGiftCatalogHeader('ministry');
		rebind();

		$('.datetimepicker1').datetimepicker({
			format: 'DD/MM/YYYY',
			allowInputToggle: true
		});

		$("#gift-cc-input-expiration").inputmask("99/99", {placeholder: 'MM/YY', "clearIncomplete": true});
		$("#gift-billing-input-email, #gift-payment-input-email").inputmask("email");

		<?php if(!empty($formGiftLists)){
				foreach($formGiftLists AS $listKey => $listData){ ?>
		var giftList = new Object();
		giftList.id = <?php echo (time()+$listKey); ?>;
		giftList.type = '<?php echo $listData["type"]; ?>';
		giftList.mode = '<?php echo $listData["mode"]; ?>';
		giftList.code = '<?php echo $listData["code"]; ?>';
		giftList.description = '<?php echo $listData["description"]; ?>';
		giftList.comment = '<?php echo $listData["comment"]; ?>';
		giftList.amount = <?php echo $listData["amount"]; ?>;
		giftList.anonymous = <?php echo $listData["anonymous"]; ?>;
		giftList.recurring = '<?php echo $listData["recurring"]; ?>';
		giftLists.push(giftList);
		<?php	} ?>
		for(var i=0; i<giftLists.length; i++){
			renderGiftLists(i);
		}
		rebind();
		calcGiftList();
		<?php	} ?>

		<?php if(isset($formLoginMode) && $formLoginMode == "1"){ ?>
		$(document).scrollTop( $("#gift-submit-form").offset().top); 
     	<?php } ?>
	});

	$("#gift-catalog-staff-search-query").on('keyup', function (e){
		if(e.keyCode === 13){
			searchGiftCatalog('staff', 0);
		}
	});

	$("#gift-catalog-ministry-search-query").on('keyup', function (e){
		if(e.keyCode === 13){
			searchGiftCatalog('ministry', 0);
		}
	});

	$("#gift-catalog-movement-search-query").on('keyup', function (e){
		if(e.keyCode === 13){
			searchGiftCatalog('movement', 0);
		}
	});

	function validateCC(){
		if($('#gift-cc-input-mode').val() != 'select'){
			if(!bootstrapValidateEmpty("gift-cc-input-number", "")){
				noty({text: "Please fill in card number.", type: 'error'});
				return false;
			}
			if(!bootstrapValidateEmpty("gift-cc-input-name", "")){
				noty({text: "Please fill in name on card.", type: 'error'});
				return false;
			}
			if(!bootstrapValidateEmpty("gift-cc-input-expiration", "")){
				noty({text: "Please fill in card expiration date.", type: 'error'});
				return false;
			}
			if(Number($('#gift-cc-input-expiration').val().substr(0,2)) > 12){
				noty({text: "Invalid card expiration date.", type: 'error'});
				$('#gift-cc-input-expiration').focus();
				$('#gift-cc-input-expiration').parent().addClass("has-error");
				return false;
			}else{
				$('#gift-cc-input-expiration').parent().removeClass("has-error");
			}
			if(!bootstrapValidateEmpty("gift-cc-input-cvv", "")){
				noty({text: "Please fill in card cvv.", type: 'error'});
				return false;
			}
		}
		return true;
	}

	function validateForm(){
		if(giftLists.length == 0){
			noty({text: "Please add at least 1 gift before submit this donation form.", type: 'error'});
			return false;
		}

		<?php if(REGION == 'uk'){ ?>
			if($('#gift-uk-extra-aid').prop('checked')){
				if(!bootstrapValidateEmpty("payment-uk-extra-aid-date", "")){
					noty({text: "Please fill in your aid date.", type: 'error'});
					return false;
				}
			}
		<?php }else if(REGION == 'us'){ ?>
			if($('#payment-us-paymode').val() == "check"){
				if(!bootstrapValidateEmpty("gift-echeck-input-acc-no", "")){
					noty({text: "Please fill in account number.", type: 'error'});
					return false;
				}
				if(!bootstrapValidateEmpty("gift-echeck-input-route-no", "")){
					noty({text: "Please fill in route number.", type: 'error'});
					return false;
				}
				if(!bootstrapValidateEmpty("gift-echeck-input-bank-name", "")){
					noty({text: "Please fill in bank name.", type: 'error'});
					return false;
				}
				if(!bootstrapValidateEmpty("gift-echeck-input-name", "")){
					noty({text: "Please fill in name on account.", type: 'error'});
					return false;
				}
			}else if($('#payment-us-paymode').val() == "cc" && !validateCC()){
				return false;
			}
		<?php }else{ ?>
			if(!validateCC()){
				return false;
			}
		<?php } ?>

		if(!bootstrapValidateEmpty("gift-billing-input-name", "")){
			noty({text: "Please fill in full name.", type: 'error'});
			return false;
		}
		if(!bootstrapValidateEmpty("gift-billing-input-address1", "")){
			noty({text: "Please fill in address 1.", type: 'error'});
			return false;
		}
		if(!bootstrapValidateEmpty("gift-billing-input-address2", "")){
			noty({text: "Please fill in address 2.", type: 'error'});
			return false;
		}
		if(!bootstrapValidateEmpty("gift-billing-input-city", "")){
			noty({text: "Please fill in city.", type: 'error'});
			return false;
		}
		if(!bootstrapValidateEmpty("gift-billing-input-state", "")){
			noty({text: "Please fill in state.", type: 'error'});
			return false;
		}
		if(!bootstrapValidateEmpty("gift-billing-input-zipcode", "")){
			noty({text: "Please fill in zipcode.", type: 'error'});
			return false;
		}
		if(!bootstrapValidateEmpty("gift-billing-input-email", "")){
			noty({text: "Please fill in email.", type: 'error'});
			return false;
		}
		if(!bootstrapValidateEmpty("gift-billing-input-phone", "")){
			noty({text: "Please fill in phone.", type: 'error'});
			return false;
		}

		if($('#gift-add-mailing').prop('checked')){
			if(!bootstrapValidateEmpty("gift-mailing-input-name", "")){
				noty({text: "Please fill in full name.", type: 'error'});
				return false;
			}
			if(!bootstrapValidateEmpty("gift-mailing-input-address1", "")){
				noty({text: "Please fill in address 1.", type: 'error'});
				return false;
			}
			if(!bootstrapValidateEmpty("gift-mailing-input-address2", "")){
				noty({text: "Please fill in address 2.", type: 'error'});
				return false;
			}
			if(!bootstrapValidateEmpty("gift-mailing-input-city", "")){
				noty({text: "Please fill in city.", type: 'error'});
				return false;
			}
			if(!bootstrapValidateEmpty("gift-mailing-input-state", "")){
				noty({text: "Please fill in state.", type: 'error'});
				return false;
			}
			if(!bootstrapValidateEmpty("gift-mailing-input-zipcode", "")){
				noty({text: "Please fill in zipcode.", type: 'error'});
				return false;
			}
			if(!bootstrapValidateEmpty("gift-mailing-input-email", "")){
				noty({text: "Please fill in email.", type: 'error'});
				return false;
			}
			if(!bootstrapValidateEmpty("gift-mailing-input-phone", "")){
				noty({text: "Please fill in phone.", type: 'error'});
				return false;
			}
		}

		if($('#gift-create-account').prop('checked')){
			if(!bootstrapValidateEmpty("gift-save-password", "")){
				noty({text: "Please fill in password.", type: 'error'});
				return false;
			}
			if(!bootstrapValidateEmpty("gift-save-confirm-password", "")){
				noty({text: "Please fill in Confirm password.", type: 'error'});
				return false;
			}
			if($('#gift-save-confirm-password').val() != $('#gift-save-password').val()){
				noty({text: "Password and confirm password does not match.", type: 'error'});
				return false;
			}
		}

		for(var i=0; i<giftLists.length; i++){
			$('<input>').attr({name: 'catalog-value-type[]', value: giftLists[i].type}).appendTo('#submit-variable');
			$('<input>').attr({name: 'catalog-value-mode[]', value: giftLists[i].mode}).appendTo('#submit-variable');
			$('<input>').attr({name: 'catalog-value-code[]', value: giftLists[i].code}).appendTo('#submit-variable');
			$('<input>').attr({name: 'catalog-value-description[]', value: giftLists[i].description}).appendTo('#submit-variable');
			$('<input>').attr({name: 'catalog-value-comment[]', value: giftLists[i].comment}).appendTo('#submit-variable');
			$('<input>').attr({name: 'catalog-value-anonymous[]', value: giftLists[i].anonymous}).appendTo('#submit-variable');
			$('<input>').attr({name: 'catalog-value-amount[]', value: giftLists[i].amount}).appendTo('#submit-variable');
			$('<input>').attr({name: 'catalog-value-recurring[]', value: giftLists[i].recurring}).appendTo('#submit-variable');
		}

		$('<input>').attr({name: 'submit-currency-code', value: $('.currency-code').html().substr(0, 3)}).appendTo('#submit-variable');
		$('<input>').attr({name: 'submit-currency-symbol', value: $('.currency-symbol').html()}).appendTo('#submit-variable');
	}

	function revealPayment(){
		$('.gift-payment, .gift-newsletter').show();
	}

	function rebind(){
		$('.gift-catalog-currency-value').off();
		$('.gift-catalog-currency-value').on('keyup', function (e){
			if(e.keyCode === 13){
				$(e.target).next('div').children('.btn-ifes').click();
			}
		});

		$('.datetimepicker').datetimepicker({
			format: 'Do',
			allowInputToggle: true
		});

		$('.gift-list-currency-value').off();
		$('.gift-list-currency-value').on('keyup', function (e){
			if(e.keyCode === 13){
				$(e.target).parent().parent().parent().find('.gift-list-input-save').click();
			}
		});

		$('.gift-list-input-comment').off();
		$('.gift-list-input-comment').on('keyup', function (e){
			if(e.keyCode === 13){
				$(e.target).parent().parent().parent().find('.gift-list-input-save').click();
			}
		});
	}

	function toggleCardPayment(mode){
		if(mode == "edit"){
			$('.gift-payment').ploading({action: 'show'});
			$.ajax({
				url: HTTP_AJAX,
				type: 'POST',
				dataType: 'json',
				data:{
					opt: 'get_cc_details',
					id: $('#gift-cc-select').val()
				}
			}).done(function(msg){
				if(msg.success){
					if(msg.valid){
						$('#gift-cc-input-number').val(msg.number);
						$('#gift-cc-input-name').val(msg.name);
						$('#gift-cc-input-expiration').val(msg.expiration);
						$('#gift-cc-input-cvv').val('');
						$('#gift-cc-input-mode').val(mode);
						$('#gift-cc-form-select').toggle();
						$('#gift-cc-form-new').toggle();
					}else{
						noty({text: "Requested card information does not available.", type: 'error'});
					}
					$('.gift-payment').ploading({action: 'hide'});
				}else{
					noty({text: "Could not get data from server. Please try again.", type: 'error'});
					$('.gift-payment').ploading({action: 'hide'});
				}
			}).fail(function(jqXHR, textStatus){
				noty({text: "Could not connect with server. Please refresh your browser and try again.", type: 'error'});
				$('body').ploading({action: 'hide'});
			});
		}else{
			if($('#gift-cc-form-new').is(':visible')){
				$('#gift-cc-input-number').val('');
				$('#gift-cc-input-name').val('');
				$('#gift-cc-input-expiration').val('');
				$('#gift-cc-input-cvv').val('');
			}
			$('#gift-cc-input-mode').val(mode);
			$('#gift-cc-form-select').toggle();
			$('#gift-cc-form-new').toggle();
		}
		$('.gift-cvv-tooltip').tooltip({html: 'true'});
	}

	function toggleUSPayment(mode, obj){
		if(mode == 'cc'){
			if($('#gift-echeck-form').is(':visible')){
				$('#gift-cc-form-process-fee').show();
				if($('#gift-cc-input-mode').val() == "select"){
					$('#gift-cc-form-new').hide();
					$('#gift-cc-form-select').show();
				}else{
					$('#gift-cc-form-new').show();
					$('#gift-cc-form-select').hide();
				}
				$('#gift-echeck-form').hide();
			}
		}else{
			$('#gift-cc-form-process-fee').hide();
			$('#gift-cc-form-new').hide();
			$('#gift-cc-form-select').hide();
			$('#gift-echeck-form').show();
		}
		$('#payment-us-paymode').val(mode);
		$('#btn-us-payment-check, #btn-us-payment-cc').removeClass('btn-ifes-active');
		$(obj).addClass('btn-ifes-active');
		calcGiftList();
	}

	function toggleUKExtraAid(){
		$('#gift-uk-extra-aid-form').toggle();
		calcGiftList();
	}

	function toggleCreateAccount(){
		if($('#gift-create-account').prop('checked')){
			$('#gift-create-account-form-2').show();
			$('#gift-payment-save-details').show();
		}else{
			$('#gift-create-account-form-2').hide();
			$('#gift-payment-save-details').hide();
		}
	}

	$('#gift-cc-input-cvv, #gift-echeck-input-acc-no, #gift-echeck-input-route-no').keyup(function(e){
		if (/\D/g.test(this.value)){
			// Filter non-digits from input value.
			this.value = this.value.replace(/\D/g, '');
		}
	});

	var resetPasswordDialog = new BootstrapDialog({
		title: 'Reset IFES Account Password',
		message: '<form class="form-horizontal" method="post" onsubmit="return false;"><p style="text-align: center;">Forgot your password? Enter your email address below to begin the reset process.</p><hr style="margin: 15px 0;"><div class="row" style="padding-top: 5px;"><div class="form-group"><input type="text" class="form-control" id="reset_email" name="reset_email" placeholder="Email Address"><br></div></div><div class="row"><div class="col-xs-12 text-center"><button type="button" class="btn btn-default" onclick="javascript: resetPassword();">RESET MY PASSWORD</button><br><br></div></div></form>',
		onshown: function(dlg){
			$('#reset_email').focus();
			$('#reset_email').keypress(function(event){
				var keycode = (event.keyCode ? event.keyCode : event.which);
				if(keycode == 13){
					resetPassword();
				}
			});
		}
	});

	function resetPassword(){
		if(!bootstrapValidateEmpty("reset_email", "")){
			noty({text: "Please fill in reset email address.", type: 'error'});
			return false;
		}
		var request = $.ajax({
			url: HTTP_AJAX,
			type: 'POST',
			dataType: 'json',
			data:{
				opt: 'send_reset_password',
				email: $('#reset_email').val()
			},
			beforeSend: function(){
				$.LoadingOverlay("show");
			}, 
			complete: function(){
				$.LoadingOverlay("hide");
			}
		}).done(function(msg){
			if(msg.success){
				resetPasswordDialog.close();
				BootstrapDialog.show({
					title: 'Reset IFES Account Password',
					message: "We have sent an email to your email address. Click the link in the email to reset your password.<br>If you don't see the email, check other places it might be, like your junk, spam, social, or other folders."
				});
			}else{
				noty({text: msg.message, type: "error"});
			}
		}).fail(function(jqXHR, textStatus){
			noty({text: "Could not connect with server. Please refresh your browser and try again.", type: "error"});
		});
	}
</script>
<?php } ?>