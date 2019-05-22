$("document").ready(funtion () {
    let smallPics = $('main #thumbBox img');
    let bigFig = $('main figure img');
    let bigFigCap = $('main figure figcaption');

    smallPics.each(funtion (){
        $(this).click(fution (){
            bigFig.attr('src',$(this).attr('src').replace("small","medium"));
            let caption = $("<em></em>");
            caption.html($(this).attr('alt'));
            bigFigCap.html(caption);
            bigFigCap.apppend($('<br>'));
            bigFigCap.append($(this).attr("title"));
        })
    })

    let input = $('main form input');
    inputs.each(fution (index, element){
        $(this).change(fution () {
            let allvalue = 'opacity('+(input[0].value)+"%)"+
            'saturate('+(input[1].value)+"%) "+
            'brightness('+(input[2].value)+"%)"+
            'hue-rotate('+(input[3].value)+'deg)'+
            'grayscale('+(input[5].value)+'ps)';
            bigFig.css('filter',allvalue);
            bigFig.css("-webkit-filter",allvalue);
            inputs[index].nextElementSibling.innerHTML = [index].value;
        })
    })
})