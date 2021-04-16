# Encore Wordpress Blank Template

## Features
It includes the following features:
- PostCSS/PreCSS
- Rollup with babel
- Wordpress admin blocks
- Lando for local development

## Installation
Follow the steps below to prepare local development
1. Unzip the latest wordpress in the `wordpress` directory
2. Link the theme folder `ln -s encore wordpres/wp-content/themes/encore`
3. Update `.lando.yml` to use the appropriate `name`
4. Run `npm install`
5. Run `lando start`
6. Ready for development

## Development and Building
There are 2 npm scripts to develop and build
- `npm start` to start watching css and js
- `npm run build` to build the styles and scripts
