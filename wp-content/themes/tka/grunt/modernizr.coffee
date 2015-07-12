module.exports =
  dist:
    # [REQUIRED] Path to the build you're using for development.
    "devFile": "remote"

    # [REQUIRED] Path to save out the built file.
    "outputFile": "dist/js/modernizr.min.js",

    # Based on default settings on http://modernizr.com/download/
    "extra":
      "shiv": true
      "printshiv": false
      "load": false
      "mq": true
      "cssclasses": true

    # Based on default settings on http://modernizr.com/download/
    "extensibility":
      "addtest": false
      "prefixed": true
      "teststyles": false
      "testprops": false
      "testallprops": false
      "hasevents": false
      "prefixes": true
      "domprefixes": false

    "uglify": true

    # Define any tests you want to implicitly include.
    "tests": [
      'csstransforms',
      'csstransforms3d',
      'rgba',
      'contenteditable',
      'css_overflow_scrolling',
      'css_pointerevents'
    ]

    "parseFiles": false

    "matchCommunityTests": false
