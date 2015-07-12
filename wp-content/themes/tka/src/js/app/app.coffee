do ($ = jQuery) ->

  'use strict'

  # Application object and storage
  # for general helper functions.
  window.App =

    # Container for modules
    modules: {}

    # States
    is_mobile: window.innerWidth <= 718

    init: ->
      # Helpful caches
      @$body = $('body')
      @$window = $(window)

      # Fastclick setup
      FastClick.attach document.body

      # Setup event emitter
      @ee = new EventEmitter()

      # Startup all bound modules
      for name of @modules
        module = @modules[name]
        module.init() if typeof module.init is 'function'

      return

  return
