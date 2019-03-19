/**
 * Javascript Week 07 - Demo 00
 *
 * Filename: js/demo-00.js
 * Author:   Adrian Gould
 * Date:     2019-02-26
 *
 */

/*
    Terrain type options:
        toner
            -hybrid
            -labels
            -lines
            -background
            -lite
        terrain
            -labels
            -lines
            -background
        watercolor

        see http://maps.stamen.com
 */

function initialize() {
    let mapLayer = new L.StamenTileLayer("toner-lite", {
        detectRetina: true
    });
        let map = new L.Map("mapid", {
            center: new L.LatLng(35.92,14.369),
            zoom: 16
        });
        map.addLayer(mapLayer);
}

initialize();