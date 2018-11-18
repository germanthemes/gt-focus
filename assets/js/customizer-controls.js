/**
 * Customizer Controls JS
 *
 * Adds Javascript for Customizer Controls.
 *
 * @package GT Health
 */

( function( wp, $ ) {
	/**
	 * The Customizer looks for wp.customizer.controlConstructor[type] functions
	 * where type == the type member of a WP_Customize_Control
	 */
	wp.customize.controlConstructor.gt_health_custom_font = wp.customize.Control.extend({
		/**
		 * This method is called when the control is ready to run.
		 */
		ready: function() {

			// Grab the bits of data from the title for specifying this control. this.container is a jQuery object of your container.
			var data = this.container.find( '.customize-control-title' ).data();

			// Use specific l10n data for this control where available.
			this.l10n = data.l10n;

			// Set default font.
			this.font = data.font;

			// Set up button elements. Cache for re-use.
			this.$btnContainer = this.container.find( '.actions' );
			this.$btnStandard = $( '<button type="button" class="button standard">' + this.l10n.standard + '</button>' ).prependTo( this.$btnContainer );
			this.$btnNext = $( '<button type="button" class="button next" title="' + this.l10n.next + '">&raquo;</button>' ).prependTo( this.$btnContainer );
			this.$btnPrevious = $( '<button type="button" class="button previous" title="' + this.l10n.previous + '">&laquo;</button>' ).prependTo( this.$btnContainer );

			// Handy shortcut so we don't have to us _.bind every time we add a callback.
			_.bindAll( this, 'standard', 'next', 'previous' );

			this.$btnStandard.on( 'click', this.standard );
			this.$btnNext.on( 'click', this.next );
			this.$btnPrevious.on( 'click', this.previous );

		},
		/**
		 * Called when the "Default" link is clicked. Sets the font to the default theme font
		 *
		 * @param  {object} event jQuery Event object from click event
		 */
		standard: function( event ) {
			event.preventDefault();
			var select = this.container.find( 'select' );

			select.find( 'option[selected]' ).removeAttr( 'selected' );
			select.find( 'option[value="' + this.font + '"]' ).attr( 'selected', 'selected' );
			select.trigger( 'change' );
		},
		/**
		 * Called when the "Next" link is clicked. Iterates to the next value in the select field.
		 *
		 * @param  {object} event jQuery Event object from click event
		 */
		next: function( event ) {
			event.preventDefault();
			var select = this.container.find( 'select' );
			var current = select.find( 'option' ).filter( ':selected' );
			var next = this.nextOrFirst( current );

			current.removeAttr( 'selected' );
			next.attr( 'selected', 'selected' );
			select.trigger( 'change' );
		},
		/**
		 * Called when the "Previous" link is clicked. Iterates to the previous value in the select field.
		 *
		 * @param  {object} event jQuery Event object from click event
		 */
		previous: function( event ) {
			event.preventDefault();
			var select = this.container.find( 'select' );
			var current = select.find( 'option' ).filter( ':selected' );
			var previous = this.prevOrLast( current );

			current.removeAttr( 'selected' );
			previous.attr( 'selected', 'selected' );
			select.trigger( 'change' );
		},
		/**
		 * Get Next Font
		 * Works like next(), except gets the first item from siblings if there is no "next" sibling to get.
		 */
		nextOrFirst: function(selector) {
			var next = selector.next();
			return (next.length) ? next : selector.prevAll().last();
		},
		/**
		 * Get Previous Font
		 * Works like prev(), except gets the last item from siblings if there is no "prev" sibling to get.
		 */
		prevOrLast: function(selector) {
			var prev = selector.prev();
			return (prev.length) ? prev : selector.nextAll().last();
		}
	});

	/**
	 * The Customizer looks for wp.customizer.controlConstructor[type] functions
	 * where type == the type member of a WP_Customize_Control
	 */
	wp.customize.controlConstructor.gt_health_license_key = wp.customize.Control.extend({
		/**
		 * This method is called when the control is ready to run.
		 */
		ready: function() {

			// Grab the bits of data from the title for specifying this control. this.container is a jQuery object of your container.
			var data = this.container.find( '.customize-license-control' ).data();

			// Use specific l10n data for this control where available.
			this.l10n = data.l10n;

			// Set License status.
			this.status = data.status;

			// Display License status.
			this.statusContainer = this.container.find( '.license-status' );
			this.statusContainer.html( '<span class="' + this.status + '">' + this.status + '</span>' );

			// Set up buttons.
			this.buttonContainer = this.container.find( '.actions' );
			this.buttonActivate = $( '<button type="button" class="button button-primary activate" title="' + this.l10n.activate + '">' + this.l10n.activate + '</button>' ).prependTo( this.buttonContainer );
			this.buttonDeactivate = $( '<button type="button" class="button deactivate" title="' + this.l10n.deactivate + '">' + this.l10n.deactivate + '</button>' ).prependTo( this.buttonContainer );

			// Display buttons.
			this.hideButtons( this.status );

			// Handy shortcut so we don't have to us _.bind every time we add a callback.
			_.bindAll( this, 'activateLicense', 'deactivateLicense', 'hideButtons' );

			this.buttonActivate.on( 'click', this.activateLicense );
			this.buttonDeactivate.on( 'click', this.deactivateLicense );
		},
		/**
		 * Display Activate or Deactivate License button.
		 */
		hideButtons: function( status ) {
			var input = this.container.find( 'input' );
			if ( 'valid' === status ) {
				this.buttonActivate.hide();
				this.buttonDeactivate.show();
				input.prop( 'disabled', true );
			} else {
				this.buttonActivate.show();
				this.buttonDeactivate.hide();
				input.prop( 'disabled', false );
			}
		},
		/**
		 * Called when the "Activate License" link is clicked.
		 *
		 * @param  {object} event jQuery Event object from click event
		 */
		activateLicense: function( event ) {
			event.preventDefault();
			var button = this.buttonActivate;
			var statusField = this.statusContainer;
			var key = this.container.find( 'input' ).val();
			var display = this.hideButtons;

			// Turn off button.
			button.prop( 'disabled', true );

			// Set loading message.
			statusField.html( '<span class="loading">' + this.l10n.loading + '</span>' );

			// Check License Key.
			$.ajax({
				url: ajaxurl,
				data: {
					'action'     : 'gt_activate_license',
					'license_key': key
				},
				success: function( data ) {
					// Update Status.
					statusField.html( '<span class="' + data + '">' + data + '</span>' );
					display( data );
				},
				error: function( errorThrown ){
					console.log( errorThrown );
					statusField.html( '<span class="error">' + errorThrown.status + ': ' + errorThrown.statusText + '</span>' );
				},
				complete: function() {
					button.prop( 'disabled', false );
				}
			});
		},
		/**
		 * Called when the "Deactivate License" link is clicked.
		 *
		 * @param  {object} event jQuery Event object from click event
		 */
		deactivateLicense: function( event ) {
			event.preventDefault();
			var button = this.buttonDeactivate;
			var statusField = this.statusContainer;
			var key = this.container.find( 'input' ).val();
			var display = this.hideButtons;

			// Turn off button.
			button.prop( 'disabled', true );

			// Set loading message.
			statusField.html( '<span class="loading">' + this.l10n.loading + '</span>' );

			// Activate License Key.
			$.ajax({
				url: ajaxurl,
				data: {
					'action'     : 'gt_deactivate_license',
					'license_key': key
				},
				success: function( data ) {
					// Update Status.
					statusField.html( '<span class="' + data + '">' + data + '</span>' );
					display( data );
				},
				error: function( errorThrown ){
					console.log( errorThrown );
					statusField.html( '<span class="error">' + errorThrown.status + ': ' + errorThrown.statusText + '</span>' );
				},
				complete: function() {
					button.prop( 'disabled', false );
				}
			});
		},
	});
})( this.wp, jQuery );
