<?php require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
global $USER;
if(!$USER->IsAdmin()) {
    LocalRedirect('/404.php');
}?>

    <div class="wrapp-catalog">
        <div class="back-section">
            <a href="#"><img src="/local/templates/czebra_daewoo/front/img/new-mobil-card/back-section.svg" alt=""> Бензиновые</a>
        </div>
        <div class="wrapp-controls-catalog">
            <div class="container">
                <div class="controls-catalog">
                    <div class="left-controls-catalog">
                        <div class="wrapp-open-filters">
                            <a href="#">Фильтры</a>
                        </div>
                        <div class="show-count-items">
                            <span>Отображать по :</span>
                            <select class="select">
                                <option selected="">12</option>
                                <option>24</option>
                                <option>36</option>
                            </select>
                        </div>
                        <div class="sorting">
                            <span>Сортировать по :</span>
                            <select class="select">
                                <option value="rate" selected="">Популярности</option>
                                <option value="price_asc">Цена по возрастанию</option>
                                <option value="price_desc">Цена по убыванию</option>
                                <option value="name">Названию</option>
                            </select>
                        </div>
                    </div>
                    <div class="right-controls-catalog">
                        <div class="type-display">
                            <a href="?type=block" class="type-block-items "></a>
                            <a href="?type=list" class="type-list-items selected"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="wrapp-catalog-filter" style="display:none;">
            <div class="container">
                <div class="catalog-filter">

                    <form name="_form" action="/catalog/sadovaya_tehnika/gazonokosilki/benzinovye/?type=list" method="get" id="filter_smart">
                        <div class="top-block-filter-mobil">
                            <span class="title-filter-mobil">Фильтры</span>
                        </div>
                        <a href="#" class="close-mobil-filter" onclick="$('.wrapp-catalog-filter').slideUp();"></a>
                        <input type="hidden" name="type" id="type" value="list">

                        <div class="list-filter">

                            <div class="wrapp-filter WbC1IxzvxbYW48F">
                                <div class="name-filter">Цена</div>
                                <div class="block-value-filter">
                                    <div class="wrapp-input-value">
                                        <div class="block-min input-value">
                                            <span>от</span>
                                            <input type="text" class="min-price-filter min-value" data-value="16990" name="arrSmartFilter_P2_MIN" id="arrSmartFilter_P2_MIN" value="16990" size="6" onkeyup="smartFilter.keyup(this)">
                                        </div>

                                        <div class="block-max input-value">
                                            <span>до</span>
                                            <input type="text" class="max-price-filter max-value" data-value="149990" name="arrSmartFilter_P2_MAX" id="arrSmartFilter_P2_MAX" value="149990" size="5" onkeyup="smartFilter.keyup(this)">
                                        </div>
                                    </div>
                                    <div class="range-value ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content"><div class="ui-slider-range ui-corner-all ui-widget-header" style="left: 0%; width: 100%;"></div><span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default" style="left: 0%;"></span><span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default" style="left: 100%;"></span></div>
                                    <div class="values-range-form">
                                        <div class="min-values-form"></div>
                                        <div class="current-values-form"></div>
                                        <div class="max-values-form"></div>
                                    </div>
                                </div>
                            </div>

                            <div class="wrapp-filter filter_194">
                                <div class="name-filter">Мощность (л.с.)</div>
                                <div class="block-value-filter">
                                    <div class="wrapp-input-value">
                                        <div class="block-min input-value">
                                            <span>от</span>
                                            <input type="text" class="min-price-filter min-value" name="arrSmartFilter_194_MIN" id="arrSmartFilter_194_MIN" value="" size="6" placeholder="4" onkeyup="smartFilter.keyup(this)">
                                        </div>

                                        <div class="block-max input-value">
                                            <span>до</span>
                                            <input type="text" class="max-price-filter max-value" name="arrSmartFilter_194_MAX" id="arrSmartFilter_194_MAX" value="" size="6" placeholder="7" onkeyup="smartFilter.keyup(this)">
                                        </div>
                                    </div>
                                    <div class="range-value ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content"><div class="ui-slider-range ui-corner-all ui-widget-header" style="left: 0%; width: 100%;"></div><span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default" style="left: 0%;"></span><span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default" style="left: 100%;"></span></div>
                                    <div class="values-range-form">
                                        <div class="min-values-form"></div>
                                        <div class="current-values-form"></div>
                                        <div class="max-values-form"></div>
                                    </div>
                                </div>
                            </div>

                            <div class="wrapp-filter">
                                <div class="name-filter">Бренд</div>
                                <div class="block-value-filter">
                                    <div class="wrapp-checkbox">
                                        <input type="checkbox" class="filter-checkbox" value="Y" name="arrSmartFilter_628_464239607" id="arrSmartFilter_628_464239607" onclick="smartFilter.click(this)">
                                        <label for="arrSmartFilter_628_464239607">DAEWOO</label>
                                    </div>
                                    <div class="wrapp-checkbox">
                                        <input type="checkbox" class="filter-checkbox" value="Y" name="arrSmartFilter_628_2333386342" id="arrSmartFilter_628_2333386342" onclick="smartFilter.click(this)">
                                        <label for="arrSmartFilter_628_2333386342">DeWORKS</label>
                                    </div>

                                </div>
                            </div>

                            <div class="wrapp-filter">
                                <div class="name-filter">Ширина кошения (мм)</div>
                                <div class="block-value-filter">
                                    <div class="wrapp-checkbox">
                                        <input type="checkbox" class="filter-checkbox" value="Y" name="arrSmartFilter_281_394981507" id="arrSmartFilter_281_394981507" onclick="smartFilter.click(this)">
                                        <label for="arrSmartFilter_281_394981507">420</label>
                                    </div>
                                    <div class="wrapp-checkbox">
                                        <input type="checkbox" class="filter-checkbox" value="Y" name="arrSmartFilter_281_3982825481" id="arrSmartFilter_281_3982825481" onclick="smartFilter.click(this)">
                                        <label for="arrSmartFilter_281_3982825481">480</label>
                                    </div>
                                    <div class="wrapp-checkbox">
                                        <input type="checkbox" class="filter-checkbox" value="Y" name="arrSmartFilter_281_612300854" id="arrSmartFilter_281_612300854" onclick="smartFilter.click(this)">
                                        <label for="arrSmartFilter_281_612300854">500</label>
                                    </div>
                                    <div class="wrapp-checkbox">
                                        <input type="checkbox" class="filter-checkbox" value="Y" name="arrSmartFilter_281_1074937138" id="arrSmartFilter_281_1074937138" onclick="smartFilter.click(this)">
                                        <label for="arrSmartFilter_281_1074937138">540</label>
                                    </div>
                                    <div class="wrapp-checkbox">
                                        <input type="checkbox" class="filter-checkbox" value="Y" name="arrSmartFilter_281_3970396734" id="arrSmartFilter_281_3970396734" onclick="smartFilter.click(this)">
                                        <label for="arrSmartFilter_281_3970396734">580</label>
                                    </div>
                                    <div class="wrapp-checkbox">
                                        <input type="checkbox" class="filter-checkbox" value="Y" name="arrSmartFilter_281_336471277" id="arrSmartFilter_281_336471277" onclick="smartFilter.click(this)">
                                        <label for="arrSmartFilter_281_336471277">620</label>
                                    </div>
                                </div>
                            </div>

                            <div class="wrapp-filter">
                                <div class="name-filter">Количество скоростей</div>
                                <div class="block-value-filter">
                                    <div class="wrapp-checkbox">
                                        <input type="checkbox" class="filter-checkbox" value="Y" name="arrSmartFilter_274_1940569008" id="arrSmartFilter_274_1940569008" onclick="smartFilter.click(this)">
                                        <label for="arrSmartFilter_274_1940569008">1 вперед</label>
                                    </div>
                                    <div class="wrapp-checkbox">
                                        <input type="checkbox" class="filter-checkbox" value="Y" name="arrSmartFilter_274_192332525" id="arrSmartFilter_274_192332525" onclick="smartFilter.click(this)">
                                        <label for="arrSmartFilter_274_192332525">4 вперед / 1 назад</label>
                                    </div>
                                </div>
                            </div>

                            <div class="wrapp-filter">
                                <div class="name-filter name-dropdown-filter open">Объем травосборника (л)</div>
                                <div class="block-value-filter dropdown-filter mCustomScrollbar _mCS_1 mCS_no_scrollbar"><div id="mCSB_1" class="mCustomScrollBox mCS-dark mCSB_vertical mCSB_inside" style="max-height: 185px;" tabindex="0"><div id="mCSB_1_container" class="mCSB_container mCS_y_hidden mCS_no_scrollbar_y" style="position:relative; top:0; left:0;" dir="ltr">
                                            <div class="wrapp-checkbox">
                                                <input type="checkbox" class="filter-checkbox" value="Y" name="arrSmartFilter_279_1192990190" id="arrSmartFilter_279_1192990190" onclick="smartFilter.click(this)">
                                                <label for="arrSmartFilter_279_1192990190">140</label>
                                            </div>
                                            <div class="wrapp-checkbox">
                                                <input type="checkbox" class="filter-checkbox" value="Y" name="arrSmartFilter_279_3042645098" id="arrSmartFilter_279_3042645098" onclick="smartFilter.click(this)">
                                                <label for="arrSmartFilter_279_3042645098">55</label>
                                            </div>
                                            <div class="wrapp-checkbox">
                                                <input type="checkbox" class="filter-checkbox" value="Y" name="arrSmartFilter_279_2658551721" id="arrSmartFilter_279_2658551721" onclick="smartFilter.click(this)">
                                                <label for="arrSmartFilter_279_2658551721">65</label>
                                            </div>
                                            <div class="wrapp-checkbox">
                                                <input type="checkbox" class="filter-checkbox" value="Y" name="arrSmartFilter_279_4144464487" id="arrSmartFilter_279_4144464487" onclick="smartFilter.click(this)">
                                                <label for="arrSmartFilter_279_4144464487">70</label>
                                            </div>
                                            <div class="wrapp-checkbox">
                                                <input type="checkbox" class="filter-checkbox" value="Y" name="arrSmartFilter_279_1889509032" id="arrSmartFilter_279_1889509032" onclick="smartFilter.click(this)">
                                                <label for="arrSmartFilter_279_1889509032">80</label>
                                            </div>
                                        </div><div id="mCSB_1_scrollbar_vertical" class="mCSB_scrollTools mCSB_1_scrollbar mCS-dark mCSB_scrollTools_vertical" style="display: none;"><div class="mCSB_draggerContainer"><div id="mCSB_1_dragger_vertical" class="mCSB_dragger" style="position: absolute; min-height: 30px; top: 0px;"><div class="mCSB_dragger_bar" style="line-height: 30px;"></div></div><div class="mCSB_draggerRail"></div></div></div></div></div>
                            </div>
                        </div>
                        <div class="btn-catalog-filter">
                           <span class="apply-filter">
                                <button class="btn-site1" id="set_filter" type="button">
                                    <span class="btn-trans">Применить</span>
                                    <span class="btn-anim">Применить</span>
                                </button>
                           </span>
                            <button class="clear-filter" id="del_filter" type="button">Очистить</button>
                        </div>
                        <div style="display:none">
                            <div id="modef">
                                <span id="modef_num">0</span>
                                <a href="/catalog/sadovaya_tehnika/gazonokosilki/benzinovye/filter/clear/apply/" target="">Показать</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div id="comp_58c2b0d099b0be352043fe9df5801a7a"><div class="wrapp-list-catalog-items" id="wrap_news_58c2b0d099b0be352043fe9df5801a7a">
                <div class="container">
                    <div class="list-catalog-items">
                        <div class="item">
                            <div class="img-item">
                                <a href="/catalog/item/gazonokosilka_benzinovaya_deworks_l_43p/"><img src="/upload/resize_cache/iblock/620/375_415_2/gjxfkwsokraxrvrlmvcwwb7pw46l1rnp.jpg" alt="Газонокосилка бензиновая DeWORKS L 43P"></a>
                                <div class="sticker">
                                    <div class="sticker-novelty">
                                        <span>Новинка</span>
                                    </div>
                                </div>
                            </div>
                            <div class="info-item">
                                <div class="wrapp-name-item">
                                    <div class="name-item"><a href="/catalog/item/gazonokosilka_benzinovaya_deworks_l_43p/">Газонокосилка бензиновая DeWORKS L 43P</a>
                                    </div>
                                    <div class="icon-item">
                                        <a title="В сравнение" class="add-to-compare " onclick="addToCompare(event, 4891, '/catalog/item/gazonokosilka_benzinovaya_deworks_l_43p/')" data-id="4891"></a>
                                        <a title="В избранное" class="add-to-favorites " onclick="addToFavs(event, 4891)" data-id="4891"></a>
                                    </div>
                                </div>
                                <div class="table-item">
                                    <div class="left-table-item">
                                        <div class="characteristics-item characteristics-item4">
                                            <div class="characheristic">
                                                <div class="name-characheristic">Мощность (л.с.)</div>
                                                <div class="value-characheristic">4.5</div>
                                            </div>
                                            <div class="characheristic">
                                                <div class="name-characheristic">Объем двигателя (см3)</div>
                                                <div class="value-characheristic">145</div>
                                            </div>
                                            <div class="characheristic">
                                                <div class="name-characheristic">Емкость топливного бака (л)</div>
                                                <div class="value-characheristic">0,8</div>
                                            </div>
                                            <div class="characheristic">
                                                <div class="name-characheristic">Высота кошения (мм)</div>
                                                <div class="value-characheristic">25-75</div>
                                            </div>
                                            <div class="characheristic">
                                                <div class="name-characheristic">Ширина кошения (мм)</div>
                                                <div class="value-characheristic">420</div>
                                            </div>
                                            <div class="characheristic">
                                                <div class="name-characheristic">Объем травосборника (л)</div>
                                                <div class="value-characheristic">55</div>
                                            </div>
                                        </div>
                                        <div class="more-info-item">
                                            <a href="/catalog/item/gazonokosilka_benzinovaya_deworks_l_43p/">Подробнее...</a>
                                        </div>
                                    </div>
                                    <div class="right-table-item ">
                                        <div class="wrapp-available">
                                            <div class="in-avialable">
                                                <img src="/local/templates/czebra_daewoo/front/img/in-avialable.svg" alt="">
                                                <span>В наличии</span>
                                            </div>
                                            <div class="avialable-magazine">
                                                <img src="/local/templates/czebra_daewoo/front/img/magazine.svg" alt="">

                                                <a href="#" id="btn_form_FORM_AVAILABILITY_SECTION4891" data-form="eJx9UtlOwzAQ%2FJXg5wqliXuQN9dZWoskDo5TUQGy0jSVyiGkChCH%2BHccOyVWK%2FGyWu%2FO2rPj%2BUa54HFJJYrw9GI4QIRKtgQUoQwN0CUXqWKxPpmMLAlLyIwlTK5UARrJs3ZKI9ks4fTKYsNRX5CrvL1s2zSbdVU%2F6kZazNVMZrp49%2BbjYdNGHLQx3JrcN7mNtj7tMbjWV2QkBZXzQipYQqapI13Ue%2BQgNDHKYyhQdIvyBc%2Bgg1uAWfT%2BGKsEXJdMQKzoAujVjN%2Fo6X9QkGoZLESALEWmSpFYEmUBQqVQFGQOisRxt2Uw7Pezm%2BFhv1lo8%2BbMM4psHNTUlMLaxJGJGyfHJo77CvY953ar2PYEFPQYvO0G7NuBo719tGMQeA7TtcN97ExcWM4OwZHnEPGdRm0fP7eaKUpySReks92SJCwmElr5VvosmUzgIGVo5ieOFr5rD%2B%2B44bLFE4d561JK9JcfTEpOXPT35%2Fa3D2Z%2B2T%2B3szzNtcEyqYzBIlR%2FNet9FXVtCWme6CUO3eq92j1V693T7vVTVQ%2FVB%2Fr5BUNH9Fo%3D">Наличие в магазинах</a>
                                            </div>
                                        </div>
                                        <div class="rate-item">
                                            <div class="rate">
                                                <div class="rating-container rating-md rating-animate rating-disabled"><div class="clear-rating " title="Clear"><i class="glyphicon glyphicon-minus-sign"></i></div><div class="rating-stars" title="Not Rated"><span class="empty-stars"><span class="star"><i class="glyphicon glyphicon-star-empty"></i></span><span class="star"><i class="glyphicon glyphicon-star-empty"></i></span><span class="star"><i class="glyphicon glyphicon-star-empty"></i></span><span class="star"><i class="glyphicon glyphicon-star-empty"></i></span><span class="star"><i class="glyphicon glyphicon-star-empty"></i></span></span><span class="filled-stars" style="width: 0%;"><span class="star"><i class="glyphicon glyphicon-star"></i></span><span class="star"><i class="glyphicon glyphicon-star"></i></span><span class="star"><i class="glyphicon glyphicon-star"></i></span><span class="star"><i class="glyphicon glyphicon-star"></i></span><span class="star"><i class="glyphicon glyphicon-star"></i></span></span><input class="input-rating rating-input" name="input-name" type="number" style="display: none" value="0" disabled="disabled"></div></div>
                                            </div>
                                            <a href="/catalog/item/gazonokosilka_benzinovaya_deworks_l_43p/?reviews=Y" class="count-reviews">0 отзывов</a>
                                        </div>
                                        <div class="block-price block-price4">
                                            <div class="old-price">
                                                <div class="percent">
                                                    -11%</div>
                                                <div class="value-old-price">18&nbsp;990 <span class="rubl">i</span></div>
                                            </div>
                                            <div class="price-item">16&nbsp;990 <span class="rubl">i</span></div>

                                        </div>
                                        <div class="wrapp-delivery-item">
                                            <div class="delivery-item">
                                                <img src="/local/templates/czebra_daewoo/front/img/delivery-item.svg" alt="">
                                                <a href="/delivery/">Доставка</a>
                                            </div>
                                            <div class="date-delivery">Завтра, 13.07</div>
                                        </div>
                                        <div class="wrapp-pickup-item">
                                            <div class="pickup-item">
                                                <img src="/local/templates/czebra_daewoo/front/img/pickup.svg" alt="">
                                                <a href="/delivery/">Самовывоз</a>
                                            </div>
                                            <div class="date-pickup">Сегодня, 12.07</div>
                                        </div>

                                        <div class="btn-item">
                                     <span class="add-to-cart-item">
                                         <a href="#" class="btn-site1" data-czaction="addtocart" data-czbuy="4891">
                                             <span class="btn-trans">Купить</span>
                                             <span class="btn-anim">Купить</span>
                                         </a>
                                     </span>
                                            <span class="quick-order-item">
                                        <a href="#" class="btn-site1" onclick="quickOrder(event, '4891')">
                                        <span class="btn-trans">Быстрый заказ</span>
                                        <span class="btn-anim">Быстрый заказ</span>
                                        </a>
                                    </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="item">
                            <div class="img-item">
                                <a href="/catalog/item/gazonokosilka_benzinovaya_deworks_l_48sp/"><img src="/upload/resize_cache/iblock/f04/375_415_2/se587hxw1nspqskptnco9a02n7hyjls7.jpg" alt="Газонокосилка бензиновая DeWORKS L 48SP"></a>
                                <div class="sticker">
                                    <div class="sticker-novelty">
                                        <span>Новинка</span>
                                    </div>
                                </div>
                            </div>
                            <div class="info-item">
                                <div class="wrapp-name-item">
                                    <div class="name-item"><a href="/catalog/item/gazonokosilka_benzinovaya_deworks_l_48sp/">Газонокосилка бензиновая DeWORKS L 48SP</a>
                                    </div>
                                    <div class="icon-item">
                                        <a title="В сравнение" class="add-to-compare " onclick="addToCompare(event, 4892, '/catalog/item/gazonokosilka_benzinovaya_deworks_l_48sp/')" data-id="4892"></a>
                                        <a title="В избранное" class="add-to-favorites " onclick="addToFavs(event, 4892)" data-id="4892"></a>
                                    </div>
                                </div>
                                <div class="table-item">
                                    <div class="left-table-item">
                                        <div class="characteristics-item characteristics-item4">
                                            <div class="characheristic">
                                                <div class="name-characheristic">Мощность (л.с.)</div>
                                                <div class="value-characheristic">4.5</div>
                                            </div>
                                            <div class="characheristic">
                                                <div class="name-characheristic">Объем двигателя (см3)</div>
                                                <div class="value-characheristic">145</div>
                                            </div>
                                            <div class="characheristic">
                                                <div class="name-characheristic">Емкость топливного бака (л)</div>
                                                <div class="value-characheristic">0,8</div>
                                            </div>
                                            <div class="characheristic">
                                                <div class="name-characheristic">Высота кошения (мм)</div>
                                                <div class="value-characheristic">25-75</div>
                                            </div>
                                            <div class="characheristic">
                                                <div class="name-characheristic">Ширина кошения (мм)</div>
                                                <div class="value-characheristic">480</div>
                                            </div>
                                            <div class="characheristic">
                                                <div class="name-characheristic">Объем травосборника (л)</div>
                                                <div class="value-characheristic">65</div>
                                            </div>
                                        </div>
                                        <div class="more-info-item">
                                            <a href="/catalog/item/gazonokosilka_benzinovaya_deworks_l_48sp/">Подробнее...</a>
                                        </div>
                                    </div>
                                    <div class="right-table-item ">
                                        <div class="wrapp-available">
                                            <div class="in-avialable">
                                                <img src="/local/templates/czebra_daewoo/front/img/in-avialable.svg" alt="">
                                                <span>В наличии</span>
                                            </div>
                                            <div class="avialable-magazine">
                                                <img src="/local/templates/czebra_daewoo/front/img/magazine.svg" alt="">

                                                <a href="#" id="btn_form_FORM_AVAILABILITY_SECTION4892" data-form="eJx9UtlOwzAQ%2FJXg5wqliXuQN9dZWoskDo5TUQGy0jSVyiGkChCH%2BHccOyVWK%2FGyWu%2FO2rPj%2BUa54HFJJYrw9CIYIEIlWwKKUIYG6JKLVLFYn0xGloQlZMYSJleqAI3kWTulkWyWcHplseGoL8hV3l62bZrNuqofdSMt5momM128e%2FPxsGkjDtoYbk3um9xGW5%2F2GFzrKzKSgsp5IRUsIdPUkS7qPXIQmhjlMRQoukX5gmfQwS3ALHp%2FjFUCrksmIFZ0AfRqxm%2F09D8oSLUMFiJAliJTpUgsibIAoVIoCjIHReK42zIY9vvZzfCw3yy0eXPmGUU2DmpqSmFt4sjEjZNjE8d9Bfuec7tVbHsCCnoM3nYD9u3A0d4%2B2jEIPIfp2uE%2BdiYuLGeH4MhziPhOo7aPn1vNFCW5pAvS2W5JEhYTCa18K32WTCZwkDI08xNHC9%2B1h3fccNniicO8dSkl%2BssPJiUnLvr7c%2FvbBzO%2F7J%2FbWZ7m2mCZVMZgEaq%2FmvW%2Birq2hDRP9BKHbvVe7Z6q9e5p9%2FqpqofqA%2F38Aknv9Fw%3D">Наличие в магазинах</a>
                                            </div>
                                        </div>
                                        <div class="rate-item">
                                            <div class="rate">
                                                <div class="rating-container rating-md rating-animate rating-disabled"><div class="clear-rating " title="Clear"><i class="glyphicon glyphicon-minus-sign"></i></div><div class="rating-stars" title="Five Stars"><span class="empty-stars"><span class="star"><i class="glyphicon glyphicon-star-empty"></i></span><span class="star"><i class="glyphicon glyphicon-star-empty"></i></span><span class="star"><i class="glyphicon glyphicon-star-empty"></i></span><span class="star"><i class="glyphicon glyphicon-star-empty"></i></span><span class="star"><i class="glyphicon glyphicon-star-empty"></i></span></span><span class="filled-stars" style="width: 100%;"><span class="star"><i class="glyphicon glyphicon-star"></i></span><span class="star"><i class="glyphicon glyphicon-star"></i></span><span class="star"><i class="glyphicon glyphicon-star"></i></span><span class="star"><i class="glyphicon glyphicon-star"></i></span><span class="star"><i class="glyphicon glyphicon-star"></i></span></span><input class="input-rating rating-input" name="input-name" type="number" style="display: none" value="5" disabled="disabled"></div></div>
                                            </div>
                                            <a href="/catalog/item/gazonokosilka_benzinovaya_deworks_l_48sp/?reviews=Y" class="count-reviews">1 отзывов</a>
                                        </div>
                                        <div class="block-price block-price4">
                                            <div class="old-price">
                                                <div class="percent">
                                                    -14%</div>
                                                <div class="value-old-price">22&nbsp;990 <span class="rubl">i</span></div>
                                            </div>
                                            <div class="price-item">19&nbsp;990 <span class="rubl">i</span></div>

                                        </div>
                                        <div class="wrapp-delivery-item">
                                            <div class="delivery-item">
                                                <img src="/local/templates/czebra_daewoo/front/img/delivery-item.svg" alt="">
                                                <a href="/delivery/">Доставка</a>
                                            </div>
                                            <div class="date-delivery">Завтра, 13.07</div>
                                        </div>
                                        <div class="wrapp-pickup-item">
                                            <div class="pickup-item">
                                                <img src="/local/templates/czebra_daewoo/front/img/pickup.svg" alt="">
                                                <a href="/delivery/">Самовывоз</a>
                                            </div>
                                            <div class="date-pickup">Сегодня, 12.07</div>
                                        </div>

                                        <div class="btn-item">
                                     <span class="add-to-cart-item">
                                         <a href="#" class="btn-site1" data-czaction="addtocart" data-czbuy="4892">
                                             <span class="btn-trans">Купить</span>
                                             <span class="btn-anim">Купить</span>
                                         </a>
                                     </span>
                                            <span class="quick-order-item">
                                        <a href="#" class="btn-site1" onclick="quickOrder(event, '4892')">
                                        <span class="btn-trans">Быстрый заказ</span>
                                        <span class="btn-anim">Быстрый заказ</span>
                                        </a>
                                    </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="item">
                            <div class="img-item">
                                <a href="/catalog/item/gazonokosilka_benzinovaya_daewoo_dlm_48sp_2020/"><img src="/upload/resize_cache/iblock/872/375_415_2/jx9ia9o9h6y9otkfy6owo848k9v8nqqy.jpg" alt="Газонокосилка бензиновая DAEWOO DLM 48SP"></a>
                                <div class="sticker">
                                    <div class="sticker-novelty">
                                        <span>Новинка</span>
                                    </div>
                                </div>
                            </div>
                            <div class="info-item">
                                <div class="wrapp-name-item">
                                    <div class="name-item"><a href="/catalog/item/gazonokosilka_benzinovaya_daewoo_dlm_48sp_2020/">Газонокосилка бензиновая DAEWOO DLM 48SP</a>
                                    </div>
                                    <div class="icon-item">
                                        <a title="В сравнение" class="add-to-compare " onclick="addToCompare(event, 1737, '/catalog/item/gazonokosilka_benzinovaya_daewoo_dlm_48sp_2020/')" data-id="1737"></a>
                                        <a title="В избранное" class="add-to-favorites " onclick="addToFavs(event, 1737)" data-id="1737"></a>
                                    </div>
                                </div>
                                <div class="table-item">
                                    <div class="left-table-item">
                                        <div class="characteristics-item characteristics-item4">
                                            <div class="characheristic">
                                                <div class="name-characheristic">Мощность (л.с.)</div>
                                                <div class="value-characheristic">4,5</div>
                                            </div>
                                            <div class="characheristic">
                                                <div class="name-characheristic">Объем двигателя (см3)</div>
                                                <div class="value-characheristic">145</div>
                                            </div>
                                            <div class="characheristic">
                                                <div class="name-characheristic">Емкость топливного бака (л)</div>
                                                <div class="value-characheristic">0,8</div>
                                            </div>
                                            <div class="characheristic">
                                                <div class="name-characheristic">Высота кошения (мм)</div>
                                                <div class="value-characheristic">25-75</div>
                                            </div>
                                            <div class="characheristic">
                                                <div class="name-characheristic">Ширина кошения (мм)</div>
                                                <div class="value-characheristic">480</div>
                                            </div>
                                            <div class="characheristic">
                                                <div class="name-characheristic">Объем травосборника (л)</div>
                                                <div class="value-characheristic">65</div>
                                            </div>
                                        </div>
                                        <div class="more-info-item">
                                            <a href="/catalog/item/gazonokosilka_benzinovaya_daewoo_dlm_48sp_2020/">Подробнее...</a>
                                        </div>
                                    </div>
                                    <div class="right-table-item ">
                                        <div class="wrapp-available">
                                            <div class="in-avialable">
                                                <img src="/local/templates/czebra_daewoo/front/img/in-avialable.svg" alt="">
                                                <span>В наличии</span>
                                            </div>
                                            <div class="avialable-magazine">
                                                <img src="/local/templates/czebra_daewoo/front/img/magazine.svg" alt="">

                                                <a href="#" id="btn_form_FORM_AVAILABILITY_SECTION1737" data-form="eJx9Ul1PgzAU%2FSvY58UwYB%2Fy1pXr1gwolrK4qGkYY8l0xmRR40f875YWpNkSX25u7z23Pff0fKOMs6ggAoXDiT8ZIEwEXQEKUYoG6JrxRNJInXSGV5jGeEZjKtYyB4VkaTOlkHQWM7I0WH%2FUF8Q6ay7b1fV2U1ZPqpHkczkTqSrev7nBsG5i4DXR3%2Bnc1bmJpj7tMUGlrkhxAjJjuZCwglRRR6qo9siAK2KERZCj8A5lC5ZCCzcAvejDKVZyuCkoh0iSBZDljN2q6X9QkCgZDISDKHgqCx4bEkUOXCaQ53gOEkdRu6U37PczmwXDfjPf5PWFoxXZWqipLvmVjiMdt1Ye6DjuK4HrWLcbxXZnIK%2FHBLt2wLztWdqbR1sGnmMx3Vjcx9bEleFsERw5FhHXalTm8UujmSQ4E2SBW9utcEwjLKCRb63OgooYOil9PT%2BxtHBtezinDZttMLGYNy4lWH15Z1J85qK%2FPze%2F3Zn55fjczLIkUwZLhdQGC1H1VW%2BOZdi2BSRZrJbouuV7uT%2BUm%2F1h%2F%2Fopy8fyA%2F38AiiF9FI%3D">Наличие в магазинах</a>
                                            </div>
                                        </div>
                                        <div class="rate-item">
                                            <div class="rate">
                                                <div class="rating-container rating-md rating-animate rating-disabled"><div class="clear-rating " title="Clear"><i class="glyphicon glyphicon-minus-sign"></i></div><div class="rating-stars" title="4.8 Stars"><span class="empty-stars"><span class="star"><i class="glyphicon glyphicon-star-empty"></i></span><span class="star"><i class="glyphicon glyphicon-star-empty"></i></span><span class="star"><i class="glyphicon glyphicon-star-empty"></i></span><span class="star"><i class="glyphicon glyphicon-star-empty"></i></span><span class="star"><i class="glyphicon glyphicon-star-empty"></i></span></span><span class="filled-stars" style="width: 96.6667%;"><span class="star"><i class="glyphicon glyphicon-star"></i></span><span class="star"><i class="glyphicon glyphicon-star"></i></span><span class="star"><i class="glyphicon glyphicon-star"></i></span><span class="star"><i class="glyphicon glyphicon-star"></i></span><span class="star"><i class="glyphicon glyphicon-star"></i></span></span><input class="input-rating rating-input" name="input-name" type="number" style="display: none" value="4.8333333333333" disabled="disabled"></div></div>
                                            </div>
                                            <a href="/catalog/item/gazonokosilka_benzinovaya_daewoo_dlm_48sp_2020/?reviews=Y" class="count-reviews">12 отзывов</a>
                                        </div>
                                        <div class="block-price block-price4">
                                            <div class="price-item">24&nbsp;990 <span class="rubl">i</span></div>

                                        </div>
                                        <div class="wrapp-delivery-item">
                                            <div class="delivery-item">
                                                <img src="/local/templates/czebra_daewoo/front/img/delivery-item.svg" alt="">
                                                <a href="/delivery/">Доставка</a>
                                            </div>
                                            <div class="date-delivery">Завтра, 13.07</div>
                                        </div>
                                        <div class="wrapp-pickup-item">
                                            <div class="pickup-item">
                                                <img src="/local/templates/czebra_daewoo/front/img/pickup.svg" alt="">
                                                <a href="/delivery/">Самовывоз</a>
                                            </div>
                                            <div class="date-pickup">Сегодня, 12.07</div>
                                        </div>

                                        <div class="btn-item">
                                     <span class="add-to-cart-item">
                                         <a href="#" class="btn-site1" data-czaction="addtocart" data-czbuy="1737">
                                             <span class="btn-trans">Купить</span>
                                             <span class="btn-anim">Купить</span>
                                         </a>
                                     </span>
                                            <span class="quick-order-item">
                                        <a href="#" class="btn-site1" onclick="quickOrder(event, '1737')">
                                        <span class="btn-trans">Быстрый заказ</span>
                                        <span class="btn-anim">Быстрый заказ</span>
                                        </a>
                                    </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="item">
                            <div class="img-item">
                                <a href="/catalog/item/gazonokosilka_benzinovaya_deworks_l_50sp/"><img src="/upload/resize_cache/iblock/8d2/375_415_2/kyih5hh7z7usbttmyz02l61jqeqiikc2.jpg" alt="Газонокосилка бензиновая DeWORKS L 50SP"></a>
                                <div class="sticker">
                                    <div class="sticker-novelty">
                                        <span>Новинка</span>
                                    </div>
                                </div>
                            </div>
                            <div class="info-item">
                                <div class="wrapp-name-item">
                                    <div class="name-item"><a href="/catalog/item/gazonokosilka_benzinovaya_deworks_l_50sp/">Газонокосилка бензиновая DeWORKS L 50SP</a>
                                    </div>
                                    <div class="icon-item">
                                        <a title="В сравнение" class="add-to-compare " onclick="addToCompare(event, 4894, '/catalog/item/gazonokosilka_benzinovaya_deworks_l_50sp/')" data-id="4894"></a>
                                        <a title="В избранное" class="add-to-favorites " onclick="addToFavs(event, 4894)" data-id="4894"></a>
                                    </div>
                                </div>
                                <div class="table-item">
                                    <div class="left-table-item">
                                        <div class="characteristics-item characteristics-item4">
                                            <div class="characheristic">
                                                <div class="name-characheristic">Мощность (л.с.)</div>
                                                <div class="value-characheristic">5</div>
                                            </div>
                                            <div class="characheristic">
                                                <div class="name-characheristic">Объем двигателя (см3)</div>
                                                <div class="value-characheristic">155</div>
                                            </div>
                                            <div class="characheristic">
                                                <div class="name-characheristic">Емкость топливного бака (л)</div>
                                                <div class="value-characheristic">0,8</div>
                                            </div>
                                            <div class="characheristic">
                                                <div class="name-characheristic">Высота кошения (мм)</div>
                                                <div class="value-characheristic">25-75</div>
                                            </div>
                                            <div class="characheristic">
                                                <div class="name-characheristic">Ширина кошения (мм)</div>
                                                <div class="value-characheristic">480</div>
                                            </div>
                                            <div class="characheristic">
                                                <div class="name-characheristic">Объем травосборника (л)</div>
                                                <div class="value-characheristic">65</div>
                                            </div>
                                        </div>
                                        <div class="more-info-item">
                                            <a href="/catalog/item/gazonokosilka_benzinovaya_deworks_l_50sp/">Подробнее...</a>
                                        </div>
                                    </div>
                                    <div class="right-table-item ">
                                        <div class="wrapp-available">
                                            <div class="in-avialable">
                                                <img src="/local/templates/czebra_daewoo/front/img/in-avialable.svg" alt="">
                                                <span>В наличии</span>
                                            </div>
                                            <div class="avialable-magazine">
                                                <img src="/local/templates/czebra_daewoo/front/img/magazine.svg" alt="">

                                                <a href="#" id="btn_form_FORM_AVAILABILITY_SECTION4894" data-form="eJx9UtlOwzAQ%2FJXg5wqliXuQN9dZWoskDo5TUQGy0jSVyiGkChCH%2BHccOyVWK%2FGyWu%2FO2rPj%2BUa54HFJJYrw9AIPEKGSLQFFKEMDdMlFqlisTyYjS8ISMmMJkytVgEbyrJ3SSDZLOL2y2HDUF%2BQqby%2FbNs1mXdWPupEWczWTmS7evfl42LQRB20Mtyb3TW6jrU97DK71FRlJQeW8kAqWkGnqSBf1HjkITYzyGAoU3aJ8wTPo4BZgFr0%2FxioB1yUTECu6AHo14zd6%2Bh8UpFoGCxEgS5GpUiSWRFmAUCkUBZmDInHcbRkM%2B%2F3sZnjYbxbavDnzjCIbBzU1pbA2cWTixsmxieO%2Bgn3Pud0qtj0BBT0Gb7sB%2B3bgaG8f7RgEnsN07XAfOxMXlrNDcOQ5RHynUdvHz61mipJc0gXpbLckCYuJhFa%2BlT5LJhM4SBma%2BYmjhe%2FawztuuGzxxGHeupQS%2FeUHk5ITF%2F39uf3tg5lf9s%2FtLE9zbbBMKmOwCNVfzXpfRV1bQponeolDt3qvdk%2FVeve0e%2F1U1UP1gX5%2BAVc%2F9GA%3D">Наличие в магазинах</a>
                                            </div>
                                        </div>
                                        <div class="rate-item">
                                            <div class="rate">
                                                <div class="rating-container rating-md rating-animate rating-disabled"><div class="clear-rating " title="Clear"><i class="glyphicon glyphicon-minus-sign"></i></div><div class="rating-stars" title="Not Rated"><span class="empty-stars"><span class="star"><i class="glyphicon glyphicon-star-empty"></i></span><span class="star"><i class="glyphicon glyphicon-star-empty"></i></span><span class="star"><i class="glyphicon glyphicon-star-empty"></i></span><span class="star"><i class="glyphicon glyphicon-star-empty"></i></span><span class="star"><i class="glyphicon glyphicon-star-empty"></i></span></span><span class="filled-stars" style="width: 0%;"><span class="star"><i class="glyphicon glyphicon-star"></i></span><span class="star"><i class="glyphicon glyphicon-star"></i></span><span class="star"><i class="glyphicon glyphicon-star"></i></span><span class="star"><i class="glyphicon glyphicon-star"></i></span><span class="star"><i class="glyphicon glyphicon-star"></i></span></span><input class="input-rating rating-input" name="input-name" type="number" style="display: none" value="0" disabled="disabled"></div></div>
                                            </div>
                                            <a href="/catalog/item/gazonokosilka_benzinovaya_deworks_l_50sp/?reviews=Y" class="count-reviews">0 отзывов</a>
                                        </div>
                                        <div class="block-price block-price4">
                                            <div class="price-item">25&nbsp;990 <span class="rubl">i</span></div>

                                        </div>
                                        <div class="wrapp-delivery-item">
                                            <div class="delivery-item">
                                                <img src="/local/templates/czebra_daewoo/front/img/delivery-item.svg" alt="">
                                                <a href="/delivery/">Доставка</a>
                                            </div>
                                            <div class="date-delivery">Завтра, 13.07</div>
                                        </div>
                                        <div class="wrapp-pickup-item">
                                            <div class="pickup-item">
                                                <img src="/local/templates/czebra_daewoo/front/img/pickup.svg" alt="">
                                                <a href="/delivery/">Самовывоз</a>
                                            </div>
                                            <div class="date-pickup">Сегодня, 12.07</div>
                                        </div>

                                        <div class="btn-item">
                                     <span class="add-to-cart-item">
                                         <a href="#" class="btn-site1" data-czaction="addtocart" data-czbuy="4894">
                                             <span class="btn-trans">Купить</span>
                                             <span class="btn-anim">Купить</span>
                                         </a>
                                     </span>
                                            <span class="quick-order-item">
                                        <a href="#" class="btn-site1" onclick="quickOrder(event, '4894')">
                                        <span class="btn-trans">Быстрый заказ</span>
                                        <span class="btn-anim">Быстрый заказ</span>
                                        </a>
                                    </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="item">
                            <div class="img-item">
                                <a href="/catalog/item/gazonokosilka_benzinovaya_daewoo_dlm_50sp/"><img src="/upload/resize_cache/iblock/a3a/375_415_2/t4l1pnfyzsr7wiznnh1rzbc1qfb8ul3q.jpg" alt="Газонокосилка бензиновая DAEWOO DLM 50SP"></a>
                                <div class="sticker">
                                    <div class="sticker-novelty">
                                        <span>Новинка</span>
                                    </div>
                                </div>
                            </div>
                            <div class="info-item">
                                <div class="wrapp-name-item">
                                    <div class="name-item"><a href="/catalog/item/gazonokosilka_benzinovaya_daewoo_dlm_50sp/">Газонокосилка бензиновая DAEWOO DLM 50SP</a>
                                    </div>
                                    <div class="icon-item">
                                        <a title="В сравнение" class="add-to-compare " onclick="addToCompare(event, 1815, '/catalog/item/gazonokosilka_benzinovaya_daewoo_dlm_50sp/')" data-id="1815"></a>
                                        <a title="В избранное" class="add-to-favorites " onclick="addToFavs(event, 1815)" data-id="1815"></a>
                                    </div>
                                </div>
                                <div class="table-item">
                                    <div class="left-table-item">
                                        <div class="characteristics-item characteristics-item4">
                                            <div class="characheristic">
                                                <div class="name-characheristic">Мощность (л.с.)</div>
                                                <div class="value-characheristic">5</div>
                                            </div>
                                            <div class="characheristic">
                                                <div class="name-characheristic">Объем двигателя (см3)</div>
                                                <div class="value-characheristic">155</div>
                                            </div>
                                            <div class="characheristic">
                                                <div class="name-characheristic">Емкость топливного бака (л)</div>
                                                <div class="value-characheristic">1</div>
                                            </div>
                                            <div class="characheristic">
                                                <div class="name-characheristic">Высота кошения (мм)</div>
                                                <div class="value-characheristic">25-75</div>
                                            </div>
                                            <div class="characheristic">
                                                <div class="name-characheristic">Ширина кошения (мм)</div>
                                                <div class="value-characheristic">480</div>
                                            </div>
                                            <div class="characheristic">
                                                <div class="name-characheristic">Объем травосборника (л)</div>
                                                <div class="value-characheristic">65</div>
                                            </div>
                                        </div>
                                        <div class="more-info-item">
                                            <a href="/catalog/item/gazonokosilka_benzinovaya_daewoo_dlm_50sp/">Подробнее...</a>
                                        </div>
                                    </div>
                                    <div class="right-table-item ">
                                        <div class="wrapp-available">
                                            <div class="in-avialable">
                                                <img src="/local/templates/czebra_daewoo/front/img/in-avialable.svg" alt="">
                                                <span>В наличии</span>
                                            </div>
                                            <div class="avialable-magazine">
                                                <img src="/local/templates/czebra_daewoo/front/img/magazine.svg" alt="">

                                                <a href="#" id="btn_form_FORM_AVAILABILITY_SECTION1815" data-form="eJx9UtlOwzAQ%2FJXg5wrl6kHeXGdprSZxcJyKCpCVpqlUKEKqAHGIf8exU2K1Ei%2Br9e6sPTueb5RzFpdEoMibeMMBwkTQJaAIZWiArhlPJY3VSWd4iWmCpzShYiULUEiWtVMKSacJIwuDDayCWOXtZdum2ayr%2Bkk10mImpyJTxfs3N%2FSaNoZ%2BG4Otzl2dm2jqkx4T1uqKDKcgc1YICUvIFHWkimqPHLgiRlgMBYruUD5nGXRwA9CLPpxiJYebknKIJZkDWUzZrZr%2BBwWpksFAOIiSZ7LkiSFRFsBlCkWBZyBxHHdb%2Bl6%2Fn9ks9PrNApM3F45WZGOhJroU1DoOddxYeajjqK%2BErmPdbhTbnoH8HhNuuwHztm9pbx7tGPiOxXRtcR9ZE1eGs0Vw6FhEXKtRm8cvjWaS4FyQOe5st8QJjbGAVr6VOgsqEjhKGej5saWFa9vDOW3YbMOxxbx1KcHqy48mxWcu%2Bvtz89tHM78cnttZlubKYJmQ2mARqr%2Ba9aGKuraANE%2FUEsdu9V7t9tV6t9%2B9fsrqsfpAP78UjfRM">Наличие в магазинах</a>
                                            </div>
                                        </div>
                                        <div class="rate-item">
                                            <div class="rate">
                                                <div class="rating-container rating-md rating-animate rating-disabled"><div class="clear-rating " title="Clear"><i class="glyphicon glyphicon-minus-sign"></i></div><div class="rating-stars" title="Not Rated"><span class="empty-stars"><span class="star"><i class="glyphicon glyphicon-star-empty"></i></span><span class="star"><i class="glyphicon glyphicon-star-empty"></i></span><span class="star"><i class="glyphicon glyphicon-star-empty"></i></span><span class="star"><i class="glyphicon glyphicon-star-empty"></i></span><span class="star"><i class="glyphicon glyphicon-star-empty"></i></span></span><span class="filled-stars" style="width: 0%;"><span class="star"><i class="glyphicon glyphicon-star"></i></span><span class="star"><i class="glyphicon glyphicon-star"></i></span><span class="star"><i class="glyphicon glyphicon-star"></i></span><span class="star"><i class="glyphicon glyphicon-star"></i></span><span class="star"><i class="glyphicon glyphicon-star"></i></span></span><input class="input-rating rating-input" name="input-name" type="number" style="display: none" value="0" disabled="disabled"></div></div>
                                            </div>
                                            <a href="/catalog/item/gazonokosilka_benzinovaya_daewoo_dlm_50sp/?reviews=Y" class="count-reviews">0 отзывов</a>
                                        </div>
                                        <div class="block-price block-price4">
                                            <div class="price-item">28&nbsp;990 <span class="rubl">i</span></div>

                                        </div>
                                        <div class="wrapp-delivery-item">
                                            <div class="delivery-item">
                                                <img src="/local/templates/czebra_daewoo/front/img/delivery-item.svg" alt="">
                                                <a href="/delivery/">Доставка</a>
                                            </div>
                                            <div class="date-delivery">Завтра, 13.07</div>
                                        </div>
                                        <div class="wrapp-pickup-item">
                                            <div class="pickup-item">
                                                <img src="/local/templates/czebra_daewoo/front/img/pickup.svg" alt="">
                                                <a href="/delivery/">Самовывоз</a>
                                            </div>
                                            <div class="date-pickup">Сегодня, 12.07</div>
                                        </div>

                                        <div class="btn-item">
                                     <span class="add-to-cart-item">
                                         <a href="#" class="btn-site1" data-czaction="addtocart" data-czbuy="1815">
                                             <span class="btn-trans">Купить</span>
                                             <span class="btn-anim">Купить</span>
                                         </a>
                                     </span>
                                            <span class="quick-order-item">
                                        <a href="#" class="btn-site1" onclick="quickOrder(event, '1815')">
                                        <span class="btn-trans">Быстрый заказ</span>
                                        <span class="btn-anim">Быстрый заказ</span>
                                        </a>
                                    </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="item">
                            <div class="img-item">
                                <a href="/catalog/item/gazonokosilka_benzinovaya_deworks_l_50sv/"><img src="/upload/resize_cache/iblock/f6b/375_415_2/roz8fq2cjnkq6p4wzkcunz23ogfhzebb.jpg" alt="Газонокосилка бензиновая DeWORKS L 50SV"></a>
                                <div class="sticker">
                                    <div class="sticker-novelty">
                                        <span>Новинка</span>
                                    </div>
                                </div>
                            </div>
                            <div class="info-item">
                                <div class="wrapp-name-item">
                                    <div class="name-item"><a href="/catalog/item/gazonokosilka_benzinovaya_deworks_l_50sv/">Газонокосилка бензиновая DeWORKS L 50SV</a>
                                    </div>
                                    <div class="icon-item">
                                        <a title="В сравнение" class="add-to-compare " onclick="addToCompare(event, 4895, '/catalog/item/gazonokosilka_benzinovaya_deworks_l_50sv/')" data-id="4895"></a>
                                        <a title="В избранное" class="add-to-favorites " onclick="addToFavs(event, 4895)" data-id="4895"></a>
                                    </div>
                                </div>
                                <div class="table-item">
                                    <div class="left-table-item">
                                        <div class="characteristics-item characteristics-item4">
                                            <div class="characheristic">
                                                <div class="name-characheristic">Мощность (л.с.)</div>
                                                <div class="value-characheristic">5</div>
                                            </div>
                                            <div class="characheristic">
                                                <div class="name-characheristic">Объем двигателя (см3)</div>
                                                <div class="value-characheristic">155</div>
                                            </div>
                                            <div class="characheristic">
                                                <div class="name-characheristic">Емкость топливного бака (л)</div>
                                                <div class="value-characheristic">0,8</div>
                                            </div>
                                            <div class="characheristic">
                                                <div class="name-characheristic">Высота кошения (мм)</div>
                                                <div class="value-characheristic">25-75</div>
                                            </div>
                                            <div class="characheristic">
                                                <div class="name-characheristic">Ширина кошения (мм)</div>
                                                <div class="value-characheristic">480</div>
                                            </div>
                                            <div class="characheristic">
                                                <div class="name-characheristic">Объем травосборника (л)</div>
                                                <div class="value-characheristic">65</div>
                                            </div>
                                        </div>
                                        <div class="more-info-item">
                                            <a href="/catalog/item/gazonokosilka_benzinovaya_deworks_l_50sv/">Подробнее...</a>
                                        </div>
                                    </div>
                                    <div class="right-table-item ">
                                        <div class="wrapp-available">
                                            <div class="in-avialable">
                                                <img src="/local/templates/czebra_daewoo/front/img/in-avialable.svg" alt="">
                                                <span>В наличии</span>
                                            </div>
                                            <div class="avialable-magazine">
                                                <img src="/local/templates/czebra_daewoo/front/img/magazine.svg" alt="">

                                                <a href="#" id="btn_form_FORM_AVAILABILITY_SECTION4895" data-form="eJx9UtlOwzAQ%2FJXg5wqliXuQN9dZWoskDo5TUQGy0jSVyiGkChCH%2BHccOyVWK%2FGyWu%2FO2rPj%2BUa54HFJJYrw9GI0QIRKtgQUoQwN0CUXqWKxPpmMLAlLyIwlTK5UARrJs3ZKI9ks4fTKYkOnIFd5e9m2aTbrqn7UjbSYq5nMdPHuzcfDpo04aGO4NblvchttfdpjcK2vyEgKKueFVLCETFNHuqj3yEFoYpTHUKDoFuULnkEHtwCz6P0xVgm4LpmAWNEF0KsZv9HT%2F6Ag1TJYiABZikyVIrEkygKESqEoyBwUieNuy2DY72c3w8N%2Bs9DmzZlnFNk4qKkphbWJIxM3To5NHPcV7HvO7Vax7Qko6DF42w3YtwNHe%2FtoxyDwHKZrh%2FvYmbiwnB2CI88h4juN2j5%2BbjVTlOSSLkhnuyVJWEwktPKt9FkymcBBytDMTxwtfNce3nHDZYsnDvPWpZToLz%2BYlJy46O%2FP7W8fzPyyf25neZprg2VSGYNFqP5q1vsq6toS0jzRSxy61Xu1e6rWu6fd66eqHqoP9PMLXef0Yg%3D%3D">Наличие в магазинах</a>
                                            </div>
                                        </div>
                                        <div class="rate-item">
                                            <div class="rate">
                                                <div class="rating-container rating-md rating-animate rating-disabled"><div class="clear-rating " title="Clear"><i class="glyphicon glyphicon-minus-sign"></i></div><div class="rating-stars" title="Not Rated"><span class="empty-stars"><span class="star"><i class="glyphicon glyphicon-star-empty"></i></span><span class="star"><i class="glyphicon glyphicon-star-empty"></i></span><span class="star"><i class="glyphicon glyphicon-star-empty"></i></span><span class="star"><i class="glyphicon glyphicon-star-empty"></i></span><span class="star"><i class="glyphicon glyphicon-star-empty"></i></span></span><span class="filled-stars" style="width: 0%;"><span class="star"><i class="glyphicon glyphicon-star"></i></span><span class="star"><i class="glyphicon glyphicon-star"></i></span><span class="star"><i class="glyphicon glyphicon-star"></i></span><span class="star"><i class="glyphicon glyphicon-star"></i></span><span class="star"><i class="glyphicon glyphicon-star"></i></span></span><input class="input-rating rating-input" name="input-name" type="number" style="display: none" value="0" disabled="disabled"></div></div>
                                            </div>
                                            <a href="/catalog/item/gazonokosilka_benzinovaya_deworks_l_50sv/?reviews=Y" class="count-reviews">0 отзывов</a>
                                        </div>
                                        <div class="block-price block-price4">
                                            <div class="price-item">28&nbsp;990 <span class="rubl">i</span></div>

                                        </div>
                                        <div class="wrapp-delivery-item">
                                            <div class="delivery-item">
                                                <img src="/local/templates/czebra_daewoo/front/img/delivery-item.svg" alt="">
                                                <a href="/delivery/">Доставка</a>
                                            </div>
                                            <div class="date-delivery">Завтра, 13.07</div>
                                        </div>
                                        <div class="wrapp-pickup-item">
                                            <div class="pickup-item">
                                                <img src="/local/templates/czebra_daewoo/front/img/pickup.svg" alt="">
                                                <a href="/delivery/">Самовывоз</a>
                                            </div>
                                            <div class="date-pickup">Сегодня, 12.07</div>
                                        </div>

                                        <div class="btn-item">
                                     <span class="add-to-cart-item">
                                         <a href="#" class="btn-site1" data-czaction="addtocart" data-czbuy="4895">
                                             <span class="btn-trans">Купить</span>
                                             <span class="btn-anim">Купить</span>
                                         </a>
                                     </span>
                                            <span class="quick-order-item">
                                        <a href="#" class="btn-site1" onclick="quickOrder(event, '4895')">
                                        <span class="btn-trans">Быстрый заказ</span>
                                        <span class="btn-anim">Быстрый заказ</span>
                                        </a>
                                    </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="item">
                            <div class="img-item">
                                <a href="/catalog/item/gazonokosilka_benzinovaya_deworks_l_48spb/"><img src="/upload/resize_cache/iblock/b42/375_415_2/5h21d76ci1w1smwdcniugcpa1pi7h6lm.jpg" alt="Газонокосилка бензиновая DeWORKS L 48SPB"></a>
                                <div class="sticker">
                                    <div class="sticker-novelty">
                                        <span>Новинка</span>
                                    </div>
                                </div>
                            </div>
                            <div class="info-item">
                                <div class="wrapp-name-item">
                                    <div class="name-item"><a href="/catalog/item/gazonokosilka_benzinovaya_deworks_l_48spb/">Газонокосилка бензиновая DeWORKS L 48SPB</a>
                                    </div>
                                    <div class="icon-item">
                                        <a title="В сравнение" class="add-to-compare " onclick="addToCompare(event, 4893, '/catalog/item/gazonokosilka_benzinovaya_deworks_l_48spb/')" data-id="4893"></a>
                                        <a title="В избранное" class="add-to-favorites " onclick="addToFavs(event, 4893)" data-id="4893"></a>
                                    </div>
                                </div>
                                <div class="table-item">
                                    <div class="left-table-item">
                                        <div class="characteristics-item characteristics-item4">
                                            <div class="characheristic">
                                                <div class="name-characheristic">Мощность (л.с.)</div>
                                                <div class="value-characheristic">4.5</div>
                                            </div>
                                            <div class="characheristic">
                                                <div class="name-characheristic">Объем двигателя (см3)</div>
                                                <div class="value-characheristic">140</div>
                                            </div>
                                            <div class="characheristic">
                                                <div class="name-characheristic">Емкость топливного бака (л)</div>
                                                <div class="value-characheristic">0,8</div>
                                            </div>
                                            <div class="characheristic">
                                                <div class="name-characheristic">Высота кошения (мм)</div>
                                                <div class="value-characheristic">25-75</div>
                                            </div>
                                            <div class="characheristic">
                                                <div class="name-characheristic">Ширина кошения (мм)</div>
                                                <div class="value-characheristic">480</div>
                                            </div>
                                            <div class="characheristic">
                                                <div class="name-characheristic">Объем травосборника (л)</div>
                                                <div class="value-characheristic">65</div>
                                            </div>
                                        </div>
                                        <div class="more-info-item">
                                            <a href="/catalog/item/gazonokosilka_benzinovaya_deworks_l_48spb/">Подробнее...</a>
                                        </div>
                                    </div>
                                    <div class="right-table-item ">
                                        <div class="wrapp-available">
                                            <div class="in-avialable">
                                                <img src="/local/templates/czebra_daewoo/front/img/in-avialable.svg" alt="">
                                                <span>В наличии</span>
                                            </div>
                                            <div class="avialable-magazine">
                                                <img src="/local/templates/czebra_daewoo/front/img/magazine.svg" alt="">

                                                <a href="#" id="btn_form_FORM_AVAILABILITY_SECTION4893" data-form="eJx9UtlOwzAQ%2FJXg5wqliXuQN9dZWoskDo5TUQGy0jSVyiGkChCH%2BHccOyVWK%2FGyWu%2FO2rPj%2BUa54HFJJYrw9CIcIEIlWwKKUIYG6JKLVLFYn0xGloQlZMYSJleqAI3kWTulkWyWcHplseGoL8hV3l62bZrNuqofdSMt5momM128e%2FPxsGkjDtoYbk3um9xGW5%2F2GFzrKzKSgsp5IRUsIdPUkS7qPXIQmhjlMRQoukX5gmfQwS3ALHp%2FjFUCrksmIFZ0AfRqxm%2F09D8oSLUMFiJAliJTpUgsibIAoVIoCjIHReK42zIY9vvZzfCw3yy0eXPmGUU2DmpqSmFt4sjEjZNjE8d9Bfuec7tVbHsCCnoM3nYD9u3A0d4%2B2jEIPIfp2uE%2BdiYuLGeH4MhziPhOo7aPn1vNFCW5pAvS2W5JEhYTCa18K32WTCZwkDI08xNHC9%2B1h3fccNniicO8dSkl%2BssPJiUnLvr7c%2FvbBzO%2F7J%2FbWZ7m2mCZVMZgEaq%2FmvW%2Birq2hDRP9BKHbvVe7Z6q9e5p9%2FqpqofqA%2F38AlCX9F4%3D">Наличие в магазинах</a>
                                            </div>
                                        </div>
                                        <div class="rate-item">
                                            <div class="rate">
                                                <div class="rating-container rating-md rating-animate rating-disabled"><div class="clear-rating " title="Clear"><i class="glyphicon glyphicon-minus-sign"></i></div><div class="rating-stars" title="Five Stars"><span class="empty-stars"><span class="star"><i class="glyphicon glyphicon-star-empty"></i></span><span class="star"><i class="glyphicon glyphicon-star-empty"></i></span><span class="star"><i class="glyphicon glyphicon-star-empty"></i></span><span class="star"><i class="glyphicon glyphicon-star-empty"></i></span><span class="star"><i class="glyphicon glyphicon-star-empty"></i></span></span><span class="filled-stars" style="width: 100%;"><span class="star"><i class="glyphicon glyphicon-star"></i></span><span class="star"><i class="glyphicon glyphicon-star"></i></span><span class="star"><i class="glyphicon glyphicon-star"></i></span><span class="star"><i class="glyphicon glyphicon-star"></i></span><span class="star"><i class="glyphicon glyphicon-star"></i></span></span><input class="input-rating rating-input" name="input-name" type="number" style="display: none" value="5" disabled="disabled"></div></div>
                                            </div>
                                            <a href="/catalog/item/gazonokosilka_benzinovaya_deworks_l_48spb/?reviews=Y" class="count-reviews">1 отзывов</a>
                                        </div>
                                        <div class="block-price block-price4">
                                            <div class="old-price">
                                                <div class="percent">
                                                    -10%</div>
                                                <div class="value-old-price">32&nbsp;990 <span class="rubl">i</span></div>
                                            </div>
                                            <div class="price-item">29&nbsp;990 <span class="rubl">i</span></div>

                                        </div>
                                        <div class="wrapp-delivery-item">
                                            <div class="delivery-item">
                                                <img src="/local/templates/czebra_daewoo/front/img/delivery-item.svg" alt="">
                                                <a href="/delivery/">Доставка</a>
                                            </div>
                                            <div class="date-delivery">Завтра, 13.07</div>
                                        </div>
                                        <div class="wrapp-pickup-item">
                                            <div class="pickup-item">
                                                <img src="/local/templates/czebra_daewoo/front/img/pickup.svg" alt="">
                                                <a href="/delivery/">Самовывоз</a>
                                            </div>
                                            <div class="date-pickup">Сегодня, 12.07</div>
                                        </div>

                                        <div class="btn-item">
                                     <span class="add-to-cart-item">
                                         <a href="#" class="btn-site1" data-czaction="addtocart" data-czbuy="4893">
                                             <span class="btn-trans">Купить</span>
                                             <span class="btn-anim">Купить</span>
                                         </a>
                                     </span>
                                            <span class="quick-order-item">
                                        <a href="#" class="btn-site1" onclick="quickOrder(event, '4893')">
                                        <span class="btn-trans">Быстрый заказ</span>
                                        <span class="btn-anim">Быстрый заказ</span>
                                        </a>
                                    </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="item">
                            <div class="img-item">
                                <a href="/catalog/item/gazonokosilka_benzinovaya_deworks_l_60sp/"><img src="/upload/resize_cache/iblock/86d/375_415_2/bjlxk070mnljlj8g9tsz9xqfdw205y1f.jpg" alt="Газонокосилка бензиновая DeWORKS L 60SP"></a>
                                <div class="sticker">
                                    <div class="sticker-novelty">
                                        <span>Новинка</span>
                                    </div>
                                </div>
                            </div>
                            <div class="info-item">
                                <div class="wrapp-name-item">
                                    <div class="name-item"><a href="/catalog/item/gazonokosilka_benzinovaya_deworks_l_60sp/">Газонокосилка бензиновая DeWORKS L 60SP</a>
                                    </div>
                                    <div class="icon-item">
                                        <a title="В сравнение" class="add-to-compare " onclick="addToCompare(event, 4898, '/catalog/item/gazonokosilka_benzinovaya_deworks_l_60sp/')" data-id="4898"></a>
                                        <a title="В избранное" class="add-to-favorites " onclick="addToFavs(event, 4898)" data-id="4898"></a>
                                    </div>
                                </div>
                                <div class="table-item">
                                    <div class="left-table-item">
                                        <div class="characteristics-item characteristics-item4">
                                            <div class="characheristic">
                                                <div class="name-characheristic">Мощность (л.с.)</div>
                                                <div class="value-characheristic">7,0</div>
                                            </div>
                                            <div class="characheristic">
                                                <div class="name-characheristic">Объем двигателя (см3)</div>
                                                <div class="value-characheristic">196</div>
                                            </div>
                                            <div class="characheristic">
                                                <div class="name-characheristic">Емкость топливного бака (л)</div>
                                                <div class="value-characheristic">2</div>
                                            </div>
                                            <div class="characheristic">
                                                <div class="name-characheristic">Высота кошения (мм)</div>
                                                <div class="value-characheristic">25-75</div>
                                            </div>
                                            <div class="characheristic">
                                                <div class="name-characheristic">Ширина кошения (мм)</div>
                                                <div class="value-characheristic">580</div>
                                            </div>
                                            <div class="characheristic">
                                                <div class="name-characheristic">Объем травосборника (л)</div>
                                                <div class="value-characheristic">80</div>
                                            </div>
                                        </div>
                                        <div class="more-info-item">
                                            <a href="/catalog/item/gazonokosilka_benzinovaya_deworks_l_60sp/">Подробнее...</a>
                                        </div>
                                    </div>
                                    <div class="right-table-item ">
                                        <div class="wrapp-available">
                                            <div class="in-avialable">
                                                <img src="/local/templates/czebra_daewoo/front/img/in-avialable.svg" alt="">
                                                <span>В наличии</span>
                                            </div>
                                            <div class="avialable-magazine">
                                                <img src="/local/templates/czebra_daewoo/front/img/magazine.svg" alt="">

                                                <a href="#" id="btn_form_FORM_AVAILABILITY_SECTION4898" data-form="eJx9UtlOwzAQ%2FJXg5wqliXuQN9dZWoskDo5TUQGy0jSVyiGkChCH%2BHccOyVWK%2FGyWu%2FO2rPj%2BUa54HFJJYrw9GI6QIRKtgQUoQwN0CUXqWKxPpmMLAlLyIwlTK5UARrJs3ZKI9ks4fTKYsNRX5CrvL1s2zSbdVU%2F6kZazNVMZrp49%2BbjYdNGHLQx3JrcN7mNtj7tMbjWV2QkBZXzQipYQqapI13Ue%2BQgNDHKYyhQdIvyBc%2Bgg1uAWfT%2BGKsEXJdMQKzoAujVjN%2Fo6X9QkGoZLESALEWmSpFYEmUBQqVQFGQOisRxt2Uw7Pezm%2BFhv1lo8%2BbMM4psHNTUlMLaxJGJGyfHJo77CvY953ar2PYEFPQYvO0G7NuBo719tGMQeA7TtcN97ExcWM4OwZHnEPGdRm0fP7eaKUpySReks92SJCwmElr5VvosmUzgIGVo5ieOFr5rD%2B%2B44bLFE4d561JK9JcfTEpOXPT35%2Fa3D2Z%2B2T%2B3szzNtcEyqYzBIlR%2FNet9FXVtCWme6CUO3eq92j1V693T7vVTVQ%2FVB%2Fr5BXHf9Gg%3D">Наличие в магазинах</a>
                                            </div>
                                        </div>
                                        <div class="rate-item">
                                            <div class="rate">
                                                <div class="rating-container rating-md rating-animate rating-disabled"><div class="clear-rating " title="Clear"><i class="glyphicon glyphicon-minus-sign"></i></div><div class="rating-stars" title="Not Rated"><span class="empty-stars"><span class="star"><i class="glyphicon glyphicon-star-empty"></i></span><span class="star"><i class="glyphicon glyphicon-star-empty"></i></span><span class="star"><i class="glyphicon glyphicon-star-empty"></i></span><span class="star"><i class="glyphicon glyphicon-star-empty"></i></span><span class="star"><i class="glyphicon glyphicon-star-empty"></i></span></span><span class="filled-stars" style="width: 0%;"><span class="star"><i class="glyphicon glyphicon-star"></i></span><span class="star"><i class="glyphicon glyphicon-star"></i></span><span class="star"><i class="glyphicon glyphicon-star"></i></span><span class="star"><i class="glyphicon glyphicon-star"></i></span><span class="star"><i class="glyphicon glyphicon-star"></i></span></span><input class="input-rating rating-input" name="input-name" type="number" style="display: none" value="0" disabled="disabled"></div></div>
                                            </div>
                                            <a href="/catalog/item/gazonokosilka_benzinovaya_deworks_l_60sp/?reviews=Y" class="count-reviews">0 отзывов</a>
                                        </div>
                                        <div class="block-price block-price4">
                                            <div class="price-item">36&nbsp;990 <span class="rubl">i</span></div>

                                        </div>
                                        <div class="wrapp-delivery-item">
                                            <div class="delivery-item">
                                                <img src="/local/templates/czebra_daewoo/front/img/delivery-item.svg" alt="">
                                                <a href="/delivery/">Доставка</a>
                                            </div>
                                            <div class="date-delivery">Завтра, 13.07</div>
                                        </div>
                                        <div class="wrapp-pickup-item">
                                            <div class="pickup-item">
                                                <img src="/local/templates/czebra_daewoo/front/img/pickup.svg" alt="">
                                                <a href="/delivery/">Самовывоз</a>
                                            </div>
                                            <div class="date-pickup">Сегодня, 12.07</div>
                                        </div>

                                        <div class="btn-item">
                                     <span class="add-to-cart-item">
                                         <a href="#" class="btn-site1" data-czaction="addtocart" data-czbuy="4898">
                                             <span class="btn-trans">Купить</span>
                                             <span class="btn-anim">Купить</span>
                                         </a>
                                     </span>
                                            <span class="quick-order-item">
                                        <a href="#" class="btn-site1" onclick="quickOrder(event, '4898')">
                                        <span class="btn-trans">Быстрый заказ</span>
                                        <span class="btn-anim">Быстрый заказ</span>
                                        </a>
                                    </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="item">
                            <div class="img-item">
                                <a href="/catalog/item/gazonokosilka_benzinovaya_deworks_l_50sph/"><img src="/upload/resize_cache/iblock/898/375_415_2/yvvyeofq6nujh1s85lzsef69lrg00gfx.jpg" alt="Газонокосилка бензиновая DeWORKS L 50SPH"></a>
                                <div class="sticker">
                                    <div class="sticker-novelty">
                                        <span>Новинка</span>
                                    </div>
                                </div>
                            </div>
                            <div class="info-item">
                                <div class="wrapp-name-item">
                                    <div class="name-item"><a href="/catalog/item/gazonokosilka_benzinovaya_deworks_l_50sph/">Газонокосилка бензиновая DeWORKS L 50SPH</a>
                                    </div>
                                    <div class="icon-item">
                                        <a title="В сравнение" class="add-to-compare " onclick="addToCompare(event, 4896, '/catalog/item/gazonokosilka_benzinovaya_deworks_l_50sph/')" data-id="4896"></a>
                                        <a title="В избранное" class="add-to-favorites " onclick="addToFavs(event, 4896)" data-id="4896"></a>
                                    </div>
                                </div>
                                <div class="table-item">
                                    <div class="left-table-item">
                                        <div class="characteristics-item characteristics-item4">
                                            <div class="characheristic">
                                                <div class="name-characheristic">Мощность (л.с.)</div>
                                                <div class="value-characheristic">4,2</div>
                                            </div>
                                            <div class="characheristic">
                                                <div class="name-characheristic">Объем двигателя (см3)</div>
                                                <div class="value-characheristic">145</div>
                                            </div>
                                            <div class="characheristic">
                                                <div class="name-characheristic">Емкость топливного бака (л)</div>
                                                <div class="value-characheristic">0,91</div>
                                            </div>
                                            <div class="characheristic">
                                                <div class="name-characheristic">Высота кошения (мм)</div>
                                                <div class="value-characheristic">25-75</div>
                                            </div>
                                            <div class="characheristic">
                                                <div class="name-characheristic">Ширина кошения (мм)</div>
                                                <div class="value-characheristic">480</div>
                                            </div>
                                            <div class="characheristic">
                                                <div class="name-characheristic">Объем травосборника (л)</div>
                                                <div class="value-characheristic">65</div>
                                            </div>
                                        </div>
                                        <div class="more-info-item">
                                            <a href="/catalog/item/gazonokosilka_benzinovaya_deworks_l_50sph/">Подробнее...</a>
                                        </div>
                                    </div>
                                    <div class="right-table-item ">
                                        <div class="wrapp-available">
                                            <div class="in-avialable">
                                                <img src="/local/templates/czebra_daewoo/front/img/in-avialable.svg" alt="">
                                                <span>В наличии</span>
                                            </div>
                                            <div class="avialable-magazine">
                                                <img src="/local/templates/czebra_daewoo/front/img/magazine.svg" alt="">

                                                <a href="#" id="btn_form_FORM_AVAILABILITY_SECTION4896" data-form="eJx9Ul1LwzAU%2FSs1z0O6Nvuwb1l63cLapqbpcKiErutgOhGGih%2F4302TzgYFXy43956bnHtyPlEueFxSiSI8vRgPEKGSrQBFKEMDdMlFqlisTyYjK8ISMmMJk2tVgEbyrJ3SSDZLOF1abDjqC3Kdt5ftmma7qeoH3UiLuZrJTBdvX3w8bNqIgzaGO5P7JrfR1qc9Btf6ioykoHJeSAUryDR1pIt6jxyEJkZ5DAWKblC%2B4Bl0cAswi979xioBVyUTECu6ALqc8Ws9%2FQ8KUi2DhQiQpchUKRJLoixAqBSKgsxBkTjutgyG%2FX52MzzsNwtt3px5RpGtg5qaUlibODJx6%2BTYxHFfwb7n3G4V2%2F0BBT0G77oB%2B3bgaG8f7RgEnsN043AfOxMXlrNDcOQ5RHynUdvHz61mipJc0gXpbLciCYuJhFa%2BtT5LJhM4SRma%2BYmjhe%2Faw%2FvdcNniicO8dSkl%2BstPJiV%2FXPTz5%2Fa3T2Z%2BOj62szzNtcEyqYzBIlR%2FNJtjFXVtCWme6CVO3eq12h%2Bqzf6wf35X1X31hr6%2BAWSP9GQ%3D">Наличие в магазинах</a>
                                            </div>
                                        </div>
                                        <div class="rate-item">
                                            <div class="rate">
                                                <div class="rating-container rating-md rating-animate rating-disabled"><div class="clear-rating " title="Clear"><i class="glyphicon glyphicon-minus-sign"></i></div><div class="rating-stars" title="Not Rated"><span class="empty-stars"><span class="star"><i class="glyphicon glyphicon-star-empty"></i></span><span class="star"><i class="glyphicon glyphicon-star-empty"></i></span><span class="star"><i class="glyphicon glyphicon-star-empty"></i></span><span class="star"><i class="glyphicon glyphicon-star-empty"></i></span><span class="star"><i class="glyphicon glyphicon-star-empty"></i></span></span><span class="filled-stars" style="width: 0%;"><span class="star"><i class="glyphicon glyphicon-star"></i></span><span class="star"><i class="glyphicon glyphicon-star"></i></span><span class="star"><i class="glyphicon glyphicon-star"></i></span><span class="star"><i class="glyphicon glyphicon-star"></i></span><span class="star"><i class="glyphicon glyphicon-star"></i></span></span><input class="input-rating rating-input" name="input-name" type="number" style="display: none" value="0" disabled="disabled"></div></div>
                                            </div>
                                            <a href="/catalog/item/gazonokosilka_benzinovaya_deworks_l_50sph/?reviews=Y" class="count-reviews">0 отзывов</a>
                                        </div>
                                        <div class="block-price block-price4">
                                            <div class="old-price">
                                                <div class="percent">
                                                    -10%</div>
                                                <div class="value-old-price">41&nbsp;990 <span class="rubl">i</span></div>
                                            </div>
                                            <div class="price-item">37&nbsp;990 <span class="rubl">i</span></div>

                                        </div>
                                        <div class="wrapp-delivery-item">
                                            <div class="delivery-item">
                                                <img src="/local/templates/czebra_daewoo/front/img/delivery-item.svg" alt="">
                                                <a href="/delivery/">Доставка</a>
                                            </div>
                                            <div class="date-delivery">Завтра, 13.07</div>
                                        </div>
                                        <div class="wrapp-pickup-item">
                                            <div class="pickup-item">
                                                <img src="/local/templates/czebra_daewoo/front/img/pickup.svg" alt="">
                                                <a href="/delivery/">Самовывоз</a>
                                            </div>
                                            <div class="date-pickup">Сегодня, 12.07</div>
                                        </div>

                                        <div class="btn-item">
                                     <span class="add-to-cart-item">
                                         <a href="#" class="btn-site1" data-czaction="addtocart" data-czbuy="4896">
                                             <span class="btn-trans">Купить</span>
                                             <span class="btn-anim">Купить</span>
                                         </a>
                                     </span>
                                            <span class="quick-order-item">
                                        <a href="#" class="btn-site1" onclick="quickOrder(event, '4896')">
                                        <span class="btn-trans">Быстрый заказ</span>
                                        <span class="btn-anim">Быстрый заказ</span>
                                        </a>
                                    </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="item">
                            <div class="img-item">
                                <a href="/catalog/item/gazonokosilka_benzinovaya_daewoo_dlm_5100sv/"><img src="/upload/resize_cache/iblock/972/375_415_2/9725ad1ccc31a8173979325c75b5c624.jpg" alt="Газонокосилка бензиновая DAEWOO DLM 5100SV"></a>
                                <div class="sticker">
                                </div>
                            </div>
                            <div class="info-item">
                                <div class="wrapp-name-item">
                                    <div class="name-item"><a href="/catalog/item/gazonokosilka_benzinovaya_daewoo_dlm_5100sv/">Газонокосилка бензиновая DAEWOO DLM 5100SV</a>
                                    </div>
                                    <div class="icon-item">
                                        <a title="В сравнение" class="add-to-compare " onclick="addToCompare(event, 1870, '/catalog/item/gazonokosilka_benzinovaya_daewoo_dlm_5100sv/')" data-id="1870"></a>
                                        <a title="В избранное" class="add-to-favorites " onclick="addToFavs(event, 1870)" data-id="1870"></a>
                                    </div>
                                </div>
                                <div class="table-item">
                                    <div class="left-table-item">
                                        <div class="characteristics-item characteristics-item4">
                                            <div class="characheristic">
                                                <div class="name-characheristic">Мощность (л.с.)</div>
                                                <div class="value-characheristic">6.5</div>
                                            </div>
                                            <div class="characheristic">
                                                <div class="name-characheristic">Объем двигателя (см3)</div>
                                                <div class="value-characheristic">175</div>
                                            </div>
                                            <div class="characheristic">
                                                <div class="name-characheristic">Емкость топливного бака (л)</div>
                                                <div class="value-characheristic">1.2</div>
                                            </div>
                                            <div class="characheristic">
                                                <div class="name-characheristic">Высота кошения (мм)</div>
                                                <div class="value-characheristic">25-75</div>
                                            </div>
                                            <div class="characheristic">
                                                <div class="name-characheristic">Ширина кошения (мм)</div>
                                                <div class="value-characheristic">500</div>
                                            </div>
                                            <div class="characheristic">
                                                <div class="name-characheristic">Объем травосборника (л)</div>
                                                <div class="value-characheristic">70</div>
                                            </div>
                                        </div>
                                        <div class="more-info-item">
                                            <a href="/catalog/item/gazonokosilka_benzinovaya_daewoo_dlm_5100sv/">Подробнее...</a>
                                        </div>
                                    </div>
                                    <div class="right-table-item ">
                                        <div class="wrapp-available">
                                            <div class="in-avialable">
                                                <img src="/local/templates/czebra_daewoo/front/img/in-avialable.svg" alt="">
                                                <span>В наличии</span>
                                            </div>
                                            <div class="avialable-magazine">
                                                <img src="/local/templates/czebra_daewoo/front/img/magazine.svg" alt="">

                                                <a href="#" id="btn_form_FORM_AVAILABILITY_SECTION1870" data-form="eJx9Ul1PgzAU%2FSvY58UwYB%2Fy1pXr1gwolrK4qGkYY8l0xmRR40f875YWpNkSX25u7z23Pff0fKOMs6ggAoXD6cQdIEwEXQEKUYoG6JrxRNJInXSGV5jGeEZjKtYyB4VkaTOlkHQWM7I0WH%2FUF8Q6ay7b1fV2U1ZPqpHkczkTqSrev7nBsG5i4DXR3%2Bnc1bmJpj7tMUGlrkhxAjJjuZCwglRRR6qo9siAK2KERZCj8A5lC5ZCCzcAvejDKVZyuCkoh0iSBZDljN2q6X9QkCgZDISDKHgqCx4bEkUOXCaQ53gOEkdRu6U37PczmwXDfjPf5PWFoxXZWqipLvmVjiMdt1Ye6DjuK4HrWLcbxXZnIK%2FHBLt2wLztWdqbR1sGnmMx3Vjcx9bEleFsERw5FhHXalTm8UujmSQ4E2SBW9utcEwjLKCRb63OgooYOil9PT%2BxtHBtezinDZttMLGYNy4lWH15Z1J85qK%2FPze%2F3Zn55fjczLIkUwZLhdQGC1H1VW%2BOZdi2BSRZrJbouuV7uT%2BUm%2F1h%2F%2Fopy8fyA%2F38AhtB9E4%3D">Наличие в магазинах</a>
                                            </div>
                                        </div>
                                        <div class="rate-item">
                                            <div class="rate">
                                                <div class="rating-container rating-md rating-animate rating-disabled"><div class="clear-rating " title="Clear"><i class="glyphicon glyphicon-minus-sign"></i></div><div class="rating-stars" title="4.8 Stars"><span class="empty-stars"><span class="star"><i class="glyphicon glyphicon-star-empty"></i></span><span class="star"><i class="glyphicon glyphicon-star-empty"></i></span><span class="star"><i class="glyphicon glyphicon-star-empty"></i></span><span class="star"><i class="glyphicon glyphicon-star-empty"></i></span><span class="star"><i class="glyphicon glyphicon-star-empty"></i></span></span><span class="filled-stars" style="width: 95.5556%;"><span class="star"><i class="glyphicon glyphicon-star"></i></span><span class="star"><i class="glyphicon glyphicon-star"></i></span><span class="star"><i class="glyphicon glyphicon-star"></i></span><span class="star"><i class="glyphicon glyphicon-star"></i></span><span class="star"><i class="glyphicon glyphicon-star"></i></span></span><input class="input-rating rating-input" name="input-name" type="number" style="display: none" value="4.7777777777778" disabled="disabled"></div></div>
                                            </div>
                                            <a href="/catalog/item/gazonokosilka_benzinovaya_daewoo_dlm_5100sv/?reviews=Y" class="count-reviews">18 отзывов</a>
                                        </div>
                                        <div class="block-price block-price4">
                                            <div class="price-item">39&nbsp;990 <span class="rubl">i</span></div>

                                        </div>
                                        <div class="wrapp-delivery-item">
                                            <div class="delivery-item">
                                                <img src="/local/templates/czebra_daewoo/front/img/delivery-item.svg" alt="">
                                                <a href="/delivery/">Доставка</a>
                                            </div>
                                            <div class="date-delivery">Завтра, 13.07</div>
                                        </div>
                                        <div class="wrapp-pickup-item">
                                            <div class="pickup-item">
                                                <img src="/local/templates/czebra_daewoo/front/img/pickup.svg" alt="">
                                                <a href="/delivery/">Самовывоз</a>
                                            </div>
                                            <div class="date-pickup">Сегодня, 12.07</div>
                                        </div>

                                        <div class="btn-item">
                                     <span class="add-to-cart-item">
                                         <a href="#" class="btn-site1" data-czaction="addtocart" data-czbuy="1870">
                                             <span class="btn-trans">Купить</span>
                                             <span class="btn-anim">Купить</span>
                                         </a>
                                     </span>
                                            <span class="quick-order-item">
                                        <a href="#" class="btn-site1" onclick="quickOrder(event, '1870')">
                                        <span class="btn-trans">Быстрый заказ</span>
                                        <span class="btn-anim">Быстрый заказ</span>
                                        </a>
                                    </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="item">
                            <div class="img-item">
                                <a href="/catalog/item/benzinovaya_gazonokosilka_daewoo_dlm_6000sv/"><img src="/upload/resize_cache/iblock/d03/375_415_2/d03f836ef27603ee79a13218aedf6421.jpg" alt="Бензиновая газонокосилка DAEWOO DLM 6000SV"></a>
                                <div class="sticker">
                                </div>
                            </div>
                            <div class="info-item">
                                <div class="wrapp-name-item">
                                    <div class="name-item"><a href="/catalog/item/benzinovaya_gazonokosilka_daewoo_dlm_6000sv/">Бензиновая газонокосилка DAEWOO DLM 6000SV</a>
                                    </div>
                                    <div class="icon-item">
                                        <a title="В сравнение" class="add-to-compare " onclick="addToCompare(event, 1792, '/catalog/item/benzinovaya_gazonokosilka_daewoo_dlm_6000sv/')" data-id="1792"></a>
                                        <a title="В избранное" class="add-to-favorites " onclick="addToFavs(event, 1792)" data-id="1792"></a>
                                    </div>
                                </div>
                                <div class="table-item">
                                    <div class="left-table-item">
                                        <div class="characteristics-item characteristics-item4">
                                            <div class="characheristic">
                                                <div class="name-characheristic">Мощность (л.с.)</div>
                                                <div class="value-characheristic">7</div>
                                            </div>
                                            <div class="characheristic">
                                                <div class="name-characheristic">Объем двигателя (см3)</div>
                                                <div class="value-characheristic">196</div>
                                            </div>
                                            <div class="characheristic">
                                                <div class="name-characheristic">Емкость топливного бака (л)</div>
                                                <div class="value-characheristic">2</div>
                                            </div>
                                            <div class="characheristic">
                                                <div class="name-characheristic">Высота кошения (мм)</div>
                                                <div class="value-characheristic">25-75</div>
                                            </div>
                                            <div class="characheristic">
                                                <div class="name-characheristic">Ширина кошения (мм)</div>
                                                <div class="value-characheristic">580</div>
                                            </div>
                                            <div class="characheristic">
                                                <div class="name-characheristic">Объем травосборника (л)</div>
                                                <div class="value-characheristic">80</div>
                                            </div>
                                        </div>
                                        <div class="more-info-item">
                                            <a href="/catalog/item/benzinovaya_gazonokosilka_daewoo_dlm_6000sv/">Подробнее...</a>
                                        </div>
                                    </div>
                                    <div class="right-table-item ">
                                        <div class="wrapp-available">
                                            <div class="in-avialable">
                                                <img src="/local/templates/czebra_daewoo/front/img/in-avialable.svg" alt="">
                                                <span>В наличии</span>
                                            </div>
                                            <div class="avialable-magazine">
                                                <img src="/local/templates/czebra_daewoo/front/img/magazine.svg" alt="">

                                                <a href="#" id="btn_form_FORM_AVAILABILITY_SECTION1792" data-form="eJx9Ul1PgzAU%2FSvY58UwYB%2Fy1pXr1gwolrK4qGkYY8l0xmRR40f875YWpNkSX25u7z23Pff0fKOMs6ggAoXDyZU3QJgIugIUohQN0DXjiaSROukMrzCN8YzGVKxlDgrJ0mZKIeksZmRpsP6oL4h11ly2q%2BvtpqyeVCPJ53ImUlW8f3ODYd3EwGuiv9O5q3MTTX3aY4JKXZHiBGTGciFhBamijlRR7ZEBV8QIiyBH4R3KFiyFFm4AetGHU6zkcFNQDpEkCyDLGbtV0%2F%2BgIFEyGAgHUfBUFjw2JIocuEwgz%2FEcJI6idktv2O9nNguG%2FWa%2ByesLRyuytVBTXfIrHUc6bq080HHcVwLXsW43iu3OQF6PCXbtgHnbs7Q3j7YMPMdiurG4j62JK8PZIjhyLCKu1ajM45dGM0lwJsgCt7Zb4ZhGWEAj31qdBRUxdFL6en5iaeHa9nBOGzbbYGIxb1xKsPryzqT4zEV%2Ff25%2BuzPzy%2FG5mWVJpgyWCqkNFqLqq94cy7BtC0iyWC3Rdcv3cn8oN%2FvD%2FvVTlo%2FlB%2Fr5BS859FQ%3D">Наличие в магазинах</a>
                                            </div>
                                        </div>
                                        <div class="rate-item">
                                            <div class="rate">
                                                <div class="rating-container rating-md rating-animate rating-disabled"><div class="clear-rating " title="Clear"><i class="glyphicon glyphicon-minus-sign"></i></div><div class="rating-stars" title="4.7 Stars"><span class="empty-stars"><span class="star"><i class="glyphicon glyphicon-star-empty"></i></span><span class="star"><i class="glyphicon glyphicon-star-empty"></i></span><span class="star"><i class="glyphicon glyphicon-star-empty"></i></span><span class="star"><i class="glyphicon glyphicon-star-empty"></i></span><span class="star"><i class="glyphicon glyphicon-star-empty"></i></span></span><span class="filled-stars" style="width: 94.2857%;"><span class="star"><i class="glyphicon glyphicon-star"></i></span><span class="star"><i class="glyphicon glyphicon-star"></i></span><span class="star"><i class="glyphicon glyphicon-star"></i></span><span class="star"><i class="glyphicon glyphicon-star"></i></span><span class="star"><i class="glyphicon glyphicon-star"></i></span></span><input class="input-rating rating-input" name="input-name" type="number" style="display: none" value="4.7142857142857" disabled="disabled"></div></div>
                                            </div>
                                            <a href="/catalog/item/benzinovaya_gazonokosilka_daewoo_dlm_6000sv/?reviews=Y" class="count-reviews">7 отзывов</a>
                                        </div>
                                        <div class="block-price block-price4">
                                            <div class="price-item">52&nbsp;990 <span class="rubl">i</span></div>

                                        </div>
                                        <div class="wrapp-delivery-item">
                                            <div class="delivery-item">
                                                <img src="/local/templates/czebra_daewoo/front/img/delivery-item.svg" alt="">
                                                <a href="/delivery/">Доставка</a>
                                            </div>
                                            <div class="date-delivery">Завтра, 13.07</div>
                                        </div>
                                        <div class="wrapp-pickup-item">
                                            <div class="pickup-item">
                                                <img src="/local/templates/czebra_daewoo/front/img/pickup.svg" alt="">
                                                <a href="/delivery/">Самовывоз</a>
                                            </div>
                                            <div class="date-pickup">Сегодня, 12.07</div>
                                        </div>

                                        <div class="btn-item">
                                     <span class="add-to-cart-item">
                                         <a href="#" class="btn-site1" data-czaction="addtocart" data-czbuy="1792">
                                             <span class="btn-trans">Купить</span>
                                             <span class="btn-anim">Купить</span>
                                         </a>
                                     </span>
                                            <span class="quick-order-item">
                                        <a href="#" class="btn-site1" onclick="quickOrder(event, '1792')">
                                        <span class="btn-trans">Быстрый заказ</span>
                                        <span class="btn-anim">Быстрый заказ</span>
                                        </a>
                                    </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="item">
                            <div class="img-item">
                                <a href="/catalog/item/rayder_benzinovyy_daewoo_dwr_620/"><img src="/upload/resize_cache/iblock/d1b/375_415_2/d1b6ab61b6817e96a58535cfedc24254.jpg" alt="Газонокосилка трактор DAEWOO DWR 620"></a>
                                <div class="sticker">
                                </div>
                            </div>
                            <div class="info-item">
                                <div class="wrapp-name-item">
                                    <div class="name-item"><a href="/catalog/item/rayder_benzinovyy_daewoo_dwr_620/">Газонокосилка трактор DAEWOO DWR 620</a>
                                    </div>
                                    <div class="icon-item">
                                        <a title="В сравнение" class="add-to-compare " onclick="addToCompare(event, 2190, '/catalog/item/rayder_benzinovyy_daewoo_dwr_620/')" data-id="2190"></a>
                                        <a title="В избранное" class="add-to-favorites " onclick="addToFavs(event, 2190)" data-id="2190"></a>
                                    </div>
                                </div>
                                <div class="table-item">
                                    <div class="left-table-item">
                                        <div class="features-item">
                                            <img src="/local/templates/czebra_daewoo/front/img/icon-item1.svg" alt="">
                                            <span>Электрозапуск</span>
                                        </div>
                                        <div class="characteristics-item characteristics-item2">
                                            <div class="characheristic">
                                                <div class="name-characheristic">Мощность (л.с.)</div>
                                                <div class="value-characheristic">7,5</div>
                                            </div>
                                            <div class="characheristic">
                                                <div class="name-characheristic">Объем двигателя (см3)</div>
                                                <div class="value-characheristic">225</div>
                                            </div>
                                            <div class="characheristic">
                                                <div class="name-characheristic">Емкость топливного бака (л)</div>
                                                <div class="value-characheristic">1,4</div>
                                            </div>
                                            <div class="characheristic">
                                                <div class="name-characheristic">Высота кошения (мм)</div>
                                                <div class="value-characheristic">30-90</div>
                                            </div>
                                            <div class="characheristic">
                                                <div class="name-characheristic">Ширина кошения (мм)</div>
                                                <div class="value-characheristic">620</div>
                                            </div>
                                            <div class="characheristic">
                                                <div class="name-characheristic">Объем травосборника (л)</div>
                                                <div class="value-characheristic">140</div>
                                            </div>
                                        </div>
                                        <div class="more-info-item">
                                            <a href="/catalog/item/rayder_benzinovyy_daewoo_dwr_620/">Подробнее...</a>
                                        </div>
                                    </div>
                                    <div class="right-table-item ">
                                        <div class="wrapp-available">
                                            <div class="in-avialable">
                                                <img src="/local/templates/czebra_daewoo/front/img/in-avialable.svg" alt="">
                                                <span>В наличии</span>
                                            </div>
                                            <div class="avialable-magazine">
                                                <img src="/local/templates/czebra_daewoo/front/img/magazine.svg" alt="">

                                                <a href="#" id="btn_form_FORM_AVAILABILITY_SECTION2190" data-form="eJx9Ul1PgzAU%2FSvY58UwYB%2Fy1pXr1gwolrK4qGkYY8l0xmRR40f875YWpNkSX25u7z23Pff0fKOMs6ggAoXe8ModIEwEXQEKUYoG6JrxRNJInXSGV5jGeEZjKtYyB4VkaTOlkHQWM7I0WH%2FUF8Q6ay7b1fV2U1ZPqpHkczkTqSrev7nBsG5i4DXR3%2Bnc1bmJpj7tMUGlrkhxAjJjuZCwglRRR6qo9siAK2KERZCj8A5lC5ZCCzcAvejDKVZyuCkoh0iSBZDljN2q6X9QkCgZDISDKHgqCx4bEkUOXCaQ53gOEkdRu6U37PczmwXDfjPf5PWFoxXZWqipLvmVjiMdt1Ye6DjuK4HrWLcbxXZnIK%2FHBLt2wLztWdqbR1sGnmMx3Vjcx9bEleFsERw5FhHXalTm8UujmSQ4E2SBW9utcEwjLKCRb63OgooYOil9PT%2BxtHBtezinDZttMLGYNy4lWH15Z1J85qK%2FPze%2F3Zn55fjczLIkUwZLhdQGC1H1VW%2BOZdi2BSRZrJbouuV7uT%2BUm%2F1h%2F%2Fopy8fyA%2F38AgCP9EY%3D">Наличие в магазинах</a>
                                            </div>
                                        </div>
                                        <div class="rate-item">
                                            <div class="rate">
                                                <div class="rating-container rating-md rating-animate rating-disabled"><div class="clear-rating " title="Clear"><i class="glyphicon glyphicon-minus-sign"></i></div><div class="rating-stars" title="Not Rated"><span class="empty-stars"><span class="star"><i class="glyphicon glyphicon-star-empty"></i></span><span class="star"><i class="glyphicon glyphicon-star-empty"></i></span><span class="star"><i class="glyphicon glyphicon-star-empty"></i></span><span class="star"><i class="glyphicon glyphicon-star-empty"></i></span><span class="star"><i class="glyphicon glyphicon-star-empty"></i></span></span><span class="filled-stars" style="width: 0%;"><span class="star"><i class="glyphicon glyphicon-star"></i></span><span class="star"><i class="glyphicon glyphicon-star"></i></span><span class="star"><i class="glyphicon glyphicon-star"></i></span><span class="star"><i class="glyphicon glyphicon-star"></i></span><span class="star"><i class="glyphicon glyphicon-star"></i></span></span><input class="input-rating rating-input" name="input-name" type="number" style="display: none" value="0" disabled="disabled"></div></div>
                                            </div>
                                            <a href="/catalog/item/rayder_benzinovyy_daewoo_dwr_620/?reviews=Y" class="count-reviews">0 отзывов</a>
                                        </div>
                                        <div class="block-price block-price2">
                                            <div class="price-item">149&nbsp;990 <span class="rubl">i</span></div>

                                        </div>
                                        <div class="wrapp-delivery-item">
                                            <div class="delivery-item">
                                                <img src="/local/templates/czebra_daewoo/front/img/delivery-item.svg" alt="">
                                                <a href="/delivery/">Доставка</a>
                                            </div>
                                            <div class="date-delivery">Завтра, 13.07</div>
                                        </div>
                                        <div class="wrapp-pickup-item">
                                            <div class="pickup-item">
                                                <img src="/local/templates/czebra_daewoo/front/img/pickup.svg" alt="">
                                                <a href="/delivery/">Самовывоз</a>
                                            </div>
                                            <div class="date-pickup">Сегодня, 12.07</div>
                                        </div>

                                        <div class="btn-item">
                                     <span class="add-to-cart-item">
                                         <a href="#" class="btn-site1" data-czaction="addtocart" data-czbuy="2190">
                                             <span class="btn-trans">Купить</span>
                                             <span class="btn-anim">Купить</span>
                                         </a>
                                     </span>
                                            <span class="quick-order-item">
                                        <a href="#" class="btn-site1" onclick="quickOrder(event, '2190')">
                                        <span class="btn-trans">Быстрый заказ</span>
                                        <span class="btn-anim">Быстрый заказ</span>
                                        </a>
                                    </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="more-item">
                            <a data-ajax-id="58c2b0d099b0be352043fe9df5801a7a" href="javascript:void(0)" data-show-more="3" data-next-page="2" data-max-page="2">Показать еще</a>
                        </div>
                    </div>
                    <div class="block-catalog-items mobil-version new-version">

