module.exports =
  dist:
    options:
      httpPath: "/"
      cssDir: ".tmp/css"
      sassDir: "src/styles"
      imagesDir: "img"
      javascriptsDir: 'dist/js'
      # CSS output mode. Can be: nested, expanded, compact, compressed.
      outputStyle: 'compressed'
      noLineComments: true
      assetCacheBuster: false
