( function( $ ) {
	"use strict";

	var win = $( window );

	/**
	 * Header sticky module
	 */
	var _defaults = {
		position: 'relative',
		additionOffset: 0,
		updatePosition: function() {}
	};

	/**
	 * Sticky header class
	 */
	var StickyHeader = function( element, options ) {
		this.nav = $( element );
		this.options = $.extend( _defaults, options );

		/**
		 * Register the callback function that will
		 * update the navigator position
		 */
		if ( $.isFunction( this.options.updatePosition ) )
			this.nav.on( 'updatePosition', this.options.updatePosition.bind( this ) );

		/**
		 * This method will be called when window is scrolling
		 * for trigger event to make navigator to sticked
		 */
		this.doStick = function() {
			var offsetTop = win.scrollTop();

			/**
			 * Try to retrieve original offset
			 */
			this.navOriginOffset = this.nav.data( 'origin-offset' );

			/**
			 * Store the original offset before
			 * make the navigator to sticked
			 */
			if ( this.navOriginOffset === undefined ) {
				this.navOriginOffset = this.nav.offset();
				this.nav.data( 'origin-offset', this.navOriginOffset );
			}

			/**
			 * Increase scrolltop if admin toolbar is
			 * appearing
			 */
			var additionOffset = $.isFunction( this.options.additionOffset )
				? this.options.additionOffset.call( this )
				: parseInt( this.options.additionOffset );

			if ( $.isNumeric( additionOffset ) && additionOffset > 0 ) {
				offsetTop = offsetTop + additionOffset;
			}

			/**
			 * Update class to make navigator to stick
			 * or not
			 */
			if ( offsetTop > this.navOriginOffset.top ) {
				this.nav.addClass( 'stick' );
				this.nav.trigger( 'updatePosition', {
					offsetTop: offsetTop
				} );
			}
			else {
				this.nav.removeClass( 'stick' );
				this.nav.removeAttr( 'style' );
			}
		}

		win.on( 'load scroll resize', this.doStick.bind( this ) );
	};

	$.fn['stickyHeader'] = function( options ) {
		return this.each( function() {
			$( this ).data( '_stickyHeader', new StickyHeader( this, options ) );
		} );
	};

} ).call( this, jQuery );
