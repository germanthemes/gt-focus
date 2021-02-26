/**
 * Customizer Live Preview
 *
 * Reloads changes on Theme Customizer Preview asynchronously for better usability
 *
 * @package GT Focus
 */

( function( $ ) {

	// Site Title textfield.
	wp.customize( 'blogname', function( value ) {
		value.bind( function( to ) {
			$( '.site-title a' ).text( to );
		} );
	} );

	// Site Description textfield.
	wp.customize( 'blogdescription', function( value ) {
		value.bind( function( to ) {
			$( '.site-description' ).text( to );
		} );
	} );

	// Site Title checkbox.
	wp.customize( 'gt_focus_theme_options[site_title]', function( value ) {
		value.bind( function( newval ) {
			if ( false === newval ) {
				hideElement( '.site-title' );
			} else {
				showElement( '.site-title' );
			}
		} );
	} );

	// Site Description checkbox.
	wp.customize( 'gt_focus_theme_options[site_description]', function( value ) {
		value.bind( function( newval ) {
			if ( false === newval ) {
				hideElement( '.site-description' );
			} else {
				showElement( '.site-description' );
			}
		} );
	} );

	// Post Date checkbox.
	wp.customize( 'gt_focus_theme_options[meta_date]', function( value ) {
		value.bind( function( newval ) {
			if ( false === newval ) {
				$( 'body' ).addClass( 'date-hidden' );
			} else {
				$( 'body' ).removeClass( 'date-hidden' );
			}
		} );
	} );

	// Post Author checkbox.
	wp.customize( 'gt_focus_theme_options[meta_author]', function( value ) {
		value.bind( function( newval ) {
			if ( false === newval ) {
				$( 'body' ).addClass( 'author-hidden' );
			} else {
				$( 'body' ).removeClass( 'author-hidden' );
			}
		} );
	} );

	// Post Category checkbox.
	wp.customize( 'gt_focus_theme_options[meta_categories]', function( value ) {
		value.bind( function( newval ) {
			if ( false === newval ) {
				$( 'body' ).addClass( 'categories-hidden' );
			} else {
				$( 'body' ).removeClass( 'categories-hidden' );
			}
		} );
	} );

	// Post Tags checkbox.
	wp.customize( 'gt_focus_theme_options[meta_tags]', function( value ) {
		value.bind( function( newval ) {
			if ( false === newval ) {
				$( 'body' ).addClass( 'tags-hidden' );
			} else {
				$( 'body' ).removeClass( 'tags-hidden' );
			}
		} );
	} );

	/* Primary Color Option */
	wp.customize( 'gt_focus_theme_options[primary_color]', function( value ) {
		value.bind( function( newval ) {
			document.documentElement.style.setProperty( '--gt-focus--primary-color', newval );
		} );
	} );

	/* Secondary Color Option */
	wp.customize( 'gt_focus_theme_options[secondary_color]', function( value ) {
		value.bind( function( newval ) {
			document.documentElement.style.setProperty( '--gt-focus--secondary-color', newval );
		} );
	} );

	/* Accent Color Option */
	wp.customize( 'gt_focus_theme_options[accent_color]', function( value ) {
		value.bind( function( newval ) {
			document.documentElement.style.setProperty( '--gt-focus--accent-color', newval );
		} );
	} );

	/* Highlight Color Option */
	wp.customize( 'gt_focus_theme_options[highlight_color]', function( value ) {
		value.bind( function( newval ) {
			document.documentElement.style.setProperty( '--gt-focus--highlight-color', newval );
		} );
	} );

	/* Light Gray Color Option */
	wp.customize( 'gt_focus_theme_options[light_gray_color]', function( value ) {
		value.bind( function( newval ) {
			document.documentElement.style.setProperty( '--gt-focus--light-gray-color', newval );
		} );
	} );

	/* Gray Color Option */
	wp.customize( 'gt_focus_theme_options[gray_color]', function( value ) {
		value.bind( function( newval ) {
			document.documentElement.style.setProperty( '--gt-focus--gray-color', newval );
		} );
	} );

	/* Dark Gray Color Option */
	wp.customize( 'gt_focus_theme_options[dark_gray_color]', function( value ) {
		value.bind( function( newval ) {
			document.documentElement.style.setProperty( '--gt-focus--dark-gray-color', newval );
		} );
	} );

	/* Link Color Option */
	wp.customize( 'gt_focus_theme_options[link_color]', function( value ) {
		value.bind( function( newval ) {
			document.documentElement.style.setProperty( '--gt-focus--link-color', newval );
		} );
	} );

	/* Button Color Option */
	wp.customize( 'gt_focus_theme_options[button_color]', function( value ) {
		value.bind( function( newval ) {
			var text_color;

			if( isColorLight( newval ) ) {
				text_color = '#242424';
			} else {
				text_color = '#ffffff';
			}

			document.documentElement.style.setProperty( '--gt-focus--button-color', newval );
			document.documentElement.style.setProperty( '--gt-focus--button-text-color', text_color );
		} );
	} );

	/* Button Hover Color Option */
	wp.customize( 'gt_focus_theme_options[button_hover_color]', function( value ) {
		value.bind( function( newval ) {
			var text_color;

			if( isColorLight( newval ) ) {
				text_color = '#242424';
			} else {
				text_color = '#ffffff';
			}

			document.documentElement.style.setProperty( '--gt-focus--button-hover-color', newval );
			document.documentElement.style.setProperty( '--gt-focus--button-hover-text-color', text_color );
		} );
	} );

	/* Header Color Option */
	wp.customize( 'gt_focus_theme_options[header_color]', function( value ) {
		value.bind( function( newval ) {
			var text_color, border_color;

			if( isColorDark( newval ) ) {
				text_color = '#ffffff';
				border_color = 'rgba(255, 255, 255, 0.1)';
			} else {
				text_color = '#242424';
				border_color = 'rgba(0, 0, 0, 0.1)';
			}

			document.documentElement.style.setProperty( '--gt-focus--header-background-color', newval );
			document.documentElement.style.setProperty( '--gt-focus--header-text-color', text_color );
			document.documentElement.style.setProperty( '--gt-focus--header-border-color', border_color );
			document.documentElement.style.setProperty( '--gt-focus--navi-hover-bg-color', border_color );
		} );
	} );

	/* Navigation Color Option */
	wp.customize( 'gt_focus_theme_options[navi_color]', function( value ) {
		value.bind( function( newval ) {
			var text_color;

			if( isColorLight( newval ) ) {
				text_color = '#242424';
			} else {
				text_color = '#ffffff';
			}

			document.documentElement.style.setProperty( '--gt-focus--navi-active-bg-color', newval );
			document.documentElement.style.setProperty( '--gt-focus--header-hover-text-color', newval );
			document.documentElement.style.setProperty( '--gt-focus--navi-active-text-color', text_color );
		} );
	} );

	/* Page Title Color Option */
	wp.customize( 'gt_focus_theme_options[title_color]', function( value ) {
		value.bind( function( newval ) {
			var text_color;

			if( isColorLight( newval ) ) {
				text_color = '#242424';
			} else {
				text_color = '#ffffff';
			}

			document.documentElement.style.setProperty( '--gt-focus--title-background-color', newval );
			document.documentElement.style.setProperty( '--gt-focus--title-text-color', text_color );
		} );
	} );

	/* Post Title Color Option */
	wp.customize( 'gt_focus_theme_options[post_title_color]', function( value ) {
		value.bind( function( newval ) {
			document.documentElement.style.setProperty( '--gt-focus--post-title-color', newval );
		} );
	} );

	/* Post Title Hover Color Option */
	wp.customize( 'gt_focus_theme_options[post_title_hover_color]', function( value ) {
		value.bind( function( newval ) {
			document.documentElement.style.setProperty( '--gt-focus--post-title-hover-color', newval );
		} );
	} );

	/* Footer Color Option */
	wp.customize( 'gt_focus_theme_options[footer_color]', function( value ) {
		value.bind( function( newval ) {
			var text_color, link_color, border_color;

			if( isColorDark( newval ) ) {
				text_color = '#ffffff';
				link_color = 'rgba(255, 255, 255, 0.5)';
				border_color = 'rgba(255, 255, 255, 0.1)';
			} else {
				text_color = '#242424';
				link_color = 'rgba(0, 0, 0, 0.5)';
				border_color = 'rgba(0, 0, 0, 0.1)';
			}

			document.documentElement.style.setProperty( '--gt-focus--footer-background-color', newval );
			document.documentElement.style.setProperty( '--gt-focus--footer-text-color', text_color );
			document.documentElement.style.setProperty( '--gt-focus--footer-link-color', link_color );
			document.documentElement.style.setProperty( '--gt-focus--footer-link-hover-color', text_color );
			document.documentElement.style.setProperty( '--gt-focus--footer-border-color', border_color );
		} );
	} );

	/* Text Font */
	wp.customize( 'gt_focus_theme_options[text_font]', function( value ) {
		value.bind( function( newval ) {

			// Load Font in Customizer.
			loadCustomFont( newval, 'text-font' );

			// Set Font.
			var systemFont = '-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,Oxygen-Sans,Ubuntu,Cantarell,"Helvetica Neue",sans-serif';
			var newFont = newval === 'SystemFontStack' ? systemFont : newval;

			// Set CSS.
			document.documentElement.style.setProperty( '--gt-focus--text-font', newFont );
		} );
	} );

	/* Title Font */
	wp.customize( 'gt_focus_theme_options[title_font]', function( value ) {
		value.bind( function( newval ) {

			// Load Font in Customizer.
			loadCustomFont( newval, 'title-font' );

			// Set Font.
			var systemFont = '-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,Oxygen-Sans,Ubuntu,Cantarell,"Helvetica Neue",sans-serif';
			var newFont = newval === 'SystemFontStack' ? systemFont : newval;

			// Set CSS.
			document.documentElement.style.setProperty( '--gt-focus--title-font', newFont );
		} );
	} );

	/* Title Font Weight */
	wp.customize( 'gt_focus_theme_options[title_is_bold]', function( value ) {
		value.bind( function( newval ) {
			var fontWeight = newval ? 'bold' : 'normal';
			document.documentElement.style.setProperty( '--gt-focus--title-font-weight', fontWeight );
		} );
	} );

	/* Title Text Transform */
	wp.customize( 'gt_focus_theme_options[title_is_uppercase]', function( value ) {
		value.bind( function( newval ) {
			var textTransform = newval ? 'uppercase' : 'none';
			document.documentElement.style.setProperty( '--gt-focus--title-text-transform', textTransform );
		} );
	} );

	/* Navi Font */
	wp.customize( 'gt_focus_theme_options[navi_font]', function( value ) {
		value.bind( function( newval ) {

			// Load Font in Customizer.
			loadCustomFont( newval, 'navi-font' );

			// Set Font.
			var systemFont = '-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,Oxygen-Sans,Ubuntu,Cantarell,"Helvetica Neue",sans-serif';
			var newFont = newval === 'SystemFontStack' ? systemFont : newval;

			// Set CSS.
			document.documentElement.style.setProperty( '--gt-focus--navi-font', newFont );
		} );
	} );

	/* Navi Font Weight */
	wp.customize( 'gt_focus_theme_options[navi_is_bold]', function( value ) {
		value.bind( function( newval ) {
			var fontWeight = newval ? 'bold' : 'normal';
			document.documentElement.style.setProperty( '--gt-focus--navi-font-weight', fontWeight );
		} );
	} );

	/* Navi Text Transform */
	wp.customize( 'gt_focus_theme_options[navi_is_uppercase]', function( value ) {
		value.bind( function( newval ) {
			var textTransform = newval ? 'uppercase' : 'none';
			document.documentElement.style.setProperty( '--gt-focus--navi-text-transform', textTransform );
		} );
	} );

	function hideElement( element ) {
		$( element ).css({
			clip: 'rect(1px, 1px, 1px, 1px)',
			position: 'absolute',
			width: '1px',
			height: '1px',
			overflow: 'hidden'
		});
	}

	function showElement( element ) {
		$( element ).css({
			clip: 'auto',
			position: 'relative',
			width: 'auto',
			height: 'auto',
			overflow: 'visible'
		});
	}

	function hexdec( hexString ) {
		hexString = ( hexString + '' ).replace( /[^a-f0-9]/gi, '' );
		return parseInt( hexString, 16 );
	}

	function getColorBrightness( hexColor ) {

		// Remove # string.
		hexColor = hexColor.replace( '#', '' );

		// Convert into RGB.
		var r = hexdec( hexColor.substring( 0, 2 ) );
		var g = hexdec( hexColor.substring( 2, 4 ) );
		var b = hexdec( hexColor.substring( 4, 6 ) );

		return ( ( ( r * 299 ) + ( g * 587 ) + ( b * 114 ) ) / 1000 );
	}

	function isColorLight( hexColor ) {
		return ( getColorBrightness( hexColor ) > 130 );
	}

	function isColorDark( hexColor ) {
		return ( getColorBrightness( hexColor ) <= 130 );
	}

	function loadCustomFont( font, type ) {
		var fontFile = font.split( " " ).join( "+" );
		var fontFileURL = "https://fonts.googleapis.com/css?family=" + fontFile + ":400,700";

		var fontStylesheet = "<link id='gt-focus-custom-" + type + "' href='" + fontFileURL + "' rel='stylesheet' type='text/css'>";
		var checkLink = $( "head" ).find( "#gt-focus-custom-" + type ).length;

		if (checkLink > 0) {
			$( "head" ).find( "#gt-focus-custom-" + type ).remove();
		}
		$( "head" ).append( fontStylesheet );
	}

} )( jQuery );
