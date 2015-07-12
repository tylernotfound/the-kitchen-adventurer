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
      @onInitialLoad()

      # Listen for page events
      App.ee.addListener 'pjax:start', @onPjaxStart.bind(@)
      App.ee.addListener 'pjax:beforeReplace', @onPjaxBeforeReplace.bind(@)
      App.ee.addListener 'pjax:success', @onPjaxSuccess.bind(@)

      return

    onInitialLoad: ->
      @container.imagesLoaded =>
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


    onPjaxStart: ->
      # Remove any visible pin it buttons
      $('[data-pin-href]').remove()

      # Start hiding container
      @container.addClass 'is-loading'

      return


    onPjaxBeforeReplace: ->
      # Destroy any current masonry elements
      if @activeMsnry
        @activeMsnry.masonry('destroy')
        @activeMsnry = null

      return


    onPjaxSuccess: ->
      @container.imagesLoaded =>
        # Check for social
        if @container.find('.post-share').length > 0
          FB?.XFBML.parse()
          twttr?.widgets.load()
          parsePinBtns?()

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

        return
      return

