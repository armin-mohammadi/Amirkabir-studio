/**
 *
 * Created by armin on 12/27/16.
 */
function getParameterByName(name, url) {
    if (!url) {
        url = window.location.href;
    }
    name = name.replace(/[\[\]]/g, "\\$&");
    var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
        results = regex.exec(url);
    if (!results) return null;
    if (!results[2]) return '';
    return decodeURIComponent(results[2].replace(/\+/g, " "));
}

    var _url = "http://api.ie.ce-it.ir/F95/home.json";
    var q = "";
    if ((q = getParameterByName("q")) != ""){
        _url = "http://api.ie.ce-it.ir/F95/games.json?q="+q;
    }
$.getJSON(_url , function (result) {
    console.log(result)
    if (q != "") {
        result = result['response']['result']['games'];
    } else {
        result = result['response']['result']['homepage']['slider'];
        for (let i =result.length;i<16;i++){
            result[i] = result[i%result.length];
        }
    }
    var content = "";
    $.each(result, function (index, element) {
        if (index % 4 == 0) {
            content += `<div class="row extra-margin-1">`
        }
        content += `<div class="col-md-3">
                        <div class="card hoverable">
                            <div class="card-image">
                                <div class="view overlay hm-white-slight z-depth-1">
                                    <img src="`+element['small_image']+`" class="img-responsive" alt="">
                                    <a href="games.htm?name=`+element['title']+`">
                                        <div class="mask waves-effect"></div>
                                    </a>
                                </div>
                            </div>
                            <div class="card-content">
                                <div class="row">
                                    <div class="text-right">
                                        <span class="game-title">`+element['title']+`</span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="text-right">
                                        <span class="game-categories">`+element['categories']+`</span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="text-right">
                                        <input type="text" class="kv-fa-heart rating-loading" value="`+element['rate']+`" dir="rtl" data-size="xs" title="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                                `;
        if (index % 4 == 3) {
            content += "</div>"
        }
    });
    $('.content').append(content);
    $('.kv-fa-heart').rating({
        showClear: false,
        showCaption: false,
        theme: 'krajee-fa',
        filledStar: '<i class="fa fa-star"></i>',
        emptyStar: '<i class="fa fa-star"></i>',
        displayOnly: true
    });
});