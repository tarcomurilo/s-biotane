import React, { useState } from 'react';

export default function Projetos() {
  const [projetoAtivo, setProjetoAtivo] = useState(null);

  const projetos = [
    { id: 1, codigo: 'PRJ001', nome: 'Projeto A', dataInicio: '2025-07-01', dataEntrega: '2025-08-31' },
    { id: 2, codigo: 'PRJ002', nome: 'Projeto B', dataInicio: '2025-07-15', dataEntrega: '2025-09-15' }
  ];

  return (
    
    <div
     
      style={{
        fontFamily: 'Calibri, sans-serif',
        height: '100%',
        backgroundColor: '#ccc',
        borderRadius: 8,
        padding: 16,
        boxSizing: 'border-box',
        display: 'flex',
        flexDirection: 'column',
        justifyContent: 'flex-start',
        alignItems: 'center'
      }}
    >
      
      <div
        style={{
          backgroundColor: 'white',
          width: '100%',
          height: '100%',
          borderRadius: 8,
          padding: 24,
          boxSizing: 'border-box',
          overflowY: 'auto',
          boxShadow: '0 0 10px rgba(0,0,0,0.1)'
        }}
      >

        <h2 style={{ marginTop: 0, marginBottom: 24 }}>Projetos</h2>
        
         {projetoAtivo && (
          <div
            style={{
              marginTop: 24,
              padding: 16,
              backgroundColor: '#f9f9f9',
              borderRadius: 6,
              border: '1px solid #ddd',
              fontSize: 16,
            }}
          >
            <strong>Projeto ativo:</strong> {projetos.find(p => p.id === projetoAtivo)?.nome}
          </div>
        )}

        <ul style={{ listStyleType: 'none', paddingLeft: 0 }}>
          {projetos.map((p) => (
            <li key={p.id} style={{ marginBottom: 12 }}>
              <button
                onClick={() => setProjetoAtivo(p.id)}
                style={{
                  fontFamily: 'Calibri, sans-serif',
                  backgroundColor: projetoAtivo === p.id ? '#0078d7' : '#f0f0f0',
                  color: projetoAtivo === p.id ? 'white' : 'black',
                  border: 'none',
                  padding: '10px 20px',
                  borderRadius: 4,
                  cursor: 'pointer',
                  width: '100%',
                  textAlign: 'left',
                  fontSize: 16
                }}
              >
                {p.codigo} - {p.nome}
              </button>
            </li>
          ))}
        </ul>

       
      </div>
    </div>
  );
}
