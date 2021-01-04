const webpack = require("webpack");
const path = require("path");

const MiniCssExtractPlugin = require("mini-css-extract-plugin");
const CopyPlugin = require("copy-webpack-plugin");
const ProgressBarPlugin = require('progress-bar-webpack-plugin');

module.exports = (env, options) => ({
  mode: 'development',
  entry: {

    main: path.resolve(__dirname, 'src/index.js'),
    admin: path.resolve(__dirname, 'src/js/pages/AdminArea.js'),
    HomePage: path.resolve(__dirname, 'src/js/pages/HomePage.js'),
    TeamPage: path.resolve(__dirname, 'src/js/pages/TeamPage.js'),
    PortfolioPage: path.resolve(__dirname, 'src/js/pages/PortfolioPage.js'),
    OfferPage: path.resolve(__dirname, 'src/js/pages/OfferPage.js'),
    NewsPage: path.resolve(__dirname, 'src/js/pages/NewsPage.js'),
    InnovatorsPage: path.resolve(__dirname, 'src/js/pages/InnovatorsPage.js'),
    ContactPage: path.resolve(__dirname, 'src/js/pages/ContactPage.js'),
    BriefPage: path.resolve(__dirname, 'src/js/pages/BriefPage.js'),
    //  dynamic google/recording/stats itp
  },
  devServer: {
    contentBase: "./dist"
  },
  devtool: "source-map",

  module: {
    rules: [{
        test: /\.scss$/,
        use: [
          MiniCssExtractPlugin.loader,
          "css-loader",
          {
            loader: 'postcss-loader',
            options: {
              postcssOptions: {
                plugins: [
                  [
                    "postcss-preset-env",
                    {
                      // Options
                    },
                  ],

                ]
              }
            }
          },
          "sass-loader"
        ]
      },
      {
        test: /\.mp4$/,
        use: [{
          loader: "file-loader",
          options: {
            name: '[name].[ext]',
            outputPath: "../../assets/videos/",
          }
        }]
      },
      {
        test: /\.(png|jpg|gif|svg)$/,
        use: [{
          loader: "file-loader",
          options: {
            name: '[name].[ext]',
            outputPath: "../../assets/img/",
          }
        }]
      },
      {
        test: /\.(html)$/,
        exclude: {
          or: [
            path.resolve(__dirname, 'src/fonts'),
            path.resolve(__dirname, './src/fonts'),
            path.resolve(__dirname, 'src/fonts/*'),
            path.resolve(__dirname, 'fonts'),
            path.resolve(__dirname, 'fonts/*'),
          ]
        },
        use: {
          loader: "html-srcsets-loader",
          options: {
            attrs: [":src", ':srcset']
          }
        }
      },
      {
        test: /\.(woff(2)?|ttf|eot|otf|)(\?v=\d+\.\d+\.\d+)?$/,
        use: [{
          loader: 'file-loader',
          options: {
            name: '[name].[ext]',
            outputPath: "../../assets/fonts/",
          }
        }]
      },
      {
        test: /\.js$/,
        exclude: /(node_modules|bower_components)/,
        use: {
          loader: "babel-loader",
          options: {
            presets: ["@babel/preset-env"],
          }
        }
      }
    ]
  },
  plugins: [

    new ProgressBarPlugin(),
    new CopyPlugin({
      patterns: [{
          from: "src/vid",
          to: "../../assets/videos"
        },
        {
          from: "src/fonts",
          to: "../../assets/fonts"
        },
        {
          from: "src/assets",
          to: "../../assets/img"
        },
        {
          from: "src/json",
          to: "../../assets/json"
        },
        {
          from: "src/favicon",
          to: "../../assets/favicon"
        },
      ],
      options: {
        concurrency: 100,
      },
    }),
    new MiniCssExtractPlugin({
      filename: "../../assets/css/[name].css"
    }),
    new webpack.ProvidePlugin({
      $: "jquery",
      jQuery: "jquery",
      "window.jQuery": "jquery",
      Popper: ["popper.js", "default"],
      Util: "exports-loader?Util!bootstrap/js/dist/util",
      Dropdown: "exports-loader?Dropdown!bootstrap/js/dist/dropdown"
    }),
  ],
  experiments: {
    syncWebAssembly: true,
  },
  output: {
    filename: "../../assets/js/[name].js",
    // path: path.resolve(__dirname, "dist"),
    publicPath: ""
  },

});