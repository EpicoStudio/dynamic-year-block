/**
 * WordPress dependencies
 */
import {
	dateI18n,
} from '@wordpress/date';

/**
 * Inspector Controls and react hook with all the necessary props.
 *
 * @see https://developer.wordpress.org/block-editor/packages/packages-block-editor/#useBlockProps
 */
import {
	InspectorControls,
	useBlockProps,
} from '@wordpress/block-editor';

import { PanelBody, RadioControl } from '@wordpress/components';
import { __, sprintf } from '@wordpress/i18n';

/**
 * Renders the `epico/current-year` block on the editor.
 *
 * @param {Object} props                   React props.
 * @param {Object} props.setAttributes     Callback for updating block attributes.
 * @param {Object} props.attributes        Block attributes.
 * @param {string} props.attributes.format Format of the year.
 *
 * @return {JSX.Element} React element.
 */
export default function Edit( {
	attributes: { format }, // The default value is saved on block.json.
	setAttributes,
} ) {

	// Define the two-digit year for the help text.
	const year = wp.date.dateI18n( 'y' );

	// Block properties.
	const blockProps = useBlockProps();

	// Define the inspector controls.
	const inspectorControls = (
		<InspectorControls>
			<PanelBody title={ __( 'Settings' ) }>
				<RadioControl
						className={ 'epico_current-year' }
						label={ __( 'Year format:' ) }
						selected={ format }
						options={ [
							{ label: __( 'Four digits' ), value: 'Y' },
							{ label: __( 'Two digits' ),  value: 'y' },
						] }
						help={ sprintf(
								/* translators: %1s and %2s are the two-digit current year. See http://php.net/date. */
								'The two-digit abreviation is commonly used immediately after an apostrophe (i.e., ’%1s) or as part of a date range (i.e., 2021-%2s).',
								year, year
						  ) }
						onChange={ ( newFormat ) =>
							setAttributes( {
								format: newFormat,
							} )
						}
					/>				
			</PanelBody>
		</InspectorControls>
	);

	// Get the current year.
	let currentYear = wp.date.dateI18n( format );

	// Add a small margin to the help text.
	let editorInlineStyle = `
		.epico_current-year > [id*="help"] {
			margin-top: 15px !important;
		}
	`;

	// Return the controls and the block markup for the editor.
	return (
		<>
			{ inspectorControls }
			<style>{ editorInlineStyle }</style>
			<div { ...blockProps }>
				<p className={ "current-year_" + currentYear }>
					{ currentYear }
				</p>
			</div>
		</>
	);
}
