
function pic1() {
    document.getElementById("featured").innerHTML="" +
        "<img src=\"images/medium/"+5855774224+".jpg\" onmouseleave=\"MouseOut()\" onmouseenter=\"MouseIn()\"/>\n" +
        "<figcaption id=\"figcaption\">"+"Battl"+"</figcaption>";
   
}

function pic2() {
    document.getElementById("featured").innerHTML="" +
        "<img src=\"images/medium/"+5856697109+".jpg\" onmouseleave=\"MouseOut()\" onmouseenter=\"MouseIn()\"/>\n" +
        "<figcaption id=\"figcaption\">"+"Luneburg"+"</figcaption>";
   
}
function pic3() {
    document.getElementById("featured").innerHTML="" +
        "<img src=\"images/medium/"+6119130918+".jpg\" onmouseleave=\"MouseOut()\" onmouseenter=\"MouseIn()\"/>\n" +
        "<figcaption id=\"figcaption\">"+"Bermuda"+"</figcaption>";
   
}
function pic4() {
    document.getElementById("featured").innerHTML="" +
        "<img src=\"images/medium/"+8711645510+".jpg\" onmouseleave=\"MouseOut()\" onmouseenter=\"MouseIn()\"/>\n" +
        "<figcaption id=\"figcaption\">"+"Athens"+"</figcaption>";
   
}
function pic5() {
    document.getElementById("featured").innerHTML="" +
        "<img src=\"images/medium/"+9504449928+".jpg\" onmouseleave=\"MouseOut()\" onmouseenter=\"MouseIn()\"/>\n" +
        "<figcaption id=\"figcaption\">"+"Florence"+"</figcaption>";
   
}
function MouseOut() {
    var fig=document.getElementById("figcaption");
    fadeOut(fig,1000.0/80.0,0);
}

function MouseIn() {
    var fig=document.getElementById("figcaption");
    fadeIn(fig,1000.0/80.0,80.0);
}

var iBase = {
    Id: function(name){
        return document.getElementById(name);
    },
    SetOpacity: function(ev, v){
        ev.filters ? ev.style.filter = 'alpha(opacity=' + v + ')' : ev.style.opacity = v / 100;
    }
};

function fadeIn(elem, speed, opacity) {
    elem.style.display = 'block';
    iBase.SetOpacity(elem, 0);
    var fadein = 0;
        (function () {
            iBase.SetOpacity(elem, fadein);
            fadein += 1;
            if (fadein <= opacity) {
                setTimeout(arguments.callee, speed);
            }
        })();
}

function fadeOut(elem, speed, opacity){
    var fadeout = 80;
    (function(){
        iBase.SetOpacity(elem, fadeout);
        fadeout -= 1;
        if (fadeout >= opacity) {
            setTimeout(arguments.callee, speed);
        }
    })();
}
