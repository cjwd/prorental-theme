let mix = require('laravel-mix');
const devPath = 'src/assets';
mix.setPublicPath('dist/assets');
mix.setResourceRoot('../');
mix.sourceMaps();
if (mix.inProduction()) {
  mix.version();
}
mix.js(`${devPath}/js/scripts.js`, 'js');
mix.sass(`${devPath}/css/main.scss`, 'css');
mix.copyDirectory(`${devPath}/img`, 'dist/assets/img');
mix.copyDirectory(`${devPath}/fonts`, 'dist/assets/fonts');
