js_pipeline = [
  # Bower dependencies
  'bower_components/eventEmitter/EventEmitter.js'
  'bower_components/jQuery/dist/jquery.js'
  'bower_components/jquery-pjax/jquery.pjax.js'
  'bower_components/imagesloaded/imagesloaded.pkgd.js'
  'bower_components/masonry/dist/masonry.pkgd.js'
  'bower_components/fastclick/lib/fastclick.js'

  # Application files
  'js/app/app.js'

  'js/app/utilities/**/*.js'

  'js/app/modules/**/*.js'
  'js/main.js'
]

module.exports =
  js: ('.tmp/' + path for path in js_pipeline)
