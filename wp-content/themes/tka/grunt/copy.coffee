module.exports =
  source:
    files: [{
      expand: true
      cwd: 'src'
      src: ['js/**/*.js', 'bower_components/**/*.js']
      dest: '.tmp'
    }]
