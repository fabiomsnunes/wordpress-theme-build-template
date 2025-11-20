/**
 * Custom updater for WordPress style.css version header.
 *
 * This updater is used by standard-version to bump the version number
 * in the WordPress theme's style.css file header.
 *
 * @see https://github.com/conventional-changelog/standard-version#bumpfiles-packagesjson-and-bower-components
 */

module.exports.readVersion = function ( contents ) {
	// Extract version from WordPress theme header: "Version: 1.2.3".
	const versionMatch = contents.match( /Version:\s*([0-9]+\.[0-9]+\.[0-9]+)/i );
	return versionMatch ? versionMatch[1] : null;
};

module.exports.writeVersion = function ( contents, version ) {
	// Replace version in WordPress theme header.
	return contents.replace(
		/(Version:\s*)([0-9]+\.[0-9]+\.[0-9]+)/i,
		`$1${version}`
	);
};
