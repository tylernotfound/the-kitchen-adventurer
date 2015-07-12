module.exports =
  app: ['src/js/**/*.coffee']
  options:
    # Errors
    no_interpolation_in_single_quotes: { level: 'error' }
    space_operators: { level: 'error' }

    # Warnings
    no_trailing_whitespace: { level: 'warn' }
    no_empty_param_list: { level: 'warn' }
    arrow_spacing: { level: 'warn' }
    no_unnecessary_double_quotes: { level: 'warn' }

    # Ignore
    max_line_length: { level: 'ignore' }
