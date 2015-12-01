###--------------------------------------
# page
--------------------------------------###

do ($ = jQuery, App) ->

  'use strict'

  App.modules.Page =
    init: ->
      @container = $('#main')
      @activeMsnry = null

      # Perform initial loading event
      setTimeout @onInitialLoad.bind(@), 150

      return

    onInitialLoad: ->
      # Check for masonry targets
      $el = @container.find('.js-msnry')
      if $el.length > 0
        @activeMsnry = $el
        @activeMsnry.masonry
          gutter: '.gutter-sizer'
          columnWidth: '.grid-sizer'
          itemSelector: '.card'

      # Bring container back in
      @container.removeClass 'is-loading'

