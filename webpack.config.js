// webpack.config.js
const webpack = require("webpack");
const path = require("path");
const MiniCssExtractPlugin = require("mini-css-extract-plugin");
const RemoveEmptyScriptsPlugin = require("webpack-remove-empty-scripts");
const CssMinimizerPlugin = require("css-minimizer-webpack-plugin");
const TerserPlugin = require("terser-webpack-plugin");
const { CleanWebpackPlugin } = require("clean-webpack-plugin");
const { VueLoaderPlugin } = require("vue-loader");

const devMode = process.env.NODE_ENV !== "production";
const output_dir = __dirname + "/dist";

module.exports = {
  entry: {
    index: __dirname + "/src/js/index.js",
  },
  output: {
    path: output_dir,
    filename: "[name].js",
  },
  resolve: {
    alias: { vue$: "vue/dist/vue.esm.js", "@": path.resolve(__dirname, "src") },
  },
  devtool: devMode ? "source-map" : false,
  module: {
    rules: [
      {
        test: /\.vue$/,
        loader: "vue-loader",
      },
      {
        test: /\.js$/,
        exclude: /node_modules/,
        use: {
          loader: "babel-loader",
          options: {
            presets: ["@babel/preset-env"],
          },
        },
      },
      {
        test: /\.css$/,
        use: [
          // Creates `style` nodes from JS strings
          "style-loader",
          //extracts CSS into separate CSS files per JS file
          {
            loader: MiniCssExtractPlugin.loader,
            options: {
              esModule: false,
            },
          },
          // Translates CSS into CommonJS
          "css-loader",
          //process CSS with PostCSS (autoprefix)
          "postcss-loader",
        ],
      },
      {
        test: /\.scss$/,
        use: [
          // Creates `style` nodes from JS strings
          "style-loader",
          //extracts CSS into separate CSS files per JS file
          {
            loader: MiniCssExtractPlugin.loader,
            options: {
              esModule: false,
            },
          },
          // Translates CSS into CommonJS
          {
            loader: "css-loader",
            options: { url: false, sourceMap: true },
          },
          //process CSS with PostCSS (autoprefix)
          "postcss-loader",
          //handle asset urls
          "resolve-url-loader",
          // Compiles Sass to CSS and import our global
          {
            loader: "sass-loader",
            options: {
              sourceMap: true,
              additionalData: `
              @import "@/scss/global/_variables.scss";
              @import "@/scss/global/_helpers.scss";
              @import "@/scss/global/_mixins.scss";
              @import "@/scss/global/_typography.scss";
              `,
            },
          },
        ],
      },
      {
        test: require.resolve("jquery"),
        loader: "expose-loader",
        options: {
          exposes: [
            {
              globalName: "$",
              override: true,
            },
            {
              globalName: "jQuery",
              override: true,
            },
          ],
        },
      },
    ],
  },
  watchOptions: {
    ignored: /node_modules/,
    aggregateTimeout: 300,
    poll: 500,
  },
  plugins: [
    new VueLoaderPlugin(),
    new RemoveEmptyScriptsPlugin(),
    new MiniCssExtractPlugin({
      filename: "[name].css",
    }),
    new CleanWebpackPlugin(),
    new webpack.ProvidePlugin({
      $: "jquery",
      jQuery: "jquery",
      "window.jQuery": "jquery",
    }),
  ],
  optimization: {
    minimize: !devMode,
    minimizer: [
      new TerserPlugin({
        test: /\.js(\?.*)?$/i,
        parallel: true,
        extractComments: true,
      }),
      new CssMinimizerPlugin(),
    ],
  },
};