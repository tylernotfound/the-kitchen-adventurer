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
      $(document).on 'pjax:beforeReplace', @onBeforeReplace
      # $(document).on 'pjax:success', @onSuccess
      $(document).on 'pjax:end', @onEnd

      return


    onClick: (e) ->
      P = App.modules.PJAX

      return if P.processing

      App.ee.emitEvent 'pjax:start'

      # Manually triggering pjax clicks
      P.processing = true
      $.pjax.click(e, {fragment: '#main', container: P.container, timeout: 2000})

      return


    onBeforeReplace: (contents, options) ->
      App.ee.emitEvent 'pjax:beforeReplace'

      # options[1] is the #pjax-helper hidden element
      helper = options[1]

      # avoid errors by returning early if helper was not found
      return if !helper

      # Update page title
      document.title = helper.getAttribute 'data-title'

      # remove class=" and then last " from the attribute
      body_classes = helper.getAttribute 'data-bc'
      body_classes = body_classes.substring(7).replace('"', '')
      App.$body[0].className = body_classes

      return


    # onSuccess: (data, status, xhr, options) ->
    onEnd: (data, status, xhr, options) ->
      App.modules.PJAX.processing = false
      App.ee.emitEvent 'pjax:success'



