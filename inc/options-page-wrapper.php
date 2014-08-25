<div class="wrap">

	<div id="icon-options-general" class="icon32"></div>
	<h2>UNICEF Tap Project Settings</h2>

	<div id="poststuff">

		<div id="post-body" class="metabox-holder columns-2">

			<!-- main content -->
			<div id="post-body-content">

				<div class="meta-box-sortables ui-sortable">

					<div class="postbox">

						<h3><span>Select hexidecimel color values that compliment your site or leave the default colors by leaving the inputs blank.</span></h3>

						<div class="inside">

							<form name="background_color_form" method="post" action="">

								<input type="hidden" name="background_color_form_submitted" value="Y">

								<table class="form-table">

									<tr>
										<td>
											<label for="background_color">Enter a value for the background color</label>
										</td>
										<td>
											<input name="background_color" id="backgound_color" type="text" value="" class="regular-text" />
										</td>
									</tr>

									<tr>
										<td>
											<label for="headline_color">Enter a value for the headline color</label>
										</td>
										<td>
											<input name="headline_color" id="headline_color" type="text" value="" class="regular-text" />
										</td>
									</tr>

									<tr>
										<td>
											<label for="button_color">Enter a value for the button color</label>
										</td>
										<td>
											<input name="button_color" id="button_color" type="text" value="" class="regular-text" />
										</td>
									</tr>

								</table>

								<p>
									<input class="button-primary" type="submit" name="styles_submit" value="Save" />
								</p>

							</form>

							<h2>Select the placement of the banner on your site.</h2>

							<form name="placement_form" method="post" action="">

								<input type="hidden" name="placement_form_submitted" value="P">

									<select name="placement_form" id="placement_form">
										<option selected="selected" value="header">Header</option>
										<option value="footer">Footer</option>
									</select>

									<p>
										<input class="button-primary" type="submit" name="placement_submit" value="Save" />
									</p>

							</form>

						</div> <!-- .inside -->

					</div> <!-- .postbox -->

				</div> <!-- .meta-box-sortables .ui-sortable -->

			</div> <!-- post-body-content -->

			<!-- sidebar -->
			<?php if( isset( $background_color ) && $background_color != '' || $headline_color != '' || $button_color != '' ): ?>

			<div id="postbox-container-1" class="postbox-container">

				<div class="meta-box-sortables">

					<div class="postbox">

						<h3><span>Current Settings</span></h3>

						<div class="inside">

							<form name="background_color_form" method="post" action="">

								<input type="hidden" name="background_color_form_submitted" value="Y">

								<p>
									<label for="background_color">Enter a value for the background color.</label>
									<input name="background_color" id="backgound_color" type="text" value="<?php echo $background_color; ?>" />
								</p>

								<p>
									<label for="headline_color">Enter a value for the headline color.</label>
									<input name="headline_color" id="headline_color" type="text" value="<?php echo $headline_color; ?>" />
								</p>

								<p>
									<label for="button_color">Enter a value for the button color.</label>
									<input name="button_color" id="headline_color" type="text" value="<?php echo $button_color; ?>" />
								</p>

								<p>
									<input class="button-primary" type="submit" name="styles_submit" value="Update" />
								</p>

							</form>

							<?php endif; ?>

							<form name="placement_form" method="post" action="">

								<input type="hidden" name="placement_form_submitted" value="P">

									<select name="placement_form" id="placement_form">
										<option selected="selected" value="header">Header</option>
										<option value="footer">Footer</option>
									</select>

								<p>
									<input class="button-primary" type="submit" name="placement_submit" value="Update" />
								</p>

							<?php echo $footer; ?>

							</form>

						</div> <!-- .inside -->

					</div> <!-- .postbox -->

				</div> <!-- .meta-box-sortables -->

			</div> <!-- #postbox-container-1 .postbox-container -->

		</div> <!-- #post-body .metabox-holder .columns-2 -->

		<br class="clear">
	</div> <!-- #poststuff -->

</div> <!-- .wrap -->