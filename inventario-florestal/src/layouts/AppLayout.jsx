import React, { useEffect, useState } from "react";
import { Outlet } from "react-router-dom";
import Sidebar from "../components/Sidebar";
import Topbar from "../components/Topbar";

function ErrorBoundary({ children }) {
  const [err, setErr] = React.useState(null);
  return (
    <React.Suspense fallback={<div style={{padding:16}}>Carregando…</div>}>
      <ErrorCatcher onError={setErr}>
        {err ? <div style={{padding:16, color:"#900"}}>{String(err)}</div> : children}
      </ErrorCatcher>
    </React.Suspense>
  );
}
class ErrorCatcher extends React.Component {
  componentDidCatch(e){ this.props.onError?.(e); }
  render(){ return this.props.children; }
}

export default function AppLayout() {
  const [isMobile, setIsMobile] = useState(window.innerWidth < 900);
  const [drawerOpen, setDrawerOpen] = useState(false);

  useEffect(() => {
    const mq = window.matchMedia("(max-width: 899px)");
    const onChange = (e) => {
      setIsMobile(e.matches);
      setDrawerOpen(false);
    };
    mq.addEventListener("change", onChange);
    setIsMobile(mq.matches);
    return () => mq.removeEventListener("change", onChange);
  }, []);

  // Bloqueia scroll do body quando drawer estiver aberto
  useEffect(() => {
    if (isMobile && drawerOpen) {
      const prev = document.body.style.overflow;
      document.body.style.overflow = "hidden";
      return () => (document.body.style.overflow = prev);
    }
  }, [isMobile, drawerOpen]);

  return (
    <div className="shell-flex96">
      <style>{css}</style>

      {/* Sidebar (fixa no desktop; drawer no mobile) */}
      <aside className={`sb-col ${isMobile ? "mobile" : "desktop"} ${drawerOpen ? "open" : ""}`}>
        <Sidebar />
      </aside>

      {/* Gutter fixo de 10px entre Sidebar e Main (desktop apenas) */}
      {!isMobile && <div className="gutter-10" />}

      {/* Coluna principal (Topbar fixa no topo da coluna; apenas conteúdo rola) */}
      <main className="main-col">
        {isMobile && (
          <button
            className="hamb"
            aria-label="Abrir menu"
            onClick={() => setDrawerOpen(true)}
            title="Menu"
          >
            ☰
          </button>
        )}

        <div className="topbar-wrap">
          <ErrorBoundary><Topbar /></ErrorBoundary>
        </div>

        <div className="content-wrap">
          <ErrorBoundary><Outlet /></ErrorBoundary>
        </div>
      </main>

      {/* Backdrop + Fechar (mobile drawer) */}
      {isMobile && drawerOpen && <div className="backdrop" onClick={() => setDrawerOpen(false)} />}
      {isMobile && drawerOpen && (
        <button className="drawer-close" onClick={() => setDrawerOpen(false)} aria-label="Fechar menu">
          ✕
        </button>
      )}
    </div>
  );
}

/* ===================== CSS escopado ===================== */
const css = `
/* Reset mínimo p/ remover margens no topo/lados */
html, body, #root { margin: 0; padding: 0; height: 100%; }
* { box-sizing: border-box; }

/* ---- Shell: flex horizontal, 96vh, sem scroll global ---- */
.shell-flex96 {
  --sbw: clamp(220px, 24vw, 220px);  /* largura responsiva da sidebar no desktop */
  --topbar-h: 48px;                  /* altura da topbar (compatível com Topbar.jsx) */
  height: 100vh;
  width: 100%;
  display: flex;                     /* abordagem flexbox */
  align-items: stretch;
  overflow: hidden;                  /* nada fora daqui rola */
  background: #f6f6f6;
  
}

/* ---- Sidebar coluna ---- */
.sb-col.desktop {
  flex: 0 0 var(--sbw);              /* largura fixa no desktop */
  overflow: hidden;                  /* sidebar não rola */
  border-right: 1px solid #00000014;
  z-index: 2;
}
.gutter-10 {
  flex: 0 0 0px;                    /* espaço EXATO de 10px entre sidebar e main */
}

/* ---- Coluna principal ---- */
.main-col {
  flex: 1 1 auto;
  min-width: 0;                      /* evita estourar em flex */
  display: flex;
  flex-direction: column;            /* Topbar acima do conteúdo */
  overflow: hidden;                  /* apenas o conteúdo interno rola */
  position: relative;
 
}

/* Topbar “colada” verticalmente ao topo da coluna; não rola */
.topbar-wrap {
  flex: 0 0 auto;     /* altura automática conforme as quebras */
  min-height: 48px;   /* altura mínima opcional */
  overflow: hidden;   /* topbar não rola */
}

/* ÚNICA área rolável */
.content-wrap {
  flex: 1 1 auto;
  overflow: auto;                    /* rola só quando necessário */
  padding: 16px;                     /* espaçamento interno */

}

/* ===== Mobile (<900px): Sidebar vira drawer sobreposta; sem gutter ===== */
.sb-col.mobile {
  position: fixed;
  top: 0; left: 0; bottom: 0;
  width: min(80vw, 320px);
  transform: translateX(-100%);
  transition: transform .18s ease, box-shadow .18s ease;
  background: #243a29;               /* combinar com a Sidebar */
  box-shadow: 0 6px 24px rgba(0,0,0,.28);
  overflow: hidden;                   /* não rola */
  z-index: 30;
  border-right: none;
}
.sb-col.mobile.open { transform: translateX(0); }

.backdrop {
  position: fixed;
  inset: 0;
  background: rgba(0,0,0,.35);
  z-index: 25;
}

/* Botões drawer/hamburguer */
.hamb {
  position: absolute;
  left: 8px; top: 8px;
  height: 36px; min-width: 40px;
  border-radius: 8px;
  border: 1px solid #00000022;
  background: #e5e5e5;
  color: #2e4631;
  font-weight: 800;
  cursor: pointer;
  box-shadow: 0 2px 7px rgba(0,0,0,.12);
  z-index: 5;
}
.drawer-close {
  position: fixed;
  left: calc(min(80vw, 320px) + 8px);
  top: 8px;
  height: 36px; min-width: 40px;
  border-radius: 8px;
  border: 1px solid #00000022;
  background: #e5e5e5;
  color: #2e4631;
  font-weight: 800;
  cursor: pointer;
  box-shadow: 0 2px 7px rgba(0,0,0,.12);
  z-index: 35;
}

/* Scrollbar opcional (somente no conteúdo) */
.content-wrap::-webkit-scrollbar { width: 10px; }
.content-wrap::-webkit-scrollbar-thumb { background: #bfbfbf; border-radius: 8px; }
`;
