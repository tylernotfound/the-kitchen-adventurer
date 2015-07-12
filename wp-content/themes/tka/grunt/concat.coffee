module.exports =
  dist:
    src: require('./pipeline').js,
    dest: '.tmp/dist/js/application.js'

  dev:
    src: require('./pipeline').js,
    dest: 'dist/js/application.min.js'
