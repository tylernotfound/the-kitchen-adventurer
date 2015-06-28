module.exports =
  compile:
    options:
      bare: true
    files: [{
      expand: true
      cwd: 'src/js/'
      src: ['**/*.coffee']
      dest: '.tmp/js/'
      ext: '.js'
    }]
