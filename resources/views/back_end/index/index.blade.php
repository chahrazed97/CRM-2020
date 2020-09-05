@extends('layouts.squelette_admin')
@section('titre', 'Tableau de bord')
@section('contenu')
    <div class="main-content-inner">
        <!-- bar chart start -->
        <div class="row">
            <div class="col-lg-7 mt-5">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">localisation géographique de nos clients</h4>
                        <div id="seomap"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-5 mt-5">
                <div class="card">
                    <div class="seo-fact sbg2">
                        <div class="p-4 d-flex justify-content-between align-items-center">
                            <div class="seofct-icon"><i class="fa fa-user-plus"></i>Nombre clients</div>
                            <h2>{{ $nbr_client }}</h2>
                        </div>
                    </div>
                </div>

                <div class="card mt-2">
                    <div class="seo-fact sbg3">
                        <div class="p-4 d-flex justify-content-between align-items-center">
                            <div class="seofct-icon"><i class="fa fa-user"></i>Nombre prospects</div>
                            <h2>{{ $nbr_prospect }}</h2>
                        </div>
                    </div>
                </div>

                <div class="card mt-2">
                    <div class="seo-fact sbg4">
                        <div class="p-4 d-flex justify-content-between align-items-center">
                            <div class="seofct-icon"><i class="fa fa-bullhorn"></i>Promo en cours</div>
                            <h2>{{ $promo_enCours }}</h2>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-12 mt-5">
                <div class="card">
                    <div class="card-body">
                    <h4 class="header-title">Segmentation des clients selon leur score</h4>
                        <div id="ambarchart1"></div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 mt-5">
                <div class="card">
                    <div class="card-body">
                    <h4 class="header-title">Nos produits les plus vendus</h4>
                        <div id="ambarchart2"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 mt-5">
                <div class="card">
                    <div class="card-body">
                    <h4 class="header-title">Les promo les plus répondues </h4>
                        <div id="ambarchart3"></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- bar chart end -->
    </div>
 
    @endsection
    @section('chart')
    <!-- start chart js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js"></script>
    <!-- start highcharts js -->
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <!-- start zingchart js -->
    <script src="https://cdn.zingchart.com/zingchart.min.js"></script>
    <script>
    zingchart.MODULESDIR = "https://cdn.zingchart.com/modules/";
    ZC.LICENSE = ["569d52cefae586f634c54f86dc99e6a9", "ee6b7db5b51705a13dc2339db3edaf6d"];
    </script>
    <!-- start amchart js -->
    <script src="https://www.amcharts.com/lib/3/amcharts.js"></script>
    <script src="https://www.amcharts.com/lib/3/ammap.js"></script>
    <script src="https://www.amcharts.com/lib/3/maps/js/worldLow.js"></script>
    <script src="https://www.amcharts.com/lib/3/serial.js"></script>
    <script src="https://www.amcharts.com/lib/3/plugins/export/export.min.js"></script>
    <script src="https://www.amcharts.com/lib/3/themes/light.js"></script>
    <script>
        /*--------------  bar chart 12 amchart start ------------*/
if ($('#ambarchart1').length) {
    var chart = AmCharts.makeChart("ambarchart1", {
        "type": "serial",
        "theme": "light",
        "dataProvider": [
        <?php foreach($action_marketing as $act_marketing){ ?>
            {
            "name": "{{ 'segment'.$act_marketing->segment }}",
            "points": {{ $act_marketing->nbrClientParSegment() }},
            "color": "#7F8DA9"
            },<?php } ?> ],
        "valueAxes": [{
            "maximum": 10,
            "minimum": 0,
            "axisAlpha": 0,
            "dashLength": 4,
            "position": "left"
        }],
        "startDuration": 1,
        "graphs": [{
            "balloonText": "<span style='font-size:13px;'>[[category]]: <b>[[value]]</b></span>",
            "bulletOffset": 10,
            "bulletSize": 52,
            "colorField": "color",
            "cornerRadiusTop": 8,
            "customBulletField": "bullet",
            "fillAlphas": 0.8,
            "lineAlpha": 0,
            "type": "column",
            "valueField": "points"
        }],
        "marginTop": 0,
        "marginRight": 0,
        "marginLeft": 0,
        "marginBottom": 0,
        "autoMargins": false,
        "categoryField": "name",
        "categoryAxis": {
            "axisAlpha": 0,
            "gridAlpha": 0,
            "inside": true,
            "tickLength": 10,
            "color": "#fff"
        },
        "export": {
            "enabled": false
        }
    });
}
/*--------------  bar chart 12 amchart END ------------*/
    </script>
    <!-- all bar chart activation -->
    <script>
        /*--------------  bar chart 08 amchart start ------------*/
