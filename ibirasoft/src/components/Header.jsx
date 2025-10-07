import React from 'react';
import './Header.css';

function Header() {
  return (
    <header className="header">
      <div className="header-left">
        <div className="logo">
          <span className="logo-icon">🌲</span>
          <span className="logo-text">Inventário Florestal</span>
        </div>
      </div>

      <div className="header-center">
        <h1 className="header-title">Sistema de Gestão Ibirasoft</h1>
      </div>

      <div className="header-right">
        <div className="user-info">
          <span className="user-name">Usuário</span>
          <div className="user-avatar">👤</div>
        </div>
      </div>
    </header>
  );
}

export default Header;
