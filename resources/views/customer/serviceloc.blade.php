<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"/>
<style>
  #map { height: 520px; width:100%; border-radius:10px; }
  .map-panel { display:flex; gap:12px; align-items:center; margin-bottom:12px;}
  .map-actions { display:flex; gap:8px; align-items:center;}
</style>

<div class="map-panel">
  <div class="map-actions">
    <input id="searchInput" placeholder="Cari lokasi atau nama cabang..." />
    <button id="btnLocate">Temukan Saya</button>
    <select id="branchFilter">
      <option value="all">Semua Cabang</option>
    </select>
  </div>
</div>

<div id="map"></div>

<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
<script>
  const map = L.map('map').setView([-7.0, 110.4], 7); // center Jateng contoh

  L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
      attribution: '&copy; OpenStreetMap contributors'
  }).addTo(map);

  // fetch branches
  fetch("{{ route('api.branches') }}")
    .then(r => r.json())
    .then(data => {
        window.branchMarkers = [];
        data.forEach(b => {
            if (!b.lat || !b.lng) return;
            const marker = L.marker([b.lat, b.lng]).addTo(map);
            marker.bindPopup(`<b>${b.name}</b><br>${b.address || ''}<br>Tel: ${b.phone || '-'}`);
            marker.branch = b;
            window.branchMarkers.push(marker);

            // isi dropdown filter
            const opt = document.createElement('option');
            opt.value = b.id;
            opt.text = b.name;
            document.getElementById('branchFilter').appendChild(opt);
        });
    });

  // filter by branch
  document.getElementById('branchFilter').addEventListener('change', function(){
      const v = this.value;
      if (v === 'all') {
          window.branchMarkers.forEach(m => m.addTo(map));
          map.setView([-7.0,110.4], 7);
      } else {
          window.branchMarkers.forEach(m => {
              if (String(m.branch.id) === v) {
                  m.addTo(map);
                  map.setView(m.getLatLng(), 14);
                  m.openPopup();
              } else {
                  map.removeLayer(m);
              }
          });
      }
  });

  // locate user
  document.getElementById('btnLocate').addEventListener('click', () => {
    if (!navigator.geolocation) return alert('Geolocation tidak didukung.');
    navigator.geolocation.getCurrentPosition(pos => {
        const lat = pos.coords.latitude, lng = pos.coords.longitude;
        map.setView([lat,lng], 13);
        L.circle([lat,lng], {radius:50, color:'blue'}).addTo(map);
    }, err => alert('Gagal mendapatkan lokasi: ' + err.message));
  });

  // search simple: name or address
  document.getElementById('searchInput').addEventListener('keypress', function(e){
    if (e.key !== 'Enter') return;
    const q = this.value.toLowerCase();
    const found = window.branchMarkers.find(m => 
        (m.branch.name || '').toLowerCase().includes(q) || (m.branch.address || '').toLowerCase().includes(q)
    );
    if (found) {
        map.setView(found.getLatLng(), 14);
        found.openPopup();
    } else {
        alert('Branch tidak ditemukan');
    }
  });
</script>
