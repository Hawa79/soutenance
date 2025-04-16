$(function() {
    $('.rangeSlider').each(function (e) {
        var slider = $(this);
        var minVal = slider.data("min"); // get data-min value
        var maxVal = slider.data("max"); // get data-max value
        var valuesVal = slider.data("values"); // get data-values value
        var html = slider.data("html"); // get data-html value
        var value = slider.data("value"); // get data-value value
        var prefix = slider.data("prefix"); // get data-prefix value
        var postfix = slider.data("postfix"); // get data-postfix value
        slider.slider({
            range: true,
            min: minVal,
            max: maxVal,
            values: valuesVal,
            slide: function( event, ui ) {
                $( "."+html ).html( prefix + ui.values[ 0 ] + postfix +' - ' + prefix + ui.values[ 1 ] + postfix );
                $( "."+value ).val( "[" + ui.values[ 0 ] +','+ ui.values[ 1 ] + "]" );
            }
        });
        var sliderMinVal = slider.slider( "values", 0 );
        var sliderMaxVal = slider.slider( "values", 1 );
        $( "."+html ).html( prefix + sliderMinVal + postfix +' - ' + prefix + sliderMaxVal + postfix );
        $( "."+value ).val( "[" + sliderMinVal +','+ sliderMaxVal + "]" );
    });
});