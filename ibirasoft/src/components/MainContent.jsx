import React from 'react';
import './MainContent.css';

function MainContent() {
  return (
    <main className="main-content">
      <div className="content-header">
        <h2 className="content-title">Dashboard</h2>
        <p className="content-subtitle">Bem-vindo ao sistema de gestão florestal</p>
      </div>

      <div className="content-grid">
        <div className="card">
          <div className="card-header">
            <span className="card-icon">🌲</span>
            <h3 className="card-title">Total de Árvores</h3>
          </div>
          <div className="card-body">
            <p className="card-value">12,458</p>
            <p className="card-change positive">+5.2% este mês</p>
          </div>
        </div>

        <div className="card">
          <div className="card-header">
            <span className="card-icon">📏</span>
            <h3 className="card-title">Área Total</h3>
          </div>
          <div className="card-body">
            <p className="card-value">348 ha</p>
            <p className="card-change neutral">Sem alterações</p>
          </div>
        </div>

        <div className="card">
          <div className="card-header">
            <span className="card-icon">📊</span>
            <h3 className="card-title">Volume</h3>
          </div>
          <div className="card-body">
            <p className="card-value">2,845 m³</p>
            <p className="card-change positive">+8.1% este mês</p>
          </div>
        </div>

        <div className="card">
          <div className="card-header">
            <span className="card-icon">🎯</span>
            <h3 className="card-title">Eficiência</h3>
          </div>
          <div className="card-body">
            <p className="card-value">94.5%</p>
            <p className="card-change positive">+2.3% este mês</p>
          </div>
        </div>
      </div>

      <div className="content-section">
        <div className="section-card">
          <h3 className="section-title">Atividades Recentes</h3>
          <div className="activity-list">
            <div className="activity-item">
              <div className="activity-icon">📝</div>
              <div className="activity-content">
                <p className="activity-title">Inventário atualizado - Área A</p>
                <p className="activity-time">Há 2 horas</p>
              </div>
            </div>
            <div className="activity-item">
              <div className="activity-icon">📄</div>
              <div className="activity-content">
                <p className="activity-title">Relatório mensal gerado</p>
                <p className="activity-time">Há 5 horas</p>
              </div>
            </div>
            <div className="activity-item">
              <div className="activity-icon">🗺️</div>
              <div className="activity-content">
                <p className="activity-title">Novo mapa cadastrado - Setor B</p>
                <p className="activity-time">Ontem</p>
              </div>
            </div>
          </div>
        </div>

        <div className="section-card">
          <h3 className="section-title">Próximas Tarefas</h3>
          <div className="task-list">
            <div className="task-item">
              <input type="checkbox" id="task1" />
              <label htmlFor="task1">Revisão de dados do setor C</label>
            </div>
            <div className="task-item">
              <input type="checkbox" id="task2" />
              <label htmlFor="task2">Análise de crescimento trimestral</label>
            </div>
            <div className="task-item">
              <input type="checkbox" id="task3" />
              <label htmlFor="task3">Atualização de mapas georeferenciados</label>
            </div>
          </div>
        </div>
      </div>
    </main>
  );
}

export default MainContent;
