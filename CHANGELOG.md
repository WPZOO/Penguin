# Change Log
All notable changes to this project will be documented in this file. This project follows [Semantic Versioning](http://semver.org/).

## [0.3.3] - 2017-02-07
### Added
- svgxuse polyfill

### Fixed
- Padding of stand alone post
- Styling of last p and cite inside blockquote
- Line height of link in link post format
- Screenshot size 1200x900
- Primary color bug
- Alignment without clear

## [0.3.2] - 2017-01-19
### Fixed
- Fix focus styling of scroll to top
- Excerpt sticky font size on big screen
- Fix appearance of custom logo
- Add search form template and improve accessibility
- Contrast of copyright text
- ARIA label to menus
- aria-hidden for decorative svg icons
- word-wrap normal for screen-reader-text
- Restrict menu item arrow to the primary menu

## [0.3.1] - 2017-01-07
### Fixed
- Typo in theme tag

## [0.3.0] - 2017-01-07
### Added
- Improve font-size, especially headings
- More ways of styling links as flat buttons
- Links with underline [accessibility]
- Missing change log information

### Fixed
- Rebuild all navigation [accessibility]
- Use only one h1 [accessibility]
- SVG metadata without conflict html syntax
- Padding of posts
- Change URLs to HTTPS
- Flexible `columnWidth` in masonry script
- Remove i18n functions from variables
- Update theme tags
- Make get_bloginfo more secure
- Escape get_template_directory_uri
- Remove author data shim
- Improve code style
- Echo text directly instead of defining a variable
- Use wp_style_add_data to define minified file
- Fix translatability of comments title
- Remove rel="designer" in credits link
- Escape footer text

### Removed
- German translations (lite version only). Further using [translate.wordpress.org](translate.wordpress.org)
- Not needed JS code

## [0.2.0] - 2016-04-24
### Added
- Support Responsive Images
- SVG icons
- Core customizer
- New custom logo
- Editor styles

### Removed
- Options Framework
- Icon Font

### Fixed
- Fullwidth class
- Author page header
- Correct GPL version and add copyright
- Escaped `get_permalink()`
- Change prefix from `tha_` to `penguin_`
- Remove `the_posts_navigation` and `the_post_navigation`

## [0.1.4] - 2016-03-29
### Fixed
- Fix one post layout issue
- Update Readme

## [0.1.3] - 2016-03-08
### Fixed
- Changed theme name

## [0.1.2] - 2016-03-05
### Added
- Use flexbox for comment form
- Redesign author info box

### Fixed
- Don't show the excerpt in the admin area
- Use https URL in style.css
- Fix typo in option description (gold version)

## [0.1.1] - 2016-02-15
### Added
- Add extra check for language packs
- Add author info box

### Fixed
- Fix icon-font issue
- Only use required class on span
- Fix fluidvids option

## [0.1.0] - 2015-10-12
### Added
- Initial Release