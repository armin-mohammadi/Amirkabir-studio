/**
 * Created by armin on 12/26/16.
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

function traverse(el){
    var persian={0:'۰',1:'۱',2:'۲',3:'۳',4:'۴',5:'۵',6:'۶',7:'۷',8:'۸',9:'۹'};
    if(el.nodeType==3){
        var list=el.data.match(/[0-9]/g);
        if(list!=null && list.length!=0){
            for(var i=0;i<list.length;i++)
                el.data=el.data.replace(list[i],persian[list[i]]);
        }
    }
    for(var i=0;i<el.childNodes.length;i++){
        traverse(el.childNodes[i]);
    }
}

$.getJSON("/api/games/"+getParameterByName('name')+"/header", function (result) {
    var div = `<div class="row block verticalcenter no-margin">
            <div class="col-md-4">
                <div class="text-right">
                    <button type="button" class="btn btn-default">شروع بازی</button>
                </div>
            </div>
            <div class="col-md-4 extra-padding-1">
                <div class="row">
                    <div class="text-right">
                        <span class="title white-text">`+result['response']['result']['game']['title']+`</span>
                    </div>
                </div>
            <div class="row">
                <div class="text-right white-text">`;
        $.each(result["response"]["result"]["game"]["categories"], function (index, element) {
            div += `<span class="subtitle">`+element+`</span>`;
            if (index == result["response"]["result"]["game"]["categories"].length - 1) {
                return false;
            }
            div += `<span> ، </span>`
        });
        div += `</div>
            </div>
            <div class="row">
                <div class="text-right review-container">
                    <input type="text" class="kv-fa-heart-header rating-loading" value="`+result['response']['result']['game']['rate']+`" dir="rtl" data-size="xs" title="">
                    <div class="white-text extra-margin-1">
                        <span>`+parseFloat(result['response']['result']['game']['rate']) +`</span>
                        <span>(`+result['response']['result']['game']['number_of_comments']+` رای)</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4"><img src="`+result['response']['result']['game']['small_image']+`" class="img-rounded"></div>
    </div>`;
    $('.header-img').append(div);
    traverse(document.getElementsByClassName("header-img")[0]);
    $('.kv-fa-heart-header').rating({
        showClear: false,
        showCaption: false,
        theme: 'krajee-fa',
        filledStar: '<i class="fa fa-star"></i>',
        emptyStar: '<i class="fa fa-star"></i>',
        displayOnly: true
    });
    $.getJSON("/api/games/"+getParameterByName('name')+"/info" , function (result) {
        var content = result['response']['result']['game']['info'];
        $('#menu1').find('.content').append(content)
    });
});
$('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
    var target = $(e.target).attr("href"); // activated tab
    if ($(target).find('.content').html() == "") {
        switch (target) {
            case "#menu1":
                $.getJSON("/api/games/"+getParameterByName('name')+"/info" , function (result) {
                    var content = result['response']['result']['game']['info'];
                    $(target).find('.content').append(content)
                });
                break;
            case "#menu2":
                $.getJSON("/api/games/"+getParameterByName('name')+"/leaderboard" , function (result) {
                result = result['response']['result'];
                var content =
                `<div class="card_view leaderboard">
                    <div class="top_3">
                        <div class="top_indv_container">
                            <div class="rank_2_3 rank_2">
                                <img class="img_rank2_3" src="`+(result['leaderboard'][1]['player']['avatar'] == "" ? "images/avatar.png" : result['leaderboard'][1]['player']['avatar'])+`">
                                <div class="level">
                                    <div class="triangle1"></div>
                                    <div class="triangle2"></div>
                                    <div class="square">
                                        <div class="level_text2">`+result['leaderboard'][1]['level']+`</div>
                                    </div>
                                </div>
                            </div>
                            <div class="text-center">`+result['leaderboard'][1]['player']['name']+`</div>
                            <div class="score text-center">`+result['leaderboard'][1]['score']+`</div>
                        </div>
                        <div class="top_indv_container rank_1">
                            <div class="rank">
                                <img class="img_rank1" src="`+(result['leaderboard'][0]['player']['avatar'] == "" ? "images/avatar.png" : result['leaderboard'][0]['player']['avatar'])+`">
                                <div class="level rank1">
                                    <div class="triangle1 rank1"></div>
                                    <div class="triangle2 rank1"></div>
                                    <div class="square rank1">
                                        <div class="level_text1">`+result['leaderboard'][0]['level']+`</div>
                                    </div>
                                </div>
                            </div>
                            <div class="text-center">`+result['leaderboard'][0]['player']['name']+`</div>
                            <div class="score text-center">`+result['leaderboard'][0]['score']+`</div>
                        </div>
                        <div class="top_indv_container">
                            <div class="rank_2_3 rank_3">
                                <img class="img_rank2_3" src="`+(result['leaderboard'][2]['player']['avatar'] == "" ? "images/avatar.png" : result['leaderboard'][2]['player']['avatar'])+`">
                                <div class="level">
                                    <div class="triangle1"></div>
                                    <div class="triangle2"></div>
                                    <div class="square">
                                        <div class="level_text2">`+result['leaderboard'][2]['level']+`</div>
                                    </div>
                                </div>
                            </div>
                            <div class="text-center">`+result['leaderboard'][2]['player']['name']+`</div>
                            <div class="score text-center">`+result['leaderboard'][2]['score']+`</div>
                        </div>
                    </div>
                    <div class="list">
                        <div class="list-header">
                            <div class="col-md-2 text-right"><span>امتیاز</span></div>
                            <div class="col-md-2 text-right"><span>تغییر رتبه</span></div>
                            <div class="col-md-1 text-right"><span>سطح</span></div>
                            <div class="col-md-4"></div>
                            <div class="col-md-1 text-right"><span>بازیکن</span></div>
                            <div class="col-md-1"></div>
                            <div class="col-md-1 text-right"><span>رتبه</span></div>
                        </div>`;
                    $.each(result["leaderboard"], function (index, element) {
                        content +=
                            `<div class="`+(index%2==0 ? "even-row" : "odd-row")+`">
                                <div class="col-md-2 text-right"><span>`+element['score']+`</span></div>
                                <div class="col-md-2 text-right"><span>(`+Math.abs(parseInt(element['displacement']))+(parseInt(element['displacement']) >= 0 ? "+" : "-")+`)</span></div>
                                <div class="col-md-1 text-right"><span>`+element['level']+`</span></div>
                                <div class="col-md-4 text-right"><span>`+element['player']['name']+`</span></div>
                                <div class="col-md-1 text-right">
                                    <div class="pic_container">
                                        <img class="pic" src="`+(element['player']['avatar'] == "" ? "images/avatar.png" : element['player']['avatar'])+`">
                                    </div>
                                </div>
                                <div class="col-md-1"></div>
                                <div class="col-md-1 text-right"><span>`+(index+1)+`.</span></div>
                            </div>`;
                    });
                    content += `
                    </div>
                </div>`;
                    $(target).find('.content').append(content);
                    traverse(document.getElementById("menu2"))
                });
                break;
            case "#menu3":
                $.getJSON("/api/games/"+getParameterByName('name')+"/comments?offset=0" , function (result) {
                    result = result['response']['result']['comments'];
                    var header = `
                                    <div class="row">
                                        <div class="col-md-1 text-right">
                                            <button type="button" class="btn btn-default" data-toggle="modal" data-target="#comment_modal">نظر دهید</button>
                                        </div>
                                        <div class="col-md-11 text-right content-title">نظرات کاربران (`+result[0]['game']['number_of_comments']+` نظر)</div>
                                    </div>
                    `;
                    num_of_comments = parseInt(result[0]['game']['number_of_comments']);
                    $(target).find('.page-header').append(header);
                    traverse(document.getElementById("menu3"));
                    offset += result.length;
                    var content = `<div class="list">`;
                    $.each(result, function (index, element) {
                        content +=
                            `<div class="`+(index%2==0 ? "even-row" : "odd-row")+`">
                                <div class="col-md-3">
                                    <div class="five_star">`;
                                    var i = 5 - element['rate'];
                                    while(i > 0) {
                                    content +=
                                        `<span class="material-icons">star</span>`;
                                        i -= 1;
                                    }
                                    while (i < element['rate']) {
                                    content +=
                                        `<i class="material-icons">star</i>`;
                                        i += 1;
                                    }
                                content +=
                                    `</div>
                                </div>
                                <div class="col-md-8">
                                    <div class="row">
                                        <div class="text-right">
                                            <span class="list-group-item-text">`+element['date']+`</span>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="text-right">
                                            <span class="list-group-item-heading">`+element['text']+`</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-1">
                                    <img src="`+element['player']['avatar']+`" class="img-circle">
                                </div>
                            </div>`;
                    });
                    content += `</div>`;
                    $(target).find('.content').append(content);
                });
                break;
            case "#menu4":
                $.getJSON("/api/games/"+getParameterByName('name')+"/related_games" , function (result) {
                    result = result['response']['result']['games'];
                    // for (let i =1;i<16;i++){
                    //     result[i] = result[0];
                    // }
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
                                                <a href="games?name=`+element['title']+`">
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
                    $(target).find('.content').append(content);
                    $('.kv-fa-heart').rating({
                        showClear: false,
                        showCaption: false,
                        theme: 'krajee-fa',
                        filledStar: '<i class="fa fa-star"></i>',
                        emptyStar: '<i class="fa fa-star"></i>',
                        displayOnly: true
                    });
                });
                break;
            case "#menu5":
                $.getJSON("http://api.ie.ce-it.ir/F95/games/"+getParameterByName('name')+"/gallery" , function (result) {
                    result = result['response']['result']['gallery'];
                    var items = [];
                    $.each(result['videos'], function (index, element) {
                        items[index] = element;
                    });
                    $.each(result['images'], function (index, element) {
                        items[(index + result['videos'].length)] = element;
                    });
                    var content =`
                    <div class="row">
                        <div id="slider">
                            <div class="row">
                                <div id="carousel-bounding-box">
                                    <div class="carousel slide" id="main-carousel" data-interval="false">
                                        <div class="carousel-inner">`;
                    $.each(items, function (index, element) {
                        content += `
                                    <div class="item` + (index == 0 ? ' active"' : '"') + ` data-slide-number="`+index+`">`;
                                        if (index >= result['videos'].length) {
                                            content += `<img class="large-image" src="`+element['url']+`">`
                                        } else {
                                            content += `
                                                        <iframe class="large-image video" src="`+element['url']+`" frameborder="0" allowfullscreen=""></iframe>
                                                        `
                                        }
                        content +=
                                    `    <div class="text-right"><span class="caption title">`+element['title']+`</span></div>
                                         <div class="text-right"><span class="caption views">`+element['views']+` بازدید</span></div>
                                    </div>`;
                    });
                    content += `
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="carousel slide" id="thumb-carousel">
                                        <div class="carousel-inner">`;
                $.each(items, function (index, element) {
                    if (index % 4 == 0) {
                        content += `                    
                            <div class="item` + (index == 0 ? ' active"' : '"') + ` data-slide-number="`+(index%4)+`">
                                    <div class="row text-center extra-padding-1">`;
                    }
                            content += `<div class="col-md-3"><a class="thumbnail" id="carousel-selector-`+index+`">`;
                            if (index >= result['videos'].length) {
                                content += `<img src="`+element['url']+`">`
                            } else {
                                content += `<img src="images/video-icon-thumbnail.png">`
                            }
                            content += `</a></div>`;
                    if (index % 4 == 3 || index == items.length - 1) {
                        content += `                    
                                    </div>
                            </div>`;
                    }
                });
                content += `</div>
                                    <a class="carousel-control left" data-slide="prev" href="#thumb-carousel">
                                        <span class="carousel-arrow">‹</span>
                                    </a>
                                    <a class="carousel-control right" data-slide="next" href="#thumb-carousel">
                                        <span class="carousel-arrow">›</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>`;
                    $(target).find('.content').append(content);
                    traverse(document.getElementById("main-carousel"));
                //Handles the carousel thumbnails
                $('[id^=carousel-selector-]').click( function(){
                    var id_selector = $(this).attr("id");
                    var id = id_selector.substr(id_selector.length -1);
                    id = parseInt(id);
                    $('#main-carousel').carousel(id);
                });
                // When the carousel slides, auto update the text
                $('#main-carousel').on('slid', function (e) {
                        var id = $('.item.active').data('slide-number');
                        $('#carousel-text').html($('#slide-content-'+id).html());
                    });
                });
                break;
        }
    }
});
offset = 0;
$("#load_more_comment").click(function() {
    $.getJSON("/api/games/"+getParameterByName('name')+"/comments?offset="+offset , function (result) {
        result = result['response']['result']['comments'];
        var content = "";
        $.each(result, function (index, element) {
            content +=
                `<div class="`+((offset + index)%2==0 ? "even-row" : "odd-row")+`">
                    <div class="col-md-3">
                        <div class="five_star">`;
            var i = 5 - element['rate'];
            while(i > 0) {
                content +=
                    `<span class="material-icons">star</span>`;
                i -= 1;
            }
            while (i < element['rate']) {
                content +=
                    `<i class="material-icons">star</i>`;
                i += 1;
            }
            content += `
                </div>
                </div>
                <div class="col-md-8">
                    <div class="row">
                        <div class="text-right">
                            <span class="list-group-item-text">`+element['date']+`</span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="text-right">
                            <span class="list-group-item-heading">`+element['text']+`</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-1">
                    <img src="`+element['player']['avatar']+`" class="img-circle">
                </div>
            </div>`;
        });
        offset += result.length;
        if (offset == num_of_comments) {
            $("#load_more_comment").css('display', 'none')
        }
        $('#menu3').find('.list').append(content);
    })
});