import React from 'react';
import SidebarLayers from '../../components/SidebarLayers';
import { MapContainer, TileLayer } from 'react-leaflet';
import 'leaflet/dist/leaflet.css';

export default function MapPage() {
  return (
    <div style={{ display: 'flex', height: '100%' }}>
      <SidebarLayers />
      <div style={{ flex: 1 }}>
        <MapContainer
          center={[-15.8, -47.9]}
          zoom={13}
          style={{ height: '100%', width: '99%', marginLeft: '5px', borderRadius: '10px' }}
          scrollWheelZoom={true}
        >
          <TileLayer
            url="https://server.arcgisonline.com/ArcGIS/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{x}"
            attribution='Tiles &copy; Esri &mdash; Source: Esri, NASA, USGS, FEMA'
            maxZoom={19}
          />
        </MapContainer>
      </div>
    </div>
  );
}