<!--                        <div class="wrapp-item">-->
<!--                            <div class="item">-->
<!--                                <div class="sticker">-->
<!--                                    <div class="sticker-novelty">-->
<!--                                        <span>Новинка</span>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                                <div class="icon-item">-->
<!--                                    <a title="В сравнение" class="add-to-compare " onclick="addToCompare(event, 4891, '/catalog/item/gazonokosilka_benzinovaya_deworks_l_43p/')" data-id="4891"></a>-->
<!--                                    <a href="В избранное" class="add-to-favorites " onclick="addToFavs(event, 4891)" data-id="4891"></a>-->
<!--                                </div>-->
<!--                                <div class="img-item">-->
<!--                                    <div class="icon-item">-->
<!--                                        <a href="#" class="add-to-favorites " onclick="addToFavs(event, 4891)" data-id="4891"></a>-->
<!--                                    </div>-->
<!--                                    <a href="/catalog/item/gazonokosilka_benzinovaya_deworks_l_43p/" class="photo"><img src="/upload/resize_cache/iblock/620/375_415_2/gjxfkwsokraxrvrlmvcwwb7pw46l1rnp.jpg" alt=""></a>-->
<!--                                    <div class="wrapp-price-item">-->
<!--                                        <div class="old-price">-->
<!--                                            <div class="percent">-->
<!--                                                -11%</div>-->
<!--                                            <div class="value-old-price">18&nbsp;990 <span class="rubl">i</span></div>-->
<!--                                        </div>-->
<!--                                        <div class="price-item">16&nbsp;990 <span class="rubl">i</span></div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                                <div class="item-info">-->
<!--                                    <div class="name-item">-->
<!--                                        <a href="/catalog/item/gazonokosilka_benzinovaya_deworks_l_43p/">Газонокосилка бензиновая DeWORKS L 43P</a>-->
<!--                                    </div>-->
<!--                                    <div class="avialable-mobil">-->
<!--                                        <span class="yes-avialable">В наличии</span>-->
<!--                                        <div class="rate-item">-->
<!--                                            <div class="rate">-->
<!--                                                <div class="rating-container rating-md rating-animate rating-disabled"><div class="clear-rating " title="Clear"><i class="glyphicon glyphicon-minus-sign"></i></div><div class="rating-stars" title="Not Rated"><span class="empty-stars"><span class="star"><i class="glyphicon glyphicon-star-empty"></i></span><span class="star"><i class="glyphicon glyphicon-star-empty"></i></span><span class="star"><i class="glyphicon glyphicon-star-empty"></i></span><span class="star"><i class="glyphicon glyphicon-star-empty"></i></span><span class="star"><i class="glyphicon glyphicon-star-empty"></i></span></span><span class="filled-stars" style="width: 0%;"><span class="star"><i class="glyphicon glyphicon-star"></i></span><span class="star"><i class="glyphicon glyphicon-star"></i></span><span class="star"><i class="glyphicon glyphicon-star"></i></span><span class="star"><i class="glyphicon glyphicon-star"></i></span><span class="star"><i class="glyphicon glyphicon-star"></i></span></span><input class="input-rating rating-input" name="input-name" type="number" style="display: none" value="0" disabled="disabled"></div></div>-->
<!--                                            </div>-->
<!--                                            <a href="/catalog/item/gazonokosilka_benzinovaya_deworks_l_43p/?reviews_mobile=Y" class="count-rate">0</a>-->
<!--                                            <div class="code">Артикул: L 43P</div>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                    <div class="list-features-item">-->
<!--                                    </div>-->
<!--                                    <div class="wrapp-rate-and-bonus-item">-->
<!--                                        <div class="rate-item">-->
<!--                                            <div class="bg-rate"><span><span class="bg-color"></span></span></div>-->
<!--                                            <a href="#" class="count-rate">79</a>-->
<!--                                        </div>-->
<!--                                        <div class="block-delivery-mobil">-->
<!--                                            <div class="delivery-product">-->
<!--                                                <div class="icon-delivery-product"><img src="/local/templates/czebra_daewoo/front/img/mobil/delivery-mob.svg">-->
<!--                                                </div>-->
<!--                                                <div class="text-delivery-product">-->
<!--                                                    <span>Доставка</span>-->
<!--                                                    <span>Завтра, 13.07</span>-->
<!--                                                </div>-->
<!--                                            </div>-->
<!--                                            <div class="pickup-product">-->
<!--                                                <div class="icon-pickup-product"><img src="/local/templates/czebra_daewoo/front/img/mobil/pickup-mob.svg"></div>-->
<!--                                                <div class="text-pickup-product">-->
<!--                                                    <span>Самовывоз</span>-->
<!--                                                    <span>Сегодня, 12.07</span>-->
<!--                                                </div>-->
<!--                                            </div>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                    <div class="wrapp-price-item">-->
<!--                                        <div class="old-price">-->
<!--                                            <div class="percent">-->
<!--                                                -11%</div>-->
<!--                                            <div class="value">18&nbsp;990 <span class="rubl">i</span></div>-->
<!--                                        </div>-->
<!--                                        <div class="price-item">16&nbsp;990 <span class="rubl">i</span></div>-->
<!--                                    </div>-->
<!--                                    <div class="btn-item">-->
<!--                                <span class="add-to-cart-item">-->
<!--                                    <a href="#" data-czaction="addtocart" data-czbuy="4891">-->
<!--                                        <span class="btn-trans">Купить</span>-->
<!--                                        <span class="btn-anim">Купить</span>-->
<!--                                    </a>-->
<!--                                </span>-->
<!--                                        <span class="quick-order">-->
<!--                                    <a href="#" onclick="quickOrder(event, '4891')">-->
<!--                                        <span class="btn-trans">Быстрый заказ</span>-->
<!--                                        <span class="btn-anim">Быстрый заказ</span>-->
<!--                                    </a>-->
<!--                                </span>-->
<!--                                    </div>-->
<!---->
<!---->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->

                        <div class="wrapp-item-new">
                            <div class="item-new mobil-item">
                                <div class="name-item-new"><a href="#">Газонокосилка бензиновая DeWORKS L 43P</a></div>
                                <div class="icon-item">
                                    <a href="#" class="compare-card"></a>
                                    <a href="#" class="favorites-card"></a>
                                </div>
                                <div class="block-item-new">
                                    <div class="img-item-new">
                                        <div class="stickers">
                                            <div class="novelty">Новинка</div>
                                        </div>
                                        <div class="img-item"><a href="#"><img src="/local/templates/czebra_daewoo/front/img/new-mobil-card/img.png" alt=""></a></div>
                                        <div class="rating-item">
                                            <div class="rating">
                                                <input class="input-rating rating-input" name="input-name" type="number" style="display: none" value="4.9" disabled="disabled">
                                            </div>
                                            <div class="count-rating"><a href="#">22</a></div>
                                        </div>
                                    </div>
                                    <div class="info-item-new">
                                        <div class="wrapp-price-item-new">
                                            <div class="old-price">
                                                <span>24 990 <span class="rubl">i</span></span>
                                            </div>
                                            <div class="price new-price">24 990 <span class="rubl">i</span></div>
                                        </div>
                                        <div class="avialable-new-item">
                                            <span class="yes-avialable">В наличии</span>
                                        </div>
                                        <div class="block-delivery">
                                            <div class="delivery-product">
                                                <div class="icon-delivery-product"><img src="/local/templates/czebra_daewoo/front/img/new-mobil-card/delivery.svg"></div>
                                                <div class="text-delivery-product">
                                                    <span>Доставка</span>
                                                    <span>Завтра, 10.07</span>
                                                </div>
                                            </div>
                                            <div class="pickup-product">
                                                <div class="icon-pickup-product"><img src="/local/templates/czebra_daewoo/front/img/new-mobil-card/pickup.svg"></div>
                                                <div class="text-pickup-product">
                                                    <span>Самовывоз</span>
                                                    <span>Сегодня, <span class="discount">-5%</span></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="btn-item">
                                            <span class="add-to-cart-item">
                                                <a href="#">
                                                    <span class="btn-trans">Купить</span>
                                                    <span class="btn-anim">Купить</span>
                                                </a>
                                            </span>
                                            <span class="quick-order">
                                                <a href="#">
                                                    <span class="btn-trans">Быстрый заказ</span>
                                                    <span class="btn-anim">Быстрый заказ</span>
                                                </a>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="item-new tablet-item">
                                <div class="top-item-tablet">
                                    <div class="name-item-new"><a href="#">Газонокосилка бензиновая DeWORKS L 43P</a></div>
                                    <div class="share"><a href="#"><img src="/local/templates/czebra_daewoo/front/img/new-mobil-card/share.svg" alt=""></a></div>
                                </div>
                                <div class="wrapp-info-item-tablet">

                                    <div class="left-item-tablet">
                                        <div class="img-item-tablet">
                                            <a href="#"><img src="/local/templates/czebra_daewoo/front/img/new-mobil-card/img-new-catalog.png" alt=""></a>
                                        </div>
                                        <div class="icon-item">
                                            <a href="#" class="compare-card"></a>
                                            <a href="#" class="favorites-card"></a>
                                        </div>
                                    </div>
                                    <div class="right-item-tablet">
                                        <div class="wrapp-info-item-tablet">
                                            <div class="wrapp-available">
                                                <div class="in-avialable">
                                                    <img src="/local/templates/czebra_daewoo/front/img/in-avialable.svg" alt="">
                                                    <span>В наличии</span>
                                                </div>
                                                <div class="avialable-magazine">
                                                    <img src="/local/templates/czebra_daewoo/front/img/magazine.svg" alt="">
                                                    <a href="#" id="btn_form_FORM_AVAILABILITY_SECTION1679" data-form="eJx9Ul1PgzAU%2FSvY58UwYB%2Fy1pXr1gwolrK4qGkYY8l0xmRR40f875YWpNkSX25u7z23Pff0fKOMs6ggAoXD8eRqgDARdAUoRCkaoGvGE0kjddIZXmEa4xmNqVjLHBSSpc2UQtJZzMjSYP1RXxDrrLlsV9fbTVk9qUaSz%2BVMpKp4%2F%2BYGw7qJgddEf6dzV%2Bcmmvq0xwSVuiLFCciM5ULCClJFHami2iMDrogRFkGOwjuULVgKLdwA9KIPp1jJ4aagHCJJFkCWM3arpv9BQaJkMBAOouCpLHhsSBQ5cJlAnuM5SBxF7ZbesN%2FPbBYM%2B818k9cXjlZka6GmuuRXOo503Fp5oOO4rwSuY91uFNudgbweE%2BzaAfO2Z2lvHm0ZeI7FdGNxH1sTV4azRXDkWERcq1GZxy%2BNZpLgTJAFbm23wjGNsIBGvrU6Cypi6KT09fzE0sK17eGcNmy2wcRi3riUYPXlnUnxmYv%2B%2Ftz8dmfml%2BNzM8uSTBksFVIbLETVV705lmHbFpBksVqi65bv5f5QbvaH%2FeunLB%2FLD%2FTzC0nR9Fw%3D">Наличие в магазинах</a>
                                                </div>
                                            </div>
                                            <div class="rate-item">
                                                <div class="rate">
                                                    <input class="input-rating rating-input" name="input-name" type="number" style="display: none" value="4.9090909090909" disabled="disabled">
                                                </div>
                                                <a href="/catalog/item/benzinovyi_generator_daewoo_gda_3500/?reviews=Y" class="count-reviews">22</a>
                                            </div>
                                            <div class="wrapp-price">
                                                <div class="price">24 990 <span class="rubl">i</span></div>
                                            </div>
                                            <div class="wrapp-delivery-item">
                                                <div class="delivery-item">
                                                    <img src="/local/templates/czebra_daewoo/front/img/delivery-item.svg" alt="">
                                                    <a href="/delivery/">Доставка</a>
                                                </div>
                                                <div class="date-delivery">Завтра, 13.07</div>
                                            </div>
                                            <div class="wrapp-pickup-item">
                                                <div class="pickup-item">
                                                    <img src="/local/templates/czebra_daewoo/front/img/pickup.svg" alt="">
                                                    <a href="/delivery/">Самовывоз</a>
                                                </div>
                                                <div class="date-pickup">Сегодня, 12.07</div>
                                            </div>
                                            <div class="btn-item">
                                                <span class="add-to-cart-item">
                                                    <a href="#">
                                                        <span class="btn-trans">Купить</span>
                                                        <span class="btn-anim">Купить</span>
                                                    </a>
                                                </span>
                                                <span class="quick-order">
                                                    <a href="#">
                                                        <span class="btn-trans">Быстрый заказ</span>
                                                        <span class="btn-anim">Быстрый заказ</span>
                                                    </a>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="wrapp-item-new">
                            <div class="item-new mobil-item">
                                <div class="name-item-new"><a href="#">Газонокосилка бензиновая DeWORKS L 43P</a></div>
                                <div class="icon-item">
                                    <a href="#" class="compare-card"></a>
                                    <a href="#" class="favorites-card"></a>
                                </div>
                                <div class="block-item-new">
                                    <div class="img-item-new">
                                        <div class="stickers">
                                            <div class="novelty">Новинка</div>
                                        </div>
                                        <div class="img-item"><a href="#"><img src="/local/templates/czebra_daewoo/front/img/new-mobil-card/img.png" alt=""></a></div>
                                        <div class="rating-item">
                                            <div class="rating">
                                                <input class="input-rating rating-input" name="input-name" type="number" style="display: none" value="4.9" disabled="disabled">
                                            </div>
                                            <div class="count-rating"><a href="#">22</a></div>
                                        </div>
                                    </div>
                                    <div class="info-item-new">
                                        <div class="wrapp-price-item-new">
                                            <div class="old-price">
                                                <span>24 990 <span class="rubl">i</span></span>
                                            </div>
                                            <div class="price new-price">24 990 <span class="rubl">i</span></div>
                                        </div>
                                        <div class="avialable-new-item">
                                            <span class="yes-avialable">В наличии</span>
                                        </div>
                                        <div class="block-delivery">
                                            <div class="delivery-product">
                                                <div class="icon-delivery-product"><img src="/local/templates/czebra_daewoo/front/img/new-mobil-card/delivery.svg"></div>
                                                <div class="text-delivery-product">
                                                    <span>Доставка</span>
                                                    <span>Завтра, 10.07</span>
                                                </div>
                                            </div>
                                            <div class="pickup-product">
                                                <div class="icon-pickup-product"><img src="/local/templates/czebra_daewoo/front/img/new-mobil-card/pickup.svg"></div>
                                                <div class="text-pickup-product">
                                                    <span>Самовывоз</span>
                                                    <span>Сегодня, <span class="discount">-5%</span></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="btn-item">
                                            <span class="add-to-cart-item">
                                                <a href="#">
                                                    <span class="btn-trans">Купить</span>
                                                    <span class="btn-anim">Купить</span>
                                                </a>
                                            </span>
                                            <span class="quick-order">
                                                <a href="#">
                                                    <span class="btn-trans">Быстрый заказ</span>
                                                    <span class="btn-anim">Быстрый заказ</span>
                                                </a>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="item-new tablet-item">
                                <div class="top-item-tablet">
                                    <div class="name-item-new"><a href="#">Газонокосилка бензиновая DeWORKS L 43P</a></div>
                                    <div class="share"><a href="#"><img src="/local/templates/czebra_daewoo/front/img/new-mobil-card/share.svg" alt=""></a></div>
                                </div>
                                <div class="wrapp-info-item-tablet">

                                    <div class="left-item-tablet">
                                        <div class="img-item-tablet">
                                            <a href="#"><img src="/local/templates/czebra_daewoo/front/img/new-mobil-card/img-new-catalog.png" alt=""></a>
                                        </div>
                                        <div class="icon-item">
                                            <a href="#" class="compare-card"></a>
                                            <a href="#" class="favorites-card"></a>
                                        </div>
                                    </div>
                                    <div class="right-item-tablet">
                                        <div class="wrapp-info-item-tablet">
                                            <div class="wrapp-available">
                                                <div class="in-avialable">
                                                    <img src="/local/templates/czebra_daewoo/front/img/in-avialable.svg" alt="">
                                                    <span>В наличии</span>
                                                </div>
                                                <div class="avialable-magazine">
                                                    <img src="/local/templates/czebra_daewoo/front/img/magazine.svg" alt="">
                                                    <a href="#" id="btn_form_FORM_AVAILABILITY_SECTION1679" data-form="eJx9Ul1PgzAU%2FSvY58UwYB%2Fy1pXr1gwolrK4qGkYY8l0xmRR40f875YWpNkSX25u7z23Pff0fKOMs6ggAoXD8eRqgDARdAUoRCkaoGvGE0kjddIZXmEa4xmNqVjLHBSSpc2UQtJZzMjSYP1RXxDrrLlsV9fbTVk9qUaSz%2BVMpKp4%2F%2BYGw7qJgddEf6dzV%2Bcmmvq0xwSVuiLFCciM5ULCClJFHami2iMDrogRFkGOwjuULVgKLdwA9KIPp1jJ4aagHCJJFkCWM3arpv9BQaJkMBAOouCpLHhsSBQ5cJlAnuM5SBxF7ZbesN%2FPbBYM%2B818k9cXjlZka6GmuuRXOo503Fp5oOO4rwSuY91uFNudgbweE%2BzaAfO2Z2lvHm0ZeI7FdGNxH1sTV4azRXDkWERcq1GZxy%2BNZpLgTJAFbm23wjGNsIBGvrU6Cypi6KT09fzE0sK17eGcNmy2wcRi3riUYPXlnUnxmYv%2B%2Ftz8dmfml%2BNzM8uSTBksFVIbLETVV705lmHbFpBksVqi65bv5f5QbvaH%2FeunLB%2FLD%2FTzC0nR9Fw%3D">Наличие в магазинах</a>
                                                </div>
                                            </div>
                                            <div class="rate-item">
                                                <div class="rate">
                                                    <input class="input-rating rating-input" name="input-name" type="number" style="display: none" value="4.9090909090909" disabled="disabled">
                                                </div>
                                                <a href="/catalog/item/benzinovyi_generator_daewoo_gda_3500/?reviews=Y" class="count-reviews">22</a>
                                            </div>
                                            <div class="wrapp-price">
                                                <div class="price">24 990 <span class="rubl">i</span></div>
                                            </div>
                                            <div class="wrapp-delivery-item">
                                                <div class="delivery-item">
                                                    <img src="/local/templates/czebra_daewoo/front/img/delivery-item.svg" alt="">
                                                    <a href="/delivery/">Доставка</a>
                                                </div>
                                                <div class="date-delivery">Завтра, 13.07</div>
                                            </div>
                                            <div class="wrapp-pickup-item">
                                                <div class="pickup-item">
                                                    <img src="/local/templates/czebra_daewoo/front/img/pickup.svg" alt="">
                                                    <a href="/delivery/">Самовывоз</a>
                                                </div>
                                                <div class="date-pickup">Сегодня, 12.07</div>
                                            </div>
                                            <div class="btn-item">
                                                <span class="add-to-cart-item">
                                                    <a href="#">
                                                        <span class="btn-trans">Купить</span>
                                                        <span class="btn-anim">Купить</span>
                                                    </a>
                                                </span>
                                                <span class="quick-order">
                                                    <a href="#">
                                                        <span class="btn-trans">Быстрый заказ</span>
                                                        <span class="btn-anim">Быстрый заказ</span>
                                                    </a>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="wrapp-item-new">
                            <div class="item-new mobil-item">
                                <div class="name-item-new"><a href="#">Газонокосилка бензиновая DeWORKS L 43P</a></div>
                                <div class="icon-item">
                                    <a href="#" class="compare-card"></a>
                                    <a href="#" class="favorites-card"></a>
                                </div>
                                <div class="block-item-new">
                                    <div class="img-item-new">
                                        <div class="stickers">
                                            <div class="novelty">Новинка</div>
                                        </div>
                                        <div class="img-item"><a href="#"><img src="/local/templates/czebra_daewoo/front/img/new-mobil-card/img.png" alt=""></a></div>
                                        <div class="rating-item">
                                            <div class="rating">
                                                <input class="input-rating rating-input" name="input-name" type="number" style="display: none" value="4.9" disabled="disabled">
                                            </div>
                                            <div class="count-rating"><a href="#">22</a></div>
                                        </div>
                                    </div>
                                    <div class="info-item-new">
                                        <div class="wrapp-price-item-new">
                                            <div class="old-price">
                                                <span>24 990 <span class="rubl">i</span></span>
                                            </div>
                                            <div class="price new-price">24 990 <span class="rubl">i</span></div>
                                        </div>
                                        <div class="avialable-new-item">
                                            <span class="yes-avialable">В наличии</span>
                                        </div>
                                        <div class="block-delivery">
                                            <div class="delivery-product">
                                                <div class="icon-delivery-product"><img src="/local/templates/czebra_daewoo/front/img/new-mobil-card/delivery.svg"></div>
                                                <div class="text-delivery-product">
                                                    <span>Доставка</span>
                                                    <span>Завтра, 10.07</span>
                                                </div>
                                            </div>
                                            <div class="pickup-product">
                                                <div class="icon-pickup-product"><img src="/local/templates/czebra_daewoo/front/img/new-mobil-card/pickup.svg"></div>
                                                <div class="text-pickup-product">
                                                    <span>Самовывоз</span>
                                                    <span>Сегодня, <span class="discount">-5%</span></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="btn-item">
                                            <span class="add-to-cart-item">
                                                <a href="#">
                                                    <span class="btn-trans">Купить</span>
                                                    <span class="btn-anim">Купить</span>
                                                </a>
                                            </span>
                                            <span class="quick-order">
                                                <a href="#">
                                                    <span class="btn-trans">Быстрый заказ</span>
                                                    <span class="btn-anim">Быстрый заказ</span>
                                                </a>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="item-new tablet-item">
                                <div class="top-item-tablet">
                                    <div class="name-item-new"><a href="#">Газонокосилка бензиновая DeWORKS L 43P</a></div>
                                    <div class="share"><a href="#"><img src="/local/templates/czebra_daewoo/front/img/new-mobil-card/share.svg" alt=""></a></div>
                                </div>
                                <div class="wrapp-info-item-tablet">

                                    <div class="left-item-tablet">
                                        <div class="img-item-tablet">
                                            <a href="#"><img src="/local/templates/czebra_daewoo/front/img/new-mobil-card/img-new-catalog.png" alt=""></a>
                                        </div>
                                        <div class="icon-item">
                                            <a href="#" class="compare-card"></a>
                                            <a href="#" class="favorites-card"></a>
                                        </div>
                                    </div>
                                    <div class="right-item-tablet">
                                        <div class="wrapp-info-item-tablet">
                                            <div class="wrapp-available">
                                                <div class="in-avialable">
                                                    <img src="/local/templates/czebra_daewoo/front/img/in-avialable.svg" alt="">
                                                    <span>В наличии</span>
                                                </div>
                                                <div class="avialable-magazine">
                                                    <img src="/local/templates/czebra_daewoo/front/img/magazine.svg" alt="">
                                                    <a href="#" id="btn_form_FORM_AVAILABILITY_SECTION1679" data-form="eJx9Ul1PgzAU%2FSvY58UwYB%2Fy1pXr1gwolrK4qGkYY8l0xmRR40f875YWpNkSX25u7z23Pff0fKOMs6ggAoXD8eRqgDARdAUoRCkaoGvGE0kjddIZXmEa4xmNqVjLHBSSpc2UQtJZzMjSYP1RXxDrrLlsV9fbTVk9qUaSz%2BVMpKp4%2F%2BYGw7qJgddEf6dzV%2Bcmmvq0xwSVuiLFCciM5ULCClJFHami2iMDrogRFkGOwjuULVgKLdwA9KIPp1jJ4aagHCJJFkCWM3arpv9BQaJkMBAOouCpLHhsSBQ5cJlAnuM5SBxF7ZbesN%2FPbBYM%2B818k9cXjlZka6GmuuRXOo503Fp5oOO4rwSuY91uFNudgbweE%2BzaAfO2Z2lvHm0ZeI7FdGNxH1sTV4azRXDkWERcq1GZxy%2BNZpLgTJAFbm23wjGNsIBGvrU6Cypi6KT09fzE0sK17eGcNmy2wcRi3riUYPXlnUnxmYv%2B%2Ftz8dmfml%2BNzM8uSTBksFVIbLETVV705lmHbFpBksVqi65bv5f5QbvaH%2FeunLB%2FLD%2FTzC0nR9Fw%3D">Наличие в магазинах</a>
                                                </div>
                                            </div>
                                            <div class="rate-item">
                                                <div class="rate">
                                                    <input class="input-rating rating-input" name="input-name" type="number" style="display: none" value="4.9090909090909" disabled="disabled">
                                                </div>
                                                <a href="/catalog/item/benzinovyi_generator_daewoo_gda_3500/?reviews=Y" class="count-reviews">22</a>
                                            </div>
                                            <div class="wrapp-price">
                                                <div class="price">24 990 <span class="rubl">i</span></div>
                                            </div>
                                            <div class="wrapp-delivery-item">
                                                <div class="delivery-item">
                                                    <img src="/local/templates/czebra_daewoo/front/img/delivery-item.svg" alt="">
                                                    <a href="/delivery/">Доставка</a>
                                                </div>
                                                <div class="date-delivery">Завтра, 13.07</div>
                                            </div>
                                            <div class="wrapp-pickup-item">
                                                <div class="pickup-item">
                                                    <img src="/local/templates/czebra_daewoo/front/img/pickup.svg" alt="">
                                                    <a href="/delivery/">Самовывоз</a>
                                                </div>
                                                <div class="date-pickup">Сегодня, 12.07</div>
                                            </div>
                                            <div class="btn-item">
                                                <span class="add-to-cart-item">
                                                    <a href="#">
                                                        <span class="btn-trans">Купить</span>
                                                        <span class="btn-anim">Купить</span>
                                                    </a>
                                                </span>
                                                <span class="quick-order">
                                                    <a href="#">
                                                        <span class="btn-trans">Быстрый заказ</span>
                                                        <span class="btn-anim">Быстрый заказ</span>
                                                    </a>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="wrapp-item-new">
                            <div class="item-new mobil-item">
                                <div class="name-item-new"><a href="#">Газонокосилка бензиновая DeWORKS L 43P</a></div>
                                <div class="icon-item">
                                    <a href="#" class="compare-card"></a>
                                    <a href="#" class="favorites-card"></a>
                                </div>
                                <div class="block-item-new">
                                    <div class="img-item-new">
                                        <div class="stickers">
                                            <div class="novelty">Новинка</div>
                                        </div>
                                        <div class="img-item"><a href="#"><img src="/local/templates/czebra_daewoo/front/img/new-mobil-card/img.png" alt=""></a></div>
                                        <div class="rating-item">
                                            <div class="rating">
                                                <input class="input-rating rating-input" name="input-name" type="number" style="display: none" value="4.9" disabled="disabled">
                                            </div>
                                            <div class="count-rating"><a href="#">22</a></div>
                                        </div>
                                    </div>
                                    <div class="info-item-new">
                                        <div class="wrapp-price-item-new">
                                            <div class="old-price">
                                                <span>24 990 <span class="rubl">i</span></span>
                                            </div>
                                            <div class="price new-price">24 990 <span class="rubl">i</span></div>
                                        </div>
                                        <div class="avialable-new-item">
                                            <span class="yes-avialable">В наличии</span>
                                        </div>
                                        <div class="block-delivery">
                                            <div class="delivery-product">
                                                <div class="icon-delivery-product"><img src="/local/templates/czebra_daewoo/front/img/new-mobil-card/delivery.svg"></div>
                                                <div class="text-delivery-product">
                                                    <span>Доставка</span>
                                                    <span>Завтра, 10.07</span>
                                                </div>
                                            </div>
                                            <div class="pickup-product">
                                                <div class="icon-pickup-product"><img src="/local/templates/czebra_daewoo/front/img/new-mobil-card/pickup.svg"></div>
                                                <div class="text-pickup-product">
                                                    <span>Самовывоз</span>
                                                    <span>Сегодня, <span class="discount">-5%</span></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="btn-item">
                                            <span class="add-to-cart-item">
                                                <a href="#">
                                                    <span class="btn-trans">Купить</span>
                                                    <span class="btn-anim">Купить</span>
                                                </a>
                                            </span>
                                            <span class="quick-order">
                                                <a href="#">
                                                    <span class="btn-trans">Быстрый заказ</span>
                                                    <span class="btn-anim">Быстрый заказ</span>
                                                </a>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="item-new tablet-item">
                                <div class="top-item-tablet">
                                    <div class="name-item-new"><a href="#">Газонокосилка бензиновая DeWORKS L 43P</a></div>
                                    <div class="share"><a href="#"><img src="/local/templates/czebra_daewoo/front/img/new-mobil-card/share.svg" alt=""></a></div>
                                </div>
                                <div class="wrapp-info-item-tablet">

                                    <div class="left-item-tablet">
                                        <div class="img-item-tablet">
                                            <a href="#"><img src="/local/templates/czebra_daewoo/front/img/new-mobil-card/img-new-catalog.png" alt=""></a>
                                        </div>
                                        <div class="icon-item">
                                            <a href="#" class="compare-card"></a>
                                            <a href="#" class="favorites-card"></a>
                                        </div>
                                    </div>
                                    <div class="right-item-tablet">
                                        <div class="wrapp-info-item-tablet">
                                            <div class="wrapp-available">
                                                <div class="in-avialable">
                                                    <img src="/local/templates/czebra_daewoo/front/img/in-avialable.svg" alt="">
                                                    <span>В наличии</span>
                                                </div>
                                                <div class="avialable-magazine">
                                                    <img src="/local/templates/czebra_daewoo/front/img/magazine.svg" alt="">
                                                    <a href="#" id="btn_form_FORM_AVAILABILITY_SECTION1679" data-form="eJx9Ul1PgzAU%2FSvY58UwYB%2Fy1pXr1gwolrK4qGkYY8l0xmRR40f875YWpNkSX25u7z23Pff0fKOMs6ggAoXD8eRqgDARdAUoRCkaoGvGE0kjddIZXmEa4xmNqVjLHBSSpc2UQtJZzMjSYP1RXxDrrLlsV9fbTVk9qUaSz%2BVMpKp4%2F%2BYGw7qJgddEf6dzV%2Bcmmvq0xwSVuiLFCciM5ULCClJFHami2iMDrogRFkGOwjuULVgKLdwA9KIPp1jJ4aagHCJJFkCWM3arpv9BQaJkMBAOouCpLHhsSBQ5cJlAnuM5SBxF7ZbesN%2FPbBYM%2B818k9cXjlZka6GmuuRXOo503Fp5oOO4rwSuY91uFNudgbweE%2BzaAfO2Z2lvHm0ZeI7FdGNxH1sTV4azRXDkWERcq1GZxy%2BNZpLgTJAFbm23wjGNsIBGvrU6Cypi6KT09fzE0sK17eGcNmy2wcRi3riUYPXlnUnxmYv%2B%2Ftz8dmfml%2BNzM8uSTBksFVIbLETVV705lmHbFpBksVqi65bv5f5QbvaH%2FeunLB%2FLD%2FTzC0nR9Fw%3D">Наличие в магазинах</a>
                                                </div>
                                            </div>
                                            <div class="rate-item">
                                                <div class="rate">
                                                    <input class="input-rating rating-input" name="input-name" type="number" style="display: none" value="4.9090909090909" disabled="disabled">
                                                </div>
                                                <a href="/catalog/item/benzinovyi_generator_daewoo_gda_3500/?reviews=Y" class="count-reviews">22</a>
                                            </div>
                                            <div class="wrapp-price">
                                                <div class="price">24 990 <span class="rubl">i</span></div>
                                            </div>
                                            <div class="wrapp-delivery-item">
                                                <div class="delivery-item">
                                                    <img src="/local/templates/czebra_daewoo/front/img/delivery-item.svg" alt="">
                                                    <a href="/delivery/">Доставка</a>
                                                </div>
                                                <div class="date-delivery">Завтра, 13.07</div>
                                            </div>
                                            <div class="wrapp-pickup-item">
                                                <div class="pickup-item">
                                                    <img src="/local/templates/czebra_daewoo/front/img/pickup.svg" alt="">
                                                    <a href="/delivery/">Самовывоз</a>
                                                </div>
                                                <div class="date-pickup">Сегодня, 12.07</div>
                                            </div>
                                            <div class="btn-item">
                                                <span class="add-to-cart-item">
                                                    <a href="#">
                                                        <span class="btn-trans">Купить</span>
                                                        <span class="btn-anim">Купить</span>
                                                    </a>
                                                </span>
                                                <span class="quick-order">
                                                    <a href="#">
                                                        <span class="btn-trans">Быстрый заказ</span>
                                                        <span class="btn-anim">Быстрый заказ</span>
                                                    </a>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

