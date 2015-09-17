module.exports =

  js:
    files: ['src/js/**/*.{js,coffee}']
    tasks: ['buildJSProd']
    options:
      spawn: false

  sass:
    files: ['src/styles/**/*.scss']
    tasks: ['buildCSS']
    options:
      spawn: false
