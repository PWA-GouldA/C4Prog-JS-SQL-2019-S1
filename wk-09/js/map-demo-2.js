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

    //var layers = ["terrain", "watercolor","toner"];

    let watercolor = new L.StamenTileLayer("watercolor");
    let terrain = new L.StamenTileLayer("terrain");
    let toner = new L.StamenTileLayer("toner");

    let bases = {
        "Watercolor": watercolor,
        "Terrain": terrain,
        "Toner": toner
    };

    let map = new L.Map('mapid', {
        center: [51.505, -0.09],
        zoom: 4,
        layers: watercolor
    });

    L.control.layers(bases).addTo(map);

}


initialize();