if ($('#ambarchart2').length) {
    var chart = AmCharts.makeChart("ambarchart2", {
        "theme": "light",
        "type": "serial",
        "balloon": {
            "adjustBorderColor": false,
            "horizontalPadding": 10,
            "verticalPadding": 4,
            "color": "#fff"
        },
        
        "dataProvider": [ <?php foreach($dix_top_produit as $produit => $nbr_vent){ ?> {
            "country": "{{ $produit }}",
            "year2004": {{ $nbr_vent }},
            "color": "#bfbffd",
        }, <?php } ?>],
        "valueAxes": [{
            "unit": "",
            "position": "left",
        }],
        "startDuration": 0,
        "graphs": [{
            "balloonText": "[[category]] : <b>[[value]]</b>",
            "fillAlphas": 1,
            "fillColorsField": "color",
            "lineAlpha": 1,
            "title": "2017",
            "type": "column",
            "valueField": "year2004"
        }, {
            "balloonText": "GDP grow in [[category]] (2018): <b>[[value]] ventes</b>",
            "fillAlphas": 0.9,
            "fillColorsField": "color2",
            "lineAlpha": 0.2,
            "title": "2018",
            "type": "column",
            "clustered": false,
            "columnWidth": 0.5,
            "valueField": "year2005"
        }],
        "plotAreaFillAlphas": 0.1,
        "categoryField": "country",
        "categoryAxis": {
            "gridPosition": "start"
        },
        "categoryField": "country",
        "categoryAxis": {
            "gridPosition": "start",
            "labelRotation": 45
        },
        "export": {
            "enabled": false
        }

    });
}

/*--------------  bar chart 08 amchart END ------------*/
</script>
<script>
    /*--------------  bar chart 13 amchart start ------------*/
if ($('#ambarchart3').length) {
    var chart = AmCharts.makeChart("ambarchart3", {
        "type": "serial",
        "theme": "light",
        "handDrawn": true,
        "handDrawScatter": 3,
        "legend": {
            "useGraphSettings": true,
            "markerSize": 12,
            "valueWidth": 0,
            "verticalGap": 0
        },
        "dataProvider": [ <?php foreach($dix_top_promo as $promo => $nbr_vent){ ?>
        {
            "year": "{{ $promo }}",
            "income": {{ $nbr_vent }},
            "color": "#952FFE"
        }, <?php } ?>],
        "valueAxes": [{
            "minorGridAlpha": 0.08,
            "minorGridEnabled": true,
            "position": "top",
            "axisAlpha": 0
        }],
        "startDuration": 1,
        "graphs": [{
            "balloonText": "<span style='font-size:13px;'>[[title]] in [[category]]:<b>[[value]]</b></span>",
            "title": "Income",
            "type": "column",
            "fillAlphas": 1,
            "fillColorsField": "color",
            "valueField": "income"
        }, {
            "balloonText": "<span style='font-size:13px;'>[[title]] in [[category]]:<b>[[value]]</b></span>",
            "bullet": "round",
            "bulletBorderAlpha": 1,
            "lineColor": "#AA59FE",
            "bulletColor": "#FFFFFF",
            "useLineColorForBulletBorder": true,
            "fillAlphas": 0,
            "lineThickness": 2,
            "lineAlpha": 1,
            "bulletSize": 7,
            "title": "Expenses",
            "valueField": "expenses"
        }],
        "rotate": true,
        "categoryField": "year",
        "categoryAxis": {
            "gridPosition": "start"
        },
        "export": {
            "enabled": false
        }

    });
}

/*--------------  bar chart 13 amchart END ------------*/
</script>
<!-- all map chart -->
<script>
    /* ------------- map amchart 7 start ------------ */
var map = AmCharts.makeChart("seomap", {
    "type": "map",
    "theme": "light",
    "projection": "miller",

    "imagesSettings": {
        "rollOverColor": "#089282",
        "rollOverScale": 3,
        "selectedScale": 3,
        "selectedColor": "#089282",
        "color": "#13564e"
    },

    "areasSettings": {
        "unlistedAreasColor": "#15A892"
    },

    "dataProvider": {
        "map": "worldLow",
        "images": [
            <?php foreach($clients as $client){ ?>
        {
            "zoomLevel": 5,
            "scale": 0.5,
            "title": "{{ $client->pays }}",
            "latitude": {{ $client->Pays->latitude }},
            "longitude": {{ $client->Pays->longitude }}
        },<?php } ?> ]
    }
});

// add events to recalculate map position when the map is moved or zoomed
map.addListener("positionChanged", updateCustomMarkers);

// this function will take current images on the map and create HTML elements for them
function updateCustomMarkers(event) {
    // get map object
    var map = event.chart;

    // go through all of the images
    for (var x in map.dataProvider.images) {
        // get MapImage object
        var image = map.dataProvider.images[x];

        // check if it has corresponding HTML element
        if ('undefined' == typeof image.externalElement)
            image.externalElement = createCustomMarker(image);

        // reposition the element accoridng to coordinates
        var xy = map.coordinatesToStageXY(image.longitude, image.latitude);
        image.externalElement.style.top = xy.y + 'px';
        image.externalElement.style.left = xy.x + 'px';
    }
}

// this function creates and returns a new marker element
function createCustomMarker(image) {
    // create holder
    var holder = document.createElement('div');
    holder.className = 'map-marker';
    holder.title = image.title;
    holder.style.position = 'absolute';

    // maybe add a link to it?
    if (undefined != image.url) {
        holder.onclick = function() {
            window.location.href = image.url;
        };
        holder.className += ' map-clickable';
    }

    // create dot
    var dot = document.createElement('div');
    dot.className = 'dot';
    holder.appendChild(dot);

    // create pulse
    var pulse = document.createElement('div');
    pulse.className = 'pulse';
    holder.appendChild(pulse);

    // append the marker to the map container
    image.chart.chartDiv.appendChild(holder);

    return holder;
}
/* ------------- map amchart 7 END ------------ */
</script>
@endsection
