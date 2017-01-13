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
$(document).ready(function() {
    $.getJSON("api/home.json", function (result) {
        var div = "";
        for (let i = 0; i < 6; i++) {
            $.each(result["response"]["result"]["homepage"]["slider"], function (index, element) {
                $('#large-carousel').find('.carousel-inner').append(`
                        <div class="item` + (index == 0 && i == 0 ? ' active"' : '"') + `>
                            <div>
                                <img src="` + element['large_image'] + `">
                            </div>
                            <div class="container">
                                <div class="row">
                                    <div class="text-right">
                                        <span class="name">` + element['title'] + `</span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="text-right">
                                        <span class="description">` + element['abstract'] + `</span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="text-right">
                                        <button type="button" class="btn btn-default" onclick="location.href='games?name=`+element['title']+`'">ورود به صفحه ی بازی</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    `);
                $('.owl-carousel').append(`
                        <div class="slider-item">
                            <div>
                                <div class="item-container">
                                    <img src="` + element['small_image'] + `">
                                </div>
                                <button type="button" class="btn btn-default overlay hide selected-btn" onclick="location.href='games?name=`+element['title']+`'">صفحه بازی</button>
                                <div class="overlay hide text-right">
                                    <div><span>`+element['title']+`</span></div>
                                    <div><span>تعداد نظرات: `+element['number_of_comments']+`</span></div>
                                </div>
                            </div>
                        </div>
                    `);
                $.each(document.getElementsByClassName("slider-item"), function (index, element) {
                    traverse(element)
                })
            });
        }
        for (let i = 0; i < 3; i++) {
            $.each(result["response"]["result"]["homepage"]["new_games"], function (index, element) {
                if ((index + i*4) % 4 == 0) {
                    div += `<div class="item` + (index + i == 0 ? ' active"' : '"') + `>
                                        <div class="row">`
                }
                div += `<div class="col-md-3">
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

                if ((index + i*4) % 4 == 3) {
                    div += "</div></div>"
                }
            });
        }
        for (let i = 0; i < 2; i++) {
            $.each(result["response"]["result"]["homepage"]["tutorials"], function (index, element) {
                $('.guides-and-comments-container').find('.guides').append(`
                                <div class="list-group-item row">
                                    <div class="col-md-9">
                                        <div class="row">
                                            <div class="text-right">
                                                <span class="list-group-item-heading">` + element['title'] + `</span>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="text-right">
                                                <span class="list-group-item-text">` + element['date'] + `</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <img src="` + element['game']['small_image'] + `">
                                    </div>
                                </div>
                        `)
            });
        }
        let i = 0;
        $.each(result["response"]["result"]["homepage"]["comments"], function (index, element) {
            $('.guides-and-comments-container').find('.comments').append(`
                            <!--<a href="#" class="list-group-item">-->
                                <div class="list-group-item row">
                                    <div class="col-md-10">
                                        <div class="row">
                                            <div class="text-right">
                                                <span class="list-group-item-heading">`+element['text']+`</span>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="text-right">
                                                <span class="list-group-item-text">`+element['date']+`</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <img src="`+element['player']['avatar']+`" class="img-circle" width="50" height="50">
                                    </div>
                                </div>
                            <!--</a>-->
                        `);
            if (i == 3) {
                return false
            }
            i += 1;
        });
        $('#latest-carousel').find('.carousel-inner').append(div);
        var owl = $('.owl-carousel');
        owl.owlCarousel({
            items: 7,
            dots:false,
            loop: true,
            margin: 0,
            autoplay: true,
            center: true,
            autoplayTimeout: 5000,
            autoplayHoverPause: false
        });
        $('.owl-item.active.center').find('.item-container').addClass('selected-item');
        $('.owl-item.active.center').find('.overlay').remove('hide');
        $('.owl-item.active.center').find('.overlay').addClass('show');
        owl.find('.owl-stage-outer').css('padding-top', '1%');
        owl.find('.owl-stage-outer').css('padding-bottom', '1%');
        owl.find('.owl-stage-outer').css('margin-top', '-1%');
        owl.find('.owl-stage-outer').css('margin-bottom', '-1%');
        owl.mouseout(function () {
            owl.trigger('play.owl.autoplay');
        });
        owl.mouseover(function () {
            owl.trigger('stop.owl.autoplay')
        });
        $('.slider-item').each(function (i) {
            $(this).on("click", function () {
                owl.trigger('to.owl.carousel', [(i - 9) % ($(this).length - 14)]);
            });
            $(this).mouseover(function () {
                if (!$(this).parent().hasClass("center")) {
                    $(this).find('.item-container').addClass("hover");
                    $(this).find('.overlay').removeClass('selected-btn')
                    $(this).find('.overlay').addClass('show')
                }
            });
            $(this).mouseout(function () {
                $(this).find('.item-container').removeClass("hover");
                if (!$(this).parent().hasClass("center")) {
                    $(this).find('.overlay').removeClass('show');
                    $(this).find('.overlay').addClass('hide')
                }
            });
        });
        owl.on('translated.owl.carousel', function (event) {
            $('.owl-item').find('.overlay').removeClass('show');
            $('.owl-item').find('.overlay').removeClass('selected-btn');
            $('.owl-item').find('.overlay').addClass('hide');
            $('.owl-item').find('.item-container').removeClass('selected-item');
            $('.owl-item.active.center').find('.item-container').addClass('selected-item');
            $('.owl-item.active.center').find('.overlay').remove('hide');
            $('.owl-item.active.center').find('.overlay').addClass('show');
            $('.owl-item.active.center').find('.overlay').addClass('selected-btn');
        });
        owl.on('changed.owl.carousel', function (event) {
            var currentItem = event.item.index - 9;
            $('#large-carousel').carousel(currentItem % 12);
        });
        $('.kv-fa-heart').rating({
            showClear: false,
            showCaption: false,
            theme: 'krajee-fa',
            filledStar: '<i class="fa fa-star"></i>',
            emptyStar: '<i class="fa fa-star"></i>',
            displayOnly: true
        });
    });

});