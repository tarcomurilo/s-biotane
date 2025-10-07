import React, { useState } from 'react';
import './LoginPage.css';

export default function LoginPage() {
  const [login, setLogin] = useState('');
  const [senha, setSenha] = useState('');
  const [error, setError] = useState('');

  const handleSubmit = (e) => {
    e.preventDefault();
    setError('');

    if (login === 'TESTE' && senha === 'TESTE256') {
      console.log('Login successful');
    } else {
      setError('Usuário ou senha incorretos');
    }
  };

  const handleForgotPassword = () => {
    alert('Funcionalidade em desenvolvimento');
  };

  const handleCreateAccount = () => {
    alert('Funcionalidade em desenvolvimento');
  };

  return (
    <div className="login-page">
      <div className="login-container">
        <div className="login-header">
          <div className="login-logo">🌲</div>
          <h1 className="login-title">Inventário Florestal</h1>
          <p className="login-subtitle">Sistema de Gestão e Análise</p>
        </div>

        <form className="login-form" onSubmit={handleSubmit}>
          <div className="input-group">
            <span className="input-icon">👤</span>
            <input
              type="text"
              placeholder="Usuário"
              value={login}
              onChange={(e) => setLogin(e.target.value)}
              required
            />
          </div>

          <div className="input-group">
            <span className="input-icon">🔒</span>
            <input
              type="password"
              placeholder="Senha"
              value={senha}
              onChange={(e) => setSenha(e.target.value)}
              required
            />
          </div>

          {error && (
            <div style={{ color: '#c45a5a', fontSize: '14px', textAlign: 'center' }}>
              {error}
            </div>
          )}

          <div className="forgot-password">
            <button type="button" onClick={handleForgotPassword}>
              Esqueceu a senha?
            </button>
          </div>

          <button type="submit" className="login-button">
            Entrar
          </button>

          <div className="divider">ou</div>

          <div className="create-account">
            <button
              type="button"
              className="create-account-button"
              onClick={handleCreateAccount}
            >
              Criar nova conta
            </button>
          </div>
        </form>
      </div>
    </div>
  );
}
