/**
 * Inspector Controls and react hook with all the necessary props.
 *
 * @see https://developer.wordpress.org/block-editor/packages/packages-block-editor/#useBlockProps
 */
import {
	InspectorControls,
	useBlockProps,
	RichText,
	AlignmentToolbar,
	BlockControls
} from '@wordpress/block-editor';

import { PanelBody,
	RadioControl,
	TextControl
} from '@wordpress/components';

import { __, sprintf } from '@wordpress/i18n';

/**
 * Renders the `epico/dynamic-year-block` block on the editor.
 *
 * @param {Object} props                   React props.
 * @param {Object} props.setAttributes     Callback for updating block attributes.
 * @param {Object} props.attributes        Block attributes.
 * @param {string} props.attributes.format Format of the year.
 *
 * @return {JSX.Element} React element.
 */
export default function Edit( {
	attributes: { format, beforeElement, afterElement, alignment }, // The default value is saved on block.json.
	setAttributes,
} ) {
	// Define the two-digit year for the help text.
	const year = wp.date.dateI18n( 'y' );

	// Block properties.
	const blockProps = useBlockProps();

	// Define the inspector controls.
	const inspectorControls = (
		<InspectorControls>
			<PanelBody title={ __( 'Settings', 'dynamic-year-block' ) }>
				<RadioControl
					className={ 'dynamic-year-block' }
					label={ __( 'Year format:', 'dynamic-year-block' ) }
					selected={ format }
					options={ [
						{
							label: __( 'Four digits', 'dynamic-year-block' ),
							value: 'Y',
						},
						{
							label: __( 'Two digits', 'dynamic-year-block' ),
							value: 'y',
						},
					] }
					help={ sprintf(
						/* translators: %1s and %2s are the two-digit current year. See http://php.net/date. */
						__(
							'The two-digit abbreviation is commonly used immediately after an apostrophe (i.e., ’%1$s) or as part of a date range (i.e., 2021-%2$s).',
							'dynamic-year-block'
						),
						year,
						year
					) }
					onChange={ ( newFormat ) =>
						setAttributes( {
							format: newFormat,
						} )
					}
				/>
				<TextControl
					label={ __( 'Text Before Date', 'dynamic-year-block' ) }
					value={ beforeElement }
					help={ __(
							'Add text before the current year.',
							'dynamic-year-block'
						) }
					onChange={ ( newBeforeElement ) =>
						setAttributes( { beforeElement: newBeforeElement } )
					}
				/>
				<TextControl
					label={ __( 'Text After Date', 'dynamic-year-block' ) }
					value={ afterElement }
					help={ __(
							'Add text after the current year.',
							'dynamic-year-block'
						) }
					onChange={ ( newAfterElement ) =>
						setAttributes( { afterElement: newAfterElement } )
					}
				/>
			</PanelBody>
		</InspectorControls>
	);

	// Get the current year.
	const currentYear = wp.date.dateI18n( format );

	// Add a small margin to the help text.
	const editorInlineStyle = `
		.dynamic-year-block > [id*="help"] {
			margin-top: 15px !important;
		}
	`;

	// Return the controls and the block markup for the editor.
	return (
		<>
			{ inspectorControls }
			<style>{ editorInlineStyle }</style>
			<div { ...blockProps }>
				<BlockControls>
					<AlignmentToolbar
						value={ alignment }
						onChange={ ( newAlignment ) =>
							setAttributes( {
								alignment: newAlignment === undefined ? 'none' : newAlignment,
							} )
						}
					/>
				</BlockControls>
				<p
					className={ 'dynamic-year-' + currentYear }
					style={ { textAlign: alignment } }
				>
					<RichText
						tagName="span"
						className="dynamic-year-before"
						allowedFormats={ [ 'core/bold', 'core/italic', 'core/link' ] }
						value={ beforeElement }
						onChange={ ( newBeforeElement ) =>
							setAttributes( { beforeElement: newBeforeElement } )
						}
					/>
					{ format === 'Y' && beforeElement !== '' ? ' ' : null }
					{ currentYear }
					{ afterElement !== '' ? ' ' : null }
					<RichText
						tagName="span"
						className="dynamic-year-after"
						allowedFormats={ [ 'core/bold', 'core/italic', 'core/link' ] }
						value={ afterElement }
						onChange={ ( newAfterElement ) =>
							setAttributes( { afterElement: newAfterElement } )
						}
					/>
				</p>
			</div>
		</>
	);
}
