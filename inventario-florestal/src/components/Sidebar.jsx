import { useNavigate, useLocation } from "react-router-dom";

const forestGreen = "#2e4631";
const earthBrown = "#8b6f4e";
const mossGreen = "#6b8e23";
const white = "#fff";

const menuLateral = [
  { nome: "Projetos", path: "/projetos", icon: "📁" },
  { nome: "Orçamento", path: "/orcamento", icon: "💲" },
  { nome: "Inventário", path: "/inventario", icon: "🌳" },
  { nome: "Mapa", path: "/mapa", icon: "🗺️" },
  { nome: "Dados", path: "/dados", icon: "📊" },
  { nome: "Configurações", path: "/config", icon: "⚙️" }
];

export default function Sidebar() {
  const navigate = useNavigate();
  const location = useLocation();

  const isActive = (path) => location.pathname.startsWith(path);

  return (
    <aside style={sidebarStyle}>
      <div style={headerStyle}>
        <span style={iconStyle}>🌲</span>
        <span style={appNameStyle}>Inventário</span>
      </div>
      <nav style={{ flexGrow: 1 }}>
        {menuLateral.map((item) => (
          <button
            key={item.path}
            style={menuBtnStyle(isActive(item.path))}
            onClick={() => navigate(item.path)}
          >
            <span style={{ marginRight: 12, fontSize: 20 }}>{item.icon}</span>
            {item.nome}
          </button>
        ))}
      </nav>
      <div style={footerStyle}>
        <button
          style={menuBtnStyle(isActive("/perfil"))}
          onClick={() => navigate("/perfil")}
        >
          <span style={{ marginRight: 12, fontSize: 20 }}>👤</span>
          Perfil do Usuário
        </button>
        <button
          style={menuBtnStyle(false)}
          onClick={() => navigate("/softinv_li.html")}
        >
          <span style={{ marginRight: 10, fontSize: 18 }}>⏻</span>
          Logout
        </button>
      </div>
    </aside>
  );
}

// --- ESTILOS ---
const sidebarStyle = {
  width: 190,
  height: "99vh",
  background: `linear-gradient(180deg, #2e4631 60%, #8b6f4e 100%)`,
  color: white,
  display: "flex",
  flexDirection: "column",
  alignItems: "stretch",
  padding: "28px 0 12px 0",
  position: "fixed",
  left: 0,
  top: 2,
  zIndex: 20,
  borderTopRightRadius: 16,
  borderBottomRightRadius: 16,
  boxShadow: `
    12px 0 36px -6px rgba(46,70,49,0.32),
    18px 0 60px -12px rgba(46,70,49,0.18),
    4px 0 18px 0 rgba(0,0,0,0.13)
  `,
  fontFamily: "Calibri, Arial, sans-serif",
};

const headerStyle = {
  display: "flex",
  alignItems: "center",
  justifyContent: "center",
  marginBottom: 34
};

const iconStyle = {
  fontSize: 28,
  color: mossGreen,
  marginRight: 8
};

const appNameStyle = {
  fontWeight: 700,
  fontSize: 20,
  letterSpacing: 1.2,
  color: white,
  fontFamily: "Calibri, Arial, sans-serif"
};

const menuBtnStyle = (ativo) => ({
  background: ativo ? mossGreen : "transparent",
  color: ativo ? white : white,
  border: "none",
  padding: "13px 34px 13px 22px",
  width: "100%",
  textAlign: "left",
  fontSize: 16,
  fontWeight: ativo ? 700 : 500,
  borderRadius: 0,
  cursor: "pointer",
  outline: "none",
  transition: "background 0.15s, color 0.12s",
  fontFamily: "Calibri, Arial, sans-serif",
  boxShadow: ativo ? "0 2px 12px #6b8e2340" : "none",
  whiteSpace: "nowrap",

});

// Rodapé dos botões, fixa os botões no final
const footerStyle = {
  display: "flex",
  flexDirection: "column",
  gap: 5,
  marginTop: "auto",
  padding: "0 0 10px 0"
};
