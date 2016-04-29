$(document)
.ready(function() {
  $('#upload')
  .form({
    fields: {
      title: {
        identifier  : 'title',
        rules: [
        {
          type   : 'empty',
          prompt : 'Please enter video title'
        }
        ]
      },
      link: {
        identifier  : 'link',
        rules: [
        {
          type   : 'empty',
          prompt : 'Please enter your link',
        },
        {
          type   : 'regExp[/^https:\/\/www\.youtube\.com\/watch\\?v=/]',
          prompt : 'Please enter a valid youtube video url',
        },
        ]
      },
      description: {
        identifier  : 'description',
        rules: [
        {
          type   : 'empty',
          prompt : 'Please give a brief description of the video'
        }
        ]
      }
    },
    category: {
      identifier  : 'category_id',
      rules: [
        {
          type   : 'empty',
          prompt : 'Please select a category'
        }
      ]
    }
  });

  $('#tag .ui.dropdown')
  .dropdown({
    allowAdditions: true
  });
  $('#category-field .ui.dropdown').dropdown();


});
