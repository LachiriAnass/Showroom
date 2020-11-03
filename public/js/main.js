$(document).ready(function() {
    $('#pagepiling').pagepiling({
        menu: null,
        direction: 'vertical',
        verticalCentered: true,
        scrollingSpeed: 500,
        easing: 'linear',
        loopBottom: true,
        loopTop: true,
        css3: true,
        normalScrollElements: null,
        normalScrollElementTouchThreshold: 1,
        touchSensitivity: 5,
        keyboardScrolling: true,
        sectionSelector: '.section',
        animateAnchor: false,

        //events
        onLeave: function(index, nextIndex, direction){},
        afterLoad: function(anchorLink, index){},
        afterRender: function(){},
    });
});
