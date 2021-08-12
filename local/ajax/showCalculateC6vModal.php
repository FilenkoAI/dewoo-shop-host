<?php
define("NO_KEEP_STATISTIC", true);
define("NOT_CHECK_PERMISSIONS", true);
require_once $_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_before.php";

use Bitrix\Main\Application;

$arDepartureCities = \Czebra\Project\C6v::getDepartureCities();
$arReceivingCities = \Czebra\Project\C6v::getCitiesHlblock();
?>

<div class="modal fade" id="modal-calculate-c6v">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <a href="javascript:void(0)" data-dismiss="modal" class="close-modal"></a>
                <div class="modal-title">Рассчитать стоимость доставки</div>
                <form id="form-calculate-c6v">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="startCity">Город отправления</label>
                            <select class="form-control" id="startCity" data-live-search="true">
                                <?foreach ($arDepartureCities as $city):?>
                                    <option value="<?=urlencode($city['NAME'])?>"><?=$city['NAME']?></option>
                                <?endforeach;?>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="endCity">Город получения</label>
                            <select class="form-control" id="endCity" data-live-search="true">
                                <?foreach ($arReceivingCities as $city):?>
                                    <option value="<?=urlencode($city['NAME'])?>"><?=$city['NAME']?></option>
                                <?endforeach;?>
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label for="length">Длина, см</label>
                            <input class="form-control" id="calculate-length">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="width">Ширина, см</label>
                            <input class="form-control" id="calculate-width">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="height">Высота, см</label>
                            <input class="form-control" id="calculate-height">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="weight">Вес, кг</label>
                            <input class="form-control" id="calculate-weight">
                        </div>
                    </div>
                    <div class="btn btn-primary">Рассчитать</div>
                    <div id="delivery-result"></div>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->