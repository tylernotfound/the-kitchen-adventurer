###--------------------------------------
 Query Params Utilities
--------------------------------------###

do ($ = jQuery, App) ->

  'use strict'

  App.QueryParams =

    read: ->
      result = {}
      params = window.location.search.slice(1).split '&'
      i = 0

      while i < params.length
        tmp = params[i].split '='
        result[tmp[0]] = unescape tmp[1]
        i++

      return result


  return
