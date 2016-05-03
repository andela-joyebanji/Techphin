$(document)
    .ready(function() {
        // fix menu when passed
        $('.masthead')
            .visibility({
                once: false,
                offset : 40,
                onBottomPassed: function() {
                    $('.fixed.menu').transition('fade in');
                },
                onBottomPassedReverse: function() {
                    $('.fixed.menu').transition('fade out');
                }
            });
            $('.ui.dropdown').dropdown();
            $('.ui.sticky').sticky({ context: '#popular-videos',offset: 90});
            $('#popular-videos .cards .image').dimmer({
                on: 'hover'
            });
        function scrollToID(aid){
            var aTag = $("#"+ aid );
            $('html,body').animate({scrollTop: aTag.offset().top - 73},'slow');
        }

        $("#browse-vid").click(function() {
            scrollToID('popular-videos');
        });
        $(".search.link.icon").click(function(){
          $('#search').submit();
        });

    });
