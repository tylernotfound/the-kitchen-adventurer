# JS Configuration
#---------------------------------
js_pipeline = [
  # [compiled by Grunt beforehand]
  'js/jst.js',

  # Bower Dependencies,
  # 'bower_components/jQuery/dist/jquery.js',
  'bower_components/zepto/zepto.js',
  'bower_components/underscore/underscore.js',
  'bower_components/backbone/backbone.js',
  'bower_components/backbone.syphon/lib/backbone.syphon.js',
  'bower_components/marionette/lib/backbone.marionette.js',
  'bower_components/velocity/velocity.js',
  'bower_components/velocity/velocity.ui.js',
  'bower_components/hammer.js/hammer.js',
  'bower_components/node-uuid/uuid.js',
  'bower_components/fastclick/lib/fastclick.js',

  'js/**/*.js'


  # App:
  # -------------------------
  # Configuration files
  # 'js/app/config/**/*.js',

  # Application files
  # 'js/app/app.js',

  # Utility files
  # 'js/app/lib/entities/**/*.js',
  # 'js/app/lib/utilities/**/*.js',
  # 'js/app/lib/utilities/**/*.js',
  # 'js/app/lib/controllers/**/*.js',
  # 'js/app/lib/animations/**/*.js',
  # 'js/app/lib/regions/**/*.js',
  # 'js/app/lib/components/**/*.js',
  # 'js/app/lib/components/**/*.js',
  # 'js/app/lib/behaviors/**/*.js',

  # Entities
  # 'js/app/entities/**/*.js',

  # Modules
  # 'js/app/modules/**/*.js'
]

module.exports =
  js: ('.tmp/' + path for path in js_pipeline)
