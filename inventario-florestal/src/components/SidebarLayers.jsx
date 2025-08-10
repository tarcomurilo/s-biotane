// SidebarLayers.jsx
import React from 'react';

export default function SidebarLayers() {
  return (
    <div
      style={{
        width: 280,
        
        backgroundColor: '#ccd8cef8', // cinza claro suave
        padding: '16px',
        height: '100%',
        boxSizing: 'border-box',
        borderRadius: '10px',
        boxShadow: '2px 2px 8px rgba(0,0,0,0.1)',
        
      }}
    >
      <h2
        style={{
          fontFamily: 'Calibri, sans-serif',
          color: '#555',
          textShadow: '1px 1px 2px rgba(0,0,0,0.1)',
          margin: 0,
        }}
      >
        Camadas
      </h2>
    </div>
  );
}
