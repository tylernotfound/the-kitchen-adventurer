###--------------------------------------
# Colorize
--------------------------------------###

do ($ = jQuery, App) ->

  'use strict'

  App.modules.Colorize =
    init: ->
      @colorsCount = 8
      @currentColorId = parseInt(App.$body.attr('data-color'), 10)

      setInterval @updateColor, 15000
      return


    incrementColorId: ->
      @currentColorId = if @currentColorId >= @colorsCount then 1 else @currentColorId += 1
      return


    updateColor: ->
      C = App.modules.Colorize

      App.$body.attr 'data-color', C.currentColorId

      C.incrementColorId()
      return