<!--                        <div class="wrapp-item-new">-->
<!--                            <div class="item-new">-->
<!--                                <div class="name-item-new"><a href="#">Газонокосилка бензиновая DeWORKS L 43P</a></div>-->
<!--                                <div class="icon-item">-->
<!--                                    <a href="#" class="compare-card"></a>-->
<!--                                    <a href="#" class="favorites-card"></a>-->
<!--                                </div>-->
<!--                                <div class="block-item-new">-->
<!--                                    <div class="img-item-new">-->
<!--                                        <div class="stickers">-->
<!--                                            <div class="novelty">Новинка</div>-->
<!--                                        </div>-->
<!--                                        <div class="img-item"><a href="#"><img src="/local/templates/czebra_daewoo/front/img/new-mobil-card/img.png" alt=""></a></div>-->
<!--                                        <div class="rating-item">-->
<!--                                            <div class="rating">-->
<!--                                                <input class="input-rating rating-input" name="input-name" type="number" style="display: none" value="4.9" disabled="disabled">-->
<!--                                            </div>-->
<!--                                            <div class="count-rating"><a href="#">22</a></div>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                    <div class="info-item-new">-->
<!--                                        <div class="wrapp-price-item-new">-->
<!--                                            <div class="old-price">-->
<!--                                                <span>24 990 <span class="rubl">i</span></span>-->
<!--                                            </div>-->
<!--                                            <div class="price new-price">24 990 <span class="rubl">i</span></div>-->
<!--                                        </div>-->
<!--                                        <div class="avialable-new-item">-->
<!--                                            <span class="yes-avialable">В наличии</span>-->
<!--                                        </div>-->
<!--                                        <div class="block-delivery">-->
<!--                                            <div class="delivery-product">-->
<!--                                                <div class="icon-delivery-product"><img src="/local/templates/czebra_daewoo/front/img/new-mobil-card/delivery.svg"></div>-->
<!--                                                <div class="text-delivery-product">-->
<!--                                                    <span>Доставка</span>-->
<!--                                                    <span>Завтра, 10.07</span>-->
<!--                                                </div>-->
<!--                                            </div>-->
<!--                                            <div class="pickup-product">-->
<!--                                                <div class="icon-pickup-product"><img src="/local/templates/czebra_daewoo/front/img/new-mobil-card/pickup.svg"></div>-->
<!--                                                <div class="text-pickup-product">-->
<!--                                                    <span>Самовывоз</span>-->
<!--                                                    <span>Сегодня, <span class="discount">-5%</span></span>-->
<!--                                                </div>-->
<!--                                            </div>-->
<!--                                        </div>-->
<!--                                        <div class="btn-item">-->
<!--                                                <span class="add-to-cart-item">-->
<!--                                                    <a href="#">-->
<!--                                                        <span class="btn-trans">Купить</span>-->
<!--                                                        <span class="btn-anim">Купить</span>-->
<!--                                                    </a>-->
<!--                                                </span>-->
<!--                                            <span class="quick-order">-->
<!--                                                    <a href="#">-->
<!--                                                        <span class="btn-trans">Быстрый заказ</span>-->
<!--                                                        <span class="btn-anim">Быстрый заказ</span>-->
<!--                                                    </a>-->
<!--                                                </span>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
<!---->
<!--                        <div class="wrapp-item-new">-->
<!--                            <div class="item-new">-->
<!--                                <div class="name-item-new"><a href="#">Газонокосилка бензиновая DeWORKS L 43P</a></div>-->
<!--                                <div class="icon-item">-->
<!--                                    <a href="#" class="compare-card"></a>-->
<!--                                    <a href="#" class="favorites-card"></a>-->
<!--                                </div>-->
<!--                                <div class="block-item-new">-->
<!--                                    <div class="img-item-new">-->
<!--                                        <div class="stickers">-->
<!--                                            <div class="novelty">Новинка</div>-->
<!--                                        </div>-->
<!--                                        <div class="img-item"><a href="#"><img src="/local/templates/czebra_daewoo/front/img/new-mobil-card/img.png" alt=""></a></div>-->
<!--                                        <div class="rating-item">-->
<!--                                            <div class="rating">-->
<!--                                                <input class="input-rating rating-input" name="input-name" type="number" style="display: none" value="4.9" disabled="disabled">-->
<!--                                            </div>-->
<!--                                            <div class="count-rating"><a href="#">22</a></div>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                    <div class="info-item-new">-->
<!--                                        <div class="wrapp-price-item-new">-->
<!--                                            <div class="old-price">-->
<!--                                                <span>24 990 <span class="rubl">i</span></span>-->
<!--                                            </div>-->
<!--                                            <div class="price new-price">24 990 <span class="rubl">i</span></div>-->
<!--                                        </div>-->
<!--                                        <div class="avialable-new-item">-->
<!--                                            <span class="yes-avialable">В наличии</span>-->
<!--                                        </div>-->
<!--                                        <div class="block-delivery">-->
<!--                                            <div class="delivery-product">-->
<!--                                                <div class="icon-delivery-product"><img src="/local/templates/czebra_daewoo/front/img/new-mobil-card/delivery.svg"></div>-->
<!--                                                <div class="text-delivery-product">-->
<!--                                                    <span>Доставка</span>-->
<!--                                                    <span>Завтра, 10.07</span>-->
<!--                                                </div>-->
<!--                                            </div>-->
<!--                                            <div class="pickup-product">-->
<!--                                                <div class="icon-pickup-product"><img src="/local/templates/czebra_daewoo/front/img/new-mobil-card/pickup.svg"></div>-->
<!--                                                <div class="text-pickup-product">-->
<!--                                                    <span>Самовывоз</span>-->
<!--                                                    <span>Сегодня, <span class="discount">-5%</span></span>-->
<!--                                                </div>-->
<!--                                            </div>-->
<!--                                        </div>-->
<!--                                        <div class="btn-item">-->
<!--                                                <span class="add-to-cart-item">-->
<!--                                                    <a href="#">-->
<!--                                                        <span class="btn-trans">Купить</span>-->
<!--                                                        <span class="btn-anim">Купить</span>-->
<!--                                                    </a>-->
<!--                                                </span>-->
<!--                                            <span class="quick-order">-->
<!--                                                    <a href="#">-->
<!--                                                        <span class="btn-trans">Быстрый заказ</span>-->
<!--                                                        <span class="btn-anim">Быстрый заказ</span>-->
<!--                                                    </a>-->
<!--                                                </span>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
<!---->
<!--                        <div class="wrapp-item-new">-->
<!--                            <div class="item-new">-->
<!--                                <div class="name-item-new"><a href="#">Газонокосилка бензиновая DeWORKS L 43P</a></div>-->
<!--                                <div class="icon-item">-->
<!--                                    <a href="#" class="compare-card"></a>-->
<!--                                    <a href="#" class="favorites-card"></a>-->
<!--                                </div>-->
<!--                                <div class="block-item-new">-->
<!--                                    <div class="img-item-new">-->
<!--                                        <div class="stickers">-->
<!--                                            <div class="novelty">Новинка</div>-->
<!--                                        </div>-->
<!--                                        <div class="img-item"><a href="#"><img src="/local/templates/czebra_daewoo/front/img/new-mobil-card/img.png" alt=""></a></div>-->
<!--                                        <div class="rating-item">-->
<!--                                            <div class="rating">-->
<!--                                                <input class="input-rating rating-input" name="input-name" type="number" style="display: none" value="4.9" disabled="disabled">-->
<!--                                            </div>-->
<!--                                            <div class="count-rating"><a href="#">22</a></div>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                    <div class="info-item-new">-->
<!--                                        <div class="wrapp-price-item-new">-->
<!--                                            <div class="old-price">-->
<!--                                                <span>24 990 <span class="rubl">i</span></span>-->
<!--                                            </div>-->
<!--                                            <div class="price new-price">24 990 <span class="rubl">i</span></div>-->
<!--                                        </div>-->
<!--                                        <div class="avialable-new-item">-->
<!--                                            <span class="yes-avialable">В наличии</span>-->
<!--                                        </div>-->
<!--                                        <div class="block-delivery">-->
<!--                                            <div class="delivery-product">-->
<!--                                                <div class="icon-delivery-product"><img src="/local/templates/czebra_daewoo/front/img/new-mobil-card/delivery.svg"></div>-->
<!--                                                <div class="text-delivery-product">-->
<!--                                                    <span>Доставка</span>-->
<!--                                                    <span>Завтра, 10.07</span>-->
<!--                                                </div>-->
<!--                                            </div>-->
<!--                                            <div class="pickup-product">-->
<!--                                                <div class="icon-pickup-product"><img src="/local/templates/czebra_daewoo/front/img/new-mobil-card/pickup.svg"></div>-->
<!--                                                <div class="text-pickup-product">-->
<!--                                                    <span>Самовывоз</span>-->
<!--                                                    <span>Сегодня, <span class="discount">-5%</span></span>-->
<!--                                                </div>-->
<!--                                            </div>-->
<!--                                        </div>-->
<!--                                        <div class="btn-item">-->
<!--                                                <span class="add-to-cart-item">-->
<!--                                                    <a href="#">-->
<!--                                                        <span class="btn-trans">Купить</span>-->
<!--                                                        <span class="btn-anim">Купить</span>-->
<!--                                                    </a>-->
<!--                                                </span>-->
<!--                                            <span class="quick-order">-->
<!--                                                    <a href="#">-->
<!--                                                        <span class="btn-trans">Быстрый заказ</span>-->
<!--                                                        <span class="btn-anim">Быстрый заказ</span>-->
<!--                                                    </a>-->
<!--                                                </span>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->



                        <a href="#" id="btn_form_FORM_ANALOG_SECTION2190" data-form="eJx9Uk1vwjAM%2FStdzmhqS0HQW0g9qGiTLk3R0DZFUMom7QOJaZdN%2B%2B9L40KjIe1iOc6z857zvkkhRVIxReIwmPoDQplKV0BiwsmA3AiZ6zQxJ5tRTjMx1yUYjOAt3mDSWSbYElFR0BfUumjH7Jtmt93UL%2BYiL%2Bd6prgpPnz6UdC0MQrbONzb3Lc5RqxPekxUmxGc5qALUSoNK%2BCGNDFFo6AAqdaaiQRKEt%2BTYiE4dHAEWIkDAjlNM%2FL4t0dLuK1SCYlmC2DLmbgzU%2F5B4RgLkaAqyXUlMyRTlSB1DmVJ56BpknRqw6DXiQqjoFc4xLy58uxmdg5qYkvD2saRjTsnj2wc95XI95zpuLn9BSjsMdG%2Ba8C3Q%2BcP8NGOQeg5TLcO97HTMUXODsGR5xDxnYsaH7%2FGnWlGC8UWtDPeimZpQhW061ubs0pVBifjoJzG0d%2F01FwTnYzjOQyd3XYqsHloXmHUfP%2FJuPTCWef%2Fx58%2FGfxwfGt7RV4Y03GlreliUn812%2BMm7q4V5EVmBJ1vnw8fjd68b14PT%2BTnF1Om9ek%3D" style="display: none">Подобрать аналог</a>
                        <div class="more-item">
                            <a data-ajax-id="58c2b0d099b0be352043fe9df5801a7a" href="javascript:void(0)" data-show-more="3" data-next-page="2" data-max-page="2">Показать еще</a>
                        </div>
                    </div>

                </div>
            </div>
        </div></div>



<?require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php");?>