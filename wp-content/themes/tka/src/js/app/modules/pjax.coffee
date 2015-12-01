###--------------------------------------
# PJAX
--------------------------------------###

do ($ = jQuery, App) ->

  'use strict'

  App.modules.PJAX =
    init: ->
      return if !$.support.pjax

      # Cache objects
      @container = $('#main')

      # States
      @processing = false

      # Event handlers
      App.$body.on 'click', 'a[data-pjax]', @onClick

      return


    onClick: (e) ->
      P = App.modules.PJAX

      return if P.processing

      # If user is attempting to open in a new tab, do nothing
      return if e.metaKey or e.ctrlKey



      return

