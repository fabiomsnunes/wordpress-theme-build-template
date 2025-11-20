// WordPress webpack config.
const defaultConfig = require("@wordpress/scripts/config/webpack.config");

// Plugins.
const RemoveEmptyScriptsPlugin = require("webpack-remove-empty-scripts");

// Utilities.
const path = require("path");

// Add any new entry points by extending the webpack config.
module.exports = {
    ...defaultConfig,
    ...{
        entry: {
            "js/build": path.resolve(process.cwd(), "src", "js/index.js"),
            "css/build": path.resolve(process.cwd(), "src", "scss/index.scss"),
        },
        module: {
            ...defaultConfig.module,
            rules: [
                ...defaultConfig.module.rules,
                {
                    test: /\.(woff|woff2|eot|ttf|otf)$/i,
                    type: 'asset/resource',
                    generator: {
                        filename: 'fonts/[name][ext]'
                    }
                }
            ]
        },
        plugins: [
            ...defaultConfig.plugins,
            new RemoveEmptyScriptsPlugin({
                stage: RemoveEmptyScriptsPlugin.STAGE_AFTER_PROCESS_PLUGINS,
            }),
        ],
    },
};
