<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Peta Kebakaran Hutan dan Lahan</title>
    <!-- Tambahkan CSS Leaflet untuk tampilan peta -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <style>
        /* Atur ukuran peta agar terlihat penuh */
        #map {
            height: 500px;
            width: 1000px;
            border-radius: 10px;
        }
    </style>
</head>
<body>
    
    <?php include(__DIR__ . '/src/Templates/navbar gtk.php'); ?>
    <h1>Peta Kebakaran Hutan dan Lahan</h1>
    <p>Halaman ini menunjukkan lokasi kebakaran hutan dan lahan di Indonesia.</p>

    <!-- Div untuk menampilkan peta -->
     <center>
    <div id="map"></div>
    </center>

    <!-- Tambahkan Leaflet JS -->
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <script>
        // Inisialisasi peta dengan koordinat tengah Indonesia dan zoom level 5
        var map = L.map('map').setView([-2.5489, 118.0149], 5);

        // Batas koordinat Indonesia untuk mengunci peta pada area ini
        var bounds = [
            [-10.0, 95.0], // Barat Daya (koordinat paling bawah kiri Indonesia)
            [6.0, 141.0]   // Timur Laut (koordinat paling atas kanan Indonesia)
        ];

        // Tetapkan batas pada peta
        map.setMaxBounds(bounds);
        map.on('drag', function() {
            map.panInsideBounds(bounds, { animate: true });
        });

        // Tambahkan layer tile dari OpenStreetMap
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 18,
            minZoom: 5, // Setel batas zoom minimum agar tidak bisa terlalu menjauh dari Indonesia
            attribution: '© OpenStreetMap contributors'
        }).addTo(map);

        // Data lokasi kebakaran (koordinat latitude dan longitude)
        var fireLocations = [
            { lat: -3.1, lng: 115.1, title: "Kebakaran 1 di Kalimantan Selatan" },
            { lat: -0.9, lng: 114.2, title: "Kebakaran 2 di Kalimantan Tengah" },
            { lat: -2.5, lng: 102.4, title: "Kebakaran 3 di Sumatra Selatan" }
        ];

        var fireIcon = L.icon({
            iconUrl: 'images/fire pin.gif',
            iconSize: [20, 35], // Ukuran ikon
            iconAnchor: [10, 34], // Titik pusat ikon pada marker
            popupAnchor: [0, -30] // Posisi popup terhadap ikon
        });

        // Tambahkan penanda untuk setiap lokasi kebakaran
        fireLocations.forEach(location => {
            L.marker([location.lat, location.lng], { icon: fireIcon }).addTo(map)
              .bindPopup(location.title); // Pop-up dengan judul kebakaran
        });
    </script>
</body>
</html>
