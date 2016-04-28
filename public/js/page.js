$(document)
    .ready(function() {
        $('.ui.dropdown').dropdown();
        $('.ui.sticky').sticky({ context: '#popular-videos',offset: 80});
        $('#popular-videos .cards .image').dimmer({
            on: 'hover'
        });

        $('#search').form({
          fields: {
            queryString: {
              identifier  : 'queryString',
              rules: [
              {
                type   : 'empty'
              }
              ]
            }
          },
          inline : true,
          on     : 'blur'
        });
    });
