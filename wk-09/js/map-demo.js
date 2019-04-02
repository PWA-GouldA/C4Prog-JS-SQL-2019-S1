/**
 * Javascript Week 09 - Demo 00
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
    let terrainLayer = new L.StamenTileLayer("terrain-background", {
        detectRetina: true
    });
    let topLayer = new L.StamenTileLayer("toner-lite", {
        detectRetina: true,
        transparent:true
    });
        let map = new L.Map("mapid", {
            center: new L.LatLng(51.505, -0.09),
            zoom: 10
        });
       map.addLayer(terrainLayer);
       map.addLayer(topLayer);
}

initialize();