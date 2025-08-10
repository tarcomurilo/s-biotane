import { Routes, Route, Navigate } from "react-router-dom";
import AppLayout from "./layouts/AppLayout";
import Projetos from "./pages/projetos";
import Orcamento from "./pages/orcamento";
import Inventario from "./pages/inventario";
import Mapa from "./pages/mapa";
import Dados from "./pages/dados";
import Config from "./pages/Config";
import Perfil from "./pages/Perfil";
// import Login from "./pages/Login"; // caso queira adicionar login

export default function App() {
  return (
    <Routes>
      {/* Exemplo: <Route path="/login" element={<Login />} /> */}
      <Route element={<AppLayout />}>
        <Route path="/projetos" element={<Projetos />} />
        <Route path="/orcamento" element={<Orcamento />} />
        <Route path="/inventario" element={<Inventario />} />
        <Route path="/mapa" element={<Mapa />} />
        <Route path="/dados" element={<Dados />} />
        <Route path="/config" element={<Config />} />
        <Route path="/perfil" element={<Perfil />} />
        <Route path="/" element={<Navigate to="/projetos" />} />
      </Route>
      <Route path="*" element={<div style={{ padding: 32 }}>Página não encontrada</div>} />
    </Routes>
  );
}
