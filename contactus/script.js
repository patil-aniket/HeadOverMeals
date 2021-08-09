var mymap = L.map('mapid').setView([18.990211, 73.127685], 16);

var layer = new L.TileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png');
         
         // Adding layer to the map
         mymap.addLayer(layer);

var marker = L.marker([18.990211, 73.127685]).addTo(mymap);

var circle = L.circle([18.990211, 73.127685], {
    color: 'red',
    fillColor: '#f03',
    fillOpacity: 0.5,
    radius: 100
}).addTo(mymap);

marker.bindPopup("Pillai College of Engineering").openPopup();

var popup = L.popup();

function onMapClick(e) {
    popup
        .setLatLng(e.latlng)
        .setContent("You clicked the map at " + e.latlng.toString())
        .openOn(mymap);
}

mymap.on('click', onMapClick);