// src/pages/inventario.jsx
import React, { useMemo, useState, useEffect, Suspense } from "react";
import { useLocation } from "react-router-dom";

const InvProj = React.lazy(() => import("./inventario/invproj").then(m=>({default:m.default})));
const InvAmostragem = React.lazy(() => import("./inventario/invamostragem").then(m=>({default:m.default})));
const InvVolumetria = React.lazy(() => import("./inventario/invvolumetria").then(m=>({default:m.default})));
const InvFitossociologia = React.lazy(() => import("./inventario/invfitossociologia").then(m=>({default:m.default})));
const InvEstrutura = React.lazy(() => import("./inventario/investrutura").then(m=>({default:m.default})));
const InvDistribuicao = React.lazy(() => import("./inventario/invdistribuicao").then(m=>({default:m.default})));
const InvEcologia = React.lazy(() => import("./inventario/invecologia").then(m=>({default:m.default})));

const PAGES = {
  invproj: InvProj, invamostragem: InvAmostragem, invvolumetria: InvVolumetria,
  invfitossociologia: InvFitossociologia, investrutura: InvEstrutura,
  invdistribuicao: InvDistribuicao, invecologia: InvEcologia,
};
const VALID = Object.keys(PAGES);
const parseTab = (search) => {
  const t = new URLSearchParams(search).get("tab") || "invproj";
  return VALID.includes(t) ? t : "invproj";
};

export default function Inventario() {
  const location = useLocation();
  const [tab, setTab] = useState(parseTab(location.search));
  useEffect(() => { const n = parseTab(location.search); if (n !== tab) setTab(n); }, [location.search]); // eslint-disable-line
  const Page = useMemo(() => PAGES[tab] || InvProj, [tab]);

  return (
    <div style={{ height: "100%", display: "grid", gridTemplateRows: "1fr" }}>
      <Suspense fallback={<div style={{ padding: 24 }}>Carregando…</div>}>
        <Page />
      </Suspense>
    </div>
  );
}
