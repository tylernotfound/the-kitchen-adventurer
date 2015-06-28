module.exports =

  js:
    files: ['src/js/**/*.{js,coffee,eco}']
    tasks: ['buildJS']
    options:
      spawn: false

  sass:
    files: ['src/styles/**/*.scss']
    tasks: ['buildCSS']
    options:
      spawn: false